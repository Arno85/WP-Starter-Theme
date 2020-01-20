<?php 
/**
* Register a custom post type
*
*/

namespace Core\CPT;

use Core\Debug\AdminDebug;

class CustomPostType {

    private $_singular;
    private $_plural;

    private $_supportsArray = array ( 
        'title', 
        'editor'
    );

    public function __construct($singular) {
        $this->_singular = ucfirst($singular);

        $this->_setPlural() ;

        add_action( 'init', array($this, 'registerPostType') );
    }
    
    public function registerPostType() {
        register_post_type( $this->_singular, $this->_getArgs() );
    }

    private function _getArgs() {
        return array(
            'description' => '',
            'public' => true,
            'exclude_from_search' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'show_in_menu' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 5,
            'menu_icon' => "dashicons-tag",
            'capability_type' => 'post',
            'capabilities' => array(),
            'map_meta_cap' => null,
            'hierarchical' => false,
            'supports' => $this->_getSupports(),
            'query_var' => true,
            'rewrite' => array( 'slug' => '' ),
            'has_archive' => false,          
            'taxonomies' => array(''),
            'show_in_rest'=> true,
            'labels' => $this->_getLabels()
        );
    }

    private function _getLabels() {
        return array(
            'name'                  => $this->_plural,
            'singular_name'         => $this->_singular,
            'add_new'               => 'Add new ' . $this->_singular,
            'add_new_item'          => 'New ' . $this->_singular,
            'edit_item'             => 'Edit ' . $this->_singular,
            'new_item'              => 'New ' . $this->_singular,
            'all_items'             => 'All ' . $this->_plural,
            'view_item'             => 'View ' . $this->_singular,
            'search_items'          => 'Search ' . $this->_singular,
            'not_found'             =>  'No ' . $this->_singular . ' found',
            'not_found_in_trash'    => 'No ' . $this->_singular . ' found in the trash',
            'parent_item_colon'     => '',
            'menu_name'             => $this->_plural
        );
    }

    private function _getSupports() {
        return $this->_supportsArray;
    }

    public function addSupports(...$supports) {
        foreach ($supports as $support) {
            array_push($this->_supportsArray, $support);
        }
    }

    private function _setPlural() {
        $this->_plural = $this->_singular . 's';
    }
}
?>