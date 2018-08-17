<?php

namespace Interop\Container\Factories;

use Psr\Container\ContainerInterface;

/**
 * A factory that creates an alias to another container entry.
 */
final class Alias
{
    private $alias;

    /**
     * Creates an alias.
     *
     * @param string $alias The identifier of the container entry that is aliased
     */
    public function __construct($alias)
    {
        $this->alias = $alias;
    }

    /**
     * Returns the identifier of the container entry that is aliased.
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Returns the alias.
     *
     * @param ContainerInterface $container
     *
     * @return mixed
     */
    public function __invoke(ContainerInterface $container)
    {
        return $container->get($this->alias);
    }
}
