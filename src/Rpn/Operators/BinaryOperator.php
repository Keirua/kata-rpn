<?php

namespace Rpn\Operators;

abstract class BinaryOperator implements Operator{
    protected function extractParameters (&$stack){
        if (count($stack) < 2)
            throw new \LogicException(sprintf("%s require 2 parameters", self::class));

        $value2 = array_pop($stack);
        $value1 = array_pop($stack);

        return [$value1, $value2];
    }
}