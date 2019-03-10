<?php namespace NathanBurkett\Mesa\Tests\Unit\Loader\File;

use NathanBurkett\Mesa\Loader\File\YamlLoader;
use PHPUnit\Framework\TestCase;

class YamlLoaderTest extends TestCase
{
    public function testLoad()
    {
        $loader = new YamlLoader(__DIR__ . '/example.yaml');
        $actual = $loader->load();
        $this->assertInstanceOf(\Traversable::class, $actual);
    }
}
