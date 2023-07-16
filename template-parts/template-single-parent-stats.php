<?php
if ( $args['wp_user_id'] ):
    $customer_id = $args['wp_user_id'];
else:
    $customer_id = get_current_user_id();
endif;

?>