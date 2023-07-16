<?php

    if ( !empty($args) ):
        if( !empty($args['wp_user_id']) ):
            $wp_user_id = $args['wp_user_id'];
        else:
            $wp_user_id = get_current_user_id();
        endif;
    else:
        $wp_user_id = get_current_user_id();
    endif;

    if ( !empty($args) ):
        if( !empty($args['group_status']) ):
            $group_status = $args['group_status'];
        endif;
    endif;

    if( !empty($args) ):
        if( !empty($args['group_type']) ):
            $group_type = $args['group_type'];
        endif;
    endif;

    if( !empty($args) ):
        if( !empty($args['bb_group_id']) ):
            $posted_bb_group_id = $args['bb_group_id'];
        endif;
    endif;




    // first check if user is parent => get his childs and insert his id in the list
    if( checkIfParent($wp_user_id) == true ):
        $childs = getParentChilds($wp_user_id);
        $childs[] = $wp_user_id;
        // for all users list get associated groups linked to them
        foreach ( $childs as $child_user_id ):
            $user_groups = groups_get_user_groups($child_user_id);
            foreach ( $user_groups['groups'] as $group_ids ):
                $groups_list[] = $group_ids;
            endforeach;
        endforeach;


        $groups_list = array_unique($groups_list);

        $group_options = '';
        foreach ( $groups_list as $bb_group_id ):
            $group_obj = groups_get_group ( $bb_group_id );
            $bb_group_type = getBBgroupType($bb_group_id);
            $sp_entry_id = getBBgroupGFentryID($bb_group_id);
            // show only 'active' groups in academic page
            if( !empty($sp_entry_id) ):
                $program_status_meta = getGFentryMetaValue($sp_entry_id, 26);
                if( !empty($program_status_meta) ):
                    $bb_group_status = $program_status_meta[0]->meta_value;
                endif;
            endif;

            // get first member in group
            $group_members_names = getBBgroupMembersNames($bb_group_id);
            $group_name = 'CID-' . $bb_group_id . ' ' . substr($group_obj->name, 0, 30) . ' ...';
            $sp_entry_id = getBBgroupGFentryID ($bb_group_id);
            $teacher_id = getSPentryStaffId($sp_entry_id);
            $teacher_fullname = getStaffFullName($teacher_id);

            if( !empty($args) ):
                if( $bb_group_status == $group_status  &&  in_array($bb_group_type, $group_type) ):
                    $group_options .= "<option value='$bb_group_id'> $group_name - $group_members_names[0] - $teacher_fullname </option>";
                endif;
            else:
                $group_options .= "<option value='$bb_group_id'> $group_name - $group_members_names[0] - $teacher_fullname </option>";
            endif;
        endforeach;

    elseif( !empty($posted_bb_group_id) ):
        // get first member in group
        $group_members_names = getBBgroupMembersNames($posted_bb_group_id);
        $group_obj = groups_get_group ( $posted_bb_group_id );
        $group_name = 'CID-' . $posted_bb_group_id . ' ' . substr($group_obj->name, 0, 30) . ' ...';
        $sp_entry_id = getBBgroupGFentryID ($posted_bb_group_id);
        $teacher_id = getSPentryStaffId($sp_entry_id);
        $teacher_fullname = getStaffFullName($teacher_id);
        $group_options = "<option value='$posted_bb_group_id'> $group_name - $group_members_names[0] - $teacher_fullname </option>";
    endif;

?>


        <div class="classes-select-section">
            <label for=""> Class </label>
            <select name="" class="users-groups-select">
                <option value="0" selected disabled> -- select -- </option>
                <?= $group_options ?>
            </select>
        </div>

        <div class="teacher-name-section">
            <span></span>
            <input type="hidden" value="0" id="staff_id">
        </div>


