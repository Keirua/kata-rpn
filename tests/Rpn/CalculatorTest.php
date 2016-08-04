<?php

use Rpn\Calculator;

class RpnCalculatorTest extends PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $calculator = new Calculator;

        $result = $calculator->compute("2 3 +");

        $this->assertEquals(5, $result);
    }
}