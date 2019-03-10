<?php namespace NathanBurkett\Mesa\Tests\Loader\File;

use NathanBurkett\Mesa\Loader\File\PhpLoader;
use PHPUnit\Framework\TestCase;

class PhpLoaderTest extends TestCase
{
    public function testLoad()
    {
        $loader = new PhpLoader(__DIR__ . '/example.php');
        $actual = $loader->load();
        $this->assertInstanceOf(\Traversable::class, $actual);
    }
}
