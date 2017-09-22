[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/thecodingmachine/common-factories/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/thecodingmachine/common-factories/?branch=master)
[![Build Status](https://travis-ci.org/thecodingmachine/common-factories.svg?branch=master)](https://travis-ci.org/thecodingmachine/common-factories)
[![Coverage Status](https://coveralls.io/repos/thecodingmachine/common-factories/badge.svg?branch=master&service=github)](https://coveralls.io/github/thecodingmachine/common-factories?branch=master)


# Utility factories for container-interop/service-provider

**Work in progress.**

This project is part of the [container-interop](https://github.com/container-interop/container-interop) group. It tries to find a solution for cross-framework modules (aka bundles) by the means of container-agnostic configuration.

## Goal of this project

This project provides utility factories that can be used directly in service providers complying with the [container-interop/service-provider](https://github.com/container-interop/service-provider) standard.

Those common factories can be detected by compiled/cached containers. The aim of this package is to offer a common set of useful classes that can also be preprocessed by optimized containers for best performance.

## Usage

Simply require this package in your package declaring your service-provider:

**So far, the package has the thecodingmachine vendor name. It will hopefully be migrated to  container-interop/common-factories**

```sh
composer require thecodingmachine/common-factories
```

Then, you can use one of the 3 available classes:

### Creating an alias

Use the `Alias` class to easily create an alias.

```php
public function getFactories() {
    return [
        'myAlias' => new Alias('myService')
    ]
}
```

can easily replace:

```php
public function getFactories() {
    return [
        'myAlias' => function(ContainerInterface $container) {
            return $container->get('myService');
        }
    ]
}
```

### Creating a parameter

Use the `Parameter` class to put in the container a scalar (or array of scalar) entry:

```php
public function getFactories() {
    return [
        'DB_HOST' => new Parameter('localhost')
    ]
}
```

can easily replace:

```php
public function getFactories() {
    return [
        'DB_HOST' => function() {
            return 'localhost';
        }
    ]
}
```

### Appending a service to an array of services

Use the `AddToArray` class to push a new service to an existing array:

```php
public function getExtensions() {
    return [
        MyTwigExtension::class => function() {
            return new MyTwigExtension();
        },
        'twig.extensions' => new AddToArray(MyTwigExtension::class)
    ]
}
```

can easily replace:

```php
public function getExtensions() {
    return [
        MyTwigExtension::class => function() {
            return new MyTwigExtension();
        },
        'twig.extensions' => function(ContainerInterface $container, array $extensions = []) {
            $extensions[] = $container->get(MyTwigExtension::class);
            return $extensions;
        }
    ]
}
```
