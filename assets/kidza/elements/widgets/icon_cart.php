<?php
// Register Button Widget
pxl_add_custom_widget(
    array(
        'name' => 'icon_cart',
        'title' => esc_html__('Case Shop Cart', 'kidza' ),
        'icon' => 'eicon-cart-medium',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source Settings', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        
                        array(
                            'name' => 'icon_image_type',
                            'label' => esc_html__('Icon Image Type', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'img' => 'Image',
                                'ic' => 'Icon',
                            ],
                            'default' => 'ic',
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'icon_image_type' => ['ic'],
                            ],
                        ),
                        array(
                            'name' => 'image',
                            'label' => esc_html__( 'Icon Image', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'icon_image_type' => ['img'],
                            ],
                        ),
                        
                        array(
                            'name' => 'size',
                            'label' => esc_html__('Icon Size', 'kidza' ),
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
                                '{{WRAPPER}} .pxl-cart-sidebar-button i' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'width',
                            'label' => esc_html__('width', 'kidza' ),
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
                                '{{WRAPPER}} .pxl-cart.pxl-cart-sidebar-button' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'height',
                            'label' => esc_html__('width', 'kidza' ),
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
                                '{{WRAPPER}} .pxl-cart.pxl-cart-sidebar-button' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                         array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            
                            'selectors' => [
                                '{{WRAPPER}} .pxl-cart-sidebar-button i' => 'color: {{VALUE}};',
                            ],
                        ),
                         array(
                            'name' => 'border_color',
                            'label' => esc_html__('Border Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            
                            'selectors' => [
                                '{{WRAPPER}} .pxl-cart-sidebar-button' => 'border-color: {{VALUE}} !important;',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    kidza_get_class_widget_path()
);