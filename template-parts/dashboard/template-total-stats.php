<?php

    // get data from table
    global $wpdb;
    $parent_stats_table = $wpdb->prefix . 'muslimeto_parent_stats';
    // get all teachers
    $paren_stats_results = $wpdb->get_results(
        "SELECT * FROM $parent_stats_table"
    );
    $wpdb->flush();

    $total_overdue_balance = 0.0;
    $overdue_accounts = 0;

    $collection_overdue_balance = 0.0;
    $collection_accounts = 0;


    $total_mismatch_balance = 0.0;
    $mismatch_accounts = 0;

    $total_mismatch_paid_more_balance = 0.0;
    $mismatch_accounts_paid_more = 0;

    $total_mismatch_paid_less_balance = 0.0;
    $mismatch_accounts_paid_less = 0;

    $total_non_renewing_balance = 0.0;
    $non_renewal_accounts = 0;

    $total_recently_cancelled_account_balance = 0.0;
    $recently_cancelled_accounts = 0;


if( !empty($paren_stats_results) ):

    $today = date('Y-m-d');
    $date_check = date("Y-m-d", strtotime('-90 days', strtotime($today)));

    foreach ( $paren_stats_results as &$paren_stats_result ):
        $wp_user_id = $paren_stats_result->parent_wp_user_id;
        $user_obj = get_user_by('id', $wp_user_id);
        $paid_amount = (float) $paren_stats_result->paid_amount;
        $cancelled_amount = (float) $paren_stats_result->cancelled_amount;
        $balance_due = (float) $paren_stats_result->due_balance;


        // overdue accounts
        if( $balance_due > 0.0 && $paid_amount > 0.0 ):
            $total_overdue_balance += $balance_due;
            $overdue_accounts++;
        endif;



        // collection accounts
        if( $balance_due > 0.0 && $paid_amount === 0.0 ):
            $collection_overdue_balance += $balance_due;
            $collection_accounts++;
        endif;



        // all cancalled check infusionsoft_tags in meta with 362 ( all cancalled tag )

        //$infusionsoft_tags = get_user_meta($wp_user_id, 'infusionsoft_tags', true);

        // all cancelled => mslm_account_status == inactive
        $all_cancelled_meta = get_field( 'mslm_account_status', 'user_' . $wp_user_id );

        if( !empty($all_cancelled_meta) && $all_cancelled_meta == 'inactive' ):

                // last payemnt recieved within 90 days
                $last_payment = $paren_stats_result->last_payment;

                if( strtotime($date_check) <= strtotime($last_payment) ):
                    // user in recentrly cancalled
                    $total_recently_cancelled_account_balance += $cancelled_amount;
                    $recently_cancelled_accounts++;
                endif;

        endif;


//        $non_renewal_indicator = get_user_meta($wp_user_id, 'non_renewal_indicator', true);
//        $current_billing_indicator = get_user_meta($wp_user_id, 'current_billing_indicator', true);
//        $future_billing_indicator = get_user_meta($wp_user_id, 'future_billing_indicator', true);



        // mismatch accounts check
        $mslm_billing_indicator = get_field( 'mslm_billing_indicator', 'user_' . $wp_user_id );

        if( !empty($mslm_billing_indicator) && $mslm_billing_indicator == 'mismatch' ):
            $total_mismatch_balance += $paid_amount;
            $mismatch_accounts++;
        endif;


//        $parent_total_hours = json_decode($paren_stats_result->total_hours);
//        $assigned_hours = (float) $parent_total_hours->total_current_hrs;
//        $future_hours = (float) $parent_total_hours->total_current_hrs + $parent_total_hours->total_starting_hrs - $parent_total_hours->total_stopping_hrs;
//        $paid_hours = (float) $paren_stats_result->paid_hours;



//        if( $paid_hours > $assigned_hours && $paid_hours > $future_hours ):
//            $mismatch_accounts_paid_more++;
//            $total_mismatch_paid_more_balance += $paid_amount;
//        elseif( $paid_hours < $assigned_hours && $paid_hours < $future_hours ):
//            $mismatch_accounts_paid_less++;
//            $total_mismatch_paid_less_balance += $paid_amount;
//        endif;



        // non renewal accounts check
        $non_renewal_indicator = get_field( 'mslm_non_renewal_indicator', 'user_' . $wp_user_id );

        if( !empty($non_renewal_indicator) && $non_renewal_indicator == true ):
            $total_non_renewing_balance += $paid_amount;
            $non_renewal_accounts++;
        endif;



    endforeach;

    if( $total_overdue_balance >= 1000 ):
        $total_overdue_balance = round($total_overdue_balance / 1000, 1) . 'K';
    endif;

    if( $collection_overdue_balance >= 1000 ):
        $collection_overdue_balance = round($collection_overdue_balance / 1000, 1) . 'K';
    endif;

    if( $total_recently_cancelled_account_balance >= 1000 ):
        $total_recently_cancelled_account_balance = round($total_recently_cancelled_account_balance / 1000, 1) . 'K';
    endif;

    if( $total_mismatch_paid_more_balance >= 1000 ):
        $total_mismatch_paid_more_balance = round($total_mismatch_paid_more_balance / 1000, 1) . 'K';
    endif;

    if( $total_mismatch_paid_less_balance >= 1000 ):
        $total_mismatch_paid_less_balance = round($total_mismatch_paid_less_balance / 1000, 1) . 'K';
    endif;

    if( $total_non_renewing_balance >= 1000 ):
        $total_non_renewing_balance = round($total_non_renewing_balance / 1000, 1) . 'K';
    endif;


endif;




?>
<div class="row">

    <div class="col-lg-2 col-md-2 col-sm-12 p-0">
        <!-- dash item -->
        <div class="col-md-12  support-dashboard-item-container">
            <div class="support-dashboard-item">
                <div class="support-dashboard-item-tittle"> <small> Overdue Accounts </small> </div>
                <div class="support-dashboard-item-number"> <?php echo $overdue_accounts; ?> </div>
            </div>
        </div><!--end dash item -->
        <!-- dash item -->
        <div class="col-md-12  support-dashboard-item-container">
            <div class="support-dashboard-item">
                <div class="support-dashboard-item-tittle"> <small> Overdue Balance </small> </div>
                <div class="support-dashboard-item-number"> $ <?php echo $total_overdue_balance; ?> </div>
            </div>
        </div><!--end dash item -->
    </div>

    <div class="col-lg-2 col-md-2 col-sm-12 p-0">
        <!-- dash item -->
        <div class="col-md-12  support-dashboard-item-container">
            <div class="support-dashboard-item">
                <div class="support-dashboard-item-tittle"> <small> Mismatch </small> </div>
                <div class="support-dashboard-item-number"> <?php echo $mismatch_accounts; ?> </div>
            </div>
        </div><!--end dash item -->
        <!-- dash item -->
        <div class="col-md-12  support-dashboard-item-container">
            <div class="support-dashboard-item">
                <div class="support-dashboard-item-tittle"> <small> Mismatch $ </small> </div>
                <div class="support-dashboard-item-number"> $ <?php echo $total_mismatch_balance; ?> </div>
            </div>
        </div><!--end dash item -->
    </div>

    <div class="col-lg-2 col-md-2 col-sm-12 p-0">
        <!-- dash item -->
        <div class="col-md-12  support-dashboard-item-container">
            <div class="support-dashboard-item">
                <div class="support-dashboard-item-tittle"> <small> Non Renewing </small> </div>
                <div class="support-dashboard-item-number data-warning"> <?php echo $non_renewal_accounts; ?> </div>
            </div>
        </div><!--end dash item -->
        <!-- dash item -->
        <div class="col-md-12  support-dashboard-item-container">
            <div class="support-dashboard-item">
                <div class="support-dashboard-item-tittle"> <small> Non Renewing $ </small> </div>
                <div class="support-dashboard-item-number data-warning"> $ <?php echo $total_non_renewing_balance; ?> </div>
            </div>
        </div><!--end dash item -->
    </div>

    <div class="col-lg-2 col-md-2 col-sm-12 p-0">
        <!-- dash item -->
        <div class="col-md-12  support-dashboard-item-container">
            <div class="support-dashboard-item">
                <div class="support-dashboard-item-tittle"> <small> Recently Cancalled </small> </div>
                <div class="support-dashboard-item-number"> <?php echo $recently_cancelled_accounts; ?> </div>
            </div>
        </div><!--end dash item -->
        <!-- dash item -->
        <div class="col-md-12  support-dashboard-item-container">
            <div class="support-dashboard-item">
                <div class="support-dashboard-item-tittle"> <small> Recently Cancelled $ </small> </div>
                <div class="support-dashboard-item-number"> $ <?php echo $total_recently_cancelled_account_balance; ?> </div>
            </div>
        </div><!--end dash item -->
    </div>

    <div class="col-lg-2 col-md-2 col-sm-12 p-0">
        <!-- dash item -->
        <div class="col-md-12  support-dashboard-item-container">
            <div class="support-dashboard-item">
                <div class="support-dashboard-item-tittle"> <small> Collection Accounts </small> </div>
                <div class="support-dashboard-item-number"> <?php echo $collection_accounts; ?> </div>
            </div>
        </div><!--end dash item -->
        <!-- dash item -->
        <div class="col-md-12  support-dashboard-item-container">
            <div class="support-dashboard-item">
                <div class="support-dashboard-item-tittle"> <small> Collection $ </small> </div>
                <div class="support-dashboard-item-number"> $ <?php echo $collection_overdue_balance ; ?> </div>
            </div>
        </div><!--end dash item -->
    </div>

    <!-- dash item -->
</div>