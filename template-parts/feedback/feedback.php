<?php
$admin_roles = ["tech_admin","administrator", "head_of_pd",  "support", "hr", "head_of_support", "head_of_education"];
$user_meta = get_userdata(get_current_user_id());
 $args = array(
    'role__in'    => [ 'teacher', 'team_leader' ],
    'orderby' => 'user_nicename',
    'order'   => 'ASC'
);
$techers = get_users( $args );
  ?>
<br><br>
<div class="sel_container">
  <label for="">Select a teacher...</label>
  <select class="ch_teacher" name="">
      <option value="" selected disabled>Choose teacher...</option>
    <?php  if( array_intersect($admin_roles, $user_meta->roles ) ) : ?>
    <?php foreach ($techers as $techer):?>
     <option data-id="<?php echo $techer->ID ?>" value="<?php echo $techer->user_email ?>">
      <?php echo $techer->display_name ?>
    </option>
  <?php endforeach; ?>
<?php elseif ( in_array( 'team_leader', (array) $user_meta->roles ) ):
    $teachers = get_team_teachers(get_current_user_id()); ?>
      <option value="" selected disabled>---</option>
  <?php foreach ($teachers as $teacher): $t_user = get_user_by( 'email', $teacher['email'] ); if($t_user->ID):?>
      <option value="<?php echo $t_user->ID ?>"><?php $t_user->display_name ?></option>
    <?php endif; endforeach; ?>
  <?php elseif ( in_array( 'teacher', (array) $user->roles ) ): ?>
  <option value="<?php echo $ser_meta->ID ?>" selected><?php echo $user_meta->display_name ?></option>
<?php endif; ?>
  </select>
</div>
<?php echo do_shortcode( '[gravityform id="39" title="false" description="false" ajax="true"]' ); ?>

<input type="hidden" name="AC_Teaching_Methods" value="">
<input type="hidden" name="AC_TM_Class_Preparation" value="">
<input type="hidden" name="AC_Presentation_Material" value="">
<input type="hidden" name="AC_Quranic_Arabic" value="">
<input type="hidden" name="AC_Tajweed" value="">
<input type="hidden" name="AC_Arabic_Language" value="">
<input type="hidden" name="AC_Islamic_Studies" value="">

<input type="hidden" name="SS_Student_Engagement" value="">
<input type="hidden" name="SS_IceBreak" value="">
<input type="hidden" name="SS_Games" value="">
<input type="hidden" name="SS_Friendly_Atmosphere" value="">
<input type="hidden" name="SS_Kids_Friendly" value="">
<input type="hidden" name="SS_Teaching_Adults" value="">
<input type="hidden" name="SS_Teaching_DL" value="">
<input type="hidden" name="SS_Teaching_HTM" value="">
<input type="hidden" name="SS_Teaching_TM" value="">


<input type="hidden" name="NAC_Class_Professionalism" value="">
<input type="hidden" name="NAC_WeeklyMeeting" value="">
<input type="hidden" name="NAC_QuiteWorkplace" value="">
<input type="hidden" name="NAC_Punctuality" value="">
<input type="hidden" name="NAC_Responsiveness" value="">
<input type="hidden" name="NAC_Camera" value="">
<input type="hidden" name="NAC_Internet" value="">
<input type="hidden" name="NAC_MSLM_VBG" value="">


<input type="hidden" name="SS_English_Communication" value="">
<input type="hidden" name="SS_English_Pronounciation" value="">
<input type="hidden" name="SS_English_Listening" value="">
<input type="hidden" name="SS_English_Vocabs" value="">
<input type="hidden" name="SS_English_Grammar" value="">

</div>

<script type="text/javascript">

(function($){

  $(document).ready(function () {

$('input[name="input_30"]').val('<?php echo $user_meta->user_email; ?>') ;
$('input[name="input_20"]').attr('readonly',true) ;
$('input[name="input_30"]').attr('readonly',true) ;


    $(document).on('change','.ch_teacher',function(e){
      const teacher = this.value;
        $('input[name="input_20"]').val(teacher) ;
      });

    $(document).on('gform_confirmation_loaded', function(event, formId){


        $('body').append('<div class="ajax_image_section"><div class="ajaxloader"></div></div>');

        $.post('/wp-admin/admin-ajax.php', {
               action: 'update_teacher_periodic_assessment',
               'TID': $('.ch_teacher').find(':selected').attr('data-id'),
               'AC_Teaching_Methods':$('input[name="AC_Teaching_Methods"]').val(),
               'AC_TM_Class_Preparation': $('input[name="AC_TM_Class_Preparation"]').val(),
               'AC_Presentation_Material': $('input[name="AC_Presentation_Material"]').val(),
               'AC_Quranic_Arabic': $('input[name="AC_Quranic_Arabic"]').val(),
               'AC_Tajweed': $('input[name="AC_Tajweed"]').val(),
               'AC_Arabic_Language': $('input[name="AC_Arabic_Language"]').val(),
               'AC_Islamic_Studies': $('input[name="AC_Islamic_Studies"]').val(),

               'SS_Student_Engagement': $('input[name="SS_Student_Engagement"]').val(),
               'SS_IceBreak': $('input[name="SS_IceBreak"]').val(),
               'SS_Games': $('input[name="SS_Games"]').val(),
               'SS_Friendly_Atmosphere': $('input[name="SS_Friendly_Atmosphere"]').val(),
               'SS_Kids_Friendly': $('input[name="SS_Kids_Friendly"]').val(),
               'SS_Teaching_Adults': $('input[name="SS_Teaching_Adults"]').val(),
               'SS_Teaching_DL': $('input[name="SS_Teaching_DL"]').val(),
               'SS_Friendly_Atmosphere': $('input[name="SS_Friendly_Atmosphere"]').val(),
               'SS_Teaching_HTM': $('input[name="SS_Teaching_HTM"]').val(),
               'SS_Teaching_TM': $('input[name="SS_Teaching_TM"]').val(),

               'NAC_Class_Professionalism': $('input[name="NAC_Class_Professionalism"]').val(),
               'NAC_WeeklyMeeting': $('input[name="NAC_WeeklyMeeting"]').val(),
               'NAC_QuiteWorkplace': $('input[name="NAC_QuiteWorkplace"]').val(),
               'NAC_Punctuality': $('input[name="NAC_Punctuality"]').val(),
               'NAC_Responsiveness': $('input[name="NAC_Responsiveness"]').val(),
               'NAC_Camera': $('input[name="NAC_Camera"]').val(),
               'NAC_Internet': $('input[name="NAC_Internet"]').val(),
               'NAC_MSLM_VBG': $('input[name="NAC_MSLM_VBG"]').val(),

               'SS_English_Communication': $('input[name="SS_English_Communication"]').val(),
               'SS_English_Pronounciation': $('input[name="SS_English_Pronounciation"]').val(),
               'SS_English_Listening': $('input[name="SS_English_Listening"]').val(),
               'SS_English_Vocabs': $('input[name="SS_English_Vocabs"]').val(),
               'SS_English_Grammar': $('input[name="SS_English_Grammar"]').val(),
                'notes':$('textarea[name="input_5"]').val(),
               }, function (response){
                   $('input[name="input_20"]').val($('.ch_teacher').find(':selected').val()) ;
                   $('input[name="input_30"]').val('<?php echo $user_meta->user_email; ?>') ;
                   $('.ajax_image_section').remove();
                   $.showInfo('Feedback Added Successfully.');
               })

    });
    $(document).on("click",".gform_button",function(e) {

    e.preventDefault();

   $('input[name="AC_Teaching_Methods"]').val($('input[name="input_11.1"]:checked').parent('td').attr('data-label'));
   $('input[name="AC_TM_Class_Preparation"]').val($('input[name="input_11.2"]:checked').parent('td').attr('data-label'));
   $('input[name="AC_Presentation_Material"]').val($('input[name="input_11.3"]:checked').parent('td').attr('data-label'));
   $('input[name="AC_Quranic_Arabic"]').val($('input[name="input_11.4"]:checked').parent('td').attr('data-label'));
   $('input[name="AC_Tajweed"]').val($('input[name="input_11.5"]:checked').parent('td').attr('data-label'));
   $('input[name="AC_Arabic_Language"]').val($('input[name="input_11.6"]:checked').parent('td').attr('data-label'));
   $('input[name="AC_Islamic_Studies"]').val($('input[name="input_11.7"]:checked').parent('td').attr('data-label'));

   $('input[name="SS_Student_Engagement"]').val($('input[name="input_35.1"]:checked').parent('td').attr('data-label'));
   $('input[name="SS_IceBreak"]').val($('input[name="input_35.2"]:checked').parent('td').attr('data-label'));
   $('input[name="SS_Games"]').val($('input[name="input_35.3"]:checked').parent('td').attr('data-label'));
   $('input[name="SS_Friendly_Atmosphere"]').val($('input[name="input_35.4"]:checked').parent('td').attr('data-label'));
   $('input[name="SS_Kids_Friendly"]').val($('input[name="input_35.5"]:checked').parent('td').attr('data-label'));
   $('input[name="SS_Teaching_Adults"]').val($('input[name="input_35.6"]:checked').parent('td').attr('data-label'));
   $('input[name="SS_Teaching_DL"]').val($('input[name="input_35.7"]:checked').parent('td').attr('data-label'));
   $('input[name="SS_Teaching_HTM"]').val($('input[name="input_35.8"]:checked').parent('td').attr('data-label'));
   $('input[name="SS_Teaching_TM"]').val($('input[name="input_35.9"]:checked').parent('td').attr('data-label'));

   $('input[name="NAC_WeeklyMeeting"]').val($('input[name="input_36.1"]:checked').parent('td').attr('data-label'));
   $('input[name="NAC_QuiteWorkplace"]').val($('input[name="input_36.2"]:checked').parent('td').attr('data-label'));
   $('input[name="NAC_Punctuality"]').val($('input[name="input_36.3"]:checked').parent('td').attr('data-label'));
   $('input[name="NAC_Responsiveness"]').val($('input[name="input_36.4"]:checked').parent('td').attr('data-label'));
   $('input[name="NAC_Camera"]').val($('input[name="input_36.5"]:checked').parent('td').attr('data-label'));
   $('input[name="NAC_Internet"]').val($('input[name="input_36.6"]:checked').parent('td').attr('data-label'));
   $('input[name="NAC_MSLM_VBG"]').val($('input[name="input_36.7"]:checked').parent('td').attr('data-label'));

   $('input[name="SS_English_Communication"]').val($('input[name="input_37.1"]:checked').parent('td').attr('data-label'));
   $('input[name="SS_English_Pronounciation"]').val($('input[name="input_37.2"]:checked').parent('td').attr('data-label'));
   $('input[name="SS_English_Listening"]').val($('input[name="input_37.3"]:checked').parent('td').attr('data-label'));
   $('input[name="SS_English_Vocabs"]').val($('input[name="input_37.4"]:checked').parent('td').attr('data-label'));
   $('input[name="SS_English_Grammar"]').val($('input[name="input_37.5"]:checked').parent('td').attr('data-label'));

   if( $(this).val() == "Click to confirm" ){
        $(this).closest('form').submit();
      }
        if($(this).val()=="Submit"){
          $(this).val("Click to confirm");
        }

   });
  });
})(jQuery);
</script>
