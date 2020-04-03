<?php

function myprefix_custom_404_register( $wp_customize ) {

  $wp_customize->add_section( '404' , array(
      'title'      => 'Custom 404',
      'priority'   => 30,
  ) );

  $wp_customize->add_setting( '404_headline' , array(
    'default'     => '',
    'transport'   => 'refresh',
  ) );

  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, '404_headline', array(
  	'label'        => 'Headline',
  	'section'    => '404',
  	'settings'   => '404_headline',
  ) ) );

  $wp_customize->add_setting( '404_intro_text' , array(
    'default'     => '',
    'transport'   => 'refresh',
  ) );

  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, '404_intro_text', array(
    'label'        => 'Intro Text',
    'section'    => '404',
    'settings'   => '404_intro_text',
    'type'   => 'textarea',
  ) ) );

  // Add the main colors panel
		$wp_customize->add_panel( '404_header_panel', array(
	 'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('404 Panel'),
		'description'    => __('Text header colors'),
	) );


	$wp_customize->add_setting( '404_header_image' , array(
    'default'     => '',
    'transport'   => 'refresh',
  ) );

  $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, '404_header_image', array(
    'label'       => 'Featured Image',
    'section'    	=> '404',
    'settings'   	=> '404_header_image',
    'flex_width'  => true, // Allow any width, making the specified value recommended. False by default.
    'flex_height' => false, // Require the resulting image to be exactly as tall as the height attribute (default).
    'width'       => 700,
    'height'      => 964,
		'description' => "Minimum 700 x 964px"
  ) ) );


}
add_action( 'customize_register', 'myprefix_custom_404_register' );
