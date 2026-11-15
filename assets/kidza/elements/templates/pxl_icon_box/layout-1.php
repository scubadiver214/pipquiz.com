<?php
$title = isset($settings['title']) ? $settings['title'] : '';
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
$link_attr = kidza_render_link_attributes($settings['link']);
if (isset($settings['pxl_icon']) && !empty($settings['pxl_icon'])): ?>
    <div class="pxl-icon-box pxl-icon-box1 wow <?php echo esc_attr($settings['style1'])?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                <?php if ($is_new):
                    \Elementor\Icons_Manager::render_icon($settings['pxl_icon'], ['aria-hidden' => 'true']);
                else: ?>
                    <i class="<?php echo esc_attr($settings['pxl_icon']); ?>" aria-hidden="true"></i>
                <?php endif; ?>
            <div class="pxl-title">
                <?php echo pxl_print_html($title); ?>
                <a class ="pxl-link" <?php echo kidza_render_link_attributes($settings['link']); ?>></a>
            </div>
    </div>
<?php endif; ?>