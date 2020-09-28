<?php namespace operations;

use app\Operations\NullOperation;

class NullOperationTest extends \Codeception\Test\Unit
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

    public function testExceptions()
    {
        $this->expectException(\Exception::class);
        (new NullOperation(1, 1))->execute();
    }
}