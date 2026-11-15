<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_accordion',
        'title' => esc_html__('Case Accordion', 'kidza' ),
        'icon' => 'eicon-accordion',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'kidza-accordion'
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_layout',
                    'label' => esc_html__('Layout', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'kidza' ),
                            'type' => 'layoutcontrol',
                            'default' => '2',
                            'options' => [
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'kidza' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_accordion/layout2.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content2',
                    'label' => esc_html__('Content', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                                'layout' => ['2'],
                            ],
                    'controls' => array(
                        array(
                            'name' => 'style2',
                            'label' => esc_html__('Style', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style Number',
                                'style2' => 'Style 2',
                                'icon_svg' => 'Icon Svg'
                            ],
                            'default' => 'style1',
                        ),
                        array(
                            'name' => 'active2',
                            'label' => esc_html__('Active', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'separator' => 'after',
                            'default' => '1',
                        ),
                        array(
                            'name' => 'accordion2',
                            'label' => esc_html__('Accordion', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'title2',
                                    'label' => esc_html__('Title', 'kidza' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'desc2',
                                    'label' => esc_html__('Content', 'kidza' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                ),
                                
                            ),
                            'title_field' => '{{{ title2 }}}',
                            'separator' => 'after',
                        ),
                    ),
                ),
               
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                     
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-accordion .pxl-item--title',
                        ),
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
                            'default' => 'h5',
                        ),
                        array(
                            'name' => 'title_padding',
                            'label' => esc_html__('Title Space', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl--item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_content',
                    'label' => esc_html__('Content', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                                'layout' => ['2'],
                            ],
                    'controls' => array(
                        
                        array(
                            'name' => 'content_color',
                            'label' => esc_html__('Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-accordion .pxl-item--content' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_typography',
                            'label' => esc_html__('Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-accordion .pxl-item--content',
                        ),
                    ),
                ),
                //
                kidza_widget_animation_settings(),
            ),
        ),
    ),
    kidza_get_class_widget_path()
);