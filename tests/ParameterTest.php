<?php

namespace Interop\Container\Factories;

class ParameterTest extends \PHPUnit_Framework_TestCase
{
    public function testParameter()
    {
        $parameter = new Parameter('foo');

        $this->assertSame('foo', $parameter->getValue());
        $this->assertSame('foo', $parameter());
    }
}
