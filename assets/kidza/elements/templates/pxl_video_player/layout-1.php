<?php
$img_size = '';
if(!empty($settings['img_size'])) {
    $img_size = $settings['img_size'];
} else {
    $img_size = 'full';
}
$text_circle = '';
if(!empty($settings['text_circle'])) {
    $text_circle = $settings['text_circle'];
}
$text_video = '';
if(!empty($settings['text_video'])) {
    $text_video = $settings['text_video'];
}
?>
<div class="pxl-video-player pxl-video-player1 pxl-video-<?php echo esc_attr($settings['btn_video_style']); ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-video--inner">
        <?php if( $settings['image_type'] != 'none' && !empty( $settings['image']['url'] ) ) :
            $img  = pxl_get_image_by_size( array(
                'attach_id'  => $settings['image']['id'],
                'thumb_size' => $img_size,
            ) );
            $thumbnail = '';
            if (is_array($img) && isset($img['thumbnail'])) {
                $thumbnail = $img['thumbnail'];
            }
            ?>
            <div class="pxl-video--holder">
                <?php if ($settings['image_type'] == 'img') { ?>
                    <?php if ( ! empty( $thumbnail ) ) { echo wp_kses_post($thumbnail); } ?>
                <?php } else { ?>
                    <div class="pxl-video--imagebg bg-image" style="background-image: url(<?php echo esc_url($settings['image']['url']); ?>);"></div>
                   
                <?php } ?>
                <div class="pxl-gardiend"></div>
            </div>
        <?php endif; ?>
       
        <?php if(!empty($settings['video_link'])) : ?>
            <div class="btn-video-wrap <?php echo esc_attr($settings['btn_video_position']); ?>">
                <a class="btn-video <?php echo esc_attr($settings['btn_video_style']); ?>" href="<?php echo esc_url($settings['video_link']); ?>">
                    <?php if ( !empty($settings['video_icon']['value']) ) { ?>
                        <?php \Elementor\Icons_Manager::render_icon( $settings['video_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                    <?php } else { ?>
                        <i class="caseicon-play1"></i>
                    <?php } ?>
                        <span class="pxl-btn--text circle-type"><?php pxl_print_html($text_circle); ?></span>
                       
                </a>
                <span class="pxl-text-video"><?php pxl_print_html($text_video); ?></span>
                <?php if($settings['btn_video_style'] == 'style2' && !empty($settings['btn_text']) || $settings['btn_video_style'] == 'style3' && !empty($settings['btn_text'])) : ?>
                    <span class="btn-video-text pxl-label pxl-ml-20"><?php echo esc_html($settings['btn_text']); ?></span>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>