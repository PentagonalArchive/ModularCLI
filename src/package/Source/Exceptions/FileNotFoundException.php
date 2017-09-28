<?php
declare(strict_types=1);

namespace Pentagonal\ModularCLI\Source\Exceptions;

/**
 * Class FileNotFoundException
 * @package Pentagonal\ModularCLI\Source\Exceptions
 */
class FileNotFoundException extends InvalidPathException
{
    /**
     * FileNotFoundException constructor.
     * @param string $path
     * @param string $message
     */
    public function __construct(string $path, string $message = '')
    {
        $message = $message ?: "File {$path} has not found!";
        parent::__construct($path, $message);
    }
}
