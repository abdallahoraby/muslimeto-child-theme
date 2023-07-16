<?php
/**
 * Child Theme functions and definitions
 *
 */


if ( ! defined( 'THEME_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( 'THEME_VERSION', '1.0.0' );
}

/**
 * Loading Parent theme stylesheet
 *
 */
add_action( 'wp_enqueue_scripts', 'buddyboss_child_enqueue_styles' );
function buddyboss_child_enqueue_styles() {
    wp_enqueue_style( 'buddyboss-parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'buddyboss-child-style', get_stylesheet_directory_uri() . '/style.css' );
    wp_enqueue_style( 'muslimeto-psgTimer-css', get_stylesheet_directory_uri() . '/css/psgTimer.css' );
    wp_enqueue_script( 'muslimeto-bootstrap5-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', 'jquery', rand(), true );
    wp_enqueue_script( 'muslimeto-showtimer-js', get_stylesheet_directory_uri() . '/js/showTimer.min.js', 'jquery', rand(), true );
    wp_enqueue_script( 'muslimeto-psgTimer-js', get_stylesheet_directory_uri() . '/js/jquery.psgTimer.js', 'jquery', rand(), true );
    wp_enqueue_script('muslimeto_bb_script', get_stylesheet_directory_uri() . '/script.js', 'jquery', THEME_VERSION, true );

}

function load_cust_assets() {
    if(is_page( 'account' )) :
        wp_enqueue_style( 'app-bootstrap', get_stylesheet_directory_uri() . '/app-assets/css/bootstrap.css' );
        wp_enqueue_style( 'app-bootstrap-extended', get_stylesheet_directory_uri() . '/app-assets/css/bootstrap-extended.css' );
        wp_enqueue_style( 'toaster-css', 'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css' );
        wp_enqueue_script( 'toaster-js', 'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js' );
    endif;
    wp_register_script('app-vendor', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js' );
}
add_action( 'wp_enqueue_scripts', 'load_cust_assets' );
// enqueue admin styles and scripts
/**
 * Register and enqueue a custom stylesheet in the WordPress admin.
 */
function muslimeto_enqueue_custom_admin_style() {
    wp_register_style( 'custom_wp_admin_css', get_stylesheet_directory_uri() . '/admin/admin-style.css', false, rand() );
    wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'muslimeto_enqueue_custom_admin_style' );

// register templates styles and scripts
function muslimeto_styles_and_scripts_register() {

    wp_register_style( 'muslimeto-dashboard-css', get_stylesheet_directory_uri() . '/css/dashboard.css', array(), rand(), 'all' );
    wp_register_style( 'muslimeto-bootstrap-css', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), rand(), 'all' );
    wp_register_style( 'muslimeto-material-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons', array(), rand(), 'all' );
    wp_register_script( 'muslimeto-bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery'), rand(), true );


}
add_action( 'wp_enqueue_scripts', 'muslimeto_styles_and_scripts_register' );

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_stylesheet_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'muslimeto_bb_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 *  <snip />
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function muslimeto_bb_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => 'Redux Framework',
            'slug'      => 'redux-framework',
            'required'  => true,
        ),
        array(
            'name'      => 'Menu Icons by ThemeIsle',
            'slug'      => 'menu-icons',
            'required'  => true,
        ),

        // <snip />
    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'muslimeto-bb',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-muslimeto-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        /*
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'theme-slug' ),
            'menu_title'                      => __( 'Install Plugins', 'theme-slug' ),
            // <snip>...</snip>
            'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
        */
    );

    tgmpa( $plugins, $config );

}

// include Redux config file
if ( class_exists( 'Redux_Core' ) ) {
    require_once get_stylesheet_directory() . '/inc/class-muslimeto-bb-redux-config.php';
}

// require style.php
//require_once get_stylesheet_directory() . '/styles.php';

// enqueue admin styles and scripts
/**
 * Register and enqueue a custom stylesheet in the WordPress admin.
 */
function wpdocs_enqueue_custom_admin_style() {
    wp_register_style( 'custom_wp_admin_css', get_stylesheet_directory() . '/css/admin-style.css', false, THEME_VERSION );
    wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'wpdocs_enqueue_custom_admin_style' );

// register new menu location
register_nav_menus( array(
    'desktop_sidebar' => __( 'Desktop Sidebar', 'muslimeto-bb' ),
) );


// shortcode to load Academic template
function muslimeto_academic_template_callback() {
    get_template_part('template-parts/template-academic');
}
add_shortcode('muslimeto_academic_template', 'muslimeto_academic_template_callback');

// shortcode to load dashboard
function muslimeto_dashboard_template_callback() {
    get_template_part('template-parts/dashboard/template-dashboard');
}
add_shortcode('muslimeto_dashboard_template', 'muslimeto_dashboard_template_callback');

// shortcode to load parent dashboard
// new parent dashboard
// 10/13/2022
function muslimeto_my_dashboard_template_callback() {
//    get_template_part('/template-parts/my-dashboard');
    get_template_part('template-parts/my-dashboard');
}
add_shortcode('muslimeto_my_dashboard_template', 'muslimeto_my_dashboard_template_callback');

// shortcode to load learner dashboard
// new learner dashboard
// 10/13/2022
function muslimeto_learner_dashboard_template_callback() {
    get_template_part('/template-parts/learner-dashboard');
}
add_shortcode('muslimeto_learner_dashboard_template', 'muslimeto_learner_dashboard_template_callback');


// load template by ajax
function get_template_by_ajax()
{
    if( !empty($_GET['template_name']) ):
        $template_name = $_GET['template_name'];
    endif;

    if( !empty($_GET['template_fullname']) ):
        $template_fullname = $_GET['template_fullname'];
    endif;

    if( !empty($template_fullname) ):
        get_template_part('template-parts/'. $template_fullname);
    else:
        get_template_part('template-parts/template-'.$template_name);
    endif;

    exit();
}

// creating Ajax call for WordPress
add_action('wp_ajax_nopriv_get_template_by_ajax', 'get_template_by_ajax');
add_action('wp_ajax_get_template_by_ajax', 'get_template_by_ajax');


// function to get current service id for bb group
function getBBgroupServiceTeacher ($bb_group_id = null) {

    global $wpdb;
    if( empty($bb_group_id) ):
        $bb_group_id = bp_get_current_group_id();
    endif;
    // get group meeting id
    $gf_meta_table = $wpdb->prefix . 'gf_entry_meta';
    $gf_result = $wpdb->get_results(
        "SELECT entry_id FROM $gf_meta_table WHERE meta_key = 7 AND meta_value = {$bb_group_id}"
    );
    $wpdb->flush();

    foreach ( $gf_result as $entry ):
        $entry_id = $entry->entry_id;
        $gf_results = $wpdb->get_results(
            "SELECT * FROM $gf_meta_table WHERE entry_id = {$entry_id}"
        );
        $wpdb->flush();
        foreach ( $gf_results as $gf_result ):
            $is_approved = $gf_result->meta_key;
            if( $is_approved === 'is_approved' ):
                $is_approved_value = $gf_result->meta_value;
                if( $is_approved_value === '1' ):
                    $entry_id_selected = $gf_result->entry_id;
                endif;
            endif;
        endforeach;
    endforeach;

    if( !empty($entry_id_selected) ):
        $gf_results = $wpdb->get_results(
            "SELECT * FROM $gf_meta_table WHERE entry_id = {$entry_id_selected} AND meta_key = 6"
        );
        $wpdb->flush();
        $bookly_service = $gf_results[0]->meta_value;

        $gf_results = $wpdb->get_results(
            "SELECT * FROM $gf_meta_table WHERE entry_id = {$entry_id_selected} AND meta_key = 8"
        );
        $wpdb->flush();
        $bookly_teacher = $gf_results[0]->meta_value;

        return array(
            'teacher' => $bookly_teacher,
            'service' => $bookly_service
        );
    else:
        return false;
    endif;
}


// function to get sub menu items for current menu

function getSubMenu($menu_id) {

    $menu_items = wp_get_nav_menu_items($menu_id);

    global $wp;
    $current_page_url = home_url( $wp->request ).'/';

    $referral = wp_get_referer();

    foreach ( $menu_items as $menu_item ):
        $url = $menu_item->url;

        $url_list[$menu_item->ID] = $url;
        $parent_items[$menu_item->ID] = $menu_item->menu_item_parent;

        if(  $url === $current_page_url  ):
            $parent_item_id = $menu_item->ID;
        endif;

    endforeach;


    if( !empty($parent_items) ):
        foreach ($parent_items as $parent=>$sub):

            if( !empty($parent_item_id) && $parent_item_id === $parent && $sub !== '0' ):
                $parent_item_id = $sub;
            endif;

        endforeach;
    endif;

    if( !empty($menu_items) ):
        foreach ( $menu_items as $menu_item ):

            // get all sub menu for parent
            if( !empty($parent_item_id) ):
                if( ( (int) $menu_item->menu_item_parent === (int) $parent_item_id ) ):
                    $sub_items[] = $menu_item;
                endif;
            endif;

        endforeach;
    endif;

    if( !empty($sub_items) ):
        return $sub_items;
    else:
        return false;
    endif;
}



/**
 * Add custom fields to menu item
 *
 * This will allow us to play nicely with any other plugin that is adding the same hook
 *
 * @param  int $item_id
 * @params obj $item - the menu item
 * @params array $args
 */
function kia_custom_fields( $item_id, $item ) {

    wp_nonce_field( 'custom_menu_meta_nonce', '_custom_menu_meta_nonce_name' );

    ?>
    <div class="field-custom_menu_meta description-wide icon_menu" style="margin: 5px 0;">

        <input type="hidden" class="nav-menu-id" value="<?php echo $item_id ;?>" />
        <p> normal image:
            <?php

            $image_normal_id = get_post_meta( $item_id, 'misha_img_normal', true );
            if( $image = wp_get_attachment_image_src( $image_normal_id ) ) {

                echo '<a href="#" class="misha-upl"><img src="' . $image[0] . '" /></a>
              <a href="#" class="misha-rmv">Remove image</a>
              <input type="hidden" name="misha_img_normal['. $item_id.']" value="' . $image_normal_id . '">';

            } else {

                echo '<a href="#" class="misha-upl">Upload image</a>
              <a href="#" class="misha-rmv" style="display:none">Remove image</a>
              <input type="hidden" name="misha_img_normal['. $item_id.']" value="">';

            }

            ?>
        </p>

        <p> hover image:
            <?php

            $image_hover_id = get_post_meta( $item_id, 'misha_img_hover', true );
            if( $image = wp_get_attachment_image_src( $image_hover_id ) ) {

                echo '<a href="#" class="misha-upl"><img src="' . $image[0] . '" /></a>
          <a href="#" class="misha-rmv">Remove image</a>
          <input type="hidden" name="misha_img_hover['. $item_id.']" value="' . $image_hover_id . '">';

            } else {

                echo '<a href="#" class="misha-upl">Upload image</a>
          <a href="#" class="misha-rmv" style="display:none">Remove image</a>
          <input type="hidden" name="misha_img_hover['. $item_id.']" value="">';

            }

            ?>
        </p>

        <?php $is_academic_page = get_post_meta( $item_id, 'is_academic_page', true ); ?>
        <p><label for="is_academic_page"> <input type="checkbox" id="is_academic_page" name="is_academic_page[<?php echo $item_id; ?>]" value="is_academic_page" <?php echo ($is_academic_page === 'is_academic_page') ? 'checked' : '' ?> > Is Academic Page </label></p>

        <?php $is_account_page = get_post_meta( $item_id, 'is_account_page', true ); ?>
        <p><label for="is_account_page"> <input type="checkbox" id="is_account_page" name="is_account_page[<?php echo $item_id; ?>]" value="is_account_page" <?php echo ($is_account_page === 'is_account_page') ? 'checked' : '' ?> > Is Account Page ? </label></p>
    </div>
    <?php
}
add_action( 'wp_nav_menu_item_custom_fields', 'kia_custom_fields', 10, 2 );

/**
 * Save the menu item meta
 *
 * @param int $menu_id
 * @param int $menu_item_db_id
 */
function kia_nav_update( $menu_id, $menu_item_db_id ) {

    // Verify this came from our screen and with proper authorization.
    if ( ! isset( $_POST['_custom_menu_meta_nonce_name'] ) || ! wp_verify_nonce( $_POST['_custom_menu_meta_nonce_name'], 'custom_menu_meta_nonce' ) ) {
        return $menu_id;
    }


    if ( isset( $_POST['misha_img_normal'][$menu_item_db_id]  ) ) {
        $sanitized_data =  $_POST['misha_img_normal'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, 'misha_img_normal', $sanitized_data );
    } else {
        delete_post_meta( $menu_item_db_id, 'misha_img_normal' );
    }

    if ( isset( $_POST['misha_img_hover'][$menu_item_db_id]  ) ) {
        $sanitized_data =  $_POST['misha_img_hover'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, 'misha_img_hover', $sanitized_data );
    } else {
        delete_post_meta( $menu_item_db_id, 'misha_img_hover' );
    }

    if ( isset( $_POST['is_academic_page'][$menu_item_db_id]  ) ) {
        $sanitized_data =  $_POST['is_academic_page'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, 'is_academic_page', $sanitized_data );
    } else {
        delete_post_meta( $menu_item_db_id, 'is_academic_page' );
    }

    if ( isset( $_POST['is_account_page'][$menu_item_db_id]  ) ) {
        $sanitized_data =  $_POST['is_account_page'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, 'is_account_page', $sanitized_data );
    } else {
        delete_post_meta( $menu_item_db_id, 'is_account_page' );
    }


}
add_action( 'wp_update_nav_menu_item', 'kia_nav_update', 10, 2 );






add_action( 'admin_enqueue_scripts', 'misha_include_js' );

function misha_include_js() {

    // I recommend to add additional conditions just to not to load the scipts on each page

    if ( ! did_action( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
    }

    wp_enqueue_script( 'myuploadscript', get_stylesheet_directory_uri() . '/admin/admin-script.js', array( 'jquery' ) );
}


// get academic groups paging
function get_groups_page () {
    $paging = !empty($_POST['paging']) ? $_POST['paging'] : '1,20';
    set_query_var( 'paging', $paging );
    get_template_part('template-parts/template-academic-group-paging');
    exit();

}
add_action('wp_ajax_nopriv_get_groups_page', 'get_groups_page');
add_action('wp_ajax_get_groups_page', 'get_groups_page');


if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' 	=> 'Notifications Message',
        'menu_title'	=> 'Notifications Message',
        'menu_slug' 	=> 'notifications-message',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));
}

function change_user_pass() {
    $user = wp_get_current_user();
    if ( $user && wp_check_password( $_POST['old_pass'], $user->data->user_pass, $user->ID ) ) {
        if( strlen($_POST['new_pass']) < 7){
            $return = array(
                'message'  => 'Password length must be at least 6 characters.',
                'type'       => "warning"
            );
            wp_send_json($return);
        }else{
            wp_set_password( $_POST['new_pass'], $user->ID );
            wp_set_current_user( $user->ID );
            wp_set_auth_cookie( $user->ID );
            // user meta to store password as string
            if( !update_user_meta($user->ID, 'pw_string', $_POST['new_pass'] ) && !get_user_meta($user->ID, 'pw_string', true) ){
                 add_user_meta($user->ID, 'pw_string', $_POST['new_pass']);
            }
            do_action( 'wp_login', $user->user_login, $user );
            $return = array(
                'message'  => 'Your password has been updated.',
                'type'       => "success"
            );
            wp_send_json($return);
        }
    } else {
        $return = array(
            'message'  =>  "Your old password is wrong.",
            'type'       => "error"
        );
        wp_send_json($return);
    }
    exit;
}
add_action('wp_ajax_nopriv_change_user_pass', 'change_user_pass');
add_action('wp_ajax_change_user_pass', 'change_user_pass');


function account_save_change() {
    $user = wp_get_current_user();
    $announcements = $_POST['n_type_announcements']?? null;
    $newsletter = $_POST['n_type_newsletter']?? null;
    $new_course = $_POST['n_type_new_course']?? null;
    $new_quiz = $_POST['n_type_new_quiz']?? null;
    $new_assignment = $_POST['n_type_new_assignment']?? null;
    $course_completed = $_POST['n_type_course_completed']?? null;
    $certificate_awarded = $_POST['n_type_certificate_awarded']?? null;
    $n_type_reset_password = $_POST['n_type_reset_password']?? null;
    $n_type_session_reminder = $_POST['n_type_session_reminder']?? null;
    $arr = $_POST['n_type']?? null;
    update_field('announcements',$announcements,'user_'.$user->ID);
    update_field('newsletter',$newsletter,'user_'.$user->ID);
    update_field('new_course',$new_course,'user_'.$user->ID);
    update_field('new_quiz',$new_quiz,'user_'.$user->ID);
    update_field('new_assignment',$new_assignment,'user_'.$user->ID);
    update_field('course_completed',$course_completed,'user_'.$user->ID);
    update_field('certificate_awarded',$certificate_awarded,'user_'.$user->ID);
    update_field('reset_password',$n_type_reset_password,'user_'.$user->ID);
    update_field('n_type',$arr,'user_'.$user->ID);
    update_field('session_reminder',$n_type_session_reminder,'user_'.$user->ID);
    wp_send_json(array('message'=> 'Settings updated successfully.','type'=> "success"));
    exit;
}
add_action('wp_ajax_nopriv_account_save_change', 'account_save_change');
add_action('wp_ajax_account_save_change', 'account_save_change');


function datum($gmt, $datum = true) {
    $sign =  ( $gmt>=0 ) ? "+" : "-"; // Whichever direction from GMT to your timezone. + or -
    $h = abs($gmt); // offset for time (hours)
    $dst = false; // true - use dst ; false - don't
    if ($dst==true) {
        $daylight_saving = date('I');
        if ($daylight_saving){
            if ($sign == "-"){ $h=$h-1; }
            else { $h=$h+1; }
        }
    }
    $hm = $h * 60;
    $ms = $hm * 60;
    if ($sign == "-"){ $timestamp = time()-($ms); }
    else { $timestamp = time()+($ms); }
    $gmdate = gmdate("g:i A", $timestamp);
    if($datum==true) {
        return $gmdate;
    }
    else {
        return $timestamp;
    }
}

function enqueue_custom_admin_noti() {
    wp_enqueue_style( 'toaster-admin-css', 'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css' );
    wp_enqueue_script( 'toaster-admin-js', 'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js' );
    wp_enqueue_script( 'admin-noti', get_stylesheet_directory_uri() . '/admin-noti.js', array( 'jquery' ) , rand(), true);
}
add_action( 'admin_enqueue_scripts', 'enqueue_custom_admin_noti' );


function get_all_usermail() {
    global $wpdb;
    $email = $wpdb->get_results("SELECT user_email from {$wpdb->prefix}users",ARRAY_A);
    $all = array_column($email, 'user_email');
    return $all ;
}
function get_all_userphones() {
    global $wpdb;
    $phones = array();
    $blogusers = get_users( array( 'role__in' => array( 'parent' ) ) );
    $all = array_column($blogusers, 'ID');
    foreach ($all as $user_id) {
        $phone = get_user_meta($user_id, 'primary_phone', true );
        $phones[] = clean_phone($phone);
    }
    return $phones ;
}

function get_all_notification_checked($type, $field=array()){
    global $wpdb;
    $usermails = array();
    $user_mobile = array();
    $user_id = $wpdb->get_results("SELECT id from {$wpdb->prefix}users",ARRAY_A);
    $all_users = array_column($user_id, 'id');
    foreach ($all_users as $userId) {
        $flds = get_field($field,'user_'.$userId)?get_field($field,'user_'.$userId):array();
        if(in_array($type,$flds)){
            $user = get_user_by('id', $userId);
            $usermails[] = $user->user_email;
        }
    }
    return $usermails  ;
}


function get_all_users_ids(){
    global $wpdb;
    $user_id = $wpdb->get_results("SELECT id from {$wpdb->prefix}users",ARRAY_A);
    $all_users = array_column($user_id, 'id');
    return $all_users  ;
}



function send_announcement_all() {
    $emails = get_all_usermail();
    $all_user_idz = get_all_users_ids();
    $parents = get_users( array('role' => 'parent' ) );
    $parents_email = array_column($parents, 'user_email');

    $types = $_POST['n_type'] ? $_POST['n_type'] : array();
    $message = $_POST['brief'];
    if(in_array('SMS',$types)){
        $all_phones = get_all_userphones();
        foreach ($all_phones as $phone) {
            twl_send_sms( array( 'number_to' => $phone , 'message' => $message ) );
        }
    }
    if(in_array('EMAIL',$types)){
        $body = bp_email_core_wp_get_template($message);
        $all_emails = get_all_usermail();
        wp_mail($all_emails , "New Announcement" , $body);
    }

    foreach ( $all_user_idz as $id) {
        bp_notifications_add_notification( array(
            'user_id'           => $id,
            'component_name'    => 'gamipress_buddyboss_notifications',
            'item_id'           => 1878,
            'component_action'  => $message,
            'date_notified'     => bp_core_current_time(),
            'is_new'            => 1,
            'allow_duplicate'   => true,
        ));
    }

    wp_send_json(array('message'=> "Announcement Sent Successfully.",'type'=> "success"));

    exit;
}
add_action('wp_ajax_nopriv_send_announcement_all', 'send_announcement_all');
add_action('wp_ajax_send_announcement_all', 'send_announcement_all');




add_action(
    'learndash_course_completed',
    function( $user, $course_id, $course_progress ) {
        $course_title = get_the_title($course_id);
        $message = "You have completed " .$course_title." course.";
        $body = bp_email_core_wp_get_template($message);
        wp_mail($user->user_email,$message,$body);
        bp_notifications_add_notification( array(
            'user_id'           => $user->ID,
            'component_name'    => 'gamipress_buddyboss_notifications',
            //'item_id'           => 1878,
            'component_action'  => $message,
            'date_notified'     => bp_core_current_time(),
            'is_new'            => 1,
            'allow_duplicate'   => true,
        ));

    }, 20, 3 );



add_action( 'learndash_update_course_access', 'updatebbpressrole', 20, 4 );
function updatebbpressrole ($user_id, $course_id, $course_access_list, $remove) {
    bp_notifications_add_notification( array(
        'user_id'           => $user_id,
        'component_name'    => 'gamipress_buddyboss_notifications',
        'component_action'  => 'You have been enrolled to '.  get_the_title($course_id) .' course',
        'date_notified'     => bp_core_current_time(),
        'is_new'            => 1,
        'allow_duplicate'   => true,
    ));
    $user = get_user_by('id', $user_id);
    wp_mail($user->user_email, 'enrolled to '. get_the_title($course_id)   , 'enrolled to '. get_the_title($course_id));
}


add_action('wp_footer', 'load_practice_model_everywhere');
function load_practice_model_everywhere(){
  $mypost = get_page_by_title('Practice-Form', OBJECT, 'contacter_form');
  if(isset($mypost->ID)){$form_id = $mypost->ID;}else{$form_id=3244;}
  echo get_template_part('template-parts/common/template-modal', null, array(
                  'id' => 'pp_record2',
                  'title' => '',
                  'body' => do_shortcode('[contacter id="'.$form_id.'"]')
              )
          );
}


function hs_image_editor_default_to_gd( $editors ) {$gd_editor = 'WP_Image_Editor_GD';$editors = array_diff( $editors, array( $gd_editor ) );array_unshift( $editors, $gd_editor );return $editors;}add_filter( 'wp_image_editors', 'hs_image_editor_default_to_gd' );




add_filter( 'body_class','my_body_classes' );
function my_body_classes( $classes ) {
    if ( user_has_role(get_current_user_id(), 'administrator') || user_has_role(get_current_user_id(), 'hr') ) {
        $classes[] = 'is_hr';
    }

    $user_meta = get_userdata( get_current_user_id() );
    $user_roles = $user_meta->roles;

    if( in_array('tutoring_student', $user_roles) ):
        $role_str = 'student';
    elseif ( in_array('teacher', $user_roles) ):
        $role_str = 'teacher';
    elseif ( in_array('parent', $user_roles) ):
        $role_str = 'parent';
    endif;

    $classes[] = $role_str;

    return $classes;
}
