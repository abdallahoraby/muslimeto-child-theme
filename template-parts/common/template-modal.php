<style>
div#schedule-makeup-session .modal-header{
        padding: 1rem!important;
        background-color: var(--blue);
    }
    #cancel-session .modal-header{
        background-color: #d64d4e!important;
        padding: 1rem!important;
    }
    div#cancel-session .modal-body,#cancel-session .modal-body{
        min-height: 30vh!important;
    }
    div#schedule-makeup-session .modal-header h5,#cancel-session  .modal-header h5{
        color: #fff!important;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1rem;
    }
    div#schedule-makeup-session .modal-header i,#cancel-session .modal-header i{
        color: #fff!important;
        font-size: 1.5rem!important;
        margin-right: 5px!important;
    }
    div#schedule-makeup-session .approve-session-schedule, #cancel-session .approve-cancel-session{
        font-size: .7rem!important;
        font-weight: 600!important;
        color: #fff;
        display: inline-flex!important;
        justify-content: center!important;
        align-items: center!important;
        padding: 5px 10px!important;
        background-color: var(--blue);
        border-radius: 5px;
        border:0!important;
        height: 30px;
    }
    div#schedule-makeup-session .reject-session-schedule,#cancel-session .reject-cancel-session{
        font-size: .7rem!important;
        font-weight: 600!important;
        color: var(--main-color);
        display: inline-flex!important;
        justify-content: center!important;
        align-items: center!important;
        padding: 5px 10px!important;
        background-color: #eee;
        border-radius: 5px;
        transition: 200ms linear;
        height: 30px;
    }
    div#schedule-makeup-session .clickedRed,#cancel-session .clickedRed{
        color: #fff;
        background-color: #ff5b5c;
    }
    div#schedule-makeup-session .clickedRed:hover,#cancel-session .clickedRed:hover{
        color: #fff!important;
    }
    div#schedule-makeup-session .btn-close,#cancel-session .btn-close{
        border-radius: 50%!important;
        position: absolute;
        right: -15px;
        top: -15px;
    }
    div#schedule-makeup-session .btn-close::after,#cancel-session .btn-close::after{
        color:black!important;
    }
    div#schedule-makeup-session .btn-close::before,#cancel-session .btn-close::before{
        color:green!important;
    }
    div#schedule-makeup-session .footer,#cancel-session .footer{
        flex-wrap: wrap;
    }
    #cancel-session .footer{
        padding: 0!important;
    }
    .cancel-message {
        width: 100%!important;
        color: var(--main-color);
        font-size: .8rem;
        padding: 10px;
        margin: 15px 0!important;
        text-align: center;
        background: #ffc69799;
        line-height: 20px;
   }
   .cancel-message.info {
    width: auto!important;
    color: var(--main-color);
    font-size: .8rem;
    padding: 10px;
    margin: 15px 1rem!important;
    text-align: center;
    background: #70c0e54d;
    line-height: 20px;
}
   div#schedule-makeup-session .class-details .header p{
    font-size: .6rem;
    font-weight: normal;
   }
   #cancel-session .class-details .header p{
    font-size: .8rem;
    font-weight: 600;
   }
   div#schedule-makeup-session .class-details .header p:first-child,#cancel-session .class-details .header p:first-child{
    font-size: .8rem;
    font-weight: 600;
   }
   #cancel-session .classes-select-section p,.child-select-section label,#cancel-session .child-select-section p,#cancel-session .teacher-name-section span{
       font-size: .6rem!important;
       font-weight: normal!important;
       line-height: 15px!important;
       color: var(--main-color)!important;
   }
   .classes-section{
    flex-wrap: wrap;
   }

</style>



<?php
    if ( !empty($args) && $args['id'] ):
        $modal_id = $args['id'];
    else:
        $modal_id = '';
    endif;

    // change modal title
    if ( !empty($args) && $args['title'] ):
        $modal_title = $args['title'];
    else:
        $modal_title = '';
    endif;

    // change modal body
    if ( !empty($args) && $args['body'] ):
        $modal_body = $args['body'];
    else:
        $modal_body = '';
    endif;
?>


    <div class="modal fade " id="<?= $modal_id ?>" tabindex="-1" aria-labelledby="today-upcomming-classLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="today-upcomming-classLabel"><i class="bb-icon-user-clock bb-icon-l"></i> <?= $modal_title ?> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-0">
                    <?= $modal_body ?>
                </div>
            </div>
        </div>
    </div>


    <script>


        jQuery(document).ready(function(){


                function HandleAvailability(){
                            let BtnsStatus = document.querySelectorAll(".duration_btn");
                            let availabilitystatus = document.querySelectorAll(".avialability-status");
                                for(let i =0 ; i< availabilitystatus.length; i++){
                                    if(BtnsStatus[i].disabled == false){
                                        availabilitystatus[i].innerHTML="Available";
                                        availabilitystatus[i].style.color="#333";
                                        // availabilitystatus[i].style.background="#dff9ec";
                                    }else{
                                        availabilitystatus[i].innerHTML="Not Available";
                                        availabilitystatus[i].style.color="#ff5b5c";
                                        // availabilitystatus[i].style.background="#ffe5e5";


                                    }
                                    setTimeout(function(){ availabilitystatus[i] . style.display = "none" }, 10000);
                                }
                        }


                        HandleAvailability();

        })

    </script>
