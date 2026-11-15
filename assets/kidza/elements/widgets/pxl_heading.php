<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_heading',
        'title' => esc_html__('Case Heading', 'kidza' ),
        'icon' => 'eicon-heading',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'gsap',
            'pxl-scroll-trigger',
            'pxl-splitText',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'source_type',
                            'label' => esc_html__('Source Type', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'text' => 'Text',
                                'title' => 'Page Title',
                            ],
                            'default' => 'text',
                        ),
                        
                        array(
                            'name' => 'sub_title',
                            'label' => esc_html__('Sub Title', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                            'condition' => [
                                'source_type' => ['text'],
                            ],
                            'description' => 'Create Typewriter text width shortcode: [typewriter text="Text1, Text2"] and Highlight text with shortcode: [highlight text="Text"]',
                        ),
                        
                        array(
                          'name' => 'align',
                            'label' => esc_html__( 'Alignment', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'kidza' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'kidza' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'kidza' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__( 'Justified', 'kidza' ),
                                    'icon' => 'eicon-text-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading' => 'text-align: {{VALUE}};',
                                '{{WRAPPER}} .pxl-heading .pxl-item--subtitle.px-sub--icon' => 'justify-content: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'h_width',
                            'label' => esc_html__('Max Width', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-heading--inner' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        
                        kidza_split_text_option('title_'),
                        array(
                            'name' => 'title_tag',
                            'label' => esc_html__('HTML Tag', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'h1' => 'H1',
                                'h2' => 'H2',
                                'h3' => 'H3',
                                'h4' => 'H4',
                                'h5' => 'H5',
                                'h6' => 'H6',
                                'div' => 'div',
                                'span' => 'span',
                                'p' => 'p',
                            ],
                            'default' => 'h3',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--title',
                        ),
                        array(
                            'name'         => 'title_box_shadow',
                            'label' => esc_html__( 'Title Shadow', 'kidza' ),
                            'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-heading .pxl-item--title'
                        ),
                        array(
                            'name' => 'title_space_bottom',
                            'label' => esc_html__('Bottom Spacer', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'default' => [
                                'size' => 0,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('Case Animate', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => kidza_widget_animate_v2(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'pxl_animate_delay',
                            'label' => esc_html__('Animate Delay', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => 'Enter number. Default 0ms',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_line',
                    'label' => esc_html__('Line Title', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'title_style',
                                'label' => esc_html__('Style', 'kidza' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'px-title--default' => 'Default',
                                    'px-title--divider1' => 'Line',    
                                ],
                                'default' => 'px-title--default',
                                ),
                            
                            array(
                                'name' => 'bottom_line',
                                'label' => esc_html__('Bottom', 'kidza' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 300,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading.px-bg-style .px-divider--wrap ' => 'bottom: {{SIZE}}{{UNIT}};',
                                ],
                                'condition' => [
                                    'title_style' => ['px-title--divider1'],
                                ],
                            ),
                            array(
                                'name' => 'right_line',
                                'label' => esc_html__('Right', 'kidza' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 20,
                                        'max' => 300,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading.px-bg-style .px-divider--wrap ' => 'right: {{SIZE}}{{UNIT}};',
                                ],
                                'condition' => [
                                    'title_style' => ['px-title--divider1'],
                                ],
                            ),
                        ),
                        
                    ),
                ),
                array(
                    'name' => 'section_style_title_sub',
                    'label' => esc_html__('Sub Title', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'sub_title_style',
                                'label' => esc_html__('Style', 'kidza' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'px-sub-title-default' => 'Default',
                                    'px-bg' => 'Background',
                                    'px-sub--icon' => 'Sub Icon',
                                ],
                                'default' => 'px-bg',
                            ),
                            array(
                            'name' => 'bg_subtitle',
                            'label' => esc_html__('Background Subtitle', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'sub_title_style' => ['px-bg'],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--subtext' => 'background: {{VALUE}};',
                            ],
                        ),
                            array(
                                'name' => 'line_color2',
                                'type' => \Elementor\Group_Control_Background::get_type(),
                                'control_type' => 'group',
                                'condition' => [
                                    'sub_title_style' => ['px-line2'],
                                ],
                                'types' => [ 'classic', 'gradient' ],
                                'selector' => '{{WRAPPER}} .pxl-heading.px-line2-style .pxl-item--title::before',
                                
                            ),
                            array(
                                'name' => 'icon_type',
                                'label' => esc_html__('Icon Type', 'kidza' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'icon' => 'Icon',
                                ],
                                'default' => 'icon',
                                'condition' => [
                                    'sub_title_style' => 'px-sub--icon',
                                ],
                            ),
                            array(
                                'name' => 'pxl_icon',
                                'label' => esc_html__('Icon', 'kidza' ),
                                'type' => \Elementor\Controls_Manager::ICONS,
                                'fa4compatibility' => 'icon',
                                'condition' => [
                                    'icon_type' => 'icon',
                                    'sub_title_style' => 'px-sub--icon',
                                ],
                            ),
                            array(
                                'name' => 'icon_color',
                                'label' => esc_html__('Color', 'kidza' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-item--icon i' => 'color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
                                    '{{WRAPPER}} .pxl-heading .pxl-item--icon svg' => 'fill: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
                                ],
                                'condition' => [
                                    'icon_type' => 'icon',
                                    'sub_title_style' => 'px-sub--icon',
                                ],
                            ),
                            array(
                                'name' => 'icon_font_size',
                                'label' => esc_html__('Size', 'kidza' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 300,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-item--icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .pxl-heading .pxl-item--icon svg' => 'width: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .pxl-heading .pxl-item--icon svg' => 'max-width: {{SIZE}}{{UNIT}};',
                                    '{{WRAPPER}} .pxl-heading .pxl-item--icon svg' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                                'condition' => [
                                    'icon_type' => 'icon',
                                    'sub_title_style' => 'px-sub--icon',
                                ],
                            ),
                            array(
                                'name' => 'sub_title_color',
                                'label' => esc_html__('Color', 'kidza' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'color: {{VALUE}} !important;',
                                ],
                            ),
                            array(
                                'name' => 'sub_title_typography',
                                'label' => esc_html__('Typography', 'kidza' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--subtitle, {{WRAPPER}} .pxl-heading .pxl-item--subtitle span',
                            ),
                            array(
                                'name' => 'sub_title_space_top',
                                'label' => esc_html__('Top Spacer', 'kidza' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 300,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                ],
                               
                            ),
                            array(
                                'name' => 'sub_title_space_bottom',
                                'label' => esc_html__('Bottom Spacer', 'kidza' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'range' => [
                                    'px' => [
                                        'min' => 0,
                                        'max' => 300,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                ],
                                'condition' => [
                                    'sub_title_style' => ['px-sub-title-default','px-sub-title-under'],
                                ],
                            ),
                            array(
                                'name' => 'pxl_animate_sub',
                                'label' => esc_html__('Case Animate', 'kidza' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => kidza_widget_animate(),
                                'default' => '',
                            ),
                            array(
                                'name' => 'pxl_animate_delay_sub',
                                'label' => esc_html__('Animate Delay', 'kidza' ),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'default' => '0',
                                'description' => 'Enter number. Default 0ms',
                            ),
                        )
                    ),
                ),
            ),
        ),
    ),
    kidza_get_class_widget_path()
);