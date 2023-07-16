<?php
/**
 * Group Members Loop template
 *
 * @since 3.0.0
 * @version 3.0.0
 */
?>


<style>

    div#org-members img {
        width: 4rem;
    }

    div#org-members {
        padding: 0 1rem;
        display: flex;
        gap: .5rem;
        margin: 1rem auto;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }

    div#org-members .member-status {
        bottom: 0 !important;
        right: 0 !important;
        top: unset;
    }

    div#org-members .item-avatar {
        border: 3px solid #ddd;
        border-radius: 150px;
        box-shadow: 5px 5px 13px 0px #ddddddb8;
    }

    div#org-members .item-block {
        display: none;
    }

    div#org-members .member-avatar:hover .item-block {
        position: absolute;
        display: block;
        z-index: 999;
        background: rgba(var(--bb-tooltip-background-rgb),.95);
        box-shadow: 0 0 5px #f5f5f5;
        border-radius: 5px;
        top: 110%;
        left: -40%;
    }

    div#org-members .member-avatar {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-flow: column;
        flex: 0 0 30%;
        margin-bottom: 0.5rem;
    }

    .item-block:before {
        background: no-repeat url("data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http://www.w3.org/2000/svg%22%20width%3D%2236px%22%20height%3D%2212px%22%3E%3Cpath%20fill%3D%22var(--bb-tooltip-background)%22%20transform%3D%22rotate(0)%22%20d%3D%22M2.658,0.000%20C-13.615,0.000%2050.938,0.000%2034.662,0.000%20C28.662,0.000%2023.035,12.002%2018.660,12.002%20C14.285,12.002%208.594,0.000%202.658,0.000%20Z%22/%3E%3C/svg%3E");
        background-size: 100% auto;
        width: 17px;
        height: 6px;
        opacity: 1;
        pointer-events: none;
        -webkit-transition: all .18s ease-out .18s;
        transition: all .18s ease-out .18s;
        content: '';
        position: absolute;
        z-index: 10;
        top: -5px;
        left: 45%;
        transform: rotate(180deg);
        opacity: 0.8;
    }

    div#org-members .item-block * {
        text-align: center;
        margin: 0;
        color: #fff;
        font-size: 0.7rem;
    }

    div#org-members .item-block {
        min-width: 10rem;
        padding: 0.4rem;
    }

    #org-members .item-meta {
        line-height: 1rem;
    }

    div#org-members .item-block h2 {
        font-size: 0.9rem;
        line-height: 1.3rem;
        height: auto;
    }

    div#org-members .item-block h2,
    #org-members .item-meta{
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
    }

    #org-members .member-avatar .gamipress-buddypress-user-details img {
        width: 1rem;
        height: 1rem;
    }

    div#org-members .member-avatar .gamipress-buddypress-points {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    div#org-members .member-avatar span.activity.gamipress-buddypress-points-thumbnail {
        background-size: contain !important;
        width: 1rem;
        height: 1rem;
        background-position: center !important;
        background-repeat: no-repeat !important;
        display: block;
    }

    div#org-members .member-avatar .gamipress-buddypress-points-type {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.2rem;
    }

    div#org-members .member-avatar .gamipress-buddypress-points {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.5rem;
    }

    div#org-members .member-avatar .user-rank {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        position: absolute;
        background: #fff;
        border-radius: 5px;
        bottom: -10px;
        box-shadow: 0 0 7px #d1d1d1;
        height: 1.3rem;
    }

    div#org-members .member-avatar .user-rank img {
        width: 35%;
        height: 2rem;
        object-fit: contain;
        margin: 0;
        background: #fff;
        border-radius: 100px;
        border: 1px solid #ddd;
        padding: 0.1rem;
    }

    div#org-members .member-avatar .user-rank span {
        font-size: 0.7rem;
        width: 60%;
    }


</style>

<?php


$message_button_args = array(
    'link_text'         => '<i class="bb-icon-mail-small"></i>',
    'button_attr' => array(
        'data-balloon-pos' => 'down',
        'data-balloon' => __( 'Message', 'buddyboss-theme' ),
    )
);

$footer_buttons_class = ( bp_is_active('friends') && bp_is_active('messages') ) ? 'footer-buttons-on' : '';

$is_follow_active = bp_is_active('activity') && function_exists('bp_is_activity_follow_active') && bp_is_activity_follow_active();
$follow_class = $is_follow_active ? 'follow-active' : '';


?>

<?php if ( bp_group_has_members( bp_ajax_querystring( 'group_members' ) . '&type=group_role' ) ) : ?>

    <?php bp_nouveau_group_hook( 'before', 'members_content' ); ?>

    <?php bp_nouveau_pagination( 'top' ); ?>

    <?php bp_nouveau_group_hook( 'before', 'members_list' ); ?>



    <div id="org-members" class="<?php bp_nouveau_loop_classes(); ?> learners">


        <?php


        if(bp_group_has_members(array('exclude_admins_mods' => false, 'per_page' => 999, 'max' => false))):

            while ( bp_group_members() ) :
                bp_group_the_member();
                ?>

                <?php bp_group_member_section_title() ?>

                <?php

                $member_id = bp_get_member_user_id();
                $user_gems_points = get_user_meta($member_id, '_gamipress_gems_points', true);
                $user_total_points = get_user_meta($member_id, '_gamipress_points_points', true);


                if( empty($user_gems_points) ):
                    $user_gems_points = 0;
                endif;

                if( empty($user_total_points) ):
                    $user_total_points = 0;
                endif;

                $user_rank = getGamipressUserRank( $member_id );
                if( !empty( $user_rank ) ):
                    $rank_name = $user_rank['rank_name'];
                    $rank_thumb = $user_rank['rank_thumb'];
                else:
                    $rank_name = '';
                    $rank_thumb = '';
                endif;


                $show_message_button = buddyboss_theme()->buddypress_helper()->buddyboss_theme_show_private_message_button( $member_id, bp_loggedin_user_id() );
                //Check if members_list_item has content
                ob_start();
                bp_nouveau_member_hook( '', 'members_list_item' );
                $members_list_item_content = ob_get_contents();
                ob_end_clean();
                $member_loop_has_content = empty($members_list_item_content) ? false : true;




                ?>


                <div class="member-avatar">
                    <div class="item-avatar">
                        <a href="#">
                            <?php bb_current_user_status( bp_get_group_member_id() ); ?>
                            <?php bp_group_member_avatar(); ?>
                        </a>
                    </div>

                    <div class="item-block">
                        <h2 class="list-title member-name">
                            <?= bp_group_member_name() ?>
                        </h2>

                        <p class="joined item-meta">
                            <?php //bp_group_member_joined_since(); ?>
                        </p>

                        <?php if ( ( bp_is_active( 'activity' ) && bp_activity_do_mentions() ) || bp_nouveau_member_has_meta() ) : ?>
                            <div class="item-meta">
                                <?php bp_nouveau_member_hook( 'before', 'header_meta' ); ?>

                                <?php if ( bp_nouveau_member_has_meta() ) : ?>
                                    <?php bp_nouveau_member_meta(); ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <div class="gamipress-buddypress-user-details gamipress-buddypress-user-details-activity">

                            <div class="gamipress-buddypress-points">

                                <div class="gamipress-buddypress-points-type gamipress-buddypress-gems">
                                    <img src="<?php echo get_stylesheet_directory_uri() . '/images/badges_Adventurer-copy-50x50.png'; ?>" class="gamipress-points-thumbnail wp-post-image" alt="" loading="lazy" >
                                    <span class="activity gamipress-buddypress-user-points gamipress-buddypress-user-gems"><?php echo $user_gems_points;?> Gems</span>
                                </div>

                                <div class="gamipress-buddypress-points-type gamipress-buddypress-points">
                                    <img src="<?php echo get_stylesheet_directory_uri() . '/images/gamipress-icon-star-filled-50x50.png'; ?>" class="gamipress-points-thumbnail wp-post-image" alt="" loading="lazy" >
                                    <span class="activity gamipress-buddypress-user-points gamipress-buddypress-user-points"><?php echo $user_total_points;?> Points</span>
                                </div>
                            </div>

                        </div>


                    </div>

                    <?php if( !empty($user_rank) ): ?>
                        <div class="user-rank">
                            <img src="<?= $rank_thumb ?>" alt="">
                            <span> <?= $rank_name ?> </span>
                        </div>
                    <?php endif; ?>

<!--                    <div class="gamipress-buddypress-user-details gamipress-buddypress-user-details-activity">-->
<!---->
<!--                        <div class="gamipress-buddypress-points">-->
<!---->
<!--                            <div class="gamipress-buddypress-points-type gamipress-buddypress-gems">-->
<!--                                <img src="--><?php //echo get_stylesheet_directory_uri() . '/images/badges_Adventurer-copy-50x50.png'; ?><!--" class="gamipress-points-thumbnail wp-post-image" alt="" loading="lazy" >-->
<!--                                <span class="activity gamipress-buddypress-user-points gamipress-buddypress-user-gems">--><?php //echo $user_gems_points;?><!--</span>-->
<!--                            </div>-->
<!---->
<!--                            <div class="gamipress-buddypress-points-type gamipress-buddypress-points">-->
<!--                                <img src="--><?php //echo get_stylesheet_directory_uri() . '/images/gamipress-icon-star-filled-50x50.png'; ?><!--" class="gamipress-points-thumbnail wp-post-image" alt="" loading="lazy" >-->
<!--                                <span class="activity gamipress-buddypress-user-points gamipress-buddypress-user-points">--><?php //echo $user_total_points;?><!--</span>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->

                </div>

            <?php endwhile;

        endif;

        ?>

    </div>

    <?php bp_nouveau_group_hook( 'after', 'members_list' ); ?>

    <?php bp_nouveau_pagination( 'bottom' ); ?>

    <?php bp_nouveau_group_hook( 'after', 'members_content' ); ?>

<?php else :

    bp_nouveau_user_feedback( 'group-members-none' );

endif;

?>
