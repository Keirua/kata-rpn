<?php
namespace Rpn\Operators;

class Addition implements Operator {
    public function compute ($value1, $value2){
        return $value1 + $value2;
    }
}