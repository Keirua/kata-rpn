<?php

use Rpn\Calculator;

class RpnCalculatorTest extends \PHPUnit_Framework_TestCase
{
    private $calculator;

    public function setUp(){
        $this->calculator = new Calculator();
    }

    public function testAdditionIsImplemented()
    {
        $result = $this->calculator->compute("2 3 +");

        $this->assertEquals(5, $result);
    }

    public function testSubstractionIsImplemented()
    {
        $result = $this->calculator->compute("2 3 -");

        $this->assertEquals(-1, $result);
    }
    
    public function testDivisionIsImplemented()
    {
        $result = $this->calculator->compute("6 2 /");

        $this->assertEquals(3, $result);
    }

    public function testMultiplicationIsImplemented()
    {
        $result = $this->calculator->compute("6 2 *");

        $this->assertEquals(12, $result);
    }

    public function testInvalidOpertorThrowsException()
    {
        $this->expectException(\LogicException::class);

        $result = $this->calculator->compute("6 2 pouet");
    }

    public function testComputationWith2OperatorsAreSupporeted()
    {
        $result = $this->calculator->compute("7 5 2 - +");

        $this->assertEquals(10, $result);
    }

    public function testComputationWith3OperatorsAreSupporeted()
    {
        $result = $this->calculator->compute("3 5 8 * 7 + *");

        $this->assertEquals(141, $result);
    }

    public function testSampleComputationWorksAsExpected()
    {
        $result = $this->calculator->compute("3 4 2 1 + * + 2 /");

        $this->assertEquals(7.5, $result);
    }

    public function testSampleComputationWithBasicOperatorsIsSupporeted()
    {
        $result = $this->calculator->compute("1 2 + 4 * 5 + 3 -");

        $this->assertEquals(14, $result);
    }

    public function testSampleComputationWithBasicOperators2IsSupporeted()
    {
        $result = $this->calculator->compute("5 4 1 2 + * +");

        $this->assertEquals(17, $result);
    }
}