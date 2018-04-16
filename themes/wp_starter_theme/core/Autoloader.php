<?php

namespace Core;

class Autoloader {


    /**
     * Register function autoload
     *
     * @return void
     */
    public static function register() {
        spl_autoload_register( array(__CLASS__, '_autoload') );
    }


    /**
     * Autoload class
     *
     * @param [string] $class_name
     * @return void
     */
    public static function _autoload($class) {
        if(strpos($class, __NAMESPACE__) === 0){
            $class = str_replace(__NAMESPACE__, '', $class);       
            $class = str_replace('\\', '/', $class);
            
            require __DIR__ . '/' . $class . '.php';
        }
    }

}