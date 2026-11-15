<?php
$previous_post = get_previous_post();
$next_post     = get_next_post();

if ( !empty($next_post) || !empty($previous_post) ) : ?>
    <div class="pxl-pagination1">

        <?php if ( is_a( $previous_post , 'WP_Post' ) ) : 
            $prev_thumb = get_the_post_thumbnail_url( $previous_post->ID, 'large' );
        ?>
            <div class="pxl--item item--prev" style="background-image:url('<?php echo esc_url($prev_thumb); ?>');">
                <div class="pxl-title-inner pxl-item-prev">
                    <a href="<?php echo esc_url( get_permalink( $previous_post->ID ) ); ?>">
                        <h4 class="pxl-title--service">
                            <?php echo esc_html( wp_trim_words( get_the_title( $previous_post->ID ), 2, '' ) ); ?>
                        </h4>
                        <h5 class="pxl-previous">
                            <i class="flaticon flaticon-arrow-right"></i> 
                            <?php echo esc_html( $settings['previous_title'] ?? 'Previous' ); ?>
                        </h5>
                    </a>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( is_a( $next_post , 'WP_Post' ) ) : 
            $next_thumb = get_the_post_thumbnail_url( $next_post->ID, 'large' );
        ?>
            <div class="pxl--item item--next" style="background-image:url('<?php echo esc_url($next_thumb); ?>');">
                <div class="pxl-title-inner pxl-item-next">
                    <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
                        <h4 class="pxl-title--service">
                            <?php echo esc_html( wp_trim_words( get_the_title( $next_post->ID ), 2, '' ) ); ?>
                        </h4>
                        <h5 class="pxl-next">
                            <?php echo esc_html( $settings['next_title'] ?? 'Next' ); ?>
                            <i class="flaticon flaticon-arrow-right"></i>
                        </h5>
                    </a>
                </div>
            </div>
        <?php endif; ?>

    </div>
<?php endif; ?>
