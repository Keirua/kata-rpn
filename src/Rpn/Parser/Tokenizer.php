<?php

namespace Rpn\Parser;

class Tokenizer
{
    public function parse($operation)
    {
        $explodedValues = explode(' ', $operation);
        $tokenCollection = new TokenCollection($explodedValues);

        return $tokenCollection->getCollection();
    }
}
