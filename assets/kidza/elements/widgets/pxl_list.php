<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_list',
        'title' => esc_html__('Case List', 'kidza'),
        'icon' => 'eicon-editor-list-ul',
        'categories' => array('pxltheme-core'),
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
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'kidza' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_list/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'kidza' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_list/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'kidza' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_list/layout3.jpg'
                                ],
                                  '4' => [
                                    'label' => esc_html__('Layout 4', 'kidza' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_list/layout4.jpg'
                                ],
                                  '5' => [
                                    'label' => esc_html__('Layout 5', 'kidza' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_list/layout5.jpg'
                                ],
                                  '6' => [
                                    'label' => esc_html__('Layout 6', 'kidza' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_list/layout6.jpg'
                                ],
                                  '7' => [
                                    'label' => esc_html__('Layout 7', 'kidza' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_list/layout7.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'kidza'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => ['1'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'heading',
                            'label' => esc_html__('Heading', 'kidza'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'lists',
                            'label' => esc_html__('Content', 'kidza'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'kidza' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'text',
                                    'label' => esc_html__('Text', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ text }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content2',
                    'label' => esc_html__('Content', 'kidza'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => ['2'],
                    ],
                    'controls' => array(                       
                        array(
                            'name' => 'lists2',
                            'label' => esc_html__('Content', 'kidza'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'pxl_icon2',
                                    'label' => esc_html__('Icon', 'kidza' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'description',
                                    'label' => esc_html__('Description', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'link2',
                                    'label' => esc_html__('Link', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                    
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content3',
                    'label' => esc_html__('Content', 'kidza'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => ['3'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'heading3',
                            'label' => esc_html__('Heading', 'kidza'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'lists3',
                            'label' => esc_html__('Content', 'kidza'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'pxl_icon3',
                                    'label' => esc_html__('Icon', 'kidza' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'text3',
                                    'label' => esc_html__('Text', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'des3',
                                    'label' => esc_html__('Description', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'link3',
                                    'label' => esc_html__('Link', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ text3 }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content4',
                    'label' => esc_html__('Content', 'kidza'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => ['4','5'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'heading4',
                            'label' => esc_html__('Heading', 'kidza'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'lists4',
                            'label' => esc_html__('Content', 'kidza'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'pxl_icon4',
                                    'label' => esc_html__('Icon', 'kidza' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'text4',
                                    'label' => esc_html__('Text', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'des4',
                                    'label' => esc_html__('Description', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'link4',
                                    'label' => esc_html__('Link', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ text4 }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content6',
                    'label' => esc_html__('Content', 'kidza'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => ['6'],
                    ],
                    'controls' => array(
              
                        array(
                            'name' => 'lists6',
                            'label' => esc_html__('Content', 'kidza'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'title6',
                                    'label' => esc_html__('Title', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'des6',
                                    'label' => esc_html__('Description', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ title6 }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content7',
                    'label' => esc_html__('Content', 'kidza'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => ['7'],
                    ],
                    'controls' => array(
                        
                        array(
                            'name' => 'lists7',
                            'label' => esc_html__('Content', 'kidza'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'pxl_icon7',
                                    'label' => esc_html__('Icon', 'kidza' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'heading7',
                                    'label' => esc_html__('Heading', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'text71',
                                    'label' => esc_html__('Text 1', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'text72',
                                    'label' => esc_html__('Text 2', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'link71',
                                    'label' => esc_html__('Link 1', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'link72',
                                    'label' => esc_html__('Link 2', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ heading7 }}}',
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
                            'label' => esc_html__('Style', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-1' => 'Default',
                                'style-2' => 'Style line',
                            ],
                            'default' => 'style-1',
                        ),
                        array(
                            'name' => 'heading_space',
                            'label' => esc_html__('Heading Space', 'kidza' ),
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
                                '{{WRAPPER}} .pxl-list .pxl-heading ' => 'padding-bottom: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'heading_space2',
                            'label' => esc_html__('Heading Margin', 'kidza' ),
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
                                '{{WRAPPER}} .pxl-list .pxl-heading ' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'line_color',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'condition' => [
                                'style' => ['style-2'],
                                'layout' => ['1'],

                            ],
                             'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .pxl-list1.style-2 .pxl-heading::before',
                            
                        ),
                        array(
                            'name' => 'line_color2',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'condition' => [
                                'style' => ['style-2'],
                                'layout' => ['3'],
                            ],
                             'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .pxl-list3.style-2 .pxl-heading::before',
                            
                        ),
                       
                        array(
                            'name' => 'item_padding',
                            'label' => esc_html__('Item Space', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl--item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'item_padding1',
                            'label' => esc_html__('Item Space 7', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'condition' => [
                                'layout' => ['7'],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list7 .pxl-item-right' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
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
                                '{{WRAPPER}} .pxl-list .pxl--item' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        
                    ),
                ),
                array(
                    'name' => 'section_style_icon',
                    'label' => esc_html__('Icon Style', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'icon_size',
                            'label' => esc_html__('Icon Size', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-icon i' => 'font-size: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'icon_color0',
                            'label' => esc_html__('Icon Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-icon i' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-list .pxl-icon svg path' => 'fill: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_height',
                            'label' => esc_html__('Icon Height', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'style-2',
                            'size_units' => [ 'px' ],
                            'condition' => [
                                'layout' => ['2'],
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-hv-cirle' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            
                        ),
                        
                        array(
                            'name' => 'icon_width',
                            'label' => esc_html__('Icon width', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'style-2',
                            'size_units' => [ 'px' ],
                            'condition' => [
                                'layout' => ['2'],
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list2 .pxl-hv-cirle' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_space',
                            'label' => esc_html__('Icon Space', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-icon i' => 'margin-right: {{SIZE}}{{UNIT}};',
                            ],
                            
                        ),
                        array(
                            'name' => 'icon_space2',
                            'label' => esc_html__('Icon Space', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'condition' => [
                                'layout' => ['2'],
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list2 .pxl-icon ' => 'margin-right: {{SIZE}}{{UNIT}};',
                            ],
                            
                        ),
                        
                        array(
                            'name' => 'icon_border',
                            'label' => esc_html__('Icon Border', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl--item .pxl-hv-cirle' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),   
                        
                    ),
                ),
                array(
                    'name' => 'section_style_7',
                    'label' => esc_html__('Text', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout' => ['7'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'heading_color7',
                            'label' => esc_html__('Heading Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-heading' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'heading_typography7',
                            'label' => esc_html__('Heading Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-list .pxl-heading',
                        ),
                        array(
                            'name' => 'text_color7',
                            'label' => esc_html__('Text Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list a' => 'color: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'text_typography7',
                            'label' => esc_html__('Text Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-list a',
                        ),
                        array(
                            'name' => 'link_hover7',
                            'label' => esc_html__('Link Hover', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list a:hover' => 'color: {{VALUE}};',
                            ],
                             'separator' => 'before',
                        ),   
                    ),
                ),
                array(
                    'name' => 'section_style_text',
                    'label' => esc_html__('Text', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout' => ['1','3'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'heading_color',
                            'label' => esc_html__('Heading Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list1 .pxl-heading' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-list3 .pxl-heading' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'heading_typography',
                            'label' => esc_html__('Heading Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-list1 .pxl-heading , {{WRAPPER}} .pxl-list3 .pxl-heading',
                        ),
                       
                        array(
                            'name' => 'text_margin_left',
                            'label' => esc_html__('Text Margin', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 7,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list1.style-2 .pxl-item--text' => 'margin-left: {{SIZE}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                       
                    ),
                ),
                array(
                    'name' => 'section_style_item',
                    'label' => esc_html__('Item', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout' => ['1','3'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'text_color',
                            'label' => esc_html__('Text Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-item--text' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'text_typography',
                            'label' => esc_html__('Text Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-list .pxl-item--text ',
                        ),
                        array(
                            'name' => 'color_hover',
                            'label' => esc_html__('Color Hover', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl--item:hover .pxl-item--text' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-list .pxl--item:hover .pxl-description' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_color1',
                            'label' => esc_html__('Color Icon', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl--item i' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-list .pxl-icon svg path' => 'fill: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_hv1',
                            'label' => esc_html__('Icon Hover', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl--item:hover .pxl-icon i' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-list .pxl--item:hover .pxl-icon svg path' => 'fill: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_size1',
                            'label' => esc_html__('Icon Size', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'style-2',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                            
                        ),
                        
                        array(
                            'name' => 'text_space_left',
                            'label' => esc_html__('Text Space Left', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list .pxl-item-right' => 'margin-left: {{SIZE}}{{UNIT}};',
                            ],
                            
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_des',
                    'label' => esc_html__('Description', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout' => ['3'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'des_color3',
                            'label' => esc_html__('Description Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list3 .pxl-description' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'des_typography3',
                            'label' => esc_html__('Description Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-list3 .pxl-description',
                        ),
                        array(
                            'name' => 'des_hover3',
                            'label' => esc_html__('DesCription Hover', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list3 .pxl--item:hover .pxl-description' => 'color: {{VALUE}};',
                            ],
                        ),
                        
                    ),
                ),
                array(
                    'name' => 'section_style_text2',
                    'label' => esc_html__('Text', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout' => ['2'],
                    ],
                    'controls' => array(
                        
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list2 .pxl-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-list2 .pxl-title',
                        ),
                        array(
                            'name' => 'des_color',
                            'label' => esc_html__('Description Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list2 .pxl-item-right a' => 'color: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ),
                        
                        array(
                            'name' => 'des_typography',
                            'label' => esc_html__('Description Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-list2 .pxl-item-right a',
                        ),
                        array(
                            'name' => 'background_icon',
                            'label' => esc_html__('Background Icon', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list2 .pxl-hv-cirle' => 'background: {{VALUE}};',
                            ],
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Color Icon', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list2 .pxl-hv-cirle g path' => 'fill: {{VALUE}};',
                                '{{WRAPPER}} .pxl-list2 .pxl-hv-cirle i' => 'color: {{VALUE}};',
                            ],
                        ),
                        
                        array(
                            'name' => 'icon_size2',
                            'label' => esc_html__('Icon Size', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'style-2',
                            'size_units' => [ 'px' ],
                            'condition' => [
                                'layout' => ['2'],
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list2 .pxl-hv-cirle i' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                            
                        ),
                        array(
                            'name' => 'title2_margin_bottom',
                            'label' => esc_html__('Title Space Bottom', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'condition' => [
                                'layout' => ['2'],
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list2 .pxl-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                            
                        ),
                    ),
                ),
                array(
                    'name' => 'style_layout4',
                    'label' => esc_html__('Style', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout' => ['4','5'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'heading_color4',
                            'label' => esc_html__('Heading Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list4 .pxl-heading' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-list5 .pxl-heading' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'heading_typography4',
                            'label' => esc_html__('Heading Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-list4 .pxl-heading , {{WRAPPER}} .pxl-list5 .pxl-heading',
                        ),
                        array(
                            'name' => 'des_color4',
                            'label' => esc_html__('Text ', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list4 .pxl-item--text' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-list5 .pxl-item--text' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'des_typography4',
                            'label' => esc_html__('Text Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-list4 .pxl-item--text , {{WRAPPER}} .pxl-list5 .pxl-item--text',
                        ),
                        array(
                            'name' => 'item_right_color4',
                            'label' => esc_html__('Description ', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list4 .pxl-item--description' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-list5 .pxl-item--description' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'item_right_typography4',
                            'label' => esc_html__('Description Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-list4 .pxl-item--description , {{WRAPPER}} .pxl-list5 .pxl-item--description',
                        ),
                        array(
                            'name' => 'icon_size4',
                            'label' => esc_html__('Icon Size', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list4 .pxl-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                            
                        ),
                        array(
                            'name' => 'icon_color4',
                            'label' => esc_html__('Icon Color ', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list4 .pxl-icon i' => 'color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'style_layout4_hover',
                    'label' => esc_html__('Hover', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout' => ['4'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'des_color4_hover',
                            'label' => esc_html__('Description ', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list4 .pxl--item:hover .pxl-item--content .pxl-item--text' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-list4 .pxl--item:hover .pxl-item--content .pxl-item--description' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-list5 .pxl--item:hover .pxl-item--content .pxl-item--text' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-list5 .pxl--item:hover .pxl-item--content .pxl-item--description' => 'color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style6',
                    'label' => esc_html__('Style', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout' => ['6'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'title_color6',
                            'label' => esc_html__('Title Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-list6 .pxl--item' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography6',
                            'label' => esc_html__('Description Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-list6 .pxl--item',
                        ), 
                    ),
                ),
                kidza_widget_animation_settings(),
            ),
        ),
    ),
    kidza_get_class_widget_path()
);