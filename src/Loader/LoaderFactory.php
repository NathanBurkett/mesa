<?php namespace NathanBurkett\Mesa\Loader;

use NathanBurkett\Mesa\Loader\File\FileLoaderFactory;

/**
 * Class LoaderFactory
 *
 * @package NathanBurkett\Mesa\Loader
 */
class LoaderFactory implements LoaderFactoryInterface
{
    /**
     * @var string
     * @see http://php.net/manual/en/function.gettype.php
     */
    const TYPE_BOOLEAN = "boolean",
        TYPE_INTEGER = "integer",
        TYPE_DOUBLE = "double",
        TYPE_STRING = "string",
        TYPE_ARRAY = "array",
        TYPE_OBJECT = "object",
        TYPE_RESOURCE = "resource",
        TYPE_NULL = "NULL",
        TYPE_UNKNOWN_TYPE = "unknown type";

    /**
     * @param mixed $context
     *
     * @see http://php.net/manual/en/function.gettype.php
     * @return Loader
     */
    public static function create($context): Loader
    {
        switch (gettype($context)) {
            case static::TYPE_BOOLEAN:
                return static::getBooleanLoaderFactory()::create($context);
            case static::TYPE_INTEGER:
                return static::getIntegerLoaderFactory()::create($context);
            case static::TYPE_DOUBLE:
                return static::getDoubleLoaderFactory()::create($context);
            case static::TYPE_STRING:
                return static::getStringLoaderFactory()::create($context);
            case static::TYPE_ARRAY:
                return static::getArrayLoaderFactory()::create($context);
            case static::TYPE_OBJECT:
                return static::getObjectLoaderFactory()::create($context);
            case static::TYPE_RESOURCE:
                return static::getResourceLoaderFactory()::create($context);
            case static::TYPE_NULL:
                return static::getNullLoaderFactory()::create($context);
        }
    }

    /**
     * Get boolean LoaderFactoryInterface.
     *
     * @return LoaderFactoryInterface
     */
    protected static function getBooleanLoaderFactory(): LoaderFactoryInterface
    {
        throw LoaderFactoryException::unimplementedTypeLoaderFactory(static::TYPE_BOOLEAN);
    }

    /**
     * Get integer LoaderFactoryInterface.
     *
     * @return LoaderFactoryInterface
     */
    protected static function getIntegerLoaderFactory(): LoaderFactoryInterface
    {
        throw LoaderFactoryException::unimplementedTypeLoaderFactory(static::TYPE_INTEGER);
    }

    /**
     * Get double LoaderFactoryInterface.
     *
     * @return LoaderFactoryInterface
     */
    protected static function getDoubleLoaderFactory(): LoaderFactoryInterface
    {
        throw LoaderFactoryException::unimplementedTypeLoaderFactory(static::TYPE_DOUBLE);
    }

    /**
     * Get string LoaderFactoryInterface.
     *
     * @return LoaderFactoryInterface
     */
    protected static function getStringLoaderFactory(): LoaderFactoryInterface
    {
        return new FileLoaderFactory();
    }

    /**
     * Get array LoaderFactoryInterface.
     *
     * @return LoaderFactoryInterface
     */
    protected static function getArrayLoaderFactory(): LoaderFactoryInterface
    {
        throw LoaderFactoryException::unimplementedTypeLoaderFactory(static::TYPE_ARRAY);
    }

    /**
     * Get object LoaderFactoryInterface.
     *
     * @return LoaderFactoryInterface
     */
    protected static function getObjectLoaderFactory(): LoaderFactoryInterface
    {
        throw LoaderFactoryException::unimplementedTypeLoaderFactory(static::TYPE_OBJECT);
    }

    /**
     * Get resource LoaderFactoryInterface.
     *
     * @return LoaderFactoryInterface
     */
    protected static function getResourceLoaderFactory(): LoaderFactoryInterface
    {
        throw LoaderFactoryException::unimplementedTypeLoaderFactory(static::TYPE_RESOURCE);
    }

    /**
     * Get null LoaderFactoryInterface.
     *
     * @return LoaderFactoryInterface
     */
    protected static function getNullLoaderFactory(): LoaderFactoryInterface
    {
        throw LoaderFactoryException::unimplementedTypeLoaderFactory(static::TYPE_NULL);
    }
}
