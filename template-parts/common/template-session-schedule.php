<?php
wp_enqueue_style( 'muslimeto-material-icons' );

$wp_user_id = get_current_user_id();
$parent_makeup_balance = get_user_meta($wp_user_id, 'makeup_balance', true);

ob_start(); ?>

    <div class="d-flex classes-section">
        <?php
        get_template_part('template-parts/common/template-parent-child-classes', null, array(
            'group_status' => 'Active',
            'group_type' => ['one-on-one', 'one-to-one', 'family-group']
        )); ?>

    </div>

    <style>
        div#schedule-makeup-session .modal-body {
            padding: 0 0 2rem 0;
        }

        button.approve-session-schedule[disabled] {
            background: #bab7b7 !important;
        }

        div#schedule-makeup-session .classes-select-section {
            background: transparent;
            width: 100%;
            padding: 0.5rem 1rem;
            display: flex;
            gap: 1rem;
            justify-content: space-between;
            align-items: center;
        }

        div#schedule-makeup-session .classes-select-section label{
            margin: 0;
        }
        div#schedule-makeup-session .classes-select-section select,datetime-section input[type="date"],datetime-section select {
            width: 100%;
            border: 0!important;
            box-shadow: 0 0 10px rgb(0 0 0 / 16%);
        }
        .middle-section {
            display: flex;
            justify-content: space-between;
            padding: 0 1rem;
        }

        .child-select-section {
            display: flex;
            gap: 1rem;
            width: 100%;
            justify-content: flex-start;
            align-items: baseline;
        }

        .child-select-section p ,.child-select-section label{
            margin: 0;
            font-size: 0.6rem!important;
            padding: 0;
            font-weight: normal!important;
        }

        .datetime-section {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            gap: 0.5rem;
            padding: 0 1rem;
            margin: 10px 0 30px 0;
            flex-flow: column;
        }

        .datetime-section label {
            flex: 0 0 100%;
            width: 100%;
        }

        .datetime-section small {
            text-align: initial;
            width: 50%;
            font-size: 0.6rem;
            margin-top: 0;
            padding-left: 2.6rem;
        }

        .footer-actions .action-btns {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }


        .datetime-section .full-w {
            flex: 50%;
        }

        .datetime-section .full-w label {
            width: 100%;
        }

        .datetime-section label {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            width: 50%;
        }

        .datetime-section label input,.datetime-section label select{
            justify-content: space-between;
            width: 100%!important;
            border:0!important;
            box-shadow: 0 0 10px rgba(0,0,0,.16);
        }
        .footer-actions {
            display: flex;
            justify-content: space-between;
            padding: 0 1rem;
            align-items: center;
        }
        .duration_radio_btns label{
            color:#fff!important
        }
        #schedule-makeup-session label ,.teacher-name-section {
            font-size: 0.7rem !important;
            color: var(--main-color);
            font-weight: 600;
        }
        #schedule-makeup-session .teacher-name-section{
            padding-left: 1rem!important;
        }
        .footer-actions label {
            display: flex;
            gap: 0.5rem;
        }

        .footer-actions .action-btns{
            gap: 1rem;
        }

        .child-select-section select {
            width: 100%;
            box-shadow: 0 0 10px rgb(0 0 0 / 16%);
        }

        button.btn.schedule-makeup-class:hover {
            background: transparent;
            border: 0;
        }

        .teacher-name-section {
            width: 50% !important;
            padding: 0rem;
        }

        .classes-select-section {
            width:100% !important;
        }

        .classes-select-section p{
            margin-bottom: 0!important;
        }
        .teacher-name-section span {
            font-weight: normal;
        }

        .child-select-section select{
            display: none !important;
        }

        div#schedule-makeup-session .cancel-message {
            width: auto !important;
            margin: 0 auto;
        }

        button.approve-session-schedule[disabled] {
            background: #ededed !important;
            color: #ccc8c8 !important;
        }

        label[for="date-select"] {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-flow: row;
        }

        label[for="date-select"] input, label[for="date-select"] span {
            flex: 50%;
        }

        .teacher_datetime {
            padding: 0 !important;
            width: 100%;
        }


    </style>

    <input type="hidden" value="" id="academic-bb-group-id">
    <input type="hidden" value="" id="parent_wp_user_id">

    <div class="middle-section">

        <div class="child-select-section">
            <label for=""> Learner(s) </label>
            <div class="childs_text"></div>
            <select name="childs-select" id="" multiple> </select>
        </div>


    </div>

    <div class="class-duration-section">
        <?php
        // before get duration check parent makeup balance , durations must show if larger or equal to makeup mins
        get_template_part('template-parts/common/template-duration-btns', null, array(
                'makeup_balance' => $parent_makeup_balance,
            )
        );
        ?>
    </div>

    <input type="hidden" value="0" id="service_id">
    <input type="hidden" value="<?= $wp_user_id ?>" id="wp_user_id">
    <input type="hidden" value="" id="group_timezone">

    <div class="datetime-section">


        <?php
        $min_date = date("Y-m-d", strtotime('tomorrow'));
        $max_date = date('Y-m-d', strtotime('+3 week', strtotime($min_date)));
        ?>
        <label for="date-select"> Date
            <input type="date" id="datetime-select" value="" min="<?= $min_date ?>" max="<?= $max_date ?>">
            <small class="teacher_datetime">  </small>
        </label>

        <label id="time-slots" for="">
            Time
            <?php get_template_part('template-parts/common/template-staff-time-slots'); ?>
        </label>

        <small class="timezone"> </small>



    </div>

    <div class="cancel-message info">
        <strong>Important</strong>
        <br>
        Please review details before proceeding, changes are not allowed once the session is confirmed.
    </div>

    <div class="footer-actions">
        <div class="action-btns">
            <a href="#" class="reject-session-schedule">Close</a>
            <button disabled class="approve-session-schedule">Confirm Session</button>
        </div>
    </div>

    <div class="temp-result"></div>

    <script>

        jQuery(document).ready(function(){

            // on select class get teacher name
            $('body').delegate('.users-groups-select', 'change', function (e){
                e.preventDefault();
                $('#schedule-makeup-session .modal-content').append('<div class="load-gif"><div id="loader"></div></div>');
                let bb_group_id = $(this).val();
                let parent_wp_user_id = $('#wp_user_id_ajax').val();

                let get_teacher_data_for_bbgroup_url = {
                    action : 'get_teacher_data_for_bbgroup',
                    bb_group_id: bb_group_id,
                    parent_wp_user_id: parent_wp_user_id
                };
                $.post(ajaxurl, get_teacher_data_for_bbgroup_url, function (response) { // response callback function
                    let jsonResponse = JSON.parse(response);
                    $(".teacher-name-section span").text('Teacher: ' + jsonResponse.name);
                    $(".teacher-name-section #staff_id").val(jsonResponse.id);
                    $('#service_id').val(jsonResponse.service_id);
                    $('.child-select-section select').html(jsonResponse.childs_options)
                    $('.child-select-section .childs_text').html(jsonResponse.childs_text)
                    $('#parent_wp_user_id').val(jsonResponse.wp_parent_user_id)
                    $('#group_timezone').val(jsonResponse.class_timezone);
                    $('small.timezone').text('Timezone: ' + jsonResponse.class_timezone)
                    getTimeslots()
                    // send to get class duration btns
                    let posted_wp_user_id = $('#parent_wp_user_id').val();
                    let get_class_duration_btn_url = {
                        action: 'get_class_duration_btns',
                        parent_wp_user_id: posted_wp_user_id
                    };
                    $.post(ajaxurl, get_class_duration_btn_url, function (response) { // response callback function
                        $('.class-duration-section').html(response);
                    })
                })


            });

            // on change on any input, check teacher available time slots
            $('body').delegate('.duration_radio_btns input', 'change', function (e) {
                e.preventDefault();
                getTimeslots()
            });


            $('body').delegate('#datetime-select', 'change', function (e) {
                e.preventDefault();
                getTimeslots()
            });


            function getTimeslots(){
                $('#schedule-makeup-session .modal-content').append('<div class="load-gif"><div id="loader"></div></div>');
                let staff_id = $('#staff_id').val();
                let class_duration = $('.duration_radio_btns input:checked').val();
                if( class_duration == undefined ){
                    class_duration = 0;
                }
                let session_start_date = $('#datetime-select').val();
                let service_id = $('#service_id').val();
                let group_timezone = $('#group_timezone').val();

                // send to get teacher slots
                let get_teacher_slots = {
                    action : 'get_available_slots',
                    staff_id: staff_id,
                    class_duration: class_duration,
                    session_start_date: session_start_date,
                    service_id: service_id,
                    group_timezone: group_timezone
                };
                $.post(ajaxurl, get_teacher_slots, function (response) { // response callback function
                    $('#time-slots select').html(response);
                    $('#schedule-makeup-session .modal-dialog .load-gif').remove();
                })

            }

            // on change start time enable submit btn
            $('body').delegate('#time-slots select', 'change', function (e) {
                e.preventDefault();

                // post ajax to get selected date in teacher timezone
                let start_time = $(this).val();
                let session_start_date = $('#datetime-select').val();
                let group_timezone = $('#group_timezone').val();
                let bookly_teacher_id = $('#staff_id').val();
                let get_datetime_in_staff_timezone_data = {
                    action : 'get_datetime_in_staff_timezone',
                    session_start_date: session_start_date,
                    group_timezone: group_timezone,
                    start_time: start_time,
                    bookly_teacher_id: bookly_teacher_id
                };
                $.post(ajaxurl, get_datetime_in_staff_timezone_data, function (response) { // response callback function
                    $('.teacher_datetime').html(response);
                });

                $('.approve-session-schedule').prop('disabled', false);
            });

            // on click approve schedule btn => process data
            $('body').delegate('.approve-session-schedule', 'click', function (e){
                e.preventDefault();
                $('#schedule-makeup-session .modal-content').append('<div class="load-gif"><div id="loader"></div></div>');
                let wp_user_id = $('#wp_user_id').val();
                let academic_parent_user_id = $('#parent_wp_user_id').val();
                let class_duration = $('.duration_radio_btns input:checked').val();
                if( class_duration == undefined ){
                    class_duration = 0;
                }
                let bookly_teacher_id = $('#staff_id').val();
                let bookly_service_id = $('#service_id').val();
                let booking_start_date = $('#datetime-select').val();
                let start_time = $('#time-slots select').val();
                let customer_id = $('.child-select-section select').val();
                let bb_group_id = $('.users-groups-select').val();
                let group_timezone = $('#group_timezone').val();

                let process_session_schedule_data = {
                    action : 'process_session_schedule',
                    wp_user_id: wp_user_id,
                    academic_parent_user_id: academic_parent_user_id,
                    class_duration: class_duration,
                    bookly_teacher_id: bookly_teacher_id,
                    bookly_service_id: bookly_service_id,
                    booking_start_date: booking_start_date,
                    start_time: start_time,
                    customer_id: customer_id,
                    bb_group_id: bb_group_id,
                    group_timezone: group_timezone

                };
                $.post(ajaxurl, process_session_schedule_data, function (response) { // response callback function
                    if( response == 'success' ) {
                        $.showInfo('Session Scheduled Successfully');
                        location.reload()
                    } else {
                        $('#schedule-makeup-session .modal-dialog .load-gif').remove();
                        $.showError(response)
                    }
                })

            });

            document.querySelector(".reject-session-schedule").addEventListener("click",function(){
                if(document.querySelector(".reject-session-schedule").innerHTML.match(/Are you sure?/gi)){



                    document.querySelector(".reject-session-schedule").innerHTML="Cancel"
                    $(".reject-session-schedule").attr("data-bs-dismiss", '');
                    document.querySelector(".reject-session-schedule").classList.remove("clickedRed");





                }else if(document.querySelector(".reject-session-schedule").innerHTML.match(/Cancel/gi)){
                    document.querySelector(".reject-session-schedule").innerHTML="Are you sure?"
                    $(".reject-session-schedule").attr("data-bs-dismiss", 'modal');
                    document.querySelector(".reject-session-schedule").classList.add("clickedRed");

                    setTimeout(function(){
                        document.querySelector(".reject-session-schedule").innerHTML="Cancel"
                        $(".reject-session-schedule").attr("data-bs-dismiss", '');
                        document.querySelector(".reject-session-schedule").classList.remove("clickedRed");


                    }, 6000);

                }
            })

        });

    </script>


<?php if( Bookly\Lib\Entities\Staff::query()->where( 'wp_user_id', get_current_user_id() )->count() > 0 ): ?>

    <script>
        jQuery(document).ready(function() {
            $('#schedule-makeup-session').on('show.bs.modal', function (e) {
                $('.childs_text').html('');
                $('.class-duration-section').html('');
                $('[name="childs-select"]').html('');
                $('#time-slots select').html('');
                let bb_group_id = $(e.relatedTarget).data('bb-group-id');

                $('#academic-bb-group-id').val(bb_group_id);

                // send to get classes list
                let get_classes_options_url = {
                    action: 'get_classes_options',
                    bb_group_id: bb_group_id
                };
                $.post(ajaxurl, get_classes_options_url, function (response) { // response callback function
                    $('#schedule-makeup-session .classes-section').html(response);
                })



            });
        });
    </script>

<?php endif; ?>

<?php
$body_content = ob_get_contents();
ob_end_clean();

get_template_part('template-parts/common/template-modal', null, array(
        'id' => 'schedule-makeup-session',
        'title' => 'Schedule Makeup Session ',
        'body' => $body_content
    )
);