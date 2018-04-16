<?php

namespace Core;

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
    public function dump($var, $title="", $background="#EEEEEE", $color="#000000"){
        echo "<pre style='background:$background; color:$color; padding:10px 20px; border:2px inset $color'>";
        echo "<h2>$title</h2>";
        var_dump($var); 
        echo "</pre>";
    }

}