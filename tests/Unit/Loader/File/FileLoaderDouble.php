<?php namespace NathanBurkett\Mesa\Tests\Unit\Loader\File;

use NathanBurkett\Mesa\Loader\File\AbstractFileLoader;

class FileLoaderDouble extends AbstractFileLoader
{
    /**
     * @return iterable
     */
    public function load(): iterable
    {
        return [];
    }
}
