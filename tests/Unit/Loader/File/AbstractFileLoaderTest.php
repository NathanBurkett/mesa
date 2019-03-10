<?php namespace NathanBurkett\Mesa\Tests\Unit\Loader\File;

use NathanBurkett\Mesa\Loader\File\AbstractFileLoader;
use NathanBurkett\Mesa\Loader\File\FileLoaderException;
use PHPUnit\Framework\TestCase;

class AbstractFileLoaderTest extends TestCase
{
    public function testFileNotFoundViaRealpathThrowsException()
    {
        $this->expectException(FileLoaderException::class);

        new FileLoaderDouble(__DIR__ . '/example.txt');
    }
}
