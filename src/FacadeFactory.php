<?php
 /*
 *
 * (c) Marco Bunge <marco_bunge@web.de>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 *
 * Date: 30.05.2015
 * Time: 10:33
 */

namespace Blast\Facades;

use Interop\Container\ContainerInterface;

class FacadeFactory {


    /**
     * @var ContainerInterface
     */
    protected static $container = null;

    /**
     * @return ContainerInterface
     */
    public static function getContainer()
    {
        return self::$container;
    }

    /**
     * @param ContainerInterface $container
     */
    public static function setContainer(ContainerInterface $container)
    {
        self::$container = $container;
    }

    /**
     * Get provided accessor from container and call method
     * @param $accessor
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function create($accessor, $name, array $arguments = [])
    {
        $container = static::getContainer();
        $object = $container->get($accessor);

        return call_user_func_array([$object, $name], $arguments);
    }

}