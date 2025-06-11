<?php
/**
 * @package Accesspress Pro
 */

function accesspress_basic_widgets_show_widget_field( $instance = '', $widget_field = '', $athm_field_value = '' ) {
	// Store Posts in array
    
	$accesspress_pro_postlist[0] = array(
		'value' => 0,
		'label' => '--choose--'
	);
	$arg = array('posts_per_page'   => -1);
	$accesspress_pro_posts = get_posts($arg); $i = 1;
	foreach( $accesspress_pro_posts as $accesspress_pro_post ) :
		$accesspress_pro_postlist[$accesspress_pro_post->ID] = array(
			'value' => $accesspress_pro_post->ID,
			'label' => $accesspress_pro_post->post_title
		);
		$i++;
	endforeach;
    
    $accesspress_basic_pagelist[0] = array(
        'value' => 0,
        'label' => '--choose--'
    );
    
    $accesspress_basic_pages = get_pages($arg);
    foreach($accesspress_basic_pages as $accesspress_basic_page) :
        $accesspress_basic_pagelist[$accesspress_basic_page->ID] = array(
            'value' => $accesspress_basic_page->ID,
            'label' => $accesspress_basic_page->post_title
        );
    endforeach;
    //print_r($widget_field);
	extract( $widget_field );
	
	switch( $apbasic_widgets_field_type ) {
	
		// Standard text field
		case 'text' : ?>
			<p>
				<label for="<?php echo esc_attr($instance->get_field_id( $apbasic_widgets_name )); ?>"><?php echo esc_html($apbasic_widgets_title); ?>:</label>
				<input class="widefat" id="<?php echo esc_attr($instance->get_field_id( $apbasic_widgets_name )); ?>" name="<?php echo esc_attr($instance->get_field_name( $apbasic_widgets_name )); ?>" type="text" value="<?php echo esc_attr($athm_field_value); ?>" />
				
				<?php if( isset( $apbasic_widgets_description ) ) { ?>
				<br />
				<small><?php echo esc_html($apbasic_widgets_description); ?></small>
				<?php } ?>
			</p>
			<?php
			break;

		// Textarea field
		case 'textarea' : ?>
			<p>
				<label for="<?php echo esc_attr($instance->get_field_id( $apbasic_widgets_name )); ?>"><?php echo esc_html($apbasic_widgets_title); ?>:</label>
				<textarea class="widefat" rows="6" id="<?php echo esc_attr($instance->get_field_id( $apbasic_widgets_name )); ?>" name="<?php echo esc_attr($instance->get_field_name( $apbasic_widgets_name )); ?>"><?php echo esc_html($athm_field_value); ?></textarea>
			</p>
			<?php
			break;

		// Textarea field
		case 'contentarea' : ?>
			<p>
				<label for="<?php echo esc_attr($instance->get_field_id( $apbasic_widgets_name )); ?>"><?php echo esc_html($apbasic_widgets_title); ?>:</label>
				<textarea class="widefat" rows="6" id="<?php echo esc_attr($instance->get_field_id( $apbasic_widgets_name )); ?>" name="<?php echo esc_attr($instance->get_field_name( $apbasic_widgets_name )); ?>"><?php echo wp_kses_post($athm_field_value); ?></textarea>
			</p>
			<?php
			break;
			
		// Checkbox field
		case 'checkbox' : ?>
			<p>
				<input id="<?php echo esc_attr($instance->get_field_id( $apbasic_widgets_name )); ?>" name="<?php echo esc_attr($instance->get_field_name( $apbasic_widgets_name )); ?>" type="checkbox" value="1" <?php checked( '1', $athm_field_value ); ?>/>
				<label for="<?php echo esc_attr($instance->get_field_id( $apbasic_widgets_name )); ?>"><?php echo esc_html($apbasic_widgets_title); ?></label>

				<?php if( isset( $apbasic_widgets_description ) ) { ?>
				<br />
				<small><?php echo esc_html($apbasic_widgets_description); ?></small>
				<?php } ?>
			</p>
			<?php
			break;
			
		// Radio fields
		case 'radio' : ?>
			<p>
				<?php
				echo esc_html($apbasic_widgets_title); 
				echo '<br />';
				foreach( $apbasic_widgets_field_options as $athm_option_name => $athm_option_title ) { ?>
					<input id="<?php echo esc_attr($instance->get_field_id( $athm_option_name )); ?>" name="<?php echo esc_attr($instance->get_field_name( $apbasic_widgets_name )); ?>" type="radio" value="<?php echo esc_attr($athm_option_name); ?>" <?php checked( $athm_option_name, $athm_field_value ); ?> />
					<label for="<?php echo esc_attr($instance->get_field_id( $athm_option_name )); ?>"><?php echo esc_html($athm_option_title); ?></label>
					<br />
				<?php } ?>
				
				<?php if( isset( $apbasic_widgets_description ) ) { ?>
				<small><?php echo esc_html($apbasic_widgets_description); ?></small>
				<?php } ?>
			</p>
			<?php
			break;
			
		// Select field
		case 'select' : ?>
			<p>
				<label for="<?php echo esc_attr($instance->get_field_id( $apbasic_widgets_name )); ?>"><?php echo esc_html($apbasic_widgets_title); ?>:</label>
				<select name="<?php echo esc_attr($instance->get_field_name( $apbasic_widgets_name )); ?>" id="<?php echo esc_attr($instance->get_field_id( $apbasic_widgets_name )); ?>" class="widefat">
					<?php
					foreach ( $apbasic_widgets_field_options as $athm_option_name => $athm_option_title ) { ?>
						<option value="<?php echo esc_attr($athm_option_name); ?>" id="<?php echo esc_attr($instance->get_field_id( $athm_option_name )); ?>" <?php selected( $athm_option_name, $athm_field_value ); ?>><?php echo esc_html($athm_option_title); ?></option>
					<?php } ?>
				</select>

				<?php if( isset( $apbasic_widgets_description ) ) { ?>
				<br />
				<small><?php echo esc_html($apbasic_widgets_description); ?></small>
				<?php } ?>
			</p>
			<?php
			break;
			
		case 'number' : ?>
			<p>
				<label for="<?php echo esc_attr($instance->get_field_id( $apbasic_widgets_name )); ?>"><?php echo esc_html($apbasic_widgets_title); ?>:</label><br />
				<input name="<?php echo esc_attr($instance->get_field_name( $apbasic_widgets_name )); ?>" type="number" step="1" min="1" id="<?php echo esc_attr($instance->get_field_id( $apbasic_widgets_name )); ?>" value="<?php echo esc_attr($athm_field_value); ?>" class="small-text" />
				
				<?php if( isset( $apbasic_widgets_description ) ) { ?>
				<br />
				<small><?php echo esc_html($apbasic_widgets_description); ?></small>
				<?php } ?>
			</p>
			<?php
			break;

		// Select field
		case 'selectpost' : ?>
			<p>
				<label for="<?php echo esc_attr($instance->get_field_id( $apbasic_widgets_name )); ?>"><?php echo esc_html($apbasic_widgets_title); ?>:</label>
				<select name="<?php echo esc_attr($instance->get_field_name( $apbasic_widgets_name )); ?>" id="<?php echo esc_attr($instance->get_field_id( $apbasic_widgets_name )); ?>" class="widefat">
					<?php
					foreach ( $accesspress_pro_postlist as $accesspress_basic_single_page ) { ?>
						<option value="<?php echo esc_attr($accesspress_basic_single_page['value']); ?>" id="<?php echo esc_attr($instance->get_field_id( $accesspress_basic_single_page['label'] )); ?>" <?php selected( $accesspress_basic_single_page['value'], $athm_field_value ); ?>><?php echo esc_html($accesspress_basic_single_page['label']); ?></option>
					<?php } ?>
				</select>

				<?php if( isset( $apbasic_widgets_description ) ) { ?>
				<br />
				<small><?php echo esc_html($apbasic_widgets_description); ?></small>
				<?php } ?>
			</p>
			<?php
			break;
            
            // Select field
		case 'selectpage' : ?>
			<p>
				<label for="<?php echo esc_attr($instance->get_field_id( $apbasic_widgets_name )); ?>"><?php echo esc_html($apbasic_widgets_title); ?> :</label>
				<select name="<?php echo esc_attr($instance->get_field_name( $apbasic_widgets_name )); ?>" id="<?php echo esc_attr($instance->get_field_id( $apbasic_widgets_name )); ?>" class="widefat">
					<?php
					foreach ( $accesspress_basic_pagelist as $accesspress_basic_single_page ) { ?>
						<option value="<?php echo esc_attr($accesspress_basic_single_page['value']); ?>" id="<?php echo esc_attr($instance->get_field_id( $accesspress_basic_single_page['label'] )); ?>" <?php selected( $accesspress_basic_single_page['value'], $athm_field_value ); ?>><?php echo esc_html($accesspress_basic_single_page['label']); ?></option>
					<?php } ?>
				</select>

				<?php if( isset( $apbasic_widgets_description ) ) { ?>
				<br />
				<small><?php echo esc_html($apbasic_widgets_description); ?></small>
				<?php } ?>
			</p>
			<?php
			break;
            
        case 'upload' :

            $id = $instance->get_field_id($apbasic_widgets_name);
            $class = '';
            $int = '';
            $value = $athm_field_value;
            $name = $instance->get_field_name($apbasic_widgets_name);


            if ($value) {
                $class = ' has-file';
            }
            ?>
            <div class="sub-option widget-upload">
            <label for="<?php echo esc_attr($instance->get_field_id($apbasic_widgets_name)); ?>"><?php esc_html($apbasic_widgets_title); ?></label><br/>
            <input id="<?php echo esc_attr($id); ?>" class="upload <?php echo esc_attr($class); ?>" type="text" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_url($value); ?>" placeholder="<?php esc_attr_e('No file chosen', 'accesspress-basic'); ?>" />
            <?php
            if (function_exists('wp_enqueue_media')) {
        	?>
                <input id="upload-<?php echo esc_attr($id); ?>" class="upload-button button" type="button" value="<?php esc_attr_e('Upload', 'accesspress-basic'); ?>" />
            <?php
            } else {
        	?>
                <p><i><?php esc_html_e('Upgrade your version of WordPress for full media support.', 'accesspress-basic'); ?></i></p>
            <?php
            }
        	?>
            <div class="screenshot team-thumb" id="<?php echo esc_attr($id); ?>-image">
        	<?php

            if ($value != '') {

                $attachment_id = attachment_url_to_postid($value);
                $image_array = wp_get_attachment_image_src($attachment_id, 'medium');
                $image = preg_match('/(^.*\.jpg|jpeg|png|gif|ico*)/i', $value);
                if ($image) {
                	?>
                    <img src="<?php echo esc_attr($image_array[0]); ?>" alt="" /><a class="remove-image remove-screenshot"><?php esc_html_e( 'Remove', 'accesspress-basic' ); ?></a>
                    <?php
                } else {
                    $parts = explode("/", $value);
                    for ($i = 0; $i < sizeof($parts); ++$i) {
                        $title = $parts[$i];
                    }

                    $title = __('View File', 'accesspress-basic');
                    ?>
                    <div class="no-image"><span class="file_link"><a href="<?php echo esc_attr($value); ?>" target="_blank" rel="external"><?php echo esc_html($title); ?></a></span></div>
                    <?php
                }
            }
            ?>
	        	</div>
	        </div>
	        <?php
            break;	
            
        case 'select_theme' : ?>
			<p>
				<label for="<?php echo esc_attr($instance->get_field_id( $apbasic_widgets_name )); ?>"><?php echo esc_html($apbasic_widgets_title); ?> :</label>
				<select name="<?php echo esc_attr($instance->get_field_name( $apbasic_widgets_name )); ?>" id="<?php echo esc_attr($instance->get_field_id( $apbasic_widgets_name )); ?>" class="widefat">
					<?php
					foreach ( $twitter_themes as $twitter_theme ) { ?>
						<option value="<?php echo esc_attr($twitter_theme['value']); ?>" id="<?php echo esc_attr($instance->get_field_id( $twitter_theme['label'] )); ?>" <?php selected( $twitter_theme['value'], $athm_field_value ); ?>><?php echo esc_html($twitter_theme['label']); ?></option>
					<?php } ?>
				</select>

				<?php if( isset( $apbasic_widgets_description ) ) { ?>
				<br />
				<small><?php echo esc_html($apbasic_widgets_description); ?></small>
				<?php } ?>
			</p>
			<?php
			break;
	}
	
}