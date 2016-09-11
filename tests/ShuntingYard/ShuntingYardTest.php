<?php

use ShuntingYard\ShuntingYard;

class ShuntingYardTest extends \PHPUnit_Framework_TestCase
{

    private $algo;

    public function setUp(){
        $this->algo = new ShuntingYard();
    }

    public function testBasicAddion(){
        $operation = explode (' ', '2 + 3'); // expects 2 3 +
        $expected = explode (' ', '2 3 +');

        $this->assertIndexedArrayMatch($expected, $this->algo->convertToRpn($operation));
    }

    public function testBasicAddionWithSin(){
        $operation = explode (' ', 'sin ( 2 + 3 )');
        $expected = explode (' ', '2 3 + sin');

        $this->assertIndexedArrayMatch($expected, $this->algo->convertToRpn($operation));
    }

    public function testAdditionAndMultiplication(){
        $operation = explode (' ', '7 * ( 2 + 3 )');
        $expected = explode (' ', '7 2 3 + *');

        $this->assertIndexedArrayMatch($expected, $this->algo->convertToRpn($operation));
    }

    public function testAdditionAndMultiplicationAndSubstraction(){
        $operation = explode (' ', '7 * ( 2 + 3 ) - 4');
        $expected = explode (' ', '7 2 3 + * 4 -');

        $this->assertIndexedArrayMatch($expected, $this->algo->convertToRpn($operation));
    }

    public function testComplexOperation1(){
        $operation = explode (' ', '( ( 1 * 2 ) + ( 3 / 4 ) )');
        $expected = explode (' ', '1 2 * 3 4 / +');

        $this->assertIndexedArrayMatch($expected, $this->algo->convertToRpn($operation));
    }

    public function testComplexOperation2(){
        $operation = explode (' ', '( ( 1 * ( 2 + 3 ) ) / 4 )');
        $expected = explode (' ', '1 2 3 + * 4 /');

        $this->assertIndexedArrayMatch($expected, $this->algo->convertToRpn($operation));
    }

    public function testComplexOperation3(){
        $operation = explode (' ', '( 1 * ( 2 + ( 3 / 4 ) ) )');
        $expected = explode (' ', '1 2 3 4 / + *');

        $this->assertIndexedArrayMatch($expected, $this->algo->convertToRpn($operation));
    }

    private function assertIndexedArrayMatch($a, $b){
        if (count ($a) != count ($b)){
            static::assertThat(false, static::isTrue(), "plop");
            return false;
        }

        for ($i = 0; $i < count ($a); $i++){
            if ($a[$i] !== $b[$i]){
                static::assertThat(false, static::isTrue(), "plop");
                return false;
            }
        }
        static::assertThat(true, static::isTrue(), "plop");
        return true;
    }
}