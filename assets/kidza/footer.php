<?php
/**
 * @package Case-Themes
 */
$custom_cursor = kidza()->get_theme_opt( 'custom_cursor', false );
?>
		</div><!-- #main -->

		<?php kidza()->footer->getFooter(); ?>
		<div class="pxl-page-overlay"><div class="pxl-cursor-icon"><span class="pxl-icon"></span></div></div>
		<?php do_action( 'pxl_anchor_target') ?>
		</div><!-- #wapper -->
		<?php if (class_exists('Case_User')) { ?>
			<?php kidza_user_form(); ?>
		<?php } ?>
	<?php wp_footer(); ?>
	<?php if ($custom_cursor) : ?>
	<div class="pxl-cursor-circle"></div>
<?php endif; ?>
	</body>
</html>
