<?php

namespace Core\Scripts;

class EnqueueScript {

    private $_handle;
    private $_src;
    private $_condition;
    private $_version;
    private $_inFooter;
    private $_deps;

    public function __construct($handle, $src, $condition = null, $version = false, $inFooter = false, $deps = false) {
        $this->_handle = $handle;
        $this->_src = $src;
        $this->_condition = $condition;
        $this->_version = $version;
        $this->_inFooter = $inFooter;
        $this->_deps = $deps;

        add_action( 'wp_enqueue_scripts', array($this, 'registerScript') );
    }

    public function registerScript() {

        wp_deregister_script('jquery');

        if($this->_version !== false) {
            $this->_setVersion();
        }

        if($this->_condition !== null){
            if(is_page_template('templates/' . $this->_condition . '.php')) {
                wp_register_script($this->_handle, $this->_src, $this->_deps, $this->_version, $this->_inFooter);
                wp_enqueue_script($this->_handle);
            }
        }
        else {
            wp_register_script($this->_handle, $this->_src, $this->_deps, $this->_version, $this->_inFooter);
            wp_enqueue_script($this->_handle);
        }
    }

    private function _setVersion() {
        $fileAbsPath = $_SERVER['DOCUMENT_ROOT'] . parse_url($this->_src, PHP_URL_PATH);
        $timestamp = filemtime($fileAbsPath);
        $lastPart = array_pop( explode( ',', number_format($timestamp) ) );
        $this->_version = $lastPart / 100;
    }

}