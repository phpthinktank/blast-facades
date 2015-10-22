<?php
/**
 * Created by PhpStorm.
 * User: Marco Bunge
 * Date: 22.10.2015
 * Time: 16:13
 */

namespace Blast\Tests\Stubs;


class Foo implements FooInterface
{

    /**
     * @return array
     */
    public function bar()
    {
        return 'baz';
    }
}