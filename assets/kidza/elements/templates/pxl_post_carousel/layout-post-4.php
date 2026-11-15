<?php

$html_id = pxl_get_element_id($settings);
$source    = $widget->get_setting('source_'.$settings['post_type']);
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$post_ids = $widget->get_setting('post_ids', '');
$settings['layout']    = $settings['layout_'.$settings['post_type']];
extract(pxl_get_posts_of_grid('post', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));

$pxl_animate = $widget->get_setting('pxl_animate', '');
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
if($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');
$arrows = $widget->get_setting('arrows',false);
$pagination = $widget->get_setting('pagination',false);
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay',false);
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite',false);
$speed = $widget->get_setting('speed', '700');
$center = $widget->get_setting('center', false);
$img_size = $widget->get_setting('img_size');

$img_size = $widget->get_setting('img_size');
$num_words = $widget->get_setting('num_words');
$show_category = $widget->get_setting('show_category');
$show_date = $widget->get_setting('show_date');
$show_button2 = $widget->get_setting('show_button2', 'false');
$button_text = $widget->get_setting('button_text', '');
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1, 
    'slide_percolumnfill'           => 1, 
    'slide_mode'                    => 'silde', 
    'slides_to_show'                => (int)$col_xl,
    'slides_to_show_xxl'            => (int)$col_xxl,  
    'slides_to_show_lg'             => (int)$col_lg, 
    'slides_to_show_md'             => (int)$col_md, 
    'slides_to_show_sm'             => (int)$col_sm, 
    'slides_to_show_xs'             => (int)$col_xs, 
    'slides_to_scroll'              => (int)$slides_to_scroll,  
    'slides_gutter'                 => 30, 
    'arrow'                         => (bool)$arrows,
    'pagination'                    => (bool)$pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => (bool)$autoplay,
    'pause_on_hover'                => (bool)$pause_on_hover,
    'pause_on_interaction'          => true,
    'delay'                         => (int)$autoplay_speed,
    'loop'                          => (bool)$infinite,
    'speed'                         => (int)$speed,
    'centered_slides'               => true,
    'center'                        => $center,
    'grab_cursor'                   => true,
    'show_date'                     => $show_date,
    'show_category'                 => $show_category,
];

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]); ?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-sliders pxl-post-carousel pxl-post-carousel4 " <?php if($settings['drap']) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'bizneu'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner" data-center="<?php echo esc_attr($center); ?>">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php
                        $image_size = !empty($img_size) ? $img_size : '600x406';
                        foreach ($posts as $post):
                        $post_excerpt = get_post_meta($post->ID, 'post_excerpt', true);
                        $img_id       = get_post_thumbnail_id( $post->ID );
                        $comment_count = get_comments_number();?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>">
                                <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                                $img = pxl_get_image_by_size( array(
                                    'attach_id'  => $img_id,
                                    'thumb_size' => $image_size,
                                    'class' => 'no-lazyload',
                                ));
                                $thumbnail = $img['thumbnail']; ?>
                                
                                <div class="pxl-item-thumbnail">
                                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                                    <?php if($show_category == 'true'): ?>
                                        <div class="item--category">
                                            <?php 
                                            $categories = get_the_category($post->ID);
                                            if (!empty($categories)) {
                                                foreach($categories as $category) {
                                                    echo '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a> ';
                                                }
                                            }
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                                <div class="pxl-item--holder">
                                    <div class="pxl-info">
                                        <?php if($show_date == 'true'): ?>
                                            <div class="pxl-item--date">
                                                <i class="flaticon flaticon-calendar"></i>
                                                <div class="pxl-date">
                                                    <span><?php echo get_the_date('M j, Y', $post->ID); ?></span>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="pxl-item-author">
                                            <div class="pxl-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                    <path d="M10 0.650391C12.4981 0.650391 14.5428 2.69437 14.543 5.19238C14.543 7.69056 12.4982 9.73535 10 9.73535C7.50202 9.73517 5.45801 7.69045 5.45801 5.19238C5.45821 2.69448 7.5021 0.650569 10 0.650391Z" stroke="#F15F25" stroke-width="1.3"/>
                                                    <path d="M6.20508 11.4082C6.23051 11.4031 6.29428 11.4116 6.34473 11.4492L6.34961 11.4521C7.41649 12.2396 8.68571 12.6454 10 12.6455C11.3145 12.6455 12.5844 12.2397 13.6514 11.4521L13.6562 11.4492C13.6727 11.4373 13.7422 11.4076 13.8516 11.417C15.4701 11.6444 16.9127 12.558 17.8525 13.9473L17.8564 13.9521C18.0165 14.1833 18.153 14.4237 18.2617 14.6709C18.1438 14.8747 18.0157 15.072 17.8721 15.2695L17.7168 15.4766L17.709 15.4873C17.4204 15.8789 17.0846 16.2377 16.7295 16.5928C16.4327 16.8895 16.0932 17.1861 15.7568 17.4385C14.0794 18.6912 12.0616 19.3496 9.97754 19.3496C7.8983 19.3496 5.88596 18.6934 4.21094 17.4463C3.84674 17.1504 3.51359 16.8798 3.22656 16.5928L3.21973 16.585L3.21191 16.5791L2.95312 16.3232C2.7006 16.0629 2.46833 15.7876 2.24707 15.4873L2.24414 15.4824L1.94531 15.0693C1.86526 14.9525 1.7894 14.8338 1.71973 14.7168C1.83664 14.456 1.98306 14.184 2.14355 13.9521L2.14453 13.9531L2.15234 13.9414C3.06933 12.5557 4.53669 11.6391 6.16602 11.415L6.18555 11.4121L6.20508 11.4082Z" stroke="#F15F25" stroke-width="1.3"/>
                                                </svg>
                                            </div>
                                            By <?php the_author_posts_link(); ?>
                                        </div>
                                        
                                    </div>
                                    <h4 class="pxl-item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a></h4>
                                    <div class="pxl-button">
                                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                            <h5 class="pxl-text--btn">
                                                <?php if (!empty($button_text)) {
                                                    echo esc_attr($button_text);
                                                } else {
                                                    echo esc_html__('Read more', 'kidza');
                                                } ?>
                                            </h5>
                                            <span class="pxl-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="9" viewBox="0 0 16 9" fill="none">
                                                    <path d="M11.6118 0L10.8991 0.712723L14.0706 3.88421H0V4.89216H14.0706L10.8991 8.06362L11.6118 8.77634L16 4.38815L11.6118 0Z" fill="#5C707E"/>
                                                </svg>
                                            </span>
                                        </a>
                                    </div>        
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div> 
            </div>
            <?php if($pagination !== 'false'): ?>
                <div class="pxl-swiper-pagination">
                    <div class="pxl-swiper-dots style-1"></div>
                </div>
            <?php endif; ?>
            <?php if($arrows !== 'false'): ?>
                <div class="pxl-swiper-arrow-wrap">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="far flaticon-right"></i></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="far flaticon-right"></i></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>