<?php

use Rpn\Operators\Mathematics\Multiplication;

class MultiplicationTest extends \PHPUnit_Framework_TestCase
{
    private $operation;

    public function setUp() {
        $this->operation = new Multiplication();
    }

    public function testMultiplicationOperationIsImplemented()
    {
        $values = [2,3];
        $result = $this->operation->compute($values);

        $this->assertEquals(6, $result);
    }

    public function testMultiplyingOnlyOneValueIsNotPossible()
    {
        $values = [42];
        $this->setExpectedException(\LogicException::class);
        $result = $this->operation->compute($values);
    }
}