<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Accesspress Basic
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function accesspress_basic_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'accesspress_basic_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function accesspress_basic_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'accesspress-basic' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'accesspress_basic_wp_title', 10, 2 );
endif;
 
    function accesspress_basic_slidercb(){
        global $apbasic_options;
        $old_setting = get_option('apbasic_options', $apbasic_options);
       
        $apbasic_settings = wp_parse_args($old_setting, $apbasic_options);

        $mode = $apbasic_settings['slider_mode'];
        $slider_type = $apbasic_settings['slider_type'];
        $ositab = isset($apbasic_settings['open_slider_link_in_new_tab']) ? $apbasic_settings['open_slider_link_in_new_tab'] : '';

        for($i = 1; $i <= 4; $i++) :
            if(!empty($apbasic_settings['slide'.$i])) :
                $slides[] = array(
                    'slide' => $apbasic_settings['slide'.$i],
                    'caption_title' => $apbasic_settings['slide'.$i.'_title'],
                    'caption_description' => $apbasic_settings['slide'.$i.'_description'],
                    'readmore_text' => $apbasic_settings['slide'.$i.'_readmore_text'],
                    'readmore_link' => $apbasic_settings['slide'.$i.'_readmore_link'],
                    'readmore_icon' => $apbasic_settings['slide'.$i.'_readmore_button_icon']
                );
            endif;
        endfor;
       

        ?>
            
            <?php if(!empty($slides)) : ?>
                <div id="apbasic-slider" class="<?php echo esc_attr($slider_type); ?>">
                    <?php $slide_id = 1; ?>
                    <?php foreach($slides as $slide) : ?>
                        <?php if(!empty($slide['slide'])) : ?>
                            <div class="slide slider-<?php echo esc_attr($slide_id); ?>">
                                <div class="slider-image-container">
                                    <?php   
                                        $img_id = attachment_url_to_postid($slide['slide']);
                                        $img = wp_get_attachment_image_src($img_id,'full', false);
                                    ?>
                                    <img src="<?php echo esc_url($img[0]); ?>" />
                                </div>
                                <?php if(!empty($slide['caption_title']) || !empty($slide['caption_description'])) : ?>
                                <div class="slider-caption-container">
                                    <?php if(!empty($slide['caption_title'])) : ?>
                                        <h1 class="caption-title"><?php echo wp_kses_post($slide['caption_title']); ?></h1>
                                    <?php endif; ?>
                                    <?php if(!empty($slide['caption_description'])) : ?>
                                        <div class="caption-description"><?php echo wp_kses_post($slide['caption_description']); ?></div>
                                    <?php endif; ?>
                                    <?php if(!empty($slide['readmore_text'])) : ?>
                                        <a class="readmore-button slide_readmore-button" href="<?php echo esc_url($slide['readmore_link']); ?>" <?php if($ositab){echo 'target="_blank"';} ?>><i class="fa <?php echo esc_attr($slide['readmore_icon']); ?>"></i><?php echo esc_html($slide['readmore_text']); ?></a>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php $slide_id++; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php
    }
    
    add_action('accesspress_basic_slider','accesspress_basic_slidercb',10);