<?php 
	Kirki::add_config( 'accesspress_basic_config', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'option',
		'option_name'	=> 'apbasic_options'
	) );

	Kirki::add_section( 'accesspressbasic_header_settings', array(
	    'title'          => esc_html__( 'Header Settings', 'accesspress-basic' ),
	    'description'    => esc_html__( 'Setup header settings.', 'accesspress-basic' ),
	    'priority'       => 10,
	) );

		Kirki::add_field( 'accesspress_basic_config', [
			'type'        => 'text',
			'settings'    => 'header_text',
			'label'       => esc_html__( 'Header Text', 'accesspress-basic' ),
			'description' => esc_html__( 'Use Contents From Instead Header Text Widget Instead.', 'accesspress-basic' ),
			'section'     => 'accesspressbasic_header_settings',
			'priority'    => 10,
        	'default'	=> 'Call Us: +1-123-123-45-78',
			'sanitize_callback' => 'sanitize_text_field',
		] );

		Kirki::add_field( 'accesspress_basic_config', [
			'type'        => 'switch',
			'settings'    => 'show_search',
			'label'       => esc_html__( 'Show Search', 'accesspress-basic' ),
			'description' => esc_html__( 'Show Search in Header?', 'accesspress-basic' ),
			'section'     => 'accesspressbasic_header_settings',
			'default'     => '1',
			'priority'    => 20,
			'choices'     => [
				true  => esc_html__( 'Enable', 'accesspress-basic' ),
				false => esc_html__( 'Disable', 'accesspress-basic' ),
			],
			'sanitize_callback'	=> 'accesspress_basic_sanitize_checkbox',
		] );

		Kirki::add_field( 'accesspress_basic_config', [
			'type'        => 'switch',
			'settings'    => 'show_social_links',
			'label'       => esc_html__( 'Show Social Links', 'accesspress-basic' ),
			'description' => esc_html__( 'Show Social Icons in Header?', 'accesspress-basic' ),
			'section'     => 'accesspressbasic_header_settings',
			'default'     => '1',
			'priority'    => 20,
			'choices'     => [
				true  => esc_html__( 'Enable', 'accesspress-basic' ),
				false => esc_html__( 'Disable', 'accesspress-basic' ),
			],
			'sanitize_callback'	=> 'accesspress_basic_sanitize_checkbox',
		] );

		Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'image',
				'settings'    => 'header_logo',
				'label'       => esc_html__( 'Header Logo', 'accesspress-basic' ),
				'section'     => 'accesspressbasic_header_settings',
				'default'     => '',
				'priority'    => 30,
			] );

		Kirki::add_field( 'accesspress_basic_config', [
			'type'        => 'radio',
			'settings'    => 'show_header',
			'label'       => esc_html__( 'Show', 'accesspress-basic' ),
			'section'     => 'accesspressbasic_header_settings',
			'default'     => 'disable',
			'priority'    => 30,
			'choices'     => array(
        'header_logo_only'  => esc_html__( 'Header Logo Only', 'accesspress-basic' ),
                'header_text_only'  => esc_html__( 'Header Text Only', 'accesspress-basic' ),
                'show_both'         => esc_html__( 'Show Both', 'accesspress-basic' ),
                'disable'           => esc_html__( 'Disable', 'accesspress-basic' ),
    ),
			'sanitize_callback'	=> 'accesspress_basic_sanitize_hd_layout'
		] );

		Kirki::add_section( 'accesspress_basic_desg_settings', array(
		    'title'          => esc_html__( 'Design Settings', 'accesspress-basic' ),
		    'description'    => esc_html__( 'Setup design template.', 'accesspress-basic' ),
		    'priority'       => 50,
		) );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'radio',
				'settings'    => 'site_layout',
				'label'       => esc_html__( 'Site Layout', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_desg_settings',
				'default'     => 'full_width',
				'priority'    => 10,
				'choices'     => [
					'boxed'   => esc_html__( 'Boxed', 'accesspress-basic' ),
					'full_width' => esc_html__( 'Full Width', 'accesspress-basic' ),
				],
				'sanitize_callback'	=> 'accesspress_basic_sanitize_layout_typ'
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'color',
				'settings'    => 'template_color',
				'label'       => esc_html__( 'Template Color', 'accesspress-basic' ),
				'description' => esc_html__( ' Set the template color for the site.', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_desg_settings',
				'default'     => '#dc3522',
				'priority'    => 20,
            	'sanitize_callback'	=> 'sanitize_hex_color',
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'radio-image',
				'settings'    => 'background_image',
				'label'       => esc_html__( 'Background Image', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_desg_settings',
				'default'     => 'pattern0',
				'priority'    => 30,
				'choices'     => [
					'pattern0'  => get_template_directory_uri() . '/inc/admin-panel/images/pattern0.png',
					'pattern1'  => get_template_directory_uri() . '/inc/admin-panel/images/pattern1.png',
					'pattern2'  => get_template_directory_uri() . '/inc/admin-panel/images/pattern2.png',
					'pattern3'  => get_template_directory_uri() . '/inc/admin-panel/images/pattern3.png',
					'pattern4'  => get_template_directory_uri() . '/inc/admin-panel/images/pattern4.png',
				],
				'sanitize_callback'	=> 'accesspress_basic_sanitize_bg_img',
				'active_callback' => [
					[
						'setting'  => 'site_layout',
						'operator' => '==',
						'value'    => 'boxed',
					]
				],
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'radio-image',
				'settings'    => 'default_layouts',
				'label'       => esc_html__( 'Default Layout (Category/Blog)', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_desg_settings',
				'default'     => 'right_sidebar',
				'priority'    => 40,
				'sanitize_callback'	=> 'accesspress_basic_sanitize_blog_layout',
				'choices'     => [
					'left_sidebar'  	=> get_template_directory_uri() . '/inc/admin-panel/images/left-sidebar.png',
					'right_sidebar'  	=> get_template_directory_uri() . '/inc/admin-panel/images/right-sidebar.png',
					'both_sidebar'  	=> get_template_directory_uri() . '/inc/admin-panel/images/both-sidebar.png',
					'no_sidebar_wide'  	=> get_template_directory_uri() . '/inc/admin-panel/images/no-sidebar-wide.png',
					'no_sidebar_narrow' => get_template_directory_uri() . '/inc/admin-panel/images/no-sidebar-narrow.png',
				],
			] );
			
			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'radio-image',
				'settings'    => 'page_layouts',
				'label'       => esc_html__( 'Default Layout (Pages Only)', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_desg_settings',
				'default'     => 'right_sidebar',
				'priority'    => 50,
				'sanitize_callback'	=> 'accesspress_basic_sanitize_blog_layout',
				'choices'     => [
					'left_sidebar'  	=> get_template_directory_uri() . '/inc/admin-panel/images/left-sidebar.png',
					'right_sidebar'  	=> get_template_directory_uri() . '/inc/admin-panel/images/right-sidebar.png',
					'both_sidebar'  	=> get_template_directory_uri() . '/inc/admin-panel/images/both-sidebar.png',
					'no_sidebar_wide'  	=> get_template_directory_uri() . '/inc/admin-panel/images/no-sidebar-wide.png',
					'no_sidebar_narrow' => get_template_directory_uri() . '/inc/admin-panel/images/no-sidebar-narrow.png',
				],
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'radio-image',
				'settings'    => 'post_layouts',
				'label'       => esc_html__( 'Default Layout (Posts Only)', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_desg_settings',
				'default'     => 'right_sidebar',
				'priority'    => 60,
				'sanitize_callback'	=> 'accesspress_basic_sanitize_blog_layout',
				'choices'     => [
					'left_sidebar'  	=> get_template_directory_uri() . '/inc/admin-panel/images/left-sidebar.png',
					'right_sidebar'  	=> get_template_directory_uri() . '/inc/admin-panel/images/right-sidebar.png',
					'both_sidebar'  	=> get_template_directory_uri() . '/inc/admin-panel/images/both-sidebar.png',
					'no_sidebar_wide'  	=> get_template_directory_uri() . '/inc/admin-panel/images/no-sidebar-wide.png',
					'no_sidebar_narrow' => get_template_directory_uri() . '/inc/admin-panel/images/no-sidebar-narrow.png',
				],
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'radio',
				'settings'    => 'blog_displays',
				'label'       => esc_html__( 'Blog Posts Display Layout', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_desg_settings',
				'default'     => 'full_width',
				'priority'    => 70,
				'choices'     => [
					'blog_image_large'   	 		=> esc_html__( 'Blog Image Large', 'accesspress-basic' ),
					'blog_image_medium' 			=> esc_html__( 'Blog Image Medium', 'accesspress-basic' ),
					'blog_image_alternate_medium' 	=> esc_html__( 'Blog Image Alternate Medium', 'accesspress-basic' ),
					'blog_full_content' 			=> esc_html__( 'Blog Full Content', 'accesspress-basic' ),

				],
				'sanitize_callback'	=> 'accesspress_basic_sanitize_blg_layout'
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'switch',
				'settings'    => 'show_footer_featured_section',
				'label'       => esc_html__( 'Enable/Disable (Footer Featured Widgets)', 'accesspress-basic' ),
				'description' => esc_html__( ' Show Footer Featured Widget Section', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_desg_settings',
				'default'     => '1',
				'priority'    => 80,
				'choices'     => [
					true  => esc_html__( 'Enable', 'accesspress-basic' ),
					false => esc_html__( 'Disable', 'accesspress-basic' ),
				],
				'sanitize_callback'	=> 'accesspress_basic_sanitize_checkbox',
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'switch',
				'settings'    => 'enable_comments_page',
				'label'       => esc_html__( 'Enable/Disable (Page Comments)', 'accesspress-basic' ),
				'description' => esc_html__( 'Show Comments in Page', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_desg_settings',
				'default'     => '1',
				'priority'    => 90,
				'choices'     => [
					true  => esc_html__( 'Enable', 'accesspress-basic' ),
					false => esc_html__( 'Disable', 'accesspress-basic' ),
				],
				'sanitize_callback'	=> 'accesspress_basic_sanitize_checkbox',
			] );

		Kirki::add_section( 'accesspress_basic_slider_settings', array(
		    'title'          => esc_html__( 'Slider Settings', 'accesspress-basic' ),
		    'description'    => esc_html__( 'Setup slider template.', 'accesspress-basic' ),
		    'priority'       => 60,
		) );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'switch',
				'settings'    => 'show_slider',
				'label'       => esc_html__( 'Show Slider', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'default'     => '1',
				'priority'    => 10,
				'choices'     => [
					true  => esc_html__( 'Yes', 'accesspress-basic' ),
					false => esc_html__( 'No', 'accesspress-basic' ),
				],
				'sanitize_callback'	=> 'accesspress_basic_sanitize_checkbox',
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'radio',
				'settings'    => 'slider_type',
				'label'       => esc_html__( 'Slider Type', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'default'     => 'default',
				'priority'    => 20,
				'choices'     => [
					'default'   => esc_html__( 'Default', 'accesspress-basic' ),
					'fullwidth' => esc_html__( 'Full Width Slider', 'accesspress-basic' ),
				],
				'sanitize_callback'	=> 'accesspress_basic_sanitize_slider_typ'
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'switch',
				'settings'    => 'enable_slider_in_post',
				'label'       => esc_html__( 'Enable/Disable', 'accesspress-basic' ),
				'description' => esc_html__( 'Enable Slider in Post', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'default'     => '1',
				'priority'    => 30,
				'choices'     => [
					true  => esc_html__( 'Enable', 'accesspress-basic' ),
					false => esc_html__( 'Disable', 'accesspress-basic' ),
				],
				'sanitize_callback'	=> 'accesspress_basic_sanitize_checkbox',
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'radio',
				'settings'    => 'slider_mode',
				'label'       => esc_html__( 'Slider Mode', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'default'     => 'horizontal',
				'priority'    => 40,
				'choices'     => [
					'horizontal'   => esc_html__( 'Horizontal', 'accesspress-basic' ),
					'fade' => esc_html__( 'Fade', 'accesspress-basic' ),
				],
				'sanitize_callback'	=> 'accesspress_basic_sanitize_slider_mode'
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'checkbox',
				'settings'    => 'open_slider_link_in_new_tab',
				'label'       => esc_html__( 'Slider Links Option', 'accesspress-basic' ),
				'description' => esc_html__( ' Open Slider Links in new Tab', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'default'     => true,
				'priority'    => 50,
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'image',
				'settings'    => 'slide1',
				'label'       => esc_html__( 'Slide-1', 'accesspress-basic' ),
				'description' => esc_html__( 'The Recommended Slider Image size is 676X444px for Default Slider & 1350X530px for fullwidth slider.Try using Transparent image for better result.', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'default'     => '',
				'priority'    => 60,
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'text',
				'settings'    => 'slide1_title',
				'label'       => esc_html__( 'Slide-1 Title', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'priority'    => 70,
            	'default'	=> '',
				'sanitize_callback' => 'sanitize_text_field',
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'textarea',
				'settings'    => 'slide1_description',
				'label'       => esc_html__( 'Slider-1 Description', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'priority'    => 80,
				'sanitize_callback' => 'accesspress_lite_sanitize_textarea',
            	'default'	=> ''
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'text',
				'settings'    => 'slide1_readmore_text',
				'label'       => esc_html__( 'Slide-1 Read More Text', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'priority'    => 90,
            	'default'	=> '',
				'sanitize_callback' => 'sanitize_text_field',
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'text',
				'settings'    => 'slide1_readmore_link',
				'label'       => esc_html__( 'Slide-1 Read More Link', 'accesspress-basic' ),
				'description' => esc_html__( 'e.g. fa-train ref link: Get Fa-Icon', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'priority'    => 100,
            	'default'	=> '',
				'sanitize_callback' => 'sanitize_text_field',
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'text',
				'settings'    => 'slide1_readmore_button_icon',
				'label'       => esc_html__( 'Slide-1 Read More Button Icon', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'priority'    => 110,
            	'default'	=> '',
				'sanitize_callback' => 'sanitize_text_field',
			] );


			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'image',
				'settings'    => 'slide2',
				'label'       => esc_html__( 'Slide-2', 'accesspress-basic' ),
				'description' => esc_html__( 'The Recommended Slider Image size is 676X444px for Default Slider & 1350X530px for fullwidth slider.Try using Transparent image for better result.', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'default'     => '',
				'priority'    => 120,
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'text',
				'settings'    => 'slide2_title',
				'label'       => esc_html__( 'Slide-2 Title', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'priority'    => 130,
            	'default'	=> '',
				'sanitize_callback' => 'sanitize_text_field',
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'textarea',
				'settings'    => 'slide2_description',
				'label'       => esc_html__( 'Slider-2 Description', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'priority'    => 140,
				'sanitize_callback' => 'accesspress_lite_sanitize_textarea',
            	'default'	=> ''
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'text',
				'settings'    => 'slide2_readmore_text',
				'label'       => esc_html__( 'Slide-2 Read More Text', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'priority'    => 150,
            	'default'	=> '',
				'sanitize_callback' => 'sanitize_text_field',
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'text',
				'settings'    => 'slide2_readmore_link',
				'label'       => esc_html__( 'Slide-2 Read More Link', 'accesspress-basic' ),
				'description' => esc_html__( 'e.g. fa-train ref link: Get Fa-Icon', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'priority'    => 160,
            	'default'	=> '',
				'sanitize_callback' => 'sanitize_text_field',
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'text',
				'settings'    => 'slide2_readmore_button_icon',
				'label'       => esc_html__( 'Slide-2 Read More Button Icon', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'priority'    => 170,
            	'default'	=> '',
				'sanitize_callback' => 'sanitize_text_field',
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'image',
				'settings'    => 'slide3',
				'label'       => esc_html__( 'Slide-3', 'accesspress-basic' ),
				'description' => esc_html__( 'The Recommended Slider Image size is 676X444px for Default Slider & 1350X530px for fullwidth slider.Try using Transparent image for better result.', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'default'     => '',
				'priority'    => 180,
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'text',
				'settings'    => 'slide3_title',
				'label'       => esc_html__( 'Slide-3 Title', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'priority'    => 190,
            	'default'	=> '',
				'sanitize_callback' => 'sanitize_text_field',
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'textarea',
				'settings'    => 'slide3_description',
				'label'       => esc_html__( 'Slider-3 Description', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'priority'    => 200,
				'sanitize_callback' => 'accesspress_lite_sanitize_textarea',
            	'default'	=> ''
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'text',
				'settings'    => 'slide3_readmore_text',
				'label'       => esc_html__( 'Slide-3 Read More Text', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'priority'    => 210,
            	'default'	=> '',
				'sanitize_callback' => 'sanitize_text_field',
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'text',
				'settings'    => 'slide3_readmore_link',
				'label'       => esc_html__( 'Slide-3 Read More Link', 'accesspress-basic' ),
				'description' => esc_html__( 'e.g. fa-train ref link: Get Fa-Icon', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'priority'    => 220,
            	'default'	=> '',
				'sanitize_callback' => 'sanitize_text_field',
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'text',
				'settings'    => 'slide3_readmore_button_icon',
				'label'       => esc_html__( 'Slide-3 Read More Button Icon', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'priority'    => 230,
            	'default'	=> '',
				'sanitize_callback' => 'sanitize_text_field',
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'image',
				'settings'    => 'slide4',
				'label'       => esc_html__( 'Slide-4', 'accesspress-basic' ),
				'description' => esc_html__( 'The Recommended Slider Image size is 676X444px for Default Slider & 1350X530px for fullwidth slider.Try using Transparent image for better result.', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'default'     => '',
				'priority'    => 240,
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'text',
				'settings'    => 'slide4_title',
				'label'       => esc_html__( 'Slide-4 Title', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'priority'    => 250,
            	'default'	=> '',
				'sanitize_callback' => 'sanitize_text_field',
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'textarea',
				'settings'    => 'slide4_description',
				'label'       => esc_html__( 'Slider-4 Description', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'priority'    => 260,
				'sanitize_callback' => 'accesspress_lite_sanitize_textarea',
            	'default'	=> ''
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'text',
				'settings'    => 'slide4_readmore_text',
				'label'       => esc_html__( 'Slide-4 Read More Text', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'priority'    => 270,
            	'default'	=> '',
				'sanitize_callback' => 'sanitize_text_field',
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'text',
				'settings'    => 'slide4_readmore_link',
				'label'       => esc_html__( 'Slide-4 Read More Link', 'accesspress-basic' ),
				'description' => esc_html__( 'e.g. fa-train ref link: Get Fa-Icon', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'priority'    => 280,
            	'default'	=> '',
				'sanitize_callback' => 'sanitize_text_field',
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'text',
				'settings'    => 'slide4_readmore_button_icon',
				'label'       => esc_html__( 'Slide-4 Read More Button Icon', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_slider_settings',
				'priority'    => 290,
            	'default'	=> '',
				'sanitize_callback' => 'sanitize_text_field',
			] );

	Kirki::add_panel( 'accesspress_basic_translation_settings', array(
	    'priority'    => 70,
	    'title'       => esc_html__( 'Translations', 'accesspress-basic' ),
	    'description' => esc_html__( 'Setup Translations Settings.', 'accesspress-basic' ),
	) );

		Kirki::add_section( 'accesspress_basic_hm_translation', array(
		    'priority'    => 10,
		    'title'          => esc_html__( 'Homepage', 'accesspress-basic' ),
		    'panel'          => 'accesspress_basic_translation_settings',
		) );

			Kirki::add_field( 'accesspress_basic_config', [
					'type'        => 'text',
					'settings'    => 'features_readmore_text',
					'label'       => esc_html__('Read More... (Features)', 'accesspress-basic' ),
					'section'     => 'accesspress_basic_hm_translation',
					'priority'    => 10,
	            	'default'	=> '',
					'sanitize_callback' => 'sanitize_text_field',
				] );

			Kirki::add_field( 'accesspress_basic_config', [
					'type'        => 'text',
					'settings'    => 'services_readmore_text',
					'label'       => esc_html__('Read More... (Services)', 'accesspress-basic' ),
					'section'     => 'accesspress_basic_hm_translation',
					'priority'    => 20,
	            	'default'	=> '',
					'sanitize_callback' => 'sanitize_text_field',
				] );
		Kirki::add_section( 'accesspress_basic_blog_translation', array(
			    'priority'    => 20,
			    'title'          => esc_html__( 'Blog/Archive', 'accesspress-basic' ),
			    'panel'          => 'accesspress_basic_translation_settings',
			) );

			Kirki::add_field( 'accesspress_basic_config', [
					'type'        => 'text',
					'settings'    => 'blog_readmore_text',
					'label'       => esc_html__('Read More', 'accesspress-basic' ),
					'section'     => 'accesspress_basic_blog_translation',
	            	'default'	=> '',
					'sanitize_callback' => 'sanitize_text_field',
				] );

		Kirki::add_section( 'accesspress_basic_sg_page_translation', array(
			    'priority'    => 30,
			    'title'          => esc_html__( 'Single Post Page', 'accesspress-basic' ),
			    'panel'          => 'accesspress_basic_translation_settings',
			) );

			Kirki::add_field( 'accesspress_basic_config', [
					'type'        => 'text',
					'settings'    => 'tagged_text',
			    	'priority'    => 10,
					'label'       => esc_html__('Tagged', 'accesspress-basic' ),
					'section'     => 'accesspress_basic_sg_page_translation',
	            	'default'	  => '',
					'sanitize_callback' => 'sanitize_text_field',
				] );

			Kirki::add_field( 'accesspress_basic_config', [
					'type'        => 'text',
					'settings'    => 'posted_on_text',
			    	'priority'    => 20,
					'label'       => esc_html__('Posted On ..', 'accesspress-basic' ),
					'section'     => 'accesspress_basic_sg_page_translation',
	            	'default'	  => esc_html__('Posted On', 'accesspress-basic' ),
					'sanitize_callback' => 'sanitize_text_field',
				] );

			Kirki::add_field( 'accesspress_basic_config', [
					'type'        => 'text',
					'settings'    => 'by_text',
			    	'priority'    => 30,
					'label'       => esc_html__('By', 'accesspress-basic' ),
					'section'     => 'accesspress_basic_sg_page_translation',
	            	'default'	  => esc_html__('by', 'accesspress-basic' ),
					'sanitize_callback' => 'sanitize_text_field',
				] );

			Kirki::add_field( 'accesspress_basic_config', [
					'type'        => 'text',
					'settings'    => 'posted_in_text',
			    	'priority'    => 30,
					'label'       => esc_html__('Posted In', 'accesspress-basic' ),
					'section'     => 'accesspress_basic_sg_page_translation',
	            	'default'	  => '',
					'sanitize_callback' => 'sanitize_text_field',
				] );

		Kirki::add_section( 'accesspress_basic_search_translation', array(
			    'priority'    => 40,
			    'title'          => esc_html__( 'Search', 'accesspress-basic' ),
			    'panel'          => 'accesspress_basic_translation_settings',
			) );

			Kirki::add_field( 'accesspress_basic_config', [
					'type'        => 'text',
					'settings'    => 'search_results_for_text',
					'label'       => esc_html__('Search Results For', 'accesspress-basic' ),
					'section'     => 'accesspress_basic_search_translation',
	            	'default'	=> '',
					'sanitize_callback' => 'sanitize_text_field',
				] );

		Kirki::add_section( 'accesspress_basic_footer_setting', array(
		    'priority'    => 80,
		    'title'          => esc_html__( 'Footer Setting', 'accesspress-basic' ),
		    'description'    => esc_html__( 'Setup Footer settings.', 'accesspress-basic' ),
		) );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'text',
				'settings'    => 'footer_copyright',
				'label'       => esc_html__( 'Footer Text', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_footer_setting',
				'priority'    => 20,
            	'default'	=> '',
				'sanitize_callback' => 'sanitize_text_field',
			] );

		//post setting
		Kirki::add_section( 'accesspress_basic_post_setting', array(
		    'priority'    => 50,
		    'title'          => esc_html__( 'Post Setting', 'accesspress-basic' ),
		    'description'    => esc_html__( 'Setup Post settings.', 'accesspress-basic' ),
		) );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'switch',
				'settings'    => 'show_post_title',
				'label'       => esc_html__( 'Show Post Title', 'accesspress-basic' ),
				'description' => esc_html__( 'Show post title in Single Post?', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_post_setting',
				'default'     => '1',
				'priority'    => 10,
				'choices'     => [
					true  => esc_html__( 'Enable', 'accesspress-basic' ),
					false => esc_html__( 'Disable', 'accesspress-basic' ),
				],
				'sanitize_callback'	=> 'accesspress_basic_sanitize_checkbox',
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'switch',
				'settings'    => 'show_post_meta_data',
				'label'       => esc_html__( 'Show Meta Data', 'accesspress-basic' ),
				'description' => esc_html__( 'Show date and author in Single Post?', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_post_setting',
				'default'     => '1',
				'priority'    => 10,
				'choices'     => [
					true  => esc_html__( 'Enable', 'accesspress-basic' ),
					false => esc_html__( 'Disable', 'accesspress-basic' ),
				],
				'sanitize_callback'	=> 'accesspress_basic_sanitize_checkbox',
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'switch',
				'settings'    => 'show_post_categories',
				'label'       => esc_html__( ' Show Post Categories ', 'accesspress-basic' ),
				'description' => esc_html__( 'Show Post Categories in Single Post?', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_post_setting',
				'default'     => '1',
				'priority'    => 20,
				'choices'     => [
					true  => esc_html__( 'Enable', 'accesspress-basic' ),
					false => esc_html__( 'Disable', 'accesspress-basic' ),
				],
				'sanitize_callback'	=> 'accesspress_basic_sanitize_checkbox',
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'switch',
				'settings'    => 'enable_comments_post',
				'label'       => esc_html__( 'Enable/Disable (Posts Comments)', 'accesspress-basic' ),
				'description' => esc_html__( 'Show Comments in Posts', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_post_setting',
				'default'     => '1',
				'priority'    => 30,
				'choices'     => [
					true  => esc_html__( 'Enable', 'accesspress-basic' ),
					false => esc_html__( 'Disable', 'accesspress-basic' ),
				],
				'sanitize_callback'	=> 'accesspress_basic_sanitize_checkbox',
			] );

			Kirki::add_field( 'accesspress_basic_config', [
				'type'        => 'switch',
				'settings'    => 'show_post_footer_text',
				'label'       => esc_html__( ' Show Post Footer Text ', 'accesspress-basic' ),
				'description' => esc_html__( 'Show Post Footer Text in Single Post?', 'accesspress-basic' ),
				'section'     => 'accesspress_basic_post_setting',
				'default'     => '1',
				'priority'    => 40,
				'choices'     => [
					true  => esc_html__( 'Enable', 'accesspress-basic' ),
					false => esc_html__( 'Disable', 'accesspress-basic' ),
				],
				'sanitize_callback'	=> 'accesspress_basic_sanitize_checkbox',
			] );





	