<link href="https://fonts.googleapis.com/css2?family=Cairo&family=Oswald&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-countdown/2.1.0/css/jquery.countdown.min.css"  />


<?php

    if ( !empty($args) && $args['bb_group_id'] ):
        $bb_group_id = (int) $args['bb_group_id'];
    else:
        $bb_group_id = bp_get_current_group_id();
    endif;

    $next_upcoming_class = getBBgroupUpcomingClass($bb_group_id, $limit = 1);

    if( !empty($next_upcoming_class) ):

        $class_start_time = date('d.m.Y H:i', strtotime($next_upcoming_class[0]->start_date));
        $class_end_time = date('Y-m-d H:i:s', strtotime($next_upcoming_class[0]->end_date));

        $sp_entry_id = getBBgroupGFentryID ($bb_group_id);
        $user_timezone = getSPentryTimezone($sp_entry_id);



        // hide if nowUTC > start_date
        $current_date_object = new DateTime('now', new DateTimeZone('UTC'));
        $nowUTC = $current_date_object->format('Y-m-d H:i:s');
        if( strtotime($nowUTC) < strtotime($class_start_time) ):

    ?>


        <div id="academic-countdown-item"
             data-timer-end="<?= $class_start_time ?>"
             data-label-days="Days"
             data-label-hours="Hrs"
             data-label-minutes="Mins"
             data-label-seconds="Sec">
        </div>


<?php
        endif;
    endif;

    get_template_part('template-parts/class-dashboard/template-get-zoom-join-btn', null, array(
        'bb_group_id' => $bb_group_id
    ));

//    global $wpdb;
//
//    $SP_PARENT_FORM_ID = SP_PARENT_FORM_ID();
//    $bb_group_type = bp_groups_get_group_type( $bb_group_id );
//    // get group meeting id
//    $gf_entry_table = $wpdb->prefix . 'gf_entry';
//    $gf_meta_table = $wpdb->prefix . 'gf_entry_meta';
//    $gf_result = $wpdb->get_results(
//        "SELECT entry_id FROM $gf_meta_table WHERE meta_key = 7 AND meta_value = {$bb_group_id} AND form_id ={$SP_PARENT_FORM_ID}"
//    );
//    $wpdb->flush();
//
//    foreach ( $gf_result as $entry ):
//        $entry_id = $entry->entry_id;
//        $gf_entry_result = $wpdb->get_results(
//            "SELECT * FROM $gf_entry_table WHERE id = {$entry_id} AND status = 'active'"
//        );
//        $wpdb->flush();
//        if( !empty($gf_entry_result) ):
//
//            $gf_results = $wpdb->get_results(
//                "SELECT * FROM $gf_meta_table WHERE entry_id = {$entry_id}"
//            );
//            $wpdb->flush();
//            foreach ( $gf_results as $gf_result ):
//                $is_approved = $gf_result->meta_key;
//                if( $is_approved === 'is_approved' ):
//                    $is_approved_value = $gf_result->meta_value;
//                    if( $is_approved_value === '1' ):
//                        $entry_id_selected = $gf_result->entry_id;
//                    endif;
//                endif;
//            endforeach;
//
//        endif;
//    endforeach;
//
//    $icon = '<img class="icon" src="'. get_stylesheet_directory_uri() .'/images/zoom-join-icon.png">';
//    $icon_hover = '<img class="hover_icon" src="'. get_stylesheet_directory_uri() .'/images/zoom-join-icon-hover.svg">';
//    $alert_no_data = '<div class="alert"> Missing Meeting ID </div>';
//
//    // show staff meeting id
//    $staff_form_id = STAFF_FORM_ID();
//    // get staff email for this class
//    $bookly_data = getBBgroupServiceTeacher($bb_group_id);
//    if( !empty($bookly_data) ):
//        $teacher = $bookly_data['teacher'];
//        // get wp_user_id for bookly teacher
//        $staff_table = $wpdb->prefix . 'bookly_staff';
//        $staff_results = $wpdb->get_results(
//            "SELECT * FROM $staff_table WHERE id = {$teacher}"
//        );
//        $wpdb->flush();
//        $teacher_user_id = $staff_results[0]->wp_user_id;
//        $teacher_obj = get_user_by('id', $teacher_user_id);
//        $teacher_email = $teacher_obj->user_email;
//
//        // get entry from GF staff form where email equal to teacher email
//        $gf_results = $wpdb->get_results(
//            "SELECT * FROM $gf_meta_table WHERE meta_key = 4 AND meta_value LIKE '%{$teacher_email}%' AND form_id = {$staff_form_id}"
//        );
//        $wpdb->flush();
//        $staff_entry_id = $gf_results[0]->entry_id;
//
//        // get zoom meeting id
//        $gf_results = $wpdb->get_results(
//            "SELECT * FROM $gf_meta_table WHERE meta_key = 30 AND entry_id = {$staff_entry_id} AND form_id = {$staff_form_id}"
//        );
//        $wpdb->flush();
//        $one_to_one_zoom_id = $gf_results[0]->meta_value;
//
//    endif;
//
//    if( !empty($entry_id_selected) ):
//        $gf_results = $wpdb->get_results(
//            "SELECT meta_value FROM $gf_meta_table WHERE entry_id = {$entry_id_selected} AND meta_key = 11"
//        );
//        $wpdb->flush();
//
//        if( isset($gf_results) && !empty($gf_results) ):
//            $zoom_meeting_id = $gf_results[0]->meta_value;
//            $join_url = 'https://muslimeto.zoom.us/j/'.$zoom_meeting_id;
//
//            if( !empty($zoom_meeting_id) ):
//                echo '<div class="zoom-data">';
//                echo '<a class="button zoom-join" target="_blank" href="'. $join_url .'"> '. $icon . $icon_hover .'<p> <span> Join Meeting </span><span class="zoom-mid">'. $zoom_meeting_id .'</span></p></a>';
//                echo '</div>';
//            else:
//
//            endif;
//        elseif( !empty($one_to_one_zoom_id) && empty($gf_results) ):
//
//            $join_url = 'https://muslimeto.zoom.us/j/'.$one_to_one_zoom_id;
//
//            if( !empty($one_to_one_zoom_id) ):
//                echo '<div class="zoom-data">';
//                echo '<a class="button zoom-join" target="_blank" href="'. $join_url .'"> '. $icon . $icon_hover .' <p class="zoom-details"><span>Join Meeting</span> '.'<span class="zoom-mid">('. $one_to_one_zoom_id .')</span></p>'.'</a>';
//                echo '</div>';
//            endif;
//
//        else:
//            echo $alert_no_data;
//        endif;
//
//    elseif( $bb_group_type == 'summer-camp' ):
//        // summer camp group type
//            $summer_camp_zoom_id = groups_get_groupmeta( bp_get_current_group_id(), 'summer_camp_zoom_id');
//            if( !empty($summer_camp_zoom_id) ):
//                $join_url = 'https://muslimeto.zoom.us/j/'.$summer_camp_zoom_id;
//                echo '<div class="zoom-data">';
//                echo '<a class="button zoom-join" target="_blank" href="'. $join_url .'"> '. $icon . $icon_hover .' <span>Join Meeting</span> </a>';
//                echo '<span class="zoom-mid"> Meeting ID: <strong>'. $summer_camp_zoom_id .'</strong> </span>';
//                echo '</div>';
//            else:
//                echo '<div class="alert"> Missing Meeting ID </div>';
//            endif;
//    else:
//        echo $alert_no_data;
//    endif;





    $muslimeto = redux_global_var();
    if( empty($muslimeto) ):
        $bb_group_id_custom_field = 0;
    else:
        $bb_group_id_custom_field = (int) $muslimeto['bookly_custom_field_bb_gid'];
    endif;


?>

<script>
    jQuery(document).ready(function(){

        // jQuery('#academic-countdown-item').showTimer({
        // returnType: 'box',
        // wrapper_id: "academic-group-myCountdown"
        // });

        var myTimer =new PsgTimer('#academic-countdown-item',{
            multilpeBlocks:false
        });


    });

</script>
