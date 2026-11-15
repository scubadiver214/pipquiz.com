<?php
$title4 = isset($settings['title4']) ? $settings['title4'] : '';
$des4 = isset($settings['des4']) ? $settings['des4'] : '';
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
if (isset($settings['pxl_icon41']) && !empty($settings['pxl_icon41'])): ?>
    <div class="pxl-icon-box pxl-icon-box4 wow <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <div class="pxl-icon">
            <?php if ($is_new):
                \Elementor\Icons_Manager::render_icon($settings['pxl_icon41'], ['aria-hidden' => 'true']);
            else: ?>
                <i class="<?php echo esc_attr($settings['pxl_icon41']); ?>" aria-hidden="true"></i>
            <?php endif; ?>
        </div>
        <div class="pxl-icon-right">
            <?php if ($is_new):
                \Elementor\Icons_Manager::render_icon($settings['pxl_icon42'], ['aria-hidden' => 'true']);
            else: ?>
                <i class="<?php echo esc_attr($settings['pxl_icon42']); ?>" aria-hidden="true"></i>
            <?php endif; ?>
        </div>
        <h4 class="pxl-title"><?php echo pxl_print_html($title4); ?></h4>
        <div class="pxl-des"><?php echo pxl_print_html($des4); ?></div>
    </div>
<?php endif; ?>