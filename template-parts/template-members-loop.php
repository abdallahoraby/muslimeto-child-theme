<?php
/**
 * Group Members Loop template
 *
 * @since 3.0.0
 * @version 3.0.0
 */
?>

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



    <ul id="learners-list" class="<?php bp_nouveau_loop_classes(); ?> learners">


        <?php
        // if this is an organization group change template parts
        $bb_group_id = bp_get_current_group_id();
        if( bp_groups_get_group_type( $bb_group_id ) === 'organization' ):
            ?>
            <li class="item-entry item-entry-header students"> Members </li>
        <?php else: ?>
            <li class="item-entry item-entry-header students"> Students </li>
        <?php endif; ?>

        <?php

        while ( bp_group_members() ) :
            bp_group_the_member();
            ?>

            <?php bp_group_member_section_title() ?>

            <?php
            $member_id = bp_get_member_user_id();
            $members_ids[] = $member_id;
            $user_gems_points = get_user_meta($member_id, '_gamipress_gems_points', true);
            $user_total_points = get_user_meta($member_id, '_gamipress_points_points', true);



            if( empty($user_gems_points) ):
                $user_gems_points = 0;
            endif;

            if( empty($user_total_points) ):
                $user_total_points = 0;
            endif;

            $show_message_button = buddyboss_theme()->buddypress_helper()->buddyboss_theme_show_private_message_button( $member_id, bp_loggedin_user_id() );
            //Check if members_list_item has content
            ob_start();
            bp_nouveau_member_hook( '', 'members_list_item' );
            $members_list_item_content = ob_get_contents();
            ob_end_clean();
            $member_loop_has_content = empty($members_list_item_content) ? false : true;
            ?>


            <li <?php bp_member_class( array( 'item-entry', 'item-learner' ) ); ?> data-bp-item-id="<?php echo esc_attr( bp_get_group_member_id() ); ?>" data-bp-item-component="members" data-gems="<?php echo $user_gems_points;?>" data-points="<?php echo $user_total_points;?>" >
                <div class="list-wrap <?php echo $footer_buttons_class; ?> <?php echo $follow_class; ?> <?php echo $member_loop_has_content ? ' has_hook_content' : ''; ?>">

                    <div class="list-wrap-inner">
                        <div class="item-avatar">
                            <a href="<?php //bp_group_member_domain(); ?>">
                                <?php bb_current_user_status( bp_get_group_member_id() ); ?>
                                <?php bp_group_member_avatar(); ?>
                            </a>
                        </div>

                        <div class="item">

                            <div class="item-block">
                                <h2 class="list-title member-name">
                                    <?php bp_group_member_name(); ?>
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


                            </div>


                            <div class="button-wrap member-button-wrap only-list-view">
                                <?php //buddyboss_theme_followers_count( bp_get_group_member_id() ); ?>
                                <?php
                                if( bp_is_active('friends') ) {
                                    bp_add_friend_button();
                                }

                                if( bp_is_active('messages') ) {
                                    if ( 'yes' === $show_message_button ) {
                                        //bp_send_message_button( $message_button_args );
                                    }
                                }

                                if( $is_follow_active ) {
                                    bp_add_follow_button( bp_get_group_member_id(), bp_loggedin_user_id() );
                                }
                                ?>
                            </div>

                            <?php if( $is_follow_active ) {
                                $justify_class = ( bp_get_group_member_id() == bp_loggedin_user_id() ) ? 'justify-center' : '';
                                ?>
                                <div class="flex only-grid-view align-items-center follow-container <?php echo $justify_class; ?>">
                                    <?php //buddyboss_theme_followers_count( bp_get_group_member_id() ); ?>
                                    <?php //bp_add_follow_button( bp_get_group_member_id(), bp_loggedin_user_id() ); ?>
                                </div>
                            <?php } ?>
                        </div><!-- // .item -->

                        <?php if( bp_is_active('friends') && bp_is_active('messages') && ( bp_get_group_member_id() != bp_loggedin_user_id() ) ) { ?>
                            <div class="flex only-grid-view button-wrap member-button-wrap footer-button-wrap"><?php
                                bp_add_friend_button();
                                if ( 'yes' === $show_message_button ) {
                                    //bp_send_message_button( $message_button_args );
                                } ?></div>
                        <?php } ?>

                        <?php if( bp_is_active('friends') && ! bp_is_active('messages') ) { ?>
                            <div class="only-grid-view button-wrap member-button-wrap on-top">
                                <?php //bp_add_friend_button(); ?>
                            </div>
                        <?php } ?>

                        <?php if( ! bp_is_active('friends') && bp_is_active('messages') ) { ?>
                            <?php  if ( 'yes' === $show_message_button ) { ?>
                                <div class="only-grid-view button-wrap member-button-wrap on-top">
                                    <?php //bp_send_message_button( $message_button_args ); ?>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>

                    <div class="gamipress-buddypress-user-details gamipress-buddypress-user-details-activity">

                    <?php
                        // if this is an organization group change template parts
                        $bb_group_id = bp_get_current_group_id();
                        if( bp_groups_get_group_type( $bb_group_id ) !== 'organization' ):
                    ?>

                        <div class="gamipress-buddypress-points">

                            <div class="gamipress-buddypress-points-type gamipress-buddypress-gems">
                                            <span class="activity gamipress-buddypress-points-thumbnail gamipress-buddypress-gems-thumbnail">
                                            <img width="25" height="25" src="<?php echo get_stylesheet_directory_uri() . '/images/badges_Adventurer-copy-50x50.png'; ?>" class="gamipress-points-thumbnail wp-post-image" alt="" loading="lazy" > </span>
                                <span class="activity gamipress-buddypress-user-points gamipress-buddypress-user-gems"><?php echo $user_gems_points;?></span>
                                <span class="activity gamipress-buddypress-points-label gamipress-buddypress-gems-label">Gems</span>
                            </div>

                            <div class="gamipress-buddypress-points-type gamipress-buddypress-points">
                                        <span class="activity gamipress-buddypress-points-thumbnail gamipress-buddypress-points-thumbnail">
                                            <img width="25" height="25" src="<?php echo get_stylesheet_directory_uri() . '/images/gamipress-icon-star-filled-50x50.png'; ?>" class="gamipress-points-thumbnail wp-post-image" alt="" loading="lazy" > </span>
                                <span class="activity gamipress-buddypress-user-points gamipress-buddypress-user-points"><?php echo $user_total_points;?></span>
                                <span class="activity gamipress-buddypress-points-label gamipress-buddypress-points-label">Points</span>
                            </div>
                        </div>

                    <?php endif; ?>

<!--                        <div class="gamipress-buddypress-ranks">-->
<!--                            <div class="gamipress-buddypress-rank gamipress-buddypress-levels">-->
<!--                                            <span title="Newbie" class="activity gamipress-buddypress-rank-thumbnail gamipress-buddypress-levels-thumbnail">-->
<!--                                            <img width="25" height="25" src="--><?php //echo get_stylesheet_directory_uri() . '/images/badges_Newbie-copy-50x50.png'; ?><!--" class="gamipress-rank-thumbnail wp-post-image" alt="" loading="lazy" >  </span>-->
<!--                                <span class="activity gamipress-buddypress-rank-title gamipress-buddypress-levels-title">Newbie </span>-->
<!--                            </div>-->
<!--                        </div>-->
                    </div>

                    <div class="bp-members-list-hook">
                        <?php
                        if($member_loop_has_content){ ?>
                            <a class="more-action-button" href="#"><i class="bb-icon-menu-dots-h"></i></a>
                        <?php } ?>
                        <div class="bp-members-list-hook-inner">
                            <?php bp_nouveau_member_hook( '', 'members_list_item' ); ?>
                        </div>
                    </div>
                </div>
            </li>

        <?php endwhile; ?>

    </ul>

    <?php bp_nouveau_group_hook( 'after', 'members_list' ); ?>

    <?php bp_nouveau_pagination( 'bottom' ); ?>

    <?php bp_nouveau_group_hook( 'after', 'members_content' ); ?>

<?php else :

    bp_nouveau_user_feedback( 'group-members-none' );

endif;

?>

<script>
    (function($){

        // sort members on gems
        var $wrapper = $('ul#learners-list.learners').eq(0);

        $wrapper.find('.item-learner').sort(function (a, b) {
            return +b.dataset.gems - +a.dataset.gems;
        })
            .appendTo( $wrapper );

    }(jQuery));
</script>
