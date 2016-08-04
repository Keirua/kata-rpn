<?php

namespace Rpn;

class MathematicsOperationComputer extends OperationComputer {
    public function __construct(){
        parent::__construct();
        $this->registerOperator('+', new Operators\Addition() );
        $this->registerOperator('-', new Operators\Substraction() );
        $this->registerOperator('*', new Operators\Multiplication() );
        $this->registerOperator('x', new Operators\Multiplication() );
        $this->registerOperator('/', new Operators\Division() );
    }
}