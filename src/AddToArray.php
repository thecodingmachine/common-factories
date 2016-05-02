<?php

namespace Interop\Container\Factories;

use Interop\Container\ContainerInterface;

/**
 * A factory that extends an existing array by adding an additional service to it.
 */
final class AddToArray
{
    private $serviceName;

    /**
     * @param string $serviceName The identifier of the service that is added to the array
     */
    public function __construct($serviceName)
    {
        $this->serviceName = $serviceName;
    }

    /**
     * Returns the identifier of the service that is added to the array.
     *
     * @return string
     */
    public function getAddedService()
    {
        return $this->serviceName;
    }

    /**
     * Extend the array by adding a new service to it.
     * The array is created if it does not exist yet.
     *
     * @param ContainerInterface $container
     * @param callable|null      $getPrevious
     *
     * @return array
     */
    public function __invoke(ContainerInterface $container, callable $getPrevious = null)
    {
        // Let's check if a previous value exists. If yes, let's resolve it.
        $previous = ($getPrevious === null) ? [] : $getPrevious();

        $previous[] = $container->get($this->serviceName);

        return $previous;
    }
}
