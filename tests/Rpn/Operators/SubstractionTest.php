<?php

use Rpn\Operators\Substraction;

class SubstractionTest extends \PHPUnit_Framework_TestCase
{
    private $operation;

    public function setUp(){
        $this->operation = new Substraction();
    }

    public function testSubstractionOperationIsImplemented()
    {
        $result = $this->operation->compute(2,3);

        $this->assertEquals(-1, $result);
    }
}