<?php
/**
 * @package Casethemes
 */
get_header();
$projects_related = kidza()->get_theme_opt( 'projects_related', false );
?>
<div class="container">
    <div class="row">
        <div id="pxl-content-area" class="col-12">
            <main id="pxl-content-main">
                <?php while ( have_posts() ) {
                    the_post();
                    get_template_part( 'template-parts/content/content-portfolio', get_post_format() );
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                } ?>
            </main>
        </div>
    </div>
</div>
<?php if($projects_related) { kidza()->blog->get_related_portfolio(); } ?>
<?php get_footer();