<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Case-Themes
 */

// Get theme options
$post_tag = kidza()->get_theme_opt('post_tag', true);
$post_social_share = kidza()->get_theme_opt('post_social_share', false);
$post_navigation = kidza()->get_theme_opt('post_navigation', false);
$post_author_info = kidza()->get_theme_opt('post_author_info', false);
$post_related = kidza()->get_theme_opt('post_related', false);
$tags_list = get_the_tag_list();
$blog_page = kidza()->get_theme_opt('blog_page');
$post_author_position = kidza()->get_theme_opt('post_author_position', '');
$archive_comment = kidza()->get_theme_opt('archive_comment', true);
$post_social_share = kidza()->get_theme_opt( 'post_social_share', false );

// Get author information
$postID = get_the_ID();
$author = get_user_by('ID', get_post_field('post_author', $postID));
$author_name = $author->display_name;
?>

<article id="pxl-post-<?php echo esc_attr(get_the_ID()); ?>" <?php post_class('pxl---post'); ?>>
    <?php if (has_post_thumbnail()): ?>
        <div class="pxl-item-image">
            <?php the_post_thumbnail('kidza-large'); ?>
        </div>
    <?php endif; ?>
    
    <div class="pxl-info">
        <?php if ($author): ?>
            <div class="pxl-item--author">
                <a href="<?php echo get_author_posts_url($author->ID); ?>">
                    <span><i class="far fa-user"></i></span>
                    <span class="author-name"><?php echo esc_html($author_name); ?></span>
                </a>
            </div>
        <?php endif; ?>

        <?php if ($archive_comment): ?>
            <div class="pxl-item--date">
                <i class="flaticon flaticon-calendar"></i>
                <div class="pxl-day">
                   <?php echo get_the_date('j', $post->ID); ?>       
                </div>
                <div class="pxl-month">
                    <?php echo get_the_date('M'); ?>      
                </div>
                <div class="pxl-year">
                    <?php echo get_the_date('Y'); ?>      
                </div>
            </div>
        <?php endif; ?>

        <div class="pxl--tag-post">
                <i class="flaticon flaticon-tag"></i>
                <?php if ($post_tag) { kidza()->blog->get_tagged_in(); } ?>
            </div>
        </div>
    
    <h3 class="pxl-item--title">
        <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php the_title_attribute(); ?>">
            <?php if (is_sticky()): ?>
            <?php endif; ?>
            <?php the_title(); ?>
        </a>
    </h3>
    
    <div class="pxl-item--holder">
        <div class="pxl-item--content clearfix">
            <?php
                the_content();
                wp_link_pages(array(
                    'before'      => '<div class="page-links">',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ));
            ?>
        </div>
    </div>

    <div class="pxl--post-footer">
        <div class="pxl-content-social">
            <?php if (($post_tag && $tags_list) || $post_social_share): ?>
                <div class="pxl--tag-post">
                    <span class="pxl--title-item">Tags: </span>
                    <?php if ($post_tag) { kidza()->blog->get_tagged_in(); } ?>
                </div>
                <div class="pxl-share">
                    <?php 
                        if ($post_social_share) { 
                            echo "<span class='share-text'>Share: </span>"; 
                            kidza()->blog->get_socials_share();
                        } 
                    ?>
                </div>
            <?php endif; ?>
        </div>
        <span></span>                
        <?php if ($post_author_info): ?>
            <div class="pxl-info--author">
                <div class="pxl-post--author-info">
                    <div class="pxl-item-top pxl-item--flexnw">
                        <div class="pxl-post--author-image pxl-mr-40">
                            <?php echo get_avatar(get_the_author_meta('ID'), 120); ?>
                        </div>
                        <div class="pxl-item-name">
                            <?php kidza_get_user_star(); ?>
                            <h5 class="pxl-post--author-title"><?php the_author_posts_link(); ?></h5> 
                            <?php if (!empty($post_author_position)): ?>
                                <div class="author-description">
                                    <?php echo esc_attr($post_author_position); ?>
                                </div>
                                <?php if ($post_social_share) { kidza()->blog->get_socials_share(); } ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>    
</article><!-- #post -->