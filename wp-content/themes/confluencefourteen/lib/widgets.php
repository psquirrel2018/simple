<?php
//Register widgets
//Register the sidebar
if ( function_exists ('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Main Sidebar',
		'id' => 'sidebar1',
		'description' => 'This is the main sidebar',
		'before_widget' => '<div class="widget %1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
		)
	);
}

if ( function_exists ('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Full Width Sidebar',
		'id' => 'sidebar2',
		'description' => 'This is the full width sidebar that goes beneath the homepage slider',
		'before_widget' => '<div class="widget %1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
		)
	);
}

if ( function_exists ('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Full Width Sidebar Above the Footer',
		'id' => 'sidebar3',
		'description' => 'This is the full width sidebar that goes beneath the homepage slider',
		'before_widget' => '<div class="widget %1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
		)
	);
}

if ( function_exists ('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Story 1 Image',
		'id' => 'story1img',
		'description' => 'This is the sidebar for the first story image below the wp-loop',
		'before_widget' => '<div class="widget %1$s">',
		'after_widget' => '</div>',
		)
	);
}

if ( function_exists ('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Story 1 Sidebar',
		'id' => 'story1',
		'description' => 'This is the sidebare where the story goes',
		'before_widget' => '<div class="widget %1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="beta heading">',
		'after_title' => '</h2>'
		)
	);
}

if ( function_exists ('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Story 2 Image',
		'id' => 'story2img',
		'description' => 'This is the sidebar for the first story image below the wp-loop',
		'before_widget' => '<div class="widget %1$s">',
		'after_widget' => '</div>',
		)
	);
}

if ( function_exists ('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Story 2 Sidebar',
		'id' => 'story2',
		'description' => 'This is the sidebare where the story goes',
		'before_widget' => '<div class="widget %1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="beta heading">',
		'after_title' => '</h2>'
		)
	);
}


if ( function_exists ('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Footer 1',
		'id' => 'footer1',
		'description' => 'This is the left footer widget',
		'before_widget' => '<div class="widget %1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
		)
	);
}
if ( function_exists ('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Footer 2',
		'id' => 'footer2',
		'description' => 'This is the middle footer widget',
		'before_widget' => '<div class="widget %1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
		)
	);
}
if ( function_exists ('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Footer 3',
		'id' => 'footer3',
		'description' => 'This is the right footer widget',
		'before_widget' => '<div class="widget %1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
		)
	);
}