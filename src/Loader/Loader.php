<?php namespace NathanBurkett\Mesa\Loader;

/**
 * Interface Loader
 *
 * @package NathanBurkett\Mesa\Loader
 */
interface Loader
{
    /**
     * @return iterable
     */
    public function load(): iterable;
}
