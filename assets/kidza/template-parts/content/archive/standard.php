<?php
/**
 * @package Case-Themes
 */
$archive_readmore_text = kidza()->get_theme_opt('archive_readmore_text', esc_html__('Read Details', 'kidza'));
$archive_author = kidza()->get_theme_opt('archive_author', true);
$archive_comment = kidza() ->get_theme_opt('archive_comment', true);
$img_url = '';
if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false)) {
    $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false);
}
$featured_img_size = kidza()->get_theme_opt('featured_img_size', '869x462');
$post_video_link = get_post_meta(get_the_ID(), 'post_video_link', true);
$post_images = get_post_meta(get_the_ID(), 'post_images');
$type_post_feature = get_post_meta(get_the_ID(),'type_post_feature','default');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('pxl---post pxl-item--archive pxl-item--archive'); ?>>
<?php if ($type_post_feature === 'default'): ?>
        <?php if (has_post_thumbnail()): ?>
            <?php
            $img = pxl_get_image_by_size(array(
                'attach_id'  => get_post_thumbnail_id($post->ID),
                'thumb_size' => $featured_img_size,
            ));
            $thumbnail = $img['thumbnail'];
            ?>
            <div class="pxl-item--image">
                <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo pxl_print_html($thumbnail); ?></a>
            </div>
        <?php endif; ?>

    <?php elseif ($type_post_feature === 'video_link'): ?>
        <?php if (has_post_thumbnail()): ?>
            <?php
            $img = pxl_get_image_by_size(array(
                'attach_id'  => get_post_thumbnail_id($post->ID),
                'thumb_size' => $featured_img_size,
            ));
            $thumbnail = $img['thumbnail'];
            ?>
            <div class="pxl-item--image">
                <a href="<?php echo esc_url(get_permalink()); ?>">
                    <?php echo pxl_print_html($thumbnail); ?>
                </a>
                <?php if (!empty($post_video_link)): ?>
                    <a href="<?php echo esc_url($post_video_link); ?>" class="post-button-video pxl-action-popup">
                        <i class="caseicon-play1"></i>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    <?php elseif ($type_post_feature === 'image_swiper'): ?>
        <div class="pxl-swiper-slider pxl-image-carousel">
            <div class="pxl-image--swiper ">
                <?php $post_images = explode(',', $post_images[0]); ?>  
                <?php foreach ($post_images as $image_id): ?>
                    <?php
                    $img_post = pxl_get_image_by_size(array(
                        'attach_id'  => $image_id,
                        'thumb_size' => 'full', 
                    ));
                    $thumbnail = $img_post['thumbnail'];
                    ?>
                    <div class="pxl-swiper-slide swiper-slide grid-item">
                        <div class="pxl-item--image">
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <?php echo pxl_print_html($thumbnail); ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <div class="pxl-swiper-arrow-wrap style-3">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="caseicon-angle-arrow-left rtl-icon"></i></div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="caseicon-angle-arrow-right rtl-icon"></i></div>
            </div>
        </div> 
    <?php endif; ?>
    <div class="pxl-content">
            <div class="pxl-item--category">
                <?php if($archive_author) : ?>
            <span class="pxl-icon"><i class="far fa-user"></i></span>
            <div class="pxl-item--author">
                <?php 
                $postID = get_the_ID();
                $author = get_user_by('ID', get_post_field('post_author', $postID));                
                $avatar_url = get_avatar_url($author->ID);
                $author_name = $author->display_name;  ?>

                <?php the_author_posts_link(); ?></div>
            <?php endif; ?>
            <span class="pxl-horizontal">-</span>
            <?php if($archive_comment) : ?>
                <span class="pxl-icon icon-center"><i class="far fa-comments"></i></span>
                <div class="pxl-item--comment">
                    <a href="<?php the_permalink(); ?>#comments">
                        <?php echo comments_number(esc_html__('Comments (0)', 'kidza'),esc_html__('Comment (1)', 'kidza'),esc_html__('Comments (%)', 'kidza')); ?>
                    </a>
                </div>
            <?php endif; ?>
            <span class="pxl-horizontal">-</span>
            <div class="pxl-time-read">
                <i class="far fa-clock"></i>
                <?php
                    $reading_time = get_reading_time();
                    echo esc_html($reading_time . ' Min read');
                ?>
            </div>
            </div> 
        <h2 class="pxl-item--title ">
            <a class="" href="<?php echo esc_url( get_permalink()); ?>" title="<?php the_title_attribute(); ?>">
                <?php if(is_sticky()) { ?>
                <?php } ?>
                <?php the_title(); ?>
            </a>
        </h2>
        <div class="pxl-item--excerpt">
            <?php
                kidza()->blog->get_excerpt();
                wp_link_pages( array(
                    'before'      => '<div class="page-links">',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ) );
            ?>
        </div>
        <div class="pxl-item-bottom">
            <a class="btn--readmore" href="<?php echo esc_url( get_permalink()); ?>">
                <span><?php echo kidza_html($archive_readmore_text); ?></span>
            </a> 
        </div>
    </div>
</article>
