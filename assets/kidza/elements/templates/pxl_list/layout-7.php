<?php if(isset($settings['lists7']) && !empty($settings['lists7']) && count($settings['lists7'])): ?>
    <div class="pxl-list pxl-list7">
        <?php foreach ($settings['lists7'] as $key => $value): 
            $icon_key = $widget->get_repeater_setting_key('pxl_icon7', 'icons', $key);
            $is_new = \Elementor\Icons_Manager::is_migration_allowed();
            $text71 = isset($value['text71']) ? $value['text71'] : '';
            $text72 = isset($value['text72']) ? $value['text72'] : '';
            $heading7 = isset($value['heading7']) ? $value['heading7'] : '';
            ?>
            <div class="pxl--item <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                    <span class ="pxl-icon pxl-item-left">
                            <?php if ($is_new):
                                \Elementor\Icons_Manager::render_icon($value['pxl_icon7'], ['aria-hidden' => 'true']);
                            elseif (!empty($value['pxl_icon7'])): ?>
                                <i class="<?php echo esc_attr($value['pxl_icon7']); ?>" aria-hidden="true"></i>
                            <?php endif; ?>
                            </span>
                    <div class="pxl-item-right">
                        <div class="pxl-heading "><?php echo pxl_print_html($heading7);?></div>
                            <?php if(!empty($value['text71'])): ?>
                                <a class="pxl--item" <?php echo kidza_render_link_attributes($value['link71']); ?>><?php echo pxl_print_html($value['text71'])?></a>
                            <?php endif; ?>
                            <?php if(!empty($value['text72'])): ?>
                                <a class="pxl--item" <?php echo kidza_render_link_attributes($value['link72']); ?>><?php echo pxl_print_html($value['text72'])?></a>
                            <?php endif; ?>
                        </div>
                    </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>