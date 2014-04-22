<?php

/**
 * StaticAccess Trait for PHP OOP
 * Creator: Yalçın CEYLAN
 * Github: http://github.com/yali4/
 * Website: http://yalcinceylan.net
 * License: MIT <http://opensource.org/licenses/mit-license.php>
 */
trait StaticAccessTrait {

    /**
     * Örneği tutmak için.
     *
     * @var
     */
    private static $instance;

    /**
     * Örneği döndürmek için.
     *
     * @return mixed
     */
    public static function getInstance()
    {
        
        if ( self::$instance )
        {
            return self::$instance;
        }
        
        return self::$instance = new static();

    }

    /**
     * Örnek üzerinden erişimler.
     *
     * @param $method
     * @param array $args
     * @return mixed
     */
    private static function callMethod($method, array $args)
    {

        $instance = self::getInstance();

        $method = 'static'.ucfirst($method);

        switch( count($args) )
        {
            case 0:
                return $instance->$method();

            case 1:
                return $instance->$method($args[0]);

            case 2:
                return $instance->$method($args[0], $args[1]);

            case 3:
                return $instance->$method($args[0], $args[1], $args[2]);

            case 4:
                return $instance->$method($args[0], $args[1], $args[2], $args[3]);

            default:
                return call_user_func_array(array($instance, $method), $args);
        }

    }

    /**
     * Normal çağrılar için.
     *
     * @param $method
     * @param $arguments
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        return self::callMethod($method, $arguments);
    }

    /**
     * Statik çağrılar için.
     *
     * @param $method
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($method, $arguments)
    {
        return self::callMethod($method, $arguments);
    }

}
