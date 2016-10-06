<div class="share_bar">
	<a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink($post->ID);?>" target="_blank">
		<span class="fa fa-facebook" aria-hidden="true"></span>
		<span class="sr-only"><?php _e('Share on Facebook', 'theme');?></span>	
	</a>
	<a class="twitter" href="https://twitter.com/intent/tweet?url=<?php echo get_permalink($post->ID);?>" target="_blank">
		<span class="fa fa-twitter" aria-hidden="true"></span>
		<span class="sr-only"><?php _e('Share on Twitter', 'theme');?></span>
	</a>
	<a class="google-plus" href="https://plus.google.com/share?url=<?php echo get_permalink($post->ID);?>" target="_blank">
		<span class="fa fa-google-plus" aria-hidden="true"></span>
		<span class="sr-only"><?php _e('Share on Google Plus', 'theme');?></span>
	</a>
	<a class="linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink($post->ID);?> &title=<?php the_title();?>" target="_blank">
		<span class="fa fa-linkedin" aria-hidden="true"></span>
		<span class="sr-only"><?php _e('Share on Linked-In', 'theme');?></span>
	</a>
	<a class="pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink($post->ID);?>&description=<?php echo get_the_title($post->ID);?>" target="_blank">
		<span class="fa fa-pinterest" aria-hidden="true"></span>
		<span class="sr-only"><?php _e('Share on Pinterest', 'theme');?></span>
	</a>
</div>
