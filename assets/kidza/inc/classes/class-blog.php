<?php

if (!class_exists('kidza_Blog')) {

    class kidza_Blog
    {
        
        public function get_archive_meta() {
            $archive_date = kidza()->get_theme_opt( 'archive_date', true );
            $archive_category = kidza()->get_theme_opt( 'archive_category', true );
            if($archive_date || $archive_category) : ?>
                <div class="pxl-item--meta">
                    <h2 class="pxl-item--title">
                        <a href="<?php echo esc_url( get_permalink()); ?>" title="<?php the_title_attribute(); ?>">
                            <?php if(is_sticky()) { ?>
                            <?php } ?>
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <ul class="pxl-item-list">
                        <?php if($archive_date) : ?>
                            <li class="pxl-item--date"><?php echo get_the_date(); ?></li>
                        <?php endif; ?>
                        <?php if($archive_category) : ?>
                            <li class="pxl-item--category"><?php the_terms( get_the_ID(), 'category', '' ); ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endif; 
        }

        public function get_excerpt(){
            $archive_excerpt_length = kidza()->get_theme_opt('archive_excerpt_length', '50');
            $kidza_the_excerpt = get_the_excerpt();
            if(!empty($kidza_the_excerpt)) {
                echo wp_trim_words( $kidza_the_excerpt, $archive_excerpt_length, $more = null );
            } else {
                echo wp_kses_post($this->get_excerpt_more( $archive_excerpt_length ));
            }
        }

        public function get_excerpt_more( $post = null ) {
            $archive_excerpt_length = kidza()->get_theme_opt('archive_excerpt_length', '50');
            $post = get_post( $post );

            if ( empty( $post ) || 0 >= $archive_excerpt_length ) {
                return '';
            }

            if ( post_password_required( $post ) ) {
                return esc_html__( 'Post password required.', 'kidza' );
            }

            $content = apply_filters( 'the_content', strip_shortcodes( $post->post_content ) );
            $content = str_replace( ']]>', ']]&gt;', $content );

            $excerpt_more = apply_filters( 'kidza_excerpt_more', '&hellip;' );
            $excerpt      = wp_trim_words( $content, $archive_excerpt_length, $excerpt_more );

            return $excerpt;
        }
        
        public function get_post_metas(){
            $post_author = kidza()->get_theme_opt( 'post_author', true );
            $post_date = kidza()->get_theme_opt( 'post_date', true );
            $post_category = kidza()->get_theme_opt( 'post_category', true );
            if($post_author || $post_date || $post_category) : ?>
                <div class="pxl-item--meta">
                    <ul class="pxl-item-list">
                        <?php if($post_author) : ?>
                            <li class="pxl-item-author">
                                <?php echo esc_html__('By', 'kidza'); ?>&nbsp;<?php the_author_posts_link(); ?>
                            </li>
                        <?php endif; ?>
                        <?php if($post_date) : ?>
                            <li class="pxl-item--date"><?php echo get_the_date(); ?></li>
                        <?php endif; ?>
                        <?php if($post_category) : ?>
                            <li class="pxl-item--category"><?php the_terms( get_the_ID(), 'category', '' ); ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endif; 
        }

        public function kidza_set_post_views( $postID ) {
            $countKey = 'post_views_count';
            $count    = get_post_meta( $postID, $countKey, true );
            if ( $count == '' ) {
                $count = 0;
                delete_post_meta( $postID, $countKey );
                add_post_meta( $postID, $countKey, '0' );
            } else {
                $count ++;
                update_post_meta( $postID, $countKey, $count );
            }
        }

        public function get_tagged_in() {
            $tags_list = get_the_tag_list('', ' ');
            if ($tags_list) {
                echo '<div class="pxl--tags">';
                echo wp_kses_post($tags_list);
                echo '</div>';
            }
        }

        public function get_socials_share() { 
            $img_url = '';
            if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false)) {
                $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false);
            }
            $social_facebook = kidza()->get_theme_opt( 'social_facebook', true );
            $social_xtwitter = kidza()->get_theme_opt( 'social_xtwitter', true );
            $social_pinterest = kidza()->get_theme_opt( 'social_pinterest', true );
            $social_instagram = kidza()->get_theme_opt( 'social_instagram', true );
            ?>
            <div class="pxl--social">
               
                <?php if($social_facebook) : ?>
                    <a class="fb-social" title="<?php echo esc_attr__('Facebook', 'kidza'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="caseicon-facebook"></i></a>
                <?php endif; ?>

                <?php if($social_xtwitter) : ?>
                    <a class="x-social" title="<?php echo esc_attr__('X', 'kidza'); ?>" target="_blank" href="https://x.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-x-twitter"></i></a>
                <?php endif; ?>

                <?php if($social_pinterest) : ?>
                    <a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'kidza'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($img_url[0]); ?>&description=<?php the_title(); ?>%20"><i class="caseicon-pinterest"></i></a>
                <?php endif; ?>

                <?php if($social_instagram) : ?>
                    <a class="ig-social" title="<?php echo esc_attr__('Instagram', 'kidza'); ?>" target="_blank" href="https://www.instagram.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="caseicon-instagram"></i></a>
                <?php endif; ?>
            </div>
            <?php
        }

        public function get_socials_share_portfolio() { 
            $img_url = '';
            if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false)) {
                $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false);
            }
            ?>
            <div class="pxl--social">
                <a class="vm-social" title="<?php echo esc_attr__('Vimeo', 'kidza'); ?>" target="_blank" href="https://vimeo.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="caseicon-vimeo"></i></a>
                <a class="fb-social" title="<?php echo esc_attr__('Facebook', 'kidza'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="caseicon-facebook"></i></a>
                <a class="ig-social" title="<?php echo esc_attr__('Instagram', 'kidza'); ?>" target="_blank" href="https://www.instagram.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-x-twitter"></i></a>
                <a class="twx-social" title="<?php echo esc_attr__('X', 'kidza'); ?>" target="_blank" href="https://x.com/?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20"><i class="caseicon-twitter"></i></a>
                <a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'kidza'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($img_url[0]); ?>&description=<?php the_title(); ?>%20"><i class="caseicon-pinterest"></i></a>
                <a class="lin-social" title="<?php echo esc_attr__('LinkedIn', 'kidza'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>%20"><i class="caseicon-linkedin"></i></a>
            </div>
            <?php
        }

        public function get_post_author_info() {
            ?>
            <div class="pxl-post--author-info">
                <div class="pxl-item-top pxl-item--flexnw">
                    <div class="pxl-post--author-image pxl-mr-40"><?php echo get_avatar( get_the_author_meta( 'ID' ), 120 ); ?></div>
                    <div class="pxl-item-name">
                        <?php kidza_get_user_star(); ?>
                        <h5 class="pxl-post--author-title"><?php the_author_posts_link(); ?></h5> 
                    </div>
                </div>
                
                </div>
            </div>
        <?php }
        
        public function get_post_nav() {
            global $post;
            $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
            $next     = get_adjacent_post( false, '', false );

            if ( ! $next && ! $previous )
                return;
            ?>
            <?php
            $next_post = get_next_post();
            $previous_post = get_previous_post();

            if( !empty($next_post) || !empty($previous_post) ) { 
                ?>
                <div class="pxl-post--navigation">
                    <div class="pxl-item-dot">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="pxl--items">
                        <div class="pxl--item pxl--item-prev pxl-pr-30">
                            <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { 
                                $prev_img_id = get_post_thumbnail_id($previous_post->ID);
                                ?>
                                <div class="pxl--holder">
                                    <a href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>">
                                        <span class="pxl-icon-previous pxl-icon pxl-mr-20">
                                            <i class="fal flaticon-right"></i>
                                        </span>
                                        <span class="pxl--meta">
                                            <span class="pxl--sub"><?php echo esc_html__('Previous Post', 'kidza'); ?></span>
                                            <span class="pxl-item-title">
                                                <?php echo get_the_title( $previous_post->ID ); ?>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="pxl--item pxl--item-next">
                            <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') {
                                $next_img_id = get_post_thumbnail_id($next_post->ID);
                                ?>
                                <div class="pxl--holder">
                                    <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
                                        <span class="pxl--meta">
                                            <span class="pxl--sub"><span><?php echo esc_html__('Next Post', 'kidza'); ?></span></span>
                                            <span class="pxl-item-title">
                                                <?php echo get_the_title( $next_post->ID ); ?>
                                            </span>
                                        </span>
                                        <span class="pxl-icon-next pxl-icon pxl-ml-20">
                                            <i class="fal flaticon-right"></i>
                                        </span>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div><!-- .nav-links -->
                </div>
            <?php }
        }

        public function get_related_post() {
            $post_related = kidza()->get_theme_opt( 'post_related', false );
            $post_related_title = kidza()->get_theme_opt( 'post_related_title' );
            $post_category = kidza()->get_theme_opt( 'post_category', true );
            $post_date = kidza()->get_theme_opt( 'post_date', true );
            $data_cursor_text = esc_html__('◄ ►', 'kidza');

            if($post_related) {
                global $post;
                $current_id = $post->ID;
                $posttags = get_the_category($post->ID);
                $archive_excerpt = get_the_excerpt($post->ID);
                if (empty($posttags)) return;

                $tags = array();

                foreach ($posttags as $tag) {

                    $tags[] = $tag->term_id;
                }
                $post_number = '6';
                $query_similar = new WP_Query(array('posts_per_page' => $post_number, 'post_type' => 'post', 'post_status' => 'publish', 'category__in' => $tags));
                if (count($query_similar->posts) > 1) {
                    wp_enqueue_script( 'swiper' );
                    wp_enqueue_script( 'pxl-swiper' );
                    $opts = [
                        'slide_direction'               => 'horizontal',
                        'slide_percolumn'               => '1',
                        'slide_mode'                    => 'slide',
                        'slides_to_show'                => 2,
                        'slides_to_show_lg'             => 2,
                        'slides_to_show_md'             => 2,
                        'slides_to_show_sm'             => 2,
                        'slides_to_show_xs'             => 1,
                        'slides_to_scroll'              => 1,
                        'slides_gutter'                 => 30,
                        'arrow'                         => false,
                        'dots'                          => true,
                        'dots_style'                    => 'bullets'
                    ];
                    $data_settings = wp_json_encode($opts);
                    $dir           = is_rtl() ? 'rtl' : 'ltr';
                    ?>
                    <div class="pxl-related-post">
                        <div class="pxl-swiper-title">
                            <h3 class="item-title wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1.2s"><?php if(!empty($post_related_title)) { echo pxl_print_html($post_related_title); } else { echo pxl_print_html('Related posts', 'kidza');} ?></h3>
                        </div>
                        <div class="pxl-swiper-container pxl-mouse-wheel" data-settings="<?php echo esc_attr($data_settings) ?>" data-rtl="<?php echo esc_attr($dir) ?>">
                            <div class="pxl-related-post-inner wow fadeIn" data-wow-delay="300ms" data-wow-duration="1.2s">
                            <?php foreach ($query_similar->posts as $post):
                                $thumbnail_url = '';
                                if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) :
                                    $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'kidza-thumb-related', false);
                                endif;
                                if ($post->ID !== $current_id) : ?>
                                    <div class="pxl-swiper-slide swiper-slide grid-item">
                                        <div class="pxl-grid-item-inner">
                                            <?php if (has_post_thumbnail()) { ?>
                                                <div class="pxl-item-featured" <?php echo 'data-cursor-text="'.esc_attr($data_cursor_text).'"'; ?>>
                                                    <a class="pxl-no-cursor" href="<?php the_permalink(); ?>">
                                                        <img alt="<?php the_title(); ?>" src="<?php echo esc_url($thumbnail_url[0]); ?>" />
                                                    </a>
                                                </div>
                                            <?php } ?>
                                            <div class="pxl-item-content">
                                                <?php if($post_date) : ?>
                                                    <?php if($post_date) : ?>
                                                        <div class="item--date"><?php echo esc_html__('Posted on:  ', 'kidza'); ?><?php echo get_the_date(); ?></div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <h3 class="pxl-item-title">
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif;
                            endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php }
            }

            wp_reset_postdata();
        }

        public function get_related_portfolio() {
            $projects_related = kidza()->get_theme_opt( 'projects_related', false );

            if($projects_related) {
                global $post;
                $current_id = $post->ID;
                $posttags = get_the_category($post->ID);

                $tags = array();

                foreach ($posttags as $tag) {
                    $tags[] = $tag->term_id;
                }
                $post_number = '6';
                $query_similar = new WP_Query(array('posts_per_page' => $post_number, 'post_type' => 'portfolio', 'post_status' => 'publish', 'category__in' => $tags));
                if (count($query_similar->posts) > 1) {
                    wp_enqueue_script( 'swiper' );
                    wp_enqueue_script( 'pxl-swiper' );
                    $opts = [
                        'slide_direction'               => 'horizontal',
                        'slide_percolumn'               => '1',
                        'slide_mode'                    => 'slide',
                        'slides_to_show'                => 2,
                        'slides_to_show_lg'             => 2,
                        'slides_to_show_md'             => 2,
                        'slides_to_show_sm'             => 2,
                        'slides_to_show_xs'             => 1,
                        'slides_to_scroll'              => 1,
                        'slides_gutter'                 => 30,
                        'arrow'                         => false,
                        'dots'                          => true,
                        'dots_style'                    => 'bullets'
                    ];
                    $data_settings = wp_json_encode($opts);
                    $dir           = is_rtl() ? 'rtl' : 'ltr';
                    ?>
                    <div class="pxl-related-portfolio">
                        <div class="container">
                            <div class="row">
                                <h2 class="pxl-swiper-title"><?php echo esc_html__('Related portfolio', 'kidza'); ?></h2>
                                <div class="pxl-swiper-container pxl-mouse-wheel" data-settings="<?php echo esc_attr($data_settings) ?>" data-rtl="<?php echo esc_attr($dir) ?>">
                                    <div class="pxl-related-post-inner wow fadeIn" data-wow-delay="300ms" data-wow-duration="1.2s">
                                        <?php foreach ($query_similar->posts as $post):
                                            $thumbnail_url = '';
                                            if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) :
                                                $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'kidza-thumb-portfolio', false);
                                            endif;
                                            if ($post->ID !== $current_id) : ?>
                                                <div class="pxl-swiper-slide swiper-slide grid-item">
                                                    <div class="pxl-grid-item-inner">
                                                        <?php if (has_post_thumbnail()) { ?>
                                                            <div class="pxl-item-featured">
                                                                <a href="<?php the_permalink(); ?>">
                                                                    <img alt="<?php the_title(); ?>" src="<?php echo esc_url($thumbnail_url[0]); ?>" />
                                                                </a>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="pxl-item--front">
                                                            <h3 class="pxl-item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif;
                                        endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
            }
            wp_reset_postdata();
        }

        public function get_related_service() {
            $service_related = kidza()->get_theme_opt( 'service_related', false );

            if($service_related) {
                global $post;
                $current_id = $post->ID;
                $posttags = get_the_category($post->ID);

                $tags = array();

                foreach ($posttags as $tag) {
                    $tags[] = $tag->term_id;
                }
                $post_number = '6';
                $query_similar = new WP_Query(array('posts_per_page' => $post_number, 'post_type' => 'service', 'post_status' => 'publish', 'category__in' => $tags));
                if ($query_similar->have_posts()) {
                    wp_enqueue_script( 'swiper' );
                    wp_enqueue_script( 'pxl-swiper' );
                    $opts = [
                        'slide_direction'               => 'horizontal',
                        'slide_percolumn'               => '1',
                        'slide_mode'                    => 'slide',
                        'slides_to_show'                => 2,
                        'slides_to_show_lg'             => 2,
                        'slides_to_show_md'             => 2,
                        'slides_to_show_sm'             => 2,
                        'slides_to_show_xs'             => 1,
                        'slides_to_scroll'              => 1,
                        'slides_gutter'                 => 30,
                        'arrow'                         => false,
                        'dots'                          => true,
                        'dots_style'                    => 'bullets'
                    ];
                    $data_settings = wp_json_encode($opts);
                    $dir           = is_rtl() ? 'rtl' : 'ltr';
                    ?>
                    <div class="pxl-related-service">
                        <h2 class="pxl-swiper-title"><?php echo esc_html__('Related service', 'kidza'); ?></h2>
                        <div class="pxl-swiper-container pxl-mouse-wheel" data-settings="<?php echo esc_attr($data_settings) ?>" data-rtl="<?php echo esc_attr($dir) ?>">
                            <div class="pxl-related-post-inner wow fadeIn" data-wow-delay="300ms" data-wow-duration="1.2s">
                                <?php while ($query_similar->have_posts()) : $query_similar->the_post();

                                    $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
                                    $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
                                    $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
                                    $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                                    if ($post->ID !== $current_id) : ?>
                                        <div class="pxl-swiper-slide swiper-slide grid-item">
                                            <div class="pxl-grid-item-inner">
                                                 <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                                                    <div class="pxl-item--icon">
                                                        <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                                                    $icon_img = pxl_get_image_by_size( array(
                                                        'attach_id'  => $service_icon_img['id'],
                                                        'thumb_size' => 'full',
                                                    ));
                                                    $icon_thumbnail = $icon_img['thumbnail'];
                                                    ?>
                                                    <div class="pxl-item--icon">
                                                        <?php echo wp_kses_post($icon_thumbnail); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="pxl-item--front">
                                                    <h3 class="pxl-item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                </div>
                                                <?php if(!empty($service_excerpt)): ?>
                                                    <div class="pxl-item--content">
                                                        <?php echo wp_trim_words( $service_excerpt); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                endwhile; ?>
                            </div>
                        </div>
                    </div>
                    <?php 
                    wp_reset_postdata();
                }
            }
        }
    }
}
