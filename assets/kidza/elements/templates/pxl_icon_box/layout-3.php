<?php
$title3 = isset($settings['title3']) ? $settings['title3'] : '';
$des3 = isset($settings['des3']) ? $settings['des3'] : '';
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
if (isset($settings['pxl_icon3']) && !empty($settings['pxl_icon3'])): ?>
    <div class="pxl-icon-box pxl-icon-box3 wow <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <div class="pxl-icon">
            <?php if ($is_new):
                \Elementor\Icons_Manager::render_icon($settings['pxl_icon3'], ['aria-hidden' => 'true']);
            else: ?>
                <i class="<?php echo esc_attr($settings['pxl_icon3']); ?>" aria-hidden="true"></i>
            <?php endif; ?>
        </div>
        <h4 class="pxl-title"><?php echo pxl_print_html($title3); ?></h4>
        <div class="pxl-des"><?php echo pxl_print_html($des3); ?></div>
    </div>
<?php endif; ?>