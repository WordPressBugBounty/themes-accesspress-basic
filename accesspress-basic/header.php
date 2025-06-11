<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Accesspress Basic
 */
?><!DOCTYPE html>
<?php
    global $apbasic_options;
    $old_setting = get_option('apbasic_options', $apbasic_options);
    $apbasic_settings = wp_parse_args($old_setting, $apbasic_options);
    $slider_type = isset($apbasic_settings['slider_type'])? $apbasic_settings['slider_type'] : '';
    
    $show_header = isset($apbasic_settings['show_header'])? $apbasic_settings['show_header'] : '';

    $site_layout = isset($apbasic_settings['site_layout']) ? $apbasic_settings['site_layout'] : '';

    if ( is_array( $apbasic_settings ) && ! empty( $apbasic_settings )) {
        extract($apbasic_settings);
    }
    
    $site_class = null;
    if($site_layout == 'boxed'){
        $site_class = 'boxed-layout';
    }

    $header_class = '';
    switch($show_header){
        case 'header_logo_only' :
            $header_class = 'header-logo-only';
            break;
        case 'header_text_only' :
            $header_class = 'header-text-only';
            break;
        case 'show_both' :
            $header_class = 'header-text-logo';
            break;
    }
?>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class($site_class); ?>>
    <?php 
    if ( function_exists( 'wp_body_open' ) ) {
     wp_body_open();
     }?>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'accesspress-basic' ); ?></a>

	<header id="masthead" class="site-header <?php echo esc_attr($header_class); ?>" role="banner">
        	<div class="top-header clearfix">
                <div class="ap-container">
                    <div class="site-branding">
                        <?php if($show_header != 'disable') : ?>
                            <?php if($show_header == 'header_logo_only') : ?>
                                <?php if(get_header_image()) : ?>
                                    <div class="header-logo-container">
                                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url(header_image()); ?>" /></a></h1>
                                    </div>
                                <?php endif; ?>
                            <?php elseif($show_header == 'header_text_only') : ?>
                                <div class="header-text-container">
                        			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                                </div>
                            <?php else : ?>
                                <?php if(get_header_image()) : ?>
                                    <div class="header-logo-container">
                                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url($header_logo); ?>" /></a></h1>
                                    </div>
                                <?php endif; ?>
                                <div class="header-text-container">
                        			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                                </div>
                            <?php endif; ?>
                            
                        <?php endif; ?>
            		</div><!-- .site-branding -->
                    <div class="right-top-head">
                        <?php if(is_active_sidebar('apbasic_header_text')) : ?>
                            <div class="call-us"><?php dynamic_sidebar('apbasic_header_text'); ?></div>
                        <?php else : ?>
                            <?php if(!empty($header_text)) : ?>
                                <div class="call-us"><?php echo esc_html($header_text); ?></div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php  
                        $show_social_links = isset($apbasic_settings['show_social_links'])? $apbasic_settings['show_social_links'] : '';
                        
                        if($show_social_links == 1 && is_active_sidebar('apbasic_header_social_links')) : ?>
                        <div class="social-icons-head">
                            <div class="social-container">
                                <?php dynamic_sidebar('apbasic_header_social_links'); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div> <!-- ap-container -->
            </div> <!-- top-header -->
            
            <div class="menu-wrapper clearfix"> 
                <div class="ap-container">
                    <button class="btn-transparent-toggle menu-trigger"><span></span><span></span><span></span></button>   
            		<nav id="site-navigation" class="main-navigation" role="navigation">
            			<button class="menu-toggle hide" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'accesspress-basic' ); ?></button>
            			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
            		</nav><!-- #site-navigation -->
                    <?php
                    $show_search = isset($apbasic_settings['show_search'])? $apbasic_settings['show_search'] : ''; 
                    if($show_search == 1) : ?>
                        <div class="search-icon">
                        <i class="fa fa-search"></i>
                        <div class="ak-search">
                            <div class="close">&times;</div>
                                 <form action="<?php echo esc_url(home_url()); ?>" class="search-form" method="get" role="search">
                                    <label>
                                        <span class="screen-reader-text"><?php esc_html_e('Search for:', 'accesspress-basic'); ?></span>
                                        <input type="search" title="Search for:" name="s" value="" placeholder="<?php esc_attr_e('Search content...', 'accesspress-basic'); ?>" class="search-field">
                                    </label>
                                    <input type="submit" value="<?php esc_attr_e('Search', 'accesspress-basic'); ?>" class="search-submit">
                                 </form>
                         <div class="overlay-search"> </div> 
                        </div>
                    </div> 
                <?php endif; ?>
                </div>
            </div>
            <nav id="site-navigation-responsive" class="main-navigation-responsive">
    			<button class="menu-toggle hide" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'accesspress-basic' ); ?></button>
    			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
    		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content <?php echo esc_attr($slider_type) . '-slider'; ?>">
    <?php
    $show_slider = isset($apbasic_settings['show_slider'])? $apbasic_settings['show_slider'] : '';
    $show_slider_in_post = isset($apbasic_settings['show_slider_in_post'])? $apbasic_settings['show_slider_in_post'] : '';

        if($show_slider == 1) :
            if($show_slider_in_post == 1) :
                 if(is_front_page() || is_single()) :
                 ?>
                <div class="ap-basic-slider-wrapper">
                <?php if($slider_type == 'default') : ?>
                <div class="ap-container">
                <?php endif; ?>
                 <?php 
                    do_action('accesspress_basic_slider');
                ?>
                <?php if($slider_type == 'default') : ?>
                </div>
                <?php endif; ?>
                </div>
                <?php
                 endif;
            else:
                if(is_front_page()) :
                ?>
                <div class="ap-basic-slider-wrapper">
                <?php if($slider_type == 'default') : ?>
                <div class="ap-container">
                <?php endif; ?>
                <?php
                    do_action('accesspress_basic_slider');
                ?>
                <?php if($slider_type == 'default') : ?>
                </div>
                <?php endif; ?>
                </div>
                <?php
                endif;
            endif;
        endif;
    ?>