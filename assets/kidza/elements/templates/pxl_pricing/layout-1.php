<div class="pxl-pricing pxl-pricing1 <?php echo esc_attr($settings['pxl_animate']) ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
<?php if (!empty($settings['popular'])): ?><div class="pxl-popular"><?php echo pxl_print_html($settings['popular']); ?></div><?php endif; ?>
    <div class="pxl-content">
            <div class="pxl-heading"><?php echo pxl_print_html($settings['heading']); ?></div>
            <div class="pxl-des"><?php echo pxl_print_html($settings['des']); ?></div>
            <div class="pxl-group">
                <div class="pxl-price"><?php echo pxl_print_html($settings['price']); ?></div>
                <div class="pxl-month"><?php echo pxl_print_html($settings['month']); ?></div>
            </div>
        <div class="pxl-item-inner">
            <?php if (!empty($settings['list_item']) && is_array($settings['list_item'])): ?>
                    <?php foreach ($settings['list_item'] as $key => $value):
                        $item = isset($value['item']) ? $value['item'] : '';
                        $icon_key = $widget->get_repeater_setting_key('pxl_icon', 'icons', $key);
                        $is_new = \Elementor\Icons_Manager::is_migration_allowed();
                         ?>
                        <li class="pxl-price-text">
                                <div class="pxl-icon pxl-item-left">
                                    <?php if ($is_new):
                                        \Elementor\Icons_Manager::render_icon($value['pxl_icon'], ['aria-hidden' => 'true']);
                                            elseif (!empty($value['pxl_icon'])): ?>
                                        <i class="<?php echo esc_attr($value['pxl_icon']); ?>" aria-hidden="true"></i>
                                    <?php endif; ?>
                                </div>
                            <div class="pxl-item-title <?php echo esc_attr($value['item-style'])?>"> <?php echo pxl_print_html($value['item']); ?> </div>
                        </li>    
                    <?php endforeach; ?>
            <?php endif; ?>
            <?php if (!empty($settings['button_text'])): ?>
                <?php 
                $is_new2 = \Elementor\Icons_Manager::is_migration_allowed(); 
                ?>
                <div class="pxl-item--button">
                    <?php echo pxl_print_html($settings['button_text'])?>
                    <a <?php echo kidza_render_link_attributes($settings['button_link']); ?>></a>
                    <div class="pxl-icon-button ">
                        <?php if ($is_new2 && !empty($settings['pxl_icon2'])):
                            \Elementor\Icons_Manager::render_icon($settings['pxl_icon2'], ['aria-hidden' => 'true']);
                                elseif (!empty($settings['pxl_icon2'])): ?>
                            <i class="<?php echo esc_attr($settings['pxl_icon2']); ?>" aria-hidden="true"></i>
                        <?php endif; ?>
                    </div>    
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>