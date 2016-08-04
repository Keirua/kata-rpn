<?php

use Rpn\Operators\Division;

class DivisionTest extends \PHPUnit_Framework_TestCase
{
    private $operation;

    public function setUp(){
        $this->operation = new Division();
    }

    public function testDivisionOperationIsImplemented()
    {
        $result = $this->operation->compute(8,2);

        $this->assertEquals(4, $result);
    }
}