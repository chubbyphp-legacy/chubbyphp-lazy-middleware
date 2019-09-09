# chubbyphp-lazy-middleware

[![Build Status](https://api.travis-ci.org/chubbyphp/chubbyphp-lazy-middleware.png?branch=master)](https://travis-ci.org/chubbyphp/chubbyphp-lazy-middleware)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/chubbyphp/chubbyphp-lazy-middleware/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/chubbyphp/chubbyphp-lazy-middleware/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/chubbyphp/chubbyphp-lazy-middleware/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/chubbyphp/chubbyphp-lazy-middleware/?branch=master)
[![Total Downloads](https://poser.pugx.org/chubbyphp/chubbyphp-lazy-middleware/downloads.png)](https://packagist.org/packages/chubbyphp/chubbyphp-lazy-middleware)
[![Monthly Downloads](https://poser.pugx.org/chubbyphp/chubbyphp-lazy-middleware/d/monthly)](https://packagist.org/packages/chubbyphp/chubbyphp-lazy-middleware)
[![Latest Stable Version](https://poser.pugx.org/chubbyphp/chubbyphp-lazy-middleware/v/stable.png)](https://packagist.org/packages/chubbyphp/chubbyphp-lazy-middleware)
[![Latest Unstable Version](https://poser.pugx.org/chubbyphp/chubbyphp-lazy-middleware/v/unstable)](https://packagist.org/packages/chubbyphp/chubbyphp-lazy-middleware)

## Description

**DEPRECATED**: Middlewares in Slim3 are already lazy...

**IMPORTANT**: If you're interested in a lazy adapter for psr-15 middleware, i suggest to use [chubbyphp/chubbyphp-slim-psr15][2]. Same applies if your searching for a psr-15 request handler.

Allow to lazyload middlewares.

## Requirements

 * php: ~7.0
 * psr/container: ~1.0
 * psr/http-message: ~1.0

## Installation

Through [Composer](http://getcomposer.org) as [chubbyphp/chubbyphp-lazy-middleware][1].

```sh
composer require chubbyphp/chubbyphp-lazy-middleware "~1.1"
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
[2]: https://github.com/chubbyphp/chubbyphp-slim-psr15#lazy-middleware-adapter

## Copyright

Dominik Zogg 2016
