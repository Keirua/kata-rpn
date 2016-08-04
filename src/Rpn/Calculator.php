<?php

namespace Rpn;

class Calculator {
    public function compute ($operation){
        $array = explode(' ', $operation);
        $stack = [];

        while (count($array) != 0)
        {
            $currValue = array_shift($array);

            $resultValue  = $currValue;

            if (!is_numeric($currValue)){
                $value2 = array_pop($stack);
                $value1 = array_pop($stack);

                $resultValue = $this->computeOperationResult($value1, $value2, $currValue);
            }

            array_push($stack, $resultValue);
        }

        return array_pop ($stack);
    }

    private function computeOperationResult($value1, $value2, $operator){
        switch($operator)
        {
            case '+':
                $resultValue = $value1 + $value2;
                break;
            case '-':
                $resultValue = $value1 - $value2;
                break;
            case 'x':
            case '*':
                $resultValue = $value1 * $value2;
                break;
            case '/':
                $resultValue = $value1 / $value2;
                break;
            default:
                throw new \LogicException(sprintf("%s is not a supported operator", $operator));
                break;
        }
        return $resultValue;
    }
}