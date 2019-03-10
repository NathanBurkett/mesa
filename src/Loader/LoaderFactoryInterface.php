<?php
namespace NathanBurkett\Mesa\Loader;

use NathanBurkett\Mesa\Loader\File\FileLoaderException;

/**
 * Class LoaderFactory
 *
 * @package NathanBurkett\Mesa\Loader
 */
interface LoaderFactoryInterface
{
    /**
     * @param mixed $context
     *
     * @return Loader
     * @throws FileLoaderException
     */
    public static function create($context): Loader;
}
