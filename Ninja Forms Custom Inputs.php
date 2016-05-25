function custom_radio_buttons( $field_id, $data ){
    if($data['list_type'] == 'radio'){
        $list = $data['list'];
        ob_start();
        foreach ($list as $item) { ?>
        <div class="radio_custom_wrap custom_fields_wrap clearfix">
            <?php foreach ($item as $key => $html ) { ?>
            <?php $selected = $html['selected'] ?' checked':''; ?>
            <div class="radio_field_wrap field_wrap">
                <input type="radio" class="ninja-forms-field" id="radio-<?php echo  $field_id.'-'. $key ?>" name="ninja_forms_field_<?php echo $field_id ?>" value="<?php echo $html['label'] ?>" rel="<?php echo $field_id; ?>" <?php echo $selected; ?>>
                <label for="radio-<?php echo $field_id.'-'. $key ?>">
                    <span class="circle">
                        <span class="circle_in"></span>
                    </span>
                    <div class="text"><?php echo $html['label'] ?></div>
                </label>
            </div>
            <?php } ?>
        </div>
        <?php }
        echo ob_get_clean();
    }
}

add_action( 'ninja_forms_display_before_closing_field_wrap', 'custom_radio_buttons', 10, 2 );

function custom_checkbox( $field_id, $data ){
    if($data['list_type'] == 'checkbox'){
        $list = $data['list'];
        ob_start();
        foreach ($list as $item) { ?>
        <div class="checkbox_custom_wrap clearfix custom_fields_wrap">
            <?php foreach ($item as $key => $html ) { ?>
            <?php $selected = $html['selected'] ?' checked':''; ?>
            <div class="checkbox_field_wrap field_wrap">
                <input type="checkbox" class="ninja-forms-field" id="checkbox-<?php echo  $field_id.'-'. $key ?>" name="ninja_forms_field_<?php echo $field_id ?>" value="<?php echo $html['label'] ?>" rel="<?php echo $field_id; ?>" <?php echo $selected; ?>>
                <label for="checkbox-<?php echo $field_id.'-'. $key ?>">
                    <span class="checkbox">
                        <span class="checkbox_in"></span>
                    </span>
                    <div class="text"><?php echo $html['label'] ?></div>
                </label>
            </div>
            <?php } ?>
        </div>
        <?php }
        echo ob_get_clean();
    }
}

add_action( 'ninja_forms_display_before_closing_field_wrap', 'custom_checkbox', 10, 2 );


function custom_slide_checkbox( $field_id, $data ){
    if($data['class'] == 'slide_checkbox'){
        ob_start();?>
        <div class="text"><?php echo $data['label'] ?></div>
        <div class="slide_checkbox_wrap<?php echo ' '.$data['default_value']?>">
            <label for="ninja_forms_field_<?php echo $field_id;?>"><?php echo $data['label'];?></label>
        </div>
        <?php echo ob_get_clean();
    }
}

add_action( 'ninja_forms_display_after_opening_field_wrap', 'custom_slide_checkbox', 10, 2 );