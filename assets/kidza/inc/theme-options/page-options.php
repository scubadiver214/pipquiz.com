<?php
 
add_action( 'pxl_post_metabox_register', 'kidza_page_options_register' );
function kidza_page_options_register( $metabox ) {
 
	$panels = [
		'post' => [
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Options', 'kidza' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'post_settings' => [
					'title'  => esc_html__( 'Post Options', 'kidza' ),
					'icon'   => 'el el-refresh',
					'fields' => array_merge(
						kidza_sidebar_pos_opts(['prefix' => 'post_', 'default' => true, 'default_value' => '-1']),
						array(
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'kidza' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
							array(
								'id'           => 'loading_page',
								'type'         => 'button_set',
								'title'        => esc_html__( 'Loading', 'kidza' ),
								'options'      => array(
									'-1'  	   => esc_html__( 'Inherit', 'kidza' ),
									'bd' 	   => esc_html__( 'Custom', 'kidza' ),
								),
								'default'      => '-1',
							),
						
							array(
								'id'	=> 'type_post_feature',
								'type'	=> 'button_set',
								'title'	=> esc_html__('Post Feature','kidza'),
								'options'	=>  array(
									'default'	=> esc_html__('Default','kidza'),
									'video_link'=> esc_html__('Video','kidza'),
									'image_swiper'	=> esc_html__('Image Swiper','kidza'),
								),
								'default'	=> 'default',	
							),
							array(
								'id'=> 'post_video_link',
								'type' => 'text',
								'title' => esc_html__('Video Link', 'kidza'),
								'validate' => 'url',
								'default' => '',
								'indent' => true,
								'required' => array( 0 => 'type_post_feature', 1 => 'equals', 2 => 'video_link' ),
							),
							array(
								'id'       => 'post_images',
								'type'     => 'gallery',
								'title'    => esc_html__('Images', 'kidza'),
								'default'  => array(),
								'url'      => false,
								'indent' => true,
								'required' => array( 0 => 'type_post_feature', 1 => 'equals', 2 => 'image_swiper' ),
							),
					    )
					)
				]
			]
		],
		'page' => [
			'opt_name'            => 'pxl_page_options',
			'display_name'        => esc_html__( 'Page Options', 'kidza' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'Header', 'kidza' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
				        kidza_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
				           		'id'       => 'logo_m',
					            'type'     => 'media',
					            'title'    => esc_html__('Mobile Logo', 'kidza'),
					            'default'  => '',
					            'url'      => false,
					        ),
					        array(
					            'id'       => 'mobile_style',
					            'type'     => 'button_set',
					            'title'    => esc_html__('Mobile Style', 'kidza'),
					            'options'  => array(
					                'inherit'  => esc_html__('Inherit', 'kidza'),
					                'light'  => esc_html__('Light', 'kidza'),
					                'dark'  => esc_html__('Dark', 'kidza'),
					            ),
					            'default'  => 'inherit',
					        ),
					        array(
				                'id'       => 'p_menu',
				                'type'     => 'select',
				                'title'    => esc_html__( 'Menu', 'kidza' ),
				                'options'  => kidza_get_nav_menu_slug(),
				                'default' => '',
				            ),
					    ),
					    array(
				            array(
				                'id'       => 'sticky_scroll',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Sticky Scroll', 'kidza'),
				                'options'  => array(
				                    '-1' => esc_html__('Inherit', 'kidza'),
				                    'pxl-sticky-stt' => esc_html__('Scroll To Top', 'kidza'),
				                    'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'kidza'),
				                ),
				                'default'  => '-1',
				            ),
				        )
				    )
					 
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'kidza' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
				        kidza_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
					        array(
					            'id' => 'custom_ptitle',
					            'type' => 'text',
					            'title' => esc_html__('Custom Page Title', 'kidza'),
					        ),
					    )
				    )
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'kidza' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						kidza_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'kidza' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
							
					    )
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'kidza' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        kidza_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
				                'id'       => 'p_footer_fixed',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Footer Fixed', 'kidza'),
				                'options'  => array(
				                    'inherit' => esc_html__('Inherit', 'kidza'),
				                    'on' => esc_html__('On', 'kidza'),
				                    'off' => esc_html__('Off', 'kidza'),
				                ),
				                'default'  => 'inherit',
				            ),
							array(
								'id'       => 'site_loader',
								'type'     => 'switch',
								'title'    => esc_html__('Loader', 'kidza'),
								'default'  => false
							),
							array(
								'id'    => 'loading_page',
								'type'  => 'select',
								'title' => esc_html__('Loader Style', 'kidza'),
								'options' => [
									'style-default'         => esc_html__('Default', 'kidza'),
									'style-image'           => esc_html__('Image', 'kidza'),
									'style-law'             => esc_html__('Law', 'kidza'),
									'loader-base'         => esc_html__('Base', 'kidza'),
									'loader-pen'         => esc_html__('Pen', 'kidza'),
									'loader-text-shadow'         => esc_html__('Text Shadow', 'kidza'),
								   
								],
								'default' => 'style-default',
								'indent' => true,
								'required' => array( 0 => 'site_loader', 1 => 'equals', 2 => true ),
							),
							array(
								'id'       => 'image_loader',
								'type'     => 'media',
								'title'    => esc_html__('Image Loader', 'kidza'),
								'default'  => '',
								'url'      => false,
								'required' => array(
									'loading_page', 
									'equals', 
									'style-image'
								),
							),
							
							array(
								'id'      => 'loader_text',
								'type'    => 'text',
								'title'   => esc_html__('Loader Text', 'kidza'),
								'default' => '',
								'required' => array( 0 => 'loading_page', 1 => 'equals', 2 => 'style-law' ),
							),
							array(
								'id'      => 'loader_text_shadow',
								'type'    => 'text',
								'title'   => esc_html__('Loader Text', 'kidza'),
								'default' => '',
								'required' => array( 0 => 'loading_page', 1 => 'equals', 2 => 'loader-text-shadow' ),
							),
							array(
								'id'       => 'loader_text_color',
								'type'     => 'button_set',
								'title'    => esc_html__('Color Type', 'kidza'),
								'options'  => array(
									'primary' => esc_html__('Primary', 'kidza'),
									'gradient' => esc_html__('Gradient', 'kidza'),
								),
								'default'  => 'primary',
								'required' => array( 0 => 'loading_page', 1 => 'equals', 2 => 'style-law' ),
							),
						)
						
				    )
				],
				
				'colors' => [
					'title'  => esc_html__( 'Colors', 'kidza' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        array(
				        	array(
					            'id'          => 'body_bg_color',
					            'type'        => 'color',
					            'title'       => esc_html__('Body Background Color', 'kidza'),
					            'transparent' => false,
					            'default'     => ''
					        ),
				        	array(
					            'id'          => 'primary_color',
					            'type'        => 'color',
					            'title'       => esc_html__('Primary Color', 'kidza'),
					            'transparent' => false,
					            'default'     => ''
					        ),
					        array(
					            'id'          => 'secondary_color',
					            'type'        => 'color',
					            'title'       => esc_html__('Secondary Color', 'kidza'),
					            'transparent' => false,
					            'default'     => ''
					        ),
					        array(
					            'id'          => 'gradient_color',
					            'type'        => 'color_gradient',
					            'title'       => esc_html__('Gradient Color', 'kidza'),
					            'transparent' => false,
					            'default'  => array(
					                'from' => '',
					                'to'   => '', 
					            ),
					        ),
					    )
				    )
				],
				'extra' => [
					'title'  => esc_html__( 'Extra', 'kidza' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        array(
				        	array(
					            'id' => 'body_custom_class',
					            'type' => 'text',
					            'title' => esc_html__('Body Custom Class', 'kidza'),
					        ),
					    )
				    )
				]
			]
		],
		'portfolio' => [
			'opt_name'            => 'pxl_portfolio_options',
			'display_name'        => esc_html__( 'Portfolio Options', 'kidza' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'kidza' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Content Spacing Top/Bottom', 'kidza' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
							array(
								'id'=>'custom_portfolio_title_carousel',
								'type' => 'text',
								'title'    => esc_html__('Custom Title For portfolio Carousel', 'kidza'),
							),
							array(
					            'id'=> 'portfolio_time',
					            'type' => 'text',
					            'title' => esc_html__('Time', 'kidza'),
					            'validate' => 'html_custom',
					            'default' => '',
					        ),
							array(
					            'id'=> 'portfolio_excerpt',
					            'type' => 'textarea',
					            'title' => esc_html__('Excerpt', 'kidza'),
					            'validate' => 'html_custom',
					            'default' => '',
					        ),
						)
				    )
				],
			]
		],
		'service' => [
			'opt_name'            => 'pxl_service_options',
			'display_name'        => esc_html__( 'Service Options', 'kidza' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'kidza' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						kidza_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
					            'id'=> 'service_external_link',
					            'type' => 'text',
					            'title' => esc_html__('External Link', 'kidza'),
					            'validate' => 'url',
					            'default' => '',
					        ),
							array(
					            'id'=> 'service_excerpt',
					            'type' => 'textarea',
					            'title' => esc_html__('Excerpt', 'kidza'),
					            'validate' => 'html_custom',
					            'default' => '',
					        ),
					        array(
					            'id'       => 'service_icon_type',
					            'type'     => 'button_set',
					            'title'    => esc_html__('Icon Type', 'kidza'),
					            'options'  => array(
					                'icon'  => esc_html__('Icon', 'kidza'),
					                'image'  => esc_html__('Image', 'kidza'),
					            ),
					            'default'  => 'icon'
					        ),
					        array(
					            'id'       => 'service_icon_font',
					            'type'     => 'pxl_iconpicker',
					            'title'    => esc_html__('Icon', 'kidza'),
					            'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'icon' ),
            					'force_output' => true
					        ),
					        array(
					            'id'       => 'service_icon_img',
					            'type'     => 'media',
					            'title'    => esc_html__('Icon Image', 'kidza'),
					            'default' => '',
					            'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'image' ),
				            	'force_output' => true
					        ),
					        
							array(
								'id'=>'location_service',
								'type' => 'text',
								'title'    => esc_html__('Custom Location For Service ', 'kidza'),
							),
							array(
								'id'=>'age_service',
								'type' => 'text',
								'title'    => esc_html__('Custom Age For Service ', 'kidza'),
							),
							array(
								'id'=>'weekly_service',
								'type' => 'text',
								'title'    => esc_html__('Custom weekly For Service ', 'kidza'),
							),
							array(
								'id'=>'time_service',
								'type' => 'text',
								'title'    => esc_html__('Custom Time For Service ', 'kidza'),
							),
							array(
								'id'=>'year_service',
								'type' => 'text',
								'title'    => esc_html__('Custom Year Service ', 'kidza'),
							),
							array(
								'id'=>'service_multi_text',
								'type' => 'multi_text',
								'title' => esc_html__('Multi Text Option', 'kidza'),
								'desc'      => esc_html__(' ', 'kidza'), 
							),
						)
				    )
				],
				'page_title_service' => [
					'title'  => esc_html__( 'Page Title Service', 'kidza' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
				        kidza_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
					        array(
					            'id' => 'custom_ptitle',
					            'type' => 'text',
					            'title' => esc_html__('Custom Page Title Service', 'kidza'),
					        ),
					    )
				    )
				],
			]
		],
		'product' => [
			'opt_name'            => 'pxl_product_options',
			'display_name'        => esc_html__( 'Product Options', 'kidza' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'kidza' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
					            'id'=> 'product_label',
					            'type' => 'text',
					            'title' => esc_html__('Label', 'kidza'),
					            'default' => '',
					        ),
					        array(
					            'id'=> 'product_text_btn',
					            'type' => 'text',
					            'title' => esc_html__('Text Button Video', 'kidza'),
					            'default' => '',
					        ),
					        array(
								'id'           => 'link_video',
								'type'         => 'text',
								'title'        => esc_html__( 'Link Video', 'kidza' ),
								'default'		=> '',
								'force_output' => true
							),
					        array(
					            'id' => 'custom_ptitle',
					            'type' => 'text',
					            'title' => esc_html__('Custom Page Title', 'kidza'),
					        ),
					    
						)
				    )
				],
			]
		],
		
		'pxl-template' => [
					'opt_name'            => 'pxl_hidden_template_options',
					'display_name'        => esc_html__( 'Template Options', 'kidza' ),
					'show_options_object' => false,
					'context'  => 'advanced',
					'priority' => 'default',
					'sections'  => [
					'header' => [
						'title'  => esc_html__( 'General', 'kidza' ),
						'icon'   => 'el-icon-website',
						'fields' => array(
							array(
								'id'    => 'template_type',
								'type'  => 'select',
								'title' => esc_html__('Type', 'kidza'),
				            	'options' => [
				            		'df'       	   => esc_html__('Select Type', 'kidza'), 
									'header'       => esc_html__('Header', 'kidza'), 
									'footer'       => esc_html__('Footer', 'kidza'), 
									'mega-menu'    => esc_html__('Mega Menu', 'kidza'), 
									'page-title'   => esc_html__('Page Title', 'kidza'), 
									'tab' => esc_html__('Tab', 'kidza'),
									'wgaboutauthor' => esc_html__('Widget Sidebar', 'kidza'),
									'hidden-panel' => esc_html__('Hidden Panel', 'kidza'),
									'popup' => esc_html__('Popup', 'kidza'),
									'slider' => esc_html__('Slider', 'kidza'),
				            	],
				            	'default' => 'df',
				        	),
				        	array(
								'id'    => 'header_type',
								'type'  => 'select',
								'title' => esc_html__('Header Type', 'kidza'),
				            	'options' => [
				            		'px-header--default'       	   => esc_html__('Default', 'kidza'), 
									'px-header--transparent'       => esc_html__('Transparent', 'kidza'),
				            	],
				            	'default' => 'px-header--default',
				            	'indent' => true,
                				'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'header' ),
				        	),
						),
				    
					],
				]
			],	
	];
 
	$metabox->add_meta_data( $panels );
}
 