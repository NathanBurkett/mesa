<?php namespace NathanBurkett\Mesa\Tests\Component;

use NathanBurkett\Mesa\Loader\File\PhpLoader;
use NathanBurkett\Mesa\Loader\Loader;
use NathanBurkett\Mesa\Loader\LoaderFactory;
use NathanBurkett\Mesa\Output\OutputGenerator;
use NathanBurkett\Mesa\Output\OutputStrategy;
use NathanBurkett\Mesa\TableBuilder;
use PHPUnit\Framework\TestCase;

class TableBuilderTest extends TestCase
{
    /**
     * @dataProvider generateRunTestCases
     *
     * @param Loader $loader
     * @param OutputStrategy $output
     * @param callable|null $rowCallback
     * @param callable $verification
     */
    public function testRun(
        Loader $loader,
        OutputStrategy $output,
        callable $rowCallback,
        callable $verification
    ) {
        $builder = new TableBuilder($loader, $output);

        $verification($this, $builder->run($rowCallback));
    }

    /**
     * @return \Generator
     */
    public function generateRunTestCases(): \Generator
    {
        $testCases = require __DIR__ . '/TestCases/TableBuilderTest/RunTestCases.php';

        foreach ($testCases as $name => $testCase) {
            yield $name => $this->setupRunTestCase($testCase);
        }
    }

    /**
     * @param array $testCase
     *
     * @return array
     */
    protected function setupRunTestCase(array $testCase): array
    {
        $context = $testCase['context'];

        $loader = LoaderFactory::create($context);

        $output = new OutputGenerator();

        return [
            $loader,
            $output,
            $testCase['rowSetup'],
            $testCase['assertion'],
        ];
    }
}
