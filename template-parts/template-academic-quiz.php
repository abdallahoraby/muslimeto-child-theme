<?php

    $bb_group_id = bp_get_current_group_id();
    $linked_ld_group_id = groups_get_groupmeta($bb_group_id, '_sync_group_id', true);
    if( empty($linked_ld_group_id) ):
        echo '<div class="alert"> No LearnDash groups assigned to this Buddyboss group. </div>';
    endif;
    $assigned_courses_ids = learndash_get_group_courses_list($linked_ld_group_id);
    if( empty($assigned_courses_ids) ):
        echo '<div class="alert"> No LearnDash courses assigned to this group. </div>';
    endif;

?>

<?php if ( !empty($assigned_courses_ids) ): ?>

    <h3 class="title"> Quiz </h3>

    <ul class="quiz">
        <?php
        foreach ( $assigned_courses_ids as $assigned_course_id ):
            if( get_post_status($assigned_course_id) === 'publish' ):
                $course_title = get_the_title($assigned_course_id);
                $course_quiz = learndash_get_course_quiz_list($assigned_course_id);
                foreach ($course_quiz as $quiz):
                    $quiz_id = $quiz['id'];
                    $quiz_title = $quiz['post']->post_title;
                    $quiz_url = get_post_permalink($quiz_id);
                ?>

                <li>
                    <a href="<?php echo $quiz_url; ?>" class="quiz-card">
                        <i class="far fa-question-circle"></i>
                        <h3 class="card__title"> <?php echo $course_title . ' - ' . $quiz_title; ?>  </h3>
                        <button class="start-quiz"> Start Quiz </button>
                    </a>
                </li>



            <?php
                endforeach;
            endif;
        endforeach;
        ?>
    </ul>

<?php endif; ?>



<?php


//    foreach ($assigned_courses_ids as $assigned_courses_id):
//        $lessons = learndash_get_lesson_list($assigned_courses_id);
//        foreach ( $lessons as $lesson ):
//            $assignment = learndash_get_user_assignments($lesson->ID, get_current_user_id());
//            var_dump( $assignment );
//        endforeach;
//    endforeach;




