<?php

add_action( 'wp_enqueue_scripts', function () {

	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );

});

add_theme_support('post-thumbnails');
add_theme_support('admin-bar');




add_action('init', function(){
    register_post_type('news', array(
    	'hierarchical' => true,
		'labels'             => array(
			'name'               => 'Новости', 
			'singular_name'      => 'Новости', 
			'add_new'            => 'Добавить новость',
			'add_new_item'       => 'Добавить новый объект',
			'edit_item'          => 'Редактировать объект',
			'new_item'           => 'Новый объект',
			'view_item'          => 'Посмотреть объект',
			'menu_name'          => 'Новости'
		  ),
		'public'     => true,
		'supports'   => ['title', 'thumbnail', 'page-attributes', 'editor'],
  		'show_ui' => true, 
		'has_archive' => true, 
  		'show_in_rest' => true,
  		'show_in_menu' => true,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'rewrite'    => [
			'with_front' => false,
			'slug' => 'news'
		]
	));
});

add_theme_support( 'post-thumbnails',  array( 'news' ));



?>