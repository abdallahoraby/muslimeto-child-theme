<?php
/**
 * BuddyBoss - Group Leaders
 *
 * @since BuddyBoss 3.1.1
 * @version 3.1.1
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



<?php

    // if this is an organization group change template parts
    $bb_group_id = bp_get_current_group_id();
    if( bp_groups_get_group_type( $bb_group_id ) === 'organization' ):
        $roles = 'admin,mod';
    else:
        $roles = 'mod';
    endif;

    $bb_group_type = bp_groups_get_group_type( $bb_group_id );
    if(  $bb_group_type !== 'summer-camp' ):
        // get bb group teacher from sp entry
        $sp_entry_id = getBBgroupGFentryID($bb_group_id);
        $staff_id = getSPentryStaffId($sp_entry_id);
        $staff_wp_user_id = getStaffwp_user_id($staff_id);
    endif;


    if ( bp_group_has_members( 'group_role='.$roles ) ) : ?>

    <?php bp_nouveau_group_hook( 'before', 'members_content' ); ?>

    <?php bp_nouveau_pagination( 'top' ); ?>

    <?php bp_nouveau_group_hook( 'before', 'members_list' ); ?>
    

    <ul id="learners-list" class="<?php bp_nouveau_loop_classes(); ?>">

        <?php
        while ( bp_group_members() ) :
            bp_group_the_member();

            //Check if members_list_item has content
            ob_start();
            bp_nouveau_member_hook( '', 'members_list_item' );
            $members_list_item_content = ob_get_contents();
            ob_end_clean();
            $member_loop_has_content = empty($members_list_item_content) ? false : true;
                if( get_userdata(bp_get_group_member_id())->data->user_email !== 'academy@muslimeto.com' ):

                    if( bp_get_group_member_id() === (int) $staff_wp_user_id && $bb_group_type !== 'summer-camp' ):
            ?>

                <li <?php bp_member_class( array( 'item-entry' ) ); ?> data-bp-item-id="<?php echo esc_attr( bp_get_group_member_id() ); ?>" data-bp-item-component="members">
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
                            </div>

                            <div class="button-wrap member-button-wrap only-list-view">
                                <?php buddyboss_theme_followers_count( bp_get_group_member_id() ); ?>
                                <?php
                                if( bp_is_active('friends') ) {
                                    bp_add_friend_button();
                                }

                                if( bp_is_active('messages') ) {
                                    //bp_send_message_button( $message_button_args );
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
                                    <?php buddyboss_theme_followers_count( bp_get_group_member_id() ); ?>
                                    <?php bp_add_follow_button( bp_get_group_member_id(), bp_loggedin_user_id() ); ?>
                                </div>
                            <?php } ?>
                        </div><!-- // .item -->

                        <?php if( bp_is_active('friends') && bp_is_active('messages') && ( bp_get_group_member_id() != bp_loggedin_user_id() ) ) { ?>
                            <div class="flex only-grid-view button-wrap member-button-wrap footer-button-wrap"><?php //bp_add_friend_button(); ?><?php //bp_send_message_button( $message_button_args ); ?></div>
                        <?php } ?>

                        <?php if( bp_is_active('friends') && ! bp_is_active('messages') ) { ?>
                            <div class="only-grid-view button-wrap member-button-wrap on-top">
                                <?php //bp_add_friend_button(); ?>
                            </div>
                        <?php } ?>

                        <?php if( ! bp_is_active('friends') && bp_is_active('messages') ) { ?>
                            <div class="only-grid-view button-wrap member-button-wrap on-top">
                                <?php //bp_send_message_button( $message_button_args ); ?>
                            </div>
                        <?php } ?>
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

            <?php elseif ( $bb_group_type == 'summer-camp' ): ?>

                <li <?php bp_member_class( array( 'item-entry' ) ); ?> data-bp-item-id="<?php echo esc_attr( bp_get_group_member_id() ); ?>" data-bp-item-component="members">
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
                                </div>

                                <div class="button-wrap member-button-wrap only-list-view">
                                    <?php buddyboss_theme_followers_count( bp_get_group_member_id() ); ?>
                                    <?php
                                    if( bp_is_active('friends') ) {
                                        bp_add_friend_button();
                                    }

                                    if( bp_is_active('messages') ) {
                                        //bp_send_message_button( $message_button_args );
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
                                        <?php buddyboss_theme_followers_count( bp_get_group_member_id() ); ?>
                                        <?php bp_add_follow_button( bp_get_group_member_id(), bp_loggedin_user_id() ); ?>
                                    </div>
                                <?php } ?>
                            </div><!-- // .item -->

                            <?php if( bp_is_active('friends') && bp_is_active('messages') && ( bp_get_group_member_id() != bp_loggedin_user_id() ) ) { ?>
                                <div class="flex only-grid-view button-wrap member-button-wrap footer-button-wrap"><?php //bp_add_friend_button(); ?><?php //bp_send_message_button( $message_button_args ); ?></div>
                            <?php } ?>

                            <?php if( bp_is_active('friends') && ! bp_is_active('messages') ) { ?>
                                <div class="only-grid-view button-wrap member-button-wrap on-top">
                                    <?php //bp_add_friend_button(); ?>
                                </div>
                            <?php } ?>

                            <?php if( ! bp_is_active('friends') && bp_is_active('messages') ) { ?>
                                <div class="only-grid-view button-wrap member-button-wrap on-top">
                                    <?php //bp_send_message_button( $message_button_args ); ?>
                                </div>
                            <?php } ?>
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

            <?php
                    endif;
                endif;
            endwhile;

        if( empty($staff_wp_user_id) && $bb_group_type !== 'summer-camp' ):
            echo '<li class="alert"> No teacher assigned in SP entry. </li>';
        endif;

        ?>

    </ul>



    <?php bp_nouveau_group_hook( 'after', 'members_list' ); ?>

    <?php bp_nouveau_pagination( 'bottom' ); ?>

    <?php bp_nouveau_group_hook( 'after', 'members_content' ); ?>

<?php else : ?>

    <?php bp_nouveau_user_feedback( 'group-members-none' ); ?>

<?php
endif;