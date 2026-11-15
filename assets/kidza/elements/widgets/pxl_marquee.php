<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_marquee',
        'title' => esc_html__('Case Marquee', 'kidza'),
        'icon' => 'eicon-testimonial',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'kidza'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'label',
                            'label' => esc_html__('Label', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'description' => 'Highlight text with shortcode: [highlight text="Text"]',
                        ),
                        array(
                            'name' => 'items',
                            'label' => esc_html__('Items', 'kidza'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'type',
                                    'label' => esc_html__('Type', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => array(
                                        'icon' => esc_html__('Icon', 'kidza'),
                                        'image' => esc_html__('Image', 'kidza'),
                                        'text' => esc_html__('Text', 'kidza'),
                                    ),
                                    'default' => 'icon',
                                ),
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                    'condition' => array(
                                        'type' => 'icon',
                                    ),
                                ),
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                    'condition' => [
                                        'type' => 'image',
                                    ],
                                ),
                                array(
                                    'name' => 'image_type',
                                    'label' => esc_html__('Image Type', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => array(
                                        'image' => esc_html__('Image', 'kidza'),
                                        'bg' => esc_html__('Background', 'kidza'),
                                    ),
                                    'default' => 'image',
                                    'condition' => [
                                        'type' => 'image',
                                    ],
                                ),
                                array(
                                    'name' => 'text',
                                    'label' => esc_html__('Text', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'condition' => array(
                                        'type' => 'text',
                                    ),
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'kidza' ),
                                    'type' => \Elementor\Controls_Manager::URL,
                                ),
                            ),
                        ),
                    ),
                ),

                array(
                    'name' => 'section_settings_carousel',
                    'label' => esc_html__('Carousel', 'kidza'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'overflow_hidden',
                            'label' => esc_html__('Overflow Hidden', 'kidza'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'infinite',
                            'label' => esc_html__('Infinite Loop', 'kidza'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'direction',
                            'label' => esc_html__('Direction', 'kidza'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'ltr',
                            'options' => [
                                'ltr' => esc_html__('Left to Right', 'kidza'), 
                                'rtl' => esc_html__('Right to Left', 'kidza'), 
                            ]
                        ),
                        array(
                            'name' => 'duration',
                            'label' => esc_html__('Duration', 'kidza'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'min' => 1,
                            'description' => esc_html__('Enter number. Unit is ms', 'kidza'),
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--list' => 'animation-duration: {{VALUE}}ms',
                            ],
                        ),
                        array(
                            'name' => 'delay',
                            'label' => esc_html__('Delay', 'kidza'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'min' => 1,
                            'description' => esc_html__('Enter number. Unit is ms', 'kidza'),
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--list' => 'animation-delay: {{VALUE}}ms',
                            ],
                        ),
                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause On Hover', 'kidza'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_general',
                    'label' => esc_html__('General', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'kidza'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'pxl-marquee-custom',
                            'options' => array(
                                'pxl-marquee-custom' => esc_html__('Custom', 'kidza'),
                                'pxl-marquee-style1' => esc_html__('Icon Style 1', 'kidza'),
                                'pxl-marquee-image' => esc_html__('Image style', 'kidza'),
                            ),
                        ),
                        array(
                            'name' => 'inner',
                            'label' => esc_html__('INNER', 'kidza'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                        ),
                        array(
                            'name' => 'spacing_x',
                            'label' => esc_html__('Spacer X', 'kidza'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%', 'rem', 'em', 'custom'],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee .pxl-item--inner' => '--x: {{SIZE}}{{UNIT}};--gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'max_width',
                            'label' => esc_html__('Max Width', 'kidza'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%', 'rem', 'em', 'custom'],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee .pxl-item--container' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'tab_style_label',
                    'label' => esc_html__('Label', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'label_normal',
                            'label' => esc_html__('NORMAL', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after', 
                        ),
                        array(
                            'name' => 'label_color',
                            'label' => esc_html__('Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee .pxl-item--label' => 'color: {{VALUE}}'
                            ],
                        ),
                        array(
                            'name' => 'label_typography',
                            'label' => esc_html__('Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-marquee .pxl-item--label',
                        ),
                        array(
                            'name' => 'label_spacer_bottom',
                            'label' => esc_html__('Spacing Bottom', 'kidza'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%', 'rem', 'em', 'custom'],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee .pxl-item--label' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'label_padding',
                            'label' => esc_html__( 'Padding', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee .pxl-item--label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),

                        array(
                            'name' => 'divider12',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'label_highlight',
                            'label' => esc_html__('HIGHLIGHT', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after' ,
                        ),
                        array(
                            'name' => 'label_highlight_color',
                            'label' => esc_html__('Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee .pxl-item--label .pxl-title--highlight' => 'color: {{VALUE}}'
                            ],
                        ),
                        array(
                            'name' => 'label_highlight_typography',
                            'label' => esc_html__('Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-marquee .pxl-item--label .pxl-title--highlight',
                        ),
                        array(
                            'name' => 'divider1',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'label_line',
                            'label' => esc_html__('LINE', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after' ,
                        ),
                        array(
                            'name' => 'label_line_show',
                            'label' => esc_html__('Show', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '' ,
                        ),
                        array(
                            'name' => 'label_line_color',
                            'label' => esc_html__('Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--label, ' => '--bg-color: {{VALUE}}'
                            ],
                        ),
                        array(
                            'name' => 'label_line_max_width',
                            'label' => esc_html__('Max Width', 'kidza'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%', 'rem', 'em', 'custom'],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee .pxl-item--label' => '--width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'divider3',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'label_animation',
                            'label' => esc_html__('ANIMATION', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after' ,
                        ),
                        array(
                            'name' => 'label_animate',
                            'label' => esc_html__('Animate', 'kidza'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => kidza_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'label_animate_delay',
                            'label' => esc_html__('Delay', 'kidza'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => 'Ex: 500',
                        ),

                    ),
                ),
                                
                array(
                    'name' => 'tab_style_img',
                    'label' => esc_html__('Image', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'normal',
                            'label' => esc_html__('NORMAL', 'kidza'),
                            'type' => Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'kidza'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'filters',
                            'label' => esc_html__('Filters', 'kidza'),
                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--img img, 
                            {{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--bg' 
                        ),
                        array(
                            'name'         => 'box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'kidza' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--img img, 
                            {{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--bg'
                        ),
                        array(
                            'name' => 'divider',
                            'type' => Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'dimension',
                            'label' => esc_html__('DIMENSION', 'kidza'),
                            'type' => Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'image_height',
                            'label' => esc_html__('Height', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'unit' => ['px', '%'],  
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'separator' => 'before',
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--img img,
                                {{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--bg' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'image_min_height',
                            'label' => esc_html__('Min Height', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--img img,
                                {{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--bg' => 'min-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'image_max_height',
                            'label' => esc_html__('Max Height', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--img img,
                                {{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--bg' => 'max-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'image_min_width',
                            'label' => esc_html__('Min Width', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--img img,
                                {{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--bg' => 'min-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_icon',
                    'label' => esc_html__('Icon', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(   
                        array(
                            'name' => 'icon_normal_options',
                            'label' => esc_html__( 'NORMAL', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),    
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__( 'Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--icon' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--icon svg path:not(.not-fill)' => 'fill: {{VALUE}}',
                            ],
                        ),

                        array(
                            'name' => 'icon_color_hv',
                            'label' => esc_html__( 'Color Hover', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--single:hover .pxl-item--icon' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--single:hover .pxl-item--icon svg path:not(.not-fill)' => 'fill: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'icon_opacity',
                            'label' => esc_html__( 'Opacity', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'min' => 0,
                            'max' => 1,
                            'step' => 0.1,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--icon' => 'opacity: {{VALUE}}',
                                '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--icon svg path' => 'fill-opacity: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'icon_bg_color',
                            'label' => esc_html__( 'Background Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--icon' => 'background-color: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'icon_box_border',
                            'label' => esc_html__('Border', 'kidza'),
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--icon',
                        ),
                        array(
                            'name' => 'icon_size',
                            'label' => esc_html__('Font Size', 'kidza'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%', 'rem', 'em', 'custom'],
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--icon' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_box_size',
                            'label' => esc_html__('Box Size', 'kidza'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%', 'rem', 'em', 'custom'],
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--icon' => '--size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_border_radius',
                            'label' => esc_html__( 'Border Radius', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'divider2',
                            'type' => \Elementor\Controls_Manager::DIVIDER,
                        ),
                        array(
                            'name' => 'svg_options',
                            'label' => esc_html__( 'SVG', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'svg_width',
                            'label' => esc_html__('Width', 'kidza'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%', 'rem', 'em', 'custom'],
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--icon svg' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'svg_height',
                            'label' => esc_html__('Height', 'kidza'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => ['px', '%', 'rem', 'em', 'custom'],
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--icon svg' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'tab_style_overlay',
                    'label' => esc_html__('Overlay', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'overlay',
                            'label' => esc_html__('Overlay', 'kidza'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => '',
                        ),
                        array(
                            'name' => 'overlay_bg',
                            'label' => esc_html__('Background', 'kidza'),
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'types' => [ 'classic', 'gradient', 'video' ],
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--overlay' ,
                            'condition' => [
                                'overlay!' => '',
                            ] ,
                        ),
                        array(                            
                            'name' => 'overlay_orientation_v',
                            'label' => esc_html__('Vertical Orientation', 'kidza'),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'top' => [
                                    'label' => esc_html__('Top', 'kidza'), 
                                    'icon' => 'eicon-v-align-top'
                                ],
                                'bottom' => [
                                    'label' => esc_html__('Bottom', 'kidza'), 
                                    'icon' => 'eicon-v-align-bottom'
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--overlay' => '{{VALUE}}: 0;',
                            ],
                            'condition' => [
                                'overlay!' => '',
                            ] ,
                        ),
                        array(
                            'name' => 'overlay_offset_top',
                            'label' => esc_html__('Top', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px','%','em','rem', 'custom' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'unit' => 'px',
                                'size' => 0,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 1000,
                                ],
                            ],
                            'condition' => [
                                'overlay_orientation_v' => 'top',
                                
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--overlay' => 'top: {{SIZE}}{{UNIT}};bottom: auto;',
                            ],
                        ),
                        array(
                            'name' => 'overlay_offset_bottom',
                            'label' => esc_html__('Bottom', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px','%','em','rem', 'custom' ],
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 1,
                                    'max' => 1000,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 0,
                            ],
                            'condition' => [
                                'overlay_orientation_v' => 'bottom',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--overlay' => 'bottom: {{SIZE}}{{UNIT}};top: auto;',
                            ],
                        ),
                        array(
                            'name' => 'overlay_filters',
                            'label' => esc_html__('Filters', 'kidza'),
                            'type' => \Elementor\Group_Control_Css_Filter::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--overlay' ,
                            'condition' => [
                                'overlay!' => '',
                            ] ,
                        ),
                        array(
                            'name' => 'overlay_height',
                            'label' => esc_html__('Height', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'unit' => ['px', '%'],  
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee .pxl-item--inner .pxl-item--overlay' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'overlay!' => '',
                            ] ,
                        ),
                    ),
                ),
                kidza_widget_animation_settings(),
            ),
        ),
    ),
    kidza_get_class_widget_path()
);