<?php
    // get renews_on column from parent stats table
    global $wpdb;
    if( !empty($_GET['wp_user_id']) ):
        $wp_user_id = $_GET['wp_user_id'];
    else:
        $wp_user_id = get_current_user_id();
    endif;

    if( checkIfParent($wp_user_id) == true ):
        $is_parent = true;
    else:
        $is_parent = false;
    endif;


    $error_no_renews = '<div class="alert mx-auto w-50"> User has no renews on date. </div>';

    $current_date_object = new DateTime('now', new DateTimeZone('UTC'));
    $renews_period_startYmd = $current_date_object->format('Y-m-') . '01';
    $renews_on = date('Y-m-d', strtotime($renews_period_startYmd . ' +1 months - 1 day'));


//    // check if user is parent
//    if( checkIfParent($wp_user_id) == true ):
//        $parent_wp_user_id = $wp_user_id;
//        $is_parent = true;
//        $parent_stats_table = $wpdb->prefix . 'muslimeto_parent_stats';
//        // get all teachers
//        $parent_stats_results = $wpdb->get_results(
//            "SELECT renew_on FROM $parent_stats_table WHERE parent_wp_user_id = {$parent_wp_user_id}"
//        );
//        $wpdb->flush();
//
//
//        if ( !empty($parent_stats_results) ):
//            $renews_on = $parent_stats_results[0]->renew_on;
//            if( empty($renews_on) ):
//                echo $error_no_renews;
//                return;
//            else:
//                $current_date_object = new DateTime('now', new DateTimeZone('UTC'));
//                $today = $current_date_object->format('Y-m-d');
//
//                $renews_period_end = date('M d', strtotime($renews_on));
//                $renews_period_start = date("M d", strtotime('-28 days', strtotime($renews_on)));
//                $renews_period_startYmd = date("Y-m-d", strtotime('-28 days', strtotime($renews_on)));
//
//                if ( strtotime($renews_on) && strtotime($renews_period_startYmd) ) :
//                    $datetime1 = new DateTime($renews_period_startYmd);
//                    $datetime2 	= new DateTime($renews_on);
//                    $today 	= new DateTime($today);
//                    $whole_period_diff = $datetime1->diff($datetime2)->format('%a');
//                    $period_diff 	= $datetime1->diff($today)->format('%a');
//                    $billing_period_width = ($period_diff/$whole_period_diff)*100;
//                    $billing_days_remaining =  $datetime2->diff($today)->format('%a');
//                else:
//                    $billing_period_width = 0;
//                    $billing_days_remaining = 0;
//                endif;
//            endif;
//        else:
//            echo $error_no_renews;
//            return;
//        endif;
//
//    else:
////        // user is child, get his parent user id
////        $parent_wp_user_id = getParentID($wp_user_id);
//        $is_parent = false;
//    endif;


?>
<style>
    .tab-content.academic-attendance-content{
        padding: 0 4rem!important;
    }
    .academic-attendance-content .mak_container{
        display: none!important;
    }
    .academic-attendance-content .attendence-top-scn-filters{
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0,0,0,.16);
        padding: 10px;
    }
    .academic-attendance-content .attendence-group-status{
        display: flex;
        justify-content: space-between;
        align-items: start;
        border-radius: 0;
        background: transparent!important;
        margin: 10px -14px;
        padding: 0 ;
    }
    .academic-attendance-content .attendence-group-status h2{
        color: var(--main-color)!important;
        font-size: var(--fs-500)!important;
    }
    .academic-attendance-content .attendence-group-status .row{
        justify-content: space-between;
        margin: 0!important;
        width: 100%;
    }
    .academic-attendance-content .account-summery, .billing_scn{
        height: 10vh;
        padding: 10px!important;
    }
    .academic-attendance-content .Attendance-content-container{
        min-height: 30vh;
        border-radius: 20px;
        margin: 10px 0;
    }
    .academic-attendance-content .hidden-view,.attendance-view{
        display: none;
    }
    .academic-attendance-content .active-btn{
        background-color: var(--main-color);
    }
    .academic-attendance-content .active-btn i{color: #fff!important;}
    .academic-attendance-content .billing-percent{
        margin-bottom: 0!important;
    }
    .academic-attendance-content .top-info-title h2 small,.academic-attendance-content .account-summery h2,.academic-attendance-content .top-info-title h2{display: none!important;}
    .academic-attendance-content .academic-attendance.dataTable tbody tr{
        /* background: #fff; */
        border-bottom: 3px solid #eee;
    }
    .academic-attendance-content .academic-attendance.dataTable{
        margin-top: 20px!important;
    }
    .academic-attendance-content .attendance-capture td,.academic-attendance-content .attendance-capture th{
        vertical-align: middle!important;
        color: var(--main-color)!important;
        font-size: var(--fs-300)!important;
    }
    .academic-attendance-content .attendance-search{
        display: flex;

        align-items: center;
    }
    .academic-attendance-content .attendance-header{
        margin-bottom: 0!important;
        color: var(--main-color)!important;
        font-size: var(--fs-400)!important;
        justify-content: start!important;
    }
    .academic-attendance-content .attendance-header h4{
        margin-bottom: 0!important;
        white-space: nowrap;
        font-size: var(--fs-400);
        height: 41px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0;
    }
    .academic-attendance-content .attendate-datepicker-section{
        display: flex!important;
        flex-wrap: nowrap;
        color: var(--main-color);
        font-weight: 500;
        font-size: var(--fs-300);
    }
    .academic-attendance-content .attendate-datepicker-section a{
        margin: 0 5px!important;
        background: rgba(255,255,255,.3);
        height: 30px!important;
        padding: 0;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        width: 30px;
        border-radius: 50%;
        transition: 200ms linear;
    }
    .academic-attendance-content .attendate-datepicker-section a:hover{
        background-color: var(--blue);
        color: #fff!important;
    }
    .academic-attendance-content .attendate-datepicker-section a:hover i{
        color: #fff!important;
    }
    .academic-attendance-content .attendate-datepicker-section a.next_attendance_period:hover{
        transform: translateX(3px);
    }
    .academic-attendance-content .attendate-datepicker-section a.previous_attendance_period:hover{
        transform: translateX(-3px);
    }
    .academic-attendance-content .attendance-learners-select .parent_childs{
        margin: 0!important;
        justify-content: space-between!important;
        gap:0!important;
    }
    .academic-attendance-content .attendance-learners-select .reset_appointments_view.btn{
        color: #fff;
        background: var(--blue);
        border: 0;
        border-radius: 0;
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: 200ms linear;
        margin-left: 10px
    }
    .academic-attendance-content .attendance-learners-select .reset_appointments_view.btn:hover{
        transform: translateX(3px);
    }
    .academic-attendance-content .attendance-learners-select select{
        width: 80%!important;
        border: 1px solid rgba(0,0,0,.05);
        border-radius: 0;
        font-size: var(--fs-300);
    }
   /*.Attendance-content-container .dataTables_filter{display: none !important;}*/
   .academic-attendance-content .attendance-container .dataTables_filter label{
         padding:0!important;
         color: transparent!important;

   }
   .academic-attendance-content .attendance-container .dataTables_filter label{
       border: 0;
       border-radius: 0;
       color: var(--main-color);
   }
   .academic-attendance-content .dataTables_wrapper .dataTables_filter input{
        border: 0!important;
        border-radius: 0!important;
        box-shadow: 0 0 10px rgb(0 0 0 / 16%)!important;
   }
   .academic-attendance-content .academic-attendance.dataTable thead .sorting:nth-child(3),.academic-attendance-content .academic-attendance.dataTable thead .sorting:nth-child(4){
    background-image: none!important;
   }
   .academic-attendance-content .notes textarea.progress-notes{
            display: block;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: 5px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            line-clamp: 2;
            -webkit-box-orient: vertical;
            line-height: 20px;
            font-size: .6rem!important;
            color: var(--main-color)!important;
            opacity: .9!important;
            padding: 3px;
            border: 0!important;
            height: 45px!important;
            width: 100%!important;
            border-radius: 0!important;
   }
   .academic-attendance-content .dataTables_info {
        font-size: var(--fs-200);
        color: var(--main-color);
        opacity: .9;
        background: transparent;
        transition: 200ms linear;
    }
    .academic-attendance-content .dataTables_info:hover{
        opacity: 1;
    }
    .academic-attendance-content .page-item.active .page-link{
        border-color: var(--blue);
        background-color: var(--blue);
        color: #fff!important;
    }

    .academic-attendance-content .pagination .page-link{
        width: 35px;
        height: 35px;
        padding: 0;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        font-size: 1rem;
        margin: 0;
    }
    .academic-attendance-content .previous .page-link span,.academic-attendance-content .next .page-link span{
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2px 0px 0 9px;
        margin: 0;
        font-size: 1rem;
        border: 0;
        color: #fff!important;
    }
    .academic-attendance-content .dataTables_wrapper .col-sm-12{
        padding: 10px 0!important;
    }
    .academic-attendance-content .dataTables_wrapper .dataTables_filter label{
        margin-right: 0!important;
    }
    .academic-attendance-content .pagination{
        margin: 0!important;
        box-shadow: 0 0 10px rgba(0,0,0,.1);
        padding: 0!important;
    }
    .academic-attendance-content .dataTables_paginate{
        margin-top: 0!important;
    }
    .account-overview-num .material-icons{
        display: none!important;
    }
    .dataTables_wrapper.dt-bootstrap4 .row:last-child{
        padding: 10px;
    }
    .academic-attendance-content .value-container,.academic-attendance-content .summery-icon{
        font-size: var(--fs-300)!important;
    }
    .dataTables_empty{
        height: 15vh;
        text-align: center;
        color: var(--main-color)!important;
        font-size: var(--fs-300)!important;
    }
    .account-overview-p{
        align-items: end!important;
    }
    .account-overview-num{
        width: 40px;
    }
    .pagination .page-item.previous + .page-item .page-link{
        margin: 0!important;
    }
    .academic-attendance-content .dataTables_filter,.academic-attendance-content .dataTables_wrapper .row:first-child{
        display: none;
      }
    .academic-attendance td p{
        line-height: 15px;
        font-size: .55rem;
    }
    /* responsive Style */

    @media screen and (max-width: 1200px) {
        .sidebar{
            display: none!important;
        }
    }
    @media screen and (max-width: 992px) {
        .tab-content.academic-attendance-content {
           padding: 0 2rem!important;
      }
    }
    @media screen and (max-width: 450px) {
    .academic-attendance-content .attendance-capture td:nth-child(2),
    .academic-attendance-content .attendance-capture th:nth-child(2),
    .academic-attendance-content .attendance-capture td:nth-child(4),
    .academic-attendance-content .attendance-capture th:nth-child(4){
        display: none!important;
       }
       .academic-attendance-content .account-overview-p{
        align-items: center!important;
    }
    .academic-attendance-content .account-overview-num{
        width: auto!important;
    }


      .academic-attendance-content .dataTables_wrapper .col-sm-12{
        padding: 15px!important;
      }
      .dataTables_wrapper.dt-bootstrap4 .row:nth-child(3) .col-sm-12.col-md-5{
        display: none!important;
      }
    }

</style>

            <!-- attendence Status------------------------------- -->

            <div class="attendence-group-status">
                <?php
                if( $is_parent == true ):
                    get_template_part('template-parts/user-profile/template-user-stats', null, array(
                            'wp_user_id' => $wp_user_id,
                            'renews_on' => $renews_on
                        )
                    );
                endif;
                ?>
            </div>


              <!-- attendance filters--------------------------------- -->
                <div class="attendence-top-scn-filters row">
                                <!-- attendence period  -->
                                <div class="attendance-period col-md-6 p-0">
                                        <div class="attendance-header">
                                            <h4>
                                                Period:
                                            </h4>
                                            <input type="hidden" id="renews_period_start" value="<?= $renews_period_startYmd ?>">
                                            <input type="hidden" id="renews_period_end" value="<?= $renews_on ?>">

                                            <div class="attendate-datepicker-section">
                                                <a href="#" class="previous_attendance_period" data-balloon-pos="up" data-balloon="Previous Month"> <i class="fas fa-angle-left"></i> </a>
                                                    <div class="attendance-period-text">
                                                        <?php echo "$renews_period_startYmd - $renews_on"; ?>
                                                    </div>
                                                <a href="#" class="next_attendance_period" data-balloon-pos="up" data-balloon="Next Month"> <i class="fas fa-angle-right"></i> </a>
                                            </div>
                                        </div>
                                </div>
                                <!-- select learners -->
                                <div class="attendance-learners-select col-md-6 p-0">
                                            <?php
                                                get_template_part('template-parts/class-dashboard/template-learners-select', null, array(
                                                        'wp_user_id' => $wp_user_id,
                                                        'bb_group_id' => bp_get_current_group_id(),
                                                        'return_wp_uid' => true
                                                    )
                                                );
                                            ?>
                                </div>
                </div>

                <!-- attendance calendar ------------------------------->
                <section class="col-md-12 Attendance-content-container">
                    <!-- Attendence List view -->
                    <div class="attendence-list attendence-scn">
                        <?php //echo do_shortcode("[academic_attendance_table period_start='{$renews_period_startYmd}' period_end='{$renews_on}' learner_id='{$learner_id}']"); ?>
                    </div>
                </section>


            <!-- script---------------------------------------->
            <script>
                // account replaced handle text
                // replace billing period by period in===> attendance tab
                // replace next,previoud in pagination with icons==>attendance tab
                jQuery(document).ready(function(){
                    function HandleText (){

                        $(".billing-period-title").html("Period");
                        let prevBtnPage= '<i class="bb-icon-angle-double-left bb-icon-l"></i>';
                        let nextBtnPage='<i class="bb-icon-angle-double-right bb-icon-l"></i>';

                        $(".next .page-link").html($(nextBtnPage));
                        $(".previous .page-link").html($(prevBtnPage));
                    }
                    HandleText ();

                    //jQuery('.dataTables_filter').appendTo('.attendance-search-bar');

                    // on change learner select
                    $('body').delegate('.parent_childs select', 'change', function (e) {
                        e.preventDefault();
                        $('.attendence-list').html('<div id="loader"> </div>');
                        let wp_user_id = $(this).val();
                        let renews_period_start = $('#renews_period_start').val();
                        let renews_period_end = $('#renews_period_end').val();
                        // get template academic attendance table
                        let url_ajax= ajaxurl + '?template_fullname=/common/template-academic-attendance-table' ;

                        $.post(url_ajax, {
                            action: 'get_template_by_ajax',
                            wp_user_id: wp_user_id,
                            renews_period_start: renews_period_start,
                            renews_period_end: renews_period_end
                        }, function (response){ // response callback function
                            $('.attendence-list').html(response);
                        })
                        .done(function() {

                        });

                    });

                    // get next attendance period
                    $('body').delegate('.next_attendance_period', 'click', function (e) {
                        e.preventDefault();
                        let wp_user_id = $('.parent_childs select').val();
                        let renews_period_start = $('#renews_period_start').val();
                        let renews_period_end = $('#renews_period_end').val();

                        if( !wp_user_id ){
                            $.showError('please select learner first');
                            return;
                        }

                        // get attandance table in new period
                        $('.attendence-list').html('<div id="loader"> </div>');
                        $.post(ajaxurl, {
                            action: 'get_attendance_table_in_period',
                            wp_user_id: wp_user_id,
                            renews_period_start: renews_period_start,
                            renews_period_end: renews_period_end,
                            custom_period: 'next_month'
                        }, function (response){ // response callback function
                            try {
                                let jsonRespone = JSON.parse(response);
                                $('#renews_period_start').val(jsonRespone.new_period_start);
                                $('#renews_period_end').val(jsonRespone.new_period_end);
                                $('.attendance-period-text').text(jsonRespone.new_period_start + ' - ' + jsonRespone.new_period_end);

                                // send another request to get attendance table
                                getInitialAttendanceTable()
                            } catch(e) {
                                //JSON parse error, this is not json (or JSON isn't in your browser)
                                console.log('respone is not json')
                            }

                        })
                        .done(function() {

                        });


                    });

                    // get prev attendance period
                    $('body').delegate('.previous_attendance_period', 'click', function (e) {
                        e.preventDefault();
                        let wp_user_id = $('.parent_childs select').val();
                        let renews_period_start = $('#renews_period_start').val();
                        let renews_period_end = $('#renews_period_end').val();

                        if( !wp_user_id ){
                            $.showError('please select learner first');
                            return;
                        }

                        // get attandance table in new period
                        $('.attendence-list').html('<div id="loader"> </div>');
                        $.post(ajaxurl, {
                            action: 'get_attendance_table_in_period',
                            wp_user_id: wp_user_id,
                            renews_period_start: renews_period_start,
                            renews_period_end: renews_period_end,
                            custom_period: 'prev_month'
                        }, function (response){ // response callback function
                            try {
                                let jsonRespone = JSON.parse(response);
                                $('#renews_period_start').val(jsonRespone.new_period_start);
                                $('#renews_period_end').val(jsonRespone.new_period_end);
                                $('.attendance-period-text').text(jsonRespone.new_period_start + ' - ' + jsonRespone.new_period_end);

                                // send another request to get attendance table
                                getInitialAttendanceTable()
                            } catch(e) {
                                //JSON parse error, this is not json (or JSON isn't in your browser)
                                console.log('respone is not json')
                            }

                        })
                            .done(function() {

                            });


                    });


                    let selected_learner_id = $('.parent_childs select').val();
                    if( selected_learner_id !== null ){
                        getInitialAttendanceTable();
                    }



                }); ///////////////////// document ready end /////////////////////////


                function getInitialAttendanceTable(){
                    // get template academic attendance table when page load if learners select has value
                    let url_ajax= ajaxurl + '?template_fullname=/common/template-academic-attendance-table' ;
                    //get attandance table in new period
                    let start_period_date = $('#renews_period_start').val();
                    let end_period_date = $('#renews_period_end').val();
                    let wp_user_id = $('.parent_childs select').val();
                    $('.attendence-list').html('<div id="loader"> </div>');
                    $.post(url_ajax, {
                        action: 'get_template_by_ajax',
                        wp_user_id: wp_user_id,
                        renews_period_start: start_period_date,
                        renews_period_end: end_period_date
                    }, function (response){ // response callback function
                        $('.attendence-list').html(response);
                    })
                    .done(function() {

                    });
                }

            </script>
