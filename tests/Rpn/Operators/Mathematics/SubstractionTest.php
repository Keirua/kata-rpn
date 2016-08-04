<?php

use Rpn\Operators\Mathematics\Substraction;

class SubstractionTest extends \PHPUnit_Framework_TestCase
{
    private $operation;

    public function setUp()
    {
        $this->operation = new Substraction();
    }

    public function testSubstractionOperationIsImplemented()
    {
        $values = [2, 3];
        $result = $this->operation->compute($values);

        $this->assertEquals(-1, $result);
    }

    public function testSubstractingOnlyOneValueIsNotPossible()
    {
        $values = [42];
        $this->setExpectedException(\LogicException::class);
        $result = $this->operation->compute($values);
    }
}
