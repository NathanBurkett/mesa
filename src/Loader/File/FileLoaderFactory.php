<?php namespace NathanBurkett\Mesa\Loader\File;

use NathanBurkett\Mesa\Loader\Loader;
use NathanBurkett\Mesa\Loader\LoaderFactoryInterface;

/**
 * Class FileLoaderFactory
 *
 * @package NathanBurkett\Mesa\Loader
 */
class FileLoaderFactory implements LoaderFactoryInterface
{
    /**
     * @var string
     */
    const FILE_EXTENSION_PHP = 'php',
        FILE_EXTENSION_YAML = 'yaml';

    /**
     * @param string $context
     *
     * @return Loader
     */
    public static function create($context): Loader
    {
        $context = (string) $context;

        $extension = strtolower(pathinfo($context, PATHINFO_EXTENSION));

        switch ($extension) {
            case static::FILE_EXTENSION_PHP:
                return new PhpLoader($context);
            case static::FILE_EXTENSION_YAML:
                return new YamlLoader($context);
            default:
                throw FileLoaderException::unimplementedLoader($extension);
        }
    }
}
