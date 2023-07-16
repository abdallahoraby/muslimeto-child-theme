<?php
$current_user = wp_get_current_user();
$email = $current_user->user_email;

if(isset($_POST['ticket_submit'])):

 $auth_token = 'Bearer '.get_zoho_token_from_dev();
 $headers=array(
            "Authorization: $auth_token",
 );
 $url='https://desk.zoho.com/api/v1/tickets';
 $url2='https://desk.zoho.com/api/v1/contacts/search?limit=1&email='.$email;
 $ch2= curl_init($url2);
 curl_setopt($ch2,CURLOPT_HTTPHEADER,$headers);
 curl_setopt($ch2,CURLOPT_RETURNTRANSFER,TRUE);
 curl_setopt($ch2,CURLOPT_HTTPGET,TRUE);
 $data2 = json_decode(curl_exec($ch2));
 curl_close($ch2);

 if(isset($data2->data[0]->id)):

 $ch = curl_init($url);

 $cf_arr = array(
 'cf_start_date' => $_POST['effective_date'],
 'cf_end_date' => $_POST['resume_date'],
 'cf_learner_name' => $_POST['learner_sel'],
 'cf_class_id' => $_POST['class_sel']);

 $subj  = $_POST['sub_cat'] ? $_POST['sub_cat'] : $_POST['prnt_cat'];
 $dateTime = new DateTime($_POST['effective_date']);
 $formatted = $dateTime->format("Y-m-d\TH:i:s.z\Z");
 $payload = json_encode(
   array(
      "subject" =>  $subj . $_POST['effective_date'] . rand(12346,99999) ,
      "departmentId"=> 450816000000006907,
      "contactId"=> $data2->data[0]->id ,
      "category" => $_POST['prnt_cat'],
      "subCategory"=> $_POST['sub_cat'],
      "description"=> $_POST['reply_txt'],
      "dueDate" =>    $formatted , // "2016-06-21T16:16:16.000Z"
      "channel" => "Web",
      "cf" =>  array_filter($cf_arr)
     ));
 curl_setopt($ch, CURLOPT_POSTFIELDS, $payload );
 curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
 curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
 curl_setopt($ch, CURLOPT_POST, 1);
 $data = json_decode(curl_exec($ch));
 //pre_dump($data);
 $total = count($_FILES['ticket_files']['name']);
 if($_FILES['ticket_files']['error'][0] !== 4 && isset($data->id) && $total < 4){
 $url3="https://desk.zoho.com/api/v1/tickets/$data->id/attachments?isPublic=true";

 for( $i=0 ; $i < $total ; $i++ ) {
 $cfile = new CURLFILE($_FILES['ticket_files']['tmp_name'][$i], $_FILES['ticket_files']['type'][$i], $_FILES['ticket_files']['name'][$i]);
 $myfile = array('file' => $cfile );
 curl_setopt($ch, CURLOPT_URL, $url3);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $myfile);
 $ff_data = json_decode(curl_exec($ch));
 }
 }
 curl_close($ch);
 endif;
 wp_redirect( home_url('tickets') );exit;
 endif;


$parent_cats = array(
  'Class-Support' =>  array(
   'one' =>'Cancel/Reschedule Session',
   "one2" => "Change Class Schedule" ,
   'f' =>"Upgrade/Downgrade Plan",
   "two" =>"Pause/Resume Class",
   'a' =>"Request New Teacher",
   'g' =>"Other"),
  'Billing' =>  array("Inaccurate Billing","Makeup Balance","Change Payment Method","Sponsorship Request", "one" =>"Cancel Class","Other"),
  'Portal' =>  array("Login Issue","Update account details","Report defect or bug","Request feature or enhancement"),
  'Complaints' => array("Teacher did not show-up","Teacher joins Late or leaves early","Internet Connectivity Issues","Teacher Communication Barrier","Inaccurate Attendance Recording","Inappropriate Language","Other"),
  'Partnership-Request' => array("Weekend/Evening School","K-12 School","Islamic Center","Other"));
 $teacher_cats = array(
 'Class-Support' =>  array("Change Class Schedule","Pause Class (Vacation)","Resume Class","Upgrade/Downgrade Plan","Other"),
 'Billing' =>  array("Makeup Balance","Sponsorship Request","Cancel Class","Other"),
 'Portal' =>  array("Login Issue","Update account details","Report defect or bug","Request feature or enhancement"),
 'Complaints' => array("Family Frequent Cancellation","Internet Connectivity Issues","Request student transfer","Inappropriate Language","Other"));

  if(in_array('teacher', (array)$current_user->roles)){
  $cats = $teacher_cats;
  }elseif(in_array('parent', (array)$current_user->roles)){
  $cats = $parent_cats;
  }else{
  $cats = $parent_cats;
  }

    $cid = (int) $_GET['cid'];

    // get members
    $cid_members = '';
    $learner_sub_array = [];
    $sp_entry_id = getBBgroupGFentryID($cid);
    if( !empty($sp_entry_id) ):
        $learner_entry_id = getLearnersEntryID($sp_entry_id);
        if( !empty($learner_entry_id) ):
            $learners_list = getLearnersWPuserIds($learner_entry_id);
            if( !empty($learners_list) ):
                $learners_array = json_decode($learners_list);
                $learner_sub_array[] = $learners_array[0];
                $learner_sub_array[] = $learners_array[1];
                foreach ( $learner_sub_array as $learner ):
                    $learner_obj = get_user_by('id', (int) $learner );
                    if( !empty($learner_obj->data->display_name) ):
                        $cid_members .= substr($learner_obj->data->display_name, 0, 5) . '...';
                    endif;
                endforeach;
            else:
                $cid_members .= 'Error no learner list found for learner entry id: ' . $learner_entry_id . '-';
            endif;
        else:
            $cid_members .= 'Error no learner entry found for spentry: ' . $sp_entry_id . '-';
        endif;
    else:
        $cid_members .= 'Error no sp entry found for group: ' . $cid . '-';
    endif;
 ?>
<!-- google icon -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
<!-- bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<!-- classic Editor -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        /* media query */
        @media (max-width:992px){

    }
    @media (max-width:600px){
        .form-group.col-sm-12,.form-group.col-md-3,.form-group.col-lg-3{
            width:100%!important;
        }
        .add-ticket-page{
            max-width:95%;
            width:95%
        }
        .ticket-list a span {
                width:1rem!important;}
    }
    /* end media query */
   /* css style */
         body{
            font-family: var(--body-font)!important;
            font-size:var(--fs-300)!important;
           }
        .container{
            max-width: 100%!important;
         }
        .add-ticket-page{
            max-width:80%;
            width:80%
        }
        h1,h2{
            margin-bottom:0!important;
            color: var(--main-color)!important;
            font-family: var(--title-font)!important;
        }
         .add-ticket-top-section{
            display:flex;
            justify-content:space-between;
            align-items:center;
        }
         .add-ticket-dash-tittle h1{
            font-size: var(--fs-600);
            font-weight: 400;
            color: var(--main-color);
            line-height: 6vw;
            font-family: var(--title-font)!important;
          }
        .ticket-list a{
                display: flex;
                justify-content: center;
                align-items: center;
                color: var(--main-color);
                padding: 5px 10px;
                font-weight:300;
                font-size: var(--fs-300);
                height: var(--input-height);
                opacity: .8;
                transition:200ms linear;
            }
           .ticket-list a:hover{
                opacity: 1;
                color: var(--main-color);
            }
            .ticket-list a:hover span{
               transform: translateX(-1px);
            }
            .ticket-list a span{

                font-size: var(--fs-500);
                transition:200ms linear;
                width: 1.4rem;
            }
            /* form */
            .add-new-ticket-form label{
                color: var(--bs-gray)!important;
                font-size:var(--fs-400);
                font-weight:400;
            }
            .add-new-ticket-form input,.add-new-ticket-form select{
                border: none;
                border-radius: 0;
                box-shadow: 0 15px 10px -15px rgb(0 0 0 / 16%);
                height: var(--input-height);
            }


                .add-new-ticket-form .add-ticket-submit-button{
                background:var(--main-color)!important;
                border: none;
                border-radius: 0!important;
                box-shadow: 0 15px 10px -15px rgb(0 0 0 / 16%);
                color:#fff!important;
                font-size:var(--fs-400);
                font-weight:600;
                height: var(--input-height);
                display:flex;
                align-items:center;
                justify-content:center;
                padding: 0 var(--fs-400)!important;
            }
            /* hide inpout */
            .hidden-input{
                display: none;
            }
            /* editor */
            .add-new-ticket-form .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused),.ck-rounded-corners .ck.ck-editor__top .ck-sticky-panel .ck-toolbar, .ck.ck-editor__top .ck-sticky-panel .ck-toolbar.ck-rounded-corners{
                border: none;
                border-radius: 0;
                box-shadow: 0 15px 10px -15px rgb(0 0 0 / 16%);
            }
            .add-new-ticket-form .ck-rounded-corners .ck.ck-editor__top .ck-sticky-panel .ck-toolbar{ background:var(--main-color)!important;}
            .add-new-ticket-form .ck.ck-icon,.add-new-ticket-form .ck.ck-icon *,.add-new-ticket-form .ck.ck-dropdown.ck-heading-dropdown .ck-dropdown__button .ck-button__label{
                color:white!important;
                font-size:var(--fs-200)
            }
            .add-new-ticket-form .ck.ck-icon:hover, .add-new-ticket-form .ck.ck-icon:hover *,.add-new-ticket-form .ck.ck-dropdown.ck-heading-dropdown .ck-dropdown__button .ck-button__label:hover{
                color:var(--main-color)!important;
            }
            .add-new-ticket-form .ck.ck-toolbar.ck-toolbar_grouping>.ck-toolbar__items{
                background:var(--main-color)!important;
                height: var(--input-height);
            }
            .add-new-ticket-form [dir=ltr] .ck.ck-dropdown .ck-button.ck-dropdown__button:not(.ck-button_with-text){
                display:none!important;
            }
            /* end editor style */
            /* add file custom style */
            .add-file-label{
                position: relative;
            }
            .add-file-label input{
             position: absolute;
             top:0;
             left:0;
             height: var(--input-height);
            }
            .add-file-label .add-file{
                position: absolute;
                top: 0px;
                left: 0;
                cursor: pointer;
                width: 5vw;
                white-space: nowrap;
               display: flex;
               justify-content: center;
               align-items: center;}
            .add-file-label .add-file span{
                color: var(--main-color)!important;
                font-size:var(--fs-500);
               }
            .add-new-ticket-form  input[type=file]{
             width: fit-content;
             border: none;
             padding: 0;
             background: transparent;
             box-shadow: none;
             display: inline-block;
             padding-left: 4vw;
             box-sizing: border-box;}
            .add-file-label p{
                font-size:var(--fs-200);
                margin-top: calc(var(--input-height) + 2px);
            }
            .add-new-ticket-form input[type=file]::file-selector-button {
                opacity: 0;
                width: 100px;
                }
            .add-new-ticket-form   input[type=file],input[type=date]{
                color: var(--bs-gray)!important;
                font-size:var(--fs-300);
            }
        input.form-control[readonly] {
                 cursor: not-allowed;
            }
        /* placeholder style */
        .add-new-ticket-form ::-webkit-input-placeholder,input.form-control[readonly] { /* Edge */
            color: var(--bs-gray)!important;
            font-size:var(--fs-300)!important;
        }
        .add-new-ticket-form :-ms-input-placeholder { /* Internet Explorer */
            color: var(--bs-gray)!important;
            font-size:var(--fs-300);
        }
        .add-new-ticket-form ::placeholder ,.add-new-ticket-form select{
            color: var(--bs-gray)!important;
            font-size:var(--fs-300);
        }

.ck-placeholder{height: 100px;}
 .ck-file-dialog-button{display: none!important;}



</style>
<?php  /* template name: new ticket */ ?>
<?php get_header();?>

<div class="container-fluid my-3  add-ticket-page">
     <!-- ticket header cntrls -->
     <div class="add-ticket-top-section">
         <div class="add-ticket-dash-tittle">
              <h1>Create New Ticket</h1>
        </div>
        <div class="tickets-ctrls">
             <div class="ticket-list">
                  <a href="<?php echo site_url('tickets') ?>" class="link_loader">
                      <span class="material-icons">arrow_backward_ios</span>
                      Tickets List
                    </a>

             </div>
        </div>
    </div><!--end ticket header cntrls -->

    <!-- add ticket form -->
    <div class="row">
    <form class="add-new-ticket-form" action="" method="post" enctype="multipart/form-data">

        <div class="form-row">
             <!-- Name -->
           <div class="form-group col-md-6">
                <label for="inputName">Name</label>
                <input type="text" class="form-control" id="inputName" readonly value="<?php echo $current_user->user_login ?>">
           </div>
            <!-- Email -->
             <div class="form-group col-md-6">
                  <label for="inputEmail">Email</label>
                  <input type="email" class="form-control" id="inputEmail" readonly value="<?php echo $email ?>">
            </div>
        </div>
        <!-- form row -->
        <div class="form-row">
             <div class="form-group col-sm-12 col-lg-3 col-md-3 ">
                  <label for="inputCategory">Category</label>
                  <select id="inputCategory" class="form-control select-category prnt_cat" name="prnt_cat">
                         <option readonly selected>Choose...</option>
                         <?php foreach ($cats as $key => $value) : ?>
                         <option value="<?php echo $key ?>" class="catergory-option"><?php echo $key ?></option>
                         <?php endforeach; ?>
                 </select>
             </div>
             <div class="form-group col-sm-12 col-lg-3 col-md-3">
                  <label for="inputCategory">Sub Category</label>
                  <select id="inputCategory" class="form-control sub_cat" name="sub_cat">
                         <option selected>Choose...</option>
                         <?php foreach ($cats as $key => $sub) :
                               foreach ($sub as $indx =>$val ) : ?>
                         <option value="<?php echo $val ?>" style="display:none" class="catergory-option" parent="<?php echo $key; ?>" date="<?php echo $indx; ?>"><?php echo $val ?></option>
                         <?php endforeach; endforeach; ?>
                 </select>
             </div>
             <div class="form-group col-sm-12 col-lg-3 col-md-3">
                  <label for="inputCategory" class="eff_date" style="display:none">Effective On</label>
                  <input type="text" placeholder="dd-mm-yyyy" class="inp_date form-control eff_date fff_date" style="display:none" name="effective_date" >
             </div>
             <div class="form-group col-sm-12 col-lg-3 col-md-3">
                  <label for="inputCategory" class="res_on" style="display:none">Resume Class On</label>
                  <input type="text" placeholder="dd-mm-yyyy" class="inp_date form-control res_on" name="resume_date" style="display:none">
             </div>
        </div>

         <div class="form-row">
             <?php if( checkIfParent( get_current_user_id() ) ): // if parent show learners list?>
             <div class="form-group col-md-6">
                  <label for="inputCategory">Learner</label>
                 <?php
                     $wp_user_id = get_current_user_id();
                     $parent_childs = getParentChilds($wp_user_id);
                     $parent_childs[] = $wp_user_id;

                     //get learners
                    $sp_entry_id = getBBgroupGFentryID($cid);
                    if( !empty($sp_entry_id) ):
                        $learner_entry_id = getLearnersEntryID($sp_entry_id);
                        if( !empty($learner_entry_id) ):
                            $learners_list = getLearnersWPuserIds($learner_entry_id);
                            if( !empty($learners_list) ):
                                $learners_array = json_decode($learners_list);
                                foreach ( $learners_array as $learner ):
                                    $learner_array[] = (int) $learner;
                                endforeach;
                            else:
                                $members .= 'Error no learner list found for learner entry id: ' . $learner_entry_id . '-';
                            endif;
                        else:
                            $members .= 'Error no learner entry found for spentry: ' . $sp_entry_id . '-';
                        endif;
                    else:
                        $members .= 'Error no sp entry found for group: ' . $staff_group . '-';
                    endif;

                 if( count($learner_array) === 1 ):
                    $selected = 'selected';
                    $disabled = 'disabled';
                 else:
                    $selected = '';
                    $disabled = '';
                 endif;

                 ?>
                  <select id="inputCategory" class="form-control learner_sel" name="learner_sel" <?php echo $disabled; ?> >
                      <option selected disabled>Choose...</option>
                      <?php if(!empty($parent_childs)): ?>
                        <?php

                          foreach ( $parent_childs as &$child_id ):
                            if( !empty($learner_array) ):
                                if( in_array( (int) $child_id, $learner_array ) ):
                                    $child_hidden = '';
                                else:
                                    $child_hidden = 'hidden';
                                endif;

                            endif;

                            if( $child_hidden !== 'hidden' ):
                          ?>
                          <option value="<?php echo getCustomerFullName($child_id); ?>" data-child-user-id="<?php echo $child_id; ?>" <?php echo $selected; ?> > <?php echo getCustomerFullName($child_id); ?> </option>
                        <?php
                            endif;
                        endforeach; ?>
                      <?php endif; ?>
                 </select>
             </div>
             <?php endif; ?>
             <!-- sub Category -->

             <?php if( function_exists('checkIfBooklyStaff') && checkIfBooklyStaff(get_current_user_id())):
                $staff_classes = '';
                $staff_id = getStaffId( get_current_user_id() );
                $staff_groups = getStaffBBGroups($staff_id);
                if( !empty($staff_groups) ):
                    foreach ( $staff_groups as &$staff_group ):
                        $group_obj = groups_get_group($staff_group);
                        $group_name = bp_get_group_name($group_obj);
                        // get members
                        $members = '';
                        $learner_sub_array = [];
                        $sp_entry_id = getBBgroupGFentryID($staff_group);
                        if( !empty($sp_entry_id) ):
                            $learner_entry_id = getLearnersEntryID($sp_entry_id);
                            if( !empty($learner_entry_id) ):
                                $learners_list = getLearnersWPuserIds($learner_entry_id);
                                if( !empty($learners_list) ):
                                    $learners_array = json_decode($learners_list);
                                    $learner_sub_array[] = $learners_array[0];
                                    $learner_sub_array[] = $learners_array[1];
                                    foreach ( $learner_sub_array as $learner ):
                                        $learner_obj = get_user_by('id', (int) $learner );
                                        if( !empty($learner_obj->data->display_name) ):
                                            $members .= substr($learner_obj->data->display_name, 0, 5) . '...';
                                        endif;
                                    endforeach;
                                else:
                                    $members .= 'Error no learner list found for learner entry id: ' . $learner_entry_id . '-';
                                endif;
                            else:
                                $members .= 'Error no learner entry found for spentry: ' . $sp_entry_id . '-';
                            endif;
                        else:
                            $members .= 'Error no sp entry found for group: ' . $staff_group . '-';
                        endif;

                        if( !empty($cid) ):
                            if( (int) $cid === (int) $staff_group ):
                                $selected = 'selected';
                            else:
                                $selected = '';
                            endif;
                        endif;

                        $staff_classes .= "<option value='{$group_name}' $selected> $members / $group_name </option>";
                    endforeach;
                endif;
             endif;

            if( !empty($cid) ):
                $disabled = 'disabled';
                $group_obj = groups_get_group($cid);
                $group_name = bp_get_group_name($group_obj);
                $staff_classes = "<option value='{$group_name}' selected> $cid_members / $group_name </option>";;
            else:
                $disabled = '';
            endif;
             ?>
             <div class="form-group col-md-6">
                  <label for="inputCategory">Class</label>
                  <select id="inputCategory" class="form-control class_sel" name="class_sel" <?php echo $disabled; ?> >
                        <?php echo $staff_classes; ?>
                 </select>
             </div>
        </div>
       <div class="form-group ticket-description">
            <label for="inputCity">Notes</label>
            <textarea class="editor" placeholder="Add your notes here..." name="reply_txt"></textarea>
        </div>
        <div class="form-group ">
            <label class="add-file-label">
                 <input type="file" class="add-file-inpt" name="ticket_files[]" accept=".pdf,.jpeg,.jpg,.png,.doc,.docx,.xlsx,.tif,.tiff,.bmp" multiple>
                 <span class="add-file">
                 <span class="material-icons">attach_file</span>
                     Attach files
                 </span>
                 <p style="">(maximum 3 files,allowed formats pdf, jpeg, jpg, png, doc, docx, xlsx, tif, tiff, bmp)</p>
            </label>

       </div>
         <button type="submit" name="ticket_submit" value="1" class="btn add-ticket-submit-button mt-3 ml-auto mr-0">Submit</button>
      </form>
   </div>
</div>



<!-- boostrap4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- js code -->
<script>
    // sub category
    jQuery(document).on('change','.prnt_cat',function(){
        jQuery('.sub_cat').prop('selectedIndex',0);
        const vv = this.value;
        jQuery(".sub_cat option").css('display','none');
        jQuery(".sub_cat option[parent="+vv+"]").css('display','block');
        $('.eff_date').fadeOut();$('input.eff_date').val('');
        $('.res_on').fadeOut();$('input.res_on').val('');
    });

    jQuery(document).on('change','.sub_cat',function(){
        const vv = $('option:selected', this).attr('date');
       if(vv === "one" || vv === "one2" || vv ===  "f"){
         $('.eff_date').fadeIn();$('.res_on').fadeOut();
       }else if (vv === "two") {
         $('.eff_date').fadeIn();$('.res_on').fadeIn();
       }else{
         $('.eff_date').fadeOut();$('input.eff_date').val('');
         $('.res_on').fadeOut();$('input.res_on').val('');
       }
    });


    jQuery(".add-file-inpt").change(function(){
       var $fileUpload = jQuery(this);
        $('.red_p').hide();
        if (parseInt($fileUpload.get(0).files.length)>3){
         $( ".add-file-label" ).append('<p class="red_p" style="font-size: 10px;color:red">You can only upload a maximum of 3 files</p>');
         $fileUpload.val('');
        }
    });

    // editor
    ClassicEditor.create( document.querySelector( '.editor' ) )
        .then( editor => {console.log( editor );} ).catch( error => {                                       console.error( error );} );


        (function($){
          $('.fff_date').datepicker({
            autoclose: true,
            todayBtn: "linked",
            clearBtn: true,
            format: "dd-mm-yyyy",
            startDate: '+2d',
          });
          $('.res_on').datepicker({
            autoclose: true,
            todayBtn: "linked",
            clearBtn: true,
            format: "dd-mm-yyyy",
            startDate: '+9d',
            endDate: '+32d',
          });

        })(jQuery);

</script>


<?php get_footer();?>
