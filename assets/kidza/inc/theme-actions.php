<?php 
/**
 * Actions Hook for the theme
 *
 * @package Case-Themes
 */
add_action('after_setup_theme', 'kidza_setup');
function kidza_setup(){

    //Set the content width in pixels, based on the theme's design and stylesheet.
    $GLOBALS['content_width'] = apply_filters( 'kidza_content_width', 1200 );

    // Make theme available for translation.
    load_theme_textdomain( 'kidza', get_template_directory() . '/languages' );

    // Custom Header
    add_theme_support( 'custom-header' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    set_post_thumbnail_size( 1200, 750 );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary', 'kidza' ),
    ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for core custom logo.
    add_theme_support( 'custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
    add_theme_support( 'post-formats', array (
        '',
    ) );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');
    add_image_size( 'kidza-thumb-small', 260, 170, true );
    add_image_size( 'kidza-thumb-xs', 120, 104, true );
    add_image_size( 'kidza-large', 1200, 750, true );
    add_image_size( 'kidza-portfolio', 600, 600, true );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    remove_theme_support('widgets-block-editor');

}

/**
 * Register Widgets Position.
 */
add_action( 'widgets_init', 'kidza_widgets_position' );
function kidza_widgets_position() {
    register_sidebar( array(
        'name'          => esc_html__( 'Blog Sidebar', 'kidza' ),
        'id'            => 'sidebar-blog',
        'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
        'after_widget'  => '</div></section>',
        'before_title'  => '<h2 class="widget-title"><span>',
        'after_title'   => '</span></h2>',
    ) );

    if (class_exists('ReduxFramework')) {
        register_sidebar( array(
            'name'          => esc_html__( 'Page Sidebar', 'kidza' ),
            'id'            => 'sidebar-page',
            'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
            'after_widget'  => '</div></section>',
            'before_title'  => '<h2 class="widget-title"><span>',
            'after_title'   => '</span></h2>',
        ) );
    }

    if ( class_exists( 'Woocommerce' ) ) {
        register_sidebar( array(
            'name'          => esc_html__( 'Shop Sidebar', 'kidza' ),
            'id'            => 'sidebar-shop',
            'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
            'after_widget'  => '</div></section>',
            'before_title'  => '<h2 class="widget-title"><span>',
            'after_title'   => '</span></h2>',
        ) );
    }
}

/**
 * Enqueue Styles Scripts : Front-End
 */
add_action( 'wp_enqueue_scripts', 'kidza_scripts' );
function kidza_scripts() {  
    $kidza_version = wp_get_theme( get_template() );
    //button kid
    wp_enqueue_script( 'greensock', get_template_directory_uri() . '/assets/js/libs/greensock.min.js', array( 'jquery' ), '3.12.2', true );
    /* Popup Libs */
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/libs/magnific-popup.css', array(), '1.1.0');
    wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/libs/magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );
    wp_enqueue_script( 'slick-lib', get_template_directory_uri() . '/assets/js/libs/slick.min.js', array( 'jquery' ), '1.0.0', true );

    /* Wow Libs */
    wp_enqueue_style('wow-animate', get_template_directory_uri() . '/assets/css/libs/animate.min.css', array(), '1.1.0');
    wp_enqueue_script( 'wow-animate', get_template_directory_uri() . '/assets/js/libs/wow.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script('skrollr', get_template_directory_uri() . '/assets/js/libs/skrollr.js', array('jquery'), '1.1.0', false);
    /* Particles Background Libs */
    wp_register_script( 'particles-background', get_template_directory_uri() . '/assets/js/libs/particles.min.js', array( 'jquery' ), '1.1.0', true );
    wp_enqueue_script( 'kidza-cursor', get_template_directory_uri() . '/assets/js/libs/cursor.js', array( 'jquery' ), kidza()->get_version(), true ); 
    /* Parallax Image */
    wp_register_script( 'tilt', get_template_directory_uri() . '/assets/js/libs/tilt.min.js', array( 'jquery' ), '1.0.0', true );

    /* Parallax Libs */
    wp_register_script( 'stellar-parallax', get_template_directory_uri() . '/assets/js/libs/stellar-parallax.min.js', array( 'jquery' ), '0.6.2', true );
    // slider
    wp_register_script( 'swiper-bundle', get_template_directory_uri() . '/assets/js/libs/swiper-bundle.min.js', array( 'jquery' ), '12.0.3', true );
    wp_register_script( 'swiper-gl', get_template_directory_uri() . '/assets/js/libs/swiper-gl.min.js', array( 'jquery' ), '1.0.0', true );

    /* Nice Select */
    wp_enqueue_script( 'nice-select', get_template_directory_uri() . '/assets/js/libs/nice-select.min.js', array( 'jquery' ), 'all', true );

    /* Icons Lib - CSS */
    wp_enqueue_style('flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/css/flaticon.css' , array(), $kidza_version->get( 'Version' ));

    /* Counter Effect */
    wp_register_script( 'pxl-counter-slide', get_template_directory_uri() . '/assets/js/libs/counter-slide.min.js', array( 'jquery' ), '1.0.0', true );

    /* Scroll Effect */
    wp_register_script( 'pxl-scroll', get_template_directory_uri() . '/assets/js/libs/scroll.min.js', array( 'jquery' ), '0.6.0', true );

    /* Parallax Scroll */
    wp_register_script( 'pxl-parallax-scroll', get_template_directory_uri() . '/assets/js/libs/parallax-scroll.js', array( 'jquery' ), '1.0.0', true );
    wp_register_script( 'pxl-easing', get_template_directory_uri() . '/assets/js/libs/easing.js', array( 'jquery' ), '1.3.0', true );
    /* ripple */
    wp_enqueue_script( 'jquery-riple', get_template_directory_uri() . '/assets/js/libs/ripple.js', array( 'jquery' ), 'all', true );
    /* scroll magic */
    wp_enqueue_script( 'scroll-magic', get_template_directory_uri() . '/assets/js/libs/scrollmagic.min.js', array( 'jquery' ), '1.0.0', true );
    /* Tweenmax */
    wp_register_script( 'pxl-tweenmax', get_template_directory_uri() . '/assets/js/libs/tweenmax.min.js', array( 'jquery' ), '2.1.2', true );
    
    /* Parallax Move Mouse */
    wp_register_script( 'pxl-parallax-move-mouse', get_template_directory_uri() . '/assets/js/libs/parallax-move-mouse.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'curtains-lib', get_template_directory_uri() . '/assets/js/libs/curtains.min.js', array( 'jquery' ), '1.0.0', true );
    /* Woocommerce */
    wp_enqueue_script( 'pxl-woocommerce', get_template_directory_uri() . '/woocommerce/js/woocommerce.js', array( 'jquery' ), $kidza_version->get( 'Version' ), true );

    /* Cookie */
    wp_register_script( 'pxl-cookie', get_template_directory_uri() . '/assets/js/libs/cookie.js', array( 'jquery' ), '1.4.1', true );

    /* Direction Effect */
    wp_register_script('pxl-direction', get_template_directory_uri() . '/elements/widgets/js/direction.js', array('jquery'), '1.0.0', true);

    wp_enqueue_style( 'pxl-caseicon', get_template_directory_uri() . '/assets/css/caseicon.css', array(), $kidza_version->get( 'Version' ) );
    wp_enqueue_style( 'pxl-grid', get_template_directory_uri() . '/assets/css/grid.css', array(), $kidza_version->get( 'Version' ) );
    wp_enqueue_style( 'pxl-style', get_template_directory_uri() . '/assets/css/style.css', array(), $kidza_version->get( 'Version' ) );
    wp_add_inline_style( 'pxl-style', kidza_inline_styles() );
    wp_enqueue_style( 'pxl-base', get_template_directory_uri() . '/style.css', array(), $kidza_version->get( 'Version' ) );
    wp_enqueue_style( 'pxl-google-fonts', kidza_fonts_url(), array(), null );
    wp_enqueue_script( 'pxl-main', get_template_directory_uri() . '/assets/js/theme.js', array( 'jquery' ), $kidza_version->get( 'Version' ), true );
    wp_localize_script( 'pxl-main', 'main_data', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    do_action( 'kidza_scripts');
}

/**
 * Enqueue Styles Scripts : Back-End
 */
add_action('admin_enqueue_scripts', 'kidza_admin_style');
function kidza_admin_style() {
    $theme = wp_get_theme( get_template() );
    wp_enqueue_style( 'kidza-admin-style', get_template_directory_uri() . '/assets/css/admin.css', array(), $theme->get( 'Version' ) );
    wp_enqueue_style('flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/css/flaticon.css');
}

add_action( 'elementor/editor/before_enqueue_scripts', function() {
    wp_enqueue_style( 'elementor-flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/css/flaticon.css');
    wp_enqueue_style( 'kidza-admin-style', get_template_directory_uri() . '/assets/css/admin.css');
} );

/* Favicon */
add_action('wp_head', 'kidza_site_favicon');
function kidza_site_favicon(){
    $favicon = kidza()->get_theme_opt( 'favicon' );
    if(!empty($favicon['url']))
        echo '<link rel="icon" type="image/png" href="'.esc_url($favicon['url']).'"/>';
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
add_action( 'wp_head', 'kidza_pingback_header' );
function kidza_pingback_header(){
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}

/* Hidden Panel */
add_action( 'pxl_anchor_target', 'kidza_hook_anchor_templates_hidden_panel');
function kidza_hook_anchor_templates_hidden_panel(){

    $hidden_templates = kidza_get_templates_slug('hidden-panel');
    if(empty($hidden_templates)) return;

    foreach ($hidden_templates as $slug => $values){
        $args = [
            'slug' => $slug,
            'post_id' => $values['post_id']
        ];
        if( did_action('pxl_anchor_target_hidden_panel_'.$values['post_id']) <= 0){  
            do_action( 'pxl_anchor_target_hidden_panel_'.$values['post_id'], $args );  
        }
    } 
}
if(!function_exists('kidza_hook_anchor_hidden_panel')){
    function kidza_hook_anchor_hidden_panel($args){
        $hidden_panel_bg = get_post_meta( $args['post_id'], 'hidden_panel_bg', true );
        $hidden_panel_width = get_post_meta( $args['post_id'], 'hidden_panel_width', true );
        ?>
        <div id="pxl-hidden-panel-popup" class="pxl-popup-wrap">
            <div class="pxl-item--overlay pxl-cursor--cta"></div>
            <div class="pxl-item--conent" style="background-color: <?php echo esc_attr($hidden_panel_bg); ?>; width:<?php echo esc_attr($hidden_panel_width).'px'; ?>;">
                <div class="pxl-item--close pxl-close pxl-cursor--cta"></div>
                <div class="pxl-conent-elementor">
                    <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$args['post_id']); ?>
                </div>
            </div>
        </div>
    <?php }
}

/* Elementor Popup */
add_action( 'pxl_anchor_target', 'kidza_hook_anchor_templates_popup');
function kidza_hook_anchor_templates_popup(){

    $popup_templates = kidza_get_templates_slug('popup');
    if(empty($popup_templates)) return;

    foreach ($popup_templates as $slug => $values){
        $args = [
            'slug' => $slug,
            'post_id' => $values['post_id']
        ];
        if( did_action('pxl_anchor_target_popup_'.$values['post_id']) <= 0){  
            do_action( 'pxl_anchor_target_popup_'.$values['post_id'], $args );  
        }
    } 
}
if(!function_exists('kidza_hook_anchor_popup')){
    function kidza_hook_anchor_popup($args){ ?>
        <div id="pxl-popup-elementor" class="pxl-popup-elementor-wrap">
            <div class="pxl-item--overlay pxl-cursor--cta">
                <div class="pxl-item--flip pxl-item--flip1"></div>
                <div class="pxl-item--flip pxl-item--flip2"></div>
                <div class="pxl-item--flip pxl-item--flip3"></div>
                <div class="pxl-item--flip pxl-item--flip4"></div>
                <div class="pxl-item--flip pxl-item--flip5"></div>
            </div>
            <div class="pxl-item--close pxl-close pxl-cursor--cta"></div>
            <div class="pxl-item--conent">
                <div class="pxl-conent-elementor">
                    <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$args['post_id']); ?>
                </div>
            </div>
        </div>
    <?php }
}

/* Search Popup */
if(!function_exists('kidza_hook_anchor_search')){
    function kidza_hook_anchor_search(){ ?>
        <div id="pxl-search-popup" class="pxl-popup-wrap">
            <div class="pxl-item--overlay pxl-cursor--cta"></div>
            <div class="pxl-item--conent">
                <div class="pxl-item--close pxl-close pxl-cursor--cta"></div>
                 <?php get_search_form(); ?>
            </div>
        </div>
    <?php }
}       

/* Cart Sidebar */

      if(!function_exists('kidza_hook_anchor_cart')){
    function kidza_hook_anchor_cart(){
        if(class_exists('Woocommerce')) :
            global $woocommerce; ?>
            <div id="pxl-cart-sidebar" class="pxl-popup-wrap">
                <div class="pxl-popup--overlay pxl-cursor--cta"></div>
                <div class="pxl-popup--content pxl-widget-cart-sidebar">
                    <div class="widget_shopping_cart">
                        <div class="widget_shopping_head">
                            <div class="pxl-item--close pxl-close pxl-cursor--cta"></div>
                            <h5 class="widget_shopping_title">
                                <?php echo esc_html__( 'Cart', 'kidza' ); ?> <span class="widget_cart_counter">(<?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'kidza' ), WC()->cart->cart_contents_count ); ?>)</span>
                            </h5>
                        </div>
                        <div class="widget_shopping_cart_content">
                            <?php $cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0; ?>
                            <ul class="cart_list product_list_widget">

                                <?php if ( ! WC()->cart->is_empty() ) : ?>

                                    <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                        $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                        $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

                                            $product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
                                            $thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                            $product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                            ?>
                                            <li>
                                                <?php if(!empty($thumbnail)) : ?>
                                                    <div class="cart-product-image">
                                                        <a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>">
                                                            <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="cart-product-meta">
                                                    <h6><a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>"><?php echo esc_html($product_name); ?></a></h6>
                                                    <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
                                                
                                                </div> 
                                                <?php
                                                    echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                                        '<a href="%s" class="remove_from_cart_button pxl-close" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"></a>',
                                                        esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                        esc_attr__( 'Remove this item', 'kidza' ),
                                                        esc_attr( $product_id ),
                                                        esc_attr( $cart_item_key ),
                                                        esc_attr( $_product->get_sku() )
                                                    ), $cart_item_key );
                                                ?> 
                                            </li>
                                            <?php
                                        }
                                    }?>

                                <?php else : ?>

                                    <li class="empty">
                                        <i class="caseicon-shopping-cart-alt"></i>
                                        <span><?php esc_html_e( 'Your cart is empty', 'kidza' ); ?></span>
                                        <a class="btn btn-shop" href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>"><?php echo esc_html__('Browse Shop', 'kidza'); ?></a>
                                    </li>

                                <?php endif; ?>

                            </ul><!-- end product list -->
                        </div>
                        <?php if ( ! WC()->cart->is_empty() ) : ?>
                            <div class="widget_shopping_cart_footer">
                                <p class="total"><strong><?php esc_html_e( 'Subtotal', 'kidza' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>

                                <?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

                                <p class="buttons">
                                    <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="btn btn-shop wc-forward"><?php esc_html_e( 'View Cart', 'kidza' ); ?></a>
                                    <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="btn checkout wc-forward"><?php esc_html_e( 'Checkout', 'kidza' ); ?></a>
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif;
    }
}

/** Show Cart Sidebar Hidden */
add_action('wp_ajax_nopriv_item_added', 'kidza_addedtocart_sweet_message');
add_action('wp_ajax_item_added', 'kidza_addedtocart_sweet_message');
function kidza_addedtocart_sweet_message() {
    echo isset($_POST['id']) && $_POST['id'] > 0 ? (int) esc_attr($_POST['id']) : false;
    die();
}
add_action('wp_footer', 'kidza_cart_hidden_sidebar');
function kidza_cart_hidden_sidebar() {
    if (class_exists('Woocommerce') && is_checkout())
        return;
    ?>
    <script type="text/javascript">
        jQuery( function($) {
            if ( typeof wc_add_to_cart_params === 'undefined' )
                return false;

            $(document.body).on( 'added_to_cart', function( event, fragments, cart_hash, $button ) {
                var $pid = $button.data('product_id');

                $.ajax({
                    type: 'POST',
                    url: wc_add_to_cart_params.ajax_url,
                    data: {
                        'action': 'item_added',
                        'id'    : $pid
                    },
                    success: function (response) {
                        $('#pxl-cart-sidebar').addClass('active');
                        $("#pxl-cart-sidebar .pxl-item--close").on('click', function () {
                            $('body').removeClass('body-overflow');
                            $('#pxl-cart-sidebar').removeClass('active');
                        });
                    }
                });
            });
        });
    </script>
    <?php
}