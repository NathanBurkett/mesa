<?php namespace NathanBurkett\Mesa;

use NathanBurkett\Mesa\Loader\LoaderFactory;
use NathanBurkett\Mesa\Loader\LoaderFactoryInterface;
use NathanBurkett\Mesa\Output\OutputGenerator;
use NathanBurkett\Mesa\Output\OutputStrategy;

trait GeneratesTables
{
    /**
     * @param mixed $tableContext
     * @param callable|null $rowSetup
     *
     * @return iterable
     */
    protected function generateTable($tableContext, callable $rowSetup = null): iterable
    {
        $loader = $this->getLoaderFactory()::create($tableContext);

        return $this->getOutputStrategy()->produce($loader->load(), $rowSetup);
    }

    /**
     * Get file loader LoaderFactoryInterface.
     *
     * @return LoaderFactoryInterface
     */
    protected function getLoaderFactory(): LoaderFactoryInterface
    {
        return new LoaderFactory();
    }

    /**
     * Get table output strategy.
     *
     * @return OutputStrategy
     */
    protected function getOutputStrategy(): OutputStrategy
    {
        return new OutputGenerator();
    }
}
