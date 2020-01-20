<?php

namespace Core\Debug;

class Debug {

    /**
     * pretty Var dump
     *
     * @param [type] $var
     * @param string $title
     * @param string $background
     * @param string $color
     * @return void
     */
    public static function dump($var, $title="", $background="#EEEEEE", $color="#000000"){

        $styles = static::setStyles($background, $color);

        echo '<pre style="' . $styles . '">';
        echo "<h2>$title</h2>";
        var_dump($var); 
        echo "</pre>";
    }

    public static function getServer() {
        self::dump($_SERVER, '$_SERVER');
    }

    protected function setStyles($background, $color) {
        $styles = "
            background: $background; 
            color: $color; 
            padding: 10px 20px;
            margin: 20px; 
            border: 2px inset $color;";
        
        return $styles;
    }
    
}