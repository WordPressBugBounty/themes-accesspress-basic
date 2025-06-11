<?php 

/* Sanitization for Check Box */
function accesspress_basic_sanitize_checkbox($accesspress_basic_input){
    if($accesspress_basic_input){
        return 1;
    }else{
        return '';
    }
}

function accesspress_basic_sanitize_layout_typ($accesspress_basic_input){
    $accesspress_basic_output = array(
        'boxed'   => esc_html__( 'Boxed', 'accesspress-basic' ),
        'full_width' => esc_html__( 'Full Width', 'accesspress-basic' ),
    );
    if(array_key_exists($accesspress_basic_input,$accesspress_basic_output)){
        return $accesspress_basic_input;
    }else{
        return '';
    }
}

function accesspress_basic_sanitize_bg_img($accesspress_basic_input){
    $accesspress_basic_output = array(
        'pattern0'  => get_template_directory_uri() . '/inc/admin-panel/images/pattern0.png',
        'pattern1'  => get_template_directory_uri() . '/inc/admin-panel/images/pattern1.png',
        'pattern2'  => get_template_directory_uri() . '/inc/admin-panel/images/pattern2.png',
        'pattern3'  => get_template_directory_uri() . '/inc/admin-panel/images/pattern3.png',
        'pattern4'  => get_template_directory_uri() . '/inc/admin-panel/images/pattern4.png',
    );
    if(array_key_exists($accesspress_basic_input,$accesspress_basic_output)){
        return $accesspress_basic_input;
    }else{
        return '';
    }
}

function accesspress_basic_sanitize_blog_layout($accesspress_basic_input){
    $accesspress_basic_output = array(
        'left_sidebar'      => get_template_directory_uri() . '/inc/admin-panel/images/left-sidebar.png',
        'right_sidebar'     => get_template_directory_uri() . '/inc/admin-panel/images/right-sidebar.png',
        'both_sidebar'      => get_template_directory_uri() . '/inc/admin-panel/images/both-sidebar.png',
        'no_sidebar_wide'   => get_template_directory_uri() . '/inc/admin-panel/images/no-sidebar-wide.png',
        'no_sidebar_narrow' => get_template_directory_uri() . '/inc/admin-panel/images/no-sidebar-narrow.png',
    );
    if(array_key_exists($accesspress_basic_input,$accesspress_basic_output)){
        return $accesspress_basic_input;
    }else{
        return '';
    }
}

function accesspress_basic_sanitize_blg_layout($accesspress_basic_input){
    $accesspress_basic_output = array(
        'blog_image_large'              => esc_html__( 'Blog Image Large', 'accesspress-basic' ),
        'blog_image_medium'             => esc_html__( 'Blog Image Medium', 'accesspress-basic' ),
        'blog_image_alternate_medium'   => esc_html__( 'Blog Image Alternate Medium', 'accesspress-basic' ),
        'blog_full_content'             => esc_html__( 'Blog Full Content', 'accesspress-basic' ),
    );
    if(array_key_exists($accesspress_basic_input,$accesspress_basic_output)){
        return $accesspress_basic_input;
    }else{
        return '';
    }
}

function accesspress_basic_sanitize_hd_layout($accesspress_basic_input){
    $accesspress_basic_output = array(
        'header_logo_only'  => esc_html__( 'Header Logo Only', 'accesspress-basic' ),
                'header_text_only'  => esc_html__( 'Header Text Only', 'accesspress-basic' ),
                'show_both'         => esc_html__( 'Show Both', 'accesspress-basic' ),
                'disable'           => esc_html__( 'Disable', 'accesspress-basic' ),
    );
    if(array_key_exists($accesspress_basic_input,$accesspress_basic_output)){
        return $accesspress_basic_input;
    }else{
        return 'disable';
    }
}

function accesspress_basic_sanitize_slider_typ($accesspress_basic_input){
    $accesspress_basic_output = array(
        'default'   => esc_html__( 'Default', 'accesspress-basic' ),
        'fullwidth' => esc_html__( 'Full Width Slider', 'accesspress-basic' ),
    );
    if(array_key_exists($accesspress_basic_input,$accesspress_basic_output)){
        return $accesspress_basic_input;
    }else{
        return '';
    }
}

function accesspress_basic_sanitize_slider_mode($accesspress_basic_input){
    $accesspress_basic_output = array(
        'horizontal'   => esc_html__( 'Horizontal', 'accesspress-basic' ),
        'fade' => esc_html__( 'Fade', 'accesspress-basic' ),
    );
    if(array_key_exists($accesspress_basic_input,$accesspress_basic_output)){
        return $accesspress_basic_input;
    }else{
        return '';
    }
}


/* Sanitization for Image Type */
function accesspress_lite_sanitize_weblayout($accesspress_lite_input){
    $accesspress_lite_output = array(
        'Fullwidth'   => esc_html__( 'Fullwidth', 'accesspress-basic' ),
        'Boxed' => esc_html__( 'Boxed', 'accesspress-basic' ),
    );
    if(array_key_exists($accesspress_lite_input,$accesspress_lite_output)){
        return $accesspress_lite_input;
    }else{
        return '';
    }
}

/* Sanitization for Textarea */     
function accesspress_lite_sanitize_textarea($accesspress_lite_input){
    return wp_kses_post( force_balance_tags( $accesspress_lite_input ) );
}

/* Sanitization for 3 Layout radio */
function accesspress_lite_sanitize_menu($accesspress_lite_input){
    $accesspress_lite_output = array(
                'Left'   => esc_html__( 'Left', 'accesspress-basic' ),
                'Right'   => esc_html__( 'Right', 'accesspress-basic' ),
                'Center' => esc_html__( 'Center', 'accesspress-basic' ),
            );  
    if(array_key_exists($accesspress_lite_input,$accesspress_lite_output)){
        return $accesspress_lite_input;
    }else{
        return '';
    }
}

function accesspress_lite_sanitize_category_lists($accesspress_lite_input) {
    $accesspress_lite_output = accesspress_lite_category_lists();
    if(array_key_exists($accesspress_lite_input,$accesspress_lite_output)){
        return $accesspress_lite_input;
    }else{
        return '';
    }
}

function accesspress_lite_sanitize_post_lists($accesspress_lite_input) {
    $accesspress_lite_output = accesspress_lite_post_list();
    if(array_key_exists($accesspress_lite_input,$accesspress_lite_output)){
        return $accesspress_lite_input;
    }else{
        return '';
    }
}

function accesspress_lite_sanitize_number($accesspress_lite_input){
        return intval($accesspress_lite_input);
    }

/* Sanitization for slider type */
function accesspress_lite_sanitize_slider($accesspress_lite_input){
    $accesspress_lite_output = array(
        'single_post_slider'   => esc_html__( 'Single Post Slider', 'accesspress-basic' ),
        'cat_post_slider' => esc_html__( 'Category Posts as a Slider', 'accesspress-basic' ),
        );  
    if(array_key_exists($accesspress_lite_input,$accesspress_lite_output)){
        return $accesspress_lite_input;
    }else{
        return '';
    }
}   