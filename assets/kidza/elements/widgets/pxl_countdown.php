<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_countdown',
        'title' => esc_html__('Case Countdown', 'kidza'),
        'icon' => 'eicon-countdown',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'kidza-countdown',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_layout',
                    'label' => esc_html__('Layout', 'kidza'),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'kidza'),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'kidza'),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_countdown/layout1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'countdown_section',
                    'label' => esc_html__('Content', 'kidza'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'kidza'),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'placeholder' => esc_html__('Enter your title', 'kidza'),
                            'description' => 'Create highlight text width shortcode: [highlight text="Text Demo"]',
                            'label_block' => true,
                            'condition' => [
                                'layout' => ['2'],
                            ],
                        ),
                        array(
                            'name' => 'date',
                            'label' => esc_html__('Date', 'kidza'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('2040/10/10', 'kidza'),
                            'placeholder' => esc_html__('yy/mm/dd', 'kidza'),
                            'label_block' => true,
                            'description' => esc_html__('Set date count down (Date format: yy/mm/dd)', 'kidza'),
                        ),
                        array(
                            'name' => 'day',
                            'label' => esc_html__('Days Text', 'kidza'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__('Days', 'kidza'),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'hour',
                            'label' => esc_html__('Hours Text', 'kidza'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__('Hours', 'kidza'),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'minute',
                            'label' => esc_html__('Minutes Text', 'kidza'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__('Minutes', 'kidza'),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'second',
                            'label' => esc_html__('Seconds Text', 'kidza'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__('Seconds', 'kidza'),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'align',
                            'label' => esc_html__('Alignment', 'kidza'),
                            'type' => 'choose',
                            'control_type' => 'responsive',
                            'options' => [
                                'start' => [
                                    'title' => esc_html__('Start', 'kidza'),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'kidza'),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'end' => [
                                    'title' => esc_html__('End', 'kidza'),
                                    'icon' => 'eicon-text-align-right',
                                ]
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown' => 'justify-content: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_countdown',
                    'label' => esc_html__('Countdown', 'kidza'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'show_svg',
                            'label' => esc_html__('Pipe', 'kidza'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'svg-on' => esc_html__('Show', 'kidza'),
                                'svg-off' => esc_html__('Hidden', 'kidza'),
                            ],
                            'default' => 'svg-off',
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'countdown_color',
                            'label' => esc_html__('Number Color', 'kidza'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .countdown-item .countdown-amount' => 'color: {{VALUE}};',
                            ],
                        ),

                        array(
                            'name' => 'number_typography',
                            'label' => esc_html__('Number Typography', 'kidza'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .countdown-item .countdown-amount',
                        ),
                        array(
                            'name' => 'number_margin',
                            'label' => esc_html__('Number Margin', 'kidza'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%', 'vw', 'vh'],
                            'selectors' => [
                                '{{WRAPPER}} .countdown-item .countdown-amount' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'period_color',
                            'label' => esc_html__('Period Color', 'kidza'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .countdown-item .countdown-period' => 'color: {{VALUE}};',
                            ],
                        ),

                        array(
                            'name' => 'period_typography',
                            'label' => esc_html__('Period Typography', 'kidza'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .countdown-item .countdown-period',
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'dot_color',
                            'label' => esc_html__('Dot Color', 'kidza'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .countdown-item:after' => 'color: {{VALUE}};',
                            ],
                            'condition' => ['show_svg' => 'svg-off'],
                        ),

                        array(
                            'name' => 'dot_size',
                            'label' => esc_html__('Dot Size (px)', 'kidza'),
                            'type' => 'slider',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'condition' => ['show_svg' => 'svg-off'],
                            'selectors' => [
                                '{{WRAPPER}} .countdown-item:after' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'dot_margin',
                            'label' => esc_html__('Dot Margin', 'kidza'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%', 'vw', 'vh'],
                            'selectors' => [
                                '{{WRAPPER}} .countdown-item:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => ['show_svg' => 'svg-off'],
                        ),
                        array(
                            'name' => 'svg_color',
                            'label' => esc_html__('SVG Color', 'kidza'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .countdown-item-inner svg' => 'fill: {{VALUE}};',
                            ],
                            'condition' => ['show_svg' => 'svg-on'],
                        ),

                        array(
                            'name' => 'svg_size',
                            'label' => esc_html__('SVG Size', 'kidza'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%', 'vw', 'vh'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .countdown-item-inner' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}}; border-radius: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => ['show_svg' => 'svg-on'],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_box',
                    'label' => esc_html__('Box', 'kidza'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'countdown_bg_color',
                            'label' => esc_html__('Countdown Background Color', 'kidza'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown' => 'background-color: {{VALUE}};',
                            ],
                        ),

                        array(
                            'name' => 'countdown_padding',
                            'label' => esc_html__('Countdown Padding', 'kidza'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%', 'vw', 'vh'],
                            'default' => [
                                'unit' => 'px',
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'c_width',
                            'label' => esc_html__('Max Width', 'kidza'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%', 'vw', 'vh'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown-wrap .pxl-countdown' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'border_type',
                            'label' => esc_html__('Border Type', 'kidza'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__('None', 'kidza'),
                                'solid' => esc_html__('Solid', 'kidza'),
                                'double' => esc_html__('Double', 'kidza'),
                                'dotted' => esc_html__('Dotted', 'kidza'),
                                'dashed' => esc_html__('Dashed', 'kidza'),
                                'groove' => esc_html__('Groove', 'kidza'),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown-wrap' => 'border-style: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'border_width',
                            'label' => esc_html__('Border Width', 'kidza'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown-wrap' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                            'responsive' => true,
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__('Border Color', 'kidza'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown-wrap' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                        ),

                        array(
                            'name' => 'box_padding',
                            'label' => esc_html__('Box Padding', 'kidza'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%', 'vw', 'vh'],
                            'default' => [
                                'unit' => 'px',
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                kidza_widget_animation_settings()
            ),
        ),
    ),
    kidza_get_class_widget_path()
);