<?php

namespace Rpn\Operators\Mathematics;

use Rpn\Operators\UnaryOperator;

class Square extends UnaryOperator
{
    public function compute(&$stack)
    {
        list($value) = $this->extractParameters($stack);

        return $value * $value;
    }
}
