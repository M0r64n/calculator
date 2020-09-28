<?php


namespace app\Operations;


use app\interfaces\IOperation;

class Addition implements IOperation
{
    protected float $first_operand;
    protected float $second_operand;

    public function __construct(float $first_operand, float $second_operand)
    {
        $this->first_operand = $first_operand;
        $this->second_operand = $second_operand;
    }

    function execute(): float
    {
        return $this->first_operand + $this->second_operand;
    }
}
