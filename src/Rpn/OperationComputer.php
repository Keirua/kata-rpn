<?php
namespace Rpn;

class OperationComputer{
    private $operators;

    public function __construct() {
        $this->operators = [];
    }

    public function registerOperator ($name, $operator){
        if ($this->isValid($name)){
            throw new \LogicException(sprintf("The operator %s has already been registered"));
        }

        $this->operators[$name] = $operator;
    }

    public function compute ($name, $value1, $value2){
        if (!$this->isValid($name))
            throw new \LogicException(sprintf("Operator %s is not a valid operator", $name));

        return $this->operators[$name] ->compute($value1, $value2);
    }

    public function isValid($name){
        return array_key_exists($name, $this->operators);
    }
}