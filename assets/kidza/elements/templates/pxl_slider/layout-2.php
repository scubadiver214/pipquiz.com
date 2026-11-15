<?php
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
if($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll');
$arrows = $widget->get_setting('arrows', false);  
$pagination = $widget->get_setting('pagination', false);
$pagination_type = $widget->get_setting('pagination_type', 'bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover', false);
$autoplay = $widget->get_setting('autoplay', false);
$autoplay_speed = $widget->get_setting('autoplay_speed', 5000);
$infinite = $widget->get_setting('infinite', false);  
$speed = $widget->get_setting('speed', 500);
$drap = $widget->get_setting('drap', false);  

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1, 
    'slide_mode'                    => 'gl', 
    'slides_to_show'                => 1, 
    'slides_to_show_xxl'            => 1,
    'slides_to_show_lg'             => 1,
    'slides_to_show_md'             => 1,
    'slides_to_show_sm'             => 1,
    'slides_to_show_xs'             => 1,
    'slides_to_scroll'              => 1,
    'arrow'                         => (bool)$arrows,
    'pagination'                    => (bool)$pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => (bool)$autoplay,
    'pause_on_hover'                => (bool)$pause_on_hover,
    'pause_on_interaction'          => true,
    'delay'                         => (int)$autoplay_speed,
    'loop'                          => (bool)$infinite,
    'speed'                         => (int)$speed,
];

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]); 

?>

<?php if(isset($settings['slides']) && !empty($settings['slides']) && count($settings['slides'])): ?>
    <div class="pxl-swiper-sliders pxl-element-slider pxl-swiper-effect2 pxl-swiper-nogap  <?php echo esc_attr($settings['style']); ?>" <?php if($drap !== false) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'kidza'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner swiper swiper-olive-maddie-25">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper swiper-wrapper">
                    <?php foreach ($settings['slides'] as $key => $value):
                        $bg_image = isset($value['bg_image']) ? $value['bg_image'] : '';
                        if(!empty($value['slide_template'])) : ?>
                            <div class="pxl-swiper-slide swiper-slide swiper-slide-5215">
                                <div class="pxl-slider--inner elementor-repeater-item-<?php echo esc_attr($value['_id']); ?>">
                                        <?php if(!empty($bg_image['id'])) :
                                            $img  = pxl_get_image_by_size( array(
                                                'attach_id'  => $bg_image['id'],
                                                'thumb_size' => 'full',
                                                'class' => 'no-lazyload swiper-gl-image'
                                            ) );
                                            $thumbnail    = $img['thumbnail'];
                                            
                                             ?>
                                           <?php  echo wp_kses_post($thumbnail);  ?>
                                        <?php endif; ?>
                                    <div class="pxl-slider--content">
                                        <?php $slide_content = Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$value['slide_template']);
                                        pxl_print_html($slide_content); ?>
                                    </div>
                               </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <?php if($pagination !== false): ?>
            <div class="pxl-swiper-dots style-1"></div>
        <?php endif; ?>

        <?php if($arrows !== false): ?>
            <div class="pxl-swiper-arrow-wrap style-6">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev">
                    <i class="flaticon flaticon-arrow-right"></i>
                </div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next">
                    <i class="flaticon flaticon-arrow-right"></i>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>