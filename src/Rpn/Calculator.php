<?php

namespace Rpn;

class Calculator
{
    private $operationComputer;
    private $tokenizer;

    public function __construct()
    {
        $this->operationComputer = new MathematicsOperationComputer();
        $this->tokenizer = new Parser\Tokenizer();
    }

    public function compute($operation)
    {
        $tokenCollection = $this->tokenizer->parse($operation);
        $stack = [];

        while (count($tokenCollection) != 0) {
            $currentToken = array_shift($tokenCollection);
            $this->processToken($currentToken, $stack);
        }

        return array_pop($stack);
    }

    private function processToken($currentToken, &$stack)
    {
        $resultValue = $currentToken->getValue();

        if (!is_numeric($currentToken->getValue())) {
            $resultValue = $this->operationComputer->compute($currentToken->getValue(), $stack);
        }

        array_push($stack, $resultValue);
    }
}
