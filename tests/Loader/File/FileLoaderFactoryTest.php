<?php namespace NathanBurkett\Mesa\Tests\Loader\File;

use NathanBurkett\Mesa\Loader\File\FileLoaderException;
use NathanBurkett\Mesa\Loader\File\FileLoaderFactory;
use NathanBurkett\Mesa\Loader\File\PhpLoader;
use NathanBurkett\Mesa\Loader\File\YamlLoader;
use NathanBurkett\Mesa\Loader\LoaderFactoryInterface;
use PHPUnit\Framework\TestCase;

class FileLoaderFactoryTest extends TestCase
{
    /**
     * @var FileLoaderFactory
     */
    private $factory;

    protected function setUp()
    {
        $this->factory = new FileLoaderFactory();
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf(LoaderFactoryInterface::class, $this->factory);
    }

    public function testPhpLoader()
    {
        $context = __DIR__ . '/example.php';
        $instance = $this->factory::create($context);
        $this->assertInstanceOf(PhpLoader::class, $instance);
    }

    public function testYamlLoader()
    {
        $context = __DIR__ . '/example.yaml';
        $instance = $this->factory::create($context);
        $this->assertInstanceOf(YamlLoader::class, $instance);
    }

    public function testUnknownExtensionThrowsException()
    {
        $this->expectException(FileLoaderException::class);
        $context = __DIR__ . '/foo.txt';
        $this->factory::create($context);
    }

}
