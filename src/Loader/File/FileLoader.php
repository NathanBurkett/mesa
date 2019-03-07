<?php namespace NathanBurkett\Mesa\Loader\File;

use NathanBurkett\Mesa\Loader\Loader;

/**
 * Interface FileLoader
 *
 * @package NathanBurkett\Mesa\Loader\File
 */
interface FileLoader extends Loader
{
    /**
     * Get loader context.
     *
     * @return string
     */
    public function getContext(): string;
}
