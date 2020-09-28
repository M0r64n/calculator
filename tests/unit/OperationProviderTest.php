<?php

use app\Operations;
use app\Providers\OperationProvider;

class OperationProviderTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function testSingleton()
    {
        $instance1 = OperationProvider::getInstance();
        $instance2 = OperationProvider::getInstance();

        expect($instance1)->isInstanceOf(OperationProvider::class);
        expect($instance1)->equals($instance2);
    }

    public function testProviding()
    {
        $provider = OperationProvider::getInstance();

        expect($provider->getOperation(OperationProvider::ADDITION_KEY, 1, 1))
            ->isInstanceOf(Operations\Addition::class);
        expect($provider->getOperation(OperationProvider::SUBTRACTION_KEY, 1, 1))
            ->isInstanceOf(Operations\Subtraction::class);
        expect($provider->getOperation(OperationProvider::DIVISION_KEY, 1, 1))
            ->isInstanceOf(Operations\Division::class);
        expect($provider->getOperation(OperationProvider::MULTIPLICATION_KEY, 1, 1))
            ->isInstanceOf(Operations\Multiplication::class);
    }

    public function testNullOperation()
    {
        $provider = OperationProvider::getInstance();

        expect($provider->getOperation(-1, 1, 1))
            ->isInstanceOf(Operations\NullOperation::class);
    }
}
