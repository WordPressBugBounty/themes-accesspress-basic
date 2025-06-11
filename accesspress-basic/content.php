<?php
/**
 * @package Accesspress Basic
 */
?>
<?php
    global $apbasic_options;
    $apbasic_settings = get_option('apbasic_options',$apbasic_options);
    $blog_layout = isset($apbasic_settings['blog_post_display_type'])? $apbasic_settings['blog_post_display_type'] : '';
    $enable_comments_post = isset($apbasic_settings['enable_comments_post'])? $apbasic_settings['enable_comments_post'] : '';
    $blog_readmore_text = isset($apbasic_settings['blog_readmore_text'])? $apbasic_settings['blog_readmore_text'] : '';
    
    $image_size = 'full';
    $no_image = 'no-blog-medium-image.png';
    
    switch($blog_layout){
        case 'blog_image_large' :
        case 'blog_full_content' :
            $image_size = 'accesspress-basic-blog-large-thumbnail';
            $no_image = 'no-blog-large-image.png';
            break;
            
        case 'blog_image_medium' :
        case 'blog_image_alternate_medium' :
            $image_size = 'accesspress-basic-blog-medium-thumbnail';
            $no_image = 'no-blog-medium-image.png';
            break;  
    }
    
    $blog_img = wp_get_attachment_image_src(get_post_thumbnail_id(),$image_size);
    $blog_img_url = $blog_img[0];
    $image_id   = get_post_thumbnail_id( get_the_ID() );
    $image_alt  = get_post_meta( $image_id, '_wp_attachment_image_alt', true );

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('category-post-list'); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- .entry-header -->
    
    <figure class="blog-feature-image">
        <a href="<?php the_permalink(); ?>">
            <?php if(has_post_thumbnail()) : ?>
                <img src="<?php echo esc_url($blog_img_url); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" />
            <?php else : ?>
                <img src="<?php echo esc_url(get_template_directory_uri().'/images/'.$no_image); ?>" title="<?php the_title_attribute(); ?>" alt="<?php echo esc_attr('no image','accesspress-basic'); ?>" />
            <?php endif; ?>
        </a>
    </figure>

	<div class="entry-content">
        <?php if($blog_layout == 'blog_full_content') : ?>
            <?php the_content(); ?>
        <?php else : ?>
            <?php the_excerpt(); ?>
        <?php endif; ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer clearfix">
        <span class="entry-footer-wrapper">
            <span class="author user-wrapper"><i class="fa fa-user"></i><?php echo esc_html(get_the_author_meta('display_name')); ?></span>
            <span class="posted-date user-wrapper"><i class="fa fa-calendar"></i><?php the_time('F y, j'); ?></span>
            <?php if(has_category()) : ?>
                <span class="category user-wrapper"><i class="fa fa-folder"></i><?php the_category(', '); ?></span>
            <?php endif; ?>
            <?php if(comments_open() && $enable_comments_post == 1) : ?>
                <span class="comments user-wrapper"><i class="fa fa-comment"></i><?php comments_popup_link(); ?></span>
            <?php endif; ?>
        </span>
        <?php if($blog_layout != 'blog_full_content') : ?>
            <span class="readmore"><a href="<?php the_permalink(); ?>">
                <?php if(empty($blog_readmore_text)) : ?>
                    <?php esc_html_e('Read More...','accesspress-basic'); ?>
                <?php else : ?>
                    <?php echo esc_attr($blog_readmore_text); ?>
                <?php endif; ?>
            </a></span>
        <?php endif; ?>
		<?php //accesspress_basic_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->