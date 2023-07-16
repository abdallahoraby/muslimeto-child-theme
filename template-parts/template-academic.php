<?php


$current_date_object = new DateTime('now', new DateTimeZone('UTC'));
$now_date_time = $current_date_object->format('Y-m-d H:i:s');

//    $args = array(
//        'type'               => false,          // Active, newest, alphabetical, random, popular.
//        'order'              => 'DESC',         // 'ASC' or 'DESC'
//        'orderby'            => 'date_created', // date_created, last_activity, total_member_count, name, random, meta_id.
//        'user_id'            => get_current_user_id(),          // Pass a user_id to limit to only groups that this user is a member of.
//        'include'            => false,          // Only include these specific groups (group_ids).
//        'exclude'            => false,          // Do not include these specific groups (group_ids).
//        'parent_id'          => null,           // Get groups that are children of the specified group(s).
//        'slug'               => array(),        // Find a group or groups by slug.
//        'search_terms'       => false,          // Limit to groups that match these search terms.
//        'search_columns'     => array(),        // Select which columns to search.
//        'group_type'         => '',             // Array or comma-separated list of group types to limit results to.
//        'group_type__in'     => '',             // Array or comma-separated list of group types to limit results to.
//        'group_type__not_in' => '',             // Array or comma-separated list of group types that will be excluded from results.
//        'meta_query'         => false,          // Filter by groupmeta. See WP_Meta_Query for syntax.
//        'show_hidden'        => false,          // Show hidden groups to non-admins.
//        'status'             => array(),        // Array or comma-separated list of group statuses to limit results to.
//        'per_page'           => 20,             // The number of results to return per page.
//        'page'               => 1,              // The page to return if limiting per page.
//        'update_meta_cache'  => true,           // Pre-fetch groupmeta for queried groups.
//        'update_admin_cache' => false,
//        'fields'             => 'all',          // Return BP_Groups_Group objects or a list of ids.
//    );
//    $user_bb_groups_obj = groups_get_groups($args);
//    $user_bb_groups = $user_bb_groups_obj['groups'];




    ?>

<?php  get_template_part('template-parts/class-dashboard/template-academic-style'); ?>

<div class="bb-groups-content academic-home" >

     <!-- <div class="preloader"></div> -->

    <?php
    $per_page = 1;
    global $wp;
    $current_page_url = home_url( $wp->request ).'/';

    $bb_user_groups_count = bp_get_total_group_count_for_user( get_current_user_id() );

    // How many pages will there be
    $pages = ceil($bb_user_groups_count / $per_page);

//    if( !empty($pages) ):
//        for ($page_num = 1; $page_num <= $pages; $page_num++):
//            echo '<a href="#" class="get_groups_page" data-page-num="'.$page_num.'" data-per-page="'.$per_page.'"> '. $page_num .' </a>';
//        endfor;
//    endif;

    ?>

    <!-- filter section -->
    <div class="academic-filter-container">
        <!-- left filter -->
        <div class="left-filter">
            <!-- search  -->
            <div class="dir-search members-search bp-search" data-bp-search="members">
                <form action="" method="get" class="bp-dir-search-form" id="dir-members-search-form" autocomplete="off">
                    <button type="submit" id="dir-members-search-submit" class="nouveau-search-submit" name="dir_members_search_submit">
                        <span class="dashicons dashicons-search" aria-hidden="true"></span>
                        <span id="button-text" class="bp-screen-reader-text">Search</span>
                    </button>
                    <label for="dir-members-search" class="bp-screen-reader-text">Search Members…</label>
                    <input id="dir-members-search" name="members_search" type="search" placeholder="Search Members…">
                </form>
            </div>
        </div>
        
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
            <!-- filter gruop -->
            <div class="bp-members-filter-wrap subnav-filters filters no-ajax">
                    <div id="dir-filters" class="component-filters clearfix">
                        <div id="members-order-select" class="last filter">
                            <label class="bp-screen-reader-text" for="groups-order-by">
                                <span>Order By:</span>
                            </label>
                            <div class="select-wrap">
                                <select id="groups-order-by" data-bp-filter="members">
                                    <option value="all-group-type">All</option>
                                    <option value="one-on-one">One on One</option>
                                    <option value="family-group">Family Group</option>
                                    <option value="open-group">Open Group</option>
                                    <option value="mvs">MVS</option>
                                </select>
                                <span class="select-arrow" aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>
            </div><!-- end of filter group  -->

            <!-- list & column view  -->
            <div class="grid-filters " data-object="members">
                        <a href="#" class="layout-view layout-grid-view bp-tooltip active" data-view="grid" data-bp-tooltip-pos="up" data-bp-tooltip="Grid View">
                            <i class="bb-icon-grid-view-small" aria-hidden="true"></i>
                        </a>
                        <a href="#" class="layout-view layout-list-view bp-tooltip " data-view="list" data-bp-tooltip-pos="up" data-bp-tooltip="List View">
                            <i class="bb-icon-list-view-small" aria-hidden="true"></i>
                        </a>
            </div><!-- end of list & column view  -->
        </div>



    </div><!--end of filter section  -->

    <!-- academic content -->
   <div class="groups-content">
        <?php

        $bb_group_args = array(
            'user_id' => get_current_user_id(),
            'per_page' => 12,
        );


        if ( bp_has_groups( $bb_group_args ) ) : ?>

           <section class="Academic-cards">


                <?php
                while ( bp_groups() ) :
                    bp_the_group();
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

                    if( $program_status !== 'Inactive' && $bp_group_type == 'class' ):

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
                                         <span > Send A Voice Note </span>
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

            <div class="pagination">

                <div class="pag-count" id="group-dir-count">
                    <?php bp_groups_pagination_count() ?>
                </div>

                <div class="pagination-links" id="group-dir-pag">
                    <?php bp_groups_pagination_links() ?>
                </div>

            </div>


        <?php else : ?>

            <?php bp_nouveau_user_feedback( 'groups-loop-none' ); ?>

        <?php endif; ?>

    </div>


<?php  get_template_part('template-parts/class-dashboard/template-academic-script'); ?>
