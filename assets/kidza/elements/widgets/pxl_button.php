<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_button',
        'title' => esc_html__('Case Button', 'kidza' ),
        'icon' => 'eicon-button',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'greensock'
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'btn_style',
                            'label' => esc_html__('Type', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'btn-default',
                            'options' => [
                                'btn-nanuk' => esc_html__('Nanuk', 'kidza' ),
                                'btn-slide-lr' => esc_html__('Slide Left to Right', 'kidza' ),
                                'btn-gsap' => esc_html__('GSap', 'kidza' ),
                                'btn-kid' => esc_html__('Kid', 'kidza' ),
                            ],
                            'default' => 'btn-base',
                        ),
                        array(
                            'name' => 'style_btn',
                            'label' => esc_html__('Style Button', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => 'Default',
                                'style-2' => 'Style2',
                                'btn-two' => 'two-icon',
                            ],
                            'default' => 'style-default',
                        ),
                        array(
                            'name' => 'text',
                            'label' => esc_html__('Text', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Click Here', 'kidza'),
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'default' => [
                                'url' => '#',
                            ],
                        ),
                        array(
                            'name' => 'align',
                            'label' => esc_html__('Alignment', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left'    => [
                                    'title' => esc_html__('Left', 'kidza' ),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'kidza' ),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__('Right', 'kidza' ),
                                    'icon' => 'fa fa-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__('Justified', 'kidza' ),
                                    'icon' => 'fa fa-align-justify',
                                ],
                            ],
                            'prefix_class' => 'elementor-align-',
                            'default' => '',
                            'selectors'         => [
                                '{{WRAPPER}} .pxl-button' => 'text-align: {{VALUE}}',
                                '{{WRAPPER}} .pxl-button .pxl-kid' => 'justify-content: {{VALUE}}',
                            ],
                        ),
                        
                        array(
                            'name' => 'btn_icon',
                            'label' => esc_html__('Icon', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'label_block' => true,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'icon_align',
                            'label' => esc_html__('Icon Position', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'left',
                            'options' => [
                                'left' => esc_html__('Before', 'kidza' ),
                                'right' => esc_html__('After', 'kidza' ),
                            ],
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_button',
                    'label' => esc_html__('Button Normal', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'button_width',
                            'label' => esc_html__('Button Width', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px','%' ],
                            
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn-nanuk' => 'width: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-button .btn-kid .pxl-kid' => 'width: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-button .btn-kid ' => 'width: {{SIZE}}{{UNIT}};',

                            ],
                            
                        ), 
                        array(
                            'name' => 'btn_bg_color',
                            'label' => esc_html__('Background Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .pxl--text-wrap'   => 'background: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .pxl-icon--right'  => 'background: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn-kid .pxl-kid'  => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_color',
                            'label' => esc_html__('Button Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .pxl--text-wrap' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .pxl--btn-text' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn-kid .pxl-kid span'  => 'color: {{VALUE}};',
                            ],
                        ),
                        
                        array(
                            'name' => 'btn_typography',
                            'label' => esc_html__('Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-button .btn', '{{WRAPPER}} .pxl-button .pxl--btn-text',
                            'condition' => [
                                'btn_style' => ['btn-gsap', 'btn-slide-lr', 'btn-nina', 'btn-nanuk',],
                            ],
                        ),
                        array(
                            'name' => 'btn_typography_kid',
                            'label' => esc_html__('Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-button .btn-kid .pxl-kid span',
                            'condition' => [
                                'btn_style' => ['btn-kid'],
                            ],
                        ),
                        array(
                            'name'         => 'btn_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'kidza' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-button .btn',
                        ),
                        array(
                            'name' => 'border_type',
                            'label' => esc_html__( 'Border Type', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__( 'None', 'kidza' ),
                                'solid' => esc_html__( 'Solid', 'kidza' ),
                                'double' => esc_html__( 'Double', 'kidza' ),
                                'dotted' => esc_html__( 'Dotted', 'kidza' ),
                                'dashed' => esc_html__( 'Dashed', 'kidza' ),
                                'groove' => esc_html__( 'Groove', 'kidza' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .pxl--text-wrap' => 'border-style: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'border_width',
                            'label' => esc_html__( 'Border Width', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .pxl--text-wrap' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                            'responsive' => true,
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__( 'Border Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .pxl--text-wrap','{{WRAPPER}} .pxl-button .btn' => 'border-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                        ),
                        array(
                            'name' => 'btn_border_radius',
                            'label' => esc_html__('Border Radius', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_padding',
                            'label' => esc_html__('Padding', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                
                                '{{WRAPPER}} .pxl-button .pxl-kid' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                            ],
                            'control_type' => 'responsive',
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_button_hover',
                    'label' => esc_html__('Button Hover', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'color_hover',
                            'label' => esc_html__('Color Hover', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover .pxl--btn-text, {{WRAPPER}} .pxl-button .btn:focus .pxl--btn-text' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'background_gsap_hover',
                            'label' => esc_html__('Background Gsap Hover', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .button-spotlight' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color_hover',
                            'label' => esc_html__('Background Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn.btn-default:hover, {{WRAPPER}} .pxl-button .btn.btn-slide-lr:hover' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn.btn-default:hover, {{WRAPPER}} .pxl-button .btn.btn-default:hover' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn.btn-default:hover, {{WRAPPER}} .pxl-button .btn.btn-nina:hover' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn.btn-default:hover, {{WRAPPER}} .pxl-button .btn.btn-nanuk:hover' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn.btn-gsap:hover' => 'background-color: {{VALUE}};',

                            ],
                        ),
                        array(
                            'name' => 'icon_color_hv',
                            'label' => esc_html__('Icon Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button:hover .btn i' => 'color: {{VALUE}};',
                            ],
                            
                        ),
                        array(
                            'name' => 'btn_bg_color_active',
                            'label' => esc_html__('Background Color Active', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn.btn-default:active, {{WRAPPER}} .pxl-button .btn.btn-slide-lr:active' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn.btn-default:active, {{WRAPPER}} .pxl-button .btn.btn-default:active' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn.btn-default:active, {{WRAPPER}} .pxl-button .btn.btn-nina:active' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn.btn-default:active, {{WRAPPER}} .pxl-button .btn.btn-nanuk:active' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color_focus',
                            'label' => esc_html__('Background Color Focus', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn.btn-default:focus, {{WRAPPER}} .pxl-button .btn.btn-slide-lr:focus' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn.btn-default:focus, {{WRAPPER}} .pxl-button .btn.btn-default:focus' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn.btn-default:focus, {{WRAPPER}} .pxl-button .btn.btn-nina:focus' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-button .btn.btn-default:focus, {{WRAPPER}} .pxl-button .btn.btn-nanuk:focus' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name'         => 'btn_box_shadow_hover',
                            'label' => esc_html__( 'Box Shadow', 'kidza' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-button .btn:hover',
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_icon',
                    'label' => esc_html__('Icon', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'icon_bg',
                            'label' => esc_html__( 'Icon Background', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .pxl-btn-icon' => 'background: {{VALUE}} !important;',
                            ],
                        ),
                      
                        
                        array(
                            'name' => 'icon_linear_gradient',
                            'label' => esc_html__('Gradient Icon BG', 'kidza'),
                            'type'         => \Elementor\Group_Control_Background::get_type(), 
                            'control_type' => 'group', 
                            'types' => [ 'gradient' ],
                            'selector' => '{{WRAPPER}} .pxl-button .pxl-btn-icon',
                            'condition' => [
                                'style_color'   => ['gradient'],
                            ],
                        ),
                        array(
                            'name' => 'border_type2',
                            'label' => esc_html__( 'Border Type', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__( 'None', 'kidza' ),
                                'solid' => esc_html__( 'Solid', 'kidza' ),
                                'double' => esc_html__( 'Double', 'kidza' ),
                                'dotted' => esc_html__( 'Dotted', 'kidza' ),
                                'dashed' => esc_html__( 'Dashed', 'kidza' ),
                                'groove' => esc_html__( 'Groove', 'kidza' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .pxl-btn-icon' => 'border-style: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'icon_border_width',
                            'label' => esc_html__( 'Border Width', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .pxl-btn-icon' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                           
                            'responsive' => true,
                        ),
                        array(
                            'name' => 'icon_border_color',
                            'label' => esc_html__( 'Border Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .pxl-btn-icon' => 'border-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'icon_btn_border_radius',
                            'label' => esc_html__('Border Radius', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .pxl-btn-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-button .btn-kid' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .pxl-btn-icon ' => 'color: {{VALUE}};',
                            ],
                            
                        ),
                        array(
                            'name' => 'icon_font_size',
                            'label' => esc_html__('Font Size', 'kidza' ),
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
                                '{{WRAPPER}} .pxl-button .btn i' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_space_left',
                            'label' => esc_html__('Icon Spacer', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'default' => [
                                'size' => 9,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .pxl-icon--left i' => 'margin-right: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'icon_align' => ['left'],
                            ],
                        ),
                        
                        array(
                            'name' => 'icon_space_right',
                            'label' => esc_html__('Icon Spacer', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'default' => [
                                'size' => 9,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .pxl-icon--right i' => 'margin-left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'icon_align' => ['right'],
                            ],
                        ),
                    ),
                ),
                kidza_widget_animation_settings(),
            ),
        ),
    ),
    kidza_get_class_widget_path()
);