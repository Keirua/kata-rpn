<?php

namespace Rpn;

class Calculator
{
    private $operationComputer;

    public function __construct()
    {
        $this->operationComputer = new MathematicsOperationComputer();
    }

    public function compute($operation)
    {
        $array = explode(' ', $operation);
        $stack = [];

        while (count($array) != 0) {
            $this->processValue($array, $stack);
        }

        return array_pop($stack);
    }

    public function processValue(&$array, &$stack)
    {
        $currValue = array_shift($array);
        $resultValue = $currValue;

        if (!is_numeric($currValue)) {
            $resultValue = $this->operationComputer->compute($currValue, $stack);
        }

        array_push($stack, $resultValue);
    }
}
