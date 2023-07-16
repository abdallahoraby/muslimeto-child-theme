<?php

$my_post = array(
    'post_title'    => 'My post',
    'post_type' => 'sfwd-assignment',
    'post_content'  => 'This is my post.',
    'post_status'   => 'publish',
    'post_author'   => get_current_user_id(),
);
echo 'Memory in use: ' . memory_get_usage() . ' ('. ((memory_get_usage() / 1024) / 1024) .'M) <br>';



// Insert the post into the database.
 //$pid =  wp_insert_post( $my_post )  ;
 //learndash_approve_assignment( get_current_user_id() ,3253 ,$pid );
 	// update_post_meta( 3256, 'lesson_id', intval( 3253 ));
  // update_post_meta( 3256, 'course_id', intval( 2779 ));
  // learndash_approve_assignment( get_current_user_id(),  3253,  3256 );
 //pre_dump(learndash_get_setting( 3255 ) );
// add_user_meta( 399, 'account_code', get_user_meta(399 ,'memb_ReferralCode', true) );
// update_user_meta(  399 ,'account_code',get_user_meta(399 ,'memb_ReferralCode', true));
//  pre_dump(get_user_meta( 399 ,'account_code', true));
// $available_drivers = get_users(
//             array(
//                 //'number' => 55,
//                 'role' => 'student',
//                 'meta_query' => array(
//                     array(
//                       'key'     => 'memb_ReferralCode',
//                       'compare' => 'EXISTS',
//                     )
//                 )
//             )
//         );
//
//         //
//         foreach ($available_drivers as $parent) :
//          update_user_meta(  $parent->ID ,'account_code',get_user_meta($parent->ID ,'memb_ReferralCode', true));
//           endforeach;
      //    1732  398
    //  echo get_user_meta(398 ,'account_code', true)  ;
 //pre_dump($available_drivers);
 if ( metadata_exists( 'user', 399 , 'account_code' ) ) {
    // echo 'yes ' ;
 }
$dd = '{
    "email_addresses": [
        {
            "email": "loaisaid@gmail.com",
            "field": "EMAIL1"
        },
        {
            "email": "loaisaid@outlook.com",
            "field": "EMAIL2"
        }
    ],
    "email_opted_in": true,
    "addresses": [
        {
            "line1": "Street address",
            "line2": "City",
            "locality": "City",
            "region": "State",
            "field": "BILLING",
            "postal_code": "12345",
            "zip_code": "12345",
            "zip_four": "",
            "country_code": null
        },
        {
            "line1": "",
            "line2": "",
            "locality": "",
            "region": "",
            "field": "OTHER",
            "postal_code": "",
            "zip_code": "",
            "zip_four": "",
            "country_code": null
        }
    ],
    "last_updated": "2022-07-13T20:03:45.000+0000",
    "tag_ids": [
        110,
        118,
        204,
        248,
        256,
        306,
        326,
        331,
        380,
        388,
        390,
        398,
        400,
        402,
        410,
        414,
        422
    ],
    "owner_id": 14604,
    "date_created": "2021-10-14T00:22:57.000+0000",
    "middle_name": "",
    "given_name": "Loai",
    "ScoreValue": "0",
    "email_status": "SingleOptIn",
    "phone_numbers": [
        {
            "number": "+17037894480",
            "extension": "",
            "field": "PHONE1",
            "type": "Mobile"
        },
        {
            "number": "1 (703) 789-4480",
            "extension": "",
            "field": "PHONE3",
            "type": "Work"
        }
    ],
    "last_updated_utc_millis": 1657742625064,
    "company": null,
    "id": 8,
    "family_name": "Said",
    "contact_type": "Client"
}';
$data = json_decode($dd);
//pre_dump($data->email_addresses[0]->email);?>
<style>

form{
    background: #fff;
    padding: 15px;
    border-radius: 15px;
    box-shadow: 0 0 10px rgb(0 0 0 / 16%);
}
label[for="exampleInputEmail1"],label[for="Message"]{
color: var(--main-color)!important;
    margin-bottom: 0.25rem!important;
    font-size: var(--fs-400)!important;
    font-weight: 600!important;
}
.form-group:last-child{
 display:flex;
justify-content:end;
}
input[type=checkbox], input[type=radio]{
   margin: 0 6px;
}
.form-check{
  display: flex;
  align-items: center;
}
label{
color: var(--main-color)!important;
    margin-bottom: 0!important;
    font-size: var(--fs-300)!important;
    font-weight: 300!important;
}

</style>

<?php  /* template name: announcements */ ?>

<?php
$type_group = 'session_reminder_g';
$message = get_field($type_group,3212);
$portal_msg = $message['portal'];
$sms_msg = $message['sms'];
$email_msg = $message['email'];
// if( in_array('sms',get_field('session_reminder','user_399')) ){
//   echo 'sms';
// }
// if(in_array('email',get_field('session_reminder','user_399'))){
//   echo 'email';
// }
// $token = get_token_from_dev();
// $ch = curl_init();
// $authorization = "Authorization: Bearer ".$token;
// $options = [
//   CURLOPT_SSL_VERIFYPEER => true,
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_URL            => 'https://api.infusionsoft.com/crm/rest/v1/transactions/335440'
// ];
// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
// curl_setopt_array($ch, $options);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// $data = json_decode(curl_exec($ch));
// curl_close($ch);
// if(isset($data->contact->email)):
// $u_email = $data->orders[0]->contact->email ;
// $user_id = email_exists($u_email);
// endif;
// pre_dump($data->orders[0]->contact->email);
//   echo admin_url('admin-ajax.php');
// echo get_zoho_token_from_dev(); echo '<br>';
// echo get_token_from_dev();
// echo   get_option( 'zoho_refresh_token' );
//object(Infusionsoft\Token)#9796 (4) { ["accessToken"]=> string(28) "q3AHShEW7M9VTfu3r5Ai9l5VLAr7" ["refreshToken"]=> string(32) "cqzVE5NJNosCY6AJgePmiP0Vo8HUhSWv" ["endOfLife"]=> int(1656008538) ["extraInfo"]=> array(2) { ["scope"]=> string(28) "full|mep387.infusionsoft.com" ["token_type"]=> string(6) "bearer" } }

// require_once  WP_CONTENT_DIR .'/infusion_vendor/autoload.php';
//
// $infusionsoft = new \Infusionsoft\Infusionsoft(array(
// 	'clientId'     => 'unHsVg1NVIemYTA45mihkzn18SIGv6rP',
// 	'clientSecret' => 'JUx8ucLjnGhJjtDg',
// 	'redirectUri'  => 'https://mslmcomdev.wpengine.com/',
// ));
//
//
// // If we are returning from Infusionsoft we need to exchange the code for an
// // access token.
//
// 	$_SESSION['token'] = serialize($infusionsoft->requestAccessToken('mn7BQTP7'));
//
//
// if ($infusionsoft->getToken()) {
// 	// Save the serialized token to the current session for subsequent requests
// 	$_SESSION['token'] = serialize($infusionsoft->getToken());
// var_dump($infusionsoft->getToken());
// 	// MAKE INFUSIONSOFT REQUEST
// } else {
// 	echo '<a href="' . $infusionsoft->getAuthorizationUrl() . '">Click here to authorize</a>';
// }
  // $args= array(
  //    "sender_id" => 2290,
  //    "receiver_id" => 399,
  //    "cid" => 'c',
  //    "aid" => 'a',
  //    "type" => 'session_reminder',
  //    "send_date" => date('m/d/Y h:i:s')
  // );
//send_notification_for_user($args) ;
// pre_dump(get_registered_meta_keys(  'user' ));
// $paid_invoices = muslimito_get_parent_invoices(get_current_user_id(),'true');
// $unpaid_invoices = muslimito_get_parent_invoices(get_current_user_id(),'false');
//pre_dump(muslimito_get_sub_name(2));
get_header(); ?>



<?php  echo do_shortcode('[mus_announcement_shortcode]') ?>
<?php   get_footer(); ?>
