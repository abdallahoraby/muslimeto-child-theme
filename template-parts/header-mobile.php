<style>
@media screen and (max-width: 768px) {
    .today-class-number{
      top: 10px!important;
    }
    .schadual_text{
      display: block;
      max-width: 100px
    }
    .header-upcomming-classes-btn.hideBtn{
      padding-right: 0!important;
    }
    .header-upcomming-classes{
      justify-content: space-between;
    }
    .schadual_icon{background: #ffffff3d;}
  }
  @media screen and (max-width: 450px){
    .modal_icon{
      display: none;
    }
    .schadual_clsaa_time{
      flex-direction: column;
      justify-content: start;
      align-items: start;
    }
    .header-schedual-class.modal .modal-footer{
      flex-direction: column-reverse;
    }
    .header-schedual-class.modal .modal-footer .btn-primary{
      width: 100%;
    }
  }
</style>
<?php
$show_search = buddyboss_theme_get_option( 'mobile_header_search' );
$show_messages = buddyboss_theme_get_option( 'mobile_messages' ) && is_user_logged_in();
$show_notifications = buddyboss_theme_get_option( 'mobile_notifications' ) && is_user_logged_in();
$show_shopping_cart = buddyboss_theme_get_option( 'mobile_shopping_cart' );

$logo_align = count( array_filter( array($show_search, $show_messages, $show_notifications, $show_shopping_cart) ) );
$logo_class = ( $logo_align <= 1 && ( !buddyboss_is_learndash_inner() && !buddyboss_is_lifterlms_inner() ) ) ? 'bb-single-icon' : '';
global $muslimeto_bb;
?>

<div class="bb-mobile-header-wrapper <?php echo $logo_class; ?>">
    <div class="bb-mobile-header flex align-items-center">
        <div class="bb-left-panel-icon-wrap">
            <a href="#" class="push-left bb-left-panel-mobile"><i class="bb-icon-menu-left"></i></a>
        </div>

        <div class="flex-1 mobile-logo-wrapper">
            <?php
            $show		     = buddyboss_theme_get_option( 'mobile_logo_switch' );
            $logo_id	     = buddyboss_theme_get_option( 'mobile_logo', 'id' );
            $show_dark    = buddyboss_theme_get_option( 'mobile_logo_dark_switch' );
            $logo_dark_id	 = buddyboss_theme_get_option( 'mobile_logo_dark', 'id' );
            $logo		     = ( $show && $logo_id ) ? wp_get_attachment_image( $logo_id, 'full', '', array( 'class' => 'bb-mobile-logo' ) ) : get_bloginfo( 'name' );
            $logo_dark		 = ( $show && $show_dark && $logo_dark_id ) ? wp_get_attachment_image( $logo_dark_id, 'full', '', array( 'class' => 'bb-mobile-logo bb-mobile-logo-dark' ) ) : '';

            // This is for better SEO
            $elem = ( is_front_page() && is_home() ) ? 'h1' : 'h2';
            ?>

            <<?php echo $elem; ?> class="site-title">

            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <?php if ( buddyboss_is_learndash_inner() && buddyboss_theme_ld_focus_mode() ) {
                    if ( buddyboss_is_learndash_brand_logo() ) { ?>
                        <img src="<?php echo esc_url(wp_get_attachment_url(buddyboss_is_learndash_brand_logo())); ?>" alt="<?php echo esc_attr(get_post_meta(buddyboss_is_learndash_brand_logo() , '_wp_attachment_image_alt', true)); ?>" class="bb-mobile-logo">
                    <?php } else {
                        echo $logo; echo $logo_dark;
                    }
                } else {
                    echo $logo; echo $logo_dark;
                } ?>
            </a>

        </<?php echo $elem; ?>>

    </div>
    <div class="header-aside">
      <div>
        <?php
        if (is_user_logged_in()) : // if user is logged in => get next pending class
            // get next session with status 'pending'
            global $next_pending;
            $next_pending = getNextPendingSession( get_current_user_id() );
            if( $next_pending !== false ):
        ?>
        <!-- makeup schedual classes confirmation  -->
        <div class="d-flex">
                <button class="schedual-classes-header-btn btn " type="button" data-bs-toggle="modal" data-bs-target="#header-schedual-class" data-balloon-pos="down" data-balloon="New Makeup Scheduled">
                <span class="schadual_icon">
                        <span class="animate__animated animate__tada animate__infinite animate__slower">
                            <i class="bb-icon-bell bb-icon-l"></i>
                        </span>
                    </span>
                    <!-- <p class="schadual_text">
                        [Pending Confirmation] New makeup scheduled at 6:30 pm EST, Tue 08/23/2022
                    </p> -->
                </button>
        </div>
        <?php
            endif;
        endif; ?>
      </div>
    <!-- today classes -->
    <?php if (is_user_logged_in()) : ?>
         <!-- today classes -->
        <div class="header-upcomming-classes d-flex">
           <span class="today-class-number count">0</span>
            <button class="header-upcomming-classes-btn today-class btn" type="button" data-bs-toggle="modal" data-bs-target="#today-upcomming-class" data-balloon-pos="down" data-balloon="Recent/Upcoming Classes">
               <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon_classroom.svg" class="upcoming-class-img" alt="" width="20px" height="auto">
            </button>
     </div>
    <?php endif; ?>
    <!-- end today classes -->
        <?php if( ( class_exists( 'SFWD_LMS' ) && buddyboss_is_learndash_inner() ) || ( class_exists( 'LifterLMS' ) && buddyboss_is_lifterlms_inner() ) ){ ?>
            <?php if ( is_user_logged_in()) { ?>
                <a href="#" id="bb-toggle-theme">
                    <span class="sfwd-dark-mode" data-balloon-pos="down" data-balloon="<?php _e( 'Dark Mode', 'buddyboss-theme' ); ?>"><i class="bb-icon-moon-circle"></i></span>
                    <span class="sfwd-light-mode" data-balloon-pos="down" data-balloon="<?php _e( 'Light Mode', 'buddyboss-theme' ); ?>"><i class="bb-icon-sun"></i></span>
                </a>
                <a href="#" class="header-maximize-link course-toggle-view" data-balloon-pos="left" data-balloon="<?php _e( 'Hide Sidepanel', 'buddyboss-theme' ); ?>"><i class="bb-icon-maximize"></i></a>
                <a href="#" class="header-minimize-link course-toggle-view" data-balloon-pos="left" data-balloon="<?php _e( 'Show Sidepanel', 'buddyboss-theme' ); ?>"><i class="bb-icon-minimize"></i></a>
            <?php }else{ ?>

                <?php if( $show_search ) : ?>
                    <a data-balloon-pos="left" data-balloon="<?php _e( 'Search', 'buddyboss-theme' ); ?>" href="#" class="push-right header-search-link"><i class="bb-icon-search"></i></a>
                <?php endif; ?>

                <?php if( $show_shopping_cart && class_exists( 'WooCommerce' ) ) : ?>
                    <?php get_template_part( 'template-parts/cart-dropdown' ); ?>
                <?php endif; ?>

                <a href="#" class="header-maximize-link course-toggle-view" data-balloon-pos="left" data-balloon="<?php _e( 'Hide Sidepanel', 'buddyboss-theme' ); ?>"><i class="bb-icon-maximize"></i></a>
                <a href="#" class="header-minimize-link course-toggle-view" data-balloon-pos="left" data-balloon="<?php _e( 'Show Sidepanel', 'buddyboss-theme' ); ?>"><i class="bb-icon-minimize"></i></a>
            <?php } ?>
        <?php }else{ ?>
            <?php if( $show_search ) : ?>
                <a data-balloon-pos="left" data-balloon="<?php _e( 'Search', 'buddyboss-theme' ); ?>" href="#" class="push-right header-search-link"><i class="bb-icon-search"></i></a>
            <?php endif; ?>

            <?php if( $show_messages && function_exists( 'bp_is_active' ) && bp_is_active( 'messages' )  ) : ?>
                <?php get_template_part( 'template-parts/messages-dropdown' ); ?>
            <?php endif; ?>

            <?php if( $show_notifications && function_exists( 'bp_is_active' ) && bp_is_active( 'notifications' ) ) : ?>
                <?php get_template_part( 'template-parts/notification-dropdown' ); ?>
            <?php endif; ?>

            <?php if( $show_shopping_cart && class_exists( 'WooCommerce' ) ) : ?>
                <?php get_template_part( 'template-parts/cart-dropdown' ); ?>
            <?php endif;
        } ?>


    </div>

</div>
<div class="container" style="padding: 0px 0px 10px 0px">

  <!-- upcomming class -->
   <div class="header-upcomming-classes count-down-header-container d-flex mr-auto">
          <button id="upcoming_class_btn" class="header-upcomming-classes-btn btn count-down-upcomming-class-btn hideBtn" type="button" data-bs-toggle="modal" data-bs-target="#count-down-upcomming-class">
          <i class="bb-icon-alarm bb-icon-l"></i>
           <p>
              <span class="header-count-down-timer"> No Upcoming Classes</span>
          </p>
          </button>

          <button id="ongoing_class_btn" class="header-upcomming-classes-btn btn ongoing-class-btn hideBtn" type="button" data-bs-toggle="modal" data-bs-target="#ongoing-classes-class">
          <i class="bb-icon-alarm bb-icon-l"></i>
           <p>
              <span class="header-engoing-class">Ongoing Classes</span>
          </p>
          </button>





   </div>
</div>
<?php

global $muslimeto_bb;
$desktop_sidebar_menu = (int) $muslimeto_bb['desktop_sidebar_menu'];
$sub_menu = getSubMenu($desktop_sidebar_menu);
global $wp;
$current_page_url = home_url( $wp->request ).'/';

$menu_items = wp_get_nav_menu_items($desktop_sidebar_menu);
foreach ( $menu_items as $menu_item ):
    $item_urls[] = $menu_item->url;
endforeach;

if( !empty($sub_menu) && in_array($current_page_url, $item_urls) ): ?>
    <div class="sub-menu-fixed mobile">
        <input type="hidden" value="submenu" id="submenu" >
        <?php if(count($sub_menu) > 5): ?>
        <input type="hidden" value="two-columns" id="two-columns">
        <?php endif; ?>
        <?php
        foreach ( $sub_menu as $item ):
            $parent_side_menu[] = $item->menu_item_parent;

            $item_id = $item->ID;
            $image_normal_id = get_post_meta( $item_id, 'misha_img_normal', true );
            $image_normal_url = wp_get_attachment_image_src( $image_normal_id )[0];

            $image_hover_id = get_post_meta( $item_id, 'misha_img_hover', true );
            $image_hover_url = wp_get_attachment_image_src( $image_hover_id )[0];

            $item_url = $item->url;
            $item_title = $item->title;

            if( $current_page_url === $item_url ):
                $active_tab = 'active';
            else:
                $active_tab = '';
            endif;

            ?>

            <div class="sub-item <?php echo $active_tab; ?>">
                <a href="<?php echo $item_url; ?>">
                    <img src="<?php echo $image_normal_url; ?>" class="normal_img" alt="">
                    <img src="<?php echo $image_hover_url; ?>" class="hover_img" alt="">
                    <?php echo $item_title; ?>
                </a>
            </div>

        <?php
        endforeach;
        $parent_side_menu = array_unique($parent_side_menu);
        if( !empty($parent_side_menu) ):
        ?>
        <input type="hidden" value="<?php echo $parent_side_menu[0]; ?>" id="parend_side_menu">
    </div>
<?php
        endif;
endif; ?>

<div class="header-search-wrap">
    <div class="container">
        <?php get_search_form(); ?>
        <a data-balloon-pos="left" data-balloon="<?php _e( 'Close', 'buddyboss-theme' ); ?>" href="#" class="close-search"><i class="bb-icon-close-circle"></i></a>
    </div>
</div>
</div>


<div class="bb-mobile-panel-wrapper left light closed">
    <a href="#" class="bb-close-panel"><i class="bb-icon-close"></i></a>
    <div class="bb-mobile-panel-inner">
        <div class="bb-mobile-panel-header">
            <?php if ( is_user_logged_in() ) { ?>
                <?php
                $user_link		 = function_exists( 'bp_core_get_user_domain' ) ? bp_core_get_user_domain( get_current_user_id() ) : get_author_posts_url( get_current_user_id() );
                $current_user	 = wp_get_current_user();
                ?>
                <div class="user-wrap">
                    <a href="<?php echo $user_link; ?>"><?php echo get_avatar( get_current_user_id(), 100 ); ?></a>
                    <div>
                        <a href="<?php echo $user_link; ?>"><span class="user-name"><?php echo $current_user->display_name; ?></span></a>
                        <?php
                        if ( function_exists( 'bp_is_active' ) && bp_is_active( 'settings' ) ) {
                            $settings_link = trailingslashit( bp_loggedin_user_domain() . bp_get_settings_slug() ); ?>
                            <div class="my-account-link"><a class="ab-item" aria-haspopup="true" href="<?php echo $settings_link; ?>"><?php _e( 'My Account', 'buddyboss-theme' ); ?></a></div><?php
                        } ?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="logo-wrap">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <?php echo $logo; ?>
                    </a>
                </div>
            <?php } ?>
        </div>



        <nav class="main-navigation" data-menu-space="120">
            <?php
//            wp_nav_menu( array(
//                    'theme_location' => 'header-menu',
//                    'menu_id'		 => '',
//                    'container'		 => false,
//                    'fallback_cb'	 => false,
//                    'menu_class'	 => 'bb-primary-menu mobile-menu buddypanel-menu', )
//            );
            ?>
        </nav>

        <?php
        $menu = is_user_logged_in() ? 'buddypanel-loggedin' : 'buddypanel-loggedout';

        if ( has_nav_menu( $menu ) ) {
            echo '<hr />';
        }

        $desktop_sidebar_menu = $muslimeto_bb['desktop_sidebar_menu'];

        wp_nav_menu( array(
                'theme_location' => 'desktop_sidebar',
                'menu_id'		 => $desktop_sidebar_menu,
                'container'		 => false,
                'fallback_cb'	 => false,
                'walker'         => new BuddyBoss_BuddyPanel_Menu_Walker(),
                'menu_class'	 => 'buddypanel-menu side-panel-menu muslimeto_nav', )
        );

//        wp_nav_menu( array(
//                'theme_location' => $menu,
//                'menu_id'		 => '',
//                'container'		 => false,
//                'fallback_cb'	 => false,
//                'walker'         => new BuddyBoss_BuddyPanel_Menu_Walker(),
//                'menu_class'	 => 'buddypanel-menu side-panel-menu', )
//        );
        ?>

        <div class="bb-login-section">
            <?php if ( !is_user_logged_in() ) { ?>
                <a href="<?php echo wp_login_url(); ?>" class="button outline small full secondary sign-in"><?php _e( 'Sign in', 'buddyboss-theme' ); ?></a>
                <?php if ( get_option( 'users_can_register' ) ) { ?>
                    <a href="<?php echo wp_registration_url(); ?>" class="button small full sing-up"><?php _e( 'Sign up', 'buddyboss-theme' ); ?></a>
                <?php } ?>
            <?php } else { ?>
                <a href="<?php echo wp_logout_url(); ?>" class="button small full sign-out"><?php _e( 'Log Out', 'buddyboss-theme' ); ?></a>
            <?php } ?>
        </div>

    </div>
</div>
