<?php
    global $post;
    if( is_singular('product') ){
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
        $url = $thumb['0'];
?>
    <meta property="og:url" content="<?php echo get_permalink($post->ID); ?>" />
    <meta property="og:type" content="product" />
    <meta property="og:title" content="<?php echo get_the_title($post->ID); ?>" />
    <meta property="og:description" content="<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>" />
    <?php if($url): ?>
    <meta property="og:image" content="<?php echo $url; ?>" />
    <?php endif; ?>
<?php } ?>
