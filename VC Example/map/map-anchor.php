<?php 

add_shortcode( 'anchor', 'anchor_func' );
function anchor_func( $atts ) {

   $data                = array();
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
         )
      )
   ) );
}
