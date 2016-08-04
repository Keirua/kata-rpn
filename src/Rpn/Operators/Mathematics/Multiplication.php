<?php
namespace Rpn\Operators\Mathematics;

use Rpn\Operators\BinaryOperator;

class Multiplication extends BinaryOperator{
    public function compute (&$stack){
        list ($value1, $value2) = $this->extractParameters($stack);
        return $value1 * $value2;
    }
}