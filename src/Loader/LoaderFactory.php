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
                $factory = static::getBooleanLoaderFactory();
                break;
            case static::TYPE_INTEGER:
                $factory = static::getIntegerLoaderFactory();
                break;
            case static::TYPE_DOUBLE:
                $factory = static::getDoubleLoaderFactory();
                break;
            case static::TYPE_STRING:
                $factory = static::getStringLoaderFactory();
                break;
            case static::TYPE_ARRAY:
                $factory = static::getArrayLoaderFactory();
                break;
            case static::TYPE_OBJECT:
                $factory = static::getObjectLoaderFactory();
                break;
            case static::TYPE_RESOURCE:
                $factory = static::getResourceLoaderFactory();
                break;
            case static::TYPE_NULL:
                $factory = static::getNullLoaderFactory();
                break;
            case static::TYPE_UNKNOWN_TYPE:
                $factory = static::getUnknownTypeLoaderFactory();
                break;
            default:
                $factory = static::getUnknownTypeLoaderFactory();
        }

        return $factory::create($context);
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

    /**
     * Get unknown type LoaderFactoryInterface.
     *
     * @return LoaderFactoryInterface
     */
    protected static function getUnknownTypeLoaderFactory(): LoaderFactoryInterface
    {
        throw LoaderFactoryException::unimplementedTypeLoaderFactory(static::TYPE_UNKNOWN_TYPE);
    }
}
