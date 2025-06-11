<?php
	/* Dynamic Styles **/
	if( !function_exists( 'accesspress_basic_dynamic_styles' ) ) {
		function accesspress_basic_dynamic_styles() {

			$custom_css = '';
			global $apbasic_options;
	        $old_setting = get_option('apbasic_options',$apbasic_options);
            $apbasic_settings = wp_parse_args($old_setting, $apbasic_options);
            /*echo "<pre>";
            print_r($apbasic_settings);
            echo "</pre>";*/
            $background_image = isset($apbasic_settings['background_image'])? $apbasic_settings['background_image'] : 'pattern0';
	        $bg_img = get_template_directory_uri().'/inc/admin-panel/images/'.$background_image.'.png';

	        if( $background_image == 'pattern0' ) {
	        	$custom_css .= "body{
	        		background: none;
	        	}";
	        } else {
	        	$custom_css .= "body{
	        		background: url({$bg_img});
	        	}";
	        }
	        $template_color = isset( $apbasic_settings['template_color'] ) ? $apbasic_settings['template_color'] : '#dc3522';

	        if( $template_color ) {
               $light_tpl_color = accesspress_basic_colour_brightness($template_color, 0.9);
               $dark_tpl_color = accesspress_basic_colour_brightness($template_color, -0.8);
               $tpl_rgb = accesspress_basic_hex2rgb($template_color);
	           
                /** Background Color **/
                $custom_css .= "
                    .menu-wrapper,
                    #site-navigation .sub-menu,
                    .slide_readmore-button:hover,
                    .ap-basic-slider-wrapper .bx-pager-item .bx-pager-link.active:before,
                    .ap-basic-slider-wrapper .bx-pager-item .bx-pager-link:hover:before,
                    .feature-post-wrap figure.feature-post-thumbnail figcaption a i.fa,
                    .icon-image, .widget .icon-image:hover,
                    .service-post-wrap figure.services-post-thumbnail figcaption a i.fa,
                    .cta-btn-wrap a:hover, .feat-page_readmore_btn:hover,
                    .featured-footer .wpcf7 input[type=\"submit\"],
                    #go-top,
                    .ak-search .search-form,
                    .navigation .nav-links a:hover, .bttn:hover, button,
                    input[type=\"button\"]:hover,
                    input[type=\"reset\"]:hover,
                    input[type=\"submit\"]:hover,
                    .no-results .page-content input[type=\"submit\"]{
                        background: {$template_color};
                    }";
                    
                /** Light Background Color **/
                $custom_css .= "
                    #site-navigation ul li:hover > a,
                    #site-navigation ul li.current-menu-item > a,
                    #site-navigation ul li.current-menu-ancestor > a,
                    .featured-footer .wpcf7 input[type=\"submit\"]:hover,
                    .no-results .page-content input[type=\"submit\"]:hover{
                        background: {$light_tpl_color};
                    }";
                    
                /** Dark Background Color **/
                $custom_css .= "
                    .ak-search .search-form .search-submit,
                    .ak-search .search-form .search-submit:hover{
                        background: {$dark_tpl_color}   
                    }";
                    
                /** 0.7 opacity Background **/
                $custom_css .= "
                    .ak-search.active .overlay-search{
                        background: rgba({$tpl_rgb[0]}, {$tpl_rgb[1]}, {$tpl_rgb[2]}, 0.7)
                    }";
                
                /** Color **/
                $custom_css .= "
                    .site-title a,
                    .call-us a,
                    .slide_readmore-button,
                    .feat_readmore-button,
                    .cta-btn-wrap a,
                    .widget a:hover,
                    .widget a:hover:before,
                    .icon_readmore-button, .services_readmore-button,
                    .ap_toggle.open .ap_toggle_title,
                    .ap_toggle.open .ap_toggle_title:before,
                    .feat-page_readmore_btn,
                    .aptf-timestamp a,
                    .widget_text a,
                    h1.entry-title a:hover,
                    .search-results .entry-title a:hover,
                    .entry-footer-wrapper .user-wrapper:hover i.fa,
                    .category-blogs .entry-title a:hover,
                    .entry-footer a:hover,
                    .posted-on a,
                    .category-blogs .entry-footer .readmore a,
                    .error-404 .page-title .oops{
                        color: {$template_color};
                    }";
                    
                /** Border Color **/
                $custom_css .= "
                    .slide_readmore-button,
                    .cta-btn-wrap a,
                    .feat-page_readmore_btn,
                    .navigation .nav-links a, .bttn, button,
                    input[type=\"button\"], input[type=\"reset\"], input[type=\"submit\"]{
                        border-color: {$template_color};                        
                    }";
                    
                /** Box Shadow **/
                $custom_css .= "
                    .widget .icon-image:before{
                        box-shadow: 0 0 0 1px {$template_color}; 
                    }";

                /** Media Query **/
                $custom_css .= "
                    @media (max-width: 1024px){
                        .main-navigation-responsive ul li a{
                            background: {$template_color};
                            border-color: {$light_tpl_color} !important;
                        }
                    }";

                $custom_css .= "
                    @media (max-width: 1024px){
                        .main-navigation-responsive ul li a:hover, .main-navigation-responsive ul li.current_page_item a{
                            background: {$light_tpl_color};
                        }
                    }";
	        		
	        }

	        wp_add_inline_style( 'accesspress-basic-style', $custom_css );
		}
	}

	add_action( 'wp_enqueue_scripts', 'accesspress_basic_dynamic_styles' );
    
    function accesspress_basic_colour_brightness($hex, $percent) {
        // Work out if hash given
        $hash = '';
        if (stristr($hex, '#')) {
            $hex = str_replace('#', '', $hex);
            $hash = '#';
        }
        /// HEX TO RGB
        $rgb = array(hexdec(substr($hex, 0, 2)), hexdec(substr($hex, 2, 2)), hexdec(substr($hex, 4, 2)));
        //// CALCULATE 
        for ($i = 0; $i < 3; $i++) {
            // See if brighter or darker
            if ($percent > 0) {
                // Lighter
                $rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1 - $percent));
            } else {
                // Darker
                $positivePercent = $percent - ($percent * 2);
                $rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1 - $positivePercent));
            }
            // In case rounding up causes us to go to 256
            if ($rgb[$i] > 255) {
                $rgb[$i] = 255;
            }
        }
        //// RBG to Hex
        $hex = '';
        for ($i = 0; $i < 3; $i++) {
            // Convert the decimal digit to hex
            $hexDigit = dechex($rgb[$i]);
            // Add a leading zero if necessary
            if (strlen($hexDigit) == 1) {
                $hexDigit = "0" . $hexDigit;
            }
            // Append to the hex string
            $hex .= $hexDigit;
        }
        return $hash . $hex;
    }
    
    function accesspress_basic_hex2rgb($hex) {
        $hex = str_replace("#", "", $hex);

        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgb = array($r, $g, $b);
        //return implode(",", $rgb); // returns the rgb values separated by commas
        return $rgb; // returns an array with the rgb values
    }