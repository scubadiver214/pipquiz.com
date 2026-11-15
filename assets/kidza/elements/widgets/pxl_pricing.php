<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_pricing',
        'title' => esc_html__('Case Pricing', 'kidza'),
        'icon' => 'eicon-settings',
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_pricing/layout1.jpg'
                                ],
                                 '2' => [
                                    'label' => esc_html__('Layout 2', 'kidza' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_pricing/layout2.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
              
                array(
                    'name' => 'section_layout2',
                    'label' => esc_html__('Content', 'kidza'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                            'layout' => ['1'],
                        ],
                    'controls' => array(
                        array(
                            'name' => 'popular',
                            'label' => esc_html__('Popular', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'heading',
                            'label' => esc_html__('Heading', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'des',
                            'label' => esc_html__('Description', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                        ),
                        array(
                            'name' => 'price',
                            'label' => esc_html__('Price', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'month',
                            'label' => esc_html__('Month', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'list_item',
                            'label' => esc_html__('List Item', 'kidza'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'kidza' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'item',
                                    'label' => esc_html__('Item', 'kidza' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'item-style',
                                    'label' => esc_html__('Style', 'kidza' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'style-1' => 'Item Active',
                                        'style-2' => 'Style None',
                                        'style-3' => 'Style None 2',
                                    ],
                                    'default' => 'style-1',
                                ),
                            ),
                            'title_field' => '{{{ item }}}',
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        array(
                            'name' => 'pxl_icon2',
                            'label' => esc_html__('Icon', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'button_link',
                            'label' => esc_html__('Button Link', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_layout22',
                    'label' => esc_html__('Content', 'kidza'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                            'layout' => ['2'],
                        ],
                    'controls' => array(
                        array(
                            'name' => 'popular2',
                            'label' => esc_html__('Popular', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'heading2',
                            'label' => esc_html__('Heading', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'des2',
                            'label' => esc_html__('Description', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                        ),
                        array(
                            'name' => 'price2',
                            'label' => esc_html__('Price', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'month2',
                            'label' => esc_html__('Month', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'list_item21',
                            'label' => esc_html__('List Item', 'kidza'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'pxl_icon21',
                                    'label' => esc_html__('Icon', 'kidza' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'item2',
                                    'label' => esc_html__('Item', 'kidza' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'item-style2',
                                    'label' => esc_html__('Style', 'kidza' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'style-1' => 'Item Active',
                                        'style-2' => 'Style None',
                                        'style-3' => 'Style None 2',
                                    ],
                                    'default' => 'style-1',
                                ),
                            ),
                            'title_field' => '{{{ item2 }}}',
                        ),
                        array(
                            'name' => 'button_text2',
                            'label' => esc_html__('Button Text', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        array(
                            'name' => 'pxl_icon22',
                            'label' => esc_html__('Icon', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'button_link2',
                            'label' => esc_html__('Button Link', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                    ),
                ),
                 array(
                    'name' => 'section_first',
                    'label' => esc_html__('Item', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'item_background',
                            'label' => esc_html__('Background Item', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing' => 'background: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'item_background2',
                            'label' => esc_html__('Background Item', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-padding' => 'background: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['2'],
                            ],
                        ),
                        array(
                            'name' => 'btn_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'separator' => 'before',
                            'control_type' => 'group', 
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-content',
                        ),
                        array(
                            'name' => 'border_radius_item',
                            'label' => esc_html__('Border Radius', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ), 
                        array(
                            'name' => 'content_padding',
                            'label' => esc_html__('Content Padding', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'heading2_color',
                            'label' => esc_html__('Heading Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'separator' => 'after',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-heading' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'heading2_typography',
                            'label' => esc_html__('Heading Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-heading',
                        ),
                        array(
                            'name' => 'des_color',
                            'label' => esc_html__('Description Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'separator' => 'after',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-des' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'des_typography',
                            'label' => esc_html__('Description Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-des',
                        ),                        
                    ),
               
                ),
                array(
                    'name' => 'section_style2',
                    'label' => esc_html__('Content', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                 
                    'controls' => array(
                        
                        array(
                            'name' => 'price_typography',
                            'label' => esc_html__('Price Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-price',
                        ),
                        array(
                            'name' => 'price_color',
                            'label' => esc_html__('Price Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'separator' => 'after',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-price ' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'month_typography',
                            'label' => esc_html__('Month Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-month',
                        ),
                        array(
                            'name' => 'month_color',
                            'label' => esc_html__('Month Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'separator' => 'after',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-month' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'item2_padding',
                            'label' => esc_html__('Item Padding', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-price-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        
                        
                    ),
                ),
                //
                array(
                    'name' => 'section_Item',
                    'label' => esc_html__('Item', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    
                    'controls' => array(
                        
                        array(
                            'name' => 'item_typography',
                            'label' => esc_html__('Item Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item-title',
                        ),
                        array(
                            'name' => 'item_color',
                            'label' => esc_html__('Item Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-item-title' => 'color: {{VALUE}};',
                            ],
                        ),
                    ),
               
                ),
                //
                array(
                    'name' => 'section_button',
                    'label' => esc_html__('Button', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    
                    'controls' => array(
                        array(
                            'name' => 'button_typography',
                            'label' => esc_html__('Button Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--button',
                        ),
                        array(
                            'name' => 'button_color',
                            'label' => esc_html__('Button Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'separator' => 'before',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-item--button' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_bg',
                            'label' => esc_html__('Button background', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-item--button' => ' background: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_hv',
                            'label' => esc_html__('Button Hover', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'separator' => 'after',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing:hover .pxl-item--button' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'button_bg_hv',
                            'label' => esc_html__('Button Bg Hover', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing:hover .pxl-item--button' => 'background: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_padding',
                            'label' => esc_html__('Button Padding', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-item--button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'btn_space_top',
                            'label' => esc_html__('Button Spacer Top', 'kidza' ),
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
                                '{{WRAPPER}} .pxl-pricing .pxl-item--button' => 'margin-top: {{SIZE}}{{UNIT}};',
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