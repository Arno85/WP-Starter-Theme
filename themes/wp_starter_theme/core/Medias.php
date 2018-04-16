<?php

namespace Core;

class Medias {

    /**
     * Init method to add hooks
     *
     * @return void
     */
    public static function init() {
        add_action( 'after_setup_theme', array(__CLASS__, 'addImagesSupport') );
        add_filter( 'upload_mimes', array(__CLASS__, 'addSvgSupport') );
    }

    /**
     * Add images formats support 
     *
     * @return void
     */
    public function addImagesSupport() {
        add_theme_support('post-thumbnails');
        add_image_size('xlarge', 1920, '', true); // Xlarge Thumbnail
        add_image_size('large', 1024, '', true);  // Large Thumbnail
        add_image_size('medium', 680, 383, true); // Medium Thumbnail
        add_image_size('small', 120, '', true);   // Small Thumbnail
    }
    
    /**
     * Add SVG support for media library
     *
     * @param [type] $mimes
     * @return void
     */
    public function addSvgSupport($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
}