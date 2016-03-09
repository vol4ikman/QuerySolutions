//add cart item data [WooCommerce]
add_action( 'wp_ajax_add_cart_item_key_value', 'add_cart_item_key_value' );
add_action( 'wp_ajax_nopriv_add_cart_item_key_value', 'add_cart_item_key_value' );

function add_cart_item_key_value(){
    $cart_item_key = sanitize_text_field($_POST["cart_item_key"]);
    $key = sanitize_text_field($_POST["data_key"]);
    $value = sanitize_text_field($_POST["data_value"]);
    if(!$cart_item_key || !$key || !$value)
        return;

    $cart = WC()->cart->get_cart();
    $cart_session = WC()->cart->get_cart_for_session();

    $cart_session[$cart_item_key][$key] = $value;

    WC()->session->set( 'cart', $cart_session );
}

function add_order_item_meta($item_id, $cart_item) {
    if(isset($cart_item["delivery_date"]) && $cart_item["delivery_date"]){
        $key = "delivery_date"; //key name
        $date = $cart_item["delivery_date"]; //key value

        woocommerce_add_order_item_meta($item_id, $key, $date);
    }
}
add_action('woocommerce_add_order_item_meta', 'add_order_item_meta', 10, 2);
