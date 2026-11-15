<?php

if (!class_exists('kidza_Footer')) {

    class kidza_Footer
    {
        public function getFooter()
        {
            if(is_singular('elementor_library')) return;
            
            $footer_layout = (int)kidza()->get_opt('footer_layout');
            
            if ($footer_layout <= 0 || !class_exists('Pxltheme_Core') || !is_callable( 'Elementor\Plugin::instance' )) {
                get_template_part( 'template-parts/footer/default');
            } else {
                $args = [
                    'footer_layout' => $footer_layout
                ];
                get_template_part( 'template-parts/footer/elementor','', $args );
            } 

            // Back To Top
            $back_totop_on = kidza()->get_theme_opt('back_totop_on', true); 
            if (isset($back_totop_on) && $back_totop_on) : ?>
                <a class="pxl-scroll-top" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M12 19V5" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M19 12L12 5L5 12" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            <?php endif;

            // Mouse Move Animation
            kidza_mouse_move_animation();

            // Cookie Policy
            kidza_cookie_policy();

            // Subscribe Popup
            kidza_subscribe_popup();

            // Page Popup
            kidza_page_popup();

            // Cart Sidebar
            kidza_hook_anchor_cart();
            
        }
 
    }
}
 