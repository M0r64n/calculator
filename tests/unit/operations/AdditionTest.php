<?php namespace operations;

use app\Operations\Addition;

class AdditionTest extends \Codeception\Test\Unit
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
            for ($j = $i; $j <= 100; $j++) {
                expect((new Addition($i, $j))->execute())->equals($i + $j);
            }
        }
    }
}