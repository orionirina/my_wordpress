<?php
function cmb_add_meta_box_dpe() {

	add_meta_box(

	'custom_post_metabox',

	'Our Products',

	'cmb_display_meta_box',

	'post',

	'normal',

	'high'

	);

}

add_action( 'add_meta_boxes', 'cmb_add_meta_box_dpe' );