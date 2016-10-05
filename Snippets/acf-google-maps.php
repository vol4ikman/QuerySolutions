function theme_acf_init() {
    $google_api_key = get_field('google_api_key','option');
	  acf_update_setting('google_api_key', $google_api_key);
}
add_action('acf/init', 'theme_acf_init');
