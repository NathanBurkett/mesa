<?php namespace NathanBurkett\Mesa\Loader;

/**
 * Interface Loader
 *
 * @package NathanBurkett\Mesa\Loader
 */
interface Loader
{
    /**
     * @return \Traversable
     */
    public function load(): \Traversable;
}
