<?php

use Component\Stack;

class StackTest extends \PHPUnit_Framework_TestCase
{
    private $stack;

    public function setUp()
    {
        $this->stack = new Component\Stack();
    }

    public function testTopReturnsNullWhenEmpty()
    {
        $this->assertEquals(null, $this->stack->top());

        $this->assertEquals(0, $this->stack->size());
    }

    public function testTopReturnsLastInsertedValueWhenNotEmpty()
    {
        $this->stack->push(1);
        $this->stack->push(2);
        $this->stack->push(3);
        $this->assertEquals(3, $this->stack->top());
        $this->assertEquals(3, $this->stack->size());
    }

    public function testPopRemovesTheTopValue()
    {
        $this->stack->push(1);
        $this->stack->push(2);
        $this->stack->push(3);
        $this->stack->pop();
        $this->assertEquals(2, $this->stack->top());
        $this->assertEquals(2, $this->stack->size());
    }

    public function testPopThrowExceptionWhenEmpty()
    {
        $this->expectException('\LogicException');
        $this->stack->pop();

        $this->assertEquals(0, $this->stack->size());
    }

    public function testPopThrowExceptionWhenEmptyAfterPushing()
    {
        $this->expectException('\LogicException');
        $this->stack->push(1);
        $this->stack->pop();
        $this->stack->pop();

        $this->assertEquals(0, $this->stack->size());
    }

}
