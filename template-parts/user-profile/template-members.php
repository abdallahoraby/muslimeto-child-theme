<?php

    if ( !empty($args) && $args['wp_user_id'] ):
        $user_id = $args['wp_user_id'];
    else:
        $user_id = get_current_user_id();
    endif;


    $user = wp_get_current_user();
    $staff =  array('administrator','teamleader');
    if(in_array('parent',$user->roles)){
        $rol='parent';
    }elseif (in_array('student',$user->roles)) {
        $rol='tutoring_student';
    }elseif ((in_array('teacher',$user->roles))) {
        $rol='teacher';
    }else {
        $rol='staff';
    }

    global $wpdb;
    $parent_stats_table = $wpdb->prefix . 'muslimeto_parent_stats';

    $parent_stats_results = $wpdb->get_results(
        "SELECT renew_on, active_childs FROM $parent_stats_table WHERE parent_wp_user_id = {$user_id}"
    );
    $wpdb->flush();

    if( empty($parent_stats_results) ):
        echo '<div class="alert sm"> User has no data. </div>';
        return;
    endif;

    if( checkIfParent($user_id) ):
        // get parent all childs
        $childs = getParentChilds($user_id);
        $childs[] = $user_id;
    else:
        $childs = [];
    endif;
?>

<style>
    a.button.set_new_pass {
        padding: 0.2rem;
        font-size: 0.8rem;
        border-radius: 5px;
        margin-bottom: 0.2rem;

        color: #fff!important;
        background: transparent;
        border:1px solid var(--green);
    }
    a.button.set_new_pass span{
        color: var(--green)!important;
    }
    a.button.set_new_pass:hover{
        background: var(--green);
        border: 0;
    }
    a.button.set_new_pass:hover span{

        color: #fff!important;
    }
    .member-actions-btns {
        display: flex;
        justify-content: end;
        gap: 0.5rem;
    }

    .member-actions-btns span {
        background: unset !important;
        color: #fff !important;
        display: flex !important;
        margin: 0 !important;
        justify-content: center !important;
    }

    .member-actions-btns button {
        background: var(--logo_blue) !important;
        justify-content: center !important;
    }

    .ajax_image_section{
        display: none;
    }

    button#expand_collapse_all_learner:active,button#expand_collapse_all_learner:focus{color: inherit!important;}
</style>


<section id="page-account-settings">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <?php if($rol=='parent'): ?>
                    <div class="col-md-12 sub-navs">
                        <ul class="nav nav-pills flex-row sub-nav-tabs">
                            <li class="nav-item mr-5">
                                <a class="nav-link d-flex align-items-center active"  data-toggle="pill" href="#aaa" aria-expanded="true">
                                    <!-- <i class="fa fa-award"></i> -->
                                    <span class="material-icons">diversity_1</span>
                                    <span>Current Learners</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" data-toggle="pill" href="#aaaa" aria-expanded="true">
                                    <!-- <i class="fa fa-report"></i> -->
                                    <span class="material-icons">group_add</span>
                                    <span>Add New Learner</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-12 bg-white">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="aaa" aria-labelledby="aaa" aria-expanded="true">
                                        <div class="row" id="basic-table">
                                            <!-- title contain learners number -->
                                            <div class="learners-tab-title">
                                                <h2 class="mb-0">
                                                    <span class="material-icons">cast_for_education</span>
                                                    Learners(<?= count($childs) ?>)
                                                </h2>
                                            </div>
                                            <hr>
                                            <section class="learners-list">
                                              <!-- expand /collapse all Collapse All-->
                                              <div class="collapse_expand_btn_container">
                                                <button type="button" id="expand_collapse_all_learner">
                                                     Expand All <i class="bb-icon-angle-down bb-icon-l"></i>
                                                </button>
                                              </div>

                                            <?php



                                                $renews_on = $parent_stats_results[0]->renew_on;
                                                $current_date_object = new DateTime('now', new DateTimeZone('UTC'));
                                                $today = $current_date_object->format('Y-m-d');
                                                if( !empty($renews_on) ):
                                                    $renews_period_startYmd = date("Y-m-d", strtotime('-28 days', strtotime($renews_on)));
                                                endif;

                                                $active_childs = json_decode($parent_stats_results[0]->active_childs);
                                                if( !empty($active_childs) ):
                                                    foreach ( $active_childs as $active_child_id ):
                                                        // get customer id from child wp user id
                                                        $customers_list[] = getcustomerID($active_child_id);
                                                    endforeach;
                                                else:
                                                    $customers_list = [];
                                                endif;


                                                if( !empty($renews_on) && !empty($renews_period_startYmd) ):
                                                    $bookly_CA_events = getCAeventsDuringPeriod($renews_period_startYmd, $renews_on, $customers_list);
                                                    $events_total_recorded_hrs = getRecordedHrs($user_id, $bookly_CA_events);
                                                    $student_late_times = getStudentLateTimes($user_id, $bookly_CA_events);
                                                    $total_cancelled_times = getCancalledTimes($user_id, $bookly_CA_events);
                                                    $total_noshow_student = getStudentNoshowTimes($user_id, $bookly_CA_events);
                                                endif;



                                                if( !empty($childs) ):
                                                    foreach ( $childs as $child_id ):
                                                        $user_gems_points = get_user_meta($child_id, '_gamipress_gems_points', true);
                                                        $user_total_points = get_user_meta($child_id, '_gamipress_points_points', true);
                                                        $child_first_name = get_user_meta($child_id, 'first_name', true);
                                                        $child_last_name = get_user_meta($child_id, 'last_name', true);
                                                        $full_name = $child_first_name . ' ' . $child_last_name;
                                                        $child_gender_meta = get_user_meta($child_id, 'memb__Gender', true);
                                                        if( $child_gender_meta === 'Male' ):
                                                            $child_gender = 'Son';
                                                        elseif( $child_gender_meta === 'Female' ):
                                                            $child_gender = 'Daughter';
                                                        else:
                                                            $child_gender = 'NA';
                                                        endif;

                                                        $child_birthday = get_user_meta($child_id, 'birthday', true);
                                                        $user_obj = get_user_by('id', $child_id);
                                                        $child_email = $user_obj->data->user_email;
                                                        $user_name = $user_obj->data->user_login;

                                                        // get member assigned groups
                                                        $user_groups = groups_get_user_groups($child_id);

                                                        if( !empty($events_total_recorded_hrs['users'][$child_id]) ):
                                                            $child_recorded_hrs = $events_total_recorded_hrs['users'][$child_id]['recorded_hrs'];
                                                        else:
                                                            $child_recorded_hrs = 0;
                                                        endif;

                                                        if( !empty($student_late_times['users'][$child_id]) ):
                                                            $child_late_times = $student_late_times['users'][$child_id];
                                                        else:
                                                            $child_late_times = 0;
                                                        endif;

                                                        if( !empty($total_cancelled_times['users'][$child_id]) ):
                                                            $child_cancelled_times = $total_cancelled_times['users'][$child_id];
                                                        else:
                                                            $child_cancelled_times = 0;
                                                        endif;

                                                        if( !empty($total_noshow_student['users'][$child_id]) ):
                                                            $child_noshow_student = $total_noshow_student['users'][$child_id];
                                                        else:
                                                            $child_noshow_student = 0;
                                                        endif;

                                                        // get pw_string meta
                                                        $pw_string = get_user_meta($child_id, 'pw_string', true);




                                                        ?>
                                                        <!-- learner view container-->
                                                        <div class="learner-container">
                                                            <!-- name & points & gems & account summery & view details-->
                                                            <div class="leaner-basic-info">
                                                                <!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/badges_Adventurer-copy-50x50.png" alt="" height="50" width="50"> -->
                                                                <!-- name & rleationship -->
                                                                <div class="learner-name">
                                                                    <h4> <?php echo $full_name; ?>  <sup class="learner-relationship"><?php echo $child_gender; ?></sup></h4>
                                                                    <!-- learner-awards -->
                                                                    <div class="learner-awards">
                                                                        <!-- gem -->
                                                                        <div>

                                                                                <span>
                                                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/badges_Adventurer-copy-50x50.png" alt="" height="10" width="10">
                                                                                </span>
                                                                                <span> <?php echo !empty($user_gems_points) ? $user_gems_points : 0; ?> </span>

                                                                        </div>
                                                                        <!-- points -->
                                                                        <div>
                                                                            <span>
                                                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/gamipress-icon-star-filled-50x50.png" alt="" height="10" width="10">
                                                                                </span>
                                                                                <span> <?php echo !empty($user_total_points) ? $user_total_points : 0; ?> </span>

                                                                        </div>
                                                                    </div><!--end learner-awards -->
                                                                </div>
                                                                <!-- learner summery -->
                                                                <div class="learner-summery ">


                                                                    <div>
                                                                        <span class="learner-num learner-num-recorded"> <?= $child_recorded_hrs; ?> </span>
                                                                        <span class="account-overview-num" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Recorded Hours"><span class="material-icons">av_timer</span>Recorded</span>
                                                                    </div>

                                                                    <div>
                                                                        <span class="learner-num learner-num-late"> <?= $child_late_times ?> </span>
                                                                        <span class="account-overview-num" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Late Attendance"><span class="material-icons">access_alarm</span>Late</span>
                                                                    </div>
                                                                    <div>
                                                                        <span class="learner-num learner-num-cancellation"> <?= $child_cancelled_times ?> </span>
                                                                        <span class="account-overview-num" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cancellations"><span class="material-icons">do_not_disturb</span>Cancellations</span>
                                                                    </div>
                                                                    <div>
                                                                        <span class="learner-num learner-num-no_show"> <?= $child_noshow_student ?> </span>
                                                                        <span class="account-overview-num" data-bs-toggle="tooltip" data-bs-placement="bottom" title="No show"><span class="material-icons">disabled_visible</span>No Shows</span>
                                                                    </div>
                                                                </div> <!-- end learner summery -->
                                                                <!-- learner password -->
                                                                <?php if(!empty($pw_string)): ?>
                                                                    <div class="learner-password-container pass-big-scrns">
                                                                        <input type="password" class="learner-password" value="<?= $pw_string ?>"/>
                                                                        <button class="pass-btn">
                                                                            <span class="material-icons">visibility</span>
                                                                        </button>
                                                                    </div><!--end learner password -->
                                                                <?php else: ?>
                                                                    <!-- <a href="#" class="button set_new_pass" data-wp-user-id="<?= $child_id; ?>"> set new password </a> -->
                                                                    <!-- I added some style to align the design  -->
                                                                    <div class="learner-password-container pass-big-scrns">
                                                                        <input type="text" value="" class="set-new-password-input hidden">
                                                                        <input type="hidden" class="member_wp_user_id" value="<?= $child_id ?>">
                                                                        <a href="#" class="button set_new_pass" data-balloon-pos="down" data-balloon="Set New Password"  data-wp-user-id="<?= $child_id; ?>">
                                                                            <span class="material-icons new">lock_reset</span>
                                                                            <span class="material-icons update hidden">save</span>
                                                                        </a>
                                                                        <span class="material-icons cancel hidden">close</span>
                                                                    </div>
                                                                <?php endif; ?>

                                                                <!-- learner view details btn -->
                                                                <div class="learner-dtails-btn-container ">
                                                                    <button class="learners-details-btn">
                                                                        details
                                                                        <span class="material-icons">keyboard_arrow_down</span>
                                                                    </button>
                                                                </div> <!-- end learner view details btn -->
                                                            </div>

                                                            <div class="account-learners-details w-100">

                                                                <!-- basic data -->
                                                                <div class="learner-basic-data">
                                                                    <input type="hidden" class="member_wp_user_id" value="<?= $child_id ?>">
                                                                    <div class="ajax_image_section"> <div class="ajaxloader"></div> </div>
                                                                    <!-- title -->
                                                                    <div>
                                                                        <span>
                                                                            <span class="material-icons">person</span>
                                                                            Basic Info
                                                                         </span>
                                                                        <div class="member-actions-btns">
                                                                            <!-- edit btn -->
                                                                            <button title="edit" class="learner-edit-btn">
                                                                                <span class="material-icons">edit</span>
                                                                            </button>

                                                                            <!-- update btn -->
                                                                            <button title="update" class="learner-update-btn update_member_data hidden">
                                                                                <span class="material-icons">save</span>
                                                                            </button>
                                                                        </div>


                                                                    </div>
                                                                    <!-- data table -->
                                                                    <table>
                                                                        <thead>
                                                                        <tr>
                                                                            <td class="learner-table-fullName">Full Name</td>
                                                                            <td class="learner-table-gender">Gender</td>
                                                                            <td class="learner-table-DateOfBirth">Date Of Birth</td>
                                                                            <td class="learner-table-studentId">Student ID</td>
                                                                            <td class="learner-table-email">Email</td>
                                                                            <td class="learner-table-pass">pass</td>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <tr>
                                                                            <td class="learner-table-fullName"> <?php echo $full_name; ?> </td>
                                                                            <td class="learner-table-gender"> <?php echo !empty($child_gender_meta) ? $child_gender_meta : 'NA'; ?> </td>
                                                                            <td class="learner-table-DateOfBirth"> <?php echo !empty($child_birthday) ? $child_birthday : 'NA'; ?> </td>
                                                                            <td class="learner-table-studentId"> <?php echo !empty($user_name) ? $user_name : 'NA'; ?> </td>
                                                                            <td class="learner-table-email"> <?php echo !empty($child_email) ? $child_email : 'NA'; ?> </td>
                                                                            <td class="learner-password-container learner-table-pass">
                                                                                <input type="password" class="learner-password" value="fgfdgdhhhhhhhhhhhhhhhhhgdg"/>
                                                                                <button class="pass-btn">
                                                                                    <span class="material-icons">visibility</span>
                                                                                </button>
                                                                            </td>
                                                                        </tr>

                                                                        <tr class="edit_member hidden">
                                                                            <td class="learner-table-fullName"> <input type="text" value="<?= $full_name ?>"> </td>
                                                                            <td class="learner-table-gender">
                                                                                <select>
                                                                                    <option value="male" <?= ($child_gender_meta == 'male') ? 'selected' : '' ?> > Male </option>
                                                                                    <option value="female" <?= ($child_gender_meta == 'female') ? 'selected' : '' ?> > Female </option>
                                                                                </select>
                                                                            </td>
                                                                            <td class="learner-table-DateOfBirth"> <input type="date" value="<?= !empty($child_birthday) ? $child_birthday : 'NA'; ?>"> </td>
                                                                            <td class="learner-table-studentId"> </td>
                                                                            <td class="learner-table-email"> <input type="email" value="<?= !empty($child_email) ? $child_email : 'NA'; ?>"> </td>
                                                                            <td class="learner-password-container learner-table-pass">
                                                                                <input type="password" class="learner-password" value="fgfdgdhhhhhhhhhhhhhhhhhgdg"/>
                                                                                <button class="pass-btn">
                                                                                    <span class="material-icons">visibility</span>
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div><!-- end basic data -->

                                                                <?php if( !empty($user_groups['groups']) ): ?>
                                                                    <!-- Learner deatils -->
                                                                    <div class="learner-subjects-data">
                                                                        <h6>
                                                                            <span class="material-icons">auto_stories</span>
                                                                            Assigned Learning
                                                                        </h6>
                                                                        <table>
                                                                            <thead>
                                                                            <tr>
                                                                                <td class="learner-subject-name">Name</td>
                                                                                <td class="learner-subject-teacher">Teacher</td>
                                                                                <td class="learner-subject-status">Status</td>
                                                                                <td class="learner-subject-Assignedhours">Assigned Hours</td>
                                                                                <td class="learner-subject-action">Action</td>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>

                                                                            <?php
                                                                            foreach ( $user_groups['groups'] as $bb_group_id ):
                                                                                $group_name = getBBgroupName($bb_group_id);

                                                                                // get teacher assigned
                                                                                $sp_entry_id = getBBgroupGFentryID($bb_group_id);
                                                                                $teacher_meta = getGFentryMetaValue($sp_entry_id, 8);
                                                                                if( !empty($teacher_meta) ):
                                                                                    $teacher_id = $teacher_meta[0]->meta_value;
                                                                                    $teacher_name = getStaffFullName($teacher_id);
                                                                                endif;

                                                                                // get program status
                                                                                $group_status = getGFentryMetaValue($sp_entry_id, 26);
                                                                                if( !empty($group_status) ):
                                                                                    $program_status = $group_status[0]->meta_value;
                                                                                endif;

                                                                                // get program assigned hrs
                                                                                $group_assigned_hrs = getGFentryMetaValue($sp_entry_id, 27);
                                                                                if( !empty($group_assigned_hrs) ):
                                                                                    $assigned_hours = $group_assigned_hrs[0]->meta_value;
                                                                                endif;


                                                                                $group_obj = groups_get_group ( $bb_group_id );
                                                                                $bb_group_permalink = bp_get_group_permalink( $group_obj );


                                                                                ?>
                                                                                <tr>
                                                                                    <td class="learner-subject-name"> <?php echo !empty($group_name) ? substr($group_name,0, 15) : 'NA'; ?> ... </td>
                                                                                    <td class="learner-subject-teacher"> <?php echo !empty($teacher_name) ? substr($teacher_name,0, 15) : 'NA'; ?> ... </td>
                                                                                    <td class="learner-subject-status"><span> <?php echo !empty($program_status) ? $program_status : 'NA'; ?> </span></td>
                                                                                    <td class="learner-subject-Assignedhours"> <?php echo !empty($assigned_hours) ? $assigned_hours : 0; ?> </td>
                                                                                    <td class="learner-subject-action"><a href="<?= $bb_group_permalink; ?>" target="_blank"><span class="material-icons">launch</span></a></td>
                                                                                </tr>
                                                                            <?php   endforeach; ?>

                                                                            </tbody>
                                                                        </table>
                                                                    </div><!-- end contact Info -->
                                                                <?php else: ?>
                                                                    <span class="text-center"> No programs available. </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <!-- end of learner item -->
                                                    <?php

                                                    endforeach;
                                                else:
                                                    echo '<span class="text-center"> No data available. </span>';
                                                endif;


                                                ?>

                                            </section>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="aaaa" aria-labelledby="aaaa">
                                        <div class="row" id="basic-table">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">

                                                        <h5 class="request-sponsership-tab-title"><span class="material-icons">person</span>Add new learner</h5>

                                                        <form action="" method="post" class="learner_form">
                                                            <div style="display:none;" class="ajax_image_section learner_loader"> <div class="ajaxloader"></div> </div>
                                                            <table class="table table-borderless add_learner_table">
                                                                <tbody>

                                                                <tr>
                                                                    <td>
                                                                        <label><span class="material-icons">person</span>Name:<span class="required-star">*</span></label>
                                                                    </td>

                                                                    <td>
                                                                        <div class="row">
                                                                            <input class="col-md-6 col-sm-12" name="FirstName" required="required" type="text" placeholder="First Name"/>
                                                                            <input class="col-md-6 col-sm-12" name="LastName" required="required" type="text"  placeholder="Last Name"/>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td><label><span class="material-icons">wc</span> Gender:<span class="required-star">* </label></td>
                                                                    <td>
                                                                        <div class="row">
                                                                            <select name="gender" required="required">
                                                                                <option  selected="true" disabled="disabled">Choose Gender</option>
                                                                                <option value="Male">Male</option>
                                                                                <option value="Female">Female</option>
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label><span class="material-icons">calendar_today</span> Date of Birth:</label></td>
                                                                    <td>
                                                                        <div class="row">
                                                                            <input name="birthday" type="date"/>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label><span class="material-icons">family_restroom</span> Relashionship:</label></td>
                                                                    <td>
                                                                        <div class="row">
                                                                            <select name="relation" required="required">
                                                                                <option  selected="true" disabled="disabled">Choose Relationship</option>
                                                                                <option value="Son">Son</option>
                                                                                <option value="Daughter">Daughter</option>
                                                                                <option value="Husband ">Husband </option>
                                                                                <option value="Wife ">Wife </option>
                                                                                <option value="Brother">Brother</option>
                                                                                <option value="Sister">Sister</option>
                                                                                <option value="Father">Father</option>
                                                                                <option value="Mother">Mother</option>
                                                                                <option value="Grandfather ">Grandfather </option>
                                                                                <option value="Grandmother">Grandmother</option>
                                                                                <option value="Grandchild">Grandchild</option>
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label><span class="material-icons">family_restroom</span>Additional info:</label> </td>
                                                                    <td>
                                                                        <div class="row">
                                                                            <input class="col-md-6 col-sm-12"  name="primary_phone" type="text" placeholder="Optional phone"/>
                                                                            <input class="col-md-6 col-sm-12" name="secondary_email"  type="text" placeholder="Optional Email"/>
                                                                        </div>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label><span class="material-icons">key</span>Password:<span class="required-star">*</label></td>
                                                                    <td>
                                                                        <div class="row">
                                                                            <input  name="u_pass" required="required" type="password"  placeholder="Add Password"/>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="add-new-learner">
                                                                        <button type="button" class="add_child_btn" name="add_new_learner" value="1" class="px-3">Add</button>
                                                                    </td>
                                                                </tr>

                                                                </tbody>
                                                            </table>
                                                            <input type="hidden" name="u_email" class="fake_mail" value="std<?php echo rand(10010,99999) .  wpf_get_contact_id(get_current_user_id()); ?>@muslimeto.com" />
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="aaaaa" aria-labelledby="aaaaa">
                                        <div class="row" id="basic-table">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title">Basic 4</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="card-text">Using the most basic table up, here’s how
                                                            <code>.table</code>-based tables look in Bootstrap. You can use any example
                                                            of below table for your table and it can be use with any type of bootstrap tables.
                                                        </p>
                                                        <p><span class="text-bold-600">Example 1:</span> Table with outer spacing</p>
                                                        <!-- Table with outer spacing -->
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th>NAME</th>
                                                                    <th>RATE</th>
                                                                    <th>SKILL</th>
                                                                    <th>TYPE</th>
                                                                    <th>LOCATION</th>
                                                                    <th>ACTION</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td class="text-bold-500">Michael Right</td>
                                                                    <td>$15/hr</td>
                                                                    <td class="text-bold-500">UI/UX</td>
                                                                    <td>Remote</td>
                                                                    <td>Austin,Taxes</td>
                                                                    <td><a href="javascript:void(0);"><i class="badge-circle badge-circle-light-secondary fa fa-envelope font-medium-1"></i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">Morgan Vanblum</td>
                                                                    <td>$13/hr</td>
                                                                    <td class="text-bold-500">Graphic concepts</td>
                                                                    <td>Remote</td>
                                                                    <td>Shangai,China</td>
                                                                    <td><a href="javascript:void(0);"><i class="badge-circle badge-circle-light-secondary fa fa-envelope font-medium-1"></i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">Tiffani Blogz</td>
                                                                    <td>$15/hr</td>
                                                                    <td class="text-bold-500">Animation</td>
                                                                    <td>Remote</td>
                                                                    <td>Austin,Texas</td>
                                                                    <td><a href="javascript:void(0);"><i class="badge-circle badge-circle-light-secondary fa fa-envelope font-medium-1"></i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">Ashley Boul</td>
                                                                    <td>$15/hr</td>
                                                                    <td class="text-bold-500">Animation</td>
                                                                    <td>Remote</td>
                                                                    <td>Austin,Texas</td>
                                                                    <td><a href="javascript:void(0);"><i class="badge-circle badge-circle-light-secondary fa fa-envelope font-medium-1"></i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-bold-500">Mikkey Mice</td>
                                                                    <td>$15/hr</td>
                                                                    <td class="text-bold-500">Animation</td>
                                                                    <td>Remote</td>
                                                                    <td>Austin,Texas</td>
                                                                    <td><a href="javascript:void(0);"><i class="badge-circle badge-circle-light-secondary fa fa-envelope font-medium-1"></i></a></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php elseif ($rol == 'staff' || $rol == 'teacher') :?>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <?php echo do_shortcode('[bookly-staff-schedule]') ?>
                            </div>
                        </div>
                    </div>
                <?php elseif ($rol == 'student') :?>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <?php echo do_shortcode('[ld_report_card]') ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<script>
    // document ready
    (function($) {
        // show hide details
        let memberItems = document.querySelectorAll(".learners-details-btn");
        let memberDetail = document.querySelectorAll(".account-learners-details");
        let showDetails = () => {
            for (let i = 0; i < memberItems.length; i++) {
                memberItems[i].addEventListener("click", function () {
                    memberDetail[i].classList.toggle("toggle_details");
                    memberItems[i].classList.toggle("rotate-btn");
                })
            }
        };
        showDetails();
        // password visibility
        let PassBtn = document.querySelectorAll(".pass-btn");
        let LearnerPass = document.querySelectorAll(".learner-password");
        let showHidePass = () => {
            for (let i = 0; i < PassBtn.length; i++) {
                PassBtn[i].addEventListener("click", function () {
                    if (LearnerPass[i].type == "password") {
                        LearnerPass[i].type = "text";
                        PassBtn[i].innerHTML = "<span class='material-icons'>visibility_off</span>"
                    } else {
                        LearnerPass[i].type = "password";
                        PassBtn[i].innerHTML = "<span class='material-icons'>visibility</span>"
                    }

                })
            }
        };
        showHidePass();

        $('.add_child_btn').on('click', function(e){
            $('.ajax_image_section.learner_loader').show();
            const FirstName = $('input[name="FirstName"]').val();
            const LastName = $('input[name="LastName"]').val();
            const u_email = $('input[name="u_email"]').val();
            const birthday = $('input[name="birthday"]').val();
            const primary_phone = $('input[name="primary_phone"]').val();
            const secondary_email = $('input[name="secondary_email"]').val();
            const u_pass = $('input[name="u_pass"]').val();
            const relation = $('select[name="relation"]').val();
            const gender = $('select[name="gender"]').val();

            $.post('/wp-admin/admin-ajax.php', {
                action: 'add_new_learner_for_prnt',
                FirstName: FirstName ,
                LastName:  LastName ,
                u_email:  u_email ,
                birthday: birthday ,
                primary_phone: primary_phone ,
                secondary_email:  secondary_email ,
                u_pass:  u_pass ,
                relation:  relation ,
                gender:  gender
            }, function (response){
                if(response.success){
                    $.showInfo('New learner Added Successfully');
                }else{
                    $.showError(response.data[0].message);
                }
                $('.ajax_image_section.learner_loader').hide();
            })
        });

        // collapse expand btn
        $('#expand_collapse_all_learner').on("click",function(){
          if($('#expand_collapse_all_learner').text().indexOf("Collapse All") >= 0){
            $('.account-learners-details').removeClass("toggle_details");
              $('#expand_collapse_all_learner').html("Expand All <i class='bb-icon-angle-down bb-icon-l'></i>")
          }
          else if($('#expand_collapse_all_learner').text().indexOf("Expand All") >=0){

            $('.account-learners-details').addClass("toggle_details");
            $('#expand_collapse_all_learner').html("Collapse All <i class='bb-icon-angle-up bb-icon-l'></i>");

          }

        })
    }(jQuery));

</script>
