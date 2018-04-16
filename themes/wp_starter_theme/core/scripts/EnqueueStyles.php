<?php

namespace Core\Scripts;

class EnqueueStyles {

    private $_stylesArray = array();

    public function __construct($stylesArray)
    {
        $this->_stylesArray = $stylesArray;
        $this->enqueueStylesHook();
    }

    public function enqueueStylesHook() {
        add_action( 'wp_enqueue_scripts', array($this, 'registerStyles') );
    }

    public function registerStyles() {
        
        foreach ($this->_stylesArray as $style) {
            if($style->condition === null) {
                wp_enqueue_style( 
                    $style->handle, $style->src, $style->deps, $style->version, $style->footer
                );
            } else {
                if(eval($style->condition)) {
                    wp_enqueue_style( 
                        $style->handle, $style->src, $style->deps, $style->version, $style->footer
                    );
                }
            }
        }
    }

}