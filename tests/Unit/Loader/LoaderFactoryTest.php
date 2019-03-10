<?php namespace NathanBurkett\Mesa\Tests\Unit\Loader;

use NathanBurkett\Mesa\Loader\Loader;
use NathanBurkett\Mesa\Loader\LoaderFactory;
use NathanBurkett\Mesa\Loader\LoaderFactoryException;
use NathanBurkett\Mesa\Loader\LoaderFactoryInterface;
use PHPUnit\Framework\TestCase;

class LoaderFactoryTest extends TestCase
{
    /**
     * @var LoaderFactory
     */
    private $factory;

    protected function setUp()
    {
        $this->factory = new LoaderFactory();
    }

    public function testInstance()
    {
        $this->assertInstanceOf(LoaderFactoryInterface::class, $this->factory);
    }

    public function testGetBooleanLoaderFactory()
    {
        $this->expectException(LoaderFactoryException::class);

        $context = true;
        $this->factory::create($context);
    }

    public function testGetIntegerLoaderFactory()
    {
        $this->expectException(LoaderFactoryException::class);

        $context = 1;
        $this->factory::create($context);
    }

    public function testGetDoubleLoaderFactory()
    {
        $this->expectException(LoaderFactoryException::class);

        $context = 4.00;
        $this->factory::create($context);
    }

    public function testGetStringLoaderFactory()
    {
        $context = __DIR__ . '/File/example.php';
        $loader = $this->factory::create($context);

        $this->assertInstanceOf(Loader::class, $loader);
    }

    public function testGetArrayLoaderFactory()
    {
        $this->expectException(LoaderFactoryException::class);

        $context = [];
        $this->factory::create($context);
    }

    public function testGetObjectLoaderFactory()
    {
        $this->expectException(LoaderFactoryException::class);

        $context = new \stdClass();
        $this->factory::create($context);
    }

    public function testGetResourceLoaderFactory()
    {
        $this->expectException(LoaderFactoryException::class);

        $context = xml_parser_create('');
        $this->factory::create($context);
    }

    public function testGetNullLoaderFactory()
    {
        $this->expectException(LoaderFactoryException::class);

        $context = null;
        $this->factory::create($context);
    }
}
