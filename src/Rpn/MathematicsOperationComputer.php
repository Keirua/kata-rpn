<?php

namespace Rpn;

class MathematicsOperationComputer extends OperationComputer
{
    public function __construct()
    {
        parent::__construct();
        $this->registerOperator('+', new Operators\Mathematics\Addition());
        $this->registerOperator('-', new Operators\Mathematics\Substraction());
        $this->registerOperator('*', new Operators\Mathematics\Multiplication());
        $this->registerOperator('x', new Operators\Mathematics\Multiplication());
        $this->registerOperator('/', new Operators\Mathematics\Division());
        $this->registerOperator('SQR', new Operators\Mathematics\Square());
    }
}
