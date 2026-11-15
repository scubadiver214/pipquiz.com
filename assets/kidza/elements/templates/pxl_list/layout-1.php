<?php $heading = isset($settings['heading']) ? $settings['heading'] : ''; ?>
<?php if(isset($settings['lists']) && !empty($settings['lists']) && count($settings['lists'])): ?>
    <div class="pxl-list pxl-list1 <?php echo esc_attr($settings['style']); ?>">
    <div class="pxl-heading "><?php echo pxl_print_html($heading);?></div>
        <?php foreach ($settings['lists'] as $key => $value): 
            $icon_key = $widget->get_repeater_setting_key('pxl_icon', 'icons', $key);
            $is_new = \Elementor\Icons_Manager::is_migration_allowed();
            $link_key = $widget->get_repeater_setting_key( 'link', 'value', $key );
            if ( ! empty( $value['link']['url'] ) ) {
                $widget->add_render_attribute( $link_key, 'href', $value['link']['url'] );

                if ( $value['link']['is_external'] ) {
                    $widget->add_render_attribute( $link_key, 'target', '_blank' );
                }

                if ( $value['link']['nofollow'] ) {
                    $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                }
            }
            $link_attributes = $widget->get_render_attribute_string( $link_key ); ?>
            <div class="pxl--item <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                    <?php if ($is_new):
                         \Elementor\Icons_Manager::render_icon($value['pxl_icon'], ['aria-hidden' => 'true']);
                     elseif (!empty($value['pxl_icon'])): ?>
                        <i class="<?php echo esc_attr($value['pxl_icon']); ?>" aria-hidden="true"></i>
                    <?php endif; ?>
                <a class="pxl-item--text pxl-item-right" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                    <?php echo pxl_print_html($value['text'])?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>