<?php $heading4 = isset($settings['heading4']) ? $settings['heading4'] : ''; ?>
<?php if(isset($settings['lists4']) && !empty($settings['lists4']) && count($settings['lists4'])): ?>
    <div class="pxl-list pxl-list4 <?php echo esc_attr($settings['style']); ?>">
    <div class="pxl-heading "><?php echo pxl_print_html($heading4);?></div>
        <?php foreach ($settings['lists4'] as $key => $value): 
            $des4 = isset($value['des4']) ? $value['des4'] : '';
            $text4 = isset($value['text4']) ? $value['text4'] : '';
            $icon_key = $widget->get_repeater_setting_key('pxl_icon4', 'icons', $key);
            $is_new = \Elementor\Icons_Manager::is_migration_allowed();
            $link_key = $widget->get_repeater_setting_key( 'link4', 'value', $key );
            if ( ! empty( $value['link4']['url'] ) ) {
                $widget->add_render_attribute( $link_key, 'href', $value['link4']['url'] );

                if ( $value['link4']['is_external'] ) {
                    $widget->add_render_attribute( $link_key, 'target', '_blank' );
                }

                if ( $value['link4']['nofollow'] ) {
                    $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                }
            }
            $link_attributes = $widget->get_render_attribute_string( $link_key ); ?>
            <div class="pxl--item <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                    <span class ="pxl-icon pxl-item-left">
                            <?php if ($is_new):
                                \Elementor\Icons_Manager::render_icon($value['pxl_icon4'], ['aria-hidden' => 'true']);
                            elseif (!empty($value['pxl_icon4'])): ?>
                                <i class="<?php echo esc_attr($value['pxl_icon4']); ?>" aria-hidden="true"></i>
                            <?php endif; ?>
                            </span>
                    <div class="pxl-item--content">
                            <div class="pxl-item--text"><?php echo pxl_print_html($value['text4'])?></div> 
                            <div class="pxl-item--description"><?php echo pxl_print_html($value['des4'])?></div>
                        
                            <a <?php echo implode( ' ', [ $link_attributes ] ); ?>></a>
                        </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>