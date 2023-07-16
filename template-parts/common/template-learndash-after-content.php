<?php
    if( !empty($_GET['cid']) ):
        $bb_group_id = $_GET['cid'];
        $bb_group_Type = bp_groups_get_group_type( $bb_group_id );
    endif;
?>

</div>
<?php  //get_template_part('template-parts/template-academic-sidebar'); ?>
</div>
<!-- end tab content-->


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
        <?php //get_template_part('template-parts/template-academic-sidebar'); ?>
    </div>
    <!-- end tab content-->
<?php endif; ?>

<!-- start tab content-->
<input type="radio" name="tabs" id="files">
<label for="files" class="get_template" data-template-name="academic-files" data-tab-name="academic-files-content">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/files-blue.svg" class="normal" alt="">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/files.svg" class="active" alt="">
    Files
</label>
<div class="tab">
    <div class="tab-content academic-files-content">  </div>
    <?php //get_template_part('template-parts/template-academic-sidebar'); ?>
</div>
<!-- end tab content-->

<?php if($bb_group_Type !== 'summer-camp'): ?>
    <!-- start tab content-->
    <input type="radio" name="tabs" id="class-routine">
    <label for="class-routine" class="get_templateOLD" data-template-name="academic-calendar" data-tab-name="academic-calendar-content">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/class-routine-blue.svg" class="normal" alt="">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/class-routine.svg" class="active" alt="">
        Routine
    </label>
    <div class="tab class-routine-tab">
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
        <?php //get_template_part('template-parts/template-academic-sidebar'); ?>
    </div>
    <!-- end tab content-->
<?php endif; ?>

<?php if($bb_group_Type !== 'summer-camp'): ?>
    <!--Attendence start tab content-->
    <input type="radio" name="tabs" id="attendance">
    <label for="attendance" class="get_template" data-template-name="academic-attendance" data-tab-name="academic-attendance-content">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/attendance-blue.svg" class="normal" alt="">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/attendance.svg" class="active" alt="">
        Attendance
    </label>
    <div class="tab">
        <div class="tab-content academic-attendance-content">
        </div>
        <?php //get_template_part('template-parts/template-academic-sidebar'); ?>
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
        <?php //get_template_part('template-parts/template-academic-sidebar'); ?>
    </div>
    <!-- end tab content-->
<?php endif; ?>

<!-- start tab content-->
<input type="radio" name="tabs" id="live-class">
<label for="live-class" class="get_template" data-template-name="academic-live-class&bb_group_id=<?= $bb_group_id ?>" data-tab-name="academic-live-class-content">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/live-class-blue.svg" class="normal" alt="">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/live-class.svg" class="active" alt="">
    Live Class
</label>
<div class="tab live-class">
    <div class="tab-content">
        <div class="academic-live-class-content">  </div>

    </div>
    <?php //get_template_part('template-parts/template-academic-sidebar'); ?>
</div>
<!-- end tab content-->



</div>

<?php
    // get styling for class dashboard
    get_template_part('template-parts/class-dashboard/template-class-dashboard-styling'); ?>

<script>
    jQuery('.ec-event-title.hide').parent().addClass('hide_event');

    jQuery('label[for="dashboard"]').on('click', function (){
        let group_url = $(this).data('url');
        $('.tab.timeline').html('<div id="loader"></div>');
        window.location.href = group_url;
    });

    jQuery(document).ready(function(){
        $("a.ld-item-name").attr('href', function(_, href){
            return href+'?cid=<?php echo $_GET['cid'] ?>'
        });
    });

</script>
