<?php

namespace Component;

class Stack {
	private $values;

	private $position;

	public function __construct(){
		$this->values = [];
		$this->position =-1;
	}

	public function push($value){
        array_push($this->values, $value);
        $this->position++;
	}

	public function pop() {
		if ($this->position < 0){
			throw new \LogicException("Impossible to unstack more !");
			
		}
		$topValue = array_pop($this->values);
		$this->position--;

        return $topValue;
	}

	public function top(){
        if (array_key_exists($this->position, $this->values))
    		return $this->values[$this->position];
	    return null;
	}

	public function size(){
		return $this->position+1;
	}

    public function isEmpty() {
        return $this->size() == 0;
    }
}