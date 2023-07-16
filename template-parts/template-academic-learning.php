<style>

    .no-course-assigned {
        margin: 6rem;
        text-align: center;
    }

</style>

<?php

    if( !empty($_GET['bb_group_id']) ):
        $bb_group_id = $_GET['bb_group_id'];
    else:
        $bb_group_id = bp_get_current_group_id();
    endif;

    $linked_ld_group_id = groups_get_groupmeta($bb_group_id, '_sync_group_id', true);
    if( empty($linked_ld_group_id) ):
        echo '<div class="no-course-assigned"> No course is assigned to this class. </div>';
    endif;
    $assigned_courses_ids = learndash_get_group_courses_list($linked_ld_group_id);
    if( empty($assigned_courses_ids) ):
        echo '<div class="no-course-assigned"> No course is assigned to this class. </div>';
    endif;
    ?>

    <ul class="courses quiz">
        <?php
        foreach ( $assigned_courses_ids as $assigned_course_id ):
            if( get_post_status($assigned_course_id) === 'publish' ):
                $course_url = learndash_get_course_url($assigned_course_id);
                $feature_image = get_the_post_thumbnail_url($assigned_course_id);
                $course_title = get_the_title($assigned_course_id);


        ?>

            <li>
                <a href="# <?php //echo $course_url; ?>" class="quiz-card" data-course-id="<?= $assigned_course_id ?>" data-cid="<?= $bb_group_id ?>" >
                    <i class="far fa-question-circle"></i>
                    <h3 class="card__title"> <?php echo $course_title ; ?>  </h3>
                    <button class="start-quiz"> View Course </button>
                </a>
            </li>




        <?php
            endif;
        endforeach;
        ?>
    </ul>

<script>

    jQuery(document).ready(function(){
 
        // on select learndash course open it in class dashboard
        $('body').delegate('ul.courses a.quiz-card', 'click', function (e){
            e.preventDefault();
            $('.tabs.academic.academic-home .sidebar').hide();
            $('.tab-content.academic-learning-content').html('<div id="loader"></div>');
            let course_id = $(this).data('course-id');
            let cid = $(this).data('cid');

            let get_ld_course_template_data = {
                action : 'get_learndash_course_template',
                course_id: course_id,
                cid: cid
            };
            $.post(ajaxurl, get_ld_course_template_data, function (response) { // response callback function
                $('.tab-content.academic-learning-content').html(response);
                $(".ld_course_title").prepend("<i class='bb-icon-book-open bb-icon-l'></i>");
            })

        });

    });

</script>
