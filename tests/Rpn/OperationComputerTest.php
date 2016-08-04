<?php

use Rpn\OperationComputer;
use Rpn\Operators\Mathematics\Addition;
use Rpn\Operators\Mathematics\Substraction;
use Rpn\Operators\Mathematics\Multiplication;
use Rpn\Operators\Mathematics\Division;

class OperationComputerTest extends \PHPUnit_Framework_TestCase
{
    private $calculator;

    public function setUp()
    {
        $this->operationComputer = new OperationComputer();
        $this->operationComputer->registerOperator('+', new Addition());
        $this->operationComputer->registerOperator('-', new Substraction());
        $this->operationComputer->registerOperator('*', new Multiplication());
        $this->operationComputer->registerOperator('x', new Multiplication());
        $this->operationComputer->registerOperator('/', new Division());
    }

    public function testRegisteredOperationIsComputed()
    {
        $values = [2, 3];
        $result = $this->operationComputer->compute('+', $values);
        $this->assertEquals(5, $result);
    }

    public function testInvalidOperationRaisesException()
    {
        $values = [2, 3];
        $this->expectException(\LogicException::class);
        $result = $this->operationComputer->compute('plop', $values);
    }
}
