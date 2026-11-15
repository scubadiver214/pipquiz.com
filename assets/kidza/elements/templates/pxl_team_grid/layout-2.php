<?php
$default_settings = [
    'gallery_list' => '',
    'filter_alignment' => '',
    'layout_mode' => 'masonry',
];

$settings = array_merge($default_settings, $settings);
extract($settings);
$avatar2_size = '';
if (!empty($settings['avatar2_size'])) {
    $avatar2_size = $settings['avatar2_size'];
} else {
    $avatar2_size = '79x79';
}
$background2_size = '';
if (!empty($settings['background2_size'])) {
    $background2_size = $settings['background2_size'];
} else {
    $background2_size = 'full';
}

$html_id = pxl_get_element_id($settings);
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xl = 12 / intval($col_xl);
$col_lg = 12 / intval($col_lg);
$col_md = 12 / intval($col_md);
$col_sm = 12 / intval($col_sm);
$col_xs = 12 / intval($col_xs);
$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
?>

<?php if (isset($settings['team2']) && !empty($settings['team2']) && count($settings['team2'])): ?>
    <div class="pxl-grid pxl-team-grid pxl-team-grid2 " data-layout="<?php echo esc_attr($layout_mode); ?>"> 
        <div class="pxl-grid-inner pxl-grid-masonry row <?php echo esc_attr($settings['style_item']); ?>" 
             data-gutter="15">
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
            <?php foreach ($settings['team2'] as $key => $value): ?>
                <?php
                $avatar2 = isset($value['avatar2']) ? $value['avatar2'] : '';
                $background2 = isset($value['background2']) ? $value['background2'] : '';
                $content2 = isset($value['content2']) ? $value['content2'] : '';
                $name2 = isset($value['name2']) ? $value['name2'] : '';
                $position2 = isset($value['position2']) ? $value['position2'] : '';
                $link = isset($value['link']) ? $value['link'] : '';
                $link_key = $widget->get_repeater_setting_key('title', 'value', $key);
                $is_new = \Elementor\Icons_Manager::is_migration_allowed();
                $icon_key = $widget->get_repeater_setting_key('pxl_icon', 'icons', $key);
                $style_star2 = isset($value['style_star2']) ? $value['style_star2'] : '';
                $show_star2 = isset($value['show_star2']) ? $value['show_star2'] : 'false'; // hiển thị sao đánh giá 
                if (!empty($link['url'])) {
                    $widget->add_render_attribute($link_key, 'href', $link['url']);

                    if ($link['is_external']) {
                        $widget->add_render_attribute($link_key, 'target', '_blank');
                    }

                    if ($link['nofollow']) {
                        $widget->add_render_attribute($link_key, 'rel', 'nofollow');
                    }
                }
                
                $link_attributes = $widget->get_render_attribute_string($link_key);
                ?>
                <div class="<?php echo esc_attr($item_class); ?>">
                    <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>">
                        <?php if (!empty($background2['id'])): ?>
                            <?php
                            $img_bg = pxl_get_image_by_size([
                                'attach_id'  => $background2['id'],
                                'thumb_size' => $background2_size,
                                'class' => 'no-lazyload',
                            ]);
                            $thumbnail_bg = $img_bg['thumbnail'];
                            ?>
                            <div class="pxl-background">
                                <?php echo wp_kses_post($thumbnail_bg); ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($avatar2['id'])): ?>
                            <?php
                            $img = pxl_get_image_by_size([
                                'attach_id'  => $avatar2['id'],
                                'thumb_size' => $avatar2_size,
                                'class' => 'no-lazyload',
                            ]);
                            $thumbnail = $img['thumbnail'];
                            ?>
                                <div class="pxl-avatar">                            
                                    <?php echo wp_kses_post($thumbnail); ?> 
                            <div class="pxl-star">
                                <?php if( $show_star2 == 'true' ) : ?>
                                     <span class="pxl-item--star pxl-item--<?php echo esc_attr( $style_star2 ); ?>-star">
                                        <i class="fa fa-star pxl-mr-1"></i>
                                        <i class="fa fa-star pxl-mr-1"></i>
                                        <i class="fa fa-star pxl-mr-1"></i>
                                        <i class="fa fa-star pxl-mr-1"></i>
                                        <i class="fa fa-star pxl-mr-1"></i>
                                    </span>
                                <?php endif; ?>
                            </div>              
                                </div>
                                
                        <?php endif; ?>
                        
                        <div class="pxl-item--meta">  
                            <?php if (!empty($content2)): ?>
                                <div class="pxl-item--content ">
                                    <?php if (!empty($link['url'])): ?>
                                        <a <?php echo implode(' ', [$link_attributes]); ?>>
                                    <?php endif; ?>
                                    <?php echo pxl_print_html($content2); ?>
                                    <?php if (!empty($link['url'])): ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($name2)): ?>
                                <div class="pxl-item--name ">
                                    <?php echo pxl_print_html($name2); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($position2)): ?>
                                <div class="pxl-item--position ">
                                    <?php echo pxl_print_html($position2); ?>
                                </div>
                            <?php endif; ?>
                            <div class ="pxl-icon ">
                                    <?php if ($is_new):
                                        \Elementor\Icons_Manager::render_icon($value['pxl_icon'], ['aria-hidden' => 'true']);
                                    elseif (!empty($value['pxl_icon'])): ?>
                                        <i class="<?php echo esc_attr($value['pxl_icon']); ?>" aria-hidden="true"></i>
                                    <?php endif; ?>
                                </div> 
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            
        </div>
    </div>
<?php endif; ?>