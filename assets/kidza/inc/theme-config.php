<?php if(!function_exists('kidza_configs')){
    function kidza_configs($value){
        $configs = [
            'theme_colors' => [
                'primary'   => [
                    'title' => esc_html__('Primary', 'kidza'), 
                    'value' => kidza()->get_opt('primary_color', '#070713')
                ],
                'secondary'   => [
                    'title' => esc_html__('Secondary', 'kidza'), 
                    'value' => kidza()->get_opt('secondary_color', '#4B5563')
                ],
                'third'   => [
                    'title' => esc_html__('Third', 'kidza'), 
                    'value' => kidza()->get_opt('third_color', '#F15F25')
                ],
                'for'   => [
                    'title' => esc_html__('For', 'kidza'), 
                    'value' => kidza()->get_opt('for_color', '#6754E9')
                ],
                'five'   => [
                    'title' => esc_html__('Five', 'kidza'), 
                    'value' => kidza()->get_opt('five_color', '#385469')
                ],
                'body-bg'   => [
                    'title' => esc_html__('Body Background Color', 'kidza'), 
                    'value' => kidza()->get_page_opt('body_bg_color', '#fff')
                ]
            ],
            'link' => [
                'color' => kidza()->get_opt('link_color', ['regular' => '#070713'])['regular'],
                'color-hover'   => kidza()->get_opt('link_color', ['hover' => '#F15F25'])['hover'],
                'color-active'  => kidza()->get_opt('link_color', ['active' => '#F15F25'])['active'],
            ],
            'gradient' => [
                'color-from' => kidza()->get_opt('gradient_color', ['from' => '#F1663E'])['from'],
                'color-to' => kidza()->get_opt('gradient_color', ['to' => '#3F30BE'])['to'],
            ],
               
        ];
        return $configs[$value];
    }
}
if(!function_exists('kidza_inline_styles')) {
    function kidza_inline_styles() {  
        
        $theme_colors      = kidza_configs('theme_colors');
        $link_color        = kidza_configs('link');
        $gradient_color    = kidza_configs('gradient');
        ob_start();
        echo ':root{';
            
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color-rgb: %2$s;', str_replace('#', '',$color),  kidza_hex_rgb($value['value']));
            }
            foreach ($link_color as $color => $value) {
                printf('--link-%1$s: %2$s;', $color, $value);
            }
            foreach ($gradient_color as $color => $value) {
                printf('--gradient-%1$s: %2$s;', $color, $value);
            }
        echo '}';

        return ob_get_clean();
         
    }
}
 