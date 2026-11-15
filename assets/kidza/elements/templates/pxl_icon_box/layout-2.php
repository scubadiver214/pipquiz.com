<?php
$title2 = isset($settings['title2']) ? $settings['title2'] : '';
$text_link = isset($settings['text_link']) ? $settings['text_link'] : '';
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
$link_attr = kidza_render_link_attributes($settings['link2']);
if (isset($settings['pxl_icon21']) && !empty($settings['pxl_icon21'])): ?>
    <div class="pxl-icon-box pxl-icon-box2 wow <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <div class="pxl-icon-logo wow zoomInSmall">
            <?php if ($is_new):
                \Elementor\Icons_Manager::render_icon($settings['pxl_icon21'], ['aria-hidden' => 'true']);
            else: ?>
                <i class="<?php echo esc_attr($settings['pxl_icon21']); ?>" aria-hidden="true"></i>
            <?php endif; ?>
        </div>
        <div class="pxl-icon2">
            <?php if ($is_new):
                \Elementor\Icons_Manager::render_icon($settings['pxl_icon22'], ['aria-hidden' => 'true']);
            else: ?>
                <i class="<?php echo esc_attr($settings['pxl_icon22']); ?>" aria-hidden="true"></i>
            <?php endif; ?>
        </div>
        <div class="pxl-icon3">
            <?php if ($is_new):
                \Elementor\Icons_Manager::render_icon($settings['pxl_icon23'], ['aria-hidden' => 'true']);
            else: ?>
                <i class="<?php echo esc_attr($settings['pxl_icon23']); ?>" aria-hidden="true"></i>
            <?php endif; ?>
        </div>
        <div class="pxl-icon4">
            <?php if ($is_new):
                \Elementor\Icons_Manager::render_icon($settings['pxl_icon24'], ['aria-hidden' => 'true']);
            else: ?>
                <i class="<?php echo esc_attr($settings['pxl_icon24']); ?>" aria-hidden="true"></i>
            <?php endif; ?>
        </div>          
        <h2 class="pxl-title wow PXLfadeInUp"><?php echo pxl_print_html($title2); ?></h2>
        <h5 class="pxl-button wow PXLfadeInUp">
            <a <?php echo kidza_render_link_attributes($settings['link2']); ?>><?php echo pxl_print_html($settings['text_link'])?></a>
            <div class="pxl-icon--btn">
                <?php if ($is_new):
                    \Elementor\Icons_Manager::render_icon($settings['pxl_icon25'], ['aria-hidden' => 'true']);
                else: ?>
                    <i class="<?php echo esc_attr($settings['pxl_icon25']); ?>" aria-hidden="true"></i>
                <?php endif; ?>
            </div>
        </h5>
    </div>
<?php endif; ?>