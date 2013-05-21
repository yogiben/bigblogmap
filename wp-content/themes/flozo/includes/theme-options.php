<?php
/**
 * Initialize the options before anything else.
 */
add_action( 'admin_init', 'custom_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'main_settings',
        'title'       => 'Main Settings'
      ),
      array(
        'id'          => 'home_page_slider',
        'title'       => 'Home Page Slider'
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'logo',
        'label'       => 'Your Logo',
        'desc'        => 'Upload your logo. Recommended sizes - max height 100px, max width 300px',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'main_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'main_colour',
        'label'       => 'Main Colour',
        'desc'        => 'Select the main colour your business uses.',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'main_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'twitter_handle',
        'label'       => 'Twitter Handle',
        'desc'        => 'Enter your Twitter handle',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'main_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'facebook_url',
        'label'       => 'Facebook URL',
        'desc'        => 'Enter your Facebook URL',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'main_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'linkedin_url',
        'label'       => 'LinkedIn URL',
        'desc'        => 'Enter your LinkedIn URL',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'main_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'phone_no',
        'label'       => 'Phone Number',
        'desc'        => 'Enter your phone number',
        'std'         => '123456789',
        'type'        => 'text',
        'section'     => 'main_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'about_footer',
        'label'       => 'About Footer',
        'desc'        => 'This is the area that appears in the theme\'s footer. Enter a short description about your company/service here.',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'main_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'contact_footer',
        'label'       => 'Contact Footer',
        'desc'        => 'This is the area to display your contact details in the theme\'s footer. Enter your contact details here.',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'main_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'feature_image_1',
        'label'       => 'Feature Image 1',
        'desc'        => 'Upload image for the home page feature panel. Optimum sizes for this panel are 960px x 410px',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'home_page_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'feature_text_1',
        'label'       => 'Feature Text 1',
        'desc'        => 'Enter the text to support feature image 1',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'home_page_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'feature_link_1',
        'label'       => 'Feature Link 1',
        'desc'        => 'Enter the link to support feature image 1',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'home_page_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'feature_image_2',
        'label'       => 'Feature Image 2',
        'desc'        => 'Upload image for the home page feature panel. Optimum sizes for this panel are 960px x 410px',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'home_page_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'feature_text_2',
        'label'       => 'Feature Text 2',
        'desc'        => 'Enter the text to support feature image 2',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'home_page_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  	 array(
        'id'          => 'feature_link_2',
        'label'       => 'Feature Link 2',
        'desc'        => 'Enter the link to support feature image 2',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'home_page_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'feature_image_3',
        'label'       => 'Feature Image 3',
        'desc'        => 'Upload image for the home page feature panel. Optimum sizes for this panel are 960px x 410px',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'home_page_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
 array(
        'id'          => 'feature_text_3',
        'label'       => 'Feature Text 3',
        'desc'        => 'Enter the text to support feature image 3',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'home_page_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  	 array(
        'id'          => 'feature_link_3',
        'label'       => 'Feature Link 3',
        'desc'        => 'Enter the link to support feature image 3',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'home_page_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'feature_image_4',
        'label'       => 'Feature Image 4',
        'desc'        => 'Upload image for the home page feature panel. Optimum sizes for this panel are 960px x 410px',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'home_page_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
 array(
        'id'          => 'feature_text_4',
        'label'       => 'Feature Text 4',
        'desc'        => 'Enter the text to support feature image 4',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'home_page_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  	array(
        'id'          => 'feature_link_4',
        'label'       => 'Feature Link 4',
        'desc'        => 'Enter the link to support feature image 1',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'home_page_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'feature_image_5',
        'label'       => 'Feature Image 5',
        'desc'        => 'Upload image for the home page feature panel. Optimum sizes for this panel are 960px x 410px',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'home_page_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
 array(
        'id'          => 'feature_text_5',
        'label'       => 'Feature Text 5',
        'desc'        => 'Enter the text to support feature image 5',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'home_page_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'feature_link_5',
        'label'       => 'Feature Link 5',
        'desc'        => 'Enter the link to support feature image 5',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'home_page_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}