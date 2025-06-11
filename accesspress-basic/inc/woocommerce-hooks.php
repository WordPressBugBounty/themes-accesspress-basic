<?php
	/** Woocommerce Hooks **/
	remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper');
	add_action('woocommerce_before_main_content', 'accesspress_basic_output_content_wrapper_start', 10);
	remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end');
	add_action('woocommerce_after_main_content', 'accesspress_basic_output_content_wrapper_end', 10);

	function accesspress_basic_output_content_wrapper_start() {
		global $apbasic_options;
		$apbasic_settings = get_option('apbasic_options', $apbasic_options);
		$default_page_layout = $apbasic_settings['default_page_layout'];
		$shop_page  = get_post( wc_get_page_id( 'shop' ) );
		$single_default_page_layout = $shop_page->apbasic_page_layout;
		$default_page_layout = ($single_default_page_layout == 'default_layout') ? $default_page_layout : $single_default_page_layout;
		$content_class = '';
	    switch($default_page_layout){
	        case 'left_sidebar':
	            $content_class = 'left-sidebar';
	            break;
	        case 'right_sidebar':
	            $content_class = 'right-sidebar';
	            break;
	        case 'both_sidebar':
	            $content_class = 'both-sidebar';
	            break;
	        case 'no_sidebar_wide':
	            $content_class = 'no-sidebar-wide';
	            break;
	        case 'no_sidebar_narrow':
	            $content_class = 'no-sidebar-narraow';
	            break;
	    }
		
		?>
		<main id="main" class="site-main <?php echo esc_attr($content_class); ?>" role="main">
            <div class="ap-container">
            <?php if($default_page_layout == 'both_sidebar') : ?>
                <div id="primary-wrap" class="clearfix">
            <?php endif; ?>
                <div id="primary" class="content-area">
		<?php		
	}

	function accesspress_basic_output_content_wrapper_end() {
		global $apbasic_options;
		$apbasic_settings = get_option('apbasic_options', $apbasic_options);
		$default_page_layout = $apbasic_settings['default_page_layout'];
		$shop_page  = get_post( wc_get_page_id( 'shop' ) );
		$single_default_page_layout = $shop_page->apbasic_page_layout;
		$default_page_layout = ($single_default_page_layout == 'default_layout') ? $default_page_layout : $single_default_page_layout;
		?>
			</div> <!-- #primary -->
		    <?php if($default_page_layout == 'left_sidebar' || $default_page_layout == 'both_sidebar') : ?>
		        <?php get_sidebar('left'); ?>
		    <?php endif; ?>
		    <?php if($default_page_layout == 'both_sidebar') : ?>
		        </div> <!-- #primary-wrap -->
		    <?php endif; ?>
		    <?php if($default_page_layout == 'right_sidebar' || $default_page_layout == 'both_sidebar') : ?>
		        <?php get_sidebar('right'); ?>
		    <?php endif; ?>
		    </div> <!-- ap-contianer -->
		    </main>
		<?php
	}