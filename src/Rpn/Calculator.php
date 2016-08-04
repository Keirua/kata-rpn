<?php

namespace Rpn;

class Calculator {
    private $operationComputer;

    public function __construct(){
        $this->operationComputer = new OperationComputer;
        $this->operationComputer->registerOperator('+', new Operators\Addition() );
        $this->operationComputer->registerOperator('-', new Operators\Substraction() );
        $this->operationComputer->registerOperator('*', new Operators\Multiplication() );
        $this->operationComputer->registerOperator('x', new Operators\Multiplication() );
        $this->operationComputer->registerOperator('/', new Operators\Division() );
    }

    public function compute ($operation){
        $array = explode(' ', $operation);
        $stack = [];

        while (count($array) != 0) {
            $currValue = array_shift($array);

            $resultValue  = $currValue;

            if (!is_numeric($currValue)){
                $value2 = array_pop($stack);
                $value1 = array_pop($stack);

                $resultValue = $this->operationComputer->compute($currValue, $value1, $value2);
            }

            array_push($stack, $resultValue);
        }

        return array_pop ($stack);
    }
}