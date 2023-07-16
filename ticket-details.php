  <?php

 $ticket_id = $_GET['id'];
 $current_user = wp_get_current_user();


// $headers[] = 'From: '.$current_user->user_login.' <'.$current_user->user_email.'>';
// wp_mail( 'himamohamed1991@gmail.com', 'sub'. rand(1111121,4599999) ,  'reply_txt'  ,  $headers );

$email = $current_user->user_email;
$staff = array('support','administrator','enrollment');
$user_roles  = array('parent','teacher');
if ( array_intersect( $user_roles, (array)  $current_user->roles) ) {
$comts='threads';
}elseif ( array_intersect( $staff, (array)  $current_user->roles) ) {
$comts= 'conversations';//'conversations';
}
$auth_token = 'Bearer '.get_zoho_token_from_dev();
$ch = curl_init();
$headers=array(
        "Authorization: $auth_token",
        "contentType: application/json; charset=utf-8",
);
$url='https://desk.zoho.com/api/v1/tickets/'.$ticket_id.'/latestThread';
$url3='https://desk.zoho.com/api/v1/tickets/'.$ticket_id.'/threads';
$ch= curl_init($url);
curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
curl_setopt($ch,CURLOPT_HTTPGET,TRUE);
$data = json_decode(curl_exec($ch));
$url2="https://desk.zoho.com/api/v1/tickets/$ticket_id/threads/$data->id/originalContent";
curl_setopt($ch, CURLOPT_URL, $url2);
$result2 = json_decode(curl_exec($ch));
curl_setopt($ch, CURLOPT_URL, $url3);
$result3 = json_decode(curl_exec($ch));
curl_close($ch);
//  pre_dump($result2 );
$thraed_id=$data->id;


if(isset($_POST['close_ticket'])):
  $auth_token = 'Bearer '.get_zoho_token_from_dev();
   $headers=array(
          "Authorization: $auth_token",
          "contentType: application/json; charset=utf-8",
   );
   $url='https://desk.zoho.com/api/v1/tickets/'.$ticket_id;
   $payload = json_encode(array("status" => "Closed"));
   $ch= curl_init($url);
   curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
   curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $payload );
   $data = json_decode(curl_exec($ch));
   curl_close($ch);
endif;


  if(isset($_POST['reply_txt'])):
   $auth_token = 'Bearer '.get_zoho_token_from_dev();
   $headers=array(
           "Authorization: $auth_token",
           "contentType: application/json; charset=utf-8",
   );
   $url='https://desk.zoho.com/api/v1/tickets/'.$ticket_id;
   $ch= curl_init($url);
   curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
   curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
   curl_setopt($ch,CURLOPT_HTTPGET,TRUE);
   $data = json_decode(curl_exec($ch));
   curl_close($ch);
   $headers[] = 'From: '.$current_user->user_login.' <'.$current_user->user_email.'>';
   $subject = "Re:[## ".$data->ticketNumber." ##]  ".$data->subject;
   wp_mail( 'support@muslimeto.com', $subject , $_POST['reply_txt'] ,  $headers );
   //wp_mail( 'himamohamed1991@gmail.com', $subject , $_POST['reply_txt'], $headers );
   sleep(10);
   wp_redirect( home_url('ticket-details?id='.$ticket_id) );exit;
     endif;

$ch = curl_init();
 $headers=array(
         "Authorization: $auth_token",
         "contentType: application/json; charset=utf-8",
 );
 $url='https://desk.zoho.com/api/v1/tickets/'.$ticket_id.'/'.$comts;
 $ch= curl_init($url);
 curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
 curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
 curl_setopt($ch,CURLOPT_HTTPGET,TRUE);
 $data = json_decode(curl_exec($ch));
 $url2='https://desk.zoho.com/api/v1/tickets/'.$ticket_id;
 curl_setopt($ch, CURLOPT_URL, $url2);
 $result2 = json_decode(curl_exec($ch));

 if(isset($result2->attachmentCount) && ($result2->attachmentCount > 0)):
 $url3="https://desk.zoho.com/api/v1/tickets/$ticket_id/attachments";
 curl_setopt($ch, CURLOPT_URL, $url3);
 $attaches = json_decode(curl_exec($ch));
 endif;

 curl_close($ch);
 $history = $data->data;

 function get_thread_reply($thread_id,$ticket_id) {
   $auth_token = 'Bearer '.get_zoho_token_from_dev();
   $headers=array(
           "Authorization: $auth_token",
           "contentType: application/json; charset=utf-8",
   );
   $url="https://desk.zoho.com/api/v1/tickets/$ticket_id/threads/$thread_id";
   $ch= curl_init($url);
   curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
   curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
   $data2 = json_decode(curl_exec($ch));
   curl_close($ch);
   if(isset($data2->content))
   return $data2->content ;
   return false;
 }




 ?>
<!-- google icon -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
<!-- bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
 <!-- classic Editor -->
 <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<!-- style -->
<style>
    /* root */
     :root{
            /* colors */
            --fc-success: #49bb88;
            --fc-danger:#cf2e2e;
            --fc-warning:#fcb918;
            --main-color:#616971!important;
            /* font */
          /* font */
             --fs-xl: 1.4rem;
             --fs-600: 1.2rem;
             --fs-500: 1rem;
             --fs-400: .9rem;
             --fs-300: .8rem;
             --fs-200: .7rem;
             --fs-100: .5vh;
             --fs-50: .4vh;
             --input-height: 2rem;
             --sqaure:3rem;
            /* box shadow */
            --box-shadow: 0 0 30px 0 rgba(0,0,0,.16);
            /* fonts */
            /* font pairs */
            --title-font:'SF UI Display',sans-serif!important;
            --body-font:Verdana, sans-serif!important;
        }

          /* css style */
          body{
            font-family: var(--body-font)!important;
            font-size:var(--fs-300)!important;
           }

           .container {
            max-width: 100%!important;}
        h1,h2{
            margin-bottom:0!important;
            color: var(--main-color)!important;
            font-family: var(--title-font)!important;
        }
        h6,h3,p{margin-bottom:0!important;}
        .input-height{
            height: var(--input-height)!important;
        }
        .ticket-details-top-section{
            display:flex;
            justify-content:space-between;
            align-items:start;
            flex-direction: column;
        }
        .ticket-details-tittle{
            width: 75%;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .ticket-details-tittle form{
            margin-bottom:0!important;
        }
        .ticket-details-tittle form button{
            white-space: nowrap;
            border:0!important;
            border-radius:0!important;
            background:var(--main-color)!important;
            height:var(--input-height);
            padding: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }
         .ticket-details-tittle h1{
            font-size: var(--fs-600);
            font-weight: 400;
            color: var(--main-color)!important;
            line-height: 6vw;
            font-family: var(--title-font)!important;
            text-overflow: ellipsis;
            white-space: nowrap;
            width: 100%;
            overflow: hidden;
          }
        .ticket-list a{
                display: flex;
                justify-content: end;
                align-items: center;
                color: var(--main_color);
                padding: 5px 10px;
                font-weight:300;
                font-size: var(--fs-300);
                height: var(--input-height);
                opacity: .8;
                transition:200ms linear;
            }
           .ticket-list a:hover{
                opacity: 1;
                color: var(--main_color);
            }
            .ticket-list a:hover span{
               transform: translateX(-1px);
            }
            .ticket-list a span{
                width: 1.4rem;
                font-size: var(--fs-500);
                transition:200ms linear;
            }

            /* ticket-details-emails-section */
            .ticket-details-emails-section{
                display:flex;
                justify-content:center;
                align-items:start
            }
            /* reply form */
            .email-detail-reply-header{
                display:flex;
                justify-content:start;
                align-items:center;
            }
            .email-detail-reply-img{position: relative;}
            .email-detail-reply-img img{ width:50px;
                height:50px;
                box-shadow:0 0 30px rgba(0,0,0,.16);
                border-radius:50%;}
            .email-detail-reply-img span{}
            .add-new-ticket-form{
                background: #fff;
                padding: 15px;
                margin-bottom: 10px;
                box-shadow: 0 15px 10px -15px rgb(0 0 0 / 16%);
            }
            /* ticket-details-emails */
            .ticket-details-emails{}
            .ticket-details-emails .email-detail-style{
                background: #fff;
                padding: 15px;
                margin-bottom: 10px;
                box-shadow: 0 15px 10px -15px rgb(0 0 0 / 16%);
            }
            .ticket-details-emails .email-detail-style .email-detail-style-header{
                display:flex;
                justify-content:start;
                align-items:center;
            }
            .ticket-details-emails .email-detail-style .email-detail-style-header .email-detail-style-img{
                position:relative}
            .ticket-details-emails .email-detail-style .email-detail-style-header .email-detail-style-img .email-status-icon{
                position: absolute;
                top: 0;
                right: 0;
                height: 20px;
                width: 20px;
                border-radius: 50%;
                box-shadow: 0 0 5px rgb(0 0 0 / 50%);
                display: flex;
                justify-content: center;
                align-items: center;}

            .ticket-details-emails .email-detail-style .email-detail-style-header .email-detail-style-img .email-status-icon span{
                     font-size:1rem!important;
                     color:#fff
                }
            .ticket-details-emails .email-detail-style .email-detail-style-header .email-detail-style-img img{
                width:50px;
                height:50px;
                box-shadow:0 0 30px rgba(0,0,0,.16);
                border-radius:50%;
            }
            .ticket-details-emails .email-detail-style {}
            .email-detail-style-header-privcy{
             display:none;
             background: var(--bs-yellow);
             width: fit-content;
             padding: 0.1rem 0.3rem;
             border-radius:.5rem;
            }
            .email-detail-style-header-privcy h6{
                color: #fff;
                font-size: var(--fs-200);
            }
            /* private note */
            .ticket-details-emails .private-note{
                /* background: rgba(251 ,186 ,59 , 10%); */

                background: #fff;

                border: 1px dashed #fdac41;
            }
            .ticket-details-emails .email-detail-style.private-note .email-detail-style-header-privcy{
                display:block!important;

            }
            .private-note .email-status-icon {
                background-color: var(--bs-yellow);
            }
            /* sent reply */
            .ticket-details-emails .sent-email .email-status-icon {
                background-color: var(--green);
            }
            .ticket-details-emails .sent-email{
                background:rgba(255,255,255,.8);

            }
            /* received email */
            .ticket-details-emails .received-email{
               background:rgba(255,255,255,1);

            }
            .ticket-details-emails .received-email .email-status-icon {
                background-color: var(--bs-primary);
            }
            /* ticket-details-filter */
            .ticket-details-filter{}

           /* editor */
           .ticket-details-emails-section .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused),.ck-rounded-corners .ck.ck-editor__top .ck-sticky-panel .ck-toolbar, .ck.ck-editor__top .ck-sticky-panel .ck-toolbar.ck-rounded-corners{
                border: none;
                border-radius: 0;

            }
            .ticket-details-emails-section .ck-rounded-corners .ck.ck-editor__top .ck-sticky-panel .ck-toolbar{ background:var(--main-color)!important;}
            .ticket-details-emails-section .ck.ck-icon,.ticket-details-emails-section .ck.ck-icon *,.ticket-details-emails-section .ck.ck-dropdown.ck-heading-dropdown .ck-dropdown__button .ck-button__label{
                color:white!important;
                font-size:var(--fs-200)
            }
            .ticket-details-emails-section .ck.ck-icon:hover,.ticket-details-emails-section .ticket-details-emails-section .ck.ck-icon:hover *,.ticket-details-emails-section .add-new-ticket-form .ck.ck-dropdown.ck-heading-dropdown .ck-dropdown__button .ck-button__label:hover{
                color:var(--main-color)!important;
            }
            .ticket-details-emails-section .ck.ck-toolbar.ck-toolbar_grouping>.ck-toolbar__items{
                background:var(--main-color)!important;
                height: var(--input-height);
            }
            .ticket-details-emails-section [dir=ltr] .ck.ck-dropdown .ck-button.ck-dropdown__button:not(.ck-button_with-text){
                display:none!important;
            }
            /* end editor style */
            .ticket-note {
                background-color: #fffdf1!important;
            }


          .ck-placeholder{height: 100px;}
          .ply_btn{
            background-color: #4fbb87!important;
              color: white!important;
              height: 36px!important;
          }
        .ck-file-dialog-button{display: none!important;}
        .ticket-details-close-status{
              display: flex;
              justify-content: end;
              align-items: center;

          }
        .ticket-details-close-status button{
              background-color: var(--main-color);
              height:var(--input-height);
              color:#fff;
              font-size:var(--fs-300);
              font-weight:500;
              padding: 0 0.7rem;
              border-radius:0;
          }
        .ticket-detils-status h3{
            font-size:var(--fs-500)!important;
            color:var(--main-color)!important;
        }
        .ticket-detils-status table{border:none!important}
        .ticket-detils-status table tr{border-bottom:1px solid #fff }
        .ticket-detils-status table td,.ticket-detils-status table td h4{
            font-size:var(--fs-400)!important;
            color:var(--gray)!important;
            font-weight: 500!important;
            margin-bottom: 5px!important;
        }
        .ticket-detils-status table td h5{
            font-size: 0.5rem!important;
            color:var(--gray)!important;
            white-space: nowrap;
            margin-bottom: 5px!important;
        }
        .email-detail-style-header-name h3{
            font-size:var(--fs-300)!important;
            color:var(--main-color)!important;
            font-weight:600;
        }
        .email-detail-style-header-date p,.email-detail-style-header-date-note p{
            font-size:var(--fs-200)!important;
            color:var(--gray)!important;
            font-weight:normal;
            white-space: nowrap;
            overflow:hidden;
        }
        .email-detail-style-body{
            padding: 1rem 1.8rem;
            height: auto;

        }
        .email-detail-style-body > div a{
            width: 100%;
            overflow: hidden;
            display: block;
            text-overflow: ellipsis;
            white-space: nowrap;
            font-size:var(--fs-500)!important;
            color:var(--gray)!important;
            cursor: pointer;
            line-height: 4;
        }
        /* feed back modal */
        .tickets-feedback-btn{
                border-radius:50%;
                height: var(--input-height);
                width: var(--input-height);
                padding: 0;
                display: inline-flex;
                justify-content: center;
                align-items: center;
                background-color: transparent;
                border:1px solid var(--main-color);
                color:var(--main-color);
                opacity: .5;
                margin: 5px;
                width:2rem;
            }
            .tickets-feedback-btn:hover {
                background-color: var(--main-color);
                color:#fff;
            }
            .tickets-feedback-btn  span{
                color:var(--main-color)
            }
            .tickets-feedback-btn:hover span{
                color:#fff;
            }
            /* feed back Modal******************************************* */
            .feedback_modal_title{
                font-size: var(--fs-400);
                color: var(--main-color);
                font-weight: 600;
            }
            .modal-dialog{
                min-width: 40%!important;
            }
            .modal-content{
                min-height: 60vh;
            }
            .modal-body{
                padding: .4rem 1rem !important;
                margin-bottom: 10px!important;
            }
            .modal-footer{
                margin-top: -30px;
            }
            .feedback-secn{
                margin: 15px 0;
            }
            .feedback-secn h6{
                font-size: var(--fs-300);
                color: var(--main-color);
                font-weight: 600;
                margin-bottom: 5px!important;
                display: flex;
                justify-content: start;
                align-items: center;
            }
            .feedback-secn h6 img{
                width: 25px;
                height: 25px;
                margin-right: 5px;
            }
            .feedback-secn textarea{
                width: 100%!important;
                box-shadow: 0 0 10px rgba(0,0,0,.10);
                margin: 10px auto;
            }
            .rate_satisfy_support_experience{
                display: flex;
                justify-content: space-around;
                align-items: center;
                width: 100%;
            }
            .radio_support_experience input{opacity: 0;}
            .radio_support_experience input:checked ~ span{
                box-shadow: 0 0 10px rgba(0,0,0,.10);
                border:1px solid var(--blue)

            }
            .radio_support_experience span{
                width: 55px;
                height: 55px;
                display: flex;
                justify-content: center;
                align-items: center;
                transition: 200ms linear;
            }
            .radio_support_experience span:hover{
                transform: scale(.95);
            }
            .radio_support_experience span img{
                width: 45px;
                height: 45px;
            }
            .radio_support_provide_assistance{
                padding: 0 20px;
                display: flex;
                justify-content: start;
                align-items: center;
            }
            .radio_support_provide_assistance label{
                font-size: var(--fs-300);
                color: var(--gray);
                margin-bottom: 0!important;
                margin-left: 3px;
            }
            .feedback_footer{
                display: flex;
                justify-content:space-between!important;
                align-items: center;
                width: 100%;
            }
            .cancel_feedback{
                background: transparent!important;
                color: var(--main-color)!important;
                border:none!important;
                border-bottom: 1px solid var(--main-color);
                border-radius: 0!important;
                box-shadow: none!important;
                outline: none!important;
            }
            .close_feedback_modal{
                width: 25px;
                height: 25px;
                padding: 0!important;
                justify-content: center;
                display: flex;
                align-items: center;
            }




            /* media query */
            @media (max-width:992px){

            .ticket-details-emails-section{
            flex-direction: column-reverse!important;
            }
            .ticket-details-tittle{width: 100%!important;}
            }
            @media (max-width:450px){

            .ticket-list a span {
            width: 1rem!important;}
            }
            /* end media query */
</style>
<?php  /* template name: tickets-details */ ?>
<?php get_header();?>

<div class="container-fluid ticket-details-page-container my-3">

     <!-- ticket header cntrls -->
     <div class="ticket-details-top-section">
         <div class="w-75">
              <!-- ticket list -->
              <div class="tickets-ctrls mb-2">
                                    <div class="ticket-list">
                                            <a href="<?php echo site_url('tickets') ?>" class="link_loader">
                                            <span class="material-icons">arrow_backward_ios</span>
                                            Tickets List
                                            </a>
                                    </div>
                 </div>
         </div>
         <div class="ticket-details-tittle ">
                         <h1>[Ticket #<?php echo $result2->ticketNumber ?>] <?php echo $result2->subject ?></h1>


                        <!-- closr ticket -->
                        <?php if($result2->statusType !== "Closed"): ?>
                        <form action="" method="post">
                            <button type="submit" name="close_ticket" value="1" class="close_ticket">Close Ticket</button>
                        </form>
                        <?php endif; ?>

        </div>

    </div><!--end ticket header cntrls -->

    <!-- write respond -->
    <div class="ticket-details-emails-section">
         <div class="col-lg-9 col-md-12 col-sm-12 ticket-details-emails p-0">
              <!-- close status button -->
              <!-- <div class="ticket-details-close-status p-0 my-3 col-md-12">
                <button type="button" class="btn close-status">close</button>
             </div> -->
             <!-- write respond section -->
             <div class="write-respond-ticket">
                <form class="add-new-ticket-form" action="" method="post">
                    <!-- write reply -->
                    <?php if(isset($result3->data) && count($result3->data) > 1): ?>
                    <div class="form-group ticket-details-reply mb-0">
                         <textarea  class="editor" name="reply_txt" placeholder="reply here"></textarea>
                    </div>
                    <!-- submit reply -->
                    <div class="form-group form-row ticket-details-mention p-0">
                          <div class="col-md-12 input-height ">

                               <div class="input-group">
                                       <button type="submit" class="btn ply_btn input-height">Reply</button>
                                </div>
                         </div>
                    </div>
                  <?php else: ?>
                    <div class="form-group ticket-details-reply mb-0">
                         <p>Wating for agent response...</p>
                    </div>
                  <?php endif; ?>
                </form>
             </div>
             <!-- previous emails  -->
             <div class="email-detail-replys">

                 <?php if( $history ): foreach ( $history as $val):  ?>
                <div class="email-detail-style received-email <?php if(isset($val->content)){echo 'ticket-note';} ?>">
                 <div class="email-detail-style-header">
                     <!-- avatar -->
                     <div class="email-detail-style-img mx-1">
                         <img src="https://cdn.landesa.org/wp-content/uploads/default-user-image.png" alt="">
                     </div>
                     <!-- Email Name -->
                     <div class="email-detail-style-header-name mx-1">
                         <h3><?php echo $val->author->name; if(isset($val->commenter->name)){echo $val->commenter->name;} ?></h3>
                     </div>
                     <!-- Email budge privcy -->
                     <div class="email-detail-style-header-privcy mx-1">
                         <h6><?php echo $val->author->email; ?></h6>
                     </div>
                     <!-- Email date -->
                     <div class="email-detail-style-header-date mx-1">
                       <?php if(isset($val->commentedTime)){ $da_time = $val->commentedTime;}else{
                         $da_time=$val->createdTime;
                       } ?>

                         <p><?php echo date("m/d/Y", strtotime($da_time)); ?></p>
                     </div>
                     <!-- Email date note -->
                     <div class="email-detail-style-header-date-note mx-1">
                         <p>(sent <?php echo time_elapsed_string($da_time) ?>)</p>
                     </div>
                 </div>
                 <div class="email-detail-style-body">
                     <p>
                        <?php
                         if(isset($val->content)){echo $val->content;}
                        else{
                          echo get_thread_reply($val->id,$ticket_id) ;
                        } ?>
                     </p>
                 </div>
             </div>
       <?php endforeach; endif; ?>

             </div>


         </div>
         <div class="col-lg-3 col-md-12 col-sm-12 ticket-details-filter">
             <div class="ticket-detils-status">
                 <table class="table-borderless ">
                     <tr class="ticket-feed-back">
                         <td>
                                <h4>Feedback</h4>
                                <h5>How satisfied are you with this support experience?</h5>
                        </td>
                         <td>
                                <button class="tickets-feedback-btn" data-toggle="modal" data-target="#tickets_detail_feedback" data-balloon-pos="down" data-balloon="Feedback">
                                    <span class="material-icons">how_to_vote</span>
                                </button>
                         </td>
                     </tr>
                     <tr>
                         <td>Status</td>
                         <td class="ticket-deatails-status"> <?php echo $result2->statusType ?></td>
                     </tr>
                     <tr>
                         <td>Category</td>
                         <td><?php if(isset($result2->category)) {echo $result2->category;} ?></td>
                     </tr>
                     <tr>
                         <td>Piriority</td>
                         <td><?php if(isset($result2->piriority)) {echo $result2->piriority;} ?></td>
                     </tr>
                 </table>
             </div>
             <h6>Ticket Attachments</h6>
             <?php
                if(isset($attaches)): $atts = $attaches->data;
                $x=1;foreach ($atts as $att) :
               ?>
                <?php if($x>1){echo '&nbsp; | &nbsp;';} ?>
                <a download title="Click to download" class="att_file_a" href="javascript:void(0)" name="<?php echo $att->name ?>" link="<?php echo $att->href ?>">
                <?php echo $att->name ?> </a>

                <?php $x++;endforeach;
                else:
                echo '<p>No Attachments</p>';
                endif; ?>
         </div>
    </div>
</div>
<!-- Modal -->
<section class="modal fade" id="tickets_detail_feedback" tabindex="-1" role="dialog" aria-labelledby="tickets_feedbackLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title feedback_modal_title mb-0" id="tickets_feedbackLabel">
                                        Feedback
                                    </h4>
                                    <button type="button" class="close close_feedback_modal" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                <div class="modal-body feedback_modal_body mt-1">
                                    <form action="">
                                                        <!--  1-How satisfied are you with this support experience?-->
                                                        <div class="feedback-secn">
                                                            <h6>
                                                                How satisfied are you with this support experience?
                                                            </h6>
                                                            <div class="rate_satisfy_support_experience">
                                                                    <label class="radio_support_experience">
                                                                        <input type="radio" name="satisfy" id="">
                                                                        <span for="happy">
                                                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Good.png"/>
                                                                        </span>
                                                                    </label>
                                                                    <label class="radio_support_experience">
                                                                        <input type="radio" name="satisfy" id="">
                                                                        <span for="bad">
                                                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Okay.png"/>
                                                                        </span>
                                                                    </label>
                                                                    <label class="radio_support_experience">
                                                                        <input type="radio" name="satisfy" id="">
                                                                        <span for="">
                                                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Bad.png"/>
                                                                        </span>
                                                                    </label>
                                                            </div>
                                                        </div><!--end  1-How satisfied are you with this support experience?-->
                                                        <!--  2-Did we provide the assistance you needed?-->
                                                        <div class="feedback-secn">
                                                            <h6>
                                                                Did we provide the assistance you needed?
                                                            </h6>
                                                            <div class="rate">
                                                                    <div class="radio_support_provide_assistance">
                                                                        <input type="radio" name="provide_assistance" id="">
                                                                        <label for=""> Yes, during my first contact</label>
                                                                    </div>
                                                                    <div class="radio_support_provide_assistance">
                                                                        <input type="radio" name="provide_assistance" id="">
                                                                        <label for="">Yes, after multiple contacts</label>
                                                                    </div>
                                                                    <div class="radio_support_provide_assistance">
                                                                        <input type="radio" name="provide_assistance" id="">
                                                                        <label for="">No</label>
                                                                    </div>
                                                            </div>
                                                        </div><!--end  2-Did we provide the assistance you needed?-->
                                                        <!--  3-Please share anything else you’d like us to know about this experience.-->
                                                        <div class="feedback-secn text_feedback">
                                                            <h6>
                                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/idea.png"/>
                                                                Please share anything else you’d like us to know about this experience.
                                                            </h6>
                                                            <div class="rate">
                                                                <textarea name="" id="" rows="4"></textarea>
                                                            </div>
                                                        </div><!--end  3-Please share anything else you’d like us to know about this experience.-->
                                    </form>
                                </div>
                                    <div class="modal-footer feedback_footer">
                                            <button type="button" class="btn btn-secondary cancel_feedback" data-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary submit_feedback">Send Feedback</button>
                                    </div>
                        </div>
                    </div>
    </section>
<!-- end of feedback modal -->
<?php get_footer();?>
<!-- boostrap4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- js code -->
<script>
ClassicEditor.create( document.querySelector( '.editor' ) )
.then( editor => {
console.log( editor );
} )
.catch( error => {
console.error( error );
} );

  (function($){

$('.att_file_a').on('click', function(e){
    $.post('/wp-admin/admin-ajax.php', {
        name: $(this).attr('name'),
        url: $(this).attr('link'),
        action: 'get_ticket_file_url',
    }, function (response){
        window.open(response, '_blank').focus();
    })
});

    }(jQuery));
// feed back on closed tickets
 let feedbackTicket = document.querySelector(".ticket-feed-back");
 let ticketStatus = document.querySelector(".ticket-deatails-status");
 function checkStatus(){
    if(ticketStatus.innerHTML.match(/Closed/gi)){
        feedbackTicket.style.display="block";
   }else{
    feedbackTicket.style.display="none";
    }
  }
 checkStatus();


</script>
