<?php

namespace Interop\Container\Factories;

/**
 * A factory that creates a container entry that is actually just a parameter/constant.
 */
final class Parameter
{
    private $value;

    /**
     * Creates a parameter.
     *
     * @param scalar|array $value The value of the parameter. This should be a scalar or an array of scalar values
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Returns the value of the parameter.
     *
     * @return scalar|array
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Returns the value of the parameter.
     *
     * @return scalar|array
     */
    public function __invoke()
    {
        return $this->value;
    }
}
