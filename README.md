[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/container-interop/common-factories/badges/quality-score.png?b=1.0)](https://scrutinizer-ci.com/g/container-interop/common-factories/?branch=1.0)
[![Build Status](https://travis-ci.org/container-interop/common-factories.svg?branch=1.0)](https://travis-ci.org/container-interop/common-factories)
[![Coverage Status](https://coveralls.io/repos/container-interop/common-factories/badge.svg?branch=1.0&service=github)](https://coveralls.io/github/container-interop/common-factories?branch=1.0)


# Utility factories for container-interop/service-provider

**Work in progress.**

This project is part of the [container-interop](https://github.com/container-interop/container-interop) group. It tries to find a solution for cross-framework modules (aka bundles) by the means of container-agnostic configuration.

## Goal of this project

This project provides utility factories that can be used directly in service providers complying with the [container-interop/service-provider](https://github.com/container-interop/service-provider) standard.

Those common factories can be detected by compiled/cached containers. The aim of this package is to offer a common set of useful classes that can also be preprocessed by optimized containers for best performance.

## Usage

Simply require this package in your package declaring your service-provider:

```sh
composer require container-interop/common-factories
```

Then, you can use one of the 3 available classes:

### Creating an alias

Use the `Alias` class to easily create an alias:

