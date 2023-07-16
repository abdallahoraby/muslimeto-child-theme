<?php
/**
 * BuddyPress Groups component admin screen.
 *
 * Props to WordPress core for the Comments admin screen, and its contextual
 * help text, on which this implementation is heavily based.
 *
 * @package BuddyPress
 * @subpackage Groups
 * @since 1.7.0
 */


/**
 * Set up the Groups admin page.
 *
 * Loaded before the page is rendered, this function does all initial setup,
 * including: processing form requests, registering contextual help, and
 * setting up screen options.
 *
 * @since 1.7.0
 *
 * @global BP_Groups_List_Table $bp_groups_list_table Groups screen list table.
 */
function bp_groups_admin_load_2() {
    global $bp_groups_list_table;

    // Build redirection URL.
    $redirect_to = remove_query_arg( array( 'action', 'action2', 'gid', 'deleted', 'error', 'updated', 'success_new', 'error_new', 'success_modified', 'error_modified' ), $_SERVER['REQUEST_URI'] );

    $doaction   = bp_admin_list_table_current_bulk_action();
    $min        = bp_core_get_minified_asset_suffix();

    /**
     * Fires at top of groups admin page.
     *
     * @since 1.7.0
     *
     * @param string $doaction Current $_GET action being performed in admin screen.
     */
    do_action( 'bp_groups_admin_load', $doaction );

    // Edit screen.
    if ( 'do_delete' == $doaction && ! empty( $_GET['gid'] ) ) {

        check_admin_referer( 'bp-groups-delete' );

        $group_ids = wp_parse_id_list( $_GET['gid'] );

        $count = 0;
        foreach ( $group_ids as $group_id ) {
            if ( groups_delete_group( $group_id ) ) {
                $count++;
            }
        }

        $redirect_to = add_query_arg( 'deleted', $count, $redirect_to );

        bp_core_redirect( $redirect_to );

    } elseif ( 'edit' == $doaction && ! empty( $_GET['gid'] ) ) {
        // Columns screen option.
        add_screen_option( 'layout_columns', array( 'default' => 2, 'max' => 2, ) );

        get_current_screen()->add_help_tab( array(
            'id'      => 'bp-group-edit-overview',
            'title'   => __( 'Overview', 'buddypress' ),
            'content' =>
                '<p>' . __( 'This page is a convenient way to edit the details associated with one of your groups.', 'buddypress' ) . '</p>' .
                '<p>' . __( 'The Name and Description box is fixed in place, but you can reposition all the other boxes using drag and drop, and can minimize or expand them by clicking the title bar of each box. Use the Screen Options tab to hide or unhide, or to choose a 1- or 2-column layout for this screen.', 'buddypress' ) . '</p>'
        ) );

        // Help panel - sidebar links.
        get_current_screen()->set_help_sidebar(
            '<p><strong>' . __( 'For more information:', 'buddypress' ) . '</strong></p>' .
            '<p><a href="https://buddypress.org/support">' . __( 'Support Forums', 'buddypress' ) . '</a></p>'
        );

        // Register metaboxes for the edit screen.
        add_meta_box( 'submitdiv', _x( 'Save', 'group admin edit screen', 'buddypress' ), 'bp_groups_admin_edit_metabox_status', get_current_screen()->id, 'side', 'high' );
        add_meta_box( 'bp_group_settings', _x( 'Settings', 'group admin edit screen', 'buddypress' ), 'bp_groups_admin_edit_metabox_settings', get_current_screen()->id, 'side', 'core' );
        add_meta_box( 'bp_group_add_members', _x( 'Add New Members', 'group admin edit screen', 'buddypress' ), 'bp_groups_admin_edit_metabox_add_new_members', get_current_screen()->id, 'normal', 'core' );
        add_meta_box( 'bp_group_members', _x( 'Manage Members', 'group admin edit screen', 'buddypress' ), 'bp_groups_admin_edit_metabox_members', get_current_screen()->id, 'normal', 'core' );
        add_meta_box( 'bp_group_zoom_meeting_id', _x( 'Zoom Meeting ID', 'group admin edit screen', 'buddypress' ), 'bp_groups_admin_edit_metabox_zoom_meeting_id', get_current_screen()->id, 'normal', 'core' );

        // Group Type metabox. Only added if group types have been registered.
        $group_types = bp_groups_get_group_types();
        if ( ! empty( $group_types ) ) {
            add_meta_box(
                'bp_groups_admin_group_type',
                _x( 'Group Type', 'groups admin edit screen', 'buddypress' ),
                'bp_groups_admin_edit_metabox_group_type',
                get_current_screen()->id,
                'side',
                'core'
            );
        }

        /**
         * Fires after the registration of all of the default group meta boxes.
         *
         * @since 1.7.0
         */
        do_action( 'bp_groups_admin_meta_boxes' );

        // Enqueue JavaScript files.
        wp_enqueue_script( 'postbox' );
        wp_enqueue_script( 'dashboard' );

        // Index screen.
    } else {
        // Create the Groups screen list table.
        $bp_groups_list_table = new BP_Groups_List_Table();

        // The per_page screen option.
        add_screen_option( 'per_page', array( 'label' => _x( 'Groups', 'Groups per page (screen options)', 'buddypress' )) );

        // Help panel - overview text.
        get_current_screen()->add_help_tab( array(
            'id'      => 'bp-groups-overview',
            'title'   => __( 'Overview', 'buddypress' ),
            'content' =>
                '<p>' . __( 'You can manage groups much like you can manage comments and other content. This screen is customizable in the same ways as other management screens, and you can act on groups by using the on-hover action links or the Bulk Actions.', 'buddypress' ) . '</p>',
        ) );

        get_current_screen()->add_help_tab( array(
            'id'      => 'bp-groups-overview-actions',
            'title'   => __( 'Group Actions', 'buddypress' ),
            'content' =>
                '<p>' . __( 'Clicking "Visit" will take you to the group&#8217;s public page. Use this link to see what the group looks like on the front end of your site.', 'buddypress' ) . '</p>' .
                '<p>' . __( 'Clicking "Edit" will take you to a Dashboard panel where you can manage various details about the group, such as its name and description, its members, and other settings.', 'buddypress' ) . '</p>' .
                '<p>' . __( 'If you click "Delete" under a specific group, or select a number of groups and then choose Delete from the Bulk Actions menu, you will be led to a page where you&#8217;ll be asked to confirm the permanent deletion of the group(s).', 'buddypress' ) . '</p>',
        ) );

        // Help panel - sidebar links.
        get_current_screen()->set_help_sidebar(
            '<p><strong>' . __( 'For more information:', 'buddypress' ) . '</strong></p>' .
            '<p>' . __( '<a href="https://buddypress.org/support/">Support Forums</a>', 'buddypress' ) . '</p>'
        );

        // Add accessible hidden heading and text for Groups screen pagination.
        get_current_screen()->set_screen_reader_content( array(
            /* translators: accessibility text */
            'heading_pagination' => __( 'Groups list navigation', 'buddypress' ),
        ) );
    }


/**
 * Output the markup for a single group's zoom meeting id metabox.
 *
 * @since 1.7.0
 *
 * @param BP_Groups_Group $item The BP_Groups_Group object for the current group.
 */
function bp_groups_admin_edit_metabox_zoom_meeting_id(  ) {

    $group_id = isset( $_GET['gid'] ) ? absint( $_GET['gid'] ): 0;
    $zoom_meeting_id = groups_get_groupmeta( $group_id, 'group_zoom_meeting_id');

    ?>

    <label for="bp-groups-zoom-meeting-id" class="screen-reader-text"><?php
        /* translators: accessibility text */
        _e( 'Zoom Meeting ID', 'buddypress' );
        ?></label>
    <input name="bp-groups-new-members" type="text" id="bp-groups-new-members" value="<?php echo $group_id;?>"  placeholder="" />
    <?php
}

}