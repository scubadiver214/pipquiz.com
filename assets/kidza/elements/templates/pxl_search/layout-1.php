<?php if($settings['search_type'] == 'popup') : ?>
	<div class="pxl-search-popup-button pxl-cursor--cta <?php echo esc_attr($settings['style']); ?>">
		<?php if(!empty($settings['pxl_icon']['value'])) {
	            \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' );
	    } else { ?>
	    	<i class="caseicon-search"></i>
	    <?php } ?>
	</div>
	<?php add_action( 'pxl_anchor_target', 'kidza_hook_anchor_search'); ?>
<?php endif; ?>

<?php if($settings['search_type'] == 'form') : ?>
	 <?php get_search_form(); ?>
<?php endif; ?>