<?php
/**
 * Created by PhpStorm.
 * User: Marco Bunge
 * Date: 22.10.2015
 * Time: 16:14
 */

namespace Blast\Tests\Mocks\Facades;

use Blast\Facades\AbstractFacade;
use Blast\Tests\Mocks\FooInterface;

class Foo extends AbstractFacade
{
    protected static function accessor()
    {
        return FooInterface::class;
    }
}