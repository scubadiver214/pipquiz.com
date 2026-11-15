<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );

pxl_add_custom_widget(
    array(
        'name' => 'pxl_testimonial_carousel',
        'title' => esc_html__('Case Testimonial Carousel', 'kidza'),
        'icon' => 'eicon-testimonial',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
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
                            'default' => '1',
                            'options' => [ 
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'kidza' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_testimonial_carousel/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'kidza' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_testimonial_carousel/layout2.jpg'
                                ],   
                                 '3' => [
                                    'label' => esc_html__('Layout 3', 'kidza' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_testimonial_carousel/layout3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__('Layout 4', 'kidza' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_testimonial_carousel/layout4.jpg'
                                ],
                                '5' => [
                                    'label' => esc_html__('Layout 5', 'kidza' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_testimonial_carousel/layout5.jpg'
                                ],
                                '6' => [
                                    'label' => esc_html__('Layout 6', 'kidza' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_testimonial_carousel/layout6.jpg'
                                ],
                                '7' => [
                                    'label' => esc_html__('Layout 7', 'kidza' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_testimonial_carousel/layout7.jpg'
                                ],
                                '8' => [
                                    'label' => esc_html__('Layout 8', 'kidza' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_testimonial_carousel/layout8.jpg'
                                ],       
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'kidza'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                   
                        array(
                            'name' => 'testimonial1',
                            'label' => esc_html__('Testimonial', 'kidza'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => ['1','2','6','8'],
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'background',
                                    'label' => esc_html__('Background', 'kidza' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'kidza' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'subtitle',
                                    'label' => esc_html__('Subtitle', 'kidza' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'show_label' => false,
                                ),
                                array(
                                    'name' => 'content',
                                    'label' => esc_html__('Content', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'title_link',
                                    'label' => esc_html__('Title Link', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),                              
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ name }}}',
                        ),
                        array(
                            'name' => 'testimonial3',
                            'label' => esc_html__('Testimonial', 'kidza'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => ['3'],
                            ],
                            'controls' => array(

                                array(
                                    'name' => 'image3',
                                    'label' => esc_html__('Image', 'kidza' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title3',
                                    'label' => esc_html__('Title', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),   
                                array(
                                    'name' => 'content3',
                                    'label' => esc_html__('Content', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                                                             
                                array(
                                    'name' => 'icon_ab1',
                                    'label' => esc_html__('Icon 1', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'icon_ab2',
                                    'label' => esc_html__('Icon 2', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'icon_ab3',
                                    'label' => esc_html__('Icon 3', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'icon_ab4',
                                    'label' => esc_html__('Icon 4', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'icon_ab5',
                                    'label' => esc_html__('Icon 5', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ), 
                            ),
                            'title_field' => '{{{ title3 }}}',
                        ),
                        array(
                            'name' => 'testimonial4',
                            'label' => esc_html__('Testimonial', 'kidza'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => ['4'],
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'year4',
                                    'label' => esc_html__('Year', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ), 
                                array(
                                    'name' => 'title4',
                                    'label' => esc_html__('Title', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),   
                                array(
                                    'name' => 'content4',
                                    'label' => esc_html__('Content', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                                                             
                                
                            ),
                            'title_field' => '{{{ title4 }}}',
                        ),
                        array(
                            'name' => 'testimonial5',
                            'label' => esc_html__('Testimonial', 'kidza'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => ['5'],
                            ],
                            'controls' => array(

                                array(
                                    'name' => 'image5',
                                    'label' => esc_html__('Image', 'kidza' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title5',
                                    'label' => esc_html__('Title', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),   
                                array(
                                    'name' => 'content5',
                                    'label' => esc_html__('Content', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                                 array(
                                    'name' => 'link_teacher',
                                    'label' => esc_html__('Link', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),                            
                                array(
                                    'name' => 'icon_ab51',
                                    'label' => esc_html__('Icon 1', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'icon_ab52',
                                    'label' => esc_html__('Icon 2', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'icon_ab53',
                                    'label' => esc_html__('Icon 3', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'icon_ab54',
                                    'label' => esc_html__('Icon 4', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'icon_ab55',
                                    'label' => esc_html__('Icon 5', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ), 
                            ),
                            'title_field' => '{{{ title5 }}}',
                        ),
                        array(
                            'name' => 'testimonial7',
                            'label' => esc_html__('Testimonial', 'kidza'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => ['7'],
                            ],
                            'controls' => array(

                                array(
                                    'name' => 'image7',
                                    'label' => esc_html__('Image', 'kidza' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title7',
                                    'label' => esc_html__('Title', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),   
                                array(
                                    'name' => 'subtitle7',
                                    'label' => esc_html__('Content', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'link7',
                                    'label' => esc_html__('Link', 'kidza'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),   
                            ),
                            'title_field' => '{{{title7}}}',
                        ),
                    ),
                ),
                 array(
                    'name' => 'section_layout1',
                    'label' => esc_html__('Style', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                                'layout' => ['1'],
                            ],
                    'controls' => array(
                       
                        array(
                            'name' => 'content_color',
                            'label' => esc_html__('Content Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel1 .pxl-content ' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'content_typography',
                            'label' => esc_html__('Content Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel1 .pxl-content',
                            
                        ),
                        array(
                            'name' => 'content_space_top',
                            'label' => esc_html__('Content Spacer (Top)', 'kidza' ),
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
                                '{{WRAPPER}}  .pxl-testimonial-carousel1 .pxl-content' => 'margin-top: {{SIZE}}{{UNIT}} ;',
                            ],
                        ),
                        array(
                            'name' => 'content_space_bottom',
                            'label' => esc_html__('Content Spacer (Bottom)', 'kidza' ),
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
                                '{{WRAPPER}}  .pxl-testimonial-carousel1 .pxl-content' => 'margin-bottom: {{SIZE}}{{UNIT}} ;',
                            ],
                        ),
                        array(
                            'name' => 'name_color',
                            'label' => esc_html__('Name Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel1 .pxl-info .pxl-name' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'name_typography',
                            'label' => esc_html__('Name Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel1 .pxl-info .pxl-name',
                        ),
                        array(
                            'name' => 'position_color',
                            'label' => esc_html__('Position Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel1 .pxl-info .pxl-position' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'position_typography',
                            'label' => esc_html__('Position Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel1 .pxl-info .pxl-position',
                        ),
                        array(
                            'name' => 'info_space_bottom',
                            'label' => esc_html__('Info Spacer (Bottom)', 'kidza' ),
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
                                '{{WRAPPER}}  .pxl-testimonial-carousel4 .pxl-info' => 'margin-bottom: {{SIZE}}{{UNIT}} ;',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_layout4',
                    'label' => esc_html__('Style', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                                'layout' => ['4'],
                            ],
                    'controls' => array(
                        array(
                            'name' => 'year_color4',
                            'label' => esc_html__('Year Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel4 .pxl-year ' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'year_typography4',
                            'label' => esc_html__('Year Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel4 .pxl-year',
                            
                        ),
                        
                        array(
                            'name' => 'title_color4',
                            'label' => esc_html__('Title Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel4 .pxl-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography4',
                            'label' => esc_html__('Title Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel4 .pxl-title',
                        ),
                        array(
                            'name' => 'content_color4',
                            'label' => esc_html__('Content Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel4 .pxl-content' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'content_typography4',
                            'label' => esc_html__('Content Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel4 .pxl-content',
                        ),
                        
                    ),
                ),
                array(
                    'name' => 'section_layout6',
                    'label' => esc_html__('Style', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                                'layout' => ['2','6'],
                            ],
                    'controls' => array(
                        array(
                            'name' => 'style1',
                            'label' => esc_html__('Style', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                            ],
                            'default' => 'style1',
                        ),
                        array(
                            'name' => 'content_color6',
                            'label' => esc_html__('Content Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-content ' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'content_typography6',
                            'label' => esc_html__('Content Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-content',
                            
                        ),
                        
                        array(
                            'name' => 'title_color6',
                            'label' => esc_html__('Title Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography6',
                            'label' => esc_html__('Title Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-title',
                        ),
                        array(
                            'name' => 'sub_color6',
                            'label' => esc_html__('Subtitle Color', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-subtitle' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_typography4',
                            'label' => esc_html__('Subtitle Typography', 'kidza' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-subtitle',
                        ),
                        
                    ),
                ),
                
                array(
                    'name' => 'star_layout2',
                    'label' => esc_html__('Start', 'kidza' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                                'layout' => ['2'],
                            ],
                    'controls' => array(
                       
                        array(
                            'name' => 'show_star',
                            'label' => esc_html__('Show Star', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'style_star',
                            'label' => esc_html__('Choose Star', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '5' => '5 Star',
                                '4' => '4 Star',
                                '3' => '3 Star',
                                '2' => '2 Star',
                                '1' => '1 Star',
                            ],
                            'default' => '5',
                        ),                
                    ),
                ),
                array(
                    'name' => 'section_settings_carousel',
                    'label' => esc_html__('Settings', 'kidza'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'padding',
                            'label' => esc_html__('Padding', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item-inner ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                'auto' => 'Auto',
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_sm',
                            'label' => esc_html__('Columns SM Devices', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                'auto' => 'Auto',
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_md',
                            'label' => esc_html__('Columns MD Devices', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                'auto' => 'Auto',
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns LG Devices', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                'auto' => 'Auto',
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns XL Devices', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                'auto' => 'Auto',
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_xxl',
                            'label' => esc_html__('Columns XXL Devices', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),

                        array(
                            'name' => 'slides_to_scroll',
                            'label' => esc_html__('Slides to scroll', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'arrows',
                            'label' => esc_html__('Show Arrows', 'kidza'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        
                        array(
                            'name' => 'pagination',
                            'label' => esc_html__('Show Pagination', 'kidza'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'pagination_type',
                            'label' => esc_html__('Pagination Type', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'bullets',
                            'options' => [
                                'bullets' => 'Bullets',
                                'fraction' => 'Fraction',
                            ],
                            'condition' => [
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'kidza'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'kidza'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'autoplay_speed',
                            'label' => esc_html__('Autoplay Delay', 'kidza'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 5000,
                            'condition' => [
                                'autoplay' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'infinite',
                            'label' => esc_html__('Infinite Loop', 'kidza'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'kidza'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                        array(
                            'name' => 'drap',
                            'label' => esc_html__('Show Scroll Drap', 'kidza'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'offset_left',
                            'label' => esc_html__('Offset Left', 'kidza' ),
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
                                '{{WRAPPER}} .pxl-swiper-sliders .pxl-swiper-container' => 'margin-left: -{{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'offset_right',
                            'label' => esc_html__('Offset Right', 'kidza' ),
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
                                '{{WRAPPER}} .pxl-swiper-sliders .pxl-swiper-container' => 'margin-right: -{{SIZE}}{{UNIT}};',
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