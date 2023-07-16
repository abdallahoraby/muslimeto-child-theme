<div class="sidebar">

    <?php
        $bb_group_id = bp_get_current_group_id();
        $bb_group_Type = bp_groups_get_group_type( $bb_group_id );?>

    <div class="group-teacher">
        <?php // if this is an organization group change template parts
        if( $bb_group_Type == 'school' ): ?>
            <p class="header"> Vibrant Learning Community <span style="content: "\1F496";">&#128150;</span> </p>
        <?php
            get_template_part('template-parts/class-dashboard/template-organization-members');
        elseif ( $bb_group_Type == 'summer-camp' ): ?>
        <p class="header"> Instructors </p>
        <?php else: ?>
        <p class="header"> Assigned Teacher </p>
        <?php endif; ?>

        <?php if( $bb_group_Type !== 'school' ): ?>
            <?php get_template_part('template-parts/template-group-moderator'); ?>
        <?php endif; ?>
    </div>

    <?php if( $bb_group_Type !== 'school' ): ?>
        <?php get_template_part('template-parts/template-members-loop'); ?>
    <?php endif; ?>

</div>


