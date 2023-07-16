<?php

    if ( !empty($args) && $args['bb_group_id'] ):
        $bb_group_id = $args['bb_group_id'];
    else:
        $bb_group_id = bp_get_current_group_id();
    endif;

    $upcoming_classes = getBBgroupUpcomingClass($bb_group_id, 5);

    if( !empty($upcoming_classes) ):
        ?>

        <div class="support-dash-notification col-12 ">
            <table class="table-borderless">
                <thead>
                <tr>
                    <th> Day </th>
                    <th> Start </th>
                    <th> End </th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ( $upcoming_classes as $class ): ?>
                    <tr>
                        <td> <?= date( 'D Y-m-d', strtotime($class->start_date) ) ?> </td>
                        <td> <?= $class->start_date ?> </td>
                        <td> <?= $class->end_date ?> </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

<?php
    else:
?>

<?php
    endif;