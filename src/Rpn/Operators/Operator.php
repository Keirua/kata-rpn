<?php

namespace Rpn\Operators;

interface Operator
{
    public function compute(&$stack);
}
