<?php

namespace Rpn\Operators;

abstract class UnaryOperator implements Operator
{
    protected function extractParameters(&$stack)
    {
        if (count($stack) < 1) {
            throw new \LogicException(sprintf('%s require 1 parameter', self::class));
        }

        $value = array_pop($stack);

        return [$value];
    }
}
