<?php

namespace Rpn\Operators\Mathematics;

use Rpn\Operators\BinaryOperator;

class Division extends BinaryOperator
{
    public function compute(&$stack)
    {
        list($value1, $value2) = $this->extractParameters($stack);

        return $value1 / $value2;
    }
}
