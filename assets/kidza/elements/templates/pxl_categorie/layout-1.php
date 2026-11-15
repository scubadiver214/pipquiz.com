<?php
$html_id = pxl_get_element_id($settings);
?>
<div class="pxl-language pxl-language1 <?php echo esc_attr($settings['style']); ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-meta-inner <?php echo esc_attr($settings['style_list']); ?>">
        <div class="pxl-language-on">
            <?php if ( $settings['icon_type'] == 'icon' && !empty($settings['pxl_icon']['value']) ) : ?>
                <div class="pxl-item--icon">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                </div>
            <?php endif; ?>
            <?php if ( $settings['icon_type'] == 'image' && !empty($settings['icon_image']['id']) ) : ?>
                <div class="pxl-item--icon">
                    <?php $img_icon  = pxl_get_image_by_size( array(
                            'attach_id'  => $settings['icon_image']['id'],
                            'thumb_size' => '30x30',
                        ) );
                        $thumbnail_icon    = $img_icon['thumbnail'];
                    echo pxl_print_html($thumbnail_icon); ?>
                </div>
            <?php endif; ?>
            <div class="pxl-language-title pxl-item-title-on">
                <?php echo esc_attr($settings['title_on']); ?>
            </div>
            <div class="pxl-arrow">
            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6" fill="none">
                <path d="M1 1.23077L5 5.23077L9 1.23077" stroke="#385469" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            </div>
        </div>
        <?php if(isset($settings['lists']) && !empty($settings['lists']) && count($settings['lists'])):
        $image_size = !empty($settings['img_size']) ? $settings['img_size'] : '30x30'; ?>
            <div class="pxl-language-list">
                <div class="pxl-list-inner">
                    <?php foreach ($settings['lists'] as $key => $value):
                        $image = isset($value['image']) ? $value['image'] : '';
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
                        $link_attributes = $widget->get_render_attribute_string( $link_key ); 
                        ?>
                        <div class="pxl-item">
                            <a class="pxl-link" <?php echo implode( ' ', [ $link_attributes ] ); ?>></a>
                            <?php if(!empty($image['id'])) { 
                                $img = pxl_get_image_by_size( array(
                                    'attach_id'  => $image['id'],
                                    'thumb_size' => $image_size,
                                    'class' => 'no-lazyload',
                                ));
                                $thumbnail = $img['thumbnail'];
                                ?>
                                <div class="pxl-image pxl-mr-7">
                                    <?php echo wp_kses_post($thumbnail); ?>
                                </div>
                            <?php } ?>
                            <div class="pxl-item--title">
                                    <?php echo pxl_print_html($value['title'])?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>