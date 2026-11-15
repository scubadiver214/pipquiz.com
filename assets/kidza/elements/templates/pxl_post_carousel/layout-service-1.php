<?php
$html_id = pxl_get_element_id($settings);
$select_post_by = $widget->get_setting('select_post_by', '');
$source = $post_ids = [];

if ($select_post_by === 'post_selected') {
    $post_ids = $widget->get_setting('source_' . $settings['post_type'] . '_post_ids', '');
} else {
    $source = $widget->get_setting('source_' . $settings['post_type'], '');
}

$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$settings['layout'] = $settings['layout_' . $settings['post_type']];

extract(pxl_get_posts_of_grid('service', [
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

if ($col_xxl == 'inherit') {
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
$num_words = $widget->get_setting('num_words');
$show_button2 = $widget->get_setting('show_button2', false);
$show_excerpt = $widget->get_setting('show_excerpt');
$service_icon_img = $widget->get_setting('service_icon_img', []);
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
];

$widget->add_render_attribute('carousel', [
    'class' => 'pxl-swiper-container',
    'dir' => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-sliders pxl-service-carousel pxl-service-carousel1 <?php if ($arrows == true) { echo 'pxl-arrows-active'; } ?>">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string('carousel')); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php
                    foreach ($posts as $key => $post):
                        $image_size = !empty($img_size) ? $img_size : '1200x869';
                        $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
                        $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
                        $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                        $location_service = get_post_meta($post->ID, 'location_service', true);
                        $images_size = $image_size;

                        if (isset($grid_masonry[$key]['img_size_m']) && !empty($grid_masonry[$key]['img_size_m'])) {
                            $images_size = $grid_masonry[$key]['img_size_m'];
                        } elseif (!empty($img_size)) {
                            $images_size = $img_size;
                        }

                        if (!empty($tax)) {
                            $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
                        } else {
                            $filter_class = '';
                        }

                        $thumbnail = '';
                        $img_id = get_post_thumbnail_id($post->ID);

                        if ($img_id) {
                            $img = pxl_get_image_by_size([
                                'attach_id' => $img_id,
                                'thumb_size' => $images_size,
                                'class' => 'no-lazyload',
                            ]);
                            $thumbnail = $img['thumbnail'];
                        } else {
                            $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
                        }
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner pxl-not-active <?php echo esc_attr($pxl_animate); ?>">
                                <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                                    <div class="pxl-thumnail">
                                        <a class="pxl-item-link" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                            <?php echo wp_kses_post($thumbnail); ?>
                                        </a>
                                        <div class="pxl-date">
                                            <i class="flaticon flaticon-calendar"></i>
                                            <div class="pxl-month">
                                                <?php echo get_the_date('M'); ?>
                                            </div>
                                            <div class="pxl-day">
                                                <?php echo esc_html__(' ', 'kidza'); ?><?php echo get_the_date('j', $post->ID); ?> ,
                                            </div>
                                            <div class="pxl-year">
                                                <?php echo get_the_date('Y'); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                    
                                <div class="pxl-inner-content">
                                    <div class="pxl-location">
                                        <span class="pxl-item--icon">
                                            <i class="flaticon flaticon-chat-and-tel"></i>
                                        </span>
                                        <span class="pxl-text--location"><?php echo esc_html($location_service); ?></span>
                                    </div>
                                    <h4 class="pxl-item--title">
                                        <a href="<?php if (!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink($post->ID)); } ?>">
                                            <?php echo esc_html(get_the_title($post->ID)); ?>
                                        </a>
                                    </h4>
                                    
                                    <?php if ($show_excerpt == 'true' && !empty($service_excerpt)): ?>
                                        <div class="pxl-item--content">
                                            <?php echo wp_trim_words($service_excerpt, $num_words, $more = null); ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="pxl-button">
                                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                            <h5 class="pxl-text--btn">
                                                <?php if (!empty($button_text)) {
                                                    echo esc_attr($button_text);
                                                } else {
                                                    echo esc_html__('Get Ticket', 'kidza');
                                                } ?>
                                            </h5>
                                            <span class="pxl-icon">
                                                <i class="flaticon flaticon-arrow-right"></i>
                                            </span>
                                        </a>
                                        <div class="pxl-review">
                                            <div class="pxl-total-comment">
                                                ( <span><?php echo get_comments_number($post->ID); ?></span>
                                                <span><?php echo esc_html__('Review', 'kidza'); ?></span> )
                                            </div>
                                            <div class="pxl-average-rate">
                                                <?php echo display_average_stars($post->ID); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <?php if ($arrows !== 'false'): ?>
                <div class="pxl-swiper-arrow-wrap">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev">
                        <i class="caseicon-angle-arrow-left rtl-icon"></i>
                    </div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next">
                        <i class="caseicon-angle-arrow-right rtl-icon"></i>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($pagination !== 'false'): ?>
                <div class="pxl-swiper-dots style-4"></div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>