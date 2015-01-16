Annotations Handler
===================

A simple and directly handler for docblock and annotations for PHP

Installation
------------

Just add the following dependency line to your *composer.json* file:

```json
{
    "require": {
        "devsdmf/annotations": "1.*"
    }
}
```

Usage
-----

```php
use Devsdmf\Annotations\Reader;
use ReflectionClass;

$reflector = new ReflectionClass('MyClass');
$reader = new Reader();

$annotation = $reader->getClassAnnotations($reflector);
```

*The example above work with the most of Reflector interface implementations, see the available adapters below.*

Adapters
--------

- ReflectionClass
- ReflectionFunction
- ReflectionMethod
- ReflectionObject
- ReflectionProperty

Tests
-----

To run the test suite, you need install the require-dev dependencies:

```
$ composer install --dev
$ ./vendor/bin/phpunit
```

License
-------

This library is licensed under the [MIT license](LICENSE).