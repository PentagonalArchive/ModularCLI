<?php
declare(strict_types=1);

namespace Pentagonal\ModularCLI\Source\Exceptions;

use Interop\Container\Exception\NotFoundException as InteropNotFoundException;

/**
 * Class ContainerNotFoundException
 * @package Pentagonal\ModularCLI\Source\Exceptions
 */
class ContainerNotFoundException extends \RuntimeException implements InteropNotFoundException
{
}
