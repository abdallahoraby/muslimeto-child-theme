<style>
    /* CONTAINERS */

    .childs_radio_btns {
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

    .childs_radio_btns .select-cf input, .childs_radio_btns .payment-plan input, .childs_radio_btns .payment-type input{
        display: none;
    }

    .childs_radio_btns label {
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
    }

    .childs_radio_btns .select-cf input:checked + label, .childs_radio_btns .payment-plan input:checked + label, .childs_radio_btns .payment-type input:checked + label {
        border: 2px solid #d7d7d7;
        background-color: var(--green);
        border-radius: 5px;
    }

    .childs_radio_btns .select-cf input:checked + label:after, form .payment-plan input:checked + label:after, .childs_radio_btns .payment-type input:checked + label:after {
        content: "\2713";
        width: 20px;
        height: 20px;
        line-height: 20px;
        border-radius: 100%;
        border: 1px solid #7a7a7a;
        background-color: var(--green);
        z-index: 999;
        position: absolute;
        top: -10px;
        right: -10px;
        font-size: 0.8rem;
    }

</style>

<div class="childs_radio_btns cf">
    <section class="select-cf cf">
        <input type="radio" name="childs_radio_select" id="cus_1" value="1"><label class="free-label four col" for="cus_1">Loai</label>
        <input type="radio" name="childs_radio_select" id="cus_2" value="2" checked><label class="basic-label four col" for="cus_2">Hannah</label>
        <input type="radio" name="childs_radio_select" id="cus_3" value="3"><label class="premium-label four col" for="cus_3">fatma</label>
        <input type="radio" name="childs_radio_select" id="cus_4" value="4"><label class="premium-label four col" for="cus_4">ahmed</label>
        <input type="radio" name="childs_radio_select" id="cus_5" value="5"><label class="premium-label four col" for="cus_5">mohamed</label>
    </section>

</div>