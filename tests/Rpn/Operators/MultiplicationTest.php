<?php

use Rpn\Operators\Multiplication;

class MultiplicationTest extends \PHPUnit_Framework_TestCase
{
    private $operation;

    public function setUp()
    {
        $this->operation = new Multiplication();
    }

    public function testMultiplicationOperationIsImplemented()
    {
        $result = $this->operation->compute(2,3);

        $this->assertEquals(6, $result);
    }
}