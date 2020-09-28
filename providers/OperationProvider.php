<?php


namespace app\Providers;


use app\interfaces\IOperation;
use app\Operations;

class OperationProvider
{
    const ADDITION_KEY = 0;
    const SUBTRACTION_KEY = 1;
    const DIVISION_KEY = 2;
    const MULTIPLICATION_KEY = 3;

    /**
     * @var string[] classes implement IOperation
     */
    protected array $operations;
    private static OperationProvider $instance;

    public static function getInstance()
    {
        return self::$instance ?? self::$instance = new self();
    }

    private function __construct()
    {
        $this->operations = [
            self::ADDITION_KEY => Operations\Addition::class,
            self::SUBTRACTION_KEY => Operations\Subtraction::class,
            self::DIVISION_KEY => Operations\Division::class,
            self::MULTIPLICATION_KEY => Operations\Multiplication::class,
        ];
    }

    /**
     * @param int $operation_key
     * @param float $first_operand
     * @param float $second_operand
     * @return IOperation
     */
    public function getOperation(int $operation_key, float $first_operand, float $second_operand): IOperation
    {
        $operation = $this->operations[$operation_key] ?? Operations\NullOperation::class;
        return new $operation($first_operand, $second_operand);
    }
}
