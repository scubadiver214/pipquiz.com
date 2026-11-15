<?php
$html_id = pxl_get_element_id($settings);

$label = $widget->parse_text_editor( $settings['label'] ); 

$is_items = isset($settings['items']) && !empty($settings['items']) && count($settings['items']) || false;

$i = !empty($settings['infinite']) ? 1 : 2;
$infinite = ($i === 1) ? 'infinite' : '';
$pause_on_hover = !empty($settings['pause_on_hover']) ? 'pause-on-hover' : '';
$line = !empty($settings['label_line_show']) ? 'pxl-show-line' : '';

$img_size = $settings['img_size'] ?? 'full';
$overflow_hidden = !empty($settings['overflow_hidden']) ? 'pxl-overflow--hidden' : '';

?>

<?php if ($is_items): ?>
    <div class="pxl-marquee pxl-marquee1 <?php echo esc_attr($settings['style'].' '.$overflow_hidden); ?>">
        <?php if (!empty($settings['label'])): ?>
            <h5 class="pxl-item--label <?php echo esc_attr($line.' '.$settings['label_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['label_animate_delay'].'ms'); ?>">
                <span class="pxl-label--text">
                    <?php pxl_print_html($label); ?>
                </span>
            </h5>
        <?php endif; ?>
        <div class="pxl-item--container <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay'].'ms'); ?>">
            <div class="pxl-item--inner <?php echo esc_attr($infinite . ' ' . $settings['direction'] . ' ' . $pause_on_hover ); ?>">
                <?php while ($i <= 2): ?>
                    <?php 
                    $class = $i === 1 ? 'main' : 'duplicate';    
                    ?>
                    <div class="pxl-item--list <?php echo esc_attr($class); ?>">
                        <?php foreach ($settings['items'] as $key => $item): ?>
                            <?php  
                            ?>
                            <div class="pxl-item--single">
                                <div class="pxl-single--inner">
                                    <?php 
                                    switch ($item['type']) :
                                        case 'icon':
                                        kidza_render_icon($item['pxl_icon']);
                                        break;

                                        case 'image':
                                        $image_id = $item['image']['id'] ?? '';
                                        $thumbnail = kidza_get_thumbnail($image_id, $img_size); 
                                        $thumbnail_url = kidza_get_thumbnail($image_id, 'full', true);
                                        if($item['image_type'] === 'image') {
                                            pxl_print_html('<div class="pxl-item--img">'.$thumbnail.'</div>');
                                        }else {
                                            pxl_print_html('<div class="pxl-item--bg" style="background-image: url(\'' . esc_url($thumbnail_url) . '\')"></div>');
                                        }
                                        break;

                                        case 'text':
                                        pxl_print_html('<div class="pxl-item--text">' . esc_html($item['text']) . '</div>');
                                        break;
                                    endswitch;
                                    ?>
                                </div>
                                <a <?php kidza_render_link_attributes($item['link']); ?> class="pxl-item--link"></a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php $i += 1; ?>
                <?php endwhile; ?>
                <?php if(!empty($settings['overlay'])) : ?>
                    <div class="pxl-item--overlay"></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
