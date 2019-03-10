<?php namespace NathanBurkett\Mesa\Output;

interface OutputStrategy
{
    /**
     * Produce the table.
     *
     * @param iterable $table
     * @param callable|null $setup
     *
     * @return iterable
     */
    public function produce(iterable $table, callable $setup = null): iterable;
}
