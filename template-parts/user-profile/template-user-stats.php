
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet"/>
<div class="row p-0">
<?php

    if ( !empty($args) && $args['wp_user_id'] ):
        $wp_user_id = $args['wp_user_id'];
    else:
        $wp_user_id = get_current_user_id();
    endif;

    global $wpdb;
    $parent_stats_table = $wpdb->prefix . 'muslimeto_parent_stats';
    // get all teachers
    $parent_stats_results = $wpdb->get_results(
        "SELECT renew_on, due_balance, active_childs  FROM $parent_stats_table WHERE parent_wp_user_id = {$wp_user_id}"
    );
    $wpdb->flush();


    $active_childs = json_decode($parent_stats_results[0]->active_childs);
    if( !empty($active_childs) ):
        foreach ( $active_childs as $active_child_id ):
            // get customer id from child wp user id
            $customers_list[] = getcustomerID($active_child_id);
        endforeach;
    else:
        $customers_list = [];
    endif;


    if ( !empty($args) && $args['renews_on'] ):
        $renews_on = $args['renews_on'];
    elseif( !empty($_POST['renews_period_end']) ):
        $renews_on = $_POST['renews_period_end'];
    else:
        $renews_on = $parent_stats_results[0]->renew_on;
    endif;

?>
    <?php
    // check if parent
//    $user_is_parent = user_has_role(get_current_user_id(), 'parent');
//    if( $user_is_parent ):
        ?>
<style>
            /* top section style *****************************************/

    .account-summery,.billing_scn,.makeup-balance{
        /* height: 20vh; */
        display: flex!important;
        flex-direction: column!important;
        justify-content: start!important;
        align-items: start!important;
        min-height: auto;
        margin-bottom: 10px;

    }

    .account-summery{
        min-width: 295px;
    }
    .mak_container{
        min-width: 170px;
        padding: 0!important;
    }
    /* billing status *********************/
    .billing-aside-info .aside-info-title a{
        background: #9277b6;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        padding: 0 10px;
        border-radius: 15px;
        height: 18px;
        opacity: .8;
        transition:200ms linear;
        position: absolute;
        right:30px;
    }
    .billing-aside-info .aside-info-title a:hover{
        opacity: 1;
        transform: translateX(3px);
    }
    .billing-aside-info .aside-info-title a span{
        color: #fff;
        font-size: var(--fs-200);
    }
    .billing-aside-info .aside-info-title .aside-icons{
        background:rgb(146 119 182 );
    }
    .billing-aside-details h3{
        margin-bottom:0;
    }
    .billing-stats{
        width: 100%;
        display: flex;
        padding: 1rem 0.5rem;
        font-size: var(--fs-300)!important;
        height: 7vh;
        justify-content: start;
        align-items: center;
        background: rgb(70 179 230 / 16%);
        border-left: 5px solid var(--blue);
        transition: 200ms linear;
        opacity: .8;
    }
    .billing-stats:hover{
        opacity: 1;
    }
    .billing-aside-notfication{
        padding: 2px 10px;
        border-radius: 8px;
    }
    .billing-aside-notfication{
        padding: 2px 10px;
        border-radius: 8px;
    }
    .billing_link{
        position: relative;
    }
    .billing-notfication-num{
        width: 14px;
        height: 14px;
        border-radius: 50%;
        color: #fff;
        background: var(--bs-red);
        position: absolute;
        right: 15px;
        display: flex;
        top: 30px;
        justify-content: center;
        align-items: center;
        font-weight: bold
    }
    .billing-aside-notfication{
        background-color: #dff9ec ;
        color: #39da8a ;
    }
    .billing-aside-notfication.overdue_billing{
        background-color: #ffe5e5 !important;
        color: #ff5b5c !important;
    }
    .billing-period{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
    }
    .billing-period-left{
        /* background: rgb(255 91 92 / 10%); */
        border-radius: 3px;
        padding: 0 5px;
        color: var(--gray)!important;
        font-size: var(--fs-100)!important;
        opacity: .8;
    }
    .billing-percent{
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    .billing-aside-details h3 span,.billing-aside-details h3 small{
        font-size: var(--fs-300);
        color: var(--main-color);
    }
    /* account summery */

    .account-summery h2,.top-info-title h2 span:first-child,.makeup-balance h2{
        color: var(--main-color);
        font-size: var(--fs-500)!important;
        font-weight: 600!important;
        /* font-family: "Rubik","Times New Roman",serif!important; */
    }
    .account-summery h2,.makeup-balance h2{
        margin-bottom: 15px;
        white-space: nowrap;
    }
    .account-summery div{
        display: flex;
        justify-content: center;
        align-items: start;
        gap: 0;
        width: 100%;
    }
    .summery-icon{
        width: 40px;
        height: 40px;
        display: flex;
        /* align-content: center; */
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        padding: 6px;
        font-size: var(--fs-500)!important;
        color: #fff;
        font-weight: bold;
        background:#fff;
    }

    .summery-icon.rest{
        color: var(--green);
    }
    .summery-icon.cancellation{
        color: var(--orange);
    }
    .summery-icon.no-show{
        color: #f44336;
    }
    .summery-icon.late{
        color: var(--yellow);
    }
    .account-overview-num{
        font-size: var(--fs-200)!important;
        color: var(--main-color);
        white-space: nowrap;
        opacity: .8;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .account-overview-num .material-icons{
        font-size: 10px!important;
    }
    .account-overview-p{
        margin-bottom: 0!important;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction:column;
        cursor: default;
        width: 25%;
    }
    .account-overview-icon{
        height: 40px;
        width: 40px;
        background: #f1f3f3;
        display: inline-flex;
        border-radius: 50%;
        align-items: center;
        justify-content: center;
    }
    .tooltip.bottom .tooltip-arrow {
      top: 0;
      left: 50%;
      margin-left: -5px;
      border-bottom-color: #000000; /* black */
      border-width: 0 5px 5px;
    }
    .top-info-title h2{
          margin-bottom:7px;
    }
    .top-info-title h2 small{
        font-size: var(--fs-300);
        font-weight: 500;
        white-space: nowrap;
    }
    .top-right-scn{
        /* height: 25vh; */
        justify-content: space-around!important;
        align-items: start;
    }
    .billing-percent .progress{
        height: 0.357rem!important;
    }
    /* circular progress */
    .progress-circular{
        position:relative;
        background:#fff;
        width:40px;
        height:40px;
        border-radius:50%;
        display: grid;
        place-items:center;
    }
    .progress-circular:before{
        position:absolute;
        content:"";
        background:#f1f3f3;
        width:34px;
        height:34px;
        border-radius:50%;
        top:3px;
    }
    .value-container{
      position: relative;
      font-size: var(--fs-500);
      font-weight: bold;
    }
    /* mak balance */
    .makeup-balance{
        border-radius: 0 10px 10px 0;
        background: rgb(71 179 230 / 16%);
        border-left: 4px solid var(--blue);
    }

    .mak_down:hover,.account-active-learners:hover{
        background-color: transparent;
    }
    .mak_down .material-icons,.account-active-learners .material-icons{
        width: 40px;
        height: 40px;
        background: #fff;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        border-radius: 23%;
        /* padding: 7px; */
        /* margin-top: -10px; */
        color: #997fba;
        position: relative;

    }
    .makeup-balance h2{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .mak_down{
        border-radius: 12px;
        width: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .makeup-balance h2 .material-icons{
        color: var(--blue);
        background: rgb(70 179 230 / 16%);
        width: 40px;
        height: 40px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
    }
    .account-active-learners p{
        margin-bottom:0;
        display: flex;
        flex-direction:column;
    }
    .mak_down p{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 0!important;
    }
    .mak_hours,.mak_minutes{
        width: 3rem;
        height: 2rem;
    }
    .mak_time{
        font-size: 2rem!important;
        color:#fff;
        background:var(--blue);
        width: 3rem;
        height: 2rem;
        background: #46b3e6;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        border-radius: 0px;
        box-shadow: 0 0 15px rgb(126 193 220);
    }
    .mak_text{
        font-size: var(--fs-100)!important;
        display: flex;
        justify-content: start;
        align-items: start;
        position: relative;
        line-height: 2;
    }
    .mak_separator{
        width: 1rem;
        font-size: 1.5rem!important;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .mak_actions{
        justify-content: space-between;
        width: 100%;
        position: relative;
        align-items: center;
        padding: 10px;
    }
    .mak_actions .material-icons{
        font-size: var(--fs-400);
        color: #fff;
    }


    .buddypanel .site-content{
      padding: 0 10px!important;
    }

    /* end top section **************************************/
    </style>


        <!-- active learners -->

        <div class="col-lg-3  col-md-12 col-xs-12 billing_scn">
            <div class="billing-aside-info w-100">
                <div class="top-info-title">
                    <h2 class="w-100">
                        <span>Learning Plan</span>
                        <!-- <?php


                        if( !empty($parent_stats_results) ):
                            $overdue = $parent_stats_results[0]->due_balance;
                        else:
                            echo '<div class="alert sm"> User has no data. </div>';
                            return;
                        endif;
                        if( $overdue > 0 && $overdue !== false ):
                            ?>
                            <small class="billing-aside-notfication overdue_billing">Overdue Balance</small>
                        <?php else: ?>
                            <small class="billing-aside-notfication">All is good,JAK</small>
                        <?php endif; ?> -->
                        <!--                                         <small class="billing-aside-notfication">$100 Overide</small>-->
                    </h2>
                </div>
                <div class="billing-aside-details w-100">
                    <h3 class="billing-percent">
                        <?php

                        $current_date_object = new DateTime('now', new DateTimeZone('UTC'));
                        $today = $current_date_object->format('Y-m-d');
                        if( !empty($renews_on) ):
                            $renews_period_end = date('M d', strtotime($renews_on));
                            $renews_period_start = date("M d", strtotime('-28 days', strtotime($renews_on)));
                            $renews_period_startYmd = date("Y-m-d", strtotime('-28 days', strtotime($renews_on)));
                            if ( strtotime($renews_on) && strtotime($renews_period_startYmd) ) :
                                $datetime1 = new DateTime($renews_period_startYmd);
                                $datetime2 	= new DateTime($renews_on);
                                $today 	= new DateTime($today);
                                $whole_period_diff = $datetime1->diff($datetime2)->format('%a');
                                $period_diff 	= $datetime1->diff($today)->format('%a');
                                $billing_period_width = ($period_diff/$whole_period_diff)*100;
                                $billing_days_remaining =  $datetime2->diff($today)->format('%a');
                            else:
                                $billing_period_width = 0;
                                $billing_days_remaining = 0;
                            endif;
                        else:
                            $renews_period_end = 'No Data';
                            $renews_period_start = 'No Data';
                            $renews_period_startYmd = 'No Data';
                            $billing_days_remaining = 0;
                        endif;
                        ?>
                        <span> <?php echo $renews_period_start; ?> </span>
                        <small> <?php echo $renews_period_end; ?> </small>
                    </h3>
                    <h3 class="billing-percent">
                        <div class="progress w-100" style="background-color:white">
                            <div class="progress-bar" role="progressbar" style="width: <?php echo $billing_period_width; ?>%;background-color:var(--blue)" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </h3>
                    <h3 class="billing-period">
                                            <span>
                                                <span class="billing-period-title">Billing Period</span>
                                            </span>
                        <span class="billing-period-left"> <?php echo $billing_days_remaining; ?> DAYS LEFT</span>
                    </h3>
                </div>
            </div>
        </div>
    <?php //endif; ?>

        <!-- Acoount summery -->
        <div class="col-lg-6 col-md-6 col-sm-12 account-summery">
            <h2 class="w-100">Attendance Summery</h2>
            <div>
                <?php
                    $bookly_CA_events = getCAeventsDuringPeriod($renews_period_startYmd, $renews_on, $customers_list);
                    $events_total_hrs = getRecordedHrs($wp_user_id, $bookly_CA_events);
                    $student_late_times = getStudentLateTimes($wp_user_id, $bookly_CA_events);
                    $total_cancelled_times = getCancalledTimes($wp_user_id, $bookly_CA_events);
                    $total_noshow_student = getStudentNoshowTimes($wp_user_id, $bookly_CA_events);
                ?>
                <input type="hidden" id="total_events_hrs" value="<?php echo $events_total_hrs['family_total_events_hrs']; ?>">
                <input type="hidden" id="recorded_hrs" value="<?php echo $events_total_hrs['family_total_recorded_hrs']; ?>">

                <p class="account-overview-p">
                    <!-- <span class="summery-icon rest">14</span> -->
                    <span class="progress-circular" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Recorded Hours"> <span class="value-container"> 50% </span> </span>
                    <span class="account-overview-num" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Recorded Hours"><span class="material-icons">av_timer</span>Recorded</span>
                </p>
                <p class="account-overview-p">
                    <span class="summery-icon late" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Late Attendance"> <?php echo !empty($student_late_times) ? $student_late_times['family_student_late_times'] : 0 ; ?> </span>
                    <span class="account-overview-num" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Late Attendance"><span class="material-icons">access_alarm</span>Late</span>
                </p>
                <p class="account-overview-p">
                    <span class="summery-icon cancellation" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cancellations"> <?php echo !empty($total_cancelled_times) ? $total_cancelled_times['family_cancelled_times'] : 0 ; ?> </span>
                    <span class="account-overview-num" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cancellations"><span class="material-icons">do_not_disturb</span>Cancellations</span>
                </p>
                <p class="account-overview-p">
                    <span class="summery-icon no-show" data-bs-toggle="tooltip" data-bs-placement="bottom" title="No show"> <?php echo !empty($total_noshow_student) ? $total_noshow_student['family_no_show_s'] : 0 ; ?> </span>
                    <span class="account-overview-num" data-bs-toggle="tooltip" data-bs-placement="bottom" title="No show"><span class="material-icons">disabled_visible</span>No Shows</span>
                </p>


            </div>
        </div>

    <?php

        get_template_part('template-parts/common/template-makeup-widget', null, array(
            'wp_user_id' => $wp_user_id
        ));

    ?>

</div>

<script>

    (function($){



        // prgress bar
        // proress bar circular
        let progressBar = document.querySelector(".progress-circular");
        let valueContainer = document.querySelector(".value-container");
        let progressVAlue = 0;
        let recordedHours = document.querySelector("#recorded_hrs").value;
        let totalHours = document.querySelector("#total_events_hrs").value;
        let endValue = (recordedHours/totalHours)*100; // change this prgress bar
        let percent = Math.floor(endValue)
        //console.log(endValue);
        let speed = 10;

        let progress = setInterval(() => {
            progressVAlue++;
            valueContainer.textContent = `${recordedHours}`;
            progressBar.style.background=`conic-gradient(
            #47b3e6 ${progressVAlue * 3.6}deg,
        #cadcff ${progressVAlue * 3.6}deg
        )`;
                if(progressVAlue==percent){
                    clearInterval(progress);
                }
            }, speed);




        $.get(ajaxurl, {
            action: 'get_schedule_class_modal',
        }, function (response){ // response callback function
            $('body').append(response);

        })
        .done(function() {
            //alert( "second success" );
        });






    }(jQuery));


</script>
