<?php
if(class_exists('WPCF7')) {
    $cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');

    $contact_forms = array();
    if ($cf7) {
        foreach ($cf7 as $cform) {
            $contact_forms[$cform->ID] = $cform->post_title;
        }
    } else {
        $contact_forms[esc_html__('No contact forms found', 'kidza')] = 0;
    }

    pxl_add_custom_widget(
        array(
            'name' => 'pxl_contact_form',
            'title' => esc_html__('Case Contact Form', 'kidza'),
            'icon' => 'eicon-form-horizontal',
            'categories' => array('pxltheme-core'),
            'params' => array(
                'sections' => array(
                    array(
                        'name' => 'tab_content',
                        'label' => esc_html__('Content', 'kidza'),
                        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                        'controls' => array(
                            array(
                                'name' => 'form_id',
                                'label' => esc_html__('Select Form', 'kidza'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => $contact_forms,
                            ),
                        ),
                    ),
                    array(
                        'name' => 'tab_style_input',
                        'label' => esc_html__('Input', 'kidza'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'controls' => array(
                            array(
                                'name' => 'not_valid_tip_color',
                                'label' => esc_html__('Not Valid Tip Color', 'kidza' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form1 .wpcf7-not-valid-tip' => 'color: {{VALUE}} !important;',
                                ],
                                
                            ),
                            array(
                                'name' => 'response_output_color',
                                'label' => esc_html__('Response Out Color', 'kidza' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form1 form .wpcf7-response-output' => 'color: {{VALUE}} !important;',
                                ],
                                'separator' => 'before',
                            ),
                            array(
                                'name' => 'item_padding',
                                'label' => esc_html__('Item Padding', 'kidza' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form1 .contact1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                            array(
                                'name' => 'item_background',
                                'label' => esc_html__('Item Background', 'kidza' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form1 .contact1' => 'background: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'heading_color',
                                'label' => esc_html__('Heading Color', 'kidza' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form1 .contact1 .pxl-heading p' => 'color: {{VALUE}};',
                                ],
                                'separator' => 'before',
                            ),
                            array(
                                'name' => 'heading_typography',
                                'label' => esc_html__('Heading Typography', 'kidza' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-contact-form1 .contact1 .pxl-heading p',
                            ),
                            array(
                                'name' => 'heading_spacer_bottom',
                                'label' => esc_html__('Heading Spacer Bottom', 'kidza' ),
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
                                    '{{WRAPPER}} .pxl-contact-form1 .contact1 .pxl-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'input_color',
                                'label' => esc_html__('Input Color', 'kidza' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form input' => 'color: {{VALUE}};',
                                    '{{WRAPPER}} .pxl-contact-form textarea' => 'color: {{VALUE}};',
                                ],
                                'separator' => 'before',
                            ),
                            array(
                                'name' => 'input_typography',
                                'label' => esc_html__('Input Typography', 'kidza' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-contact-form input , {{WRAPPER}} .pxl-contact-form textarea, {{WRAPPER}} .pxl-contact-form .pxl-select .pxl-select-higthlight , .pxl-contact-form .pxl-select-options li',
                            ),
                            array(
                                'name' => 'input_spacer_bottom',
                                'label' => esc_html__('Input Spacer Bottom', 'kidza' ),
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
                                    '{{WRAPPER}} .pxl-contact-form1 .contact1 .pxl-row2' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'label_color',
                                'label' => esc_html__('Label Color', 'kidza' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .pxl-label' => 'color: {{VALUE}};',
                                ],
                                'separator' => 'before',
                            ),
                            array(
                                'name' => 'label_typography',
                                'label' => esc_html__('Label Typography', 'kidza' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-contact-form .pxl-label',
                            ),
                            
                        ),
                    ),
                    array(
                        'name' => 'tab_style_input_hover',
                        'label' => esc_html__('Input Hover', 'kidza'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'controls' => array(
                            array(
                                'name' => 'input_color_hover',
                                'label' => esc_html__('Color', 'kidza' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):hover, {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight:hover, {{WRAPPER}} .pxl-contact-form .pxl-select-higthlight.active' => 'color: {{VALUE}};',
                                ],
                            ),
                            
                            array(
                                'name' => 'input_bg_focus',
                                'label' => esc_html__('Background Focus', 'kidza' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-form-control:not(.wpcf7-submit):focus' => 'background-color: {{VALUE}};',
                                ],
                            ),  
                            array(
                                'name' => 'button_color_hv',
                                'label' => esc_html__('Button Color', 'kidza' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .contact-submit input:hover ' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'button_background_hv',
                                'label' => esc_html__('Button Background', 'kidza' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .contact-submit input:hover ' => 'background: {{VALUE}};',
                                ],
                            ),
                        ),
                    ),

                    array(
                        'name' => 'Message',
                        'label' => esc_html__('Message', 'kidza'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'controls' => array(
                            array(
                                'name' => 'height_message',
                                'label' => esc_html__('Height', 'kidza' ),
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
                                    '{{WRAPPER}} .pxl-contact-form1 textarea' => 'height: {{SIZE}}{{UNIT}} !important;',
                                ],
                            ),
                        ),
                    ),
                    array(
                        'name' => 'tab_style_button',
                        'label' => esc_html__('Button', 'kidza'),
                        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                        'controls' => array(
                            array(
                                'name' => 'btn_spacer_top',
                                'label' => esc_html__('Spacer Top', 'kidza' ),
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
                                    '{{WRAPPER}} .pxl-contact-form .wpcf7-submit' => 'margin-top: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'button_typography',
                                'label' => esc_html__('Button Typography', 'kidza' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-contact-form .contact-submit input ',
                            ),
                            array(
                                'name' => 'button_color',
                                'label' => esc_html__('Button Color', 'kidza' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .contact-submit input ' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'button_background',
                                'label' => esc_html__('Button Background', 'kidza' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-contact-form .contact-submit input ' => 'background: {{VALUE}};',
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
}