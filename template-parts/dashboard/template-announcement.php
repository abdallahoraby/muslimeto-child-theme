<?php

    $user = wp_get_current_user();
    $allowed_roles = array('mvsadmin');

    $staff_count   = get_users( [ 'role__in' => array('staff')   ] );
    $parent_count  = get_users( [ 'role__in' => array('parent')  ] );
    $teacher_count = get_users( [ 'role__in' => array('teacher') ] );


    $Trial = msl_get_contacts_by_tag( 380 )   ;
    $Active_Subscription= msl_get_contacts_by_tag( 256 )   ;
    $Overdue_Balance=msl_get_contacts_by_tag( 258 )   ;
    $All_Cancelled=msl_get_contacts_by_tag( 362 )   ;
    $Summer_Camp_Enrollees=msl_get_contacts_by_tag( 422 ) ;
    $School_Parents=msl_get_contacts_by_tag( 338 ) ;?>

<style>

.ck-editor__editable{height:112px!important}
.form-group .form-check-label{display:inline-block!important}

</style>

<div class="container">
   <h2><?php the_title() ?></h2>
   <?php if(isset($_POST['test-txt'])): ?>
   <div class="alert alert-success"> <?php echo $_POST['test-txt']; ?> </div>
   <?php endif; ?> <br>
   <form action="" method="post">
      <?php if(isset($_POST['success'])): ?>
      <div class="alert alert-success"> <?php echo $_POST['success']; ?> </div>
      <?php endif; ?>
      <div class="form-group">
         <label for="exampleInputEmail1">Notifications Type</label>
         <div class="form-check"><input class="form-check" type="checkbox" value="sms" name="type[]" id="defaultCheck1"><label class="form-check-label" for="defaultCheck1">SMS</label></div>
         <div class="form-check"><input class="form-check" type="checkbox" value="email" name="type[]" id="defaultCheck2"><label class="form-check-label" for="defaultCheck2">EMAIL</label></div>
         <div class="form-check"><input class="form-check" type="checkbox" value="portal" name="type[]" id="defaultCheck3" checked="checked"><label class="form-check-label" for="defaultCheck3">PORTAL/APP</label></div>
      </div>
      <hr>
      <?php if( current_user_can('administrator') ): ?>

        <?php if( !empty(BP_Groups_Group::get_id_from_slug('mvs')) ):
                $mvs_parent_group_id = BP_Groups_Group::get_id_from_slug('mvs');
              endif;?>
          <?php if( !empty($mvs_parent_group_id) && (bp_get_current_group_id() == $mvs_parent_group_id) ): ?>
           <div class="form-check" style="display:none"><input class="form-check" type="hidden" value="338" name="sub_prnt[]" id="School_Parents"><label class="form-check-label" for="School_Parents">School Parents (<?php echo count($School_Parents) ?>)</label></div>
         <?php else: ?>
      <div class="form-group">
         <label for="exampleInputEmail1">Send To</label>
         <div class="form-check"><input class="form-check parent_inp" type="checkbox" value="parent" name="send_to[]" id="defaultCheck4" checked="checked"><label class="form-check-label" for="defaultCheck4">Parents (<?php echo count($parent_count) ?>)</label></div>
         <div class="pp_stats" style="padding-left:17px">
            <div class="form-check"><input class="form-check" type="checkbox" value="380" name="sub_prnt[]" id="Trial"><label class="form-check-label" for="Trial">Trial (<?php echo count($Trial) ?>)</label></div>
            <div class="form-check"><input class="form-check" type="checkbox" value="256" name="sub_prnt[]" id="Active_Subscription"><label class="form-check-label" for="Active_Subscription">Active Subscription (<?php echo count($Active_Subscription) ?>)</label></div>
            <div class="form-check"><input class="form-check" type="checkbox" value="258" name="sub_prnt[]" id="Overdue_Balance"><label class="form-check-label" for="Overdue_Balance">Overdue Balance (<?php echo count($Overdue_Balance) ?>)</label></div>
            <div class="form-check"><input class="form-check" type="checkbox" value="362" name="sub_prnt[]" id="All_Cancelled"><label class="form-check-label" for="All_Cancelled">All Cancelled (<?php echo count($All_Cancelled) ?>)</label></div>
            <div class="form-check"><input class="form-check" type="checkbox" value="422" name="sub_prnt[]" id="Summer_Camp_Enrollees"><label class="form-check-label" for="Summer_Camp_Enrollees">Summer Camp Enrollees (<?php echo count($Summer_Camp_Enrollees) ?>)</label></div>
             <div class="form-check"><input class="form-check" type="checkbox" value="338" name="sub_prnt[]" id="School_Parents"><label class="form-check-label" for="School_Parents">School Parents (<?php echo count($School_Parents) ?>)</label></div>
         </div>
         <div class="form-check"><input class="form-check" type="checkbox" value="teacher" name="send_to[]" id="defaultCheck5"><label class="form-check-label" for="defaultCheck5">Teachers (<?php echo count($teacher_count) ?>)</label></div>
         <div class="form-check"><input class="form-check" type="checkbox" value="staff" name="send_to[]" id="defaultCheck6"><label class="form-check-label" for="defaultCheck6">Staff (<?php echo count($staff_count) ?>)</label></div>
      </div>
     <?php endif; ?>

      <?php elseif( array_intersect($allowed_roles, $user->roles ) ) :  ?>
        <input class="form-check" type="hidden" value="338" name="sub_prnt[]" id="School_Parents" />
      <?php endif; ?>
      <hr>
      <div class="form-group subject_div" style="display:none">
         <label for="Message">Subject</label><input class="form-control subject_inp" type="text" name="subject">
         <hr>
      </div>
      <div class="form-group">
         <label for="Message">Message</label>
         <textarea name="Message_announce" rows="8" cols="80" class="Message form-control"></textarea>
         <hr>
         <div class="form-check"><input type="checkbox" class="form-check" id="teest" checked="checked" name="test_mode" value="1"><label class="form-check-label" for="teest">Test Mode</label></div>
      </div>
      <hr>
      <br>
      <div class="form-group"><button type="submit" class="btn btn-primary">Send</button></div>
   </form>
</div>
<script src=https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js crossorigin=anonymous integrity=sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM></script>
<script src=https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js></script>
<script src=https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js></script>

<script>

(function($){{$(document).on("change","#defaultCheck2",function(){$(".subject_div").toggle(),$(".subject_inp").val("")}),ClassicEditor.create(document.querySelector(".Message"))} }(jQuery));

</script>
