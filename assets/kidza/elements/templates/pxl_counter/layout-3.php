<?php
$widget->add_render_attribute( 'counter', [
    'class' => 'pxl--counter-value ' . (!empty($settings['effect']) ? esc_attr($settings['effect']) : ''),
    'data-duration' => esc_attr($settings['duration']),
    'data-startnumber' => esc_attr($settings['starting_number3']),
    'data-endnumber' => esc_attr($settings['ending_number3']),
    'data-to-value' => esc_attr($settings['ending_number3']),
    'data-delimiter' => esc_attr($settings['thousand_separator_char']),
]);
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
if ($settings['counter_effect'] == 'pxl-image-parallax' && wp_script_is('pxl-parallax-move-mouse', 'registered')) {
    wp_enqueue_script('pxl-parallax-move-mouse');
}
?>
<div class="pxl-counter pxl-counter3 <?php echo esc_attr($settings['counter_effect'] ?? ''); ?> <?php echo esc_attr($settings['thousand_separator_char'] . ' ' . $settings['pxl_animate']); ?>" 
    data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms"
    <?php if ($settings['counter_effect'] == 'pxl-image-tilt') : ?>
        data-maxtilt="<?php echo esc_attr($settings['max_tilt']); ?>" 
        data-speedtilt="<?php echo esc_attr($settings['speed_tilt']); ?>" 
        data-perspectivetilt="<?php echo esc_attr($settings['perspective_tilt']); ?>"
    <?php endif; ?>>
    
    <div class="pxl--item-inner">
        <div class="pxl--counter-meta">
            <div class="pxl--counter-number <?php echo esc_attr($settings['style-counter']); ?>" data-parallax-value="<?php echo esc_attr($settings['parallax_value']); ?>">
                <?php if (!empty($settings['title3'])) : ?>
                    <div class="pxl--item-title"><?php echo pxl_print_html($settings['title3']); ?></div>
                <?php endif; ?>
                <div class="pxl-counter-meta ">
                    <h2 <?php $widget->print_render_attribute_string('counter'); ?>>
                     <?php echo esc_html($settings['starting_number3']); ?></h2>
                    <h2 class="pxl--counter-prefix el-empty"><?php echo pxl_print_html($settings['prefix3']); ?></h2>
                </div> 
                <?php if (!empty($settings['description3'])) : ?>
                    <div class="pxl--description"><?php echo pxl_print_html($settings['description3']); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
