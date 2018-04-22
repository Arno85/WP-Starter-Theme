<?php

namespace Core\Theme;

class ThemeSetup {

    /**
     * Init method to add hooks
     *
     * @return void
     */
    public static function init()
    {
        add_action( 'after_setup_theme', array(__CLASS__, 'manageTitleDocument') );
        add_action( 'after_setup_theme', array(__CLASS__, 'addCustomLogoSupport') );
        add_action( 'widgets_init', array(__CLASS__, 'addWidgetSupport') );
        add_filter( 'template_include', array(__CLASS__, 'headerAndFooterAutoIncludes') );
        self::setStaticFrontPage();
    }

    /**
     * Let WordPress manage the document title.
     *
     * @return void
     */
    public function manageTitleDocument() {
        add_theme_support( 'title-tag' );
    }

    /**
     * Add support for core custom logo.
     *
     * @return void
     */
    public function addCustomLogoSupport() {
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );
    }

    /**
     * Register widgets for Sidebar
     *
     * @return void
     */
    public function addWidgetSupport() {
        register_sidebar( array(
            'name'          => esc_html__( 'Sidebar', 'wp_starter_theme' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'wp_starter_theme' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
    }

    /**
     * Set the website with a static front page 
     *
     * @return void
     */
    public function setStaticFrontPage() {
        $homepage = get_page_by_title('Home');

        if ( $homepage )
        {
            update_option( 'page_on_front', $homepage->ID );
            update_option( 'show_on_front', 'page' );
        }
    }

    /**
     * Automatically include header and footer files in every templates
     *
     * @return void
     */
    public function headerAndFooterAutoIncludes($template) {
        get_template_part('templates/common/header');
        include $template;
        get_template_part('templates/common/footer');        
    }

}