( function( $ ) {
    "use strict";
    var pxl_widget_circle_text_handler = function( $scope, $ ) {
        $scope.find(".pxl-video-player1 .circle-type").each(function (i,el) {
            
            setTimeout(function(){
                    const circleType  = new CircleType(el);
                    circleType.forceWidth(true);
            },100);
        });
        
    };

    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_video_player.default', pxl_widget_circle_text_handler );
    } );
} )( jQuery );