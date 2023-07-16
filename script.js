let ModalShow = true ;
let ModalShowOngoing = true ;


jQuery("#count-down-upcomming-class .btn-close").on("click",function(){
  localStorage.setItem('UpcomingPopUpOpn','true');
  console.log(localStorage.getItem('UpcomingPopUpOpn'));
   setInterval(function(){
     localStorage.removeItem("UpcomingPopUpOpn");
   }, 300000 );
})




jQuery(".sub-menu .sub-menu-inner .user-link,.sub-item,.menu-item,.quran_gateway_sora_list li a,.site-title a,.link_loader").on("click",function(){
  $(".preloader").css('display','flex');
})



jQuery(document).ready(function(){

  if($(".btn.duplicate-event")){
        $(".btn.duplicate-event").on("click",function(){
        $("#content").css('zIndex',99999);
        if($(".modal.micromodal-slide").attr("aria-hidden")=='true'){console.log("nnnn")}
      })
  }

    $('#loader').bind('ajaxStart', function(){
        $(this).show();
    }).bind('ajaxStop', function(){
        $(this).hide();
    });

    // get template name in /template-parts
    $("body").delegate(".get_template", "click", function(){
        let template_name = $(this).attr('data-template-name');
        let template_folder = $(this).attr('data-template-folder');
        let tab_name = $(this).attr('data-tab-name');
        $('.'+tab_name).html('<div id="loader"> </div>');
        let url = '';

        if( template_folder && template_folder.length > 0 ){
            url = ajaxurl + '?template_fullname=' + template_folder + 'template-' +template_name ;
        } else {
            url = ajaxurl + '?template_name=' + template_name;
        }



        let data = {
            action : 'get_template_by_ajax',
        };
        $.get(url, data, function (response) { // response callback function
            $('.'+tab_name).html(response);
        })
    });



    var close = document.getElementsByClassName("closebtn");
    var i;

    for (i = 0; i < close.length; i++) {
        close[i].onclick = function(){
            var div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function(){ div.style.display = "none"; }, 600);
        }
    }

    // if in academic page add class to body
    if($('.academic-home').length != 0) {
        $('body').addClass('academic-home');
    }

    // add active class if academic page
    //$('.academic-home .buddypanel-menu.side-panel-menu.muslimeto_nav li:nth-of-type(2)').addClass('current-menu-item');
    if( $('#academic_page_menu').length > 0 ){
        let menu_item_id = $('#academic_page_menu').val();
        $('.academic-home .buddypanel-menu.side-panel-menu.muslimeto_nav #'+menu_item_id).addClass('current-menu-item');

    }


    if( $('#submenu').length > 0 ){
        $('#content').addClass('has-submenu');
    }

    // add current menu class to side menu
    let parent_side_menu = $('#parend_side_menu').val();
    $('.muslimeto_nav li').each(function(){

        let item_id = $(this).attr('id');
        if( item_id === 'menu-item-'+parent_side_menu ){
            $(this).addClass('current-menu-item');
            $('.muslimeto_nav li').not(this).removeClass('current-menu-item');
        }

    });


    //check if submenu has 2 columns, add more space to content in mobile
    if( $('#two-columns').val() === 'two-columns' ){
        $('.has-submenu').addClass('two-columns');
    }

    // in mobile hide text of join meeting btn
    if (window.matchMedia('(max-width: 768px)').matches) {
        $('a.button.zoom-join span').hide();
    } else {
        $('a.button.zoom-join span').show();
    }



    // academic goup paginh
    $(".get_groups_page").on('click', function(){
        let page_num = $(this).attr('data-page-num');
        let per_page = $(this).attr('data-per-page');
        let paging = page_num + ',' + per_page;

        // send ajax delte confirmation
        $.post(ajaxurl, {
            action : 'get_groups_page',
            paging : paging
        }, function (response) { // response callback function
            $('.groups-content').html(response);
        })
        .done(function () {

        });


    });

    // live search on keyup
    $("#dir-members-search").keyup(function() {

        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val(),
            count = 0;
        console.log(filter)

        // Loop through the comment list
        $('.Academic-cards .card').each(function() {


            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).hide();  // MY CHANGE

                // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).show(); // MY CHANGE
                count++;
            }

        });

    });


    // filter group type on academic template
    $('#groups-order-by').change(function(){
        var value = $(this).val();
        $(".Academic-cards").find(".Academic-item").hide()
        if( value === 'all-group-type' ){
            $(".Academic-cards").find(".Academic-item").show()
        } else {
            $.each($(".Academic-cards").find(".Academic-item"),function(){
                if($(this).data('group-type') == value)
                    $(this).show();
            });
        }

    });

    $('#gform_14 input').addClass('form-control');
    $('#gform_14 label').addClass('form-label');

    // active change status tabs account
    $('ul.nav.nav-pills li a.get_template').on('click', function(){

        $(this).addClass('active');
        $('ul.nav.nav-pills li a.get_template').not(this).removeClass('active');

    });

    // tickets open help
    $(window).on('load', function () {
        $('button.tickets-help-center-btn').on('click', function(){
            $('div#zohohc-asap-web-launcherbox').trigger('click');
        });
    });


// Handle pre loader

$(".preloader").css('display','none');

// end preloader

// add saerch icon for search bar in hr dashboard page
$("[name=employee_search]").attr("value", '\⌕');
$("#wphr-employee-search-search-input").attr("placeholder", 'Search employee');
$(".wphr-hr-employees-wrap-inner .search-box").append("<button class='filter-btn' type='button'>Filter</p>");


//
if($('.wphr-avatar')){
  $('.wphr-avatar').prepend("<button id='my-profile-pic' data-toggle='modal' data-target='#model_img'><i class='bb-icon-camera bb-icon-f'></i></butto>")
}

// toggle filter hr dashboard
let filterButton = document.querySelector(".wp-hr-frontend .filter-btn");
let filterscn = document.querySelector(".wp-hr-frontend .tablenav");
if(filterButton && filterscn){
    filterButton.addEventListener("click",function(){
        filterscn.classList.toggle("hide_show_filter")
    });
}

    // update member data on account page
    $('body').delegate('.learner-edit-btn', 'click', function (e){
       $(this).addClass('hidden');
       let this_row = $(this).parent().parent().parent();
       this_row.find('.update_member_data').removeClass('hidden');
       this_row.find('.edit_member').removeClass('hidden');

    });


    $("body").delegate(".update_member_data", "click", function(e) {
        e.preventDefault();
        $('.ajax_image_section').css('display', 'flex');
        let this_row = $(this).parent().parent().parent();
        let member_wp_user_id = this_row.find('.member_wp_user_id').val();
        let full_name = this_row.find('td.learner-table-fullName input').val();
        let gender = this_row.find('td.learner-table-gender select').val();
        let date_of_birth = this_row.find('td.learner-table-DateOfBirth input').val();
        let email = this_row.find('td.learner-table-email input').val();

        $.post(ajaxurl, {
            action : 'update_member_data',
            member_wp_user_id: member_wp_user_id,
            full_name : full_name,
            gender : gender,
            date_of_birth : date_of_birth,
            email : email,
        }, function (response) { // response callback function
            $('.ajax_image_section').hide();
            if( response == 'success' ){
                this_row.find('.update_member_data').addClass('hidden');
                this_row.find('.edit_member').addClass('hidden');
                $('.learner-edit-btn').removeClass('hidden');
                $.showInfo('Data Updated Successfully');
                location.reload();
            } else {
                $.showError(response)
            }
        })
        .done(function () {

        });


    });

    // set new member password
    $('body').delegate('.set_new_pass', 'click', function (e){
        $(this).find('.new').toggleClass('hidden');
        $(this).find('.update').toggleClass('hidden');
        $(this).parent().find('.set-new-password-input').toggleClass('hidden');
        $(this).parent().find('.close').toggleClass('hidden');
    });

    $("body").delegate(".set_new_pass .update", "click", function(e) {
        e.preventDefault();
        let member_wp_user_id = $(this).parent().parent().find('.member_wp_user_id').val();
        let new_password = $(this).parent().parent().find('.set-new-password-input').val();

        $.post(ajaxurl, {
            action : 'update_member_data',
            member_wp_user_id: member_wp_user_id,
            new_password: new_password
        }, function (response) { // response callback function
            if( response == 'success' ){
                $.showInfo('Password Updated Successfully');
                location.reload();
            } else {
                $.showError(response)
            }
        })
            .done(function () {

            });

    });

    function HandleText (){
        $(".billing-period-title").html("Period");
        let prevBtnPage= '<i class="bb-icon-angle-double-left bb-icon-l"></i>';
        let nextBtnPage='<i class="bb-icon-angle-double-right bb-icon-l"></i>';

            $(".next .page-link").html($(nextBtnPage));
            $(".previous .page-link").html($(prevBtnPage));
    }
    HandleText ();

    $('.academic-send-reminder').on('click', function(e){
           e.preventDefault();
           $.post('/wp-admin/admin-ajax.php', {
                 action: 'muslimito_send_session_remind',
                 cid: $(this).attr('data-cid') ,
                 aid: $(this).attr('data-aid')
             }, function (response){
                 //console.log(response);
               // if(response.success){
               //   $.showInfo(response.data.message);
               // }else{
               //   $.showError(response.data.message);
               // }
             })
     });

//hr emplyee profile
    //    action btns icons
   // edit ***
   $('.wphr-hr-employees .edit a').html("<i class='bb-icon-l bb-icon-edit'></i>").attr("data-balloon-pos","down").attr("data-balloon","Edit");
    // terminate ***
    $('#wphr-employee-terminate').html("<i class='bb-icon-l bb-icon-trash'></i>").attr("data-balloon-pos","down").attr("data-balloon","Terminate");
    // print ***
    $('#wphr-employee-print').html("<i class='bb-icon-l bb-icon-print'></i>").attr("data-balloon-pos","down").attr("data-balloon","Print");
  // replace text
  $(".wp-hr-frontend h2.nav-tab-wrapper a:first-child").text($(".wp-hr-frontend h2.nav-tab-wrapper a:first-child").text().replace("General Info", "Info"));
  //leave tab
  let hr_employee_active_tab = $(".wp-hr-frontend h2.nav-tab-wrapper a.nav-tab-active").text();
  let h3_tittle =$(".wp-hr-frontend .wphr-hr-employees-wrap-inner h3");

  if(hr_employee_active_tab === "Leave"){
    h3_tittle.addClass("hr_tab_style")
  }else{
    h3_tittle.removeClass("hr_tab_style");
  }

    $("#rjctRprtSchadual").on('click', function () {
        $(".schedual_session_feedback").toggleClass("hide_schedual_feedback");
    })



// append nav hr dashboard
// $(".badge-footer").append("<a href='#'>Add job</a>");
// $(".badge-footer").append("<a href='#'>Monthly time sheet</a>");
// Add icons to hr dash<a href='#'>

        $(".badge-green").prepend("<i class='bb-icon-l bb-icon-user'></i>");
        $(".badge-red ").prepend("<i class='bb-icon-l bb-icon-chart-bar-h'></i>");
        $(".badge-aqua ").prepend("<i class='bb-icon-l bb-icon-pin'></i>");




         // upcoming class

        let ucommingClassModal = document.getElementById("count-down-upcomming-class");
        let myModal = new bootstrap.Modal(ucommingClassModal, {});
        let OngoigClasssModal = document.getElementById("ongoing-classes-class");
        let scndModal = new bootstrap.Modal(OngoigClasssModal, {});
        let todayClassesNavNum = document.querySelector(".today-class-number");



        // upcomming classses first time
        // check every 301 sec for today classes
       function HandleUpcommigClasses(){
           // loader before request
           $('#today-upcomming-class .modal-dialog').append('<div class="load-gif"><div id="loader"></div></div>');
           let wp_user_id_ajax = $('#wp_user_id_ajax').val();
            //  prloader here
            $.post(ajaxurl, {
                action : 'get_today_classes',
                wp_user_id_ajax: wp_user_id_ajax
            }, function (response) { // response callback function
                if(response){
                    if(response == "error"){
                        console.log("err");
                        return;
                    }

                    const myObj = JSON.parse(response);
                    const role = myObj["role"];
                    const classes = myObj["classes"];
                    const gettimeZone = myObj["timezone"];

                    // complated table
                    let sessionDetails =[];


                    // add classes number to navbar Today Classes
                    todayClassesNavNum.innerHTML = classes.length;
                    if(classes.length <= 0){
                        $('.today-classes-list-table').html('<h5>NO Classes Today</h5>');
                        $('.header-upcomming-classes-modals .complated-classes h5,.complated-classes,.header-upcomming-classes-modals .upcoming-title').html('');
                        $('.today-complated-class #loader').remove();
                        return;
                    }
                    if(role=='teacher'){
                        document.querySelector(".header-upcomming-classes-modals .upcoming-title").innerHTML=('Upcoming Classes <span>(Next 8 Hours)</span>')
                        document.querySelector(".header-upcomming-classes-modals .complated-classes h5").innerHTML=('Completed Classes <span>(Last 4 Hours)</span>')
                    }
                    // table dispalys data
                    let todayTable = "<table class='today-classes-table'>";
                    // let Modal_feedback = ""

              for( let i =0; i < classes.length; i ++){
                            let classNum = i + 1;
                            // Attendence
                            let actual_mins =[];
                            let total_minutes = [];
                            let late_mins = [];
                            let actual_percent = [];
                            let late_percent = [];
                                total_minutes[i] = classes[i].actual_mins + classes[i].late_mins;
                            if(classes[i].actual_mins > 0 && total_minutes[i] > 0){
                                actual_mins[i] = (classes[i].actual_mins * 100 )/total_minutes[i];
                                late_mins[i] = (classes[i].late_mins * 100 )/total_minutes[i];
                                actual_percent[i] = classes[i].actual_mins;

                                if(classes[i].late_mins <=0){
                                    late_percent[i] = '';
                                }else{
                                    late_percent[i] = classes[i].late_mins;
                                }

                            }else{
                                total_minutes[i] = 0;
                                actual_mins[i] = 0;
                                late_mins[i] = 0;
                                actual_percent[i] = '';
                                late_percent[i] = '';
                            }


                            // time variables
                                    // start time
                                    let classStarting = [];
                                    let classStartingHours = [];
                                    let classStartingMinutes = [];
                                    let classStartingSeconds = [];

                                    classStarting[i] = new Date(classes[i].start);

                                    classStartingHours[i] = classStarting[i].getHours();
                                    classStartingMinutes[i] = classStarting[i].getMinutes();
                                    classStartingSeconds[i] = classStarting[i].getSeconds();

                                    // end time
                                    let classEnding = [];
                                    let classEndingHours =[];
                                    let classEndingMinutes= [];
                                    let classEndingSeconds= [];
                                        classEnding[i] = new Date(classes[i].end);
                                        classEndingHours[i] = classEnding[i].getHours();
                                        classEndingMinutes[i] = classEnding[i].getMinutes();
                                        classEndingSeconds[i] = classEnding[i].getSeconds();
                                    //  fn add 0 to hours <= 9==>09 ..sec
                                    function addZero(i) {
                                        if (i < 10) {i = "0" + i}
                                        return i;
                                    }

                                    // class time
                                    let classTimeInfo = [];
                                    classTimeInfo[i] = addZero(classStartingHours[i])+ ":" + addZero(classStartingMinutes[i]) + "-" + addZero(classEndingHours[i]) + ":" + addZero(classEndingMinutes[i])
                                    // session details
                                    sessionDetails[i] = classTimeInfo[i]+' | ' +classes[i].teacher+ ' | '+classes[i].learner;







                                    // count down Time
                                    var x = setInterval(function() {



                                        // td time
                                        let count_down_time_td = document.querySelectorAll(".today-classes-list-table .count-down-time");
                                        let count_down_time_td_complated = document.querySelectorAll(".today-complated-class .count-down-time");
                                        let count_down_time_td_ongoing = document.querySelectorAll(".ongoing-classes-class-info .count-down-time");
                                        let count_down_time_td_upcoming = document.querySelectorAll(".upcoming-table-modal .count-down-time");
                                        // td Action
                                        let action_td = document.querySelectorAll(".today-classes-list-table .class-action-container p");
                                        let action_td_complated = document.querySelectorAll(".today-complated-class .class-action-container p");
                                        let action_td_ongoing = document.querySelectorAll(".ongoing-classes-class-info .class-action-container p");
                                        let action_td_upcoming = document.querySelectorAll(".upcoming-table-modal .class-action-container p");
                                        // now time
                                        // let TimeOfNow = new Date(now_datetime).getTime();

                                        // convert to time zone







                                        const str = new Date().toLocaleString('en-US', { timeZone: gettimeZone });
                                        let TimeOfNow = new Date(str).getTime();




                                        let startDistance = [];
                                        let endDistance = [];
                                        let startCountDown = [];
                                        let endCountDown = [];
                                        startCountDown[i] = classStarting[i].getTime();
                                        endCountDown[i] = classEnding[i].getTime();

                                        startDistance[i] = startCountDown[i] - TimeOfNow;
                                        endDistance[i] = endCountDown[i] - TimeOfNow;



                                        // start class count down variables
                                        let startCountDownDays = []
                                        let startCountDownHours = []
                                        let startCountDownMinutes = []
                                        let startCountDownSeconds = []

                                        startCountDownDays[i] = Math.floor(startDistance[i] / (1000 * 60 * 60 * 24));
                                        startCountDownHours[i] = Math.floor((startDistance[i] % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                        startCountDownMinutes[i]= Math.floor((startDistance[i] % (1000 * 60 * 60)) / (1000 * 60));
                                        startCountDownSeconds[i]= Math.floor((startDistance[i] % (1000 * 60)) / 1000);
                                        // end class count down variables
                                        let endCountDownDays = []
                                        let endCountDownHours = []
                                        let endCountDownMinutes = []
                                        let endCountDownSeconds = []

                                        endCountDownDays[i] = Math.floor(endDistance[i] / (1000 * 60 * 60 * 24));
                                        endCountDownHours[i] = Math.floor((endDistance[i] % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                        endCountDownMinutes[i] = Math.floor((endDistance[i] % (1000 * 60 * 60)) / (1000 * 60));
                                        endCountDownSeconds[i] = Math.floor((endDistance[i] % (1000 * 60)) / 1000);


                                        if(startDistance[i] > 0 && endDistance[i] > 0 && startCountDownHours > 0){
                                            // Today  classes
                                            count_down_time_td[i].innerHTML= "<p>"+addZero(startCountDownHours[i]) + ":" + addZero(startCountDownMinutes[i])+ ":"+ addZero(startCountDownSeconds[i])+"</p>";
                                            count_down_time_td_complated[i].innerHTML= "<p>"+addZero(startCountDownHours[i]) + ":" + addZero(startCountDownMinutes[i])+ ":"+ addZero(startCountDownSeconds[i])+"</p>";
                                            count_down_time_td_ongoing[i].innerHTML="<p>"+addZero(startCountDownHours[i]) + ":" + addZero(startCountDownMinutes[i])+ ":"+ addZero(startCountDownSeconds[i])+"</p>";
                                            count_down_time_td_upcoming[i].innerHTML= "<p>"+addZero(startCountDownHours[i]) + ":" + addZero(startCountDownMinutes[i])+ ":"+ addZero(startCountDownSeconds[i])+"</p>";
                                        //

                                            // filter complated results
                                             document.querySelectorAll(".today-complated-class .today-upcomming-class-item")[i].style.display="none";
                                            // filter ongoing results
                                            document.querySelectorAll(".ongoing-classes-class-info .today-upcomming-class-item")[i].style.display="none";
                                            document.querySelectorAll(".upcoming-table-modal .today-upcomming-class-item")[i].style.display="none";

                                            // classAction[i] = "<a class='class-action' href='" + classes[i].zoom_join +"'>"+ "Join Class"+ "</a>";

                                            action_td[i].innerHTML="<a target='_blank' class='class-action' role='link' aria-disabled='true'>"+ "Join Class"+ "</a>";
                                            action_td_complated[i].innerHTML="<a target='_blank' class='class-action' role='link' aria-disabled='true'>"+ "Join Class"+ "</a>";
                                            action_td_ongoing[i].innerHTML="<a target='_blank' class='class-action' role='link' aria-disabled='true'>"+ "Join Class"+ "</a>";
                                            action_td_upcoming[i].innerHTML="<a target='_blank' class='class-action' role='link' aria-disabled='true'>"+ "Join Class"+ "</a>";



                                        }else if(startDistance[i] < 0 && endDistance[i] > 0 ){
                                            // ongoing classes
                                            count_down_time_td[i].innerHTML= "<p>Ongoing class</p>";
                                            count_down_time_td_complated[i].innerHTML= "<p>Ongoing class</p>";
                                            count_down_time_td_ongoing[i].innerHTML= "<p>Ongoing class</p>";
                                            count_down_time_td_upcoming[i].innerHTML= "<p>Ongoing class</p>";



                                            document.querySelectorAll(".today-complated-class .today-upcomming-class-item")[i].style.display="none";
                                            document.querySelectorAll(".upcoming-table-modal .today-upcomming-class-item")[i].style.display="none";




                                            action_td[i].innerHTML="<a target='_blank' class='class-action' href='" + classes[i].zoom_join +"'>"+ "Join Class"+ "</a>";
                                            action_td_complated[i].innerHTML="<a target='_blank' class='class-action' href='" + classes[i].zoom_join +"'>"+ "Join Class"+ "</a>";
                                            action_td_ongoing[i].innerHTML="<a target='_blank' class='class-action' href='" + classes[i].zoom_join +"'>"+ "Join Class"+ "</a>";
                                            action_td_upcoming[i].innerHTML="<a  target='_blank' class='class-action' href='" + classes[i].zoom_join +"'>"+ "Join Class"+ "</a>";


                                        }else if(startDistance[i] < 0 && endDistance[i] < 0){
                                            // complated classes

                                            count_down_time_td[i].innerHTML= "<div class='complated-count-down'><div class='completed-status'> " + classes[i].status+ "</div>" +
                                                                                "<div class='progress'>" +
                                                                                "<div data-bs-toggle='tooltip' data-placement='bottom' title='Actual Mins' class='progress-bar actual_progress' role='progressbar' style='width: " + actual_mins[i] + "%'"+ " aria-valuenow='" + classes[i].actual_mins + "aria-valuemin='0' aria-valuemax='" +total_minutes[i] +"'>"
                                                                                + actual_percent[i] +
                                                                                "</div>"+
                                                                                "<div data-bs-toggle='tooltip' data-placement='bottom' title='Late Mins' class='progress-bar late_progress' role='progressbar' style='width: " + late_mins[i] + "%'"+ " aria-valuenow='" + classes[i].actual_mins + "aria-valuemin='0' aria-valuemax='" +total_minutes[i] +"'>"
                                                                                + late_percent[i] +
                                                                                "</div></div></div>";

                                            count_down_time_td_complated[i].innerHTML= "<div class='complated-count-down'><div class='completed-status'> " + classes[i].status+ "</div>" +
                                                                                            "<div class='progress'>" +
                                                                                            "<div data-bs-toggle='tooltip' data-placement='bottom' title='Actual Mins' class='progress-bar actual_progress' role='progressbar' style='width: " + actual_mins[i] + "%'"+ " aria-valuenow='" + classes[i].actual_mins + "aria-valuemin='0' aria-valuemax='" +total_minutes[i] +"'>"
                                                                                             + actual_percent[i] +
                                                                                              "</div>"+
                                                                                              "<div data-bs-toggle='tooltip' data-placement='bottom' title='Late Mins' class='progress-bar late_progress' role='progressbar' style='width: " + late_mins[i] + "%'"+ " aria-valuenow='" + classes[i].actual_mins + "aria-valuemin='0' aria-valuemax='" +total_minutes[i] +"'>"
                                                                                               + late_percent[i] +
                                                                                                "</div></div></div>";
                                            count_down_time_td_ongoing[i].innerHTML= "<div class='complated-count-down'><div class='completed-status'> " + classes[i].status+ "</div>" +
                                                                                                "<div class='progress'>" +
                                                                                                "<div data-bs-toggle='tooltip' data-placement='bottom' title='Actual Mins' class='progress-bar actual_progress' role='progressbar' style='width: " + actual_mins[i] + "%'"+ " aria-valuenow='" + classes[i].actual_mins + "aria-valuemin='0' aria-valuemax='" +total_minutes[i] +"'>"
                                                                                                + actual_percent[i] +
                                                                                                "</div>"+
                                                                                                "<div data-bs-toggle='tooltip' data-placement='bottom' title='Late Mins' class='progress-bar late_progress' role='progressbar' style='width: " + late_mins[i] + "%'"+ " aria-valuenow='" + classes[i].actual_mins + "aria-valuemin='0' aria-valuemax='" +total_minutes[i] +"'>"
                                                                                                + late_percent[i] +
                                                                                                    "</div></div></div>";
                                            count_down_time_td_upcoming[i].innerHTML= "<div class='complated-count-down'><div class='completed-status'> " + classes[i].status+ "</div>" +
                                                                                                    "<div class='progress'>" +
                                                                                                    "<div data-bs-toggle='tooltip' data-placement='bottom' title='Actual Mins' class='progress-bar actual_progress' role='progressbar' style='width: " + actual_mins[i] + "%'"+ " aria-valuenow='" + classes[i].actual_mins + "aria-valuemin='0' aria-valuemax='" +total_minutes[i] +"'>"
                                                                                                    + actual_percent[i] +
                                                                                                    "</div>"+
                                                                                                    "<div data-bs-toggle='tooltip' data-placement='bottom' title='Late Mins' class='progress-bar late_progress' role='progressbar' style='width: " + late_mins[i] + "%'"+ " aria-valuenow='" + classes[i].actual_mins + "aria-valuemin='0' aria-valuemax='" +total_minutes[i] +"'>"
                                                                                                    + late_percent[i] +
                                                                                                        "</div></div></div>";

                                            // filter
                                            document.querySelectorAll(".today-classes-list-table .today-upcomming-class-item")[i].style.display="none";
                                            document.querySelectorAll(".upcoming-table-modal .today-upcomming-class-item")[i].style.display="none";
                                            document.querySelectorAll(".ongoing-classes-class-info .today-upcomming-class-item")[i].style.display="none";




                                            if(role === 'student'){

                                                action_td[i].innerHTML="<a href='#' type='button' class='class-action' data-bs-toggle='modal' data-bs-target='#pp_record2'> "+ "practice"+ "</a>";
                                                action_td_complated[i].innerHTML="<a href='#' type='button' class='class-action' data-bs-toggle='modal' data-bs-target='#pp_record2'> "+ "practice"+ "</a>";
                                                action_td_ongoing[i].innerHTML="<a href='#' type='button' class='class-action' data-bs-toggle='modal' data-bs-target='#pp_record2'> "+ "practice"+ "</a>";
                                                action_td_upcoming[i].innerHTML="<a href='#' type='button' class='class-action' data-bs-toggle='modal' data-bs-target='#pp_record2'> "+ "practice"+ "</a>";

                                            }else if(role === 'teacher'){
                                                $(".record_Attendence").css("display","block");

                                                action_td[i].innerHTML="<a onclick='newwin(this.title , this.name, this.id)' data-toggle='tooltip' data-placement='bottom' title='"+classes[i].name+"'  id='"+classes[i].ca_id+"' class='class-action feedback-btn' href='#' name='"+sessionDetails[i]+"' data-bs-toggle='modal' data-bs-target='#feedback-modal-class'>"+ "<i class='bb-icon-exclamation-triangle bb-icon-l'></i>Report Issue"+ "</a>"
                                                action_td_complated[i].innerHTML="<a onclick='newwin(this.title , this.name, this.id)' data-toggle='tooltip' data-placement='bottom' title='"+classes[i].name+"'  id='"+classes[i].ca_id+"' class='class-action feedback-btn' href='#' name='"+sessionDetails[i]+"' data-bs-toggle='modal' data-bs-target='#feedback-modal-class'>"+ "<i class='bb-icon-exclamation-triangle bb-icon-l'></i>Report Issue"+ "</a>"
                                                action_td_ongoing[i].innerHTML="<a onclick='newwin(this.title , this.name, this.id)' data-toggle='tooltip' data-placement='bottom' title='"+classes[i].name+"'  id='"+classes[i].ca_id+"' class='class-action feedback-btn' href='#' name='"+sessionDetails[i]+"' data-bs-toggle='modal' data-bs-target='#feedback-modal-class'>"+ "<i class='bb-icon-exclamation-triangle bb-icon-l'></i>Report Issue"+ "</a>"
                                                action_td_upcoming[i].innerHTML="<a onclick='newwin(this.title , this.name, this.id)' data-toggle='tooltip' data-placement='bottom' title='"+classes[i].name+"'  id='"+classes[i].ca_id+"' class='class-action feedback-btn' href='#' name='"+sessionDetails[i]+"' data-bs-toggle='modal' data-bs-target='#feedback-modal-class'>"+ "<i class='bb-icon-exclamation-triangle bb-icon-l'></i>Report Issue"+ "</a>"


                                            }else { // parent
                                                //console.log(document.querySelectorAll(".feedback-btn")[i].classList)
                                                action_td[i].innerHTML="<a onclick='newwin(this.title , this.name, this.id)' data-toggle='tooltip' data-placement='bottom' title='"+classes[i].name+"'  id='"+classes[i].ca_id+"' class='class-action feedback-btn' href='#' name='"+sessionDetails[i]+"' data-bs-toggle='modal' data-bs-target='#feedback-modal-class'>"+ "<i class='bb-icon-exclamation-triangle bb-icon-l'></i>Report Issue"+ "</a>"
                                                action_td_complated[i].innerHTML="<a onclick='newwin(this.title , this.name, this.id)' data-toggle='tooltip' data-placement='bottom' title='"+classes[i].name+"'  id='"+classes[i].ca_id+"' class='class-action feedback-btn' href='#' name='"+sessionDetails[i]+"' data-bs-toggle='modal' data-bs-target='#feedback-modal-class'>"+ "<i class='bb-icon-exclamation-triangle bb-icon-l'></i>Report Issue"+ "</a>"
                                                action_td_ongoing[i].innerHTML="<a onclick='newwin(this.title , this.name, this.id)' data-toggle='tooltip' data-placement='bottom' title='"+classes[i].name+"'  id='"+classes[i].ca_id+"' class='class-action feedback-btn' href='#' name='"+sessionDetails[i]+"' data-bs-toggle='modal' data-bs-target='#feedback-modal-class'>"+ "<i class='bb-icon-exclamation-triangle bb-icon-l'></i>Report Issue"+ "</a>"
                                                action_td_upcoming[i].innerHTML="<a onclick='newwin(this.title , this.name, this.id)' data-toggle='tooltip' data-placement='bottom' title='"+classes[i].name+"'  id='"+classes[i].ca_id+"' class='class-action feedback-btn' href='#' name='"+sessionDetails[i]+"' data-bs-toggle='modal' data-bs-target='#feedback-modal-class'>"+ "<i class='bb-icon-exclamation-triangle bb-icon-l'></i>Report Issue"+ "</a>"

                                            }
                                        }else if(startDistance[i] > 0 && startCountDownDays[i] == 0 && startCountDownHours[i] ==0 && endDistance[i] > 0 && startCountDownMinutes[i] < 5){
                                            //  less 5 minutes

                                            // upcoming classes
                                            count_down_time_td[i].innerHTML= "<p>"+addZero(startCountDownHours[i] )+ ":" + addZero(startCountDownMinutes[i])+ ":"+ addZero(startCountDownSeconds[i])+"</p>";
                                            count_down_time_td_complated[i].innerHTML= "<p>"+addZero(startCountDownHours[i] )+ ":" + addZero(startCountDownMinutes[i])+ ":"+ addZero(startCountDownSeconds[i])+"</p>";
                                            count_down_time_td_ongoing[i].innerHTML= "<p>"+addZero(startCountDownHours[i] )+ ":" + addZero(startCountDownMinutes[i])+ ":"+ addZero(startCountDownSeconds[i])+"</p>";
                                            count_down_time_td_upcoming[i].innerHTML= "<p>"+addZero(startCountDownHours[i] )+ ":" + addZero(startCountDownMinutes[i])+ ":"+ addZero(startCountDownSeconds[i])+"</p>";



                                            // filter complated results
                                            document.querySelectorAll(".today-complated-class .today-upcomming-class-item")[i].style.display="none";
                                            // filter ongoing results
                                            document.querySelectorAll(".ongoing-classes-class-info .today-upcomming-class-item")[i].style.display="none";

                                            action_td[i].innerHTML="<a target='_blank' class='class-action' href='" + classes[i].zoom_join +"'>"+ "Join Class"+ "</a>";
                                            action_td_complated[i].innerHTML="<a target='_blank' class='class-action' href='" + classes[i].zoom_join +"'>"+ "Join Class"+ "</a>";
                                            action_td_ongoing[i].innerHTML="<a target='_blank' class='class-action' href='" + classes[i].zoom_join +"'>"+ "Join Class"+ "</a>";
                                            action_td_upcoming[i].innerHTML="<a target='_blank' class='class-action' href='" + classes[i].zoom_join +"'>"+ "Join Class"+ "</a>";


                                            // upcomig classes

                                        }else{
                                             // Today  classes
                                             count_down_time_td[i].innerHTML= "<p>"+addZero(startCountDownHours[i]) + ":" + addZero(startCountDownMinutes[i])+ ":"+ addZero(startCountDownSeconds[i])+"</p>";
                                             count_down_time_td_complated[i].innerHTML= "<p>"+addZero(startCountDownHours[i]) + ":" + addZero(startCountDownMinutes[i])+ ":"+ addZero(startCountDownSeconds[i])+"</p>";
                                             count_down_time_td_ongoing[i].innerHTML="<p>"+addZero(startCountDownHours[i]) + ":" + addZero(startCountDownMinutes[i])+ ":"+ addZero(startCountDownSeconds[i])+"</p>";
                                             count_down_time_td_upcoming[i].innerHTML= "<p>"+addZero(startCountDownHours[i]) + ":" + addZero(startCountDownMinutes[i])+ ":"+ addZero(startCountDownSeconds[i])+"</p>";

                                             action_td[i].innerHTML="<a target='_blank' class='class-action' role='link' aria-disabled='true'>"+ "Join Class"+ "</a>";
                                             action_td_complated[i].innerHTML="<a target='_blank' class='class-action' role='link' aria-disabled='true'>"+ "Join Class"+ "</a>";
                                             action_td_ongoing[i].innerHTML="<a target='_blank' class='class-action' role='link' aria-disabled='true'>"+ "Join Class"+ "</a>";
                                             action_td_upcoming[i].innerHTML="<a target='_blank' class='class-action' role='link' aria-disabled='true'>"+ "Join Class"+ "</a>";

                                             // filter complated results
                                              document.querySelectorAll(".today-complated-class .today-upcomming-class-item")[i].style.display="none";
                                             // filter ongoing results
                                             document.querySelectorAll(".ongoing-classes-class-info .today-upcomming-class-item")[i].style.display="none";
                                             document.querySelectorAll(".upcoming-table-modal .today-upcomming-class-item")[i].style.display="none";


                                            }



                                        function HandleUpcominBtn(){
                                            while(startCountDownHours[i] == 0 && startCountDownDays[i] == 0 && startCountDownMinutes[i] < 5 && startDistance[i]>0){
                                                document.getElementById("upcoming_class_btn").style.display="flex";
                                                let countDown = []
                                                countDown[i] = "Upcomming Class After " + addZero(startCountDownMinutes[i])  + ":" + addZero(startCountDownSeconds[i]);
                                                document.querySelector("#upcoming_class_btn .header-count-down-timer").innerHTML= countDown[i];


                                                if(ModalShow == true && localStorage.getItem('UpcomingPopUpOpn') == null){

                                                    myModal.show();


                                                }else if(ModalShow == true && localStorage.getItem('UpcomingPopUpOpn') == "true"){

                                                      myModal.hide();
                                                }else{
                                                    myModal.hide();
                                                }

                                                if(startCountDownMinutes[i] < 1 && startCountDownSeconds[i] <=1){
                                                    document.getElementById("upcoming_class_btn").style.display="none";
                                                    ModalShow = false;
                                                }
                                                break;
                                            }

                                        }
                                        HandleUpcominBtn();


                                        function Handleengoingclass(){
                                            while(endDistance[i] > 0 && startDistance[i]<0){
                                                document.getElementById("ongoing_class_btn").style.display="flex";
                                                document.querySelector("#ongoing_class_btn .header-engoing-class").innerHTML= 'Ongoing Class';

                                                if(endCountDownMinutes[i] < 1 && endCountDownSeconds[i] <= 1){
                                                    document.getElementById("ongoing_class_btn").style.display="none";
                                                    scndModal.hide();
                                                }

                                                break;
                                            }

                                        }
                                        Handleengoingclass();

                                    },1000)








                            // Render table=================>
                            todayTable+="<tr class='today-upcomming-class-item'>";
                            // class info
                            todayTable+=
                            "<td> <div class='today-details-container'> "
                            + "<span class='coming-class-number'>"+classNum+"</span>"+
                            "<div class='today-class-detail'>" +
                                                           "<p class='today-class-adress'>" + classes[i].name + "</p>"

                                                           +"<p class='today-class-time'>" +

                                                               "<span  title='Class Time'><i class='bb-icon-alarm bb-icon-l'></i>" +classTimeInfo[i]+"</span>" +
                                                               "<span> | </span>" +
                                                              " <span  title='Teacher'><i class='bb-icon-user bb-icon-l'></i>" + classes[i].teacher+"</span>" +
                                                               "<span> | </span>" +
                                                               "<span title='Learner'><i class='bb-icon-users bb-icon-l'></i>" + classes[i].learner+ "</span> </p> </div>"
                            "</div></td>";
                            // class countdown
                            todayTable+="<td class='count-down-time today-class-start'></td>";
                            // class join meeting
                            todayTable+="<td class='class-action-container today-class-link'> <p></p></td></tr>";






                        }// end of for loop

                        todayTable+="</table>";

                    // today classes table
                    document.querySelector(".today-classes-list-table").innerHTML=todayTable;
                    // complated classes table
                    document.querySelector(".today-complated-class").innerHTML=todayTable;
                    // onging class table
                    document.querySelector(".ongoing-classes-class-info").innerHTML=todayTable;
                    // upcoming class
                    document.querySelector(".upcoming-table-modal").innerHTML=todayTable;



                }
                else if(!response){
                    console.log("err");
                }

            }).done(function() {
                $('.load-gif').remove();
            });
      }; // recursive every x mSec
      //  run only first time
       HandleUpcommigClasses();
       document.querySelector(".header-upcomming-classes").addEventListener("click",HandleUpcommigClasses);
        // check every 301 sec for today classes
        setInterval(function() {
            HandleUpcommigClasses();
        }, 300000); // recursive every x mSec



        $("#count-down-upcomming-class").on('shown.bs.modal', function () {
                HandleUpcommigClasses();
                return;
           });
        // end of upcomming

        $(document).on('click','.create_emp',function(e){
          e.preventDefault();
          $('.create_emp i').show();
          $.post('/wp-admin/admin-ajax.php', {
                  action:"wphr-hr-employee-new",
                  user_id:0,
                 'work[type]':'contract',
                 'work[department]':8,
                 'work[status]':'active',
                 'work[hiring_date]':$('.hr_date').val(),
                 'additional[niqab]':$('.niqab_sel').find('input:checked').val(),
                 'personal[gender]':$('.gender_sel').val(),
                 'personal[first_name]':$('.f_name').val(),
                 'personal[last_name]':$('.l_name').val(),
                  user_email:$('.u_email').val(),
                 _wpnonce:$('input[name="_wpnonce"]').val(),
                 }, function (response){
                  //console.log(response.data.id);
                        $.post('/wp-admin/admin-ajax.php', {
                          action:"update_teacher_hr_data",
                          user_id:response.data.id,
                         }, function (res){
                           $('.create_emp i').hide();
                           $.showInfo('New Teacher Added Successfully.');
                         })

                 })
         });


        $(document).on('click','.mdp-stop-rec-btn',function(e){
            e.preventDefault();
            $(".student .mdp-send-rec-btn" ).replaceWith( '<button class="rreee"><span data-balloon-pos="down" data-balloon="Send"><i class="bb-icon-paper-plane bb-icon-l"></i></span></button>');
            $(".mdp-send-rec-btn" ).replaceWith( '<button class="rreee">Send</button>');
             const incrementTimer = setInterval(function () {$(".mdp-send-rec-btn" ).replaceWith( '<button class="rreee"><span>Send</span</button>');}, 400);
             setTimeout(function() {
             clearInterval(incrementTimer)}, 1000)
          });

            $(document).on('click','.academic-practice',function(e){
              const cid = $(this).attr('data-cid');
              if($('.app_cid').val()){
                $('.app_cid').val(cid);
              }else{
                $('body').append('<input type="hidden" class="app_cid" value="'+cid+'" />');
              }
              $('#pp_record2').modal('show');
              $(".mdp-contacter-start-btn-icon").html('<i class="bb-icon-microphone bb-icon-l"></i>');
              $(".mdp-contacter-start-btn-caption").html("Tap To Record");
              $(".teacher .mdp-contacter-before-txt").html("<h4>Send Voice Note!</h4>");
              $(".student .mdp-contacter-before-txt").html("<div class=''></div><h4>Let's Practice</h4>");
              $(".student .mdp-contacter-thanks-box").append('<div class="confetti-piece"></div><div class="confetti-piece"></div><div class="confetti-piece"></div><div class="confetti-piece"></div><div class="confetti-piece"></div><div class="confetti-piece"></div><div class="confetti-piece"></div><div class="confetti-piece"></div><div class="confetti-piece"></div><div class="confetti-piece"></div><div class="confetti-piece"></div>')


              //reset
$(".student .mdp-reset-rec-yes ,.student .mdp-reset-rec-btn").attr("data-balloon-pos","down");
$(".student .mdp-reset-rec-yes ,.student .mdp-reset-rec-btn").attr("data-balloon","Reset");
$(".student .mdp-reset-rec-yes ,.student .mdp-reset-rec-btn").html('<i class="bb-icon-redo bb-icon-l"></i>');
//stop
$(".student .mdp-stop-rec-btn").attr("data-balloon-pos","down");
$(".student .mdp-stop-rec-btn").attr("data-balloon","Stop");
$(".student .mdp-stop-rec-btn").html('<i class="bb-icon-stop bb-icon-f"></i>');
//pause
$(".student .mdp-reset-rec-btn").attr("data-balloon-pos","down");
$(".student .mdp-reset-rec-btn").attr("data-balloon","Reset");
$(".student .mdp-reset-rec-btn").html('<i class="bb-icon-redo bb-icon-l"></i>');

//resume
$(".student .mdp-reset-rec-no").attr("data-balloon-pos","down");
$(".student .mdp-reset-rec-no").attr("data-balloon","Resume");
$(".student .mdp-reset-rec-no").html('<i class="bb-icon-repeat bb-icon-l"></i>');



});

$('.student .academic-practice').html('<span class="material-icons">interests</span><span > practice </span>')
$(".student #pp_record2.modal").append('<div class="waves_modal"><div class="wave_zero cloud big front slowest"></div><div class="wave_one cloud distant smaller"></div><div class="wave_two cloud small slow"></div><div class="wave_three cloud distant super-slow massive"></div><div class="wave_four cloud slower"></div></div>');

        $(document).on('click','.rreee',function(e){

        e.preventDefault();
        $('body').append('<div class="ajax_image_section"><div class="ajaxloader"></div></div>');
          var blobUrl =  $(".mdp-contacter-player-box audio").attr("src") ;
          const cid = $('.app_cid').val();
          fetch(blobUrl).then(response => response.blob())
          .then(blob => {
            const fd = new FormData();
            fd.append("aud_file", blob, "practice.wav");
            fd.append("cid", cid); // where `.ext` matches file `MIME` type
            return fetch("/wp-admin/admin-ajax.php?action=add_new_assignment_wp", {method:"POST", body:fd})
          })
          .then(res => res.json() )
          .then(res =>  {if(res){
            console.log(res);
            $('.ajax_image_section').hide();
            $.showInfo('New Practice Uploaded Successfully.');
            $('.mdp-contacter-thanks-box').css('display','flex');
          }
        }).catch(err => {$.showError(err);$('.ajax_image_section').hide();});

         });


     $(document).on('click','.mdp-contacter-thanks-box',function(e){
      $('.mdp-contacter-thanks-box').css('display','none');
          $('.mdp-reset-rec-yes').trigger('click');
      });


         $(document).on('click','.rec_aws_file',function(e){
           e.preventDefault();
           const file = $(this).attr('href');


$(this).closest('.video_d_w').append('<p class="bb-video-wrapper"><div class="fluid-width-video-wrapper" style="padding-top: 56.25%;"><iframe class="" title="كيف تصبح ذكياً ؟ - مكسرات" data-lazy-type="iframe" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" src="https://lsm-portal-dev.s3.us-east-2.amazonaws.com/msl_mp4_631f9fdf360a1.mp4" name="fitvid0"></iframe></div></p>');
$(this).hide();
});
           // $(this).closest('.video_d_w').append('<p class="bb-video-wrapper"><div class="fluid-width-video-wrapper"><object width="425" height="344" type="application/x-shockwave-flash" data="'+file+'"><param name="movie" value="'+file+'"></object></div></p>');
           // $(this).hide();
           // });

         $(document).on('click','.c_t_audio',function(e){
           e.preventDefault();
           const aud_file = $(this).attr('href');
           $(this).closest('.aud_d_w').append('<audio controls><source src="'+aud_file+'" type="audio/wav"></audio>');
           $(this).hide();
           });

    // send feedback data to save on session
    $('body').delegate('.submit-modal-feedback', 'click', function (e){
        e.preventDefault();
        var feedback_selected = [];
        $.each($(".feedback-select input:checked"), function(){
            feedback_selected.push($(this).val());
        });

        let feedback_notes = $('#floatingTextarea2').val();
        let ca_id = $('.feedback_ca_id').val();


        let capture_feedback_url = {
            action : 'capture_session_feedback',
            feedback_selected: feedback_selected,
            feedback_notes: feedback_notes,
            ca_id: ca_id
        };
        $.post(ajaxurl, capture_feedback_url, function (response) { // response callback function
            if( response == 'success' ){
                $.showInfo('Feedback Send Successfully');
                location.reload()
            } else {
                $.showError(response);
            }
        })

    });


  jQuery( document ).ready(function() {
  jQuery("video").each(function(){
    jQuery(this).attr('controlsList','nodownload');
    jQuery(this).load();
  });
});
jQuery(".badge-footer.wp-ui-highlight").append("<a href='#' class='add_new_employee' data-bs-toggle='modal' data-bs-target='#hr_teacher_form'  data-balloon-pos='down' data-balloon='Add Teacher'><i class='bb-icon-user-plus bb-icon-l'></i></a>");
jQuery(".badge-footer.wp-ui-highlight a:first").html("<span  data-balloon-pos='down' data-balloon='View Employees'><i class='bb-icon-eye bb-icon-l'></i></span>");
jQuery("#hr_teacher_form .modal-title").html('<i class="bb-icon-user-plus bb-icon-l"></i> Add Teacher')
$('.gender_sel').on("change",function(){
  if($('.gender_sel').val()=="female"){
    $(".niqab_sel").css("display","flex");
  }else{
    $(".niqab_sel").css("display","none");
  }
})
}); ////////////////////////////////////////////////////////////////////////// end of document ready //////////////////////////////////////////////////////////////////


Date.prototype.addDays = function (days) {
    const date = new Date(this.valueOf());
    date.setDate(date.getDate() + days);
    return date;
};

function formatDateYmd(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;

    return [year, month, day].join('-');
}

function formatDateMd(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;

    // Getting short month name (e.g. "Oct")
    var Month = d.toLocaleString('default', { month: 'short' });

    return [Month, day].join(' ');
}

function newwin(sessionname, teach, ca_id){
    document.querySelector("#feedback-modal-class .feedback-select").innerHTML='<div class="load-gif"><div id="loader"></div></div>';

    $('.feedback_ca_id').val(ca_id);

    $.post(ajaxurl, {
        action : 'get_session_feedback_options',
    }, function (response) { // response callback function
        if(response) {

            if (response == "error") {
                console.log("err");
                return;
            }
            let feedbackCheckBox = JSON.parse(response)
            console.log(feedbackCheckBox)

            // let feedbackOptions = feedbackOptifeedbackCheckBox["options"];
            let options = [];
            document.querySelector(".SessionName").innerHTML=sessionname;
            document.querySelector(".SessionTeacher").innerHTML=teach;

            for(let opt = 0; opt < feedbackCheckBox.length;opt++){
              options+='<div class="form-check mx-0 col-md-6">';
              options+='<input  type="checkbox" value="'+feedbackCheckBox[opt].value+'">';
              options+='<label >';
              options+= feedbackCheckBox[opt].textOption;
              options+='</label></div>'
             }

             document.querySelector(".feedback-select").innerHTML=options;
        }

    }).done(function() {

    });





}


jQuery( "body" ).delegate( "#my-profile-pic", "click", function() {
jQuery("#model_img").modal('show');
});
    document.querySelector(".upcomming-class-modal-content .btn-close").addEventListener("click", function () {
        ModalShow = false

    })


    document.getElementById("upcoming_class_btn").addEventListener("click", function () {
        ModalShow = true;

    })
