<?php 
get_query_var('data', $data);
$image = wp_get_attachment_image_src($data['image'], 'full');
?>

<div class="widget club_widget <?php echo $data['css_class'];?>" style="background-image:url(<?php echo $image[0];?>);">
	<div class="container">
		<h3><?php echo $data['title'];?></h3>
		<div class="text">
			<?php echo $data['content'];?>
		</div>
	</div>
</div>
