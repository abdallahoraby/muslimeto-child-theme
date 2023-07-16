<?php

    if( !empty($_GET['bb_group_id']) ):
        $bb_group_id = $_GET['bb_group_id'];
    else:
        $bb_group_id = bp_get_current_group_id();
    endif;

    get_template_part('template-parts/class-dashboard/template-get-zoom-join-btn', null, array(
        'bb_group_id' => $bb_group_id
    ));

    $bb_group_type = bp_groups_get_group_type( $bb_group_id );


if( is_admin() && $bb_group_type == 'summer-camp' ):
    $summer_camp_zoom_id = groups_get_groupmeta( $bb_group_id, 'summer_camp_zoom_id');
?>

<form action="" class="summer-camp-zoom-id-form">
    <label for="summer-camp-zoom-id"> Summer Camp Zoom Meeting Id:
        <input type="text" id="summer-camp-zoom-id" value="<?php echo !empty($summer_camp_zoom_id) ? $summer_camp_zoom_id : null; ?>">
    </label>
    <input type="hidden" class="summer_camp_group_id" value="<?= $bb_group_id ?>">
    <a href="#" class="add-summer-camp-zoom-id button"> Save </a>
</form>

<?php endif; ?>