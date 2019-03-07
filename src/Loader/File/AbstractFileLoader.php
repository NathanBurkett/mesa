<?php namespace NathanBurkett\Mesa\Loader\File;

/**
 * Class AbstractFileLoader
 *
 * @package NathanBurkett\Mesa\Loader\File
 */
abstract class AbstractFileLoader implements FileLoader
{
    /**
     * @var string
     */
    private $context;

    /**
     * AbstractFileLoader constructor.
     *
     * @param string $context
     *
     * @throws FileLoaderException
     */
    public function __construct(string $context)
    {
        if (!$filePath = realpath($context)) {
            throw FileLoaderException::fileDoesNotExist($context);
        }

        $this->context = $filePath;
    }

    /**
     * Get loader context.
     *
     * @return string
     */
    public function getContext(): string
    {
        return $this->context;
    }
}
