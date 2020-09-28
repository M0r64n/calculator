<?php


namespace app\Models;


use app\Providers\OperationProvider;
use Yii;
use yii\base\Model;

/**
 * Class CalculatorForm
 * @package app\Models]
 *
 * @property string[] $operations
 */
class CalculatorForm extends Model
{
    public $first_operand;
    public $operation_key;
    public $second_operand;

    public function rules()
    {
        return [
            [['first_operand', 'second_operand', 'operation_key'], 'required'],
            [['first_operand', 'second_operand'], 'number'],
            ['operation_key', 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'first_operand' => 'First operand',
            'operation_key' => 'Operation',
            'second_operand' => 'Second operand',
        ];
    }

    public function getOperations(): array
    {
        return [
            OperationProvider::ADDITION_KEY => Yii::t('app', 'plus'),
            OperationProvider::SUBTRACTION_KEY => Yii::t('app', 'minus'),
            OperationProvider::DIVISION_KEY => Yii::t('app', 'divided by'),
            OperationProvider::MULTIPLICATION_KEY => Yii::t('app', 'times'),
        ];
    }
}
