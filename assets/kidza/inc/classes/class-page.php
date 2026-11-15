<?php

if (!class_exists('kidza_Page')) {

    class kidza_Page
    {
        public function get_site_loader(){

            $site_loader = kidza()->get_theme_opt( 'site_loader', false );
            $loader_style = kidza()->get_theme_opt( 'loader_style', 'style-digital' );
            $gradient_color = kidza()->get_theme_opt( 'gradient_color' );
            $loader_text = kidza()->get_theme_opt( 'loader_text' );
            $loader_text_shadow = kidza()->get_theme_opt( 'loader_text_shadow' );
            $loader_text_color = kidza()->get_theme_opt( 'loader_text_color' );
            $image_loader = kidza()->get_theme_opt( 'image_loader' );
            $loading_text_page = kidza()->get_page_opt( 'loading_text', '' );
            $loading_page = kidza()->get_page_opt( 'loading_page', '-1');
            if($loading_page == 'bd') {
                $loader_style = $loading_type_page;
            }
            
            if($site_loader) { ?>
                <div id="pxl-loadding" class="pxl-loader <?php if($gradient_color['from'] != $gradient_color['to']) { echo 'pxl-loader-gradient '; } ?> <?php echo esc_attr($loader_style); ?>">
                    <div class="pxl-loader-effect">
                        <?php switch ($loader_style) {
                            case 'style-business': ?>
                                <?php break;

                            case 'style-image': 
                            if (!empty($image_loader['url'])) : ?>
                                <div class="bg-image">
                                    <div class="loading-image">
                                        <?php 
                                            printf(
                                                '<img src="%1$s" alt="%2$s" />',
                                                esc_url($image_loader['url']),
                                                esc_attr(get_bloginfo('name'))
                                            );
                                        ?>
                                    </div>
                                </div>
                            <?php 
                            endif;
                            break;
                            //start pen
                            case 'loader-pen': ?>
                                <div class="loader-pen">
                                    <svg
                                        class="pencil"
                                        viewBox="0 0 200 200"
                                        width="200px"
                                        height="200px"
                                        xmlns="http://www.w3.org/2000/svg"
                                        >
                                        <defs>
                                            <clipPath id="pencil-eraser">
                                            <rect rx="5" ry="5" width="30" height="30"></rect>
                                            </clipPath>
                                        </defs>
                                        <circle
                                            class="pencil__stroke"
                                            r="70"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-dasharray="439.82 439.82"
                                            stroke-dashoffset="439.82"
                                            stroke-linecap="round"
                                            transform="rotate(-113,100,100)"
                                        ></circle>
                                        <g class="pencil__rotate" transform="translate(100,100)">
                                            <g fill="none">
                                            <circle
                                                class="pencil__body1"
                                                r="64"
                                                stroke="#6754E9"
                                                stroke-width="30"
                                                stroke-dasharray="402.12 402.12"
                                                stroke-dashoffset="402"
                                                transform="rotate(-90)"
                                            ></circle>
                                            <circle
                                                class="pencil__body2"
                                                r="74"
                                                stroke="#F15F25"
                                                stroke-width="10"
                                                stroke-dasharray="464.96 464.96"
                                                stroke-dashoffset="465"
                                                transform="rotate(-90)"
                                            ></circle>
                                            <circle
                                                class="pencil__body3"
                                                r="54"
                                                stroke="#0D0643"
                                                stroke-width="10"
                                                stroke-dasharray="339.29 339.29"
                                                stroke-dashoffset="339"
                                                transform="rotate(-90)"
                                            ></circle>
                                            </g>
                                            <g class="pencil__eraser" transform="rotate(-90) translate(49,0)">
                                            <g class="pencil__eraser-skew">
                                                <rect
                                                fill="hsla(0, 0%, 100%, 90%)"
                                                rx="5"
                                                ry="5"
                                                width="30"
                                                height="30"
                                                ></rect>
                                                <rect
                                                fill="hsl(0, 0%, 100%, 85%)"
                                                width="5"
                                                height="30"
                                                clip-path="url(#pencil-eraser)"
                                                ></rect>
                                                <rect fill="hsl(0, 0%, 100%, 80%)" width="30" height="20"></rect>
                                                <rect fill="hsl(0, 0%, 100%, 75%)" width="15" height="20"></rect>
                                                <rect fill="hsl(0, 0%, 100%, 85%)" width="5" height="20"></rect>
                                                <rect fill="hsla(0, 0%, 100%, 0.2)" y="6" width="30" height="2"></rect>
                                                <rect
                                                fill="hsla(0, 0%, 100%, 0.2)"
                                                y="13"
                                                width="30"
                                                height="2"
                                                ></rect>
                                            </g>
                                            </g>
                                            <g class="pencil__point" transform="rotate(-90) translate(49,-30)">
                                            <polygon fill="hsl(33,90%,70%)" points="15 0,30 30,0 30"></polygon>
                                            <polygon fill="hsl(33,90%,50%)" points="15 0,6 30,0 30"></polygon>
                                            <polygon fill="hsl(223,10%,10%)" points="15 0,20 10,10 10"></polygon>
                                            </g>
                                        </g>
                                        </svg>
                                </div> 
                            <?php break;
                            // end pen 
                            case 'loader-base': ?>
                                <div class="loader-base"></div> 
                            <?php break;

                            case 'loader-text-shadow': ?>
                                <div class="pxl-loading-text-shadow">
                                    <span><?php echo !empty($loader_text_shadow) ? esc_html($loader_text_shadow) : esc_html__('Loading', 'kidza'); ?></span>
                                </div>
                            <?php break;

                            case 'style-law': ?>
                                <div class="pxl-loader-holder type-color-<?php echo esc_attr($loader_text_color); ?>">
                                    <div class="pxl-loader-text" id="pxl-tex-animation"><?php if(!empty($loader_text)) { echo esc_attr($loader_text); } else { echo esc_html__('A', 'kidza'); } ?></div>
                                </div>
                                <?php break;
                        } ?>
                    </div>
                    <?php if($loader_style == 'style-digital') : ?>
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                            <defs>
                                <filter id="pxl-svg-digital">
                                    <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="pxl-svg-digital" />
                                    <feBlend in="SourceGraphic" in2="pxl-svg-digital" />
                                </filter>
                            </defs>
                        </svg>
                    <?php endif; ?>
                </div>
            <?php }
        }

        public function get_link_pages() {
            wp_link_pages( array(
                'before'      => '<div class="page-links">',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ) ); 
        }

        public function get_page_title(){
            $titles = $this->get_title();
            $pt_mode = kidza()->get_opt('pt_mode');
            if( $pt_mode == 'none' ) return;
            $ptitle_layout = (int)kidza()->get_opt('ptitle_layout');
            if ($pt_mode == 'bd' && $ptitle_layout > 0 && class_exists('Pxltheme_Core') && is_callable( 'Elementor\Plugin::instance' )) {
                ?>
                <div id="pxl-page-title-elementor">
                    <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $ptitle_layout);?>
                </div>
                <?php 
            } else {
                $ptitle_breadcrumb_on = kidza()->get_opt( 'ptitle_breadcrumb_on', '1' ); 
                wp_enqueue_script('stellar-parallax'); ?>
                <div id="pxl-page-title-default" class="pxl--parallax" data-stellar-background-ratio="0.5">
                    <div class="container">
                        <div class="row">
                            <h1 class="pxl-page-title"><?php echo kidza_html($titles['title']) ?></h1>
                            <span class="pxl-de-separator"></span>
                            <?php if($ptitle_breadcrumb_on == '1') : ?>
                                <?php $this->get_breadcrumb(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php } 
        } 

        public function get_title() {
            $title = '';
            // Default titles
            if ( ! is_archive() ) {
                // Posts page view
                if ( is_home() ) {
                    // Only available if posts page is set.
                    if ( ! is_front_page() && $page_for_posts = get_option( 'page_for_posts' ) ) {
                        $title = get_post_meta( $page_for_posts, 'custom_title', true );
                        if ( empty( $title ) ) {
                            $title = get_the_title( $page_for_posts );
                        }
                    }
                    if ( is_front_page() ) {
                        $title = esc_html__( 'Blog', 'kidza' );
                    }
                } // Single page view
                elseif ( is_page() ) {
                    $title = get_post_meta( get_the_ID(), 'custom_title', true );
                    if ( ! $title ) {
                        $title = get_the_title();
                    }
                } elseif ( is_404() ) {
                    $title = esc_html__( '404 Error', 'kidza' );
                } elseif ( is_search() ) {
                    $title = esc_html__( 'Search results', 'kidza' );
                } elseif ( is_singular('lp_course') ) {
                    $title = esc_html__( 'Course', 'kidza' );
                } else {
                    $title = get_post_meta( get_the_ID(), 'custom_title', true );
                    if ( ! $title ) {
                        $title = get_the_title();
                    }
                }
            } else {
                $title = get_the_archive_title();
                if( (class_exists( 'WooCommerce' ) && is_shop()) ) {
                    $title = get_post_meta( wc_get_page_id('shop'), 'custom_title', true );
                    if(!$title) {
                        $title = get_the_title( get_option( 'woocommerce_shop_page_id' ) );
                    }
                }
            }

            return array(
                'title' => $title,
            );
        }

        public function get_breadcrumb(){

            if ( ! class_exists( 'CASE_Breadcrumb' ) )
            {
                return;
            }

            $breadcrumb = new CASE_Breadcrumb();
            $entries = $breadcrumb->get_entries();

            if ( empty( $entries ) )
            {
                return;
            }

            ob_start();

            foreach ( $entries as $entry )
            {
                $entry = wp_parse_args( $entry, array(
                    'label' => '',
                    'url'   => ''
                ) );

                $entry_label = $entry['label'];

                if(!empty($_GET['blog_title'])) {
                    $blog_title = $_GET['blog_title'];
                    $custom_title = explode('_', $blog_title);
                    foreach ($custom_title as $index => $value) {
                        $arr_str_b[$index] = $value;
                    }
                    $str = implode(' ', $arr_str_b);
                    $entry_label = $str;
                }

                if ( empty( $entry_label ) )
                {
                    continue;
                }

                echo '<li>';

                $pxl_post_title = kidza()->get_opt( 'pxl_post_title', 'default' );
                $pxl_post_title_text = kidza()->get_opt( 'pxl_post_title_text' );

                if ( ! empty( $entry['url'] ) )
                {
                    printf(
                        '<a class="breadcrumb-entry" href="%1$s">%2$s</a>',
                        esc_url( $entry['url'] ),
                        esc_attr( $entry_label )
                    );
                }
                elseif( is_singular('post') && $pxl_post_title == 'custom' && !empty($pxl_post_title_text) ) {
                    printf( '<span class="breadcrumb-entry" >'.$pxl_post_title_text.'</span>', esc_html( $entry_label ) );
                }
                else
                {
                    printf( '<span class="breadcrumb-entry" >%s</span>', esc_html( $entry_label ) );
                }

                echo '</li>';
            }

            $output = ob_get_clean();

            if ( $output )
            {
                printf( '<ul class="pxl-breadcrumb">%s</ul>', wp_kses_post($output));
            }
        }

        public function get_pagination( $query = null, $ajax = false ){

            if($ajax){
                add_filter('paginate_links', 'kidza_ajax_paginate_links');
            }

            $classes = array();

            if ( empty( $query ) )
            {
                $query = $GLOBALS['wp_query'];
            }

            if ( empty( $query->max_num_pages ) || ! is_numeric( $query->max_num_pages ) || $query->max_num_pages < 2 )
            {
                return;
            }

            $paged = $query->get( 'paged', '' );

            if ( ! $paged && is_front_page() && ! is_home() )
            {
                $paged = $query->get( 'page', '' );
            }

            $paged = $paged ? intval( $paged ) : 1;

            $pagenum_link = html_entity_decode( get_pagenum_link() );
            $query_args   = array();
            $url_parts    = explode( '?', $pagenum_link );

            if ( isset( $url_parts[1] ) )
            {
                wp_parse_str( $url_parts[1], $query_args );
            }

            $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
            $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
            $paginate_links_args = array(
                'base'     => $pagenum_link,
                'total'    => $query->max_num_pages,
                'current'  => $paged,
                'mid_size' => 1,
                'add_args' => array_map( 'urlencode', $query_args ),
                'prev_text' => '<div class="pxl-icon">
                     <i class= "flaticon flaticon-right-arrow"></i>
                </div>',
                'next_text' => '<div class="pxl-icon">
                     <i class= "flaticon flaticon-right-arrow"></i>
                </div>',
            );
            if($ajax){
                $paginate_links_args['format'] = '?page=%#%';
            }
            $links = paginate_links( $paginate_links_args );
            if ( $links ):
            ?>
            <nav class="pxl-pagination-wrap <?php echo esc_attr($ajax?'ajax':''); ?>">
                <div class="pxl-pagination-links">
                    <?php
                        printf($links);
                    ?>
                </div>
            </nav>
            <?php
            endif;
        }
    }
}
