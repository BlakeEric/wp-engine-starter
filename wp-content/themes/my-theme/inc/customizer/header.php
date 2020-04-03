<?php

function myprefix_custom_headline_register( $wp_customize ) {
  $wp_customize->add_setting( 'myprefix_logo_scrolled' , array(
    'default'     => '',
    'transport'   => 'refresh',
  ) );

  $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'myprefix_logo_scrolled', array(
    'label'       => 'Scrolled Header Logo',
    'section'    	=> 'header',
    'settings'   	=> 'myprefix_logo_scrolled',
    'flex_width'  => true, // Allow any width, making the specified value recommended. False by default.
    'flex_height' => false, // Require the resulting image to be exactly as tall as the height attribute (default).
    'width'       => 100,
    'height'      => 100,
		'description' => "Minimum 100 x 100"
  ) ) );

  $wp_customize->add_section( 'header' , array(
      'title'      => 'Header',
      'priority'   => 1,
  ) );

  $wp_customize->add_setting( 'myprefix_headline' , array(
    'default'     => "",
    'transport'   => 'refresh',
  ) );

  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'myprefix_headline', array(
  	'label'        => 'Site Headline',
  	'section'    => 'header',
  	'settings'   => 'myprefix_headline',
  ) ) );

  $wp_customize->add_setting( 'myprefix_sub_headline' , array(
    'default'     => "",
    'transport'   => 'refresh',
  ) );

  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'myprefix_sub_headline', array(
  	'label'        => 'Site Sub Headline',
  	'section'    => 'header',
  	'settings'   => 'myprefix_sub_headline',
  ) ) );

  $wp_customize->add_setting( 'myprefix_header_button_url' , array(
    'default'     => "",
    'transport'   => 'refresh',
  ) );

  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'myprefix_header_button_url', array(
  	'label'        => 'Check Availability Url',
  	'section'    => 'header',
  	'settings'   => 'myprefix_header_button_url',
  ) ) );

}
add_action( 'customize_register', 'myprefix_custom_headline_register' );
