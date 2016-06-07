function get_posts_by_first_letter($post_type, $first_letter) {
	global $wpdb; 
	$sql = "SELECT * FROM $wpdb->posts WHERE post_title LIKE '".$first_letter."%' AND post_type = '".$post_type."' AND post_status = 'publish'; ";
	$results = $wpdb->get_results($sql);
	return $results;
}
