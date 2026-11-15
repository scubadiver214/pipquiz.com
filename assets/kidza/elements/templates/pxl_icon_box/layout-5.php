<?php
$title5 = isset($settings['title5']) ? $settings['title5'] : '';
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
$link_attr = kidza_render_link_attributes($settings['link5']);
if (isset($settings['pxl_icon5']) && !empty($settings['pxl_icon5'])): ?>
    <div class="pxl-icon-box pxl-icon-box5 wow <?php echo esc_attr($settings['style1'])?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                <?php if ($is_new):
                    \Elementor\Icons_Manager::render_icon($settings['pxl_icon5'], ['aria-hidden' => 'true']);
                else: ?>
                    <i class="<?php echo esc_attr($settings['pxl_icon5']); ?>" aria-hidden="true"></i>
                <?php endif; ?>
            <h5 class="pxl-title">
                <?php echo pxl_print_html($title5); ?>
                <a class ="pxl-link" <?php echo kidza_render_link_attributes($settings['link5']); ?>></a>
            </h5>
    </div>
<?php endif; ?>