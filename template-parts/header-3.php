<div class="container site-header-container flex default-header header-3">
    <!-- upcomming class -->
     <div class="header-upcomming-classes count-down-header-container d-flex mr-auto p-0">
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



            <?php
            if (is_user_logged_in()) : // if user is logged in => get next pending class
                // get next session with status 'pending'
                global $next_pending;
                $next_pending = getNextPendingSession( get_current_user_id() );
                if( $next_pending !== false ):
                    $start_date = $next_pending['start_date'];
                    $stored_bb_group_id = $next_pending['stored_bb_group_id'];
                    $sp_entry_id = getBBgroupGFentryID ($stored_bb_group_id);
                    $group_timezone = getSPentryTimezone($sp_entry_id);
                    $class_start_date_converted = convertTimezone1ToTimezone2 ( $start_date, 'UTC', $group_timezone );
                    $dateTime = new DateTime();
                    $dateTime->setTimeZone(new DateTimeZone( $group_timezone ));
                    $timezone_abbr = $dateTime->format('T');
            ?>
            <!-- makeup schedual classes confirmation  -->
            <div class="d-flex">
                    <button class="schedual-classes-header-btn btn " type="button" data-bs-toggle="modal" data-bs-target="#header-schedual-class" data-balloon-pos="down" data-balloon="New Makeup Scheduled">
                    <span class="schadual_icon">
                            <span class="animate__animated animate__tada animate__infinite animate__slower">
                                <i class="bb-icon-bell bb-icon-l"></i>
                            </span>
                        </span>
                        <p class="schadual_text"> 
                            [Pending Confirmation] New makeup scheduled at <?= date('h:i a', strtotime($class_start_date_converted)) ?> <?= $timezone_abbr ?>, <?= date('D d/m/Y', strtotime($class_start_date_converted)) ?>
                        </p>
                    </button>
            </div>
            <?php
                endif;
            endif; ?>

     </div>
    <div class="notification-bar"></div>

    <?php if (is_user_logged_in()) : ?>
         <!-- today classes -->
        <div class="header-upcomming-classes d-flex">
           <span class="today-class-number count">0</span>
            <button class="header-upcomming-classes-btn today-class btn" type="button" data-bs-toggle="modal" data-bs-target="#today-upcomming-class" data-balloon-pos="down" data-balloon="Recent/Upcoming Classes">
               <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon_classroom.svg" class="upcoming-class-img" alt="" width="20px" height="auto">
            </button>
     </div>
    <?php endif; ?>

    <?php get_template_part( 'template-parts/header-aside' ); ?>

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
    <div class="sub-menu-fixed">
        <input type="hidden" value="submenu" id="submenu" >
    <?php
        foreach ( $sub_menu as $item ):
            $parent_side_menu[] = $item->menu_item_parent;

            $item_id = $item->ID;
            $image_normal_id = get_post_meta( $item_id, 'misha_img_normal', true );
            if( !empty($image_normal_id) ):
                $image_normal_url = wp_get_attachment_image_src( $image_normal_id )[0];
            else:
                $image_normal_url = '';
            endif;
            $image_hover_id = get_post_meta( $item_id, 'misha_img_hover', true );
            if( !empty($image_hover_id) ):
                $image_hover_url = wp_get_attachment_image_src( $image_hover_id )[0];
            else:
                $image_hover_url = '';
            endif;

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
endif;




