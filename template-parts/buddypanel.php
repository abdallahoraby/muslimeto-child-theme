<?php get_template_part('template-parts/template-header-upcomming-classes'); ?>
    <!--<div class='preloader'></div>-->
<aside class="buddypanel">
    <?php
    global $muslimeto_bb;
//    $menu = is_user_logged_in() ? 'buddypanel-loggedin' : 'buddypanel-loggedout';
    $header = buddyboss_theme_get_option( 'buddyboss_header' );
    

    if ( $header == '3' && !buddypanel_is_learndash_inner() ) {

        get_template_part( 'template-parts/site-logo' );

    } elseif ( $header == '3' && buddypanel_is_learndash_inner() ) { ?>

        <header class="panel-head">
            <a href="#" class="bb-toggle-panel"><i class="bb-icon-menu-left"></i></a>
        </header>

        <?php
        if ( buddyboss_is_learndash_brand_logo() && buddyboss_theme_ld_focus_mode() ) { ?>
            <div class="site-branding ld-brand-logo"><img src="<?php echo esc_url(wp_get_attachment_url(buddyboss_is_learndash_brand_logo())); ?>" alt="<?php echo esc_attr(get_post_meta(buddyboss_is_learndash_brand_logo() , '_wp_attachment_image_alt', true)); ?>"></div>
        <?php } else {
            get_template_part( 'template-parts/site-logo' );
        }

    } else { ?>

        <header class="panel-head">
            <a href="#" class="bb-toggle-panel"><i class="bb-icon-menu-left"></i></a>
        </header>

    <?php } ?>

    <div class="side-panel-inner">
        <div class="side-panel-menu-container">
            <?php
            $desktop_sidebar_menu = $muslimeto_bb['desktop_sidebar_menu'];

            wp_nav_menu( array(
                    'theme_location' => 'desktop_sidebar',
                    'menu_id'		 => $desktop_sidebar_menu,
                    'container'		 => false,
                    'fallback_cb'	 => '',
                    'menu_class'	 => 'buddypanel-menu side-panel-menu muslimeto_nav',

                    )
            );

            ?>
        </div>


    </div>



</aside>

<?php
    $wp_user_id = get_current_user_id();
    global $wpdb;
    $parent_stats_table = $wpdb->prefix . 'muslimeto_parent_stats';
    $due_result = $wpdb->get_results(
        "SELECT * FROM $parent_stats_table WHERE parent_wp_user_id = {$wp_user_id}"
    );
    $wpdb->flush();
    if( !empty($due_result) ):
        $due_balance = (int) $due_result[0]->due_balance;
    else:
        $due_balance = 0;
    endif;


    if( getPostbyMetavalue('is_account_page') && $due_balance > 0 ):
        $menu_item_id = getPostbyMetavalue('is_account_page')[0]->post_id;  ?>
        <script> jQuery('li#menu-item-<?= $menu_item_id ?> a').prepend("<p class='billing-notfication-num' style='color:#fff !important;'>!</p>") </script>
<?php endif; ?>

<input type="hidden" value="<?= get_current_user_id() ?>" id="wp_user_id_ajax">

<?php
    $user_meta = get_userdata( get_current_user_id() );
    $user_roles = $user_meta->roles;
    $user_roles = json_encode(array_values($user_roles));
?>
<input type="hidden" value="<?= $user_roles ?>" id="wp_user_roles">

