// 1. register post type - post_types.php

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






// 2. dropdown admin columns - functions.php

	add_action( 'manage_dropdown_posts_custom_column', 'my_manage_dropdown_columns', 10, 2 );
	
	function my_manage_dropdown_columns( $column, $post_id ) {
	    global $post;
	    printf( __( '<span class="shortcode"><input type="text" value="[submenu id=&quot;%d&quot; title=&quot;%s&quot;]" class="large-text code" readonly="readonly"></span>' ), $post_id, get_the_title()  );
	}
	
	add_filter( 'manage_edit-dropdown_columns', 'my_edit_dropdown_columns' ) ;
	
	function my_edit_dropdown_columns( $columns ) {
	
	    $columns = array(
	        'cb' => '<input type="checkbox" />',
	        'title' => __( 'כותרת' ),
	        'shortcode_id' => __( 'שורטקוד' ),
	        'date' => __( 'Date' )
	    );
	
	    return $columns;
	}






// 3. register shortcode - admin/shortcodes.php (remember to load in functions.php)

	function submenu_shortcode($atts) {
		$atts = shortcode_atts( array(
	        'id' => ''
	    ), $atts );
	
	    set_query_var('atts' , $atts);
	
	    ob_start();
	    get_template_part('inc/shortcode','submenu');
	    return ob_get_clean();
	}
	add_shortcode( 'submenu', 'submenu_shortcode' );






// 4. shortcode view - inc/shortcode-submenu.php

	get_query_var('atts' , $atts);
	$post_id = $atts['id'];
	$post = get_post( $post_id );
	setup_postdata( $post );
	?>
	
	<div class="submenu_wrap almoni">
		<?php the_title();?>
		etc...
	</div>
	
	<?php wp_reset_postdata();?>
