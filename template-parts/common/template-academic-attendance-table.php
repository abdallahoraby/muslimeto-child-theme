<?php

    if ( $_POST['wp_user_id'] ):
        $wp_user_id = $_POST['wp_user_id'];
    else:
        $wp_user_id = get_current_user_id();
    endif;

   if( !empty($wp_user_id) && !empty($_POST['renews_period_start']) && !empty($_POST['renews_period_end']) ):
       $renews_period_start = $_POST['renews_period_start'];
       $renews_period_end = $_POST['renews_period_end'];
       echo do_shortcode("[academic_attendance_table period_start='{$renews_period_start}' period_end='{$renews_period_end}' learner_id='{$wp_user_id}']");
   else:
        echo 'No Data Available';
   endif;

