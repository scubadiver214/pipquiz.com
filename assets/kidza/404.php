<?php
/**
 * @package Case-Themes
 */
get_header(); ?>
<div class="container">
    <div class="row content-row">
        <div id="pxl-content-area" class="pxl-content-area col-12">
            <main id="pxl-content-main">
                <div class="pxl-error-inner">
                        <div class="pxl-error-image wow fadeInUp"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/img/image-404.png'); ?>" /></div>
                            <h3 class="pxl-error-title wow fadeInUp"><?php echo esc_html__('PAGE NOT FOUND', 'kidza'); ?></h3>
                            <div class="pxl-item wow fadeInUp"><?php echo esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'kidza'); ?></div>
                            <div class="pxl-search wow fadeInUp"><?php get_search_form(); ?></div>
                        <a class="btn pxl-btn-back btn-kid wow fadeInUp" href="<?php echo esc_url(home_url('/')); ?>">
                            <button class="pxl-kid pxl-kid">
                                <span class="pxl--btn-text-meta"><?php echo esc_html__('Go to Homepage', 'kidza'); ?></span>
                                <svg viewBox="0 0 100 50" preserveAspectRatio="none">
                                    <polyline stroke="currentColor" id="wibble" fill="none" stroke-width="45" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                </svg>
                                <span class ="pxl-icon-kid"><i class = "flaticon flaticon-arrow-right"></i></span>
                            </button>
                        </a>
                </div>
            </main>
        </div>
    </div>
</div>
<?php get_footer();
