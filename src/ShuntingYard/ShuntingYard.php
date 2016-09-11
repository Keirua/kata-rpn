<?php

namespace ShuntingYard;

use Component\Stack;

class Operator {
    const LEFT_ASSOCIATIVITY = 'left';
    const RIGHT_ASSOCIATIVITY = 'right';

    public $precedence;
    public $associativity;

    public function __construct ($p, $a){
        $this->precedence = $p;
        $this->associativity = $a;
    }
}

class ShuntingYard
{

/*
While there are tokens to be read:

        Read a token.
        If the token is a number, then add it to the output queue.
        If the token is a function token, then push it onto the stack.
        If the token is a function argument separator (e.g., a comma):

            Until the token at the top of the stack is a left parenthesis,
            pop operators off the stack onto the output queue.
            If no left parentheses are encountered, either the separator was misplaced or parentheses were mismatched.

        If the token is an operator, o1, then:

            while there is an operator token o2, at the top of the operator stack and either
                o1 is left-associative and its precedence is less than or equal to that of o2, or
                o1 is right associative, and has precedence less than that of o2,
                    pop o2 off the operator stack, onto the output queue;
            at the end of iteration push o1 onto the operator stack.

        If the token is a left parenthesis (i.e. "("), then push it onto the stack.
        If the token is a right parenthesis (i.e. ")"):

            Until the token at the top of the stack is a left parenthesis, pop operators off the stack onto the output queue.
Pop the left parenthesis from the stack, but not onto the output queue.
            If the token at the top of the stack is a function token, pop it onto the output queue.
            If the stack runs out without finding a left parenthesis, then there are mismatched parentheses.

When there are no more tokens to read:

        While there are still operator tokens in the stack:
            If the operator token on the top of the stack is a parenthesis, then there are mismatched parentheses.
            Pop the operator onto the output queue.

    Exit.
*/
    public function convertToRpn(array $tokens){
        $outputQueue = [];
        $operatorStack = new Stack();

        $operators = [
            '^' => new Operator(4, Operator::RIGHT_ASSOCIATIVITY),
            '*' => new Operator(3, Operator::LEFT_ASSOCIATIVITY),
            '/' => new Operator(3, Operator::LEFT_ASSOCIATIVITY),
            '+' => new Operator(2, Operator::LEFT_ASSOCIATIVITY),
            '-' => new Operator(2, Operator::LEFT_ASSOCIATIVITY)
        ];

        $availableFunctions = ["sin", "cos", "sqrt", "max"];

        foreach ($tokens as $currToken){
            if (is_numeric($currToken)){
                array_push($outputQueue, $currToken);
            }
            // Is function ?
            else if (in_array($currToken, $availableFunctions)){
                $operatorStack->push($currToken);
            }
            // Is argument separator ?
            /*
                        Until the token at the top of the stack is a left parenthesis,
                        pop operators off the stack onto the output queue.
                        If no left parentheses are encountered, either the separator was misplaced or parentheses were mismatched.
            */
            else if ($currToken == ','){

            }
            // Is operator ?
            else if (array_key_exists($currToken, $operators)) {
                $o1Operator = $operators[$currToken];
                $o2 = $operatorStack->top();
                if ($o2 != null && array_key_exists($o2, $operators)) {
                    $o2Operator = $operators[$o2];
                    while ($o2!= null && array_key_exists($o2, $operators) && $this->evalPrecedence($o1Operator, $o2Operator)){
                        $operatorStack->pop();
                        array_push($outputQueue, $o2);

                        $o2 = $operatorStack->top();
                        if ($o2 != null){
                            $o2Operator = $operators[$o2];
                        }
                    }
                }
                $operatorStack->push($currToken);
            }
            // Left par
            else if ($currToken == '('){
                $operatorStack->push($currToken);
            }
            // Right par
            else if ($currToken == ')'){
                do {
                    $topToken = $operatorStack->pop();
                    if ($topToken !='(' /*in_array($currToken, $availableFunctions) || array_key_exists($currToken, $operators)*/) {
                        array_push($outputQueue, $topToken);
                    }
                } while(!$operatorStack->isEmpty() && $topToken !='(');
                // todo: add error checking that left par is found
            }
        }
        while (!$operatorStack->isEmpty()) {
            array_push($outputQueue, $operatorStack->top());
            $operatorStack->pop();
        }
        return $outputQueue;
    }

    public function evalPrecedence(Operator $o1, Operator $o2){
        return ($o1->associativity == Operator::LEFT_ASSOCIATIVITY && $o1->precedence <= $o2->precedence)
        || ($o1->associativity == Operator::RIGHT_ASSOCIATIVITYand && $o1->precedence < $o2->precedence);
    }
}