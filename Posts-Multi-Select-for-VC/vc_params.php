<?php
vc_add_shortcode_param( 'posts_select', 'posts_select_settings_field', VC_SCRIPT );
function posts_select_settings_field($settings, $value) {
	$posts = get_posts(array('post_type'=>'product'));
	ob_start();?>

		<select multiple class="wpb_vc_param_value wpb-textinput <?php echo $settings['param_name'].' '.$settings['type'].'_field';?>"
		name="<?php echo $settings['param_name'];?>">

			<?php 
			foreach ($posts as $post) :?>
				<?php $value = $post->ID;?>
				<option value="<?php echo $value;?>"><?php echo $post->post_title;?></option>
			<?php endforeach;?>
		</select>

	<?php 
	return ob_get_clean();
}
