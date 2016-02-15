<?php
/**
 * ishop Theme Customizer
 *
 * @package ishop
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ishop_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
        
      $wp_customize->remove_section("background_image");




/**********************************************
* General Settings
**********************************************/	
	if ( class_exists( 'WP_Customize_Panel' ) ):
	
		$wp_customize->add_panel( 'panel_general', array(
			'priority' => 30,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'General Settings', 'ishop' )
		) );
	
	/* Background	*/		
		$wp_customize->add_section( 'ishop_general_background' , array(
				'title'       => __( 'Background Settings', 'ishop' ),
				'priority'    => 30,
				'panel' => 'panel_general'
		));
                  //Background Color
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
				'label'    => __( 'Background Color', 'ishop' ),
				'section'  => 'ishop_general_background',
				'settings' => 'background_color',
				'priority'    => 1,
		)));
                  //Background image
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'background_image', array(
				'label'    => __( 'Background Image', 'ishop' ),
				'section'  => 'ishop_general_background',
				'settings' => 'background_image',
				'priority'    => 1,
		)));
	/* LOGO	*/		
		$wp_customize->add_section( 'ishop_general_section' , array(
				'title'       => __( 'Logo', 'ishop' ),
				'priority'    => 31,
				'panel' => 'panel_general'
		));

		$wp_customize->add_setting( 'ishop_logo', array('sanitize_callback' => 'esc_url_raw'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ishop_logo', array(
				'label'    => __( 'Logo', 'ishop' ),
				'section'  => 'ishop_general_section',
				'settings' => 'ishop_logo',
				'priority'    => 1,
		)));
                
                $wp_customize->add_section('custom_section_css',
		array(
			'title'			=> __( 'Custom CSS', 'ishop' ),			
			'panel'			=> 'panel_general',
                        'priority'    => 32
		)
	);
                $wp_customize->add_setting('custom_css',
		array(
			'default'			=> '',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'    => 'wp_filter_nohtml_kses',
			'sanitize_js_callback' => 'wp_filter_nohtml_kses'
		)
	);
                $wp_customize->add_control('custom_css',
		array(

			'settings'		=> 'custom_css',
			'section'		=> 'custom_section_css',
			'type'			=> 'textarea',
			'label'			=> __( 'Custom CSS', 'ishop' ),
			'description'	=> __( 'Define custom CSS be used for your site. Do not enclose in script tags.', 'ishop' ),
		)
	);
                
             
                
                
                
                
		

			endif;
 
/***********************************************
* Woocommerce Store
***********************************************/
if ( class_exists( 'WP_Customize_Panel' ) ):
	if (class_exists('woocommerce')) { 
		$wp_customize->add_panel( 'ishop_panel_woocommerce', array(
			'priority' => 32,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Woocommerce', 'ishop' )
		) );
                		
	$wp_customize->add_section( 'ishop_woo_settings' , 
                            array(
				'title'       => __( 'Woo settings & Options', 'ishop' ),
				'priority'    => 30,				
				'panel' => 'ishop_panel_woocommerce'
		));
         //Show or Hide woo product
                 $wp_customize->add_setting('woocommerce_share_buttons',
	
		array(
			'default'			=> false,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'ishop_sanitize_checkbox'
		)
	);
                 $wp_customize->add_control(new WP_customize_control ($wp_customize,'woocommerce_share_buttons',
                         array (
                             
                             'settings'		=> 'woocommerce_share_buttons',
                             'section'		=> 'ishop_woo_settings',
                             'type'		=> 'checkbox',                             
                            'label'		=> __( 'Hide Share from single product', 'ishop' )
			
                             
                         )  ));
						 
//Show or Hide woo product
		$wp_customize->add_setting('woocommerce_imageflip',
			array(
				'default'			=> false,
				'type'				=> 'theme_mod',
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'ishop_sanitize_checkbox'
				)
			);
		$wp_customize->add_control(new WP_customize_control ($wp_customize,'woocommerce_imageflip',
			 array (
				 
				 'settings'		=> 'woocommerce_imageflip',
				 'section'		=> 'ishop_woo_settings',
				 'type'		=> 'checkbox',                             
				'label'		=> __( 'Check Box to disable image flip WooCommerce product', 'ishop' )

				 
			 )  ));

        }
        
        else {
            
            $wp_customize->add_panel( 'ishop_panel_woocommerce', array(
			'priority' => 32,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Woocommerce', 'ishop' )
		) );
	/* Top header ads */		
		$wp_customize->add_section( 'ishop_woocommercenot' , array(
                                 'title'       => __( 'Woocommerce Not Installed', 'ishop' ),
                                'description' => __('Please install Woocommerce plugin to show these options','ishop'),
				'priority'    => 30,                                
				'panel' => 'ishop_panel_woocommerce'
		));

		 $wp_customize->add_setting("woonotinstall", 
                         array(
                             "default" => __("Woocommerce Not Installed",'ishop'), 
                             'sanitize_callback' => 'esc_textarea',
                             "transport" => "postMessage",
                             ));
		 $wp_customize->add_control(new WP_Customize_Control( $wp_customize, "woonotinstall",
        array(
           
            'section'  => 'ishop_woocommercenot',
            "settings" => "woonotinstall",            
	    'priority'    => 1,
        )	));
                 
                 
        }
        endif;
  	

   
/***********************************************
* Social Profiles
***********************************************/
            if ( class_exists( 'WP_Customize_Panel' ) ):
	
		$wp_customize->add_panel( 'ishop_panel_social', array(
			'priority' => 33,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Social Profiles', 'ishop' )
		) );
		
		$wp_customize->add_section( 'ishop_social_links' , array(
				'title'       => __( 'Social Profile Links', 'ishop' ),
				'priority'    => 30,
				'panel' => 'ishop_panel_social'
		));
            
                /* Facebook */	
		 $wp_customize->add_setting("ishop_facebook", 
                         array(
                             'default' =>'',
                             'sanitize_callback' => 'esc_url',
                             'capability' => 'edit_theme_options',
                             'type' => 'theme_mod',
                             'transport' => 'postMessage'
                             
                             ));
		 $wp_customize->add_control( new WP_Customize_Control( $wp_customize, "ishop_facebook",
                          array(              
                              "label" => __("Facebook Link", "ishop"),
                                'section'  => 'ishop_social_links',
                                'settings' => 'ishop_facebook',
                                'type' => 'url',
                                'priority'    => 1,
                             )	));
	/* Twitter */		
		
		 $wp_customize->add_setting("ishop_twitter", 
                         array(
                             'default' =>'',
                             'sanitize_callback' => 'esc_url',
                             'capability' => 'edit_theme_options',
                             'type' => 'theme_mod',
                             'transport' => 'postMessage'
                             
                             ));
		 $wp_customize->add_control( new WP_Customize_Control( $wp_customize, "ishop_twitter",
                          array(              
                              "label" => __("Twitter Link", "ishop"),
                                'section'  => 'ishop_social_links',
                                'settings' => 'ishop_twitter',
                                'type' => 'url',
                                'priority'    => 2,
                             )	));
	/* Google Plus */		
		
		 $wp_customize->add_setting("ishop_googleplus", 
                         array(
                             'default' =>'',
                             'sanitize_callback' => 'esc_url',
                             'capability' => 'edit_theme_options',
                             'type' => 'theme_mod',
                             'transport' => 'postMessage'
                             
                             ));
		 $wp_customize->add_control( new WP_Customize_Control( $wp_customize, "ishop_googleplus",
                          array(              
                              "label" => __("Google Plus Link", "ishop"),
                                'section'  => 'ishop_social_links',
                                'settings' => 'ishop_googleplus',
                                'type' => 'url',
                                'priority'    => 3,
                             )	));
	/* Linkedin */		
		
		 $wp_customize->add_setting("ishop_linkedin", 
                         array(
                             'default' =>'',
                             'sanitize_callback' => 'esc_url',
                             'capability' => 'edit_theme_options',
                             'type' => 'theme_mod',
                             'transport' => 'postMessage'
                             
                             ));
		 $wp_customize->add_control( new WP_Customize_Control( $wp_customize, "ishop_linkedin",
                          array(              
                              "label" => __("LinkedIn", "ishop"),
                                'section'  => 'ishop_social_links',
                                'settings' => 'ishop_linkedin',
                                'type' => 'url',
                                'priority'    => 4,
                              
                             )	));

	/* More only for Premium */		
		
              $wp_customize->add_setting("ishop_dribbble", 
                         array(
                             'default' =>'',
                             'sanitize_callback' => 'esc_url',
                             'capability' => 'edit_theme_options',
                             'type' => 'theme_mod',
                             'transport' => 'postMessage'
                             
                             ));
		 $wp_customize->add_control( new WP_Customize_Control( $wp_customize, "ishop_dribbble",
                          array(              
                           
                               'description'	=> __( 'Upgrade theme to <a href="http://www.insertcart.com/product/ishop-wordpress-theme/">Premium Version</a> get more control and Social buttons widget.', 'ishop' ),
                                'section'  => 'ishop_social_links',
                                'settings' => 'ishop_dribbble',
                               
                                'priority'    => 5,
                             )	));
                 
                 endif;
  
/***********************************************
* Sidebar Widget
***********************************************/
if ( class_exists( 'WP_Customize_Panel' ) ):
	
		$wp_customize->add_panel( 'ishop_theme_widgets', array(
			'priority' => 34,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Popular\Recent Post in sidebar', 'ishop' )
		) );
//Show or Hide Widget
                 $wp_customize->add_setting('hide_sidebar_widget',
		// $args
		array(
			'default'			=> false,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'ishop_sanitize_checkbox'
		)
	);
                 $wp_customize->add_control(new WP_customize_control ($wp_customize,'hide_sidebar_widget',
                         array (
                             
                             'settings'		=> 'hide_sidebar_widget',
                             'section'		=> 'ishop_theme_widget1',
                             'type'			=> 'checkbox',
                             
			'label'			=> __( 'Hide these Posts', 'ishop' )
			
                             
                         )  ));
	/* Popular\Latest Post Widget */		
		$wp_customize->add_section( 'ishop_theme_widget1' , array(
				'title'       => __( 'Popular/Latest Posts', 'ishop' ),
				'priority'    => 30,
                                'description'	=> __( 'Upgrade theme to <a href="http://www.insertcart.com/product/ishop-wordpress-theme/">Premium Version</a> get more control over this option.', 'ishop' ),
				'panel' => 'ishop_theme_widgets'
		));

		
                $wp_customize->add_setting('ishop_widget_range',
		array(
			'default'			=> '5',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
                        'transport' => 'postMessage',
			'sanitize_callback'	=> 'ishop_sanitize_select'
		));
                 
                 $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ishop_widget_range',
		array(
			'settings'		=> 'ishop_widget_range',
			'section'		=> 'ishop_theme_widget1',
			'type'			=> 'select',
			'label'			=> __( 'Choose Numbers post to display', 'ishop' ),
			'choices'		=> array(
				'1' => __( '1', 'ishop' ),
				'2' => __( '2', 'ishop' ),
				'2' => __( '3', 'ishop' ),
				'4' => __( '4', 'ishop' ),
				'5' => __( '5', 'ishop' ),				
				'Pro Ony' => __( 'Pro Only', 'ishop' )
			)
		)));
                 
                 //Popular widget name
                 $wp_customize->add_setting('popular_widget_name',
		array(
			'default'		=> __('Popular Posts','ishop'),
			'type'			=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
                       'sanitize_callback'	=> 'sanitize_text_field'
		));
                 
                 
                 $wp_customize->add_control(new WP_customize_control ($wp_customize,'popular_widget_name',
                         array (
                             
                             'settings'		=> 'popular_widget_name',
                             'section'		=> 'ishop_theme_widget1',
                             'type'			=> 'text',
			'label'			=> __( 'Popular Post name', 'ishop' )
			
                             
                         )  ));
                         
                 //Recent widget name
                 $wp_customize->add_setting('recent_widget_name',
		array(
			'default'		=> __('Recent Posts','ishop'),
			'type'			=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
                       'sanitize_callback'	=> 'sanitize_text_field'
		));
                 
                 
                 $wp_customize->add_control(new WP_customize_control ($wp_customize,'recent_widget_name',
                         array (
                             
                             'settings'		=> 'recent_widget_name',
                             'section'		=> 'ishop_theme_widget1',
                             'type'			=> 'text',
			'label'			=> __( 'Recent Post name', 'ishop' )
			
                             
                         )  ));
                     
                 
	

			endif;
                        
                        
/***********************************************
* Theme Color Customize
***********************************************/
if ( class_exists( 'WP_Customize_Panel' ) ):
	
		$wp_customize->add_panel( 'ishop_theme_colorcustomize', array(
			'priority' => 35,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
                    'description'	=> __( 'Featured Image.', 'ishop' ),
			'title' => __( 'Theme Settings & Color', 'ishop' )
		) );
$wp_customize->add_section( 'ishop_theme_featuredarea' , array(
				'title'       => __( 'Featured Area', 'ishop' ),
				
                                'description'	=> __( 'Upgrade theme to <a href="http://www.insertcart.com/product/ishop-wordpress-theme/">Premium Version</a> get more options.', 'ishop' ),
				'panel' => 'ishop_theme_colorcustomize'
		));
		   $wp_customize->add_setting('featured_image',
		// $args
		array(
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'ishop_sanitize_image'
		)
	);
                $wp_customize->add_control(
		new WP_Customize_Image_Control(	$wp_customize,	'featured_image1',
			array(
				'settings'		=> 'featured_image',
				'section'		=> 'ishop_theme_featuredarea',
				'label'			=> __( 'Featured Image', 'ishop' )
				
			)
		)
	);
                
                 $wp_customize->add_setting('featured_textarea',
		array(
			
                    'default'			=> __('This is Features Area Put text or HTML here','ishop'),
			'type'			=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback' => 'ishop_sanitize_html'
		)
	);
                $wp_customize->add_control('featured_textarea',
		array(
			'settings'		=> 'featured_textarea',
			'section'		=> 'ishop_theme_featuredarea',
			'type'			=> 'textarea',
			'label'			=> __( 'Featured Area text', 'ishop' ),
			'description'	=> __( 'Write anything you want about image or website. HTML allowed here.', 'ishop' ),
		)
	);
                
                
		$wp_customize->add_section( 'ishop_theme_frontpage' , array(
				'title'       => __( 'Front Page Customize', 'ishop' ),
				
                                'description'	=> __( 'Upgrade theme to <a href="http://www.insertcart.com/product/ishop-wordpress-theme/">Premium Version</a> get more options.', 'ishop' ),
				'panel' => 'ishop_theme_colorcustomize'
		));

	
                 //Show or Hide woo product
                 $wp_customize->add_setting('hide_woocommerce_shop',
	
		array(
			'default'			=> false,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'ishop_sanitize_checkbox'
		)
	);
                 $wp_customize->add_control(new WP_customize_control ($wp_customize,'hide_woocommerce_shop',
                         array (
                             
                             'settings'		=> 'hide_woocommerce_shop',
                             'section'		=> 'ishop_theme_frontpage',
                             'type'		=> 'checkbox',                             
                            'label'		=> __( 'Hide Woocommerce Products', 'ishop' )
			
                             
                         )  ));
                 //Show or Hide woo product
                 $wp_customize->add_setting('hide_blog_post',
	
		array(
			'default'			=> false,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'ishop_sanitize_checkbox'
		)
	);
                 $wp_customize->add_control(new WP_customize_control ($wp_customize,'hide_blog_post',
                         array (
                             
                             'settings'		=> 'hide_blog_post',
                             'section'		=> 'ishop_theme_frontpage',
                             'type'		=> 'checkbox',                             
                            'label'		=> __( 'Hide Blog Posts', 'ishop' )
			
                             
                         )  ));
                 //Front Page Shop title
                 $wp_customize->add_setting('shop_front_name',
		array(
			'default'		=> __('Shop','ishop'),
			'type'			=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
                       'sanitize_callback'	=> 'sanitize_text_field'
		));
                 
                 
                 $wp_customize->add_control(new WP_customize_control ($wp_customize,'shop_front_name',
                         array (
                             
                             'settings'		=> 'shop_front_name',
                             'section'		=> 'ishop_theme_frontpage',
                             'type'			=> 'text',
			'label'			=> __( 'SHOP name change front page', 'ishop' )
			
                             
                         )  ));
                         
                 //Blog Posts name
                 $wp_customize->add_setting('blog_front_name',
		array(
			'default'		=> __('Blog Posts','ishop'),
			'type'			=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
                       'sanitize_callback'	=> 'sanitize_text_field'
		));
                 
                 
                 $wp_customize->add_control(new WP_customize_control ($wp_customize,'blog_front_name',
                         array (
                             
                             'settings'		=> 'blog_front_name',
                             'section'		=> 'ishop_theme_frontpage',
                             'type'			=> 'text',
			'label'			=> __( 'BLOG POST label name change', 'ishop' )
			
                             
                         )  ));
                     
               
	
                 
                  //Shop Label Color
                 $wp_customize->add_setting('shoplabel_color',
	
		array(
			'default'			=> '#43AC6A',
			'type'				=> 'theme_mod',
                    'transport' => 'postMessage',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_hex_color'
		)
	);
                 $wp_customize->add_control(new WP_Customize_Color_Control ($wp_customize,'shoplabel_color',
                         array (
                             
                             'settings'		=> 'shoplabel_color',
                             'section'		=> 'ishop_theme_frontpage',                            
                            'label'		=> __( 'Shop Label Color [Pro Only]', 'ishop' )
			
                             
                         )  ));
                 //Blog Label Color
                 $wp_customize->add_setting('bloglabel_color',
	
		array(
			'default'			=> '#ED5151',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
                    'transport' => 'postMessage',
			'sanitize_callback'	=> 'sanitize_hex_color'
		)
	);
                 $wp_customize->add_control(new WP_Customize_Color_Control ($wp_customize,'bloglabel_color',
                         array (
                             
                             'settings'		=> 'bloglabel_color',
                             'section'		=> 'ishop_theme_frontpage',                            
                            'label'		=> __( 'Blog Label Color [Pro Only]', 'ishop' )
			
                             
                         )  ));
          
  /*************Top Menu Bar****************/       
   $wp_customize->add_section( 'ishop_theme_navigation' , array(
				'title'       => __( 'Navigation colors [pro only]', 'ishop' ),
				
                                'description'	=> __( 'Upgrade theme to <a href="http://www.insertcart.com/product/ishop-wordpress-theme/">Premium Version</a> get these options work.', 'ishop' ),
				'panel' => 'ishop_theme_colorcustomize'
		));              
    //Top Bar background Color
                 $wp_customize->add_setting('topnavi_color',
	
		array(
			'default'			=> '#ED5151',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
                        'transport' => 'postMessage',
			'sanitize_callback'	=> 'sanitize_hex_color'
		)
	);
                 $wp_customize->add_control(new WP_Customize_Color_Control ($wp_customize,'topnavi_color',
                         array (
                             
                             'settings'		=> 'topnavi_color',
                             'section'		=> 'ishop_theme_navigation',                            
                            'label'		=> __( 'Top menu background color', 'ishop' )
			
                             
                         )  ));
    //Top Bar Hover Color
                 $wp_customize->add_setting('topnavi_hover_color',
	
		array(
			'default'			=> '#333333',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
                    'transport' => 'postMessage',
			'sanitize_callback'	=> 'sanitize_hex_color'
		)
	);
                 $wp_customize->add_control(new WP_Customize_Color_Control ($wp_customize,'topnavi_hover_color',
                         array (
                             
                             'settings'		=> 'topnavi_hover_color',
                             'section'		=> 'ishop_theme_navigation',                            
                            'label'		=> __( 'Top menu hover color', 'ishop' )
			
                             
                         )  ));
                 //Top Bar font Color
                 $wp_customize->add_setting('topnavi_font_color',
	
		array(
			'default'			=> '#FFFFFF',
			'type'				=> 'theme_mod',
                    'transport' => 'postMessage',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_hex_color'
		)
	);
                 $wp_customize->add_control(new WP_Customize_Color_Control ($wp_customize,'topnavi_font_color',
                         array (
                             
                             'settings'		=> 'topnavi_font_color',
                             'section'		=> 'ishop_theme_navigation',                            
                            'label'		=> __( 'Top menu font color', 'ishop' )
			
                             
                         )  ));
                 
                  //Main Navigation background Color
                 $wp_customize->add_setting('mainnavi_bgcolor',
	
		array(
			'default'			=> '#f7f7f7',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
                    'transport' => 'postMessage',
			'sanitize_callback'	=> 'sanitize_hex_color'
		)
	);
                 $wp_customize->add_control(new WP_Customize_Color_Control ($wp_customize,'mainnavi_bgcolor',
                         array (
                             
                             'settings'		=> 'mainnavi_bgcolor',
                             'section'		=> 'ishop_theme_navigation',                            
                            'label'		=> __( 'Main Navigation background color', 'ishop' )
			
                             
                         )  ));
                 //Main Navigation font Color
                 $wp_customize->add_setting('mainnavi_font_color',
	
		array(
			'default'			=> '#008CC1',
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
                    'transport' => 'postMessage',
			'sanitize_callback'	=> 'sanitize_hex_color'
		)
	);
                 $wp_customize->add_control(new WP_Customize_Color_Control ($wp_customize,'mainnavi_font_color',
                         array (
                             
                             'settings'		=> 'mainnavi_font_color',
                             'section'		=> 'ishop_theme_navigation',                            
                            'label'		=> __( 'Main Navigation font color', 'ishop' )
			
                             
                         )  ));
/*************ticker****************/       
   $wp_customize->add_section( 'ishop_ticker' , array(
				'title'       => __( 'News Ticker', 'ishop' ),
				'priority'    => 31,
                                'description'	=> __( 'Upgrade theme to <a href="http://www.insertcart.com/product/ishop-wordpress-theme/">Premium Version</a> get more options.', 'ishop' ),
				'panel' => 'ishop_theme_colorcustomize'
		));              
    //Hide new ticker
              $wp_customize->add_setting('hide_news_ticker',
	
		array(
			'default'			=> false,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'ishop_sanitize_checkbox'
		)
	);
                 $wp_customize->add_control(new WP_customize_control ($wp_customize,'hide_news_ticker',
                         array (
                             
                             'settings'		=> 'hide_news_ticker',
                             'section'		=> 'ishop_ticker',
                             'type'		=> 'checkbox',                             
                            'label'		=> __( 'Hide News Ticker', 'ishop' )
			
                             
                         )  ));    
             
                  //Ticker name
                 $wp_customize->add_setting('ticker_name',
		array(
			'default'		=> __('News','ishop'),
			'type'			=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
                       'sanitize_callback'	=> 'sanitize_text_field'
		));
                 
                 
                 $wp_customize->add_control(new WP_customize_control ($wp_customize,'ticker_name',
                         array (
                             
                             'settings'		=> 'ticker_name',
                             'section'		=> 'ishop_ticker',
                             'type'			=> 'text',
			'label'			=> __( 'Put Name for news ticker box', 'ishop' )
			
                             
                         )  ));
  /*************QR Code Generator****************/       
   $wp_customize->add_section( 'ishop_qrcode' , array(
				'title'       => __( 'QR Code Generator(Pro Only)', 'ishop' ),
				'priority'    => 31,
                 
				'panel' => 'ishop_theme_colorcustomize'
		));              
    //Hide new ticker
              $wp_customize->add_setting('hide_qrcode',
	
		array(
			'default'			=> false,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'ishop_sanitize_checkbox'
		)
	);
                 $wp_customize->add_control(new WP_customize_control ($wp_customize,'hide_qrcode',
                         array (
                             
                             'settings'		=> 'hide_qrcode',
                             'section'		=> 'ishop_qrcode',							 
                             'type'		=> 'checkbox',
                            'label'		=> __( 'Hide QR Code', 'ishop' )
			
                             
                         )  ));    
             
                  //QR Code Generator
                 $wp_customize->add_setting('qrcodesetting',
		array(
			'default'		=> __('Scan QR Code to open link on mobile','ishop'),
			'type'			=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
            'sanitize_callback'	=> 'sanitize_text_field'
		));
                 
                 
                 $wp_customize->add_control(new WP_customize_control ($wp_customize,'qrcodesetting',
                         array (
                             
                             'settings'		=> 'qrcodesetting',
                             'section'		=> 'ishop_qrcode',
                             'type'			=> 'text',
							'label'			=> __( 'Put description for QR Code use short code on post or page [ishop-qr]', 'ishop' )
			
                             
                         )  ));
  
                 
endif; 


/***********************************************
* Sidebar Widget
***********************************************/
if ( class_exists( 'WP_Customize_Panel' ) ):
	
		$wp_customize->add_panel( 'ishop_slider', array(
			'priority' => 38,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Slider', 'ishop' )
                    
		) );

 $wp_customize->add_section( 'slider_section' , array(
				'title'       => __( 'Slider', 'ishop' ),
				'priority'    => 31,
                'description'	=> __( 'Upgrade theme to <a href="http://www.insertcart.com/product/ishop-wordpress-theme/">Premium Version</a> get more slide & options.', 'ishop' ),
				
		));   
//Show or Hide Widget
                 $wp_customize->add_setting('hide_slider',
		// $args
		array(
			'default'			=> true,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'transport' => 'post',
			'sanitize_callback'	=> 'esc_text'
		)
	);
	 $wp_customize->add_control(new WP_customize_control ($wp_customize,'hide_slider',
			 array (
				 
				 'settings'		=> 'hide_slider',
				 'section'		=> 'slider_section',
				 'type'		=> 'text',                             
				'label'			=> __( 'Use Smart Slider 3', 'ishop' ),
				'description'			=> __('Enable smart Slider 3 from plugin and then.', 'ishop'). '<a href="' . esc_url(__(admin_url( 'admin.php?page=smart-slider-3' ).'','ishop')) . '" target="_blank">' . esc_attr__( 'Set From here', 'ishop' ) . '</a>'

				 
			 )  ));
					
				            
		  
             
                 
                   /* Slide 5	*/	
               
			endif;
                        
  
}

add_action("customize_register","ishop_customize_register");
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ishop_customize_preview_js() {
	wp_enqueue_script( 'ishop_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'ishop_customize_preview_js' );

function ishop_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
function ishop_sanitize_nohtml( $nohtml ) {
	return wp_filter_nohtml_kses( $nohtml );
}
function ishop_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}


function ishop_registers() {
    wp_register_script( 'ishop_jquery_ui', get_template_directory_uri() . '/js/jquery-ui.js', array("jquery"), '20120206', true  );
	wp_enqueue_script( 'ishop_jquery_ui' );
	wp_register_script( 'ishop_customizer_script', get_template_directory_uri() . '/js/ishop_customizer.js', array("jquery","ishop_jquery_ui"), '20120206', true  );
	wp_enqueue_script( 'ishop_customizer_script' );
	
	wp_localize_script( 'ishop_customizer_script', 'scatmanjhon', array(
		'documentation' => __( 'Documentation', 'ishop' ),
		'pro' => __('Upgrade to Pro','ishop'),
		'support' => __('Support Forum','ishop')
		
	) );
}
add_action( 'customize_controls_enqueue_scripts', 'ishop_registers' );


function ishop_sanitize_image( $image, $setting ) {
	/*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
	// Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}
function ishop_sanitize_css( $css ) {
	return wp_strip_all_tags( $css );
}

function ishop_sanitize_html( $html ) {
	return stripslashes(wp_filter_post_kses( $html ));
        
}

 