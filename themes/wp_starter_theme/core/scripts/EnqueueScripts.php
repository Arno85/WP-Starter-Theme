<?php

namespace Core\Scripts;

class EnqueueScripts {

    private $_jsArray = array();

    public function __construct($jsArray)
    {
        $this->_jsArray = $jsArray;
        $this->enqueueScriptsHook();
    }

    public function enqueueScriptsHook() {
        add_action( 'wp_enqueue_scripts', array($this, 'registerJavascripts' ) );
    }

    public function registerJavascripts() {
        
        wp_deregister_script("jquery");
        
        foreach ($this->_jsArray as $js) {
            if($js->condition === null) {
                wp_enqueue_script( 
                    $js->handle, $js->src, $js->deps, $js->version, $js->footer
                );
            } else {
                if(eval($js->condition)) {
                    wp_enqueue_script( 
                        $js->handle, $js->src, $js->deps, $js->version, $js->footer
                    );
                }
            }
        }
    }

}