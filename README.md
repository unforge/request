# Request

[![Build Status](https://secure.travis-ci.org/unforge/request-toolkit.svg?branch=master)](https://secure.travis-ci.org/unforge/request-toolkit)
[![Coverage Status](https://coveralls.io/repos/github/unforge/request-toolkit/badge.svg?branch=master)](https://coveralls.io/github/unforge/request-toolkit?branch=master)
[![License](https://poser.pugx.org/unforge/request-toolkit/license.svg)](https://packagist.org/packages/unforge/request-toolkit)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
    php composer.phar require unforge/request-toolkit
```

or add

```
    "unforge/request-toolkit": "dev-master"
```

to the require section of your `composer.json` file.

Basic Usage
------------

* Get value from POST:

```php
    $_POST = [
        'name'  => 'User',
        'age    => 24
    ];

    $age = Request::getIntFromPost('age');

    echo $age; // 24
```

* Get value from GET:

```php
    $_GET = [
        'name'  => 'User',
        'age'   => 24
    ];

    $name = Request::getStringFromGet('name');

    echo $name; // User
```

* Get value from POST or GET:

```php
    $_POST = [
        'name'  => 'User'
    ];

    $_GET = [
        'age'   => 24
    ];

    $name = Request::getStringFromRequest('name');
    $age = Request::getIntFromRequest('age');

    echo $name; // User
    echo $age; // 24
```

* Get value from COOKIE:

```php
    $_COOKIE = [
        'visitor_session' => 'bXtH4i6Cy5oMyMWbs3ldGVFf8ukTPc'
    ];

    $session = Request::getStringFromCookie('visitor_session');

    echo $session; // bXtH4i6Cy5oMyMWbs3ldGVFf8ukTPc
```

* Get value from PUT:

```php
    // application/json - {"name":"User", "age":24}

    $name = Request::getStringFromPut('name');

    echo $$name; // User
```