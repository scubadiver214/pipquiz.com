<?php $heading2 = isset($settings['heading2']) ? $settings['heading2'] : ''; ?>
<?php if(isset($settings['lists2']) && !empty($settings['lists2']) && count($settings['lists2'])): ?>
    <div class="pxl-list pxl-list2 <?php echo esc_attr($settings['style']); ?>">
        <?php foreach ($settings['lists2'] as $key => $value): 
            $icon_key = $widget->get_repeater_setting_key('pxl_icon2', 'icons', $key);
            $is_new = \Elementor\Icons_Manager::is_migration_allowed();
            $title = isset($value['title']) ? $value['title'] : '';
            $description = isset($value['description']) ? $value['description'] : '';
            $link_key = $widget->get_repeater_setting_key( 'link2', 'value', $key );
            if ( ! empty( $value['link2']['url'] ) ) {
                $widget->add_render_attribute( $link_key, 'href', $value['link2']['url'] );

                if ( $value['link2']['is_external'] ) {
                    $widget->add_render_attribute( $link_key, 'target', '_blank' );
                }

                if ( $value['link2']['nofollow'] ) {
                    $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                }
            }
            $link_attributes = $widget->get_render_attribute_string( $link_key ); ?>
            <div class="pxl--item <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                        <div class="pxl-icon pxl-item-left">
                            <span class ="pxl-hv-cirle">
                            <?php if ($is_new):
                                \Elementor\Icons_Manager::render_icon($value['pxl_icon2'], ['aria-hidden' => 'true']);
                            elseif (!empty($value['pxl_icon2'])): ?>
                                <i class="<?php echo esc_attr($value['pxl_icon2']); ?>" aria-hidden="true"></i>
                            <?php endif; ?>
                            </span>
                        </div>
                        <div class="pxl-item-right">
                        <div class="pxl-title">
                            <?php if (!empty($title)) {
                                echo pxl_print_html($title);
                            } ?>
                        </div>
                        <a class = "" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                            <?php echo pxl_print_html($value['description'])?>
                        </a>
                        </div>                        
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
