<?php
/**
 * @package Accesspress Basic
 */
?>
<?php 
global $apbasic_options;
$apbasic_settings = get_option('apbasic_options',$apbasic_options);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
    	<?php 
    	$showpost = isset($apbasic_settings['show_post_title'])? $apbasic_settings['show_post_title'] : ''; 
    	if($showpost == 1){?>
    	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    	<?php } ?>
    
    	<div class="entry-meta">
    		<?php 
    		$metadata = isset($apbasic_settings['show_post_meta_data'])? $apbasic_settings['show_post_meta_data'] : '';
    		if($metadata == 1){
    			accesspress_basic_posted_on(); 
    		}?>
    	</div><!-- .entry-meta -->
    </header><!-- .entry-header -->
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'accesspress-basic' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php 
    $show_post_categories = isset($apbasic_settings['show_post_categories'])? $apbasic_settings['show_post_categories'] : '';
    if($show_post_categories == 1){
    ?>
	<footer class="entry-footer">
		<?php accesspress_basic_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<?php } ?>
</article><!-- #post-## -->
