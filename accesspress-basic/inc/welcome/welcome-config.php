<?php
	/**
	 * Welcome Page Initiation
	*/

	get_template_part('/inc/welcome/welcome');

	/** Plugins **/
	$plugins_args = array(
		// *** Companion Plugins
		'companion_plugins' => array(

		),

		//Displays on Required Plugins tab
		'req_plugins' => array(

			// Free Plugins
			'free_plug' => array(

				'kirki' => array(
					'slug' => 'kirki',
					'filename' => 'kirki.php',
					'class' => 'Kirki'
				),
				'accesspress-twitter-feed' => array(
					'slug' => 'accesspress-twitter-feed',
					'filename' => 'accesspress-twitter-feed.php',
					'class' => 'APSS_Class'
				),
				'accesspress-social-share' => array(
					'slug' => 'accesspress-social-share',
					'filename' => 'accesspress-social-share.php',
					'class' => 'APTF_Class'
				),
				'accesspress-social-icons' => array(
					'slug' => 'accesspress-social-icons',
					'filename' => 'accesspress-social-icons.php',
					'class' => 'APS_Class'
				),
				'siteorigin-panels' => array(
					'slug' => 'siteorigin-panels',
					'filename' => 'siteorigin-panels.php',
					'class' => 'SiteOrigin_Panels'
				),
				'contact-form-7' => array(
					'slug' => 'contact-form-7',
					'filename' => 'wp-contact-form-7.php',
					'class' => 'WPCF7'
				)
			),
			'pro_plug' => array(

			),
		),

		// *** Displays on Import Demo section
		'required_plugins' => array(
			'access-demo-importer' => array(
					'slug' 		=> 'access-demo-importer',
					'name' 		=> esc_html__('Access Demo Importer', 'accesspress-basic'),
					'filename' 	=>'access-demo-importer.php',
					'host_type' => 'wordpress', // Use either bundled, remote, wordpress
					'class' 	=> 'Access_Demo_Importer',
					'info' 		=> esc_html__('Access Demo Importer adds the feature to Import the Demo Conent with a single click.', 'accesspress-basic'),
			),
		

		),

	
	);

	$strings = array(
		// Welcome Page General Texts
		'welcome_menu_text' => esc_html__( 'Accesspress Basic', 'accesspress-basic' ),
		'theme_short_description' => esc_html__( 'AccessPress Basic- is a simple, basic & clean.  It is beautifully designed responsive free WordPress business theme. It has useful features to setup your website fast and make your website operate smoothly. It doesn\'t have much features which you probably won\'t use at all! Full width and boxed layout, featured slider, featured posts, services/features/projects layout, testimonial layout, blog layout, social media integration, call to action and many other page layouts. Fully responsive, WooCommerce compatible, bbPress compatible, translation ready, cross-browser compatible, SEO friendly, RTL support. AccessPress Basic is multi-purpose and is suitable for any type of business. Highest level of compatibility with mostly used WP plugins.  Great customer support via online chat, email, support forum. Official support forum: http://accesspressthemes.com/support/ View full demo here: https://accesspressthemes.com/accesspress-basic/', 'accesspress-basic' ),

		// Plugin Action Texts
		'install_n_activate' 	=> esc_html__('Install and Activate', 'accesspress-basic'),
		'deactivate' 			=> esc_html__('Deactivate', 'accesspress-basic'),
		'activate' 				=> esc_html__('Activate', 'accesspress-basic'),

		// Getting Started Section
		'doc_heading' 		=> esc_html__('Step 1 - Documentation', 'accesspress-basic'),
		'doc_description' 	=> esc_html__('Read the Documentation and follow the instructions to manage the site , it helps you to set up the theme more easily and quickly. The Documentation is very easy with its pictorial  and well managed listed instructions. ', 'accesspress-basic'),
		'doc_link'			=> 'https://doc.accesspressthemes.com/accesspress-basic-documentation/',
		'doc_read_now' 		=> esc_html__( 'Read Now', 'accesspress-basic' ),
		'cus_heading' 		=> esc_html__('Step 2 - Customizer Panel', 'accesspress-basic'),
		'cus_read_now' 		=> esc_html__( 'Go to Customizer Panels', 'accesspress-basic' ),

		// Recommended Plugins Section
		'pro_plugin_title' 			=> esc_html__( 'Premium Plugins', 'accesspress-basic' ),
		'free_plugin_title' 		=> esc_html__( 'Free Plugins', 'accesspress-basic' ),

		

		// Demo Actions
		'activate_btn' 		=> esc_html__('Activate', 'accesspress-basic'),
		'installed_btn' 	=> esc_html__('Activated', 'accesspress-basic'),
		'demo_installing' 	=> esc_html__('Installing Demo', 'accesspress-basic'),
		'demo_installed' 	=> esc_html__('Demo Installed', 'accesspress-basic'),
		'demo_confirm' 		=> esc_html__('Are you sure to import demo content ?', 'accesspress-basic'),

		// Actions Required
		'req_plugin_info' => esc_html__('All these required plugins will be installed and activated while importing demo. Or you can choose to install and activate them manually. If you\'re not importing any of the demos, you must install and activate these plugins manually.', 'accesspress-basic' ),
		'req_plugins_installed' => esc_html__( 'All Recommended action has been successfully completed.', 'accesspress-basic' ),
		'customize_theme_btn' 	=> esc_html__( 'Customize Theme', 'accesspress-basic' ),
		'pro_plugin_title' 			=> esc_html__( 'Premium Plugins', 'accesspress-basic' ),
		'free_plugin_title' 		=> esc_html__( 'Free Plugins', 'accesspress-basic' ),
	);

	/**
	 * Initiating Welcome Page
	*/
	$my_theme_wc_page = new Accesspress_Basic_Welcome( $plugins_args, $strings );