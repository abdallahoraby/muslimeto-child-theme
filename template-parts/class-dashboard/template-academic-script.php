<?php
    if ( !empty($args) && $args['bb_group_id'] ):
        $bb_group_id = (int) $args['bb_group_id'];
    else:
        $bb_group_id = bp_get_current_group_id();
    endif;


    if ( !empty($args) && $args['bb_group_type'] ):
        $bb_group_type = $args['bb_group_type'];
    else:
        $bb_group_type = getBBgroupType($bb_group_id);
    endif;


?>

<script>

    // Handleloader

    // let preloader = document.querySelector(".preloader");
    //   window.addEventListener('load', function(){
    //     preloader.style.display = 'none';
    // 	});



    // hide member word
    let members = document.querySelectorAll(".members");
    for(let i =0 ;i<members.length;i++){
        members[i].innerHTML= members[i].innerHTML.replace(/members/g ,' ');
        members[i].innerHTML= members[i].innerHTML.replace(/member/g ,' ');
    }
    // column & row view

    let getviewgrid = document.querySelector("[data-view='grid']");
    let getviewlist = document.querySelector("[data-view='list']");
    let getAcademicItems = document.querySelectorAll(".Academic-cards");
    getviewlist.addEventListener("click",function(){
        for(let i = 0; i< getAcademicItems.length;i++){
            getAcademicItems[i].classList.add("list-view")
        }
    });
    getviewgrid.addEventListener("click",function(){
        for(let i = 0; i< getAcademicItems.length;i++){
            getAcademicItems[i].classList.remove("list-view")
        }
    });

    // *************************************quick action menu
    let quickActionMenu = document.querySelectorAll(".academic-quick-view-manu");
    let quickActionbtn = document.querySelectorAll(".academic-quickaction-menu-btn");
    let quickActioncontainer = document.querySelectorAll(".Academic-item");

    for(let n =0 ; n<quickActionMenu.length;n++){
        // show quick menu
        quickActionbtn[n].addEventListener("mouseover",function(){
            quickActionMenu[n].style.display="flex";});
        // hide quick menu
        quickActioncontainer[n].addEventListener("mouseleave",function(){
            quickActionMenu[n].style.display="none";});


        quickActioncontainer[n].addEventListener("mousemove",function(e){

            const rect = quickActioncontainer[n].getBoundingClientRect();
            // item width&height
            const widthItem= quickActioncontainer[n].offsetWidth;
            const heightItem= quickActioncontainer[n].offsetHeight;
            // Mouse position
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            // dif
            const checkWidth = widthItem-x;
            const checkHeight = heightItem-y;

            if(checkWidth < 90 && checkHeight < 100){
                quickActionMenu[n].style.display="flex";
            }
        });
    }
    // switch time zone style

    // switch time zone
    jQuery('[name="timezone-switch"]').on('click', function(){

        let value = $(this).val();
        if( value === 'client' ){
            $('.show-schedules-cairo-timezone').hide().removeClass('active');
            $('.show-schedules-client-timezone').show().removeClass('hidden').addClass('active').css({'display':'flex'});
            $('[for="client-timezone"]').addClass('active-time-zone-client');
            $('[for="cairo-timezone"]').removeClass('active-time-zone-cairo');

        } else {
            $('.show-schedules-cairo-timezone').show().addClass('active').css({'display':'flex'});
            $('.show-schedules-client-timezone').hide().addClass('hidden').removeClass('active');
            $('[for="client-timezone"]').removeClass('active-time-zone-client');
            $('[for="cairo-timezone"]').addClass('active-time-zone-cairo');
        }


    });

    // .active-time-zone
    // send reminder
    let numOfMin = [];
    let time = numOfMin * 60;
    let sndReminderBtn = document.querySelectorAll(".academic-send-reminder");
    let sndReminderNote = document.querySelectorAll(".academic-send-reminder-count-down");

    function HandleSendReminder(){

        for(let i =0;i<sndReminderBtn.length;i++){
            numOfMin[i]=15;
            let time = numOfMin[i] * 60;
            // time
            function HandelTime(){
                let secnds= time%60;
                let mints= Math.floor(time / 60);
                // view secnds and mints
                secnds = secnds<10? "0"+secnds:secnds;
                mints = mints<10? "0"+mints:mints
                // send reminder note
                sndReminderNote[i].innerHTML= `<p data-balloon-pos="up" data-balloon="Next reminder after">Next reminder </p> ${mints} : ${secnds}`;
                // handle false && true disable btn send reminder
                if(time < 1 && sndReminderBtn[i].disabled==true){
                    sndReminderBtn[i].disabled=false;
                    sndReminderBtn[i].style.cursor='pointer';
                    sndReminderBtn[i].style.opacity='1';
                    time = numOfMin[i] * 60;
                }else if(sndReminderBtn[i].disabled==false){
                    sndReminderNote[i].innerHTML="";
                    time = numOfMin[i] * 60;
                }else{
                    time--;
                }

            }
            // eventlisntener
            sndReminderBtn[i].addEventListener("click",function(){

                setInterval(HandelTime,'1000');
                sndReminderBtn[i].disabled=true;
                sndReminderBtn[i].style.cursor='not-allowed';
                sndReminderBtn[i].style.opacity='.5';
            })
        }
    }
    HandleSendReminder();


    (function($){

        $.post(ajaxurl, {
            action: 'get_schedule_class_modal',
        }, function (response){ // response callback function
            $('body').append(response);
        })
            .done(function() {
            });

// group type
// <div class="Academic-item card Academic-status-success" data-group-id="<?php echo $bb_group_id; ?>" data-group-type="<?php echo $bb_group_type; ?>">
        function HandleGropIcon(){
            let academicItems = document.querySelectorAll(".Academic-item");
            let iconType = document.querySelectorAll(".class-type-icon");
            for(let i =0;i<academicItems.length;i++){

                academicItems[i].getAttribute('data-group-type');
                if(academicItems[i].getAttribute('data-group-type').match(/one-on-one/gi)||academicItems[i].getAttribute('data-group-type').match(/one-to-one/gi)){
                    iconType[i].innerHTML="<i class='bb-icon-user bb-icon-l'></i>"
                }else if(academicItems[i].getAttribute('data-group-type').match(/family-group/gi)){
                    iconType[i].innerHTML="<i class='bb-icon-users bb-icon-l' ></i>"
                }else if(academicItems[i].getAttribute('data-group-type').match(/mvs/gi)){
                    iconType[i].innerHTML="<i class='bb-icon-users bb-icon-l'></i>"
                }else if(academicItems[i].getAttribute('data-group-type').match(/open-group/gi)){
                    iconType[i].innerHTML="<i class='bb-icon-users bb-icon-l'></i>"
                }else{
                    iconType[i].innerHTML="<i class='bb-icon-users bb-icon-l'></i>"
                }
            }
        }
        HandleGropIcon();

    }(jQuery));


</script>