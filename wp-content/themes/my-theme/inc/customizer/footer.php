<?php

function myprefix_custom_footer_register( $wp_customize ) {
  $wp_customize->add_setting( 'myprefix_logo_footer' , array(
    'default'     => '',
    'transport'   => 'refresh',
  ) );

  $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'myprefix_logo_footer', array(
    'label'       => 'Footer Logo',
    'section'    	=> 'footer',
    'settings'   	=> 'myprefix_logo_footer',
    'flex_width'  => true, // Allow any width, making the specified value recommended. False by default.
    'flex_height' => false, // Require the resulting image to be exactly as tall as the height attribute (default).
    'width'       => 100,
    'height'      => 100,
		'description' => "Minimum 100 x 100"
  ) ) );

  $wp_customize->add_section( 'footer' , array(
      'title'      => 'Footer',
      'priority'   => 1,
  ) );

  $wp_customize->add_setting( 'footer_disclaimer' , array(
    'default'     => '',
    'transport'   => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_disclaimer', array(
  	'label'        => 'Footer Disclaimer',
  	'section'    => 'footer',
  	'settings'   => 'footer_disclaimer',
    'type'   => 'textarea',
  ) ) );

}
add_action( 'customize_register', 'myprefix_custom_footer_register' );
