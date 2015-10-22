<?php
/**
 * Created by PhpStorm.
 * User: Marco Bunge
 * Date: 22.10.2015
 * Time: 17:08
 */

namespace Blast\Tests\Stubs;


class Bob implements FooInterface
{

    /**
     * @return array
     */
    public function bar()
    {
        return 'bob';
    }
}