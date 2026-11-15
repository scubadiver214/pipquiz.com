<?php
$default_settings = [
    'gallery_list' => '',
    'filter_alignment' => '',
    'layout_mode' => 'masonry',
];

$settings = array_merge($default_settings, $settings);
extract($settings);
$img_size = '';
if (!empty($settings['img_size'])) {
    $img_size = $settings['img_size'];
} else {
    $img_size = 'full';
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

<?php if (isset($settings['team']) && !empty($settings['team']) && count($settings['team'])): ?>
    <div class="pxl-grid pxl-team-grid pxl-team-grid1 <?php echo esc_attr($settings['style']); ?>" 
         data-layout="<?php echo esc_attr($layout_mode); ?>">
        
        <div class="pxl-grid-inner pxl-grid-masonry row <?php echo esc_attr($settings['style_item']); ?>" 
             data-gutter="15">
            
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
            
            <?php foreach ($settings['team'] as $key => $value): ?>
                <?php
                $title = isset($value['title']) ? $value['title'] : '';
                $position = isset($value['position']) ? $value['position'] : '';
                $image = isset($value['image']) ? $value['image'] : '';
                $link = isset($value['link']) ? $value['link'] : '';
                $social = isset($value['social']) ? $value['social'] : '';
                $link_key = $widget->get_repeater_setting_key('title', 'value', $key);
                
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
                        
                        <?php if (!empty($image['id'])): ?>
                            <?php
                            $img = pxl_get_image_by_size([
                                'attach_id'  => $image['id'],
                                'thumb_size' => $img_size,
                                'class' => 'no-lazyload',
                            ]);
                            $thumbnail = $img['thumbnail'];
                            ?>
                            <div class="pxl-item--content">
                                <div class="pxl-item--image el-parallax-wrap">
                                    <?php if (!empty($link['url'])): ?>
                                        <a class="el-parallax-item" <?php echo implode(' ', [$link_attributes]); ?>>
                                    <?php endif; ?>
                                    <?php echo wp_kses_post($thumbnail); ?>
                                    <?php if (!empty($link['url'])): ?>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($link['url'])): ?>
                                        <a class="el-parallax-item item-link" <?php echo implode(' ', [$link_attributes]); ?>></a>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($social)): ?>
                                <div class="pxl-icon-share">
                                    <?php $team_social = json_decode($social, true); ?>
                                    <?php if ($team_social): ?>
                                        <div class="pxl-item--social">
                                            <?php foreach ($team_social as $social_item): ?>
                                                <a href="<?php echo esc_url($social_item['url']); ?>" target="_blank">
                                                    <i class="<?php echo esc_attr($social_item['icon']); ?>"></i>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                     <div class="pxl-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
                                            <path d="M20.2657 17.7585C19.0461 17.7585 17.9473 18.2852 17.1847 19.123L10.3253 14.8746C10.5084 14.4058 10.61 13.8966 10.61 13.3639C10.61 12.831 10.5084 12.3218 10.3253 11.8532L17.1847 7.60464C17.9473 8.44243 19.0461 8.9693 20.2657 8.9693C22.5631 8.9693 24.4321 7.1003 24.4321 4.80288C24.4321 2.50547 22.5631 0.636658 20.2657 0.636658C17.9683 0.636658 16.0993 2.50566 16.0993 4.80308C16.0993 5.33577 16.2011 5.84497 16.384 6.31378L9.52478 10.5621C8.76215 9.72436 7.66335 9.19749 6.44376 9.19749C4.14635 9.19749 2.27734 11.0667 2.27734 13.3639C2.27734 15.6613 4.14635 17.5303 6.44376 17.5303C7.66335 17.5303 8.76215 17.0036 9.52478 16.1657L16.384 20.414C16.2011 20.8828 16.0993 21.392 16.0993 21.9249C16.0993 24.2221 17.9683 26.0912 20.2657 26.0912C22.5631 26.0912 24.4321 24.2221 24.4321 21.9249C24.4321 19.6275 22.5631 17.7585 20.2657 17.7585ZM17.6186 4.80308C17.6186 3.34345 18.8061 2.1559 20.2657 2.1559C21.7254 2.1559 22.9129 3.34345 22.9129 4.80308C22.9129 6.2627 21.7254 7.45025 20.2657 7.45025C18.8061 7.45025 17.6186 6.2627 17.6186 4.80308ZM6.44376 16.0111C4.98394 16.0111 3.79639 14.8235 3.79639 13.3639C3.79639 11.9043 4.98394 10.7167 6.44376 10.7167C7.90339 10.7167 9.09074 11.9043 9.09074 13.3639C9.09074 14.8235 7.90339 16.0111 6.44376 16.0111ZM17.6186 21.9247C17.6186 20.4651 18.8061 19.2776 20.2657 19.2776C21.7254 19.2776 22.9129 20.4651 22.9129 21.9247C22.9129 23.3844 21.7254 24.5719 20.2657 24.5719C18.8061 24.5719 17.6186 23.3844 17.6186 21.9247Z" fill="white"/>
                                        </svg>
                                    </div>
                                </div>
                            <?php endif; ?>        
                            </div>
                        <?php endif; ?>
                        <div class="pxl-item--meta">
                            <?php if (!empty($title)): ?>
                                <h4 class="pxl-item--title el-empty">
                                    <?php if (!empty($link['url'])): ?>
                                        <a <?php echo implode(' ', [$link_attributes]); ?>>
                                    <?php endif; ?>
                                    
                                    <?php echo pxl_print_html($title); ?>
                                    
                                    <?php if (!empty($link['url'])): ?>
                                        </a>
                                    <?php endif; ?>
                                </h4>
                            <?php endif; ?>
                            
                            <?php if (!empty($position)): ?>
                                <div class="pxl-item--position el-empty">
                                    <?php echo pxl_print_html($position); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            
        </div>
    </div>
<?php endif; ?>