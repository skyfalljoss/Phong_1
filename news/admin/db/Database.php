<?php

class Database
{
    private static $instance;

    public static function getInstance()
    {
        $db = include ADMIN_CONFIG_PATH . 'database.php';
        if (!self::$instance) {
            self::$instance = new PDO('mysql:host=' . $db['hostname'] . ';dbname=' . $db['db_name'], $db['username'], $db['password']);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$instance;
    }

    final public static function __callStatic($chrMethod, $arrArguments)
    {
        $objInstance = self::getInstance();

        return call_user_func_array(array($objInstance, $chrMethod), $arrArguments);
    }
}