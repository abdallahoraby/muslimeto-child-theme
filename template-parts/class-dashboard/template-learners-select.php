<?php


    if ( !empty($args) && $args['wp_user_id'] ):
        $wp_user_id = $args['wp_user_id'];
    else:
        $wp_user_id = get_current_user_id();
    endif;

    if ( !empty($args) && $args['bb_group_id'] ):
        $bb_group_id = $args['bb_group_id'];
    else:
        $bb_group_id = bp_get_current_group_id();
    endif;


    // get members joined to bb group
    $bb_args = array(
        'group_id' => $bb_group_id,
        'max' => 999,
        'exclude_admins_mods' => true
    );

    $group_members = groups_get_group_members($bb_args);

    if( !empty($group_members['members']) ):
        $members_wp_user_ids = array_column($group_members['members'], 'ID');
    endif;


    // list all learners as select options
    if( !empty($members_wp_user_ids) ):
        foreach ($members_wp_user_ids as $members_wp_user_id):
            $customer_child_ids[$members_wp_user_id] = getcustomerID($members_wp_user_id);
        endforeach;

        if( !empty($customer_child_ids) ):
            $customers_options = '';
            $selected_id = !empty($_GET['child_customer_id']) ? (int) $_GET['child_customer_id'] : '';

            if( count($customer_child_ids) > 1 ):
                $customers_options .= '<option value="0" selected disabled>-- select learner --</option>';
            endif;

            // if parent show only his childs in select and hide others
            if( checkIfParent($wp_user_id) == true ):
                $parent_childs = getParentChilds( $wp_user_id );
                if( !empty($parent_childs) ):
                    foreach ( $customer_child_ids as $members_wp_user_id=>$customer_child_id ):
                        if( ! in_array($members_wp_user_id, $parent_childs) ):
                            unset($customer_child_ids[$members_wp_user_id]);
                        endif;
                    endforeach;
                endif;
            endif;

            foreach ($customer_child_ids as $members_wp_user_id=>$customer_child_id):
                $child_user_obj = get_user_by('id', $members_wp_user_id);
                $child_email = $child_user_obj->data->user_email;
                $child_display_name = $child_user_obj->data->display_name;

                if( $selected_id ===  (int) $customer_child_id ):
                    $selected = 'selected';
                else:
                    $selected = '';
                endif;
                // generate options for select
                $customers_options .= '<option '.$selected.' value="'. $members_wp_user_id .'"> ' . $child_email . ' ' . $child_display_name . ' </option>';
            endforeach;
        endif;

    else:
        $customers_options = '';
    endif;



//check if parent has childs show filter
//    $parent_childs = getParentChilds( $wp_user_id );
//    $parent_childs[] = $wp_user_id;
//    if( !empty($parent_childs) ):
//        // user is a parent get his childs as bookly cutsomers
//        foreach ($parent_childs as $parent_child):
//            $customer_child_ids[] = getcustomerID($parent_child);
//        endforeach;
//
//
//        if( !empty($customer_child_ids) ):
//            $customers_options = '';
//            $selected_id = !empty($_GET['child_customer_id']) ? (int) $_GET['child_customer_id'] : '';
//
//            if( $args['return_wp_uid'] == true ):
//                $customer_child_ids = $parent_childs;
//            endif;
//
//            foreach ($customer_child_ids as $customer_child_id):
//                if( $args['return_wp_uid'] == true ):
//                    $child_wp_user_id = $customer_child_id;
//                else:
//                    // get email and full name for child
//                    $child_wp_user_id = getWPuserIDfromBookly($customer_child_id);
//                endif;
//                if( in_array($child_wp_user_id, $members_wp_user_ids) ):
//                    $child_user_obj = get_user_by('id', $child_wp_user_id);
//                    $child_email = $child_user_obj->data->user_email;
//                    $child_display_name = $child_user_obj->data->display_name;
//
//                    if( $selected_id ===  (int) $customer_child_id ):
//                        $selected = 'selected';
//                    else:
//                        $selected = '';
//                    endif;
//                    // generate options for select
//                    $customers_options .= '<option '.$selected.' value="'. $customer_child_id .'"> ' . $child_email . ' ' . $child_display_name . ' </option>';
//                endif;
//            endforeach;
//
//
//
//        endif;
//
//    endif;
//

?>

<div class="parent_childs">
    <select>
        <?= $customers_options ?>
    </select>
    <input type="hidden" id="current_page_url" value="'. $current_page_url .'">
    <a href="#" class="reset_appointments_view btn"> Reset </a>
</div>


<script>
    $('.reset_appointments_view').on('click', function(){

        $('.parent_childs select').prop('selectedIndex',0).val(0).trigger('change');

    })
</script>