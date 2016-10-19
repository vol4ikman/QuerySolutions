<?php 

add_shortcode( 'club', 'club_func' );
function club_func( $atts, $content = null ) {

   $data                   = array();
   $content                = wpb_js_remove_wpautop($content, true);
   $data['css']            = !empty($atts['css']) ? $atts['css'] : '';
   $data['css_class']      = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $data['css'], ' ' ), $atts );
   $data['title']          = !empty($atts['title']) ? $atts['title'] : '';
   $data['content']        = $content;
   $data['image']          = !empty($atts['image']) ? $atts['image'] : '';
   set_query_var('data', $data);

   ob_start();
   
   get_template_part(VC_VIEW, 'club');

   return ob_get_clean();
}

add_action( 'vc_before_init', 'club_integrateWithVC' );
function club_integrateWithVC() {
   vc_map( array(
      "name" => __( "מועדון לקוחות", "theme" ),
      "base" => "club",
      "class" => "",
      "category" => __( "אלמנטים", "theme"),
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "כותרת", "theme" ),
            "param_name" => "title",
            "value" => ''
         ),
         array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => __( "טקסט", "theme" ),
            "param_name" => "content",
            "value" => ''
         ),
         array(
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __( "תמונת רקע", "theme" ),
            "param_name" => "image",
            "value" => ''
         ),
         array(
            'type' => 'css_editor',
            'heading' => __( 'Css', 'theme' ),
            'param_name' => 'css',
            'group' => __( 'אפשרויות עיצוב', 'theme' ),
        ),
      )
   ) );
}
