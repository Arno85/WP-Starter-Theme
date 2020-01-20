<?php

namespace Core\Theme;

class CustomizeDashboard {

    /**
     * Init method to add hooks
     *
     * @return void
     */
    public static function init()
    {
        add_action( 'customize_register', array(__CLASS__, 'removeAdditionnalCSSSection' ) );
        add_filter( 'show_admin_bar', '__return_false' );
        remove_action('welcome_panel', 'wp_welcome_panel');
    }

    /**
     * Remove the ability to add custom CSS in the customizer
     *
     * @param [type] $wp_customize
     * @return void
     */
    public function removeAdditionnalCSSSection( $wp_customize ) {
        $wp_customize->remove_section( 'custom_css' );
    }
        
}