<?php


namespace app\Operations;


use app\interfaces\IOperation;
use Exception;
use Yii;

class NullOperation implements IOperation
{
    protected float $first_operand;
    protected float $second_operand;

    public function __construct(float $first_operand, float $second_operand)
    {
    }

    /**
     * @throws Exception
     */
    function execute(): float
    {
        throw new Exception(Yii::t('app', 'Unknown operation'));
    }
}
