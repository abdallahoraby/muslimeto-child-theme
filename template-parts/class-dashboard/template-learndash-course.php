 <?php
    if ( !empty($args) && $args['course_id'] ):
        $course_id = $args['course_id'];
    else:
        $course_id = null;
    endif;
?>

<h3 class="ld_course_title"><?= get_the_title($course_id) ?> </h3>

<?php echo do_shortcode('[course_content course_id="'.$course_id.'"]'); ?>

 <script>
     jQuery(document).ready(function(){
         $("a.ld-item-name").attr('href', function(_, href){
             return href+'?cid=<?php echo $args['cid'] ?>'
         });
     });
 </script>
