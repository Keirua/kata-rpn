<?php

use Rpn\Operators\Mathematics\Addition;

class AdditionTest extends \PHPUnit_Framework_TestCase
{
    private $operation;

    public function setUp()
    {
        $this->operation = new Addition();
    }

    public function testAdditionOperationIsImplemented()
    {
        $values = [2, 3];
        $result = $this->operation->compute($values);

        $this->assertEquals(5, $result);
    }

    public function testAddingOnlyOneValueIsNotPossible()
    {
        $values = [42];
        $this->setExpectedException(\LogicException::class);
        $result = $this->operation->compute($values);
    }
}
