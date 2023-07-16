<?php

$bb_group_id = $_GET['cid'];
$group_obj = groups_get_group ( $bb_group_id );
$bb_group_permalink = bp_get_group_permalink( $group_obj );
$group_name = bp_get_group_name($group_obj);

$avatar = bp_core_fetch_avatar( array(
    'item_id'    => $bb_group_id,
    'avatar_dir' => 'group-avatars',
    'object'     => 'group',
    'class' => 'group_avatar',
) );
$bb_group_Type = bp_groups_get_group_type( $bb_group_id );

?>

<section class="header-container">
    <div class="left-section">
        <?= $avatar; ?>
        <h3> <?= $group_name ?> </h3>
    </div>

    <div class="right-section">
        <div class="bb-type">
            <?php //bp_group_type(); ?>
        </div>
        <?php get_template_part('template-parts/template-academic-upcoming', null, array(
            'bb_group_id' => $bb_group_id
        )); ?>
    </div>
</section>

<div class="tabs academic academic-home">
    <input type="radio" name="tabs" id="dashboard">
    <label for="dashboard" data-url="<?= $bb_group_permalink ?>" >
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home-blue.svg" class="normal" alt="">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home.svg" class="active" alt="">
        Timeline
    </label>
    <div class="tab timeline"> </div>
    <!-- end tab content-->


    <!-- start tab content-->
    <input type="radio" name="tabs" id="learning" checked>
    <label for="learning" class="get_template" data-template-name="academic-learning&bb_group_id=<?= $bb_group_id ?>" data-tab-name="academic-learning-content">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/learning-blue.svg" class="normal" alt="">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/learning.svg" class="active" alt="">
        Learning
    </label>
    <div class="tab">
        <div class="tab-content academic-learning-content">


    