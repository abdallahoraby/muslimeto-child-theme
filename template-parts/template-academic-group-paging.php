<?php


$paging = !empty($_POST['paging']) ? $_POST['paging'] : '1,20';

$per_page = (int) explode(',', $paging)[1];
$page_num = (int) explode(',', $paging)[0];




$bb_group_args = array(
    'user_id' => get_current_user_id(),
    'per_page' => 1,
    'page' => $_GET['page']
);


if ( bp_has_groups( $bb_group_args ) ) : ?>


    <ul class="cards">

        <?php
        while ( bp_groups() ) :
            bp_the_group();
            $group_avatar = bp_get_group_avatar(array(
                'class' => 'card__image'
            ));

            $bb_group_id = bp_get_group_id();
            $user_bb_groups_obj = groups_get_groups(array('include' => $bb_group_id));
            $user_bb_groups = $user_bb_groups_obj['groups'];
            $bb_group_desc = substr($user_bb_groups[0]->description,0, 50) ;
            ?>

            <li>
                <a href="<?php bp_group_permalink(); ?>" class="card" data-group-id="<?php echo $bb_group_id; ?>">
                    <?php echo $group_avatar; ?>

                    <div class="card__overlay">
                        <div class="card__header">
                            <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>

                            <div class="card__header-text">
                                <h3 class="card__title"> <?php echo bp_group_name();?> </h3>
                                <span class="card__status">
                                        <?php
                                        printf(
                                        /* translators: %s = last activity timestamp (e.g. "active 1 hour ago") */
                                            __( 'active %s', 'buddyboss-theme' ),
                                            bp_get_group_last_active()
                                        );
                                        ?>
                                    </span>
                            </div>
                        </div>
                        <p class="card__description">
                            <?php echo $bb_group_desc; ?>
                        </p>
                        <div class="group-members-wrap only-grid-view">
                            <?php echo buddyboss_theme()->buddypress_helper()->group_members( bp_get_group_id(), array( 'member', 'mod', 'admin' ) ); ?>
                        </div>
                    </div>
                </a>

            </li>



        <?php endwhile; ?>

    </ul>


<?php else : ?>

    <?php bp_nouveau_user_feedback( 'groups-loop-none' ); ?>

<?php endif; ?>