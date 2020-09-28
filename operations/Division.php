<?php


namespace app\Operations;


use app\interfaces\IOperation;
use Exception;
use Yii;

class Division implements IOperation
{
    protected float $first_operand;
    protected float $second_operand;

    public function __construct(float $first_operand, float $second_operand)
    {
        $this->first_operand = $first_operand;
        $this->second_operand = $second_operand;
    }

    /**
     * @return float
     * @throws Exception
     */
    function execute(): float
    {
        if ($this->second_operand == 0) {
            throw new Exception(Yii::t('app', 'Division by zero'));
        }
        return $this->first_operand / $this->second_operand;
    }
}
