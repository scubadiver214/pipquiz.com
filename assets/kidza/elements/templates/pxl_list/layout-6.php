
<?php if(isset($settings['lists6']) && !empty($settings['lists6']) && count($settings['lists6'])): ?>
    <div class="pxl-list pxl-list6 ">
        <?php foreach ($settings['lists6'] as $key => $value): 
         $title6 = isset($value['title6']) ? $value['title6'] : '';
         $des6 = isset($value['des6']) ? $value['des6'] : '';
            ?>
            <div class="pxl--item <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                <div class=" pxl-title">
                    <?php echo pxl_print_html($value['title6'])?>
                </div>
                <div class=" pxl-description">
                    <?php echo pxl_print_html($value['des6'])?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>