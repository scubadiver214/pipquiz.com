(function ($) {
    "use strict";

    function kidza_section_start_render() {
        var _elementor = typeof elementor != 'undefined' ? elementor : elementorFrontend;
        _elementor.hooks.addFilter('pxl_section_start_render', function (html, settings, el) {
            if (typeof settings.pxl_parallax_bg_img != 'undefined' && settings.pxl_parallax_bg_img.url != '') {
                html += '<div class="pxl-section-bg-parallax"></div>';
            }

            return html;
        });
    }
    function kidza_section_before_render() {
        var _elementor = typeof elementor != 'undefined' ? elementor : elementorFrontend;
        _elementor.hooks.addFilter('pxl-custom-section/before-render', function (html, settings, el) {
            return html;
        });
    }

    $(window).on('elementor/frontend/init', function () {

        kidza_section_start_render();
        kidza_section_before_render();
    });

})(jQuery);


