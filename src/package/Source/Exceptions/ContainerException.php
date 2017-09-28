<?php
declare(strict_types=1);

namespace Pentagonal\ModularCLI\Source\Exceptions;

use Interop\Container\Exception\ContainerException as InteropContainerException;

/**
 * Class ContainerException
 * @package Pentagonal\ModularCLI\Source\Exceptions
 */
class ContainerException extends \InvalidArgumentException implements InteropContainerException
{
}
