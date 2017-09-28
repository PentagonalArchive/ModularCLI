<?php
declare(strict_types=1);

namespace Pentagonal\ModularCLI\Source;

use Pentagonal\ModularCLI\Source\Exceptions\ContainerException;
use Pentagonal\ModularCLI\Source\Exceptions\ContainerNotFoundException;
use Pimple\Container as PimpleContainer;
use Psr\Container\ContainerInterface;

/**
 * Class Container
 */
class Container extends PimpleContainer implements ContainerInterface
{
    /**
     * {@inheritdoc}
     */
    public function get($id)
    {
        if (!$this->offsetExists($id)) {
            throw new ContainerNotFoundException(sprintf('Identifier "%s" is not defined.', $id));
        }
        try {
            return $this->offsetGet($id);
        } catch (\InvalidArgumentException $exception) {
            $trace = $exception->getTrace()[0];
            if ($trace['class'] === PimpleContainer::class && $trace['function'] === 'offsetGet') {
                throw new ContainerException(
                    sprintf('Container error while retrieving "%s"', $id),
                    null,
                    $exception
                );
            } else {
                throw $exception;
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function has($id)
    {
        return $this->offsetExists($id);
    }
}
