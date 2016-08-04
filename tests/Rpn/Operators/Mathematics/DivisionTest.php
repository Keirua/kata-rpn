<?php

use Rpn\Operators\Mathematics\Division;

class DivisionTest extends \PHPUnit_Framework_TestCase
{
    private $operation;

    public function setUp()
    {
        $this->operation = new Division();
    }

    public function testDivisionOperationIsImplemented()
    {
        $values = [8, 2];
        $result = $this->operation->compute($values);

        $this->assertEquals(4, $result);
    }

    public function testDividingOnlyOneValueIsNotPossible()
    {
        $values = [42];
        $this->setExpectedException(\LogicException::class);
        $result = $this->operation->compute($values);
    }
}
