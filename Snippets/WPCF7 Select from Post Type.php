// paste in functions.php
wpcf7_add_shortcode('postdropdown', 'createbox', true);

function createbox() {
    global $post;
    $args = array( 'post_type'=> 'suite' );
    $myposts = get_posts( $args );
    $output = "<select name=suite value=suite><option value=notchosen>בחר חדר</option>";
    foreach ( $myposts as $post ) : setup_postdata($post);
        $title = get_the_title();
        $output .= "<option value='$title'> $title </option>";

        endforeach;
    $output .= "</select>";
    return $output;
}

// paste in wpcf7 form tab
Write [postdropdown] shortcode where you want the field to appear.

// paste in wpcf7 mail tab
סוויטה: [suite] (the option value)
