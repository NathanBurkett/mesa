<?php namespace NathanBurkett\Mesa\Loader\File;

class FileLoaderException extends \LogicException
{
    /**
     * @param string $extension
     * @param int $code
     * @param \Throwable|null $previous
     *
     * @return FileLoaderException
     */
    public static function unimplementedLoader(
        string $extension,
        int $code = 0,
        \Throwable $previous = null
    ): self {
        return new static(sprintf('Unimplemented Loader type \'%s\'', $extension), $code, $previous);
    }

    /**
     * @param string $filePath
     * @param int $code
     * @param \Throwable|null $previous
     *
     * @return FileLoaderException
     */
    public static function fileDoesNotExist(
        string $filePath,
        int $code = 0,
        \Throwable $previous = null
    ): self {
        return new static(sprintf('File does not exist \'%s\'', $filePath), $code, $previous);
    }
}
