<?php
$col_xs = $widget->get_setting('col_xs', 1);
$col_sm = $widget->get_setting('col_sm', 1);
$col_md = $widget->get_setting('col_md', 1);
$col_lg = $widget->get_setting('col_lg', 1);
$col_xl = $widget->get_setting('col_xl', 1);

$col_xl = ($col_xl == '5') ? 'pxl5' : 12 / intval($col_xl ?: 1);
$col_lg = 12 / intval($col_lg ?: 1);
$col_md = 12 / intval($col_md ?: 1);
$col_sm = 12 / intval($col_sm ?: 1);
$col_xs = 12 / intval($col_xs ?: 1);

$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$grid_custom_columns = $widget->get_setting('grid_masonry', []);
$msclass = is_admin() ? 'pxl-grid-masonry-adm' : 'pxl-grid-masonry';

$show_arrow = $widget->get_setting('show_arrow', '');
$pxl_g_id = uniqid();

?>

<?php if (isset($settings['image_list']) && !empty($settings['image_list']) && count($settings['image_list'])) :
    $image_size_popup = !empty($img_size_popup) ? $img_size_popup : 'full'; ?>
    <div class="pxl-grid pxl-image-grid pxl-image-grid1 wow <?php echo esc_attr($settings['pxl_animate']); ?>" 
         data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" data-layout="fitRows">
        <div class="pxl-grid-inner <?php echo esc_attr($msclass); ?> row" data-gutter="15">
            
            <?php foreach ($settings['image_list'] as $key => $value) :      
                $image = isset($value['image']) ? $value['image'] : '';
                $img_size = isset($value['img_size']) ? $value['img_size'] : '';
                $image_size = !empty($img_size) ? $img_size : '501x450';
                if (!empty($grid_custom_columns[$key])) {
                    $col_xl = 12 / intval($grid_custom_columns[$key]['col_xl_m'] ?: 1);
                    $col_lg = 12 / intval($grid_custom_columns[$key]['col_lg_m'] ?: 1);
                    $col_md = 12 / intval($grid_custom_columns[$key]['col_md_m'] ?: 1);
                    $col_sm = 12 / intval($grid_custom_columns[$key]['col_sm_m'] ?: 1);
                    $col_xs = 12 / intval($grid_custom_columns[$key]['col_xs_m'] ?: 1);
                    $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";

                    if (!empty($grid_custom_columns[$key]['img_size_m'])) {
                        $image_size = $grid_custom_columns[$key]['img_size_m'];
                    }
                }
            ?>
                <div class="<?php echo esc_attr($item_class); ?>">
                    <div class="pxl-item--inner">
                        
                        <?php if (!empty($image['id'])) :
                            $img = pxl_get_image_by_size([
                                'attach_id'  => $image['id'],
                                'thumb_size' => $image_size,
                                'class' => 'no-lazyload',
                            ]);
                            $thumbnail_popup = $img['url'];
                            $thumbnail = $img['thumbnail'];
                            
                            // Lấy URL ảnh full size cho popup
                            $image_full_url = wp_get_attachment_image_url($image['id'], $image_size_popup);
                        ?>
                            <div class="pxl-item--image">
                                <a href="<?php echo esc_url($image_full_url); ?>" class="pxl-image-popup" data-elementor-lightbox-slideshow="image-gallery-<?php echo esc_attr($widget_id ?? 'gallery'); ?>">
                                    <?php echo wp_kses_post($thumbnail); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>