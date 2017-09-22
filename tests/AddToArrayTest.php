<?php

namespace Interop\Container\Factories;

use Mouf\Picotainer\Picotainer;

class AddToArrayTest extends \PHPUnit_Framework_TestCase
{
    public function testAddToArray()
    {
        $container = new Picotainer([
            'baz' => function () {
                return 'yeah!';
            },
        ]);

        $addToArray = new AddToArray('baz');

        $this->assertSame('baz', $addToArray->getAddedService());
        $this->assertSame(['bar', 'yeah!'], $addToArray($container, ['bar']));
    }

    public function testAddToEmptyArray()
    {
        $container = new Picotainer([
            'baz' => function () {
                return 'yeah!';
            },
        ]);

        $addToArray = new AddToArray('baz');

        $this->assertSame(['yeah!'], $addToArray($container));
    }
}
