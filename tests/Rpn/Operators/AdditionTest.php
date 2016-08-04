<?php

use Rpn\Operators\Addition;

class AdditionTest extends \PHPUnit_Framework_TestCase
{
    private $operation;

    public function setUp(){
        $this->operation = new Addition();
    }

    public function testAdditionOperationIsImplemented()
    {
        $result = $this->operation->compute(2,3);

        $this->assertEquals(5, $result);
    }
}