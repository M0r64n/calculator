<?php


namespace app\interfaces;


interface IOperation
{
    function __construct(float $first_operand, float $second_operand);

    function execute(): float;
}