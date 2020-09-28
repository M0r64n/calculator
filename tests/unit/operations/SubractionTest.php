<?php namespace operations;

use app\Operations\Subtraction;

class SubractionTest extends \Codeception\Test\Unit
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

    public function testExecution()
    {
        for ($i = -100; $i <= 100; $i++) {
            for ($j = -100; $j <= 100; $j++) {
                expect((new Subtraction($i, $j))->execute())->equals($i - $j);
            }
        }
    }
}