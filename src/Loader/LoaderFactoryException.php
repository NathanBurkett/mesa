<?php namespace NathanBurkett\Mesa\Loader;

class LoaderFactoryException extends \LogicException
{
    /**
     * @param string $type
     * @param int $code
     * @param \Throwable|null $previous
     *
     * @return LoaderFactoryException
     */
    public static function unimplementedTypeLoaderFactory(
        string $type,
        int $code = 0,
        \Throwable $previous = null
    ): self {
        $message = sprintf('Unimplemented LoaderFactory type \'%s\'', $type);
        return new static($message, $code, $previous);
    }
}
