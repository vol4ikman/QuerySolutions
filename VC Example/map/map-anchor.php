<?php 

add_shortcode( 'anchor', 'anchor_func' );
function anchor_func( $atts ) {

   $data                = array();
   $data['css']         = !empty($atts['css']) ? $atts['css'] : '';
   $data['css_class']   = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $data['css'], ' ' ), $this->settings['base'], $atts );
   $data['title']    = !empty($atts['title']) ? $atts['title'] : '';
   set_query_var('data', $data);

   ob_start();
   
   get_template_part(VC_VIEW, 'anchor');

   return ob_get_clean();
}

add_action( 'vc_before_init', 'anchor_integrateWithVC' );
function anchor_integrateWithVC() {
   vc_map( array(
      "name" => __( "YVC Anchor", "theme" ),
      "base" => "anchor",
      "class" => "",
      "category" => __( "YVC", "theme"),
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Title", "theme" ),
            "param_name" => "title",
            "value" => ''
         ),
         array(
            'type' => 'css_editor',
            'heading' => __( 'Css', 'my-text-domain' ),
            'param_name' => 'css',
            'group' => __( 'Design options', 'my-text-domain' ),
        ),
      )
   ) );
}
