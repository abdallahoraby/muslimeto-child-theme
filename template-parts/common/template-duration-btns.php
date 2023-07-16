<?php

    // get args first
    if ( !empty($args) && $args['makeup_balance'] ):
        $makeup_balance = (int) $args['makeup_balance'];
    else:
        $makeup_balance = 0;
    endif;

    if( $makeup_balance < 30 ):
        $enable_30 = 'disabled';
        $enable_45 = 'disabled';
        $enable_60 = 'disabled';
    elseif( $makeup_balance >= 30 && $makeup_balance <= 45 ):
        $enable_30 = '';
        $enable_45 = 'disabled';
        $enable_60 = 'disabled';
    elseif ( $makeup_balance >= 45 && $makeup_balance < 60 ):
        $enable_30 = '';
        $enable_45 = '';
        $enable_60 = 'disabled';
    elseif ( $makeup_balance >= 60 ):
        $enable_30 = '';
        $enable_45 = '';
        $enable_60 = '';
    endif;

    if( $enable_30 !== 'disabled' ):
        $active_30 = 'active';
    endif;

    if( $enable_45 !== 'disabled' ):
        $active_45 = 'active';
    endif;

    if( $enable_60 !== 'disabled' ):
        $active_60 = 'active';
    endif;
    

?>

<style>
    /* CONTAINERS */

    .duration_radio_btns {
        width: 100%;
    }


    /* COLUMNS */

    .col {
        display: block;
        float:left;
        margin: 1% 0 1% 1.6%;
    }

    .col:first-of-type { margin-left: 0; }

    /* CLEARFIX */

    .cf:before,
    .cf:after {
        content: " ";
        display: table;
    }

    .cf:after {
        clear: both;
    }


    /* FORM */

    .duration_radio_btns .select-cf input, .duration_radio_btns .payment-plan input, .duration_radio_btns .payment-type input{
        display: none;
    }

    .duration_radio_btns label {
        position: relative;
        padding: 0rem 1rem;
        color: #fff;
        background-color: #cbcbcb;
        font-size: 0.9rem;
        text-align: center;
        height: 2rem;
        display: block;
        cursor: pointer;
        border: 3px solid transparent;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 5px;
        width: auto;
    }

    .duration_radio_btns .select-cf input:checked + label, .duration_radio_btns .payment-plan input:checked + label, .duration_radio_btns .payment-type input:checked + label {
        border: 2px solid #d7d7d7;
        background-color: #27b870;
        border-radius: 5px;
    }

    section.select-cf.cf {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0rem 5rem;
        gap: 1rem;
    }

    .duration_radio_btns .select-cf input:checked + label:after, form .payment-plan input:checked + label:after, .duration_radio_btns .payment-type input:checked + label:after {
        content: "\2713";
        width: 20px;
        height: 20px;
        line-height: 20px;
        border-radius: 100%;
        border: 1px solid #7a7a7a;
        background-color: #27b870;
        z-index: 999;
        position: absolute;
        top: -10px;
        right: -10px;
        font-size: 0.8rem;
    }

    .duration_radio_btns.cf .active {
        background: #62d99e;
    }
    .avialability-status{
        font-size: .6rem;
        height: 30px;
        margin-top: 2.2rem;
        border-radius: 7px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 0!important;
     }
    
</style>

<div class="duration_radio_btns cf">
    <section class="select-cf cf">
        <div>
        <div>
            <input class="duration_btn" type="radio" name="duration_radio_select" id="30_mins" value="30" <?= $enable_30 ?> >
            <label class="premium-label four col <?= $active_30 ?>" for="30_mins">30 mins</label>
        </div>
        <p class="avialability-status"></p>
        </div>
       
        <div>
        <div>
            <input class="duration_btn" type="radio" name="duration_radio_select" id="45_mins" value="45" <?= $enable_45 ?> >
            <label class="premium-label four col <?= $active_45 ?>" for="45_mins">45 mins</label>
        </div>
            <p class="avialability-status"></p>
        </div> 
        
       <div>
                <div>
                            <input class="duration_btn" type="radio" name="duration_radio_select" id="60_mins" value="60" <?= $enable_60 ?>>
                            <label class="premium-label four col <?= $active_60 ?>" for="60_mins">60 mins</label>
                            
                </div>
                <p class="avialability-status"></p>

       </div>
        
    </section>
</div>

