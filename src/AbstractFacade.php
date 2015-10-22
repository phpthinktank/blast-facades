<?php
/*
*
* (c) Marco Bunge <marco_bunge@web.de>
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
*
* Date: 30.05.2015
* Time: 11:30
*/

namespace Blast\Facades;


use Exception;

abstract class AbstractFacade
{
    /**
     * Call from attached instance
     * @param $name
     * @param array $arguments
     * @return mixed
     * @throws Exception
     */
    public static function __callStatic($name, array $arguments = [])
    {
        return FacadeFactory::create(static::accessor(), $name, $arguments);
    }

    /**
     * Get attached instance
     * @return mixed
     * @throws Exception
     */
    public static function __instance()
    {
        return FacadeFactory::getContainer()->get(static::accessor());
    }

    /**
     * Accessor name
     * @return string
     * @throws Exception
     */
    protected static function accessor(){
        throw new Exception(sprintf('Unknow accessor in %s', static::class));
        return '';
    }

}