<?php namespace NathanBurkett\Mesa\Loader\File;

/**
 * Class PhpLoader
 *
 * @package NathanBurkett\Mesa\Loader
 */
class PhpLoader extends AbstractFileLoader
{
    /**
     * @return \Traversable
     */
    public function load(): \Traversable
    {
        /** @var array $tables */
        $tables = require $this->getContext();

        return new \ArrayIterator($tables);
    }
}
