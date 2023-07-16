<style>
    .makeup-balance {
    border-radius: 0 10px 10px 0;
    background: rgb(71 179 230 / 16%);
    border-left: 4px solid var(--blue);
    display: flex!important;
    flex-direction: column!important;
    justify-content: space-between!important;
    align-items: start!important;
    min-height: auto;
    margin-bottom: 10px;
    padding: 0 0.5rem;
}

.makeup-balance h2 {
    color: var(--main-color);
    font-size: var(--fs-500)!important;
    font-weight: 600!important;
    /* font-family: "Rubik","Times New Roman",serif!important; */
}
.mak_down {
    border-radius: 12px;
    width: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.mak_down p {
    display: flex;
    justify-content: center;
    align-items: center;
}
.mak_hours, .mak_minutes {
    width: 3rem;
    height: 2rem;
}
.mak_separator {
    width: 1rem;
    font-size: 1.5rem!important;
    color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
}
.mak_time {
    font-size: 2rem!important;
    color: #fff;
    background: var(--blue);
    width: 3rem;
    height: 2rem;
    background: #46b3e6;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
    border-radius: 0px;
    box-shadow: 0 0 15px rgb(126 193 220);
}
.mak_text {
    font-size: var(--fs-100)!important;
    display: flex;
    justify-content: start;
    align-items: start;
    position: relative;
    line-height: 2;
}
.schedule-makeup-class{
    font-size: .6rem!important;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: nowrap;
    white-space: nowrap;
    padding: 0;
    color:var(--main-color)!important;
}
.schedule-makeup-class span{
    font-size: .8rem!important;
    color:var(--main-color)!important;
    margin-right: 3px;
}
.mak_actions {
    justify-content: space-between;
    width: 100%;
    position: relative;
    align-items: center;
    padding: 10px;
}
.btn.schedule-makeup-class:focus{
    box-shadow: none!important;
}
.btn.schedule-makeup-class:active{
    background-color: transparent!important;
}
</style>
<?php

    if ( !empty($args) && $args['wp_user_id'] ):
        $wp_user_id = $args['wp_user_id'];
    else:
        $wp_user_id = get_current_user_id();
    endif; ?>

<div class="col-lg-3 col-md-6 col-xs-12  ml-auto mak_container">
<?php
    // check if parent
    $user_is_parent = user_has_role($wp_user_id, 'parent');
    if( $user_is_parent ):
        $parent_makeup_balance = (int) get_user_meta( $wp_user_id, 'makeup_balance', true );
        ?>
        <!-- makeup balance -->
            <div class="makeup-balance">
                <h2>Makeup Balance</h2>
                <?php
                // get user record in makeup_log table
                global $wpdb;
                $makeup_log_table = $wpdb->prefix . 'muslimeto_makeup_log';
                $open_balance_result = $wpdb->get_results(
                    "SELECT trans_amount FROM $makeup_log_table WHERE parent_id = {$wp_user_id} AND trans_type = 'open-balance'"
                );
                $wpdb->flush();

                if( !empty($open_balance_result) ):
                    $user_has_open_balance = true;
                else:
                    $user_has_open_balance = false;
                endif;

                // if user has no opening balance show coming soon
                if( !empty($parent_makeup_balance) && $user_has_open_balance == true ):
                    $makeup_hrs = intval($parent_makeup_balance/60);
                    $makeup_mins = $parent_makeup_balance - ($makeup_hrs * 60);
                    ?>
                    <div class="w-100 mak_down">
                        <p class="text-center">
                            <span class="mak_hours">
                                   <span class="mak_time"> <?php echo $makeup_hrs; ?> </span>
                                   <span class="mak_text">HOUR</span>
                               </span>
                            <span class="mak_separator">:</span>
                            <span class="mak_minutes">
                                   <span class="mak_time"> <?php echo $makeup_mins; ?> </span>
                                   <span class="mak_text">MINUTES</span>
                               </span>
                        </p>
                    </div>

                    <div class="mak_actions ">
                        <button  class="btn schedule-makeup-class" data-balloon-pos="down" data-balloon="Schedule Makeup Class" data-bs-toggle="modal" data-bs-target="#schedule-makeup-session"><span class="material-icons">edit_calendar</span>Schedule Makeup Session</button>
                    </div>

                <?php else: ?>

                    <span class="w-100 mak_down"> coming soon </span>

                <?php endif; ?>

            </div>

    <?php else: ?>
        <div class="alert"> User is not a parent.</div>
    <?php endif; ?>

</div>
