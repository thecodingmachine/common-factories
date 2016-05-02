<?php

namespace Interop\Container\Factories;

use Mouf\Picotainer\Picotainer;

class AliasTest extends \PHPUnit_Framework_TestCase
{
    public function testAlias()
    {
        $container = new Picotainer([
            'foo' => function () {
                return 'bar';
            },
        ]);

        $alias = new Alias('foo');

        $this->assertSame('foo', $alias->getAlias());
        $this->assertSame('bar', $alias($container));
    }
}
