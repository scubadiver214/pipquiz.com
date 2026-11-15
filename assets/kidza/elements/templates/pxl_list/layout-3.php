<?php $heading3 = isset($settings['heading3']) ? $settings['heading3'] : ''; ?>
<?php if(isset($settings['lists3']) && !empty($settings['lists3']) && count($settings['lists3'])): ?>
    <div class="pxl-list pxl-list3 <?php echo esc_attr($settings['style']); ?>">
    <div class="pxl-heading "><?php echo pxl_print_html($heading3);?></div>
        <?php foreach ($settings['lists3'] as $key => $value): 
            $icon_key = $widget->get_repeater_setting_key('pxl_icon3', 'icons', $key);
            $is_new = \Elementor\Icons_Manager::is_migration_allowed();
            $des3 = isset($value['des3']) ? $value['des3'] : '';
            $text3 = isset($value['text3']) ? $value['text3'] : '';
            $heading3 = isset($value['heading3']) ? $value['heading3'] : '';
             ?>
            <div class="pxl--item <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                    <span class ="pxl-icon pxl-item-left">
                            <?php if ($is_new):
                                \Elementor\Icons_Manager::render_icon($value['pxl_icon3'], ['aria-hidden' => 'true']);
                            elseif (!empty($value['pxl_icon3'])): ?>
                                <i class="<?php echo esc_attr($value['pxl_icon3']); ?>" aria-hidden="true"></i>
                            <?php endif; ?>
                            </span>
                    <div class="pxl-item-right">
                        <div class="pxl-item--text">
                            <?php echo pxl_print_html($value['text3'])?>
                        </div>
                            <a class="pxl-description" <?php echo kidza_render_link_attributes($value['link3']); ?>><?php echo pxl_print_html($value['des3'])?></a>
                        </div>
                    </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>