<?php
/**
 * Include the TGM_Plugin_Activation class.
 */
get_template_part( 'inc/admin/libs/tgmpa/class-tgm-plugin-activation' );

add_action( 'tgmpa_register', 'kidza_register_required_plugins' );
function kidza_register_required_plugins() {
    include( locate_template( 'inc/admin/demo-data/demo-config.php' ) );
    $pxl_server_info = apply_filters( 'pxl_server_info', ['plugin_url' => 'https://api.casethemes.net/plugins/'] ) ; 
    $default_path = $pxl_server_info['plugin_url'];  
    $images = get_template_directory_uri() . '/inc/admin/assets/img/plugins';
    $plugins = array(

        array(
            'name'               => esc_html__('Redux Framework', 'kidza'),
            'slug'               => 'redux-framework',
            'required'           => true,
            'logo'        => $images . '/redux.png',
            'description' => esc_html__( 'Build theme options and post, page options for WordPress Theme.', 'kidza' ),
        ),

        array(
            'name'               => esc_html__('Elementor', 'kidza'),
            'slug'               => 'elementor',
            'required'           => true,
            'logo'        => $images . '/elementor.png',
            'description' => esc_html__( 'Introducing a WordPress website builder, with no limits of design. A website builder that delivers high-end page designs and advanced capabilities', 'kidza' ),
        ),

        array(
            'name'               => esc_html__('Case Addons', 'kidza'),
            'slug'               => 'case-addons',
            'source'             => 'case-addons.zip',
            'required'           => true,
            'logo'        => $images . '/case-addons.png',
            'description' => esc_html__( 'Main process and Powerful Elements Plugin, exclusively for kidza WordPress Theme.', 'kidza' ),
        ),
        array(
            'name'               => esc_html__('Contact Form 7', 'kidza'),
            'slug'               => 'contact-form-7',
            'required'           => true,
            'logo'        => $images . '/contact-f7.png',
            'description' => esc_html__( 'Contact Form 7 can manage multiple contact forms, you can customize the form and the mail contents flexibly with simple markup', 'kidza' ),
        ),
        array(
            'name'        => esc_html__('One User Avatar', 'kidza'),
            'slug'        => 'one-user-avatar',
            'required'    => true,
            'logo'        => $images . '/wp-user.png',
            'description' => esc_html__('Allows users to upload custom avatars directly from their profile page.', 'kidza'),
        ),
        array(
            'name'               => esc_html__('WooCommerce', 'kidza'),
            'slug'               => "woocommerce",
            'required'           => true,
            'logo'        => $images . '/woo.png',
            'description' => esc_html__( 'WooCommerce is the world’s most popular open-source eCommerce solution.', 'kidza' ),
        ),
        array(
            'name'               => esc_html__('WPC AJAX Add to Cart', 'kidza'),
            'slug'               => "wpc-ajax-add-to-cart",
            'required'           => false,
            'logo'        => $images . '/woo-ajax-add-to-cart.png',
            'description' => esc_html__( 'WPC AJAX Add to Cart for WooCommerce is a highly effective plugin for helping online stores cut down the site’s loading time.', 'kidza' ),
        ),
        array(
            'name'               => esc_html__('WPC Smart Quick View for WooCommerce', 'kidza'),
            'slug'               => "woo-smart-quick-view",
            'required'           => false,
            'logo'        => $images . '/woo-smart-quick-view.png',
            'description' => esc_html__( 'WPC Smart Quick View for WooCommerce allows shop owners to set up a Quick view popup', 'kidza' ),
        ),
        array(
            'name'               => esc_html__('WPC Smart Wishlist for WooCommerce', 'kidza'),
            'slug'               => "woo-smart-wishlist",
            'required'           => false,
            'logo'        => $images . '/woo-smart-wishlist.png',
            'description' => esc_html__( 'Customers manage their to-buy list and save favorite items for later purchase.', 'kidza' ),
        ),
        array(
            'name'               => esc_html__('WPC Variation Swatches for WooCommerce', 'kidza'),
            'slug'               => "wpc-variation-swatches",
            'required'           => false,
            'logo'        => $images . '/wpc-variation-swatches.png',
            'description' => esc_html__( 'Customers manage their to-buy list and save favorite items for later purchase.', 'kidza' ),
        ),
    );
 

    $config = array(
        'default_path' => $default_path,           // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'is_automatic' => true,
    );

    tgmpa( $plugins, $config );

}