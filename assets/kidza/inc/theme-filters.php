<?php
/**
 * Filters hook for the theme
 *
 * @package Case-Themes
 */

/* Custom Classs - Body */
function kidza_body_classes( $classes ) {   

	$classes[] = '';
    if (class_exists('ReduxFramework')) {
        $classes[] = ' pxl-redux-page';

	    $footer_fixed = kidza()->get_theme_opt('footer_fixed');
	    $p_footer_fixed = kidza()->get_page_opt('p_footer_fixed');

	    if($p_footer_fixed != false && $p_footer_fixed != 'inherit') {
	    	$footer_fixed = $p_footer_fixed;
	    }

	    if(isset($footer_fixed) && $footer_fixed == 'on') {
	        $classes[] = ' pxl-footer-fixed';
	    }

	    $pxl_body_typography = kidza()->get_theme_opt('pxl_body_typography');
	    if($pxl_body_typography != 'google-font') {
	        $classes[] = ' body-'.$pxl_body_typography.' ';
	    }
		
	    $pxl_heading_typography = kidza()->get_theme_opt('pxl_heading_typography');
	    if($pxl_heading_typography != 'google-font') {
	        $classes[] = ' heading-'.$pxl_heading_typography.' ';
	    }

	    $theme_default = kidza()->get_theme_opt('theme_default');
	    if(isset($theme_default['font-family']) && $theme_default['font-family'] == false && $pxl_body_typography == 'google-font') {
	        $classes[] = ' pxl-font-default';
	    }

	    $header_layout = kidza()->get_opt('header_layout');
	    if(isset($header_layout) && $header_layout) {
		    $post_header = get_post($header_layout);
		    $header_type = get_post_meta( $post_header->ID, 'header_type', true );
		    if(isset($header_type)) {
		    	$classes[] = ' bd-'.$header_type.'';
		    }
		}

	    $get_gradient_color = kidza()->get_opt('gradient_color');
		if($get_gradient_color['from'] == $get_gradient_color['to'] ) {
		    $classes[] = ' site-color-normal ';
		} else {
			$classes[] = ' site-color-gradient ';
		}

		$shop_layout = kidza()->get_theme_opt('shop_layout', 'grid');
		if(isset($_GET['shop-layout'])) {
	        $shop_layout = $_GET['shop-layout'];
	    }
		$classes[] = ' woocommerce-layout-'.$shop_layout;

		$body_custom_class = kidza()->get_page_opt('body_custom_class');
		if(!empty($body_custom_class)) {
			$classes[] = $body_custom_class;
		}
    }
    return $classes;
}
add_filter( 'body_class', 'kidza_body_classes' );

/* Post Type Support */
function kidza_add_cpt_support() {
    $cpt_support = get_option( 'elementor_cpt_support' );
    
    if( ! $cpt_support ) {
        $cpt_support = [ 'page', 'post', 'portfolio', 'footer', 'pxl-template' ];
        update_option( 'elementor_cpt_support', $cpt_support );
    }
    
    else if( ! in_array( 'portfolio', $cpt_support ) ) {
        $cpt_support[] = 'portfolio';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

    else if( ! in_array( 'footer', $cpt_support ) ) {
        $cpt_support[] = 'footer';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

    else if( ! in_array( 'pxl-template', $cpt_support ) ) {
        $cpt_support[] = 'pxl-template';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

}
add_action( 'after_switch_theme', 'kidza_add_cpt_support');

add_filter( 'pxl_support_default_cpt', 'kidza_support_default_cpt' );
function kidza_support_default_cpt($postypes){
	return $postypes; // pxl-template
}

add_filter( 'pxl_extra_post_types', 'kidza_add_post_type' );
function kidza_add_post_type( $postypes ) {
	$portfolio_display = kidza()->get_theme_opt('portfolio_display', true);
	$portfolio_slug = kidza()->get_theme_opt('portfolio_slug', 'portfolio');
	$portfolio_name = kidza()->get_theme_opt('portfolio_name', 'Portfolio');
	$service_display = kidza()->get_theme_opt('service_display', true);
	$service_slug = kidza()->get_theme_opt('service_slug', 'service');
	$service_name = kidza()->get_theme_opt('service_name', 'Services');
	
	if($portfolio_display) {
		$portfolio_status = true;
	} else {
		$portfolio_status = false;
	}
	if($service_display) {
		$service_status = true;
	} else {
		$service_status = false;
	}
	
	$postypes['portfolio'] = array(
		'status' => $portfolio_status,
		'item_name'  => $portfolio_name,
		'items_name' => $portfolio_name,
		'args'       => array(
			'rewrite'             => array(
                'slug'       => $portfolio_slug,
 		 	),
		),
	);

	$postypes['service'] = array(
		'status' => $service_status,
		'item_name'  => $service_name,
		'items_name' => $service_name,
		'args'       => array(
			'rewrite'             => array(
                'slug'       => $service_slug,
 		 	),
		),
	);
	
	return $postypes;
}

//add star
function display_average_stars( $post_id ) {
    $average     = get_average_rating( $post_id ); 
    $full_stars  = floor( $average ); 
    $half_star   = ( $average - $full_stars >= 0.5 ) ? 1 : 0;
    $empty_stars = 5 - ( $full_stars + $half_star );
    $star_svg = function( $color ) {
        return sprintf(
            '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 18 17" fill="none" style="margin-right:3px;">
                <path d="M9.00033 0.666626L11.5753 5.88329L17.3337 6.72496L13.167 10.7833L14.1503 16.5166L9.00033 13.8083L3.85033 16.5166L4.83366 10.7833L0.666992 6.72496L6.42533 5.88329L9.00033 0.666626Z" fill="%s"/>
            </svg>',
            esc_attr( $color )
        );
    };
    $output = '<div class="rating-stars" style="display:flex;align-items:center;" data-rating="' . esc_attr( $average ) . '">';
    for ( $i = 0; $i < $full_stars; $i++ ) {
        $output .= $star_svg( '#F15F25' );
    }
    if ( $half_star ) {
        $output .= $star_svg( '#F15F25' );
    }
    for ( $i = 0; $i < $empty_stars; $i++ ) {
        $output .= $star_svg( '#808080' );
    }
    $output .= '</div>';
    return $output;
}
//end star
/* Custom Archive Post Type Link */
function kidza_custom_archive_service_link() {
    if( is_post_type_archive( 'service' ) ) {
    	$archive_service_link = kidza()->get_theme_opt('archive_service_link');
        wp_redirect( get_permalink($archive_service_link), 301 );
        exit();
    }
}
add_action( 'template_redirect', 'kidza_custom_archive_service_link' );

function kidza_custom_archive_portfolio_link() {
    if( is_post_type_archive( 'portfolio' ) ) {
        $archive_portfolio_link = kidza()->get_theme_opt('archive_portfolio_link');
        wp_redirect( get_permalink($archive_portfolio_link), 301 );
        exit();
    }
}
add_action( 'template_redirect', 'kidza_custom_archive_portfolio_link' );

add_filter( 'pxl_extra_taxonomies', 'kidza_add_tax' );
function kidza_add_tax( $taxonomies ) {

	$taxonomies['portfolio-category'] = array(
		'status'     => true,
		'post_type'  => array( 'portfolio' ),
		'taxonomy'   => 'Portfolio Categories',
		'taxonomies' => 'Portfolio Categories',
		'args'       => array(
			'rewrite'             => array(
                'slug'       => 'portfolio-category'
 		 	),
		),
		'labels'     => array()
	);

	$taxonomies['service-category'] = array(
		'status'     => true,
		'post_type'  => array( 'service' ),
		'taxonomy'   => 'Service Categories',
		'taxonomies' => 'Service Categories',
		'args'       => array(
			'rewrite'             => array(
                'slug'       => 'service-category'
 		 	),
		),
		'labels'     => array()
	);
	return $taxonomies;
}

add_filter( 'pxl_theme_builder_post_types', 'kidza_theme_builder_post_type' );
function kidza_theme_builder_post_type($postypes){
	//default are header, footer, mega-menu
	return $postypes;
}

add_filter( 'pxl_theme_builder_layout_ids', 'kidza_theme_builder_layout_id' );
function kidza_theme_builder_layout_id($layout_ids){
	//default [], 
	$header_layout        = (int)kidza()->get_opt('header_layout');
	$header_sticky_layout = (int)kidza()->get_opt('header_sticky_layout');
	$footer_layout        = (int)kidza()->get_opt('footer_layout');
	$ptitle_layout        = (int)kidza()->get_opt('ptitle_layout');
	if( $header_layout > 0) 
		$layout_ids[] = $header_layout;
	if( $header_sticky_layout > 0) 
		$layout_ids[] = $header_sticky_layout;
	if( $footer_layout > 0) 
		$layout_ids[] = $footer_layout;
	if( $ptitle_layout > 0) 
		$layout_ids[] = $ptitle_layout;

	$slider_template = kidza_get_templates_option('slider');
	if( count($slider_template) > 0){
		foreach ($slider_template as $key => $value) {
			$layout_ids[] = $key;
		}
	}

	$tab_template = kidza_get_templates_option('tab');
	if( count($tab_template) > 0){
		foreach ($tab_template as $key => $value) {
			$layout_ids[] = $key;
		}
	}
	
	$mega_menu_id = kidza_get_mega_menu_builder_id();
	if(!empty($mega_menu_id))
		$layout_ids = array_merge($layout_ids, $mega_menu_id);

	$page_popup_id = kidza_get_page_popup_builder_id();
	if(!empty($page_popup_id))
		$layout_ids = array_merge($layout_ids, $page_popup_id);

	return $layout_ids;
}

add_filter( 'pxl_wg_get_source_id_builder', 'kidza_wg_get_source_builder' );
function kidza_wg_get_source_builder($wg_datas){
  $wg_datas['tabs'] = ['control_name' => 'tabs', 'source_name' => 'content_template'];
  $wg_datas['slides'] = ['control_name' => 'slides', 'source_name' => 'slide_template'];
  return $wg_datas;
}

/* Update primary color in Editor Builder */
add_action( 'elementor/preview/enqueue_styles', 'kidza_add_editor_preview_style' );
function kidza_add_editor_preview_style(){
    wp_add_inline_style( 'editor-preview', kidza_editor_preview_inline_styles() );
}
function kidza_editor_preview_inline_styles(){
    $theme_colors = kidza_configs('theme_colors');
    ob_start();
        echo '.elementor-edit-area-active{';
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
        echo '}';
    return ob_get_clean();
}
 
add_filter( 'get_the_archive_title', 'kidza_archive_title_remove_label' );
function kidza_archive_title_remove_label( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = get_the_author();
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	} elseif ( is_home() ) {
		$title = single_post_title( '', false );
	}

	return $title;
}

add_filter( 'comment_reply_link', 'kidza_comment_reply_text' );
function kidza_comment_reply_text( $link ) {
	$link = str_replace( 'Reply', ''.esc_attr__('Reply', 'kidza').'', $link );
	return $link;
}
add_filter( 'pxl_enable_pagepopup', 'kidza_enable_pagepopup' );
function kidza_enable_pagepopup() {
	return true;
}
add_filter( 'pxl_enable_megamenu', 'kidza_enable_megamenu' );
function kidza_enable_megamenu() {
	return true;
}
add_filter( 'pxl_enable_onepage', 'kidza_enable_onepage' );
function kidza_enable_onepage() {
	return true;
}

add_filter( 'pxl_support_awesome_pro', 'kidza_support_awesome_pro' );
function kidza_support_awesome_pro() {
	return false;
}
 
add_filter( 'redux_pxl_iconpicker_field/get_icons', 'kidza_add_icons_to_pxl_iconpicker_field' );
function kidza_add_icons_to_pxl_iconpicker_field($icons){
	$custom_icons = []; //'Flaticon' => array(array('flaticon-marker' => 'flaticon-marker')),
	$icons = array_merge($custom_icons, $icons);
	return $icons;
}


add_filter("pxl_mega_menu/get_icons", "kidza_add_icons_to_megamenu");
function kidza_add_icons_to_megamenu($icons){
	$custom_icons = []; //'Flaticon' => array(array('flaticon-marker' => 'flaticon-marker')),
	$icons = array_merge($custom_icons, $icons);
	return $icons;
}
 

/**
 * Move comment field to bottom
 */
add_filter( 'comment_form_fields', 'kidza_comment_field_to_bottom' );
function kidza_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}


/* ------Disable Lazy loading---- */
add_filter( 'wp_lazy_loading_enabled', '__return_false' );

/* ------ Export Settings ---- */
add_filter( 'pxl_export_wp_settings', 'kidza_export_wp_settings' );
function kidza_export_wp_settings($wp_options){
  $wp_options[] = 'mc4wp_default_form_id';
  return $wp_options;
}

/* ------ Theme Info ---- */
add_filter( 'pxl_server_info', 'kidza_add_server_info');
function kidza_add_server_info($infos){
  $infos = [
    'api_url' => 'https://api.casethemes.net/',
    'docs_url' => 'https://doc.casethemes.net/kidza/',
    'plugin_url' => 'https://api.casethemes.net/plugins/',
    'demo_url' => 'https://kidza.casethemes.net/',
    'support_url' => 'https://casethemes.desky.support/',
    'help_url' => 'https://doc.casethemes.net/kidza',
    'email_support' => 'https://casethemes.desky.support/',
    'video_url' => '#'
  ];
  
  return $infos;
}

/* ------ Template Filter ---- */
add_filter( 'pxl_template_type_support', 'kidza_template_type_support' );
function kidza_template_type_support($type) {
	$extra_type = [
		'page-title'          => esc_html__('Page Title', 'kidza'), 
		'hidden-panel'          => esc_html__('Hidden Panel', 'kidza'), 
		'tab'          => esc_html__('Tab', 'kidza'), 
		'popup'          => esc_html__('Popup', 'kidza'),
		'slider'          => esc_html__('Slider', 'kidza'),
	];
	$template_type = array_merge($type,$extra_type); 
	return $template_type;
}

/* Search Result  */
function kidza_custom_post_types_in_search_results( $query ) {
    if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
        $query->set( 'post_type', array( 'post', 'portfolio', 'service', 'product' ) );
    }
}
add_action( 'pre_get_posts', 'kidza_custom_post_types_in_search_results' );

add_filter( 'elementor/fonts/additional_fonts', 'kidza_update_elementor_font_control2' );
function kidza_update_elementor_font_control2($additional_fonts){
  $additional_fonts['Funnel Display'] = 'pxlfonts';
  return $additional_fonts;
}