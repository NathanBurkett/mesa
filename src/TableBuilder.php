<?php namespace NathanBurkett\Mesa;

use NathanBurkett\Mesa\Loader\Loader;
use NathanBurkett\Mesa\Output\OutputStrategy;

/**
 * Class TableBuilder
 *
 * @package NathanBurkett\Mesa
 */
class TableBuilder
{
    /**
     * @var Loader
     */
    protected $loader;

    /**
     * @var OutputStrategy
     */
    protected $outputStrategy;

    /**
     * TableBuilder constructor.
     *
     * @param Loader $loader
     * @param OutputStrategy $outputStrategy
     */
    public function __construct(Loader $loader, OutputStrategy $outputStrategy)
    {
        $this->loader = $loader;
        $this->outputStrategy = $outputStrategy;
    }

    /**
     * Load and output the table.
     *
     * @param callable|null $tableRowAffection
     *
     * @return iterable
     */
    public function run(callable $tableRowAffection = null): iterable
    {
        return $this->outputStrategy->produce($this->loader->load(), $tableRowAffection);
    }
}
