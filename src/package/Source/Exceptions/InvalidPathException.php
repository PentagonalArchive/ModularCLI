<?php
declare(strict_types=1);

namespace Pentagonal\ModularCLI\Source\Exceptions;

use Exception;

/**
 * Class InvalidPathException
 * @package Pentagonal\ModularCLI\Source\Exceptions
 */
class InvalidPathException extends Exception
{
    /**
     * @var string
     */
    protected $path;

    /**
     * InvalidPathException constructor.
     * @param string $path
     * @param string $message
     */
    public function __construct(string $path, string $message = '')
    {
        $this->path = $path;
        if (func_num_args() > 1) {
            $this->message = $message;
        } else {
            $this->message = "Invalid path of {$path}";
        }
    }

    /**
     * Get Path
     *
     * @return string
     */
    public function getPath() : string
    {
        return $this->path;
    }
}
