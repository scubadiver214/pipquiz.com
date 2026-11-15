<?php
$html_id = pxl_get_element_id($settings);
$link_attr = kidza_render_link_attributes($settings['link']);
?>
<div id="pxl-<?php echo esc_attr($html_id) ?>" class="pxl-button <?php echo esc_attr($settings['pxl_animate']); ?> <?php echo esc_attr($settings['style_btn']); ?> " data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <a <?php pxl_print_html($link_attr); ?> class="btn <?php if(!empty($settings['btn_icon'])) { echo 'pxl-icon-active'; } ?> <?php echo esc_attr($settings['btn_style'].' '.$settings['pxl_animate'].' pxl-icon--'.$settings['icon_align'] ); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        
        <?php if(!empty($settings['btn_icon'])) { \Elementor\Icons_Manager::render_icon( $settings['btn_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); } ?>
        <?php if($settings['btn_style'] == 'btn-gsap') { ?>
            <span class="button-spotlight"></span>
        <?php } ?>
        <?php if($settings['btn_style'] == 'btn-nanuk') : ?>
        <div class="pxl--btn-text" data-text="<?php echo esc_attr($settings['text']); ?>">
            <?php if($settings['btn_style'] == 'btn-nanuk' || $settings['btn_style'] == 'btn-nina') {
                $chars = str_split($settings['text']);
                foreach ($chars as $value) {
                    if($value == ' ') {
                        echo '<span class="spacer">&nbsp;</span>';
                    } else {
                        echo '<span>'.$value.'</span>';
                    }
                }
            } else {
                echo pxl_print_html($settings['text']);
            } ?>
        </div>
        <?php endif; ?>
        <?php if($settings['btn_style'] == 'btn-kid') : ?>
            <button class="pxl-kid">
                <span> <?php echo pxl_print_html($settings['text']); ?></span>
                <svg viewBox="0 0 100 50" preserveAspectRatio="none">
                    <polyline stroke="currentColor" id="wibble" fill="none" stroke-width="45" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>
                <span class="pxl-icon-kid">
                 <?php if(!empty($settings['btn_icon'])) { \Elementor\Icons_Manager::render_icon( $settings['btn_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); } ?>
                </span>
            </button>
        <?php endif; ?>     
    </a>
</div>