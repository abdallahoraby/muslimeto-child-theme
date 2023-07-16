<style>
    .load-gif2 {
        height: 15vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #loader {
        top: 0;
    }

    .load-gif2 i {
        color: var(--green);
        font-size: 2rem;
    }

    .submit-modal-reject-feedback{
        display: flex!important;
        justify-content: center;
        align-items: center;
        width: 200px;
        background-color: var(--blue)!important;
        color:#fff!important;
        margin-top: 25px!important;
        border:0!important;
    }


</style>

<?php

    if (is_user_logged_in() && $GLOBALS['next_pending'] !== false) : // if user is logged in => get next pending class
        $next_pending = $GLOBALS['next_pending'];
        $wp_user_id = get_current_user_id();
        // get bb tmiezone
        $sp_entry_id = getBBgroupGFentryID($next_pending['stored_bb_group_id']);
        $class_timezone = getSPentryTimezone($sp_entry_id);
        $start_date_converted = convertTimezone1ToTimezone2 ( $next_pending['start_date'], 'UTC', $class_timezone );
        $end_date_converted = convertTimezone1ToTimezone2 ( $next_pending['end_date'], 'UTC', $class_timezone );
        $duration = ( strtotime($end_date_converted) - strtotime($start_date_converted) ) / 60;
        $staff_fullname = getStaffFullName($next_pending['staff_id']);
        $ca_id = $next_pending['ca_id'];
        $token = $next_pending['token'];
        $bb_group_id = $next_pending['stored_bb_group_id'];
        $status = $next_pending['status'];
        if( $status !== 'pending' ):
            $error_message = "Session has been $status before. Please contact support.";
        endif;
    else: // if user logged out => get class data from token
        $token = $_GET['verify_token'];
        $wp_user_id = $_GET['uid'];
        if( empty($token) || empty($wp_user_id) ):
            $error_message = 'No valid token provided. Please contact support.';
            return;
        else:
            // get session data from token
            $pending_session = getSessionDatafromToken($token);
            if( $pending_session == false ):
                return;
            else:
                // get bb tmiezone
                $sp_entry_id = getBBgroupGFentryID($pending_session['stored_bb_group_id']);
                $class_timezone = getSPentryTimezone($sp_entry_id);
                $start_date_converted = convertTimezone1ToTimezone2 ( $pending_session['start_date'], 'UTC', $class_timezone );
                $end_date_converted = convertTimezone1ToTimezone2 ( $pending_session['end_date'], 'UTC', $class_timezone );
                $duration = ( strtotime($end_date_converted) - strtotime($start_date_converted) ) / 60;
                $staff_fullname = getStaffFullName($pending_session['staff_id']);
                $ca_id = $pending_session['ca_id'];
                $bb_group_id = $pending_session['stored_bb_group_id'];
                $status = $pending_session['status'];
                if( $status !== 'pending' ):
                    $error_message = "Session has been $status before. Please contact support.";
                endif;
            endif;
        endif;
    endif;




?>

<!-- Modal schedual class ------------------------->
<div class="">
    <div class="modal fade header-schedual-class" id="header-schedual-class" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Makeup Session Confirmation </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal_icon">
                    <i class="bb-icon-alarm bb-icon-l"></i>
                </div>

                <?php if( empty($error_message) ): ?>
                    <div class="modal-body m-0 pb-0">

                        <!-- content -->
                        <div class="schadual_clsaa_message">

                            <!-- time -->
                            <div class="schadual_clsaa_info">
                                <div class="schadual_clsaa_time ">
                                    <p class="schadual_clsaa_date"><i class="bb-icon-calendar bb-icon-l"></i>Date : <?= date('Y-m-d', strtotime($start_date_converted)) ?> </p>
                                    <p><i class="bb-icon-caret-right bb-icon-l"></i>Duration : <?= $duration ?> min</p>
                                    <p><i class="bb-icon-alarm bb-icon-l"></i>Start : <?= date('h:i A', strtotime($start_date_converted)) ?> </p>
                                    <p><i class="bb-icon-map bb-icon-l"></i>TimeZone : <?= $class_timezone ?> </p>
                                </div>
                            </div>

                            <!-- teacher name -->
                            <div class="schadual_clsaa_teacher">
                                <i class="bb-icon-user bb-icon-l"></i>
                                <span> <?= $staff_fullname ?> </span>
                            </div>

                            <p>
                                <i class="bb-icon-quote-left bb-icon-l"></i>
                                schedule new makeup class session
                                <i class="bb-icon-quote-right bb-icon-l"></i>
                            </p>

                        </div>

                    </div>
                    <div class="modal-footer">

                        <div style="display:flex;">
                            <button type="button" class="btn btn-secondary Reject_schedual" data-bb-group-id="<?= $bb_group_id ?>">Reject</button>
                            <button id="rjctRprtSchadual" type="button" class="btn btn-secondary feedback_schedual_makup "> Reject & Report Issue </button>
                        </div>
                        <button type="button" class="btn btn-primary confirm_schedule" data-user-id="<?= $wp_user_id ?>" data-token="<?= $token ?>">Accept</button>


                    </div>
                    <div class="schedual_session_feedback hide_schedual_feedback animate__animated animate__zoomInUp">
                        <form class="">
                            <!-- checkbox -->
                            <label class="title-label mb-2">Which of the following issues occurred (you may select one or more)?</label>
                            <div class="feedback-schedual-select row g-1">

                                <div class="form-check">
                                    <input type="radio" value="This Is Not The Time I Agreed On With Teacher" name="schedual-feedback">
                                    <label>
                                        This Is Not The Time I Agreed On With Teacher
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" value="Teacher Didn't Contact Me For This Session" name="schedual-feedback">
                                    <label>
                                        Teacher Didn't Contact Me For This Session
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" value="Teacher Scheduled Too Many Makeup Sessions" name="schedual-feedback">
                                    <label>
                                        Teacher Scheduled Too Many Makeup Sessions
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" value="Other" name="schedual-feedback">
                                    <label>
                                        Other
                                    </label>
                                </div>
                            </div>

                            <!-- textarea -->
                            <label class="title-label"> Issue Details</label>
                            <div class="form-check mb-0 px-0">
                                <textarea class="form-control" placeholder="Share any further details here" id="floatingTextarea2" style="height: 100px"></textarea>
                            </div>

                            <input type="hidden" value="" class="feedback_ca_id">

                            <a href="#" class="btn btn-primary submit-modal-reject-feedback" data-bb-group-id="<?= $bb_group_id ?>" data-ca-id="<?= $ca_id ?>"> Reject & Report Issue </a>
                        </form>
                    </div>
                <?php else: ?>
                    <div class="modal-body m-0 pb-0">
                        <!-- content -->
                        <div class="schadual_clsaa_message">
                            <?= $error_message ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- end of modal  schedual class-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>

    jQuery(document).ready(function(){

        // on click accept schedule
        $('body').delegate('.confirm_schedule', 'click', function (e){
            e.preventDefault();
            $("#header-schedual-class .modal-body").html('<div class="load-gif2"><div id="loader"></div></div>');
            $("#header-schedual-class .modal-footer").hide();
            let wp_user_id = $(this).data('user-id');
            let token = $(this).data('token');

            let send_to_accept_data = {
                action : 'accept_makeup_session',
                wp_user_id: wp_user_id,
                token: token
            };
            $.post(ajaxurl, send_to_accept_data, function (response) { // response callback function
                if( response == 'success' ){
                    let message = 'Makeup Session Approved Successfully';
                    $.showInfo(message);
                    $("#header-schedual-class .load-gif2").html('<i class="bb-icon-check bb-icon-l"></i>  ' + message);
                    setTimeout(function(){
                        window.top.close();
                    }, 3000);

                } else {
                    $.showError(response);
                }
            })

        });

        // on click reject schedule
        $('body').delegate('.Reject_schedual', 'click', function (e){
            e.preventDefault();
            $("#header-schedual-class .modal-body").html('<div class="load-gif2"><div id="loader"></div></div>');
            $("#header-schedual-class .modal-footer").hide();
            let bb_group_id = $(this).data('bb-group-id');

            let send_to_reject_data = {
                action : 'reject_makeup_session',
                bb_group_id: bb_group_id
            };
            $.post(ajaxurl, send_to_reject_data, function (response) { // response callback function
                if( response == 'success' ){
                    let message = 'Makeup Session Rejected Successfully';
                    $.showInfo(message);
                    $("#header-schedual-class .load-gif2").html('<i class="bb-icon-check bb-icon-l"></i>  ' + message);
                    setTimeout(function(){
                        window.top.close();
                    }, 3000);

                } else {
                    $.showError(response);
                }
            })

        });

        // on submit reject and report issue
        $('body').delegate('.submit-modal-reject-feedback', 'click', function (e){
            e.preventDefault();

            let feedback_selected = $('[name="schedual-feedback"]:checked').val();
            let feedback_notes = $('.schedual_session_feedback textarea').val();
            let ca_id = $(this).data('ca-id');
            let bb_group_id = $(this).data('bb-group-id');

            if( !feedback_selected || !ca_id ){
                $.showError('Please fill all fields to continue.');
            } else {
                $("#header-schedual-class .modal-body").html('<div class="load-gif2"><div id="loader"></div></div>');
                $("#header-schedual-class .modal-footer").hide();
                $("#header-schedual-class .schedual_session_feedback").hide();
                // send to capture_session_feedback
                let send_to_capture_feedback_data = {
                    action : 'capture_session_feedback',
                    feedback_selected: [feedback_selected],
                    feedback_notes: feedback_notes,
                    ca_id: ca_id
                };

                $.post(ajaxurl, send_to_capture_feedback_data, function (response) { // response callback function

                    if( response == 'success' ){

                        // send to reject_makeup_session
                        let send_to_reject_data = {
                            action : 'reject_makeup_session',
                            bb_group_id: bb_group_id
                        };
                        $.post(ajaxurl, send_to_reject_data, function (response) { // response callback function
                            if( response == 'success' ){
                                let message = 'Makeup Session Rejected and Feedback sent Successfully';
                                $.showInfo(message);
                                $("#header-schedual-class .load-gif2").html('<i class="bb-icon-check bb-icon-l"></i>  ' + message);
                                setTimeout(function(){
                                    window.top.close();
                                }, 3000);

                            } else {
                                $.showError(response);
                            }
                        })

                    } else {
                        $.showError(response);
                    }
                })
            }


        });


    });

</script>
