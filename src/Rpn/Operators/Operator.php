<?php
namespace Rpn\Operators;

interface Operator {
    public function compute($value1, $value2);
}