<?php

namespace Core;

class CustomizeDashboard {

    /**
     * Init method to add hooks
     *
     * @return void
     */
    public static function init()
    {
        add_action( 'customize_register', array(__CLASS__, 'removeAdditionnalCSSSection' ) );
        add_action( 'wp_before_admin_bar_render', array(__CLASS__, 'dashboardCustomLogo') );
        add_action( 'login_enqueue_scripts', array(__CLASS__, 'loginCustomLogo') );
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

    /**
     * Add Custom logo to the Dasboard of Wordpress
     *
     * @return void
     */
    public function dashboardCustomLogo() {
        $htmlStyle = '
        <style type="text/css">
            #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
                background-image: url(' . get_template_directory_uri() . '/assets/src/img/logo.svg) !important;
                background-position: 0 0;
                color: rgba(0, 0, 0, 0);
                filter: invert(100%);
                
            }
    
            #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
                background-position: 0 0;
            }
        </style>';
    
        echo $htmlStyle;
    }
        
    /**
     * Add custom logo to the login page of Wordpress
     *
     * @return void
     */
    public function loginCustomLogo() { 
        $htmlStyle = ' 
        <style type="text/css"> 
            body.login div#login h1 a {
                background-image: url(' . get_template_directory_uri() . '/assets/src/img/logo.svg);  //Add your own logo image in this url 
                padding-bottom: 10px; 
            } 
        </style>';

        echo $htmlStyle;	
    } 
        
}