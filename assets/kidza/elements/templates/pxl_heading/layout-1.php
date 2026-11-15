<?php
$html_id = pxl_get_element_id($settings);
$editor_title = $widget->get_settings_for_display( 'title' );
$editor_title = $widget->parse_text_editor( $editor_title ?? '' );
$custom_ptitle = get_post_meta(get_the_ID(), 'custom_ptitle', true); ?>
<div id="pxl-<?php echo esc_attr($html_id) ?>" class="pxl-heading <?php echo esc_attr($settings['sub_title_style']); ?>-style">
	<div class="pxl-heading--inner">
		<?php if($settings['title_style'] == 'px-title--divider2') : ?>
			<div class="px-divider--wrap <?php echo esc_attr($settings['pxl_animate_divider']); ?>">
				<div class="px-title--divider px-title--divider2">
					<span></span>
				</div>
			</div>
		<?php endif; ?>
		<?php if(!empty($settings['sub_title']) && $settings['sub_title_style'] !== 'px-sub-title-under') : ?>
			<div class="pxl-item--subtitle <?php echo esc_attr($settings['sub_title_style'].' '.$settings['pxl_animate_sub']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_sub']); ?>ms">
				<?php if ( $settings['icon_type'] == 'icon' && !empty($settings['pxl_icon']['value']) ) : ?>
	                <div class="pxl-item--icon">
	                    <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
	                </div>
	            <?php endif; ?>
				<span class="pxl-item--subtext">
					<?php echo esc_attr($settings['sub_title']); ?>
				</span>
			</div>
		<?php endif; ?>

		<<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title <?php if($settings['pxl_animate'] !== 'wow letter') { echo esc_attr($settings['pxl_animate']); } ?> <?php if(!empty($settings['title_split_text_anm'])) { echo esc_attr('pxl-split-text '.$settings['title_split_text_anm']); } ?> " data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
			<?php if($settings['source_type'] == 'text' && !empty($editor_title)) {
				if($settings['pxl_animate'] == 'wow letter') {
					$arr_str = explode(' ', $editor_title); ?>
					<span class="pxl-item--text">
			            <?php foreach ($arr_str as $index => $value) {
			                $arr_str[$index] = '<span class="pxl-text--slide"><span class="'.$settings['pxl_animate'].'">' . $value . '</span></span>';
			            }
			            $str = implode(' ', $arr_str);
			            echo wp_kses_post($str); ?>
			        </span>
				<?php } else {
					echo wp_kses_post($editor_title);
				} 
			} elseif($settings['source_type'] == 'title') {
				$titles = kidza()->page->get_title();
				if(!empty($_GET['blog_title'])) {
					$blog_title = $_GET['blog_title'];
					$custom_title = explode('_', $blog_title);
					foreach ($custom_title as $index => $value) {
	                    $arr_str_b[$index] = $value;
	                }
	                $str = implode(' ', $arr_str_b);
	                echo wp_kses_post($str);
				} elseif(!empty($custom_ptitle)) {
					echo esc_attr($custom_ptitle);
				} else {
					pxl_print_html($titles['title']);
				}
			}?>		
		</<?php echo esc_attr($settings['title_tag']); ?>>

		<?php if(!empty($settings['sub_title']) && $settings['sub_title_style'] == 'px-sub-title-under') : ?>
			<div class="pxl-item--subtitle <?php echo esc_attr($settings['sub_title_style'].' '.$settings['pxl_animate_sub']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_sub']); ?>ms">
				<span class="pxl-item--subtext">
					<?php echo esc_attr($settings['sub_title']); ?>
				</span>
			</div>
		<?php endif; ?>

		<?php if($settings['title_style'] == 'px-title--divider1') : ?>
			<div class="px-divider--wrap wow">
				<svg xmlns="http://www.w3.org/2000/svg" width="182" height="20" viewBox="0 0 182 20" fill="none">
					<path  d="M4 16.4268C34.2253 12.3691 64.4506 8.31142 89.6889 6.2211C114.927 4.13079 134.262 4.13079 147.223 4.8916C166.265 6.00935 174.368 8.74178 177.732 8.99538" stroke="#F15F25" stroke-width="7" stroke-linecap="round"/>
				</svg>
			</div>
		<?php endif; ?>
	</div>
</div>