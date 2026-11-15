<?php
$html_id = pxl_get_element_id($settings);
$select_post_by = $widget->get_setting('select_post_by', '');
$source = $post_ids = [];
if($select_post_by === 'post_selected'){
    $post_ids = $widget->get_setting('source_'.$settings['post_type'].'_post_ids', '');
}else{
    $source  = $widget->get_setting('source_'.$settings['post_type'], '');
}
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$settings['layout']    = $settings['layout_'.$settings['post_type']];
extract(pxl_get_posts_of_grid('portfolio', [
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
$speed = $widget->get_setting('speed', '500');
$center = $widget->get_setting('center', false);

$img_size = $widget->get_setting('img_size');
$show_category = $widget->get_setting('show_category');
$num_words = $widget->get_setting('num_words');
$portfolio_excerpt = $widget->get_setting('portfolio_excerpt');
$show_excerpt = $widget->get_setting('show_excerpt');
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

    'show_category'                 => $show_category,
    'num_words'                     => $num_words,
    'show_excerpt'                  => $show_excerpt,
    'portfolio_excerpt'             => $portfolio_excerpt,
];

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]); ?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-sliders swiper-container-3d pxl-portfolio-carousel pxl-portfolio-carousel1 pxl-portfolio-grid-layout1 pxl-parent-transition <?php if($arrows == true) { echo 'pxl-arrows-active'; } ?>" <?php if($settings['drap']) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'bizneu'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner <?php echo esc_attr($pxl_animate); ?>">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper pxl-swiper-slide">
                    <?php
                        foreach ($posts as $key => $post):
                        $image_size = !empty($img_size) ? $img_size : '534x639';
                        $img_id       = get_post_thumbnail_id( $post->ID );
                        $img          = pxl_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $image_size
                        ) );
                        $thumbnail    = $img['thumbnail']; 
                        if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                            <div class="pxl-swiper-slide">
                                <div class="wrap-inner">
                                    <div class="pxl-thumbnail">
                                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>" title="<?php echo esc_attr(get_the_title($post->ID)); ?>"></a>
                                        <?php echo wp_kses_post($thumbnail); ?>
                                    </div> 
                                            
                                    <div class="pxl-item--padding">
                                        <div class="pxl-content">
                                            <?php if($show_category == 'true'): ?>
                                                <div class="item--category"><?php the_terms( $post->ID, 'portfolio-category' ); ?></div>
                                            <?php endif; ?>
                                            <div class="item--title">
                                                <span><?php echo esc_html(get_the_title($post->ID)); ?></span>
                                            </div>
                                            
                                            <?php if($show_excerpt == 'true'): ?>
                                                <?php 
                                                $post_portfolio_excerpt = get_post_meta($post->ID, 'portfolio_excerpt', true);
                                                if(!empty($post_portfolio_excerpt)): ?>
                                                    <div class="pxl-item--content">
                                                        <?php echo wp_trim_words( $post_portfolio_excerpt, $num_words, $more = null ); ?>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div> 
            </div>
            <?php if($arrows !== 'false'): ?>
                <div class="pxl-swiper-arrow-wrap">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="far fa-arrow-left rtl-icon"></i></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="far fa-arrow-right rtl-icon"></i></div>
                </div>
            <?php endif; ?>
            <?php if($pagination !== 'false'): ?>
                <div class="pxl-swiper-pagination">
                    <div class="pxl-swiper-dots style-1"></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>