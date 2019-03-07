<?php namespace NathanBurkett\Mesa\Output;

interface OutputStrategy
{
    /**
     * Produce the table.
     *
     * @param \Traversable $table
     * @param callable|null $setup
     *
     * @return \Traversable
     */
    public function produce(\Traversable $table, callable $setup = null): \Traversable;
}
