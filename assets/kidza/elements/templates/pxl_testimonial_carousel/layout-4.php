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
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');
$arrows = $widget->get_setting('arrows','false');
$pagination = $widget->get_setting('pagination','false');
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay', '');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite','false');  
$drap = $widget->get_setting('drap','false');  
$speed = $widget->get_setting('speed', '500');
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1, 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => (int)$col_xl,
    'slides_to_show_xxl'            => (int)$col_xxl, 
    'slides_to_show_lg'             => (int)$col_lg, 
    'slides_to_show_md'             => (int)$col_md, 
    'slides_to_show_sm'             => (int)$col_sm, 
    'slides_to_show_xs'             => (int)$col_xs, 
    'slides_to_scroll'              => (int)$slides_to_scroll,
    'arrow'                         => (bool)$arrows,
    'pagination'                    => (bool)$pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => (bool)$autoplay,
    'pause_on_hover'                => (bool)$pause_on_hover,
    'pause_on_interaction'          => true,
    'delay'                         => (int)$autoplay_speed,
    'loop'                          => (bool)$infinite,
    'speed'                         => (int)$speed
];

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);

if(isset($settings['testimonial4']) && !empty($settings['testimonial4']) && count($settings['testimonial4'])): ?>
    <div class="pxl-swiper-sliders pxl-testimonial-carousel pxl-testimonial-carousel4" <?php if($drap !== 'false') : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'kidza'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['testimonial4'] as $key => $value): 
                        $title4 = isset($value['title4']) ? $value['title4'] : '';
                        $content4 = isset($value['content4']) ? $value['content4'] : '';
                        $year4 = isset($value['year4']) ? $value['year4'] : '';
                        
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item-inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <h1 class="pxl-year"><?php echo pxl_print_html($year4); ?></h1>
                                <h4 class="pxl-title"><?php echo pxl_print_html($title4); ?></h4>
                                <div class="pxl-content"><?php echo pxl_print_html($content4); ?></div>
                            </div>
                        </div> 
                    <?php endforeach; ?>
                </div> 
            </div>
        </div> 

        <?php if($pagination !== 'false'): ?>
            <div class="pxl-swiper-dots style-4"></div>
        <?php endif; ?>

        <?php if($arrows !== 'false'): ?>
            <div class="pxl-swiper-arrow-wrap">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="flaticon flaticon-arrow-right right-icon"></i></div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="flaticon flaticon-arrow-right left-icon"></i></div>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>