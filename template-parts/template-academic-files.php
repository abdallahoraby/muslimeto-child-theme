<?php
/**
 * BuddyBoss - Groups Document
 *
 * @since BuddyBoss 1.4.0
 */
?>

<div class="bb-media-container group-media">
    <?php
    bp_get_template_part( 'media/theatre' );

    if ( bp_is_profile_video_support_enabled() ) {
        bp_get_template_part( 'video/theatre' );
        bp_get_template_part( 'video/add-video-thumbnail' );
    }

    bp_get_template_part( 'document/theatre' );

    if ( bp_is_single_folder() ) {
        bp_get_template_part( 'document/single-folder' );
    } else {
//        switch ( bp_current_action() ) :

//            // Home/Documents.
//            case 'documents':
                ?>
                <div class="bp-document-listing">
                    <div class="bp-media-header-wrap">

                        <h2 class="bb-title"><?php esc_html_e( 'Documents', 'buddyboss' ); ?></h2>

                        <?php
                        bp_get_template_part( 'document/add-folder' );
                        bp_get_template_part( 'document/add-document' );
                        ?>

                        <div id="search-documents-form" class="media-search-form" data-bp-search="document">
                            <form action="" method="get" class="bp-dir-search-form" id="group-document-search-form" autocomplete="off">
                                <button type="submit" id="group-document-search-submit" class="nouveau-search-submit" name="group_document_search_submit">
                                    <span class="dashicons dashicons-search" aria-hidden="true"></span>
                                    <span id="button-text" class="bp-screen-reader-text"><?php esc_html_e( 'Search', 'buddyboss' ); ?></span>
                                </button>
                                <label for="group-document-search" class="bp-screen-reader-text"><?php esc_html_e( 'Search Documents…', 'buddyboss' ); ?></label>
                                <input id="group-document-search" name="document_search" type="search" placeholder="<?php esc_attr_e( 'Search Documents…', 'buddyboss' ); ?>">
                            </form>
                        </div>

                    </div>
                </div><!-- .bp-document-listing -->

                <?php

                bp_nouveau_group_hook( 'before', 'document_content' );

                bp_get_template_part( 'document/actions' );

                ?>
                <div id="media-stream" class="media" data-bp-list="document">
                    <div id="bp-ajax-loader"><?php bp_nouveau_user_feedback( 'group-document-loading' ); ?></div>
                </div><!-- .media -->
                <?php

                bp_nouveau_group_hook( 'after', 'document_content' );

//                break;
//
//            // Any other.
//            default:
//                bp_get_template_part( 'groups/single/plugins' );
//                break;
//        endswitch;
    }
    ?>
</div>



<?php
/**
 * BuddyBoss - Groups Video
 *
 * @since BuddyBoss 1.7.0
 */
?>

<div class="bb-video-container bb-media-container group-video">
    <?php
    bp_get_template_part( 'media/theatre' );
    bp_get_template_part( 'video/theatre' );
    bp_get_template_part( 'document/theatre' );

//    switch ( bp_current_action() ) :
//
//        // Home/Video.
//        case 'videos':
            if (
                bp_is_group_video() &&
                (
                    groups_can_user_manage_video( bp_loggedin_user_id(), bp_get_current_group_id() ) ||
                    groups_is_user_mod( bp_loggedin_user_id(), bp_get_current_group_id() ) ||
                    groups_is_user_admin( bp_loggedin_user_id(), bp_get_current_group_id() )
                )
            ) {
                bp_get_template_part( 'video/add-video' );
            } else {
                ?>
                <h2 class="bb-title"><?php esc_html_e( 'Videos', 'buddyboss' ); ?></h2>
                <?php
            }

            bp_nouveau_group_hook( 'before', 'video_content' );

            bp_get_template_part( 'video/actions' );

            ?>
            <div id="video-stream" class="video" data-bp-list="video">

                <div id="bp-ajax-loader"><?php bp_nouveau_user_feedback( 'group-video-loading' ); ?></div>

            </div><!-- .media -->
            <?php

            bp_nouveau_group_hook( 'after', 'video_content' );

//            break;
//
//        // Any other.
//        default:
//            bp_get_template_part( 'groups/single/plugins' );
//            break;
//    endswitch;
    ?>
</div>
