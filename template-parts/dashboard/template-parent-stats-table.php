<?php


    /***
     * @ $target = ['dashboard', 'all-accounts']
     ****/
    if ( !empty($args) && $args['target'] ):
        $target = $args['target'];
    elseif( !empty($_GET['target']) ):
        $target = $_GET['target'];
    else:
        $target = false;
    endif;

    if( $target == 'dashboard' ):
        echo do_shortcode('[parent_status_table]');
    elseif ( $target == 'all-accounts' ):
        echo do_shortcode('[all_parent_status_table]');
    endif;
