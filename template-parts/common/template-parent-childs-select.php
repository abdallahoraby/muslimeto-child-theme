<?php


if ( !empty($args) && $args['wp_user_id'] ):
    $wp_user_id = $args['wp_user_id'];
else:
    $wp_user_id = get_current_user_id();
endif;




//check if parent has childs show filter
$parent_childs = getParentChilds( $wp_user_id );
$parent_childs[] = $wp_user_id;
if( !empty($parent_childs) ):
    // user is a parent get his childs as bookly cutsomers
    foreach ($parent_childs as $parent_child):
        $customer_child_ids[] = getcustomerID($parent_child);
    endforeach;


    if( !empty($customer_child_ids) ):
        $customers_options = '';
        $selected_id = !empty($_GET['child_customer_id']) ? (int) $_GET['child_customer_id'] : '';

        if( $args['return_wp_uid'] == true ):
            $customer_child_ids = $parent_childs;
        endif;

        foreach ($customer_child_ids as $customer_child_id):
            if( $args['return_wp_uid'] == true ):
                $child_wp_user_id = $customer_child_id;
            else:
                // get email and full name for child
                $child_wp_user_id = getWPuserIDfromBookly($customer_child_id);
            endif;
                $child_user_obj = get_user_by('id', $child_wp_user_id);
                $child_email = $child_user_obj->data->user_email;
                $child_display_name = $child_user_obj->data->display_name;

                if( $selected_id ===  (int) $customer_child_id ):
                    $selected = 'selected';
                else:
                    $selected = '';
                endif;
                // generate options for select
                $customers_options .= '<option '.$selected.' value="'. $customer_child_id .'"> ' . $child_email . ' ' . $child_display_name . ' </option>';
        endforeach;

    endif;

endif;

?>

    <select>
        <option value="0" selected disabled>-- select learner --</option>
        <?= $customers_options ?>
    </select>
