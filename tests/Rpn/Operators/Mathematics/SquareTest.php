<?php

use Rpn\Operators\Mathematics\Square;

class SquareTest extends \PHPUnit_Framework_TestCase
{
    private $operation;

    public function setUp(){
        $this->operation = new Square();
    }

    public function testAdditionOperationIsImplemented()
    {
        $values = [3];
        $result = $this->operation->compute($values);

        $this->assertEquals(9, $result);
    }

    public function testAddingOnlyOneValueIsNotPossible()
    {
        $values = [];
        $this->setExpectedException(\LogicException::class);
        $result = $this->operation->compute($values);
    }
}