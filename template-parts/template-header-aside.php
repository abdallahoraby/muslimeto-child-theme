<?php
    $show_search = buddyboss_theme_get_option('desktop_component_opt_multi_checkbox', 'desktop_header_search');
    $show_messages = buddyboss_theme_get_option('desktop_component_opt_multi_checkbox', 'desktop_messages') && is_user_logged_in();
    $show_notifications = buddyboss_theme_get_option('desktop_component_opt_multi_checkbox', 'desktop_notifications') && is_user_logged_in();
    $show_shopping_cart = buddyboss_theme_get_option('desktop_component_opt_multi_checkbox', 'desktop_shopping_cart');
    $header_style = (int)buddyboss_theme_get_option('buddyboss_header');
    $profile_dropdown = buddyboss_theme_get_option('profile_dropdown');
?>

<div id="header-aside" class="header-aside <?php echo esc_attr($profile_dropdown); ?>">
    <div class="header-aside-inner">
        <?php
        if (is_user_logged_in()) :
            if (
                (
                    class_exists('SFWD_LMS') &&
                    buddyboss_is_learndash_inner()
                ) ||
                (
                    class_exists('LifterLMS') &&
                    buddypanel_is_lifterlms_inner()
                )
            ) :
                ?>
                <a href="#" id="bb-toggle-theme">
                    <span class="sfwd-dark-mode" data-balloon-pos="down"
                          data-balloon="<?php esc_html_e('Dark Mode', 'buddyboss-theme'); ?>"><i
                                class="bb-icon-rl bb-icon-moon"></i></span>
                    <span class="sfwd-light-mode" data-balloon-pos="down"
                          data-balloon="<?php esc_html_e('Light Mode', 'buddyboss-theme'); ?>"><i
                                class="bb-icon-l bb-icon-sun"></i></span>
                </a>
                <a href="#" class="header-maximize-link course-toggle-view" data-balloon-pos="down"
                   data-balloon="<?php esc_html_e('Maximize', 'buddyboss-theme'); ?>"><i
                            class="bb-icon-l bb-icon-expand"></i></a>
                <a href="#" class="header-minimize-link course-toggle-view" data-balloon-pos="down"
                   data-balloon="<?php esc_html_e('Minimize', 'buddyboss-theme'); ?>"><i
                            class="bb-icon-l bb-icon-merge"></i></a>

            <?php
            else :
                if ($show_search && 4 !== $header_style) :
                    ?>

                    <a href="#" class="header-search-link" data-balloon-pos="down"
                       data-balloon="<?php esc_html_e('Search', 'buddyboss-theme'); ?>"><i
                                class="bb-icon-l bb-icon-search"></i></a>
                    <span class="bb-separator"></span>



                <?php
                endif;

                if ($show_messages && function_exists('bp_is_active') && bp_is_active('messages')) :
                    get_template_part('template-parts/messages-dropdown');
                endif;

                if ($show_notifications && function_exists('bp_is_active') && bp_is_active('notifications')) :
                    get_template_part('template-parts/notification-dropdown');
                endif;

                if ($show_shopping_cart && class_exists('WooCommerce')) :
                    get_template_part('template-parts/cart-dropdown');
                endif;


            endif;
        endif;


        if ('off' !== $profile_dropdown) {
            if (is_user_logged_in()) :
                ?>
                <div class="user-wrap user-wrap-container menu-item-has-children">
                    <?php
                    $current_user = wp_get_current_user();
                    $user_link = site_url() . '/account';
                    $display_name = function_exists('bp_core_get_user_displayname') ? bp_core_get_user_displayname($current_user->ID) : $current_user->display_name;
                    ?>

                    <a class="user-link" href="<?php //echo esc_url($user_link); ?>">
                        <?php
                        if ('name_and_avatar' === $profile_dropdown) {
                            ?>
                            <span class="user-name"><?php echo esc_html($display_name); ?></span><i
                                    class="bb-icon-l bb-icon-angle-down"></i>
                            <?php
                        }
                        echo get_avatar(get_current_user_id(), 100);
                        ?>
                    </a>

                    <div class="sub-menu">
                        <div class="wrapper">
                            <ul class="sub-menu-inner">
                                <li>
                                    <a class="user-link" href="<?php //echo esc_url($user_link); ?>">
                                        <?php echo get_avatar(get_current_user_id(), 100); ?>
                                        <span>
											<span class="user-name"><?php echo esc_html($display_name); ?></span>
											<?php if (function_exists('bp_is_active') && function_exists('bp_activity_get_user_mentionname')) : ?>
                                                <span class="user-mention"><?php echo '@' . esc_html(bp_activity_get_user_mentionname($current_user->ID)); ?></span>
                                            <?php else : ?>
                                                <span class="user-mention"><?php echo '@' . esc_html($current_user->user_login); ?></span>
                                            <?php endif; ?>
										</span>
                                    </a>
                                </li>

                                <ul id="header-my-account-menu" class="bb-my-account-menu has-icon">
                                    <li class="bp-menu bp-activity-nav menu-item menu-item-type-custom menu-item-object-custom menu-item-1079 icon-added">
                                        <a href="#"> <i class="_mi _before buddyboss bb-icon-sliders-h" aria-hidden="true"></i> <span>Profile</span> </a>
                                    </li>

                                    <li class="bp-menu bp-activity-nav menu-item menu-item-type-custom menu-item-object-custom menu-item-1079 icon-added get_template" data-template-name="members" data-template-folder="/user-profile/" data-tab-name="template-data">
                                        <a href="#"> <i class="_mi _before buddyboss bb-icon-users" aria-hidden="true"></i> <span>Learners</span> </a>
                                    </li>

                                    <li class="bp-menu bp-activity-nav menu-item menu-item-type-custom menu-item-object-custom menu-item-1079 icon-added">
                                        <a href="#"> <i class="_mi _before buddyboss bb-icon-currency-dollar" aria-hidden="true"></i> <span>Billing</span> </a>
                                    </li>

                                    <li class="bp-menu bp-activity-nav menu-item menu-item-type-custom menu-item-object-custom menu-item-1079 icon-added">
                                        <a href="#"> <i class="_mi _before buddyboss bb-icon-book" aria-hidden="true"></i> <span>Forms</span> </a>
                                    </li>

                                    <li class="bp-menu bp-activity-nav menu-item menu-item-type-custom menu-item-object-custom menu-item-1079 icon-added">
                                        <a href="#"> <i class="_mi _before buddyboss bb-icon-activity" aria-hidden="true"></i> <span>Activity</span> </a>
                                    </li>

                                </ul>


                            </ul>
                        </div>
                    </div>
                </div>
            <?php
            endif;
        }

        if (!is_user_logged_in()) :
            ?>



            <?php if ($show_search && 4 !== $header_style) : ?>
            <a href="#" class="header-search-link" data-balloon-pos="down"
               data-balloon="<?php esc_attr_e('Search', 'buddyboss-theme'); ?>"><i class="bb-icon-l bb-icon-search"></i></a>
            <span class="search-separator bb-separator"></span>
        <?php
        endif;

            if ($show_shopping_cart && class_exists('WooCommerce')) :
                get_template_part('template-parts/cart-dropdown');
            endif;
            ?>
            <div class="bb-header-buttons">
                <a href="<?php echo esc_url(wp_login_url()); ?>"
                   class="button small outline signin-button link"><?php esc_html_e('Sign in', 'buddyboss-theme'); ?></a>

                <?php if (get_option('users_can_register')) : ?>
                    <a href="<?php echo esc_url(wp_registration_url()); ?>"
                       class="button small signup"><?php esc_html_e('Sign up', 'buddyboss-theme'); ?></a>
                <?php endif; ?>
            </div>
        <?php

        endif;

        if (
            3 === $header_style ||
            (
                class_exists('SFWD_LMS') &&
                buddyboss_is_learndash_inner()
            ) ||
            (
                class_exists('LifterLMS') &&
                buddypanel_is_lifterlms_inner()
            )
        ) :
            echo buddypanel_position_right();
        endif;
        ?>

    </div><!-- .header-aside-inner -->
</div><!-- #header-aside -->
