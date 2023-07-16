<?php

//phpinfo();
// pre_dump(mail('himamohamed1991@gmail.com','test','sdss'));
// $all_staffs = $wpdb->get_results("SELECT DISTINCT mtg_host_email FROM msl_recordings");
// pre_dump($all_staffs);
     get_header();
//    $user = new WP_User( get_current_user_id() );
// // $user->remove_role( 'subscriber' );
//  $user->add_role( 'administrator' );
  //  wp_update_user( array( 'ID' => get_current_user_id(), 'role' => 'tech_admin' ) );


    ?>

<div class="form_add_teacher" style="padding:100px">

<?php echo do_shortcode( '[gravityform id="39"]' ); ?>

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

<?php  get_footer();?>

    <script type="text/javascript">

(function($){

  $(document).ready(function () {
    $('.gform_button').attr('type','button');
    $(document).on('gform_confirmation_loaded', function(event, formId){




        $('body').append('<div class="ajax_image_section"><div class="ajaxloader"></div></div>');
        var row = $('.media_tr.active').attr('data-row');
        $.post('<?php echo admin_url('admin-ajax.php'); ?>', {
               action: 'update_teacher_periodic_assessment',
               AC_Teaching_Methods:$('input[name="AC_Teaching_Methods"]').val(),
               AC_TM_Class_Preparation: $('input[name="AC_TM_Class_Preparation"]').val(),
               AC_Presentation_Material: $('input[name="AC_Presentation_Material"]').val(),
               AC_Quranic_Arabic: $('input[name="AC_Quranic_Arabic"]').val(),
               AC_Tajweed: $('input[name="AC_Tajweed"]').val(),
               AC_Arabic_Language: $('input[name="AC_Arabic_Language"]').val(),
               AC_Islamic_Studies: $('input[name="AC_Islamic_Studies"]').val(),

               SS_Student_Engagement: $('input[name="SS_Student_Engagement"]').val(),
               SS_IceBreak: $('input[name="SS_IceBreak"]').val(),
               SS_Games: $('input[name="SS_Games"]').val(),
               SS_Friendly_Atmosphere: $('input[name="SS_Friendly_Atmosphere"]').val(),
               SS_Kids_Friendly: $('input[name="SS_Kids_Friendly"]').val(),
               SS_Teaching_Adults: $('input[name="SS_Teaching_Adults"]').val(),
               SS_Teaching_DL: $('input[name="SS_Teaching_DL"]').val(),
               SS_Friendly_Atmosphere: $('input[name="SS_Friendly_Atmosphere"]').val(),
               SS_Teaching_HTM: $('input[name="SS_Teaching_HTM"]').val(),
               SS_Teaching_TM: $('input[name="SS_Teaching_TM"]').val(),

               NAC_Class_Professionalism: $('input[name="NAC_Class_Professionalism"]').val(),
               NAC_WeeklyMeeting: $('input[name="NAC_WeeklyMeeting"]').val(),
               NAC_QuiteWorkplace: $('input[name="NAC_QuiteWorkplace"]').val(),
               NAC_Punctuality: $('input[name="NAC_Punctuality"]').val(),
               NAC_Responsiveness: $('input[name="NAC_Responsiveness"]').val(),
               NAC_Camera: $('input[name="NAC_Camera"]').val(),
               NAC_Internet: $('input[name="NAC_Internet"]').val(),
               NAC_MSLM_VBG: $('input[name="NAC_MSLM_VBG"]').val(),

               SS_English_Communication: $('input[name="SS_English_Communication"]').val(),
               SS_English_Pronounciation: $('input[name="SS_English_Pronounciation"]').val(),
               SS_English_Listening: $('input[name="SS_English_Listening"]').val(),
               SS_English_Vocabs: $('input[name="SS_English_Vocabs"]').val(),
               SS_English_Grammar: $('input[name="SS_English_Grammar"]').val(),
               }, function (response){
                  $('.ajax_image_section').remove();
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
    <?php
//   echo do_shortcode('[gravityform id="33" ajax="true"
// $entry_id= 17367;
//
//   //grab the entry values via the GF API
//   $entry = GFAPI::get_entry($entry_id);
//
//   if ( is_wp_error( $entry ) ) {
//        echo "Error";
//   } else {
//
//     //list field, example how to unserialize
//     // $clist = maybe_unserialize($entry[2]);
//     // $cvalue = iterator_to_array(new RecursiveIteratorIterator(new RecursiveArrayIterator($clist)), FALSE);
//
//     //embed new form and populate the form with normal field and list field
//     gravity_form(1, false, false, false, array('normalfield1'=>$entry[1],'listfield2'=>$entry[2]), true);
//
//   }

// global $wpdb;
// $wpdb->update( 'msl_recordings', array( 'uploaded' => true ), array( 'id' => 6295 ) );
// $all_recs = $wpdb->get_results( "SELECT * FROM msl_recordings where uploaded = 1 ORDER BY id DESC LIMIT 50");
// $rec_id = 1024;
// $month = 9;
// $year = date('Y');
//  $teacher = 'alaa.mohamed@muslimeto.com';
//   $all_recs =  $wpdb->get_results( "SELECT * FROM msl_recordings WHERE MONTH(created_at) = $month AND YEAR(created_at) = $year AND mtg_host_email = '{$teacher}' AND rec_file_type = 'MP4' AND uploaded = 1 ORDER BY id DESC" );
// pre_dump(  $all_recs  );
// $entries_d = $wpdb->get_results( "SELECT * FROM msl_recordings where uploaded = 0 ORDER BY id DESC" , ARRAY_A );
// foreach ($entries_d as $value):
//   if($value['rec_file_size'] == $value['rec_aws_file_size']){
//       $wpdb->update( 'msl_recordings', array( 'uploaded' => true ), array( 'id' => $value['id']) );
//   }
// endforeach;
// global $wpdb;
// $all_h_mails = $wpdb->get_results("SELECT DISTINCT mtg_host_email FROM msl_recordings");
//
//    foreach($all_h_mails as $mail) {
//    $user = get_user_by( 'email', $mail->mtg_host_email );
//    if(isset($user->ID)){
//          $employee = new \WPHR\HR_MANAGER\HRM\Employee( $user->ID );
//          if ( $employee->get_reporting_to() && $employee->get_reporting_to()->ID == get_current_user_id() ){
//               $rep_emails[] = $mail->mtg_host_email;
//          }
//        }
//    }
// $wpdb->flush();
// $gender = get_user_meta(get_current_user_id() , 'gender' , 1);
// $niqab = get_user_meta(51,'niqab',true);
// if(!empty($rep_emails)){
//     $placeholders = array_fill(0, count($rep_emails), '%s');
//     $format = implode(', ', $placeholders);
//     $query = "SELECT * FROM msl_recordings WHERE mtg_host_email IN($format)";
//     $results = $wpdb->get_results( $wpdb->prepare($query,$rep_emails));
//     pre_dump($results) ;
//     $wpdb->flush();
// }
// $st = "2022-05-22";
// $en = "2022-05-30";
// $begin = new DateTime( $st );
// $end   = new DateTime( $en );
// $teacher_id = get_current_user_id();
// $staff_id = getStaffId( $teacher_id );
//
// $lrns = get_learners_by_teacher_id($teacher_id, $st , $en) ;
//
//  for($i = $begin; $i <= $end; $i->modify('+1 day'))  :
//    foreach ($lrns as $lrn) {
//        pre_dump( get_teacher_hour_with_learner2($staff_id, $i->format("Y-m-d") , $lrn['id'], $cid=null) );
//    }
//
//  endfor;

// $frame = 100;
// $movie = 'https://lsm-portal-dev.s3.us-east-2.amazonaws.com/msl_mp4_631f9fdf360a1.mp4';
// $thumbnail = 'thumbnail.png';
//
// $mov = new ffmpeg_movie($movie);
// $frame = $mov->getFrame($frame);
// if ($frame) {
//     $gd_image = $frame->toGDImage();
//     if ($gd_image) {
//         imagepng($gd_image, $thumbnail);
//         imagedestroy($gd_image);
//         echo '<img src="'.$thumbnail.'">';
//     }
// }
//echo get_zoom_token_from_portal();
// $tracking_fields = get_meeting_tracking_fields((83310300167));
// $fields = $tracking_fields->tracking_fields;
//  $class_id = $fields[0]->value ;
//  $class_type = $fields[1]->value ;
//   echo $class_id;
 // $activity_args = array(
 //         'content' => '<video width="100%" controls>
 //                           <source src="https://lsm-portal-dev.s3.us-east-2.amazonaws.com/msl_mp4_631f9fdf360a1.mp4" type="video/mp4">
 //                         </video>',
 //         'group_id' => 2411,
 //         'user_id' => 398
 //     );
 //     groups_post_update($activity_args);
//  $act_id =  bp_activity_add(array(
//   // 'group_id'=> 29,
//   'component'=>'media',
//   'type'=>'activity_update',
//   'content' => '<div class="video_d_w"><strong>New recording added</strong><br><br><a class="rec_aws_file" href="https://lsm-portal-dev.s3.us-east-2.amazonaws.com/msl_mp4_631f9fdf360a1.mp4">Click here to open video.</a><br></div>' ,
//   'user_id' => $user->ID,
// ));

//  groups_post_update(array(
//  'group_id'=> $bb_group_id,
//  'content' => '<div class="video_d_w"><strong>New recording added</strong><br><br><a class="aws_file" href="https://lsm-portal-dev.s3.us-east-2.amazonaws.com/msl_mp4_631f9fdf360a1.mp4">Click here to open video.</a><br></div>' ,
//  'user_id' => $user->ID,
// ));


 //echo bp_is_active( 'notifications' );
//echo get_zoom_token_from_portal();


// bp_notifications_add_notification( array(
//     'user_id'           => get_current_user_id(),
//     'component_name'    => 'gamipress_buddyboss_notifications',
//     'item_id'           => 1878,
//     'component_action'  => 'test message',
//     'date_notified'     => bp_core_current_time(),
//     'is_new'            => 1,
//     'allow_duplicate'   => true,
// ));
// $new_code =  'prnt-' . rand(111111111,9999999999) . '_uid_' . 350;
// // delete_user_meta( 350 ,'account_code' ) ;
//  pre_dump( get_tags_from_keap(399) );
//echo get_tags_from_keap(399);
//
// if(get_user_meta(350 ,'memb_ReferralCode', true)){
//
//    $old_code = get_user_meta(350 ,'memb_ReferralCode', true);
//    update_user_meta(350 ,'account_code', $old_code);
//
// }
// var_dump(add_user_meta(350 ,'account_code','test3'));
//delete_user_meta( 350, 'account_code' );
//var_dump(update_user_meta(350 ,'account_code', 'test2'));

// update_metadata( 'user', 350, 'account_code', 'test2' );
// var_dump(  get_user_meta(350,'account_code', 0  ));

// $user_info = get_userdata( get_current_user_id() );
// pre_dump((array)$user_info->roles);
// $multiCurl = array();
// $result = array();
// $never_signedup=array();
// $trailings= array();
// $stages = ['30','22','24','26','20'];
// $authorization = "Authorization: Bearer ".get_token_from_dev();
// $mh = curl_multi_init();
// for ($i=0; $i < count($stages); $i++){
//   $fetchURL = 'https://api.infusionsoft.com/crm/rest/v1/opportunities?stage_id='.$stages[$i];
//   $multiCurl[$i] = curl_init();
//   curl_setopt($multiCurl[$i], CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
//   curl_setopt($multiCurl[$i], CURLOPT_URL,$fetchURL);
//   curl_setopt($multiCurl[$i], CURLOPT_HEADER,0);
//   curl_setopt($multiCurl[$i], CURLOPT_RETURNTRANSFER,1);
//   curl_multi_add_handle($mh, $multiCurl[$i]);
// }
// $index=null;
// do {
//   curl_multi_exec($mh,$index);
//   curl_multi_select($mh);
// } while($index > 0);
// foreach($multiCurl as $k => $ch) {
//   $result[$k] = json_decode(curl_multi_getcontent($ch));
//   if(isset($result[$k]->opportunities)){
//     if($k < 4){
//       $contacts = array_column( array_column($result[$k]->opportunities,'contact'), 'id');
//       array_push($trailings,...$contacts);
//     }elseif($k == 4){
//       $never_signedup = array_column( array_column($result[$k]->opportunities,'contact'), 'id');
//     }
//
//   }
//   curl_multi_remove_handle($mh, $ch);
// }
// curl_multi_close($mh);
//
// pre_dump($trailings);
//
//
//
//
//











// $token = get_token_from_dev();
// $ch = curl_init();
// $authorization = "Authorization: Bearer ".$token;
// $options = [
//     CURLOPT_SSL_VERIFYPEER => true,
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_URL            =>  "https://api.infusionsoft.com/crm/rest/v1/contacts/19724?optional_properties=custom_fields"
// ];
// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
// curl_setopt_array($ch, $options);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// $data_bef = curl_exec($ch);
// $data = json_decode($data_bef);
// curl_close($ch);
//
// $custom_idz = array_column( $data->custom_fields, 'id' ) ;
// $custom_contacts = array_column( $data->custom_fields, 'content' ) ;
// $custom_indx =  array_search(132,$custom_idz);
// $custom_val = $custom_contacts[$custom_indx];
// echo $custom_val;
// require WP_CONTENT_DIR. '/aws/vendor/autoload.php' ;
// $credentials = new Aws\Credentials\Credentials('AKIA4DQNIFQUMJO6SY6C', 'PQoVSMckfGCD3zHBdOTZrDGjT+4zIwTJPZOZ9rqX');
//
// $s3 = new Aws\S3\S3Client([
//     'version'     => 'latest',
//     'region'      => 'us-east-2',
//     'credentials' => $credentials
// ]);
// //pre_dump(get_parent_stats_from_keap(399));
// //$token = get_zoom_token_from_portal();
//
//
// $obj_data = $s3->headObject([
//   'Bucket' => 'lsm-portal-dev',
//  'Key'    => 'test-video3.mp4',
// ]);
// echo 'Size is: '.$obj_data['ContentLength'] / 1024 /1024;
//   $d_file = 'https://muslimeto.zoom.us/rec/webhook_download/RPUKxcpAR_OGtqTc8o8eA4ZRDPx2m0HU2fYsz7w1kBFsgPkfnF-JfUG5V45zEtZfJ-QrcfaZzjwtit-p.rY2_p7ak8zX9TRBk/3-ymbr5axbzY_4DdNIqko87RN1Q7WTc8YFqc_Qp6hCshRSQm0T7wtGGK175MfBw.A5UzIFvuMRk-RcIN?access_token=eyJhbGciOiJIUzUxMiJ9.eyJpc3MiOiJodHRwczovL2V2ZW50Lnpvb20udXMiLCJhY2NvdW50SWQiOiIxWVFiS3VZWFJ2SzJZM0trd245OHJRIiwiYXVkIjoiaHR0cHM6Ly9vYXV0aC56b29tLnVzIiwibWlkIjoiVm1xc2t3VU5RVGVUdWxaMDlnMXByZz09IiwiZXhwIjoxNjYyOTc2ODEzLCJ1c2VySWQiOiJxQmpPQ2h2dFFKV3ZzRlRZamlOeEtnIn0.oweIhD5tNCtFcW6Y7duNjJHsLH8cwwYu4XPk7ql4FMHzR7vLD_YfFZbkt247-QnoXLnpJJlsrBG17_A-6Jp-ww' ;
// //
//  $tmpfile = tempnam(sys_get_temp_dir(), uniqid());
//  $url = $d_file;
//  $ch = curl_init($url);
//  $fp = fopen((string)$tmpfile, 'r+');
//  curl_setopt($ch, CURLOPT_FILE, $fp);
//  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//  curl_exec($ch);
 // $s3 = S3Client::factory(array(
 //     'credentials' => array(
 //     'key' => 'AKIA4DQNIFQUMJO6SY6C',
 //     'secret'  => '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',
 //     ),
 //     'region'  => 'us-east-2',
 //     'version' => 'latest',
 // ));

//echo $s3->getObjectUrl("lsm-portal-dev", "test-video2.mp4");
     // $result = $s3->putObject(array(
     //     'Bucket' => 'lsm-portal-dev',
     //     'Key'    => 'test-video3.mp4',
     //     'Body' => fopen((string)$tmpfile, 'r+'),
     //     'ACL' => 'public-read'
     // ));
     // echo "<pre>";
     // var_dump($result);
     // echo "</pre>";
// $sp = fopen($w_url, 'r');
// $op = fopen($myfile, 'w');
// while (!feof($sp)) {
//    $buffer = fread($sp, 8192);  // use a buffer of 512 bytes
//    fwrite($op, $buffer);
// }
// fwrite($op, $new_data);
// fclose($op);
// fclose($sp);
//

//
// if(isset($_FILES['image'])):
// $token = get_zoom_token_from_portal();
//   $fileName = $_FILES['image']['name'];
//   $tempFilePath = $_FILES['image']['tmp_name'];

  //
  // $s3 = S3Client::factory(array(
  //     'credentials' => array(
  //     'key' => 'AKIA4DQNIFQUMJO6SY6C',
  //     'secret'  => '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',
  //     ),
  //     'region'  => 'us-east-2',
  //     'version' => 'latest',
  // ));
  //
  // try {
  //
  //   $result = $s3->create_object('lsm-portal-dev', $filename, array(
  //   'body' => $binary, // put the binary in the body
  //   'contentType' => 'video/jpeg'
  //   ));
  //     // $result = $s3->putObject(array(
  //     //     'Bucket' => 'lsm-portal-dev',
  //     //     'Key'    => 'video1234',
  //     //     'SourceFile' =>$myfile,
  //     //     'ACL' => 'public-read'
  //     // ));
  //     echo "<pre>";
  //     var_dump($result);
  //     echo "</pre>";
  //
  // } catch (S3Exception $e) {
  //     echo "<pre>";
  //     echo $e->getMessage() . "<br>";
  //     echo "</pre>";
  // }

// endif;


//get_header();
// $apiUrl = 'https://zoom.us/oauth/token?grant_type=account_credentials&account_id=1YQbKuYXRvK2Y3Kkwn98rQ';
// $apiResponse = wp_remote_post( $apiUrl,
//     [
//         'method'    => 'POST',
//         'headers' => array(
//             'Authorization' => 'Basic ' . base64_encode( 'tGHzAgk9TGWq8INi2Ykhhw' . ':' . 'qucqXw6rGKdvTQpjmFJImTc13QwsWCGi' )
//         )
//     ]
// );
// $apiBody = json_decode( wp_remote_retrieve_body( $apiResponse ) );
// $response_code = wp_remote_retrieve_response_code( $apiResponse );
// //
//   update_option('zoom_access_token',$apiBody->access_token);
//   echo $apiBody->access_token;
// pre_dump(msl_create_zoom_meeting('info1@muslimeto.com','test from dev','ss','mm'));
 // $apiUrl = 'https://api.zoom.us/v2/users/principle@muslimeto.com/meetings';
 //
 // $apiResponse = wp_remote_post( $apiUrl,
 //    array(
 //        "headers" => array(
 //                'Content-Type' => 'application/json',
 //                'Authorization' => "Bearer " .get_zoom_token_from_portal()
 //            ),
 //         "body"    => wp_json_encode(array(
 //          		   "type"=> 3,
 //                 "topic"=> "new test meeting",
 //                 "tracking_fields" => array(
 //                    ["field"=>"class_type","value"=>"class type test"],
 //                    ["field"=>"class_id","value"=> 44]
 //                 )
	//                )),//wp_json_encode( $body ),
 //          )
 //        );
 // $apiBody = json_decode( wp_remote_retrieve_body( $apiResponse ) );


// get_footer();
//  $file = array();
//  $_FILES = array("upload_file" => $file);
// $attachment_id = media_handle_upload("upload_file", 0);
//get_header();
// $tags = wpf_get_tags( 399 );
// pre_dump($tags);
// 488	Unknown User
// 30   Trial Confirmed
// 22   Trial/Class Scheduled
// 24   Trial Missed
// 26   Trial Taken
// pre_dump($trailings);
//  wp_mail('himamohamed1991@gmail.com','zoom wbehook','body');
// global $wpdb;
// $table_name =  $wpdb->prefix . "bp_groups";
// $retrieve_data = $wpdb->get_results( "SELECT id FROM $table_name" );
//
// pre_dump($retrieve_data);
// $multiCurl = array();
// $result = array();
// $never_signedup= array();
// $trailings= array();
// $stages = ['30','22','24','26'];
// $authorization = "Authorization: Bearer ".get_token_from_dev();
// $mh = curl_multi_init();
// for ($i=0; $i < count($stages); $i++){
//   $fetchURL = 'https://api.infusionsoft.com/crm/rest/v1/opportunities?stage_id='.$stages[$i];
//   $multiCurl[$i] = curl_init();
//   curl_setopt($multiCurl[$i], CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
//   curl_setopt($multiCurl[$i], CURLOPT_URL,$fetchURL);
//   curl_setopt($multiCurl[$i], CURLOPT_HEADER,0);
//   curl_setopt($multiCurl[$i], CURLOPT_RETURNTRANSFER,1);
//   curl_multi_add_handle($mh, $multiCurl[$i]);
// }
// $index=null;
// do {
//   curl_multi_exec($mh,$index);
//   curl_multi_select($mh);
// } while($index > 0);
// foreach($multiCurl as $k => $ch) {
//   $result[$k] = json_decode(curl_multi_getcontent($ch));
//   if(isset($result[$k]->opportunities)){
//       $contacts = array_column( array_column($result[$k]->opportunities,'contact'), 'id');
//       array_push($trailings,...$contacts);
//
//   }
//   curl_multi_remove_handle($mh, $ch);
// }
// curl_multi_close($mh);
// pre_dump($trailings);
//
//  $trailings_tags_users = wpf_get_users_with_tag( 380 );
//  echo '--------';
// pre_dump($trailings_tags_users);

// $apiUrl = 'https://zoom.us/oauth/token?grant_type=account_credentials&account_id=1YQbKuYXRvK2Y3Kkwn98rQ';
// $apiResponse = wp_remote_post( $apiUrl,
//     [
//         'method'    => 'POST',
//         'headers' => array(
//             'Authorization' => 'Basic ' . base64_encode( 'tGHzAgk9TGWq8INi2Ykhhw' . ':' . 'qucqXw6rGKdvTQpjmFJImTc13QwsWCGi' )
//         )
//     ]
// );
// $apiBody = json_decode( wp_remote_retrieve_body( $apiResponse ) );
//  echo get_option('zoom_access_token');
// stage 20 490 else 488
//  foreach($trailings_tags_users as $trailings_tags_user){
//     $ContactId = wpf_get_contact_id($trailings_tags_user);
//     if($ContactId){
//         if( !in_array( $ContactId, $trailings ) && !in_array( $ContactId, $never_signedup )){
//           wp_fusion()->user->apply_tags( array(488), $trailings_tags_user );
//           wp_fusion()->user->remove_tags( array(380), $trailings_tags_user );
//         }elseif( !in_array( $ContactId, $trailings ) &&  in_array( $ContactId, $never_signedup) ){
//           wp_fusion()->user->apply_tags( array(490), $trailings_tags_user );
//           wp_fusion()->user->remove_tags( array(380), $trailings_tags_user );
//         }
//     }
// }
//pre_dump($trailings);
//  $new_quiz = [];
// update_field('new_quiz',$new_quiz,'user_'.get_current_user_id());
//get_footer();
?>
<?php
// pre_dump( $new_clases );
// function get_classes_end_dates( $class_id  ){
//   $sp_entry_id = getBBgroupGFentryID($class_id);
//   $schedules_entries = getScheduleEntryID($sp_entry_id);
//   $end_date = array();
//   foreach ( $schedules_entries as $schedules_entry_id ):
//       $end_date_meta = getGFentryMetaValue($schedules_entry_id, 8);
//       $end_date[$schedules_entry_id] = $end_date_meta[0]->meta_value;
//   endforeach;
//   return $end_date;
// }
// foreach ($classes as $value) {
//   pre_dump(get_classes_end_dates($value));
// }

 //pre_dump(getcustomerID(2982));
  // pre_dump(get_teacher_hour_with_learner2($staff_id, '2022-06-25' , 2982));


  // pre_dump(regenerateAppointmentsFor2Months(30));
 //pre_dump(wp_fusion()->user->apply_tags( array(380), 399 ));
  // $tags = wpf_get_tags( 399 );
  // pre_dump($tags);
//11650 zeniab  1-1-2022
//13172  last pay empty
//10488  9 - 03 - 2021


// $uid =  wpf_get_contact_id($parent_id);
 // echo get_token_from_dev();
//  pre_dump( get_parent_stats_from_keap( 399 ) );


// // Get all the user roles as an array.
// $user_roles = $user->roles;
// // getStaffBBGroups($staff_id);
// $dsd = getLearnerStaff(398);


// $teacher_id = get_current_user_id();
// $staff_id   = getStaffId( $teacher_id );
//
// $test = get_teacher_hour_with_learner( $staff_id, '2019-03-01', '2022-08-22' );

//pre_dump($test);
// $refresh = "PrXG87DJzdbgxbAebDGBX6oiJK3hATcS";
// $apiUrl      = 'https://api.infusionsoft.com/token';
// $apiResponse = wp_remote_post( $apiUrl, array(
//           'timeout' => 20,
//           'headers' => array(
//          'Authorization' => 'Basic ' . base64_encode( 'unHsVg1NVIemYTA45mihkzn18SIGv6rP:JUx8ucLjnGhJjtDg' ),
//           'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8',
//           ),
//         'body' => 'grant_type=refresh_token&refresh_token='.$refresh ,
//     ));
// $data = json_decode( wp_remote_retrieve_body( $apiResponse ) );
//pre_dump( $data );
      // $nonce = wp_create_nonce( 'keap_cron' );
      // echo wp_verify_nonce($nonce,'keap_cron');


// $url  = 'https://developer.wordpress.org/reference/functions/wp_remote_retrieve_body/';
// $body = wp_remote_get( esc_url_raw( $url ) )['body'];
// echo $body ;
// $active_accounts = wpf_get_users_with_tag( 256 );pre_dump($active_accounts);
//  global  $wpdb ;
 // $plugin_options =  $wpdb->get_results("SELECT option_name FROM {$wpdb->options} WHERE option_name LIKE '%sync_tags_batch%'");
// pre_dump( $plugin_options );
      // $sss = get_parent_stats_from_keap(399) ;
      //    pre_dump($sss );
 //echo get_current_user_id();
// if(isset($_FILES['filll'])):
//
//
//    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
//    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
//    require_once(ABSPATH . "wp-admin" . '/includes/media.php');
//
// $files = $_FILES["filll"];
//
//  $_FILES = array("upload_file" => $_FILES["filll"]);
//  $aid = media_handle_upload("upload_file", 0);
//  echo  $aid;
 // update_post_meta( 5772, 'bp_document_upload', true );
 // update_post_meta( 5772, 'bp_document_saved', '0' );

      //pre_dump($_FILES['filll']);
// endif;
//     pre_dump(bp_attachments_get_attachment('url', array('item_id' => 5753 ) ));
 //    $date2=date_create(date('Y-m-d'));
 //
 //   $date1=date_create($sss['get_last_payment_on']);
 //   $diff=date_diff($date1,$date2);
 //   $diff_date = abs($diff->format("%R%a"));
 //  echo $diff_date;
 // if($diff_date >= 20 && $diff_date < 60){ echo 'sdads';}
 // $email = new BP_Email();

  // update_post_meta( 5765, 'bp_document_upload', true );
  // update_post_meta( 5765, 'bp_document_saved', '0' );
 //

// bp_activity_update_meta( $act_id, 'bp_media_ids', '5709' );
// update_post_meta( $act_id, 'bp_media_ids', '5709' );

    // update_post_meta( 5825, 'bp_document_upload', true );
    // update_post_meta( 5825, 'bp_document_saved', '0' );
    //  $act_id =  bp_activity_add(array(
    //   'group_id'=> 29,
    //   'component'=>'media',
    //   'type'=>'activity_update',
    //   'content' => '<div class="aud_d_w"><strong>Learner upload new practice!</strong><br><br><a class="c_t_audio" href="https://mslmcomdev.wpengine.com/wp-content/uploads/bb_documents/2022/08/practice-1ee0-4.wav"> Click me to here practice.</a><br></div>' ,
    //   'user_id'=>bp_loggedin_user_id(),
    // ));

//     $args = array(
//          'blog_id'       => get_current_blog_id(),   // Blog ID.
//          'attachment_id' => 5830,                   // attachment id.
//          'user_id'       => get_current_user_id(),   // user_id of the uploader.
//          'activity_id'   =>  $act_id,                   // The ID of activity.
//          'privacy'       => 'public',
//           'item_id'
//        );
//         $d= bp_document_add( $args);
// echo $act_id;
//         $media = new BP_Document($d);
//         bp_activity_document_add( $media );
//         pre_dump($media);
    // $media->title   = 'practice-1ee0';
    //
    //  $media->save();
    //
    // update_post_meta( $media->attachment_id, 'bp_document_saved', true );
    // update_post_meta( $media->activity_id, 'bp_document_upload', true );
    // update_post_meta( $media->activity_id, 'bp_document_saved', '0' );
    // bp_activity_update_meta( $media->activity_id, 'bp_media_ids', '5827,' );
    // update_post_meta( $media->activity_id, 'bp_media_ids', '5827,' );

  // pre_dump($media);
  // echo bp_get_attachment_document_id(5761) .'<br>';
  // echo bp_document_get_preview_audio_url(5, 5761, 'wav' ) .'<br>';
  // echo bp_document_generate_document_previews( 5761 ).'<br>';
  // echo bp_document_get_thread_id(5);
  //
  //
  // $media->blog_id       = false;
  //
  // $media->user_id       = get_current_user_id();
  // $media->title         = 'test';
  // $media->group_id      = 29;
  // //$media->activity_id   = $act_id;
  // $media->privacy       = "grouponly";

  // $media->menu_order    = $r['menu_order'];
  // $media->date_created  = $r['date_created'];
  // $media->error_type    = $r['error_type'];
//
//   // groups media always have privacy to grouponly
//   if ( ! empty( $media->group_id ) ) {
//       $media->privacy = 'grouponly';
//   }
           // if ( ! empty( $media->group_id ) && bp_is_active( 'groups' ) ) {
           //      $args['item_id'] = $media->group_id;
           //      $args['type']    = 'activity_update';
           //      $current_group   = groups_get_group( $media->group_id );
           //      $args['action']  = sprintf( __( '%1$s posted an update in the group %2$s', 'buddyboss' ), bp_core_get_userlink( $media->user_id ), '<a href="' . bp_get_group_permalink( $current_group ) . '">' . esc_attr( $current_group->name ) . '</a>' );
           //      $activity_id     = groups_record_activity( $args );
           //
           //  } else {
           //      $activity_id = bp_activity_post_update( $args );
           //  }
           //   $media->activity_id   = $activity_id;
           //   $media->attachment_id = 5703;
           //
           //
           //  $media->save();
           //
           //
           //   $media_activity = new BP_Activity_Activity( $media->activity_id );
           //   $media_activity->secondary_item_id = $parent_activity_id;
           //   $media_activity->save();
           //
           //   update_post_meta( $media->attachment_id, 'bp_media_parent_activity_id', $parent_activity_id );
           //   update_post_meta( $media->attachment_id, 'bp_document_saved', true );
           //   do_action( 'bp_document_add', $media );
           //   pre_dump($media);

// pre_dump(bb_user_can_create_document());
// pre_dump(bb_user_can_create_media());
//  $args =   array('in' => "5435" );
//
// pre_dump(bp_activity_get($args));
    // pre_dump(  $media  );
// pre_dump( bp_activity_media_add( $media ));
 //
 // bp_activity_update_meta( $bbid, 'bp_media_activity', '1' );
 // update_post_meta( 5765, 'bp_media_activity_id', $bbid );

// $comment_activity = new BP_Activity_Activity( 5373 );
// pre_dump($comment_activity);

//  $media->group_id = $comment_activity->item_id;
//  $media->privacy = 'grouponly';
//  $activity = new BP_Activity_Activity($bbid);
 //pre_dump($bbid);
//  update_post_meta( 5772, 'bp_document_upload', true );
//  update_post_meta( 5772, 'bp_document_saved', '0' );
// //
 // pre_dump(  bp_media_add( array(
 //   // 'id' => 5765 ,
 //   'blog_id'=>get_current_blog_id(),
 //   'group_id'=> 29,
 //   'attchment_id' => 5807 ,
 //   'activity_id'=> $act_id,
 //   'user_id'=>bp_loggedin_user_id(),
 // )
 //   ));
  // update_post_meta( 5761, 'bp_document_upload', true );
  // update_post_meta( 5761, 'bp_document_saved', '0' );
//   echo get_rest_url();

  //  pre_dump(bp_media_add_handler(  [5709] , 'public', 'testingsad ', 28 ));

 // echo '<p><audio controls><source src="https://lsm-portal-dev.s3.us-east-2.amazonaws.com/media/2022/08/practice.wav">my test eeeeeeeeeeeee</audio></p>';
//
//  echo '<br>';
//
   // $user_query = new WP_User_Query( array(
   //         'role'    => 'parent',
   //         'orderby' => 'ID',
   //         'order' => 'ASC',
   // ));
   // $users = $user_query->get_results();
   // $last_names = array_column( $users, 'ID' );
//    pre_dump( $last_names );
   //   $args = array(
   //      'role'    => 'parent',
   //      'orderby' => 'id',
   //      'order'   => 'ASC'
   //  );
   // $users = get_users( $args );
   // $last_names = array_column( $users, 'ID' );
   // pre_dump( $last_names );
 /**
  *
  */


 //$result = $aws_s3_client->Upload_Media_File( $Bucket, $Region, $array_files, $basedir_absolute, $private_or_public, '', 5576 )  ;
 //pre_dump($res);
 /**
  *
  */
 //  $dataaa = wp_remote_request( 'https://mslmcomdev.wpengine.com/wp-json/wp/data_tokens', $args );
 //  $responseBody = wp_remote_retrieve_body( $dataaa );
 //  $result = json_decode( $responseBody );
 // pre_dump($result->data->keap_token);
//   $token_data = array('token' => "sad" ,'refresh_time' => "94595" ) ;
//     $DAS  =  update_option('keap_access_token',$token_data);  ;
//
  // pre_dump(get_token_from_dev());
//    // Get saved data from DB
//    if ( empty( $app_name ) && empty( $api_key ) ) {
//      $app_name = wpf_get_option( 'app_name' );
//      $api_key  = wpf_get_option( 'api_key' );
//    }


//  pre_dump(get_post_meta( 205, '_wp_nou_leopard_wom_s3_path' , true ) );
 // pre_dump( $results);
 // $plugin = new Leopard_Wordpress_Offload_Media();
 // $plugin->run();
 //pre_dump( $aws_s3_client );
  /* template name: just for test */ ?>
<!-- <form class="" action="" method="post" enctype="multipart/form-data">
  <input type="file" name="filll" value="">
  <button type="submit" name="button">up</button>
</form> -->
<?php //    get_header();

 // echo get_token_from_dev();


 // update_post_meta( 3300, 'record_id', 'fasfasf');
 // echo get_post_meta(3300 , 'record_id',true);
 //pre_dump( get_post_meta(3276 ));

// $dd = json_decode($data);
// //pre_dump(get_parent_stats_from_keap(399));
//
//
// $my_post = array(
//     'post_title'    => 'test assignment',
//     'post_type' => 'sfwd-assignment',
//     'post_content'  => 'This is my post.',
//     'post_status'   => 'publish',
//     'post_author'   => get_current_user_id(),
// );
// // echo 'Memory in use: ' . memory_get_usage() . ' ('. ((memory_get_usage() / 1024) / 1024) .'M) <br>';
//
//
//   $pid =  wp_insert_post( $my_post )  ;
//
//  	update_post_meta( $pid, 'lesson_id', intval( 3253 ));
//   update_post_meta( $pid, 'course_id', intval( 2779 ));
//   learndash_approve_assignment( get_current_user_id(),  3253,  $pid );

 //$aws_s3_client = leopard_offload_media_provider();
 //leopard_offload_media_copy_to_s3_function( 1926 );

//pre_dump($aws_s3_client);

// echo do_shortcode('[reg_page_shortcode]');
  // echo do_shortcode('[contacter-click id="3244"]Your Content[/contacter-click]');
// $d = get_userdata(2460);
// echo get_user_meta($user_id, 'pw_string', true)  .'<br>' ;
// echo get_user_meta($user_id, 'primary_phone', true).'<br>' ;
// echo get_user_meta($user_id ,'account_code', true);
// for ($x = 1; $x <= 1600; $x++) {
// $email = "fake_prnt_$x@muslimeto.com" ;
// $pass = rand(111111,999999) ;
// $phone =  rand(11111111111,99999999999) ;
//
// $userdata = array(
//     'user_login' => $email,
//     'first_name' => "fake_fname_$x" ,
//     'last_name' =>  "fake_lname_$x" ,
//     'user_email' => $email ,
//     'role' => 'Parent',
//     'user_pass'  =>  wp_hash_password($pass)  // no plain password here!
// );
// $user_id = wp_insert_user( wp_slash( $userdata ) ) ;
// if ( ! is_wp_error( $user_id ) ){
//   $someone = new WP_User( $user_id );
//   $someone->set_role( 'parent' );
//   $new_code = 'prnt-' . $phone . '_uid_' . $user_id;
//   add_user_meta($user_id, 'pw_string', $pass);
//   add_user_meta($user_id, 'primary_phone', $phone);
//   add_user_meta($user_id ,'account_code', $new_code);
// }

// }
// pre_dump($user_id);
//echo 'done';
// $teacher_id = get_current_user_id();
// $staff_id   = getStaffId( $teacher_id );
// //pre_dump(get_teacher_hour_with_learner($staff_id, '2022-08-22'));
//    // $classes = getStaffBBGroups($staff_id);
//    // pre_dump($classes);
// $st = "2022-02-22";
// $en = "2022-02-28";
// $begin = new DateTime( $st );
// $end   = new DateTime( $en );
//
// $lrns = get_learners_by_teacher_id($teacher_id, $st , $en) ;
// $teacher_id = get_current_user_id();
// $staff_id   = getStaffId( $teacher_id );
?>


<?php
//get_footer(); ?>
<?php
/*?>

<div class="container load-table">

  <table class="table table-bordered table-responsive">
    <thead>
      <tr>
        <th scope="col">
          <select class="ch_moth" name="">
            <?php
              for ($i = 1; $i <= 12; $i++) :?>
              <option value="<?php if($i<10){echo'0';} echo $i ?>"
                <?php if((date('m')+1) == $i){echo'selected';} ?>>
                <?php if($i<10){echo'0';} echo $i ?>
              </option>
           <?php endfor; ?>
          </select>
      </th>
        <?php foreach ($lrns as $lrn) : $data = get_userdata( $lrn['id'] ); ?>
          <th scope="col"><?php echo $data->display_name. ' ' . $lrn['id'] .' cid '. $lrn['cid']?> </th>
        <?php endforeach; ?>
      </tr>
    </thead>
    <tbody>
     <?php $x=0; for($i = $begin; $i <= $end; $i->modify('+1 day'))  :
            if(!isset($lrns[$x])){$x=0;}  ?>
      <tr>
        <th scope="row"><?php echo $i->format("M") . "<br>" . $i->format("m-d"); ?></th>
        <?php foreach ($lrns as $lrn) : $tt = get_teacher_hour_with_learner2($staff_id, $i->format("Y-m-d") , $lrn['id']); ?>
          <?php if(!empty($tt)):?>
          <td data-status="<?php echo $tt['status'];?>"> <?php echo $tt['time'];?> </td>
          <?php else: ?>
          <td>-</td>
          <?php endif; ?>
        <?php endforeach; ?>
      </tr>
    <?php $x++; endfor;?>
    </tbody>
  </table>
</div>
<?php
*/

/// get_footer();?>
