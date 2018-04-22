<?php

namespace Core\Debug;

class AdminDebug extends Debug{

    protected function setStyles($background, $color) {
        $styles = parent::setStyles($background, $color);
        $styles .= " 
            margin: 20px 20px 20px 180px;
            float: left;";
            
        return $styles;
    }
    
}