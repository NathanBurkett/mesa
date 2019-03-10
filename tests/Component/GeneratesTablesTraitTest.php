<?php namespace NathanBurkett\Mesa\Tests\Component;

use NathanBurkett\Mesa\GeneratesTables;
use PHPUnit\Framework\TestCase;

class GeneratesTablesTraitTest extends TestCase
{
    use GeneratesTables;

    /**
     * @dataProvider generateRunTestCases
     *
     * @param $context
     * @param callable $rowSetup
     * @param callable $assertion
     */
    public function testGenerateTable($context, callable $rowSetup, callable $assertion)
    {
        $table = $this->generateTable($context, $rowSetup);
        $assertion($this, $table);
    }

    /**
     * @return \Generator
     */
    public function generateRunTestCases(): \Generator
    {
        $testCases = require __DIR__ . '/TestCases/TableBuilderTest/RunTestCases.php';

        foreach ($testCases as $name => $testCase) {
            yield $name => $testCase;
        }
    }
}
