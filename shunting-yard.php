<?php

require 'vendor/autoload.php';

$operation = explode (' ', '2 + 3'); // expects 2 3 +
$operation =  explode (' ', "sin ( 2 + 3 )"); // expects 2 3 + sin

//$operation = [ "7", '*', "(", "2", "+", "3", ")" ]; // expects 7 2 3 + *
$operation = [ "7", '*', "(", "2", "+", "3", ")", "-", "4" ]; // expects 7 2 3 + * 4 -

// ( (A * B) + (C / D) )  => A B * C D / +
// $operation = [ "(", '(', "2", "*", "3", ")", "+", "(", "4", '/', "2", ')', ')' ];
// ((A * (B + C) ) / D) =>	( (A (B C +) *) D /)
// (A * (B + (C / D) ) ) => (A (B (C D /) +) *)

$algo = new \ShuntingYard\ShuntingYard();

echo "in\n";
echo var_dump($operation);
echo "out\n";
echo var_dump($algo->convertToRpn($operation));