<?php
/**
 * @package Case-Themes
 */
get_header();
$service_related = kidza()->get_theme_opt( 'service_related', false );
?>
<div class="container">
    <div class="row">
        <div id="pxl-content-area" class="col-12">
            <main id="pxl-content-main">
                <?php while ( have_posts() ) {
                    the_post(); ?>
                    <article id="pxl-post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php the_content();
                        wp_link_pages( array(
                            'before'      => '<div class="page-links">',
                            'after'       => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                        ) ); ?>
                    </article><!-- #post -->
                    <?php if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                } ?>
            </main>
            <?php if($service_related) { kidza()->blog->get_related_service(); } ?>
        </div>
    </div>
</div>
<?php get_footer();
