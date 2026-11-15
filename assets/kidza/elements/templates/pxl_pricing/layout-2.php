<div class="pxl-pricing pxl-pricing2 <?php echo esc_attr($settings['pxl_animate']) ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <?php if (!empty($settings['popular2'])): ?>
        <div class="pxl-popular">
            <div class="pxl-popular2">
                <?php echo pxl_print_html($settings['popular2']); ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="pxl-padding">
            <div class="pxl-content">
                    <div class="pxl-heading"><?php echo pxl_print_html($settings['heading2']); ?></div>
                    <div class="pxl-des"><?php echo pxl_print_html($settings['des2']); ?></div>
                    <div class="pxl-group">
                        <div class="pxl-price"><?php echo pxl_print_html($settings['price2']); ?></div>
                        <div class="pxl-month"><?php echo pxl_print_html($settings['month2']); ?></div>
                    </div>
                <div class="pxl-item-inner">
                    <?php if (!empty($settings['list_item21']) && is_array($settings['list_item21'])): ?>
                            <?php foreach ($settings['list_item21'] as $key => $value):
                                $item2 = isset($value['item2']) ? $value['item2'] : '';
                                $icon_key = $widget->get_repeater_setting_key('pxl_icon', 'icons', $key);
                                $is_new = \Elementor\Icons_Manager::is_migration_allowed();
                                 ?>
                                <li class="pxl-price-text">
                                        <div class="pxl-icon pxl-item-left">
                                            <?php if ($is_new):
                                                \Elementor\Icons_Manager::render_icon($value['pxl_icon21'], ['aria-hidden' => 'true']);
                                                    elseif (!empty($value['pxl_icon21'])): ?>
                                                <i class="<?php echo esc_attr($value['pxl_icon21']); ?>" aria-hidden="true"></i>
                                            <?php endif; ?>
                                        </div>
                                    <div class="pxl-item-title <?php echo esc_attr($value['item-style'] ?? '')?>"><?php echo pxl_print_html($value['item2'] ?? ''); ?></div>
                                </li>    
                            <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if (!empty($settings['button_text2'])): ?>
                        <?php 
                        $is_new2 = \Elementor\Icons_Manager::is_migration_allowed(); 
                        ?>
                        <div class="pxl-item--button">
                            <?php echo pxl_print_html($settings['button_text2'])?>
                            <a <?php echo kidza_render_link_attributes($settings['button_link2']); ?>></a>
                            <div class="pxl-icon-button ">
                                <?php if ($is_new2 && !empty($settings['pxl_icon22'])):
                                    \Elementor\Icons_Manager::render_icon($settings['pxl_icon22'], ['aria-hidden' => 'true']);
                                        elseif (!empty($settings['pxl_icon22'])): ?>
                                    <i class="<?php echo esc_attr($settings['pxl_icon22']); ?>" aria-hidden="true"></i>
                                <?php endif; ?>
                            </div>    
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>