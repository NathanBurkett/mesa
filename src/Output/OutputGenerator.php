<?php namespace NathanBurkett\Mesa\Output;

/**
 * Class OutputGenerator
 *
 * @package NathanBurkett\Mesa\Output
 */
class OutputGenerator implements OutputStrategy
{
    /**
     * Produce the table.
     *
     * @param \Traversable $table
     * @param callable|null $setup
     *
     * @return \Traversable
     */
    public function produce(\Traversable $table, callable $setup = null): \Traversable
    {
        foreach ($table as $index => $row) {
            yield from $this->handleIteration($index, $row, $setup ?? $this->getDefaultRowSetup());
        }
    }

    /**
     * @param int|string $index
     * @param mixed $row
     * @param callable $setup
     *
     * @return \Generator
     */
    protected function handleIteration($index, $row, callable $setup): \Generator
    {
        yield $index => $setup($row);
    }

    /**
     * @return callable
     */
    private function getDefaultRowSetup(): callable
    {
        return function ($row) {
            return $row;
        };
    }
}
