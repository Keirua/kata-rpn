<?php

use Rpn\OperationComputer;
use Rpn\Operators\Addition;
use Rpn\Operators\Substraction;
use Rpn\Operators\Multiplication;
use Rpn\Operators\Division;

class OperationComputerTest extends \PHPUnit_Framework_TestCase
{
    private $calculator;

    public function setUp(){
        $this->operationComputer = new OperationComputer;
        $this->operationComputer->registerOperator('+', new Addition() );
        $this->operationComputer->registerOperator('-', new Substraction() );
        $this->operationComputer->registerOperator('*', new Multiplication() );
        $this->operationComputer->registerOperator('x', new Multiplication() );
        $this->operationComputer->registerOperator('/', new Division() );
    }

    public function testRegisteredOperationIsComputed(){
        $result  = $this->operationComputer->compute('+', 2, 3);
        $this->assertEquals(5, $result);
    }

    public function testInvalidOperationRaisesException(){
        $this->expectException(\LogicException::class);
        $result  = $this->operationComputer->compute('plop', 2, 3);
    }
}