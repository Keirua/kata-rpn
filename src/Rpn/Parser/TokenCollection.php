<?php

namespace Rpn\Parser;

class TokenCollection
{
    private $collection;
    public function __construct($collectionAsArray)
    {
        $this->collection = $this->convertArray($collectionAsArray);
    }

    private function convertArray($array)
    {
        return array_map(function ($value) {
            return new Token($value);
        }, $array);
    }

    public function getCollection()
    {
        return $this->collection;
    }
}
