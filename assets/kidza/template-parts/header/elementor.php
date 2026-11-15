<?php 
$logo_m = kidza()->get_opt( 'logo_m', ['url' => get_template_directory_uri().'/assets/img/logo.png', 'id' => '' ] );
$p_menu = kidza()->get_page_opt('p_menu');
$sticky_scroll = kidza()->get_opt('sticky_scroll');
$header_layout = kidza()->get_opt('header_layout');
$post_header = get_post($header_layout);
$header_type = get_post_meta( $post_header->ID, 'header_type', true );
$mobile_style = kidza()->get_opt('mobile_style');
$mobile_display = kidza()->get_opt('mobile_display');
$logo_show = kidza()->get_opt('logo_show');
$heading_show = kidza()->get_opt('heading_show');
$heading_mobile = kidza()->get_theme_opt( 'heading_mobile' );
$heading_mobile_color = kidza()->get_theme_opt( 'heading_mobile_color' );

$title_contact_mobile = kidza()->get_theme_opt( 'title_contact_mobile' );
$map_text = kidza()->get_theme_opt( 'map_text' );
$phone_text = kidza()->get_theme_opt( 'phone_text' );
$phone_link = kidza()->get_theme_opt( 'phone_link' );
$email_text = kidza()->get_theme_opt( 'email_text' );
$email_link = kidza()->get_theme_opt( 'email_link' );

$link_face = kidza()->get_theme_opt( 'link_face' );
$link_twitter = kidza()->get_theme_opt( 'link_twitter' );
$link_linkedin = kidza()->get_theme_opt( 'link_linkedin' );
$link_instagram = kidza()->get_theme_opt( 'link_instagram' );
?>
<header id="pxl-header-elementor" class="is-sticky">
	<?php if(isset($args['header_layout']) && $args['header_layout'] > 0) : ?>
		<div class="pxl-header-elementor-main <?php echo esc_attr($header_type); ?>">
		    <div class="pxl-header-content">
		        <div class="row">
		        	<div class="col-12">
			            <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $args['header_layout']); ?>
	                </div>
		        </div>
		    </div>
		</div>
	<?php endif; ?>
	<?php if(isset($args['header_layout_sticky']) && $args['header_layout_sticky'] > 0) : ?>
		<div class="pxl-header-elementor-sticky pxl-onepage-sticky <?php echo esc_attr($sticky_scroll); ?>">
		    <div class="container">
		        <div class="row">
                    <div class="col-12">
    		            <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $args['header_layout_sticky']); ?>
                    </div>
		        </div>
		    </div>
		</div>
	<?php endif; ?>
    <?php if($mobile_display == 'show') : ?>
        <div id="pxl-header-mobile" class="style-<?php echo esc_attr($mobile_style); ?>">
            <div id="pxl-header-main" class="pxl-header-main">
                <div class="container">
                    <div class="row">
                        <div class="pxl-header-branding">
                            <?php
                                if ($logo_m['url']) {
                                    printf(
                                        '<a href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
                                        esc_url( home_url( '/' ) ),
                                        esc_attr( get_bloginfo( 'name' ) ),
                                        esc_url( $logo_m['url'] )
                                    );
                                }
                            ?>
                        </div>
                        <div class="pxl-header-menu">
                            <div class="pxl-header-menu-scroll">
                                <div class="pxl-menu-close pxl-hide-xl pxl-close"></div>
                                <div class="pxl-logo-mobile pxl-hide-xl">
                                    <?php
                                        if ($logo_m['url']) {
                                            printf(
                                                '<a href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
                                                esc_url( home_url( '/' ) ),
                                                esc_attr( get_bloginfo( 'name' ) ),
                                                esc_url( $logo_m['url'] )
                                            );
                                        }
                                    ?>
                                </div>
                                <?php if($heading_show == 'show') : ?>
                                    <div class="pxl-heading-mobile">
                                       <?php if(!empty($heading_mobile)) { echo pxl_print_html($heading_mobile); } else { echo pxl_print_html('Lets make things', 'kidza');} ?>
                                       <div class="pxl-heading-mobile-color">
                                           <?php if(!empty($heading_mobile_color)) { echo pxl_print_html($heading_mobile_color); } else { echo pxl_print_html('happen', 'kidza');} ?>
                                       </div>
                                    </div>
                               <?php endif; ?>
                                <?php kidza_header_mobile_search_form(); ?>
                                <nav class="pxl-header-nav">
                                    <?php 
                                        if ( has_nav_menu( 'primary' ) )
                                        {
                                            $attr_menu = array(
                                                'theme_location' => 'primary',
                                                'container'  => '',
                                                'menu_id'    => '',
                                                'menu_class' => 'pxl-menu-primary clearfix',
                                                'link_before'     => '<span>',
                                                'link_after'      => '</span>',
                                                'walker'         => class_exists( 'PXL_Mega_Menu_Walker' ) ? new PXL_Mega_Menu_Walker : '',
                                            );
                                            if(isset($p_menu) && !empty($p_menu)) {
                                                $attr_menu['menu'] = $p_menu;
                                            }
                                             wp_nav_menu( array(
                                                'theme_location' => 'primary',
                                                'container'  => '',
                                                'menu_id'    => '',
                                                'menu_class' => 'pxl-menu-primary clearfix',
                                                'link_before'     => '<span>',
                                                'link_after'      => '</span>',
                                                'walker'         => class_exists( 'PXL_Mega_Menu_Walker' ) ? new PXL_Mega_Menu_Walker : '',
                                            ) );
                                        } else { ?>
                                            <ul class="pxl-menu-primary">
                                                <?php wp_list_pages( array(
                                                    'depth'        => 0,
                                                    'show_date'    => '',
                                                    'date_format'  => get_option( 'date_format' ),
                                                    'child_of'     => 0,
                                                    'exclude'      => '',
                                                    'title_li'     => '',
                                                    'echo'         => 1,
                                                    'authors'      => '',
                                                    'sort_column'  => 'menu_order, post_title',
                                                    'link_before'  => '',
                                                    'link_after'   => '',
                                                    'item_spacing' => 'preserve',
                                                    'walker'       => '',
                                                ) ); ?>
                                            </ul>
                                        <?php }
                                    ?>
                                </nav>
                                <div class="pxl-item-contact-mobile">
                                    <h3 class="pxl-title-contact">
                                        <?php if(!empty($title_contact_mobile)) { echo pxl_print_html($title_contact_mobile); } else { echo pxl_print_html('', 'kidza');} ?>
                                    </h3>
                                    <ul class="pxl-item-mobile-list">
                                        <li class="pxl-mobile-map"><?php if(!empty($map_text)) { echo pxl_print_html($map_text); } else { echo pxl_print_html('', 'kidza');} ?></li>
                                        <li class="pxl-mobile-phone">
                                            <a href="<?php echo esc_url($phone_link); ?>">
                                                <?php if(!empty($phone_text)) { echo pxl_print_html($phone_text); } else { echo pxl_print_html('', 'kidza');} ?>
                                            </a>
                                        </li>
                                        <li class="pxl-mobile-email">
                                            <a href="<?php echo esc_url($email_link); ?>">
                                                <?php if(!empty($email_text)) { echo pxl_print_html($email_text); } else { echo pxl_print_html('', 'kidza');} ?>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="pxl-icon-mobile">
                                        <a href="<?php echo esc_url($link_face); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                                        <a href="<?php echo esc_url($link_twitter ); ?>"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                        <a href="<?php echo esc_url($link_linkedin); ?>"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
                                        <a href="<?php echo esc_url($link_instagram); ?>"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pxl-header-menu-backdrop"></div>
                    </div>
                </div>
                <div id="pxl-nav-mobile">
                    <div class="pxl-nav-mobile-button"><span></span></div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</header>