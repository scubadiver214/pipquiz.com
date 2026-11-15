<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_pagination',
        'title' => esc_html__('Case Pagination', 'kidza'),
        'icon' => 'eicon-apps',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'kidza'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'previous_title',
                            'label' => esc_html__('Previous Title', 'kidza'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'next_title',
                            'label' => esc_html__('Next Title', 'kidza'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link Dot', 'kidza' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'default' => [
                                'url' => '#',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    kidza_get_class_widget_path()
);