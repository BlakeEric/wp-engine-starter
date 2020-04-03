<?php
function myprefix_custom_contact_register( $wp_customize ) {
  $wp_customize->add_section( 'contact' , array(
      'title'      => 'Contact',
      'priority'   => 26,
  ) );

  $wp_customize->add_setting( 'business_address_line_1' , array(
    'default'     => '',
    'transport'   => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'business_address_line_1', array(
  	'label'        => 'Business Address Line 1',
  	'section'    => 'contact',
  	'settings'   => 'business_address_line_1',
  ) ) );
  $wp_customize->add_setting( 'business_address_line_2' , array(
    'default'     => '',
    'transport'   => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'business_address_line_2', array(
  	'label'        => 'Address Line 2',
  	'section'    => 'contact',
  	'settings'   => 'business_address_line_2',
  ) ) );
  $wp_customize->add_setting( 'business_address_city' , array(
    'default'     => '',
    'transport'   => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'business_address_city', array(
  	'label'        => 'City',
  	'section'    => 'contact',
  	'settings'   => 'business_address_city',
  ) ) );
  $wp_customize->add_setting( 'business_address_state' , array(
    'default'     => '',
    'transport'   => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'business_address_state', array(
  	'label'        => 'State',
  	'section'    => 'contact',
  	'settings'   => 'business_address_state',
  ) ) );
  $wp_customize->add_setting( 'business_address_zip' , array(
    'default'     => '',
    'transport'   => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'business_address_zip', array(
  	'label'        => 'Zip',
  	'section'    => 'contact',
  	'settings'   => 'business_address_zip',
  ) ) );

  $wp_customize->add_setting( 'contact_instructions' , array(
    'default'     => '',
    'transport'   => 'refresh',
  ) );

  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_instructions', array(
    'label'       => '',
    'section'    	=> 'contact',
    'settings'   	=> 'contact_instructions',
    'description' => get_option('formatted_address') ? '<strong>Google Maps Formatted Address:</strong> ' . get_option('formatted_address') : 'Google Map Data Not Generated',
    'type' => 'hidden',
  ) ) );

  $wp_customize->add_setting( 'regenerate_map_data' , array(
    'default'     => '',
    'transport'   => '',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'regenerate_map_data', array(
    'label'        => '(Re)generate map data on close',
    'type'        => 'checkbox',
    'section'    => 'contact',
    'settings'   => 'regenerate_map_data',
  ) ) );

  $wp_customize->add_setting( 'business_phone' , array(
    'default'     => '',
    'transport'   => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'business_phone', array(
  	'label'        => 'Business Phone',
  	'section'    => 'contact',
  	'settings'   => 'business_phone',
  ) ) );
  $wp_customize->add_setting( 'business_email' , array(
    'default'     => '',
    'transport'   => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'business_email', array(
  	'label'        => 'Business Contact Email',
  	'section'    => 'contact',
  	'settings'   => 'business_email',
  ) ) );

  $wp_customize->add_setting( 'contact_form_title' , array(
    'default'     => '',
    'transport'   => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_form_title', array(
  	'label'        => 'Contact Form Title',
  	'section'    => 'contact',
  	'settings'   => 'contact_form_title',
  ) ) );
  $wp_customize->add_setting( 'contact_form_description' , array(
    'default'     => '',
    'transport'   => 'refresh',
  ) );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'contact_form_description', array(
  	'label'        => 'Contact Form Description',
  	'section'    => 'contact',
  	'settings'   => 'contact_form_description',
  ) ) );

	$wp_customize->add_panel( 'contact_panel', array(
	  'priority'       => 70,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Contact Panel'),
		'description'    => __('Set customizable features in the site footer.'),
	) );
}
add_action( 'customize_register', 'myprefix_custom_contact_register' );

function myprefix_do_geocode(){
  if (get_theme_mod('regenerate_map_data')) {
    $address = array();
    $address['address_1'] = get_theme_mod( 'business_address_line_1' );
    $address['address_2'] = get_theme_mod( 'business_address_line_2' );
    $address['city']      = get_theme_mod( 'business_address_city' );
    $address['state']     = get_theme_mod( 'business_address_state' );
    $address['zip']       = get_theme_mod( 'business_address_zip' );

    $full_addr = $address['address_1'] . $address['address_2'] . " " . $address['city'] . ", " . $address['state'] . " " . $address['zip'];
    $full_addr = urlencode($full_addr);
    $url = "https://maps.google.com/maps/api/geocode/json?key=AIzaSyBVDnaFEVXkYimR3O45ROLNyfOpVoihqxg&address={$full_addr}";
    // get the json response
    $resp_json = file_get_contents($url);
    // decode the json
    $resp = json_decode($resp_json, true);
    // If response OK, geocode was successful
    if($resp['status']=='OK'){
        $lat = $resp['results'][0]['geometry']['location']['lat'];
        $long = $resp['results'][0]['geometry']['location']['lng'];
        $formatted_address = $resp['results'][0]['formatted_address'];
        if($lat && $long && $formatted_address){
          update_option('business_lat', $lat );
          update_option('business_long', $long );
          update_option('formatted_address', $formatted_address );
        }else{
          return false;
        }
    }

    set_theme_mod('regenerate_map_data', false);
  }
}
add_action( 'customize_save_after', 'myprefix_do_geocode' );
