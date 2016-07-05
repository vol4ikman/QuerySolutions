<?php
// see you have "instagram_access_token" field
// token generated at http://instagram.pixelunion.net/
$token = get_field('instagram_access_token');
$instagram_data = file_get_contents("https://api.instagram.com/v1/users/self/media/recent/?access_token={$token}&count=6");
$instagram_data = json_decode($instagram_data);
?>

<div class="instagram_gallery">
	<?php foreach ($instagram_data->data as $item) :
		$image = $item->images->thumbnail->url;?>
		<div class="image_wrap">
			<a href="<?php echo $item->link;?>" target="_blank">
				<img src="<?php echo $image;?>" alt="<?php echo $item->caption->text;?>" />
			</a>
		</div>
	<?php endforeach;?>
</div>
