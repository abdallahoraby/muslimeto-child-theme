<?php


/**
 * BuddyBoss - Groups Home
 *
 * @since BuddyPress 3.0.0
 * @version 3.0.0
 */

$bp_nouveau_appearance = bp_get_option('bp_nouveau_appearance');
$group_cover_width = buddyboss_theme_get_option( 'buddyboss_group_cover_width' );

if( getPostbyMetavalue('is_academic_page') ):
    $menu_item_id = getPostbyMetavalue('is_academic_page')[0]->post_id;
    echo '<input type="hidden" value="menu-item-'. $menu_item_id .'" id="academic_page_menu">';
endif;



if ( bp_has_groups() ) :
    while ( bp_groups() ) :
        bp_the_group();
        $group_avatar = bp_get_group_avatar(array(
            'class' => 'group_avatar'
        ));

        $bb_group_id = bp_get_current_group_id();
        $bb_group_type = getBBgroupType($bb_group_id);

        if( $bb_group_type !== 'mvs' ):
           $hide_tabs = false;
        else:
            $hide_tabs = true;
        endif;

        $bb_group_Type = bp_groups_get_group_type( $bb_group_id );
        if( $bb_group_Type == 'school' || $bb_group_Type == 'organization'):
            $hide_organization = 'hidden';
        else:
            $hide_organization = '';
        endif;




        ?>

        <section class="header-container">
            <div class="left-section">
                <?php echo $group_avatar; ?>
                <h3> <?php bp_group_name(); ?> </h3>
            </div>

            <div class="right-section">
                <div class="bb-type">
                    <?php //bp_group_type(); ?>
                </div>
                <div class="class-upcoming-section <?= $hide_organization ?>">
                    <?php get_template_part('template-parts/template-academic-upcoming'); ?>
                </div>
            </div>
        </section>

        <div class="tabs academic academic-home">
            <!-- start tab content-->
            <input type="radio" name="tabs" id="dashboard" checked="checked">
            <label for="dashboard">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home-blue.svg" class="normal" alt="">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home.svg" class="active" alt="">
                Timeline
            </label>
            <div class="tab">
                <div class="activity bp-activity">
                    <div class="tab-content">
                        <div class="bp-wrap">
                            <div class="bb-profile-grid bb-grid">
                                <div id="item-body" class="item-body">
                                    <?php bp_nouveau_group_template_part(); ?>
                                </div>

                                <?php if ( ( !isset($bp_nouveau_appearance['group_nav_display']) || !$bp_nouveau_appearance['group_nav_display'] ) && is_active_sidebar( 'group_activity' ) && bp_is_group_activity() ) { ?>
                                    <div id="group-activity" class="widget-area sm-grid-1-1" role="complementary">
                                        <div class="bb-sticky-sidebar">
                                            <?php dynamic_sidebar( 'group_activity' ); ?>
                                        </div>
                                    </div>
                                <?php } ?>

                                <?php if ( ( !isset($bp_nouveau_appearance['group_nav_display']) || !$bp_nouveau_appearance['group_nav_display'] ) && is_active_sidebar( 'group' ) && $group_cover_width == 'full' ) { ?>
                                    <div id="secondary" class="widget-area sm-grid-1-1 no-padding-top" role="complementary">
                                        <div class="bb-sticky-sidebar">
                                            <?php dynamic_sidebar( 'group' ); ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                        </div><!-- // .bp-wrap -->
                    </div>
                    <?php get_template_part('template-parts/template-academic-sidebar'); ?>
                </div>
            </div>
            <!-- end tab content-->

            <?php if( $bb_group_Type !== 'summer-camp' ): ?>
            <!-- start tab content-->
            <input type="radio" name="tabs" id="learning" class="<?= $hide_organization ?>">
            <label for="learning" class="get_template <?= $hide_organization ?>" data-template-name="academic-learning" data-tab-name="academic-learning-content">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/learning-blue.svg" class="normal" alt="">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/learning.svg" class="active" alt="">
                Learning
            </label>
            <div class="tab <?= $hide_organization ?>">
                <div class="tab-content academic-learning-content">   </div>
                <?php  get_template_part('template-parts/template-academic-sidebar'); ?>
            </div>

            <!-- end tab content-->
            <?php endif; ?>

            <?php if( $hide_tabs === true ): ?>
            <!-- start tab content-->
            <input type="radio" name="tabs" id="quiz">
            <label for="quiz" class="get_template" data-template-name="academic-quiz" data-tab-name="academic-quiz-content">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/quiz-assignments-blue.svg" class="normal" alt="">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/quiz-assignments.svg" class="active" alt="">
                Quiz
            </label>
            <div class="tab">
                <div class="tab-content academic-quiz-content">  </div>
                <?php get_template_part('template-parts/template-academic-sidebar'); ?>
            </div>
            <!-- end tab content-->
            <?php endif; ?>

            <!-- start tab content-->
            <input type="radio" name="tabs" id="files" class="<?= $hide_organization ?>">
            <label for="files" class="get_template <?= $hide_organization ?>" data-template-name="academic-files" data-tab-name="academic-files-content">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/files-blue.svg" class="normal" alt="">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/files.svg" class="active" alt="">
                Files
            </label>
            <div class="tab <?= $hide_organization ?>">
                <div class="tab-content academic-files-content">  </div>
                <?php get_template_part('template-parts/template-academic-sidebar'); ?>
            </div>
            <!-- end tab content-->

            <?php if($bb_group_Type !== 'summer-camp'): ?>
            <!-- start tab content-->
            <input type="radio" name="tabs" id="class-routine" class="<?= $hide_organization ?>">
            <label for="class-routine" class="get_templateOLD <?= $hide_organization ?>" data-template-name="academic-calendar" data-tab-name="academic-calendar-content">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/class-routine-blue.svg" class="normal" alt="">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/class-routine.svg" class="active" alt="">
                Routine
            </label>
            <div class="tab class-routine-tab <?= $hide_organization ?>">
                <div class="tab-content academic-calendar-content">
                    <div class="col-md-12">
                        <?php
                            $bookly_data = getBBgroupServiceTeacher($bb_group_id);
                            if( !empty($bookly_data) ):
                                $teacher = $bookly_data['teacher'];
                                $service = $bookly_data['service'];
                            endif;
                            
                        ?>
                        <?php echo do_shortcode('[muslimeto_academic_calendar]'); ?>
                    </div>
                </div>
                <?php get_template_part('template-parts/template-academic-sidebar'); ?>
            </div>
            <!-- end tab content-->
            <?php endif; ?>

            <?php if( $bb_group_Type == 'school' ): ?>

            <!-- start tab content-->
            <input type="radio" name="tabs" id="classrooms">
            <label for="classrooms" class="get_template" data-template-name="academic-classrooms" data-tab-name="academic-classrooms-content" data-template-folder="/class-dashboard/">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/classrooms-blue.png" class="normal" alt="">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/classrooms.png" class="active" alt="">
                Classrooms
            </label>
            <div class="tab">
                <div class="tab-content academic-classrooms-content">  </div>
                <?php get_template_part('template-parts/template-academic-sidebar'); ?>
            </div>
            <!-- end tab content-->


            <!-- start tab content-->
            <input type="radio" name="tabs" id="honor-wall">
            <label for="honor-wall" class="get_template" data-template-name="academic-honor-wall" data-tab-name="academic-honor-wall-content" data-template-folder="/class-dashboard/">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/honor-wall-blue.png" class="normal" alt="">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/honor-wall.png" class="active" alt="">
                Honor Wall
            </label>
            <div class="tab">
                <div class="tab-content academic-honor-wall-content">  </div>
                <?php get_template_part('template-parts/template-academic-sidebar'); ?>
            </div>
            <!-- end tab content-->

            <!-- start tab content-->
            <input type="radio" name="tabs" id="calendar">
            <label for="calendar" class="get_template" data-template-name="academic-calendar" data-tab-name="academic-calendar-content" data-template-folder="/class-dashboard/">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/class-routine-blue.svg" class="normal" alt="">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/class-routine.svg" class="active" alt="">
                Calendar
            </label>
            <div class="tab">
                <div class="tab-content academic-calendar-content">  </div>
                <?php get_template_part('template-parts/template-academic-sidebar'); ?>
            </div>
            <!-- end tab content-->

            <!-- start tab content-->
            <input type="radio" name="tabs" id="policy">
            <label for="policy" class="get_template" data-template-name="academic-policy" data-tab-name="academic-policy-content" data-template-folder="/class-dashboard/">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/policy-blue.png" class="normal" alt="">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/policy.png" class="active" alt="">
                Policy
            </label>
            <div class="tab">
                <div class="tab-content academic-policy-content">  </div>
                <?php get_template_part('template-parts/template-academic-sidebar'); ?>
            </div>
            <!-- end tab content-->

            <?php if( 1 /* user_has_role(get_current_user_id(), 'administrator') || user_has_role(get_current_user_id(), 'mvsadmin') */ ): ?>
                <!-- start tab content-->
                <input type="radio" name="tabs" id="tools">
                <label for="tools" class="get_template" data-template-name="academic-tools" data-tab-name="academic-tools-content" data-template-folder="/class-dashboard/">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/tools-blue.png" class="normal" alt="">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/tools.png" class="active" alt="">
                    Tools
                </label>
                <div class="tab">
                    <div class="tab-content academic-tools-content">  </div>
                    <?php get_template_part('template-parts/template-academic-sidebar'); ?>
                </div>
                <!-- end tab content-->
            <?php endif; ?>


            <?php endif; ?>

            <?php if($bb_group_Type !== 'summer-camp'): ?>
            <!--Attendence start tab content-->
            <input type="radio" name="tabs" id="attendance" class="<?= $hide_organization ?>">
            <label for="attendance" class="get_template <?= $hide_organization ?>" data-template-name="academic-attendance" data-tab-name="academic-attendance-content">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/attendance-blue.svg" class="normal" alt="">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/attendance.svg" class="active" alt="">
                Attendance
            </label>
            <div class="tab <?= $hide_organization ?>">
                <div class="tab-content academic-attendance-content">
                   <?php //get_template_part('template-parts/template-academic-attendance'); ?>
               </div>
                <?php get_template_part('template-parts/template-academic-sidebar'); ?>
            </div>
            <!-- Attendence end tab content-->
            <?php endif; ?>

            <?php if( $hide_tabs === true ): ?>
            <!-- start tab content-->
            <input type="radio" name="tabs" id="grades">
            <label for="grades" class="get_template" data-template-name="academic-grades" data-tab-name="academic-grades-content">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/grades-blue.svg" class="normal" alt="">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/grades.svg" class="active" alt="">
                Grades
            </label>
            <div class="tab">
                <div class="tab-content academic-grades-content">  </div>
                <?php get_template_part('template-parts/template-academic-sidebar'); ?>
            </div>
            <!-- end tab content-->
            <?php endif; ?>


            <!-- start tab content-->
            <input type="radio" name="tabs" id="live-class" class="<?= $hide_organization ?>">
            <label for="live-class" class="get_template <?= $hide_organization ?>" data-template-name="academic-live-class" data-tab-name="academic-live-class-content">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/live-class-blue.svg" class="normal" alt="">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/live-class.svg" class="active" alt="">
                Live Class
            </label>
            <div class="tab live-class <?= $hide_organization ?>">
                <div class="tab-content">
                    <div class="academic-live-class-content">  </div>
                    <?php if ( ! bp_nouveau_groups_front_page_description() ) : ?>
                        <?php if ( ! empty( bp_nouveau_group_meta()->description ) ) : ?>
                            <div class="group-description">
                                <?php echo bp_nouveau_group_meta()->description; ?>
                            </div><!-- //.group_description -->
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <?php get_template_part('template-parts/template-academic-sidebar'); ?>
            </div>
            <!-- end tab content-->



        </div>

        <?php bp_nouveau_group_hook( 'before', 'home_content' ); ?>


        <?php if ( ( isset($bp_nouveau_appearance['group_nav_display']) && $bp_nouveau_appearance['group_nav_display'] ) && is_active_sidebar( 'group' ) && $group_cover_width != 'default' ) { ?>
        <div class="bb-grid bb-user-nav-display-wrap">
        <div class="bp-wrap-outer">
    <?php } ?>



        <?php if ( ( isset($bp_nouveau_appearance['group_nav_display']) && $bp_nouveau_appearance['group_nav_display'] ) && is_active_sidebar( 'group' ) && $group_cover_width != 'default' ) { ?>
        </div>
        <div id="secondary" class="widget-area sm-grid-1-1 no-padding-top" role="complementary">
            <div class="bb-sticky-sidebar">
                <?php dynamic_sidebar( 'group' ); ?>
            </div>
        </div>
        </div>
    <?php } ?>



        <?php bp_nouveau_group_hook( 'after', 'home_content' ); ?>

    <?php endwhile; ?>
    <script>
            //    function ckeckD(){
            //     let checkEmptyD = document.querySelectorAll(".ec-day .ec-events");
            //    for(let z = 0; z< checkEmptyD.length;z++){
            //     console.log(checkEmptyD[z]);
            //    }
            //    console.log(checkEmptyD.length);
            //    }
            //    let classroutine = document.getElementById("class-routine");
            //    classroutine.addEventListener("change",ckeckD);
            
            jQuery('.ec-event-title.hide').parent().addClass('hide_event');

      </script>
<?php
endif;


    // get styling for class dashboard
    get_template_part('template-parts/class-dashboard/template-class-dashboard-styling');