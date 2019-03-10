<?php namespace NathanBurkett\Mesa\Tests\Output;

use NathanBurkett\Mesa\Output\OutputGenerator;
use PHPUnit\Framework\TestCase;

class OutputGeneratorTest extends TestCase
{
    /**
     * @var OutputGenerator
     */
    private $outputStrategy;

    protected function setUp()
    {
        $this->outputStrategy = new OutputGenerator();
    }

    public function testProduceWithDefaultSetup()
    {
        $table = [
            'one' => [
                'one-one' => 1,
                'one-two' => 2,
            ],
            'two' => [
                'two-one' => 1,
                'two-two' => 2,
            ],
        ];

        $iterable = $this->outputStrategy->produce($table);

        foreach ($iterable as $key => $row) {
            $this->assertEquals($table[$key], $row);
        }
    }

    public function testProduceWithCustomSetup()
    {
        $table = [
            'one' => [
                'one-one' => 1,
                'one-two' => 2,
            ],
            'two' => [
                'two-one' => 1,
                'two-two' => 2,
            ],
        ];

        $iterable = $this->outputStrategy->produce($table, function(array $row) {
            $row[] = 'last';

            return $row;
        });

        foreach ($iterable as $key => $row) {
            $this->assertEquals('last', end($row));
        }
    }
}
