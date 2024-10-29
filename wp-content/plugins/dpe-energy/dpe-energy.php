<?php 

/*
Plugin Name: DPE
Plugin URI: 
Description: Diagnostic de performance énergétique - DPE
Author: Deraniaina Nandrianina
Version: 1.0.0
*/
$plugin_dir_name = dirname(__FILE__);
$plugin_dir_name = str_replace('\\', '/', $plugin_dir_name);
$plugin_dir_name = explode('/', $plugin_dir_name);
$plugin_dir_name = end($plugin_dir_name);

if (!defined('DPE_PLUGIN_NAME')) {
    define('DPE_PLUGIN_NAME', $plugin_dir_name);
}

include(plugin_dir_path( __FILE__ ) .'templates/templates.php');

add_shortcode('DPE', 'all_template_dpe');

// metabox
function my_metabox() {
    add_meta_box( 'is_vegan', 'Is Vegan', 'display_vegan_meta_box', 'recipes', 'side' );
}

function display_vegan_meta_box( $recipe ) {
    ?>
    <span class="title">Vegan recipe?</span>
    <span class="content">
        <label for="vegan_checkbox">
            <input type="checkbox" name="vegan_checkbox" id="vegan_checkbox" value="yes" />
        </label>
    </span> 
 
    <?php
}
add_action( 'admin_init', 'my_metabox' );


