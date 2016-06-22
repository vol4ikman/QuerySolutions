// Dropdown

function dropdown_post_type() {

	$labels = array(
		'name'                => __( 'תתי תפריטים', 'theme' ),
		'singular_name'       => __( 'תת תפריט', 'theme' ),
		'menu_name'           => __( 'תתי תפריטים', 'theme' ),
		'name_admin_bar'      => __( 'תתי תפריטים', 'theme' ),
		'parent_item_colon'   => __( 'פריט אב:', 'theme' ),
		'all_items'           => __( 'כל הפריטים', 'theme' ),
		'add_new_item'        => __( 'הוסף פריט חדש', 'theme' ),
		'add_new'             => __( 'הוסף חדש', 'theme' ),
		'new_item'            => __( 'פריט חדש', 'theme' ),
		'edit_item'           => __( 'ערוך פריט', 'theme' ),
		'update_item'         => __( 'עדכן פריט', 'theme' ),
		'view_item'           => __( 'צפה בפריט', 'theme' ),
		'search_items'        => __( 'חפש פריט', 'theme' ),
		'not_found'           => __( 'לא נמצא', 'theme' ),
		'not_found_in_trash'  => __( 'לא נמצא באשפה', 'theme' ),
	);
	$args = array(
		'label'               => __( 'תת תפריט', 'theme' ),
		'description'         => __( 'תת תפריט', 'theme' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
		'taxonomies'          => array(),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'menu_icon'			  => 'dashicons-welcome-widgets-menus',
		'capability_type'     => 'page',
	);
	register_post_type( 'dropdown', $args );

}
add_action( 'init', 'dropdown_post_type', 0 );
