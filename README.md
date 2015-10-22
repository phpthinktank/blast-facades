# Blast facades

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Total Downloads][ico-downloads]][link-downloads]

Blast facades is aiming to minimize complexity and represent dependencies as generic facades. This package is part of Blast component collection.

This package is supporting interopt-container and all container packages which are using interopt-container.

## Install

Via Composer

``` bash
$ composer require blast/facades
```

## Usage

### Initialize

First of all we need to tell FacadeFactory which container instance should be used. We could use (http://container.thephpleague.com/)[league/container] for example:

A bootstrap is looking like this:

```php
<?php

use Blast\Facades\FacadeFactory;
use League\Container\Container;

$container = new Container();
FacadeFactory::setContainer($container);
```

### Dealing with dependencies

We need to register a service to our container, for example with _league/container_.

There are several ways to now register this service with the container.

**For a better transparency and design we recommend to pass an Interface or Contract FQCN as service id.**

```php
<?php

//add our service
$container->add('Acme\Service', 'Acme\Service\SomeService');

//returns an instance of Acme\Service\SomeService
$container->get('Acme\Service');

```

or

```php
<?php

//add our service
$container->add('Acme\Service\SomeService');

//returns an instance of Acme\Service\SomeService
$container->get('Acme\Service\SomeService');

```

or

```php
<?php

//returns an instance of Acme\Service\SomeService without registration
$container->get('Acme\Service\SomeService');

```

for more information please read league/container (http://container.thephpleague.com/getting-started/)[documentation]

### Creating and using a facade

A Facade should be an instance of AbstractFacade and should provide an accessor. 

The accessor is equal to the service id and will passed to Interop\Container\ContainerInterface::get('id').

```php
<?php

namespace Acme\Facades\Service;

use Blast\Facades\AbstractFacade;
use Acme\Service;

class Service extends AbstractFacade
{
    protected static function accessor()
    {
        return Acme\Service::class;
    }
}

```

We could now call serivce methods from our facade, or the service instance itself.
 
#### Calling service instance

```php
<?php

use Acme\Facades\Service;

//is returning the service instance
$service = Service::__instance();

```

#### Calling service methods

```php
<?php

use Acme\Facades\Service;

Service::someMethod();

```

or

```php
<?php

use Acme\Facades\Service;

//is returning the service instance
$service = Service::__instance();
$service->someMethod();

```

or

```php
<?php

use Acme\Facades\Service;

forward_static_call([Service::class, 'someMethod']);

```

or

```php
<?php

use Acme\Facades\Service;

call_user_func(sprintf('%s::%s', Service::class, 'someMethod'));

```

You are also able to pass arguments. The method call itself is behaving like the call of original class.

### Instance swaping

Sometimes service will be replaced by another service. As long as the service id is not changing, we don't need to modify
anything in our facade. 

```php
<?php

use Acme\Facades\Service;

//add a service
$container->add('Acme\Service', 'Acme\Service\SomeService');

//is returning the service instance Acme\Service\SomeService
$service = Service::__instance();

//replace a service with another one
$container->add('Acme\Service', 'Acme\Service\AnotherService');

//is now returning the service instance Acme\Service\SomeService
$service = Service::__instance();
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## Credits

- [Marco Bunge][link-author]
- [All contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/blast/facades.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/phpthinktank/blast-facades/master.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/blast/facades.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/blast/facades
[link-travis]: https://travis-ci.org/phpthinktank/blast-facades
[link-downloads]: https://packagist.org/packages/blast/facades
[link-author]: https://github.com/mbunge
[link-contributors]: ../../contributors
