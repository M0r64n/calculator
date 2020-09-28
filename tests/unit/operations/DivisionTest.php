<?php namespace operations;

use app\Operations\Division;

class DivisionTest extends \Codeception\Test\Unit
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
            for ($j = -101; $j < 100; ++$j ?: ++$j) {
                expect((new Division($i, $j))->execute())->equals($i / $j);
            }
        }
    }

    public function testExceptions()
    {
        $this->expectException(\Exception::class);
        (new Division(1, 0))->execute();
    }
}