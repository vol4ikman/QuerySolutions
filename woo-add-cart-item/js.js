function add_cart_item_data(cart_item_key,data_key,data_value){
        var data     = {
            type       : "POST",
            action     : "add_cart_item_key_value",
            cart_item_key : cart_item_key,
            data_value : data_value,
            data_key  : data_key,
            data_type  : "json"
        };
        jQuery.post( ajaxurl, data, function(response) {

        });
}
