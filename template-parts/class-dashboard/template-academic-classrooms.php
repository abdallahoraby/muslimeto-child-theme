<?php  get_template_part('template-parts/class-dashboard/template-academic-style'); ?>

<style>
    @media screen and (min-width: 1800px){

        .Academic-cards {
            grid-template-columns: repeat(3,1fr);
        }

    }


</style>

<!-- filter section -->
<div class="academic-filter-container">

    <div class="center-filter">
        <!-- switch class timezone -->
        <div class="switch-timezone-section">
            <input type="radio" id="cairo-timezone" name="timezone-switch" value="cairo">
            <label for="cairo-timezone" class="active-time-zone-cairo">Cairo</label>
            <input type="radio" id="client-timezone" name="timezone-switch" value="client" checked>
            <label for="client-timezone" >Client</label>

        </div>
    </div>

    <!-- right filter -->
    <div class="right-filter">

        <!-- list & column view  -->
        <div class="grid-filters " data-object="members">
            <a href="#" class="layout-view layout-grid-view bp-tooltip " data-view="grid" data-bp-tooltip-pos="up" data-bp-tooltip="Grid View">
                <i class="bb-icon-grid-view-small" aria-hidden="true"></i>
            </a>
            <a href="#" class="layout-view layout-list-view bp-tooltip active" data-view="list" data-bp-tooltip-pos="up" data-bp-tooltip="List View">
                <i class="bb-icon-list-view-small" aria-hidden="true"></i>
            </a>
        </div><!-- end of list & column view  -->
    </div>


</div>
<!--end of filter section  -->



<div class="groups-content">

<?php

    // get groups of type 'mvs' for current logged in user

    $type = 'alphabetical';

    $groups_args = array(
        'user_id'  => get_current_user_id(),
        'type'     => $type,
        'per_page' => 999,
        'group_type' => 'class'
    );

    if ( bp_has_groups( $groups_args ) ) : ?>

        <section class="Academic-cards">

        <?php while ( bp_groups() ) : bp_the_group(); ?>
            <?php

            $group_avatar = bp_get_group_avatar(array(
                'class' => 'card__image'
            ));

            $bb_group_id = bp_get_group_id();

            $user_bb_groups_obj = groups_get_groups(array('include' => $bb_group_id));
            $user_bb_groups = $user_bb_groups_obj['groups'];
            $bb_group_desc = substr($user_bb_groups[0]->description,0, 50) ;

            $group_members = getBBgroupMembersNames($bb_group_id);

            $sp_entry_id = getBBgroupGFentryID($bb_group_id);
            $bb_group_timezone = getSPentryTimezone($sp_entry_id);

            $staff_timezone = getUserTimezone(get_current_user_id());
            $schedules_data = getBBgroupSchedulesAsText($bb_group_id, $bb_group_timezone, $staff_timezone);


            $client_schedule_tooltip = '';
            $staff_schedule_tooltip = '';
            if( !empty($schedules_data) ):
                foreach ( $schedules_data['schedule_text'] as $schedules_item):
                    $client_schedule_tooltip .= $schedules_item . '<br>';
                endforeach;

                foreach ( $schedules_data['schedule_text_converted'] as $schedules_item):
                    $staff_schedule_tooltip .= $schedules_item . '<br>';
                endforeach;
            endif;


            $zoom_meeting_id = getZoomMeetingID($bb_group_id);

            //$zoom_meeting_id = getGFentryMetaValue($sp_entry_id, 11);
            $bb_group_type = getBBgroupType($bb_group_id);

            $bp_group_type = bp_groups_get_group_type($bb_group_id);



            // get parent for first member in this group
            $args = array(
                'group_id' => $bb_group_id,
                'max' => 999,
                'exclude_admins_mods' => true,
                'exclude_banned' => true,
            );
            $group_members_data = groups_get_group_members( $args )['members'];
            if( !empty($group_members_data) ):
                $child_user_id = $group_members_data[0]->id;
                $parent_wp_user_id = getParentID($child_user_id);
                // get parent record in makeup_log table
                global $wpdb;
                $makeup_log_table = $wpdb->prefix . 'muslimeto_makeup_log';
                $open_balance_result = $wpdb->get_results(
                    "SELECT trans_amount FROM $makeup_log_table WHERE parent_id = {$parent_wp_user_id} AND trans_type = 'open-balance'"
                );
                $wpdb->flush();

                if( !empty($open_balance_result) ):
                    $user_has_open_balance = true;
                else:
                    $user_has_open_balance = false;
                endif;
            endif;



            // show only 'active' groups in academic page
            if( !empty($sp_entry_id) ):
                $program_status_meta = getGFentryMetaValue($sp_entry_id, 26);
                if( !empty($program_status_meta) ):
                    $program_status = $program_status_meta[0]->meta_value;
                endif;
            endif;

            // coloring based on program status
            switch ($program_status):
                case "Active":
                    $status_color = 'var(--green)';
                    break;
                case "Inactive":
                    $status_color = 'var(--bs-red)';
                    break;
                case "Hold":
                    $status_color = 'var(--logo_blue)';
                    break;
                case "Suspended":
                    $status_color = 'var(--bs-orange)';
                    break;
                default:
                    $status_color = '#fff';
            endswitch;

            $user_is_support = user_has_role(get_current_user_id(), 'support');

            if( $program_status !== 'Inactive' && $bp_group_type == 'class' && $bb_group_type == 'mvs' ):

                ?>

                <!-- academic class item -->
                <div class="Academic-item card Academic-status-success" data-group-id="<?php echo $bb_group_id; ?>" data-group-type="<?php echo $bb_group_type; ?>"
                     style="border-color: <?= $status_color ?>;">
                    <!-- academic item contentainer -->
                    <div class="Academic-item-content ">
                        <!--left section group icon & student imgs  -->
                        <div class="Academic-item-media">
                            <!-- group type icon -->

                            <!-- <span class="material-icons class-type-icon">
                                person
                            </span> -->
                            <span class="class-type-icon">
                                     <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon_classroom_blue.svg" class="upcoming-class-img" alt="" width="20px" height="auto">
                                </span>
                            <!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon_classroom.svg" class="upcoming-class-img" alt="" width="20px" height="auto"> -->

                            <!-- student imgs -->
                            <div class="students-imgs">
                                <?php echo buddyboss_theme()->buddypress_helper()->group_members( bp_get_group_id(), array( 'member', 'mod', 'admin' ) ); ?>
                            </div>
                        </div>
                        <div class="Academic-item-info">
                            <div class="card-header">
                                <!--academic class name  -->
                                <a href="<?php bp_group_permalink(); ?>"  class="Academic-item-title ">
                                    <?php echo bp_group_name();?>
                                </a><!--end of academic class name -->

                                <!-- zoom join button -->
                                <?php
                                if(!empty($zoom_meeting_id)):
                                    $join_url = 'https://muslimeto.zoom.us/j/'.$zoom_meeting_id;
                                    $icon = '<span class="material-icons custom-material-icons">headset_mic </span>';
                                    ?>
                                    <a class="button zoom-join small-text" target="_blank" href="<?php echo $join_url; ?>"> <?php echo $icon . $icon_hover ; ?> <span class="small-text"> <?php echo $zoom_meeting_id; ?> </span> </a>
                                <?php else: // show teacher meeting id (one-on-one )  ?>

                                <?php endif; ?>
                                <!-- end of zoom join button -->
                            </div>


                            <!-- schedule -->
                            <div class="Academic-item-schedule small-text">
                                <span class="material-icons custom-material-icons">public</span>
                                <div class="academic-date">
                                    <?php if( !empty($schedules_data) ): ?>

                                        <div class="show-schedules-client-timezone hidden">

                                            <div class="tooltip-schedule"> <?= $client_schedule_tooltip ?> </div>

                                            <?php foreach ( $schedules_data['schedule_text'] as $schedules_item): ?>
                                                <p class="client-date schedule_item"> <?= $schedules_item ?> </p>
                                            <?php endforeach; ?>

                                        </div>

                                        <div class="show-schedules-cairo-timezone active">
                                            <div class="tooltip-schedule"> <?= $staff_schedule_tooltip ?> </div>

                                            <?php foreach ( $schedules_data['schedule_text_converted'] as $schedules_item): ?>
                                                <p class="cairo-date schedule_item"> <?= $schedules_item ?> </p>
                                            <?php endforeach; ?>

                                        </div>

                                    <?php else: ?>
                                        N/A
                                    <?php endif; ?>
                                </div>
                            </div><!-- end of schedule -->

                            <!-- <?php echo $bb_group_desc; ?> -->
                            <div class="academic-members-names small-text">
                                <span class="material-icons custom-material-icons">school</span>
                                <ul class="academic-members-name-list">
                                    <?php if( !empty($group_members) ): ?>
                                        <?php foreach ( $group_members as $group_member): ?>
                                            <li class="academic-members-name-list-item"> <?php echo $group_member; ?> </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--academic status  -->
                    <div class="Academic-item-status">
                        <small>
                            <?php
                            printf(
                            /* translators: %s = last activity timestamp (e.g. "active 1 hour ago") */
                                __( 'active %s', 'buddyboss-theme' ),
                                bp_get_group_last_active()
                            );
                            ?>
                        </small>
                        <span class="material-icons academic-quickaction-menu-btn"> more_horiz </span>
                        <!-- quick action -->

                    </div> <!--academic status  -->

                    <div class="academic-quick-view-manu">
                        <div class="academic-quick-view-content animate">
                            <ul>
                                <!-- dashboard -->
                                <li>
                                    <a href="<?php bp_group_permalink(); ?>" class="link_loader">
                                        <span class="material-icons">dashboard</span>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <!-- feed back -->
                                <li class="hidden">
                                    <a>
                                        <span class="material-icons">feedback</span>
                                        <span>Feedback</span>
                                    </a>
                                </li>
                                <!-- support -->
                                <li>
                                    <a href="/new-ticket?cid=<?php echo $bb_group_id; ?>" class="link_loader">
                                        <span class="material-icons">support_agent</span>
                                        <span>Support</span>
                                    </a>
                                </li>
                                <!-- dashboard -->
                                <?php
                                // check if teacher only show reminder button
                                //                                        if( Bookly\Lib\Entities\Staff::query()->where( 'wp_user_id', get_current_user_id() )->count() > 0 ):
                                if( user_has_role(get_current_user_id(), 'administrator') ):

                                    // get next upcoming class for this group
                                    $next_upcoming_class = getBBgroupUpcomingClass($bb_group_id);

                                    if( !empty($next_upcoming_class) ):
                                        // check if now_date_time >= start_date && now_date_time <= end_date
                                        $start_date = $next_upcoming_class[0]->start_date;
                                        $end_date = $next_upcoming_class[0]->end_date;
                                        $aid = $next_upcoming_class[0]->id;
                                        if( strtotime($now_date_time) >= strtotime($start_date) && strtotime($now_date_time) <= strtotime($end_date) ):
                                            // class in-progress, activate reminder

                                            // get last reminder sent datetime
                                            $last_reminder_date = classLastReminderDateTime($bb_group_id);
                                            if( !empty($last_reminder_date) ):
                                                // check if 15 mins has passed from last reminder sent
                                                $dbtimestamp = strtotime($last_reminder_date);
                                                $nowtimestamp = strtotime($now_date_time);
                                                if ( $nowtimestamp - $dbtimestamp > 15 * 60):
                                                    // 15 mins has passed, show reminder
                                                    $disable_reminder = '';
                                                else:
                                                    $disable_reminder = 'disabled style="cursor: not-allowed; opacity: 0.5;"';
                                                endif;
                                            else:
                                                $disable_reminder = '';
                                            endif;

                                        else:
                                            // disable reminder
                                            $disable_reminder = 'disabled style="cursor: not-allowed; opacity: 0.5;"';
                                        endif;

                                    endif;


                                    ?>
                                    <li>
                                        <button type="button" class="academic-send-reminder" <?= $disable_reminder ?> data-cid="<?= $bb_group_id ?>" data-aid="<?= $aid ?>" >
                                            <span class="material-icons">schedule_send</span>
                                            <span >Send Reminder</span>
                                        </button>
                                        <!-- send reminder note for count doun -->
                                        <div class="academic-send-reminder-count-down"> </div>
                                    </li>

                                <?php endif; ?>

                                <?php if( user_has_role(get_current_user_id(), 'student') ||
                                    user_has_role(get_current_user_id(), 'tutoring_student') ||
                                    user_has_role(get_current_user_id(), 'teacher') ||
                                    user_has_role(get_current_user_id(), 'new_teacher') ): ?>
                                    <li>
                                        <a href="#" class="academic-practice" data-cid="<?= $bb_group_id ?>">
                                            <span class="material-icons">schedule_send</span>
                                            <span > Practice </span>
                                        </a>
                                    </li>

                                <?php endif; ?>

                                <?php
                                //if( Bookly\Lib\Entities\Staff::query()->where( 'wp_user_id', get_current_user_id() )->count() > 0 && $bp_group_type == 'class' ):
                                if( user_has_role(get_current_user_id(), 'team_leader') && $bp_group_type == 'class' && $user_has_open_balance == true ): ?>
                                    <li>
                                        <a href="javascript:void(0);" data-bb-group-id="<?= $bb_group_id ?>" class="academic-schedule-makeup" data-bs-toggle="modal" data-bs-target="#schedule-makeup-session" >
                                            <span class="material-icons">event</span>
                                            <span > Schedule Makeup </span>
                                        </a>
                                    </li>
                                <?php endif; ?>

                            </ul>
                        </div>
                    </div>


                </div> <!--end of  academic class item -->

            <?php endif; ?>


        <?php endwhile; ?>

        </section>

    <?php else: ?>

        <?php echo __( "No groups matched the current filter.", 'buddyboss' ); ?>

    <?php endif; ?>


</div>


<?php  get_template_part('template-parts/class-dashboard/template-academic-script'); ?>