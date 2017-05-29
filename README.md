# chubbyphp-lazy-middleware

[![Build Status](https://api.travis-ci.org/chubbyphp/chubbyphp-lazy-middleware.png?branch=master)](https://travis-ci.org/chubbyphp/chubbyphp-lazy-middleware)
[![Total Downloads](https://poser.pugx.org/chubbyphp/chubbyphp-lazy-middleware/downloads.png)](https://packagist.org/packages/chubbyphp/chubbyphp-lazy-middleware)
[![Latest Stable Version](https://poser.pugx.org/chubbyphp/chubbyphp-lazy-middleware/v/stable.png)](https://packagist.org/packages/chubbyphp/chubbyphp-lazy-middleware)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/chubbyphp/chubbyphp-lazy-middleware/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/chubbyphp/chubbyphp-lazy-middleware/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/chubbyphp/chubbyphp-lazy-middleware/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/chubbyphp/chubbyphp-lazy-middleware/?branch=master)

## Description

Allow to lazyload middlewares.

## Requirements

 * php: ~7.0
 * container-interop/container-interop: ~1.1
 * psr/http-message: ~1.0

## Installation

Through [Composer](http://getcomposer.org) as [chubbyphp/chubbyphp-lazy-middleware][1].

```sh
composer require chubbyphp/chubbyphp-lazy-middleware "~1.0"
```

## Usage

```php
<?php

use Chubbyphp\Lazy\LazyMiddleware;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$container['service'] = function (Request $request, Response $response) {
    // run some lazy logic
};

$middleware = new LazyMiddleware($container, 'service');
$response = $middleware($request, $response);
```

[1]: https://packagist.org/packages/chubbyphp/chubbyphp-lazy-middleware

## Copyright

Dominik Zogg 2016
