(function($) {
    "use strict";
    var pxl_widget_tabs_handler = function($scope, $) {
        // Tab effect: slide
        $scope.find(".pxl-tabs.tab-effect-slide .pxl-item--title").on("click", function(e) {
            e.preventDefault();
            var $this = $(this);
            var target = $this.data("target");
            var parent = $this.parents(".pxl-tabs");
            var $targetContent = $(target);
            var $switch = parent.find(".pxl-switch");
            var tabIndex = $this.index(); // Lấy index của tab (0-based)
            
            if ($this.hasClass("active")) {
                // Đóng tab hiện tại
                $this.removeClass("active");
                $targetContent.slideUp(300).removeClass("active");
                $switch.removeClass("active"); // Remove active khi đóng tab
            } else {
                // Đóng tất cả tabs và mở tab được click
                parent.find(".pxl-tabs--content .pxl-item--content").slideUp(300).removeClass("active");
                parent.find(".pxl-tabs--title .pxl-item--title").removeClass("active");
                
                $this.addClass("active");
                $targetContent.slideDown(300).addClass("active");
                
                // Chỉ add active cho switch nếu không phải tab đầu tiên (index > 0)
                if (tabIndex > 0) {
                    $switch.addClass("active");
                } else {
                    $switch.removeClass("active");
                }
            }
        });
       
        // Tab effect: fade
        $scope.find(".pxl-tabs.tab-effect-fade .pxl-item--title").on("click", function(e) {
            e.preventDefault();
            var $this = $(this);
            var target = $this.data("target");
            var parent = $this.parents(".pxl-tabs");
            var $switch = parent.find(".pxl-switch");
            var tabIndex = $this.index(); // Lấy index của tab (0-based)
            
            if ($this.hasClass("active")) {
                // Đóng tab hiện tại
                $this.removeClass("active");
                parent.find(".pxl-tabs--content .pxl-item--content").removeClass("active").hide();
                $switch.removeClass("active"); // Remove active khi đóng tab
            } else {
                // Đóng tất cả tabs và mở tab được click
                parent.find(".pxl-tabs--content .pxl-item--content").removeClass("active").hide();
                parent.find(".pxl-tabs--title .pxl-item--title").removeClass("active");
                
                $this.addClass("active");
                $(target).addClass("active").fadeIn(300);
                
                // Chỉ add active cho switch nếu không phải tab đầu tiên (index > 0)
                if (tabIndex > 0) {
                    $switch.addClass("active");
                } else {
                    $switch.removeClass("active");
                }
            }
        });
        
        // Ẩn tất cả content không active khi khởi tạo
        $scope.find(".pxl-tabs").each(function() {
            $(this).find(".pxl-item--content").not('.active').hide();
        });
    };
    
    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/pxl_tabs.default', pxl_widget_tabs_handler);
    });
})(jQuery);