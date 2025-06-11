<?php
/**
 * Accesspress Basic Theme Customizer
 *
 * @package Accesspress Basic
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function accesspress_basic_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    require trailingslashit( get_template_directory() ) . '/inc/admin-panel/accesspress-basic-sanitize.php';

}
add_action( 'customize_register', 'accesspress_basic_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function accesspress_basic_customize_preview_js() {
	wp_enqueue_script( 'accesspress_basic_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'accesspress_basic_customize_preview_js' );

if( !class_exists('Kirki')){
    return;
}

/**
 * If you need to include Kirki in your theme,
 * then you may want to consider adding the translations here
 * using your textdomain.
 * 
 * If you're using Kirki as a plugin this is not needed.
 */
if(!function_exists('accesspress_basic_kirki_i18n')){
    function accesspress_basic_kirki_i18n( $accesspress_basic_config ) {

        $accesspress_basic_config['i18n'] = array(
            'background-color'      => esc_html__( 'Background Color', 'accesspress-basic' ),
            'background-image'      => esc_html__( 'Background Image', 'accesspress-basic' ),
            'no-repeat'             => esc_html__( 'No Repeat', 'accesspress-basic' ),
            'repeat-all'            => esc_html__( 'Repeat All', 'accesspress-basic' ),
            'repeat-x'              => esc_html__( 'Repeat Horizontally', 'accesspress-basic' ),
            'repeat-y'              => esc_html__( 'Repeat Vertically', 'accesspress-basic' ),
            'inherit'               => esc_html__( 'Inherit', 'accesspress-basic' ),
            'background-repeat'     => esc_html__( 'Background Repeat', 'accesspress-basic' ),
            'cover'                 => esc_html__( 'Cover', 'accesspress-basic' ),
            'contain'               => esc_html__( 'Contain', 'accesspress-basic' ),
            'background-size'       => esc_html__( 'Background Size', 'accesspress-basic' ),
            'fixed'                 => esc_html__( 'Fixed', 'accesspress-basic' ),
            'scroll'                => esc_html__( 'Scroll', 'accesspress-basic' ),
            'background-attachment' => esc_html__( 'Background Attachment', 'accesspress-basic' ),
            'left-top'              => esc_html__( 'Left Top', 'accesspress-basic' ),
            'left-center'           => esc_html__( 'Left Center', 'accesspress-basic' ),
            'left-bottom'           => esc_html__( 'Left Bottom', 'accesspress-basic' ),
            'right-top'             => esc_html__( 'Right Top', 'accesspress-basic' ),
            'right-center'          => esc_html__( 'Right Center', 'accesspress-basic' ),
            'right-bottom'          => esc_html__( 'Right Bottom', 'accesspress-basic' ),
            'center-top'            => esc_html__( 'Center Top', 'accesspress-basic' ),
            'center-center'         => esc_html__( 'Center Center', 'accesspress-basic' ),
            'center-bottom'         => esc_html__( 'Center Bottom', 'accesspress-basic' ),
            'background-position'   => esc_html__( 'Background Position', 'accesspress-basic' ),
            'background-opacity'    => esc_html__( 'Background Opacity', 'accesspress-basic' ),
            'ON'                    => esc_html__( 'ON', 'accesspress-basic' ),
            'OFF'                   => esc_html__( 'OFF', 'accesspress-basic' ),
            'all'                   => esc_html__( 'All', 'accesspress-basic' ),
            'cyrillic'              => esc_html__( 'Cyrillic', 'accesspress-basic' ),
            'cyrillic-ext'          => esc_html__( 'Cyrillic Extended', 'accesspress-basic' ),
            'devanagari'            => esc_html__( 'Devanagari', 'accesspress-basic' ),
            'greek'                 => esc_html__( 'Greek', 'accesspress-basic' ),
            'greek-ext'             => esc_html__( 'Greek Extended', 'accesspress-basic' ),
            'khmer'                 => esc_html__( 'Khmer', 'accesspress-basic' ),
            'latin'                 => esc_html__( 'Latin', 'accesspress-basic' ),
            'latin-ext'             => esc_html__( 'Latin Extended', 'accesspress-basic' ),
            'vietnamese'            => esc_html__( 'Vietnamese', 'accesspress-basic' ),
            'serif'                 => esc_html_x( 'Serif', 'font style', 'accesspress-basic' ),
            'sans-serif'            => esc_html_x( 'Sans Serif', 'font style', 'accesspress-basic' ),
            'monospace'             => esc_html_x( 'Monospace', 'font style', 'accesspress-basic' ),
        );

        return $accesspress_basic_config;

    }
}
add_filter( 'kirki/config', 'accesspress_basic_kirki_i18n' );

if(!function_exists('accesspress_basic_kirki_fields')) {
    function accesspress_basic_kirki_fields( $wp_customize ) {    
        /** added customizer panels*/
        load_template( dirname( __FILE__ ) . '/admin-panel/accesspress-basic-customizer.php', false);        
    }
}
add_filter( 'kirki/fields', 'accesspress_basic_kirki_fields' );