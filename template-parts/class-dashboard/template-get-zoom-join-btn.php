<?php

    if ( !empty($args) && $args['bb_group_id'] ):
        $bb_group_id = (int) $args['bb_group_id'];
    else:
        $bb_group_id = bp_get_current_group_id();
    endif;

    $icon = '<img class="icon" src="'. get_stylesheet_directory_uri() .'/images/zoom-join-icon.png">';
    $icon_hover = '<img class="hover_icon" src="'. get_stylesheet_directory_uri() .'/images/zoom-join-icon-hover.svg">';
    $alert_no_data = '<div class="alert"> Missing Meeting ID </div>';

    $zoom_meeting_id = getZoomMeetingID($bb_group_id);
    if( !empty($zoom_meeting_id) ):
        $join_url = 'https://muslimeto.zoom.us/j/'.$zoom_meeting_id;
        echo '<div class="zoom-data">';
        echo '<a class="button zoom-join" target="_blank" href="'. $join_url .'"> '. $icon . $icon_hover .'<p> <span> Join Meeting </span><span class="zoom-mid">'. $zoom_meeting_id .'</span></p></a>';
        echo '</div>';
    else:
        echo $alert_no_data;
    endif;