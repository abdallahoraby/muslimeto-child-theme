<?php

// register event calendar scripts
function muslimeto_jquery_script_register() {
    wp_register_script( 'muslimeto-jquery', plugin_dir_url(__DIR__) . 'public/js/jquery.min.js', array('jquery'), rand(), true );
}
add_action( 'wp_enqueue_scripts', 'muslimeto_jquery_script_register' );

wp_enqueue_script( 'muslimeto-jquery' );

?>

<div class="support-dash-notification col-12 ">
    <table class="table-borderless">
        <thead>
        <tr>
            <td>Learner</td>
            <td> Starting In </td>
            <td> Join Class </td>
        </tr>
        </thead>
        <tbody>
        <?php
        $upcoming_classes = getTroubleUpcomingClasses();

        if( !empty($upcoming_classes) ):
            foreach( $upcoming_classes as $upcoming_class ):
                $parent_user_obj = get_user_by('id', $upcoming_class['parent_wp_user_id']);
                $child_user_obj = get_user_by('id', $upcoming_class['child_wp_user_id']);
                $staff_fullname = getStaffFullName($upcoming_class['staff_id']);
                $starting_in = getTimeDiffinUTC($upcoming_class['event_start_date']);
                if( empty($starting_in) ):
                    $starting_in = 'In Progress';
                endif;

                $zoom_meeting_id = getZoomMeetingID($upcoming_class['bb_group_id']);
                if( !empty($zoom_meeting_id) ):
                    $join_url = 'https://muslimeto.zoom.us/j/'.$zoom_meeting_id;
                else:
                    $zoom_meeting_id = 'zoom id not found';
                endif;
                ?>
                <tr>
                    <td> <?php echo substr($child_user_obj->data->display_name, 0 , 5) . '.. / ' . substr($parent_user_obj->data->display_name, 0 , 5) . '..'; ?> </td>
                    <td> <?php echo $starting_in; ?> </td>
                    <td>
                        <a class="button zoom-join small-text" target="_blank" href="<?php echo $join_url; ?>" data-bp-tooltip="<?php echo $zoom_meeting_id; ?>" >
                            <small class="small-text"> <?php echo substr($staff_fullname, 0, 10); ?> </small>
                            <span class="material-icons custom-material-icons">headset_mic </span>
                        </a>
                    </td>
                </tr>
            <?php
            endforeach;

        else: ?>
          <tr>
              <td colspan="3" class="text-center">
                  No data available.
              </td>
          </tr>
<?php endif; ?>

        </tbody>
    </table>
</div>


<script defer>
    (function($){
        // upcoming trouble classes table
        // jQuery('.support-dash-notification table').dataTable( {
        //     "pageLength": 10,
        //     "autoWidth": false,
        //     "order": [[ 1, "desc" ]],
        //     "paging": false,
        //     "searching": false
        // });
    }(jQuery));
</script>