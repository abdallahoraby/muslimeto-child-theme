<?php
// echo get_option('zoho_access_token' );


// pre_dump(last_successfull_pay_date(399));
$current_user = wp_get_current_user();
$email = $current_user->user_email;
//https://desk.zoho.com/api/v1/tickets/450816000022613552/History?eventFilter=CommentHistory
//https://desk.zoho.com/api/v1/tickets/450816000022613552/comments

 $auth_token = 'Bearer '.get_zoho_token_from_dev();
 $headers=array(
         "Authorization: $auth_token",
         "contentType: application/json; charset=utf-8",
 );
 $url='https://desk.zoho.com/api/v1/contacts/search?limit=1&email='.$email;
 $ch= curl_init($url);
 curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
 curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
 curl_setopt($ch,CURLOPT_HTTPGET,TRUE);
 $data = json_decode(curl_exec($ch));
 if(isset($data->data[0]->id)){
 $url2='https://desk.zoho.com/api/v1/contacts/'.$data->data[0]->id.'/tickets';
 curl_setopt($ch, CURLOPT_URL, $url2);
 $result2 = json_decode(curl_exec($ch));
 }
 curl_close($ch);
  ?>
<!-- bootstrap -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
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
             --fs-300: 0.8rem;
             --fs-200: .7rem;
             --fs-100: .5rem;
             --fs-50: .4rem;
             --input-height: 2rem;
             --sqaure:3rem;
            /* box shadow */
            --box-shadow: 0 0 30px 0 rgba(0,0,0,.16);
            /* input height */
            /* fonts */
            /* font pairs */
            --title-font:'SF UI Display',sans-serif!important;
            --body-font:Verdana, sans-serif!important;
        }

          /* css style */
          .tickets-page{
              width:95%;
              max-width:95%;
              margin-top: 4rem!important;
          }
          body{
            font-family: var(--body-font)!important;
            font-size:var(--fs-300)!important;
           }
           table{
               border: none!important;
           }
        h1,h2{
            margin-bottom:0!important;
            color: var(--main-color)!important;
            font-family: var(--title-font)!important;
        }
        ul{
            list-style:none;
        }
        .container {
            max-width: 100%!important;}
        .tickets-filters h2{
            display:flex;
            align-items:center;
            font-size:var(--fs-500);
            font-weight:600;
        }
        .tickets-filters h2 span{
             margin-right:5px;
             font-size:var(--fs-xl)!important;
        }
        .ticket-top-section{
            display:flex;
            justify-content:space-between;
            align-items:center;
        }
          .tickets-ctrls{
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0;
          }

          .ticket-check-filter {
              position: relative;
              width:100%;
              height:var(--input-height);
              margin:0;
              transition:200ms linear
          }
          .ticket-check-filter:hover p{
              padding-left: 10px;
          }
          .tickets-container{
              display:flex;
              justify-content:center;
              align-items:start;
          }
          .ticket-check-filter input{
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
          }
          .ticket-check-filter p{
            position: absolute;
            top: 0;
            left: 0;
            white-space: nowrap;
            font-family: inherit!important;
            font-size: var(--fs-300)!important;
            cursor: pointer;
            color: var(--main-color);
            height: 100%;
            width: 100%;
            background-color: #fff;
            padding-left: 5px;
            padding-top: 3px;
            transition:200ms linear;
            display: flex;
            justify-content: start;
            align-items: center;
        }
        .ticket-check-filter p span{
            font-size: var(--fs-600);
            color: var(--gray);
            margin-right: 5px;
        }
           .ticket-check-filter input:checked ~ p{
            font-weight:600!important;
            border-left: 4px solid var(--main-color);
            }
            .tickets-table tbody tr{
                background:#fff;
                transition:200ms linear;
                cursor: pointer;
                border-bottom: 5px solid #f2f4f4;

            }
            .tickets-table thead th{
                font-size:var(--fs-300)!important;
                padding:5px;
                vertical-align: middle;
                line-height: 20px;
                width: 100px;
            }
            .tickets-table tbody th{
                vertical-align: middle;
            }
            .tickets-table tbody td{
                font-size:var(--fs-300)!important;
                padding:10px 5px;
                line-height: 1.5;
                /* max-width: 200px; */
                vertical-align: middle!important;
            }
            .tickets-table tbody td a{
                width: 100%;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                display: block;
                line-height: 1.5;
            }

            .tickets-table tbody tr:hover{
                transform: translateX(3px);
            }
            .tickets-table thead tr:first-child{
                border-bottom:1px solid #eee;
                cursor: pointer;
            }
            .tickets-table td:first-child, th:first-child{
                padding-left:15px!important;
            }
            .ticket-status{
                background: rgb(71 95 123 / 16%);
                padding: 10px;
                border-radius: 15px;
            }
            .ticket-priority{
                padding: 5px 10px;
                border-radius: 15px;
            }
            .ticket-priority-low{background: rgb(73 187 136 / 16%);}
            .ticket-priority-medium{background: rgb(252 185 24 /40%);}
            .ticket-priority-high{background: rgb(234 61 47 / 16%);}
            .ticket-add-new a{
                display: flex;
                justify-content: center;
                align-items: center;
                background: var(--main-color);
                color: #fff;
                padding: 5px 10px;
                font-weight:300;
                font-size: var(--fs-300);
                height: var(--input-height);
            }
            .ticket-add-new a:hover{
                color:#fff;

            }
            .ticket-add-new a:hover span{
                color:#fff;
                padding-right:5px;
            }
            .ticket-add-new a span{
                color:#fff!important;
                font-size: var(--fs-500);
                transition:200ms linear;
            }
            .dataTables_filter input[type=search]{
                height: var(--input-height);
                border: navajowhite;
                border-radius: 0;
                box-shadow: 0 0 10px 0 rgb(0 0 0 / 16%);
            }
            .tickets-filters{
                position: relative;
                top:75px;
            }
            .tickets-filters ul{
                margin: 0!important;
            }
            .ticket-status.open{background-color: #9af4cc!important}
            .ticket-help-feedback{
                display: flex;
            }
            .ticket-help-feedback button{
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
            .ticket-help-feedback button:hover {
                background-color: var(--main-color);
                color:#fff;
            }
            .ticket-help-feedback button span{
                color:var(--main-color)
            }
            .ticket-help-feedback button:hover span{
                color:#fff;
            }
            .tickets-num div{
                height: 25px;
            }
            /* feed back Modal */
            .feedback_modal_title{
                font-size: var(--fs-400);
                color: var(--main-color);
                font-weight: 600;
            }
            .modal-body{
                padding: .4rem 1rem !important;
                margin-bottom: 10px!important;
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
                width: 65px;
                height: 65px;
                display: flex;
                justify-content: center;
                align-items: center;
                transition: 200ms linear;
            }
            .radio_support_experience span:hover{
                transform: scale(.95);
            }
            .radio_support_experience span img{
                width: 55px;
                height: 55px;
            }
            .radio_support_provide_assistance{
                padding: 5px 20px;
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
            .modal-dialog{
                min-width: 40%!important;
            }
            .modal-content{
                min-height: 60vh;
            }
             /* media query */
                    @media (max-width:1200px){
                        .tickets-container ul{
                        display: flex;
                    }
                    .tickets-container ul li{
                    width: 30%;
                    margin:0 1vw;
                    overflow: hidden;
                    }
                    .ticket-status{
                    background: transparent!important;
                    line-height:12px;
                    padding: 0!important;
                    }
                    .tickets-table thead th{

                    padding:10px 4px;
                    }
                    .tickets-table tbody td{
                    padding:10px 4px;
                    }
                    .tickets-filters{
                    position: relative!important;
                    top:0!important;
                    width: 100%!important;
                    padding: 10px 0;
                    }
                    .tickets_filter_container{
                        width: 75%!important;
                    }
                    .ticket_table_container{width: 100%!important;}
                    .tickets-page{
                    width:100%;
                    max-width:100%;
                    }
                    .tickets-num{
                    display: none!important;
                    }
                    .tickets-table thead th:last-child,.tickets-table tbody td:last-child{display: none;}
                    }
                    @media (max-width:992px){

                    .tickets_filter_container{
                        width: 75%!important;
                    }
                    .tickets-table thead th:last-child,.tickets-table thead th:nth-child(4),.tickets-table thead th:first-child{
                    display: none;
                    }
                    .tickets-table tbody td:last-child,.tickets-table tbody td:nth-child(4),.tickets-table tbody td:first-child{
                    display: none;
                    }
                    }/* end media query */
                    /* hide help center button */
                    div#zohohc-asap-web-launcherbox{
                        visibility: hidden;
                    }
</style>
<!-- end of style---------------------->
<?php  /* template name: tickets */ ?>
<?php get_header();?>

<!-- page content -->
<div class="container-fluid tickets-page mb-3">
    <!-- ticket header cntrls -->
    <div class="ticket-top-section">

        <div class="tickets-ctrls">
             <div class="ticket-add-new">
                  <a href="<?php echo site_url('new-ticket') ?>" class="link_loader">
                  <span class="material-icons">add</span>
                      New Ticket
                    </a>
             </div>
        </div>

        <div class="ticket-help-feedback p-0">
              <button class="tickets-help-center-btn"  data-balloon-pos="down" data-balloon="Help center"><span class="material-icons">question_mark</span></button>
              <button class="tickets-feedback-btn" data-toggle="modal" data-target="#tickets_feedback" data-balloon-pos="down" data-balloon="Feedback">
                  <span class="material-icons">create</span>
             </button>
        </div>
    </div><!--end ticket header cntrls -->
    <!-- ticket body content -->
    <div class="row tickets-container">
        <!-- ticket filter -->
         <div class="col-lg-2 col-md-12 col-sm-12 tickets_filter_container">
             <!-- filters -->
             <div class="row">
                   <div class="tickets-filters">
                       <ul>
                          <li>
                              <label class="ticket-check-filter">
                                  <input type="radio" name="ticket-filter" checked value="">
                                  <p><span class="material-icons">mail_lock</span>All Tickets</p>
                              </label>
                          </li>
                          <li>
                              <label class="ticket-check-filter">
                                  <input type="radio" name="ticket-filter" value="open">
                                  <p><span class="material-icons">lock_open</span>Open</p>
                              </label>
                            </li>
                          <li>
                              <label class="ticket-check-filter">
                                  <input type="radio" name="ticket-filter" value="closed">
                                  <p><span class="material-icons">lock</span>Closed</p>
                              </label>
                            </li>
                       </ul>
                   </div>
             </div>

         </div>
        <!-- ticket table -->
         <div class="col-lg-10 col-md-12 col-sm-12 ticket_table_container">
              <div class="row tickets-num">
                <?php if(isset($result2->data)):?>
                  <div class="col-6">Tickets:<?php echo count($result2->data) ?></div>
                <?php endif; ?>
                  <!-- <div class="col-6">
                      <div class="dataTables_filter">
                          <label>
                              <input type="search" class="" placeholder="Search" aria-controls="">
                        </label>
                      </div>
                 </div>-->
              </div>
              <!-- end of search  -->
              <div class="row">
                  <table class="table table-borderless tickets-table">
                  <thead>
                       <tr>
                           <!-- <th scope="col"><input type="checkbox"/></th> -->
                           <th scope="col pl-2">ID</th>

                           <th scope="col" colspan="3">Subject</th>
                           <th scope="col">Status</th>
                           <th scope="col">Category</th>
                           <th scope="col">Priority</th>
                           <th scope="col">Date Created</th>
                       </tr>
                 </thead>
                 <tbody>
                   <?php if(isset($result2->data)):
                      $tickets = $result2->data;
                       $x=1;foreach($tickets as $ticket): $originalDate = $ticket->createdTime;
                       $newDate = date("d-m-Y", strtotime($originalDate));?>
                        <tr class="<?php echo strtolower($ticket->status); ?>">
                         <!-- <th scope="row pl-2"><input type="checkbox" class="ticket-table-checkbox"/></th> -->
                         <td>#<?php echo $ticket->ticketNumber; ?></td>

                         <td colspan="3"><a href="<?php echo site_url('ticket-details?id='.$ticket->id); ?>" class="link_loader"><?php echo $ticket->subject; ?></a></td>
                         <td><span class="ticket-status <?php echo strtolower($ticket->status); ?>"><?php echo $ticket->status; ?></span></td>
                         <td><?php echo $ticket->category ?></td>
                         <td>
                           <?php if($ticket->priority): ?>
                           <span class="ticket-priority "><?php
                             echo $ticket->priority ?></span>
                           <?php endif; ?>
                           </td>
                         <td><?php echo $newDate ; ?></td>
                       </tr>
                     <?php $x++; endforeach;?>
                      <?php else: ?>

                          <p class="no_tickt" style="width:100%;text-align:center">You have no tickets.</p>

                     <?php endif; ?>
                 </tbody>
                 </table>

              </div>
       </div><!-- end ticket table----->
    </div><!--end ticket body content-->
    <section class="modal fade" id="tickets_feedback" tabindex="-1" role="dialog" aria-labelledby="tickets_feedbackLabel" aria-hidden="true">
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
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/satisfaction-scale.png"/>
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
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/handshake.png"/>
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
                        <button type="button" class="btn btn-primary submit_feedback">Save changes</button>
                </div>
    </div>
  </div>
    </section>
</div>
<!-- end page content -->

<?php get_footer();?>
<!-- boostrap4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- js code -->
<script>
jQuery(document).ready(function(){
 // table
jQuery(".no_tickt").insertAfter(".tickets-table");
jQuery(document).on('change','input[name=ticket-filter]',function(){
   const vv = this.value;
      if(vv){
        jQuery('.tickets-table tbody tr').fadeOut();
        jQuery('.tickets-table tbody tr.'+vv).fadeIn();
      }else {
        jQuery('.tickets-table tbody tr').fadeIn();
      }
});
// ticket piriority
let ticketPiriority = document.querySelectorAll(".ticket-priority");
for(let x = 0 ; x<ticketPiriority.length; x++){
   if( ticketPiriority[x].innerText == "High"){
    ticketPiriority[x].classList.add("ticket-priority-high")
   }else if(ticketPiriority[x].innerText == "Medium"){
    ticketPiriority[x].classList.add("ticket-priority-medium")
   }else{
    ticketPiriority[x].classList.add("ticket-priority-low")
   }
}

});
// release help center



// jQuery('button.tickets-help-center-btn').on('click', function(){

//     jQuery('div#zohohc-asap-web-launcherbox').trigger('click');

// });

</script>
