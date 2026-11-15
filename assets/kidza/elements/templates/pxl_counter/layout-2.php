<?php
$widget->add_render_attribute( 'counter', [
    'class' => 'pxl--counter-value ' . (!empty($settings['effect']) ? esc_attr($settings['effect']) : ''),
    'data-duration' => esc_attr($settings['duration']),
    'data-startnumber' => esc_attr($settings['starting_number']),
    'data-endnumber' => esc_attr($settings['ending_number2']),
    'data-to-value' => esc_attr($settings['ending_number2']),
    'data-delimiter' => esc_attr($settings['thousand_separator_char']),
]);
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
if ($settings['counter_effect'] == 'pxl-image-parallax' && wp_script_is('pxl-parallax-move-mouse', 'registered')) {
    wp_enqueue_script('pxl-parallax-move-mouse');
}
?>
<div class="pxl-counter pxl-counter2 <?php echo esc_attr($settings['counter_effect'] ?? ''); ?> <?php echo esc_attr($settings['thousand_separator_char'] . ' ' . $settings['pxl_animate']); ?>" 
    data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms"
    <?php if ($settings['counter_effect'] == 'pxl-image-tilt') : ?>
        data-maxtilt="<?php echo esc_attr($settings['max_tilt']); ?>" 
        data-speedtilt="<?php echo esc_attr($settings['speed_tilt']); ?>" 
        data-perspectivetilt="<?php echo esc_attr($settings['perspective_tilt']); ?>"
    <?php endif; ?>>
    
    <div class="pxl--item-inner <?php echo esc_attr($settings['style-counter']); ?>">
        <div class="pxl--counter-meta">
            <?php 
                $icon_type = !empty($settings['icon_type']) ? $settings['icon_type'] : 'icon'; 
                $icon_data = $settings; 
                if ($icon_type == 'icon' && !empty($icon_data['pxl_icon2'])): ?>
                <div class="pxl-item--icon">
                    <?php if (isset($is_new) && $is_new && is_array($icon_data['pxl_icon2'])):
                            \Elementor\Icons_Manager::render_icon($icon_data['pxl_icon2'], ['aria-hidden' => 'true']);
                        elseif (!is_array($icon_data['pxl_icon2'])): ?>
                            <i class="<?php echo esc_attr($icon_data['pxl_icon2']); ?>" aria-hidden="true"></i>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            <div class="pxl--counter-number " data-parallax-value="<?php echo esc_attr($settings['parallax_value']); ?>">
                <div class="pxl-counter-meta ">
                    <h2 <?php $widget->print_render_attribute_string('counter'); ?>>
                     <?php echo esc_html($settings['starting_number2']); ?></h2>
                     <?php if (!empty($settings['suffix'])) : ?>
                        <span class="pxl--counter-suffix wow" data-wow-delay="ms"><?php echo pxl_print_html($settings['suffix']); ?></span>
                    <?php endif; ?>
                    <h2 class="pxl--counter-prefix el-empty"><?php echo pxl_print_html($settings['prefix2']); ?></h2>
                </div> 
                <?php if (!empty($settings['title2'])) : ?>
                    <div class="pxl--item-title"><?php echo pxl_print_html($settings['title2']); ?></div>
                <?php endif; ?>
                
            </div>
        </div>
    </div>
</div>
