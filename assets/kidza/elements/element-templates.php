<?php 
 
if(!function_exists('kidza_get_post_grid')){
    function kidza_get_post_grid($posts = [], $settings = []){ 
        if (empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)) {
            return false;
        }
        switch ($settings['layout']) {
            case 'post-1':
                kidza_get_post_grid_layout1($posts, $settings);
                break;
            
            case 'portfolio-1':
                kidza_get_portfolio_grid_layout1($posts, $settings);
                break;

            case 'portfolio-2':
                kidza_get_portfolio_grid_layout2($posts, $settings);
                break;

            case 'service-1':
                kidza_get_service_grid_layout1($posts, $settings);
                break;

        default:
        return false;
        break;
        }
    }
}

// Start Post Grid
//--------------------------------------------------
function kidza_get_post_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : 'full';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == '5') {
                    $col_xl_m = '20-pxl';
                } elseif($grid_masonry[$key]['col_xl_m'] == 'col-40') {
                    $col_xl_m = '40-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == '5') {
                    $col_lg_m = '20-pxl';
                } elseif($grid_masonry[$key]['col_lg_m'] == 'col-40') {
                    $col_lg_m = '40-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            }
            $post_author = get_user_by('id', $post->post_author); ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                        <div class="pxl-item--featured">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                        </div>
                    <?php endif; ?>
                    <div class="pxl-item--holder">
                            <?php if($show_category == 'true'): ?>
                                 <div class="item--category"><?php the_category(', ', '', $post->ID); ?></div>
                            <?php endif; ?>
                        <h4 class="pxl-item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a></h4>
                        <?php if($show_excerpt == 'true'): ?>
                        <div class="post-excerpt">
                            <?php echo get_the_excerpt($post->ID); ?>
                        </div>
                        <div class="pxl-info">
                            <div class="pxl-author">
                                 <?php if($post_author) : ?>
                                 <div class="pxl-item-author">
                                     <span><i class ="far fa-user"></i></span>
                                    <?php the_author_posts_link(); ?>
                                 </div>
                                 <?php endif; ?>
                            </div>
                            <div class="pxl-date">
                                <?php if($show_date == 'true'): ?>
                                    <i class="flaticon flaticon-calendar"></i>
                                    <div class="pxl-day">
                                        <?php echo esc_html__(' ', 'kidza'); ?><?php echo get_the_date('j', $post->ID); ?>       
                                    </div>
                                    <div class="pxl-month">
                                        <?php echo get_the_date('M'); ?>      
                                    </div>
                                    <div class="pxl-year">
                                        <?php echo get_the_date('Y'); ?>      
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif?>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
    endif;
}



// End Post Grid
//--------------------------------------------------

// Start Portfolio Grid
//--------------------------------------------------
function kidza_get_portfolio_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '857x873';
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $show_excerpt = $settings['show_excerpt'] ?? 'false';
            $portfolio_excerpt = get_post_meta($post->ID, 'portfolio_excerpt', true);
            $portfolio_time = get_post_meta($post->ID, 'portfolio_time', true);
            $portfolio_icon_type = get_post_meta($post->ID, 'portfolio_icon_type', true);
            $portfolio_icon_font = get_post_meta($post->ID, 'portfolio_icon_font', true);
            $portfolio_icon_img = get_post_meta($post->ID, 'portfolio_icon_img', true);
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == '5') {
                    $col_xl_m = '20-pxl';
                } elseif($grid_masonry[$key]['col_xl_m'] == 'col-40') {
                    $col_xl_m = '40-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == '5') {
                    $col_lg_m = '20-pxl';
                } elseif($grid_masonry[$key]['col_lg_m'] == 'col-40') {
                    $col_lg_m = '40-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
                
            } 
            
            if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                            <div class="pxl-item--featured">
                                <a class="pxl-link-featured" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                    <?php echo wp_kses_post($thumbnail); ?>
                                </a>
                            </div>
                            <div class="pxl-item--holder">
                                     <div class="pxl-time"><?php echo wp_trim_words( $portfolio_time, $num_words, $more = null ); ?></div>
                                    <h4 class="pxl-item--title "><?php echo esc_html(get_the_title($post->ID)); ?></h4>
                                    <?php if($show_excerpt == 'true' && !empty($portfolio_excerpt)): ?>
                                        <div class="pxl-item--content">
                                            <?php echo wp_trim_words( $portfolio_excerpt, $num_words, $more = null ); ?>
                                        </div>
                                    <?php endif; ?>
                                    <a class="pxl-item-link" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"></a>            
                            </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php
        endforeach;
    endif;
}
function kidza_get_portfolio_grid_layout2($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '857x873';
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == '5') {
                    $col_xl_m = '20-pxl';
                } elseif($grid_masonry[$key]['col_xl_m'] == 'col-40') {
                    $col_xl_m = '40-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == '5') {
                    $col_lg_m = '20-pxl';
                } elseif($grid_masonry[$key]['col_lg_m'] == 'col-40') {
                    $col_lg_m = '40-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
                
            } 
            
            if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                        <div class="pxl-item--featured">
                            <a class="pxl-link-featured" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php
        endforeach;
    endif;
}
// End Portfolio Grid
//--------------------------------------------------

// Start Service Grid
//--------------------------------------------------
function kidza_get_service_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '1200x869';
    $pxl_g_id = uniqid();
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $show_excerpt = $settings['show_excerpt'] ?? 'false';
            $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
            $location_service = get_post_meta($post->ID, 'location_service', true);
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == '5') {
                    $col_xl_m = '20-pxl';
                } elseif($grid_masonry[$key]['col_xl_m'] == 'col-40') {
                    $col_xl_m = '40-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == '5') {
                    $col_lg_m = '20-pxl';
                } elseif($grid_masonry[$key]['col_lg_m'] == 'col-40') {
                    $col_lg_m = '40-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            } 
            
            if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                        
                        <div class="pxl-effect--direction hover-rotate3d-direction">
                            <div class="pxl-item--holder">
                                <div class="pxl-thumnail">
                                    <?php echo wp_kses_post($thumbnail); ?>
                                    <a class="pxl-item-link" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                    </a>
                                    <div class="pxl-date">
                                        <?php if($show_date == 'true'): ?>
                                            <i class="flaticon flaticon-calendar"></i>
                                            <div class="pxl-month">
                                                <?php echo get_the_date('M'); ?>      
                                            </div>
                                            <div class="pxl-day">
                                                <?php echo esc_html__(' ', 'kidza'); ?><?php echo get_the_date('j', $post->ID); ?>
                                        ,       
                                            </div>                                           
                                            <div class="pxl-year">
                                                <?php echo get_the_date('Y'); ?>      
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="pxl-content">
                                    
                                    <div class="pxl-location">
                                    <span class="pxl-item--icon">
                                    <?php 
                                     if ($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                                            <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                                        <?php 
                                        elseif ($service_icon_type == 'image' && !empty($service_icon_img)) :
                                            $icon_img = pxl_get_image_by_size([
                                                'attach_id'  => $service_icon_img['id'],
                                                'thumb_size' => 'full',
                                            ]);
                                            if (!empty($icon_img['thumbnail'])) :
                                             echo wp_kses_post($icon_img['thumbnail']);
                                            endif;
                                        endif;
                                    ?>
                                    </span>
                                    <span class="pxl-text--location"><?php echo esc_html__($location_service)?></span>
                                </div>   
                                <h4 class="pxl-item--title "><?php echo esc_html(get_the_title($post->ID)); ?></h4>
                                <a class="pxl-item-link" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"></a>
                                <?php if($show_excerpt == 'true' && !empty($service_excerpt)): ?>
                                        <div class="pxl-item--content">
                                            <?php echo wp_trim_words( $service_excerpt, $num_words, $more = null ); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="pxl-button">
                                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                            <h5 class="pxl-text--btn"><?php if(!empty($button_text)) {
                                                echo esc_attr($button_text);
                                            } else {
                                                echo esc_html__('Get Ticket', 'kidza');
                                            } ?></h5>
                                            <span class="pxl-icon"><i class="flaticon flaticon-arrow-right"></i></span>
                                        </a>
                                        <div class="pxl-review">
                                            <div class="pxl-total-comment">
                                            ( <span> <?php echo get_comments_number( $post->ID ); ?> </span>
                                            <span> <?php echo esc_html__( 'Review', 'kidza' ); ?> </span> )
                                            </div>
                                            <div class="pxl-average-rate">
                                                <?php echo display_average_stars( $post->ID ); ?> 
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php
        endforeach;
    endif;
}

// End Service Grid
//-------------------------------------------------

add_action( 'wp_ajax_kidza_load_more_product_grid', 'kidza_load_more_product_grid' );
add_action( 'wp_ajax_nopriv_kidza_load_more_product_grid', 'kidza_load_more_product_grid' );
function kidza_load_more_product_grid(){
    try{
        if(!isset($_POST['settings'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'kidza'));
        }
        $settings = $_POST['settings'];
        set_query_var('paged', $settings['paged']);
        $query_type         = isset($settings['query_type']) ? $settings['query_type'] : 'recent_product';
        $post_per_page      = isset($settings['limit']) ? $settings['limit'] : 8;
        $product_ids        = isset($settings['product_ids']) ? $settings['product_ids'] : '';
        $categories         = isset($settings['categories']) ? $settings['categories'] : '';
        $param_args         = isset($settings['param_args']) ? $settings['param_args'] : [];

        $col_xxl = isset($settings['col_xxl']) ? 'col-xxl-'.str_replace('.', '',12 / floatval($settings['col_xxl'])) : '';
        $col_xl = isset($settings['col_xl']) ? 'col-xl-'.str_replace('.', '',12 / floatval( $settings['col_xl'])) : '';
        $col_lg = isset($settings['col_lg']) ? 'col-lg-'.str_replace('.', '',12 / floatval( $settings['col_lg'])) : '';
        $col_md = isset($settings['col_md']) ? 'col-md-'.str_replace('.', '',12 / floatval( $settings['col_md'])) : '';
        $col_sm = isset($settings['col_sm']) ? 'col-sm-'.str_replace('.', '',12 / floatval( $settings['col_sm'])) : ''; 
        $col_xs = isset($settings['col_xs']) ? 'col-'.str_replace('.', '',12 / floatval( $settings['col_xs'])) : ''; 
 
        $item_class = trim(implode(' ', ['pxl-grid-item', $col_xxl, $col_xl, $col_lg, $col_md, $col_sm, $col_xs]));
          
        $loop = kidza_woocommerce_query($query_type,$post_per_page,$product_ids,$categories,$param_args);
        extract($loop);
        
        $data_animation = []; 
        $animate_cls = '';
        $data_settings = '';
        if ( !empty( $settings['item_animation'] ) ) {
            $animate_cls = ' pxl-animate pxl-invisible animated-'.$settings['item_animation_duration'];
            $data_animation['animation'] = $settings['item_animation'];
            $data_animation['animation_delay'] = $settings['item_animation_delay'];
        }
        if($posts->have_posts()){
            ob_start();
                $d = 0;
                while ($posts->have_posts()) {
                    $posts->the_post();
                    global $product;
                    $d++;
                    $term_list = array();
                    $term_of_post = wp_get_post_terms($product->get_ID(), 'product_cat');
                    foreach ($term_of_post as $term) {
                        $term_list[] = $term->slug;
                    }
                    $filter_class = implode(' ', $term_list);

                    if ( !empty( $data_animation ) ) { 
                        $data_animation['animation_delay'] = ((float)$settings['item_animation_delay'] * $d);
                        $data_animations = json_encode($data_animation);
                        $data_settings = 'data-settings="'.esc_attr($data_animations).'"';
                    }
                     
                    ?>
                    <div class="<?php echo trim(implode(' ', [$item_class, $filter_class, $animate_cls])); ?>" <?php pxl_print_html($data_settings); ?>>
                        <?php
                            do_action( 'woocommerce_before_shop_loop_item' );
                            do_action( 'woocommerce_before_shop_loop_item_title' );
                            do_action( 'woocommerce_shop_loop_item_title' );
                            do_action( 'woocommerce_after_shop_loop_item_title' );
                            do_action( 'woocommerce_after_shop_loop_item' );
                        ?>
                    </div>
                <?php 
                }
                if($settings['layout_mode'] == 'masonry')
                    echo '<div class="grid-sizer '.$item_class.'"></div>';
            $html = ob_get_clean();
            wp_send_json(
                array(
                    'status' => true,
                    'message' => esc_html__('Load Post Grid Successfully!', 'kidza'),
                    'data' => array(
                        'html'  => $html,
                        'paged' => $settings['paged'],
                        'posts' => $posts,
                        'max' => $max,
                    ),
                )
            );
        }else{
            wp_send_json(
                array(
                    'status' => false,
                    'message' => esc_html__('Load Post Grid No More!', 'kidza')
                )
            );
        } 
    }
    catch (Exception $e){
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}

add_action( 'wp_ajax_kidza_get_pagination_html', 'kidza_get_pagination_html' );
add_action( 'wp_ajax_nopriv_kidza_get_pagination_html', 'kidza_get_pagination_html' );
function kidza_get_pagination_html(){
    try{
        if(!isset($_POST['query_vars'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'kidza'));
        }
        $query = new WP_Query($_POST['query_vars']);
        ob_start();
        kidza()->page->get_pagination( $query,  true );
        $html = ob_get_clean();
        wp_send_json(
            array(
                'status' => true,
                'message' => esc_attr__('Load Successfully!', 'kidza'),
                'data' => array(
                    'html' => $html,
                    'query_vars' => $_POST['query_vars'],
                    'post' => $query->have_posts()
                ),
            )
        );
    }
    catch (Exception $e){
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}

add_action( 'wp_ajax_kidza_load_more_post_grid', 'kidza_load_more_post_grid' );
add_action( 'wp_ajax_nopriv_kidza_load_more_post_grid', 'kidza_load_more_post_grid' );
function kidza_load_more_post_grid(){
    try{
        if(!isset($_POST['settings'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'kidza'));
        }
        $settings = $_POST['settings'];
        set_query_var('paged', $settings['paged']);
        extract(pxl_get_posts_of_grid($settings['post_type'], [
            'source' => isset($settings['source'])?$settings['source']:'',
            'orderby' => isset($settings['orderby'])?$settings['orderby']:'date',
            'order' => isset($settings['order'])?$settings['order']:'desc',
            'limit' => isset($settings['limit'])?$settings['limit']:'6',
            'post_ids' => isset($settings['post_ids'])?$settings['post_ids']:[],
        ]));
        ob_start();
         
        kidza_get_post_grid($posts, $settings);
        $html = ob_get_clean();
        wp_send_json(
            array(
                'status' => true,
                'message' => esc_attr__('Load Successfully!', 'kidza'),
                'data' => array(
                    'html' => $html,
                    'paged' => $settings['paged'],
                    'posts' => $posts,
                    'settings'=>$settings,
                    'max' => $max,
                ),
            )
        );
    }
    catch (Exception $e){
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}

add_action( 'wp_ajax_kidza_get_filter_html', 'kidza_get_filter_html' );
add_action( 'wp_ajax_nopriv_kidza_get_filter_html', 'kidza_get_filter_html' );
function kidza_get_filter_html(){
    try{
        if(!isset($_POST['settings'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'kidza'));
        }
        $settings = $_POST['settings'];
        $loadmore_filter = $_POST['loadmore_filter'];
        if($loadmore_filter == '1'){
            set_query_var('paged', 1);
            $limit = isset($settings['limit'])?$settings['limit']:'6';
            $limitx = (int)$limit * (int)$settings['paged'];
        }else{
            set_query_var('paged', $settings['paged']);
            $limitx = isset($settings['limit'])?$settings['limit']:'6';
        }
        extract(pxl_get_posts_of_grid($settings['post_type'], [
                'source' => isset($settings['source'])?$settings['source']:'',
                'orderby' => isset($settings['orderby'])?$settings['orderby']:'date',
                'order' => isset($settings['order'])?$settings['order']:'desc',
                'limit' => $limitx,
                'post_ids' => isset($settings['post_ids'])?$settings['post_ids']: [],
            ],
            $settings['tax']
        ));
        ob_start(); ?>
        
        <span class="filter-item active" data-filter="*">
            <?php echo esc_html($settings['filter_default_title']); ?>
            <?php if($settings['show_cat_count'] == '1'): ?>
                <span class="filter-item-count"><?php echo count($posts); ?></span> 
            <?php endif; ?>
        </span>
        <?php foreach ($categories as $category):
            $category_arr = explode('|', $category);
            $term = get_term_by('slug',$category_arr[0], $category_arr[1]);
            $tax_count = 0;
            foreach ($posts as $key => $post){
                $this_terms = get_the_terms( $post->ID,  $settings['tax'][0] );
                $term_list = [];
                foreach ($this_terms as $t) {
                    $term_list[] = $t->slug;
                } 
                if(in_array($term->slug,$term_list))
                    $tax_count++;
            } 
            if($tax_count > 0): ?>
                <span class="filter-item" data-filter="<?php echo esc_attr('.' . $term->slug); ?>">
                    <?php echo esc_html($term->name); ?>
                    <?php if($settings['show_cat_count'] == '1'): ?>
                        <span class="filter-item-count"><?php echo esc_html($tax_count); ?></span> 
                    <?php endif; ?>
                </span>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php $html = ob_get_clean();
        wp_send_json(
            array(
                'status' => true,
                'message' => esc_attr__('Load Successfully!', 'kidza'),
                'data' => array(
                    'html' => $html,
                    'paged' => $settings['paged'],
                    'posts' => $posts,
                    'max' => $max,
                ),
            )
        );
    }
    catch (Exception $e){
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}


/* User Login/Register */
function kidza_user_form() {
    if(function_exists('up_get_template_part') && !is_user_logged_in()) : ?>
        <div class="pxl-modal pxl-user-popup">
            <div class="pxl-modal-close"><i class="pxl-icon-close"></i></div>
            <div class="pxl-modal-content">
                <div class="pxl-user pxl-user-register u-close">
                    <div class="pxl-user-content">
                        <h3 class="pxl-user-heading"><?php echo esc_html__('Create your account', 'kidza'); ?></h3>
                        <?php echo do_shortcode('[case-user-form form_type="register"]'); ?>
                        <div class="pxl-user-footer">
                            <a href="javascript:void(0)" class="btn-sign-in"> <?php esc_html_e('Sign In', 'kidza');?></a>
                        </div>
                    </div>
                </div>
                <div class="pxl-user pxl-user-login">
                    <div class="pxl-user-content">
                        <h3 class="pxl-user-heading"><?php echo esc_html__('Log in to Your Account', 'kidza'); ?></h3>
                        <?php echo do_shortcode('[case-user-form form_type="login" is_logged="profile"]'); ?>  
                        <div class="pxl-user-footer">
                            <a href="javascript:void(0)" class="btn-sign-up"> <?php esc_html_e('Sign Up', 'kidza');?></a>
                        </div>
                        <?php if(class_exists('Woocommerce')) : 
                            $my_ac = get_option( 'woocommerce_myaccount_page_id' ); 
                            $lost_password = get_option( 'woocommerce_myaccount_lost_password_endpoint' );
                            ?>
                            <div class="pxl-user-forgot-pass"><a href="<?php echo esc_url(get_permalink($my_ac)); ?><?php echo esc_html($lost_password); ?>"><?php esc_html_e('Forgot your password?', 'kidza');?></a></div>
                        <?php endif; ?>
                    </div>
                </div> 
            </div>
        </div>
    <?php endif;
}