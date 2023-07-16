
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<style>
    /* general style */
    /* root */
    :root{
        /* colors */
        --fc-success: #49bb88;
        --fc-danger:#cf2e2e;
        --fc-warning:#fcb918;
        --main-color:#616971!important;
        /* font */
        --fs-xl: 1.4rem;
        --fs-600: 1.2rem;
        --fs-500: 1rem;
        --fs-400: .9rem;
        --fs-300: 0.8rem;
        --fs-200: .7rem;
        --fs-100: .5rem;
        --fs-50: .4rem;
        --input-height: 2rem;
        --sqaure:3rem;
        /* box shadow */
        --box-shadow: 0 0 30px 0 rgba(0,0,0,.16);
        /* font pairs */
        --title-font:'SF UI Display',sans-serif!important;
        --body-font:Verdana, sans-serif!important;
    }
    .container {
        max-width: 100%!important;
    }
    .bg-white{
        background-color: #fff!important;
        border-radius:20px;
    }
    .tab-content .card{
        min-height: 20vh!important;
    }
    #page-account-settings > .row{
        margin-left: -20px!important;
        margin-right: -20px!important;
    }
    /* general setting for layout */
    .account-right-section{
        margin-left: 25%!important;
    }
    .account-left-section{
        background-color: #fff;
        position: fixed!important;
        height: 90vh!important;
        width: 20%!important;
        padding: 1rem!important;
        border-radius:20px;
        display: flex;
        flex-direction:column;
        top:calc(1rem + 58px);
        bottom: 20vh;
        z-index: 0;
        left: calc(170px);
    }
    /* profile tabs style */
    .main-nav{
        margin-left: 15px!important;
    }
    .main-nav .nav-item a.active{
        background: #fff!important;
        box-shadow: none!important;
        color: var(--blue)!important;
        font-weight: 600!important;
        border: .5rem solid #f1f3f3;
        transition:200ms linear;
    }
    .main-nav{
        margin-bottom: -40px!important;
        justify-content: space-between;
        z-index: 99;
    }
    .main-nav .nav-item a.active span:nth-child(2){
        color: var(--blue)!important;
    }
    .main-nav .nav-item a{
        font-size: var(--fs-300)!important;
        color:var(--main-color);
        font-weight: 500;
        width: 6rem!important;
        height: 6rem;
        border-radius: 50%!important;
        justify-content: center;
        align-items: center;
        display: flex;
        opacity: .8;
    }
    .main-nav .nav-item a:hover{
        opacity: 1;
    }
    .main-nav .nav-item a:hover span{
        color: var(--blue);
    }
    .main-nav .nav-item a span{
        font-size: var(--fs-400)!important;
        color:var(--main-color);
        font-weight: 500;
        width: 5vw;
        height: 5vw;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        padding: 15px;
    }
    .main-nav .nav-item a span:nth-child(2){
        display: flex;
    }
    .main-nav .nav-item a .nav-icon{
        display: none;
        font-size:1.2rem!important;
    }
    .main-nav .nav-item a.active .nav-icon{
        color:var(--blue)!important
    }
    /*sub tabs in main tab profile tabs */
    .sub-nav-tabs li a span{
        font-size: var(--fs-300)!important;
        color:var(--main-color)!important;
        font-weight: 500;
        opacity: .7;
        transition:200ms linear;
    }
    .sub-nav-tabs li a span:hover{
        opacity: 1;
        color:var(--blue)!important;
    }
    .sub-nav-tabs li a.active{
        background:transparent!important;
        color:var(--blue)!important;
        border:0!important;
        box-shadow:none!important;
    }
    .sub-nav-tabs li a.active span{
        font-weight: 600!important;
        opacity: 1;
    }
    .sub-nav-tabs li a .material-icons{
        width: 25px;
        height: 25px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
    }
    .sub-nav-tabs li a:first-child{
        padding-left: 0!important;
    }
    .sub-nav-tabs li a.active span{
        color:var(--blue)!important
    }
    /* content forms in tabs*/
    /* member tab */
    .member-datails{
        display: inline-flex!important;
    }
    .gform_wrapper.gravity-theme .gform_fields{
        grid-row-gap: 2rem!important;
    }
    .card-body{
        padding: var(--fs-xl)!important;
    }
    .gform_button.button.form-control[type=submit],input.gform_button,.acc_info_btn{
        border:none!important;
        background:var(--blue)!important;
        box-shadow:none!important;
        border-radius: 0!important;
        height: var(--input-height);
        width: fit-content!important;
        font-size: var(--fs-400);
        transition: 200ms linear;
    }
    .gform_button.button.form-control[type=submit]:hover,input.gform_button,.acc_info_btn:hover{
        transform: translateX(3px);
    }
    .btn{
        height: var(--input-height);
        font-size: var(--fs-400)!important;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0!important;
        border-radius: 0!important;
    }
    .checkbox.checkbox-primary{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .checkbox.checkbox-primary input[type=checkbox]{
        width: var(--fs-300);
        margin-right: 5px;
    }
    .checkbox.checkbox-primary label{
        margin-bottom: 0!important;
    }
    .gform_button.button.form-control[type=submit]:hover,.save_n_pass:hover,.save-change:hover,.add-new-learner button:hover,.gform_button:hover{
        transform: translateX(5px);
    }
    .save_n_pass,.save-change,.gform_button{
        box-shadow:none!important;
        transition: 200ms linear;
    }
    .btn.cancel:hover{
        border:1px solid var(--blue)!important;
    }
    .card-body .gform_wrapper.gravity-theme legend{
        font-size: var(--fs-200)!important;
        color: var(--main-color)!important;
        font-weight:500;
    }
    .card-body .gform_wrapper.gravity-theme .ginput_complex label{
        display:none!important;
    }
    .card-body .gform_wrapper.gravity-theme .gfield_label,.account_wrapper label,.card-body .account_wrapper th,.acc_info_legend{
        font-size: var(--fs-200)!important;
        color: var(--main-color)!important;
        font-weight:500!important;
        line-height:1;
        text-transform: none!important;
    }
    .card-body .bb-custom-typo h4,.card-body .card-body h4{
        font-size: var(--fs-400)!important;
        color: var(--main-color)!important;
        font-weight:500!important;
    }
    .card-body .bb-custom-typo h6{
        font-size: var(--fs-200)!important;
        color: var(--main-color)!important;
        font-weight:500!important;
    }
    #basic-table p{
        display: none!important;
    }
    .cancel{
        color:var(--gray)!important;
        background-color: transparent!important;
        border:1px solid transparent!important;
        transition: 200ms linear;
    }
    .btn-view{
        height: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 20px!important;
        font-size: 10px!important;
        background: #d5e9f1!important;
        color: #46b3e6!important;
        font-size: var(--fs-300);
    }
    .gform_wrapper.gravity-theme .gfield input,
    .gform_wrapper.gravity-theme .gfield select,
    td input,td select,input,select,form input,form select,
    .acc_info_input,.form-control.old_pass,.form-control.new_pass{
        height:var(--input-height)!important;
        font-size:var(--fs-200)!important;
        padding: 0px 15px!important;
        border:1px solid #f1f3f3!important;
        border-radius:20px;
        width: 100%!important;
    }
    #memb_addupdate_creditcard-1{
        margin-left:2rem;
    }
    .gform_wrapper.gravity-theme span.material-icons, .acc_info_legend span.material-icons,.billing_tab_paymentmethod label span.material-icons {
        background: var(--blue);
        font-size: .75rem!important;
        width: 17px;
        height: 17px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        margin-right: 5px;
        margin-bottom: 15px;
        color: #fff;
        opacity: .8;
        transition:200ms linear;
        cursor: default;
    }
    .gform_wrapper.gravity-theme span.material-icons:hover{
        opacity: 1;
    }
    .gform_wrapper.gravity-theme .gfield.gfield--width-full strong,.acc_info_text strong{
        font-size: var(--fs-300)!important;
        line-height: var(--fs-500);
    }
    .acc_info_text{
        margin-top:20px!important;
    }
    .acc_info_text p{
        margin-bottom:0!important;
    }
    .account_wrapper td{
        font-size: var(--fs-300)!important;
        color: var(--main-color)!important;
        font-weight:300!important;
        text-align:center!important;
    }
    .add_learner_table td{
        text-align:left!important;
        padding: 10px 0!important;
    }
    .star_required{
        color: #c02b0a;
        display: inline-block;
        font-size: 13.008px;
        padding-left: 0.125em;
    }
    .gform_wrapper.gravity-theme .gfield.gfield--width-full,.acc_info_text p{
        font-size: var(--fs-300)!important;
        border: 0!important;
    }
    .billing_scn{
        padding: 0!important;
    }
    .account-summery{
        padding: 0 60px!important;
    }
    .account-summery h2,.billing-aside-info h2{
        text-align: center;
    }
    .account-summery .material-icons{
        display: none!important;
    }
    .sponsor_astudent_tab .ginput_container.ginput_container_consent {
        display:flex;
        justify-content: start;
        align-items: center;
        flex-wrap: nowrap;
    }
    /* left Aside  *****************************/
    .account-active-learners{
        display: flex;
        justify-content: space-between;
        align-items:center;
        flex-direction:row;
        border-radius: 10px;
        height: 12vh;
        margin-top: 2vh!important;
        border:1px solid #fff;
        padding: 5px!important;
    }
    .account-active-learners .account-overview-num{
        font-weight: bold;
        font-size: 14px!important;
    }
    .account-active-learners{
        background: rgb(146 119 182 / 16%);
    }
    .account-active-learners h2{
        white-space: nowrap;
        font-size: var(--fs-500);
        color: var(--main-color);
        margin-bottom:5px;
    }
    .text-bold{
        font-weight:bold;
    }
    .account-left-section .img_cont{
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0!important;
        margin: 5px 0;
        position: relative;
    }
    .account-left-section .img_cont img{
        border-radius: 50%;
        border:1px solid #eee;
    }
    .img-change-container{
        position: relative;
        height: 100px;
        width: 100px;
    }
    .account-left-section .img_cont img{
        border-radius: 50%;
        border:1px solid #eee;
    }
    .account-left-section .img_cont .middle_im {
        float: none!important;
        position: absolute;
        bottom: auto!important;
        right: auto!important;
        display: flex;
        justify-content: center;
        align-items: center;
        left: calc(75% + 25px)!important;
        top: calc(50% + 30px)!important;
        cursor: pointer;
    }
    .account-left-section .img_cont .middle_im i{
        margin: 0;
        padding: 0;
        font-size: 12px;
        background: #47b3e6;
        width: 25px;
        height: 25px;
        color: #ffff!important;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    /* left section account title info */
    /* contain avatar & contact info */
    .account-title-container{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: .4vw;
    }
    .account-title-container h6{
        line-height: 2px;
    }
    .account-title-container small{
        font-size: var(--fs-200);
        padding: 0;
    }
    .soc_ul{
        border-bottom: 1px solid #f1f3f3;
    }
    .soc_ul li.text-muted{
        font-size: var(--fs-200)!important;
        display: flex;
        align-items: center;
        opacity: .7;
        margin-bottom: 15px!important;
        cursor: default;
        transition:200ms linear;
    }
    .account-left-section .u_time_zone:hover,.soc_ul li.text-muted:hover{
        opacity: 1;
    }
    .account-left-section .u_time_zone{
        display: block;
        font-size: 0.7rem;
        line-height: normal;
        color: var(--main-color);
        margin: 0 !important;
        opacity: .8;
        margin-top: 0 !important;
        /* background: #f1f3f3; */
        padding: 0;
        border-radius: 10px;
    }
    .u_time_zone .material-icons,.soc_ul li .material-icons{
        font-size: 10px;
        margin-right: 3px;
        background: #fbba3b;
        width: 20px;
        height: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        color: #fff;
    }
    .soc_ul li:first-child .material-icons{
        background: #46b3e6;
    }
    .soc_ul li:nth-child(2) .material-icons{
        background: #49bb88;
    }
    /* modal change img */
    .avatar-upload{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .account-change-img{
        backdrop-filter: blur(5px);
    }
    .account-change-img .modal-title{
        font-size:var(--fs-400);
        display: flex;
        justify-content: center;
        align-items: center;
        color:var(--main-color);
        font-weight: 600;
    }
    .account-change-img .modal-title span{
        font-size: var(--fs-500);
        color: var(--main-color);
        background: var(--blue);
        height: 30px;
        width: 30px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        margin-right: 5px;
    }
    .account-change-img .modal-body,.account-change-img .modal-body .nav{
        margin-top: 0!important;
    }
    .account-change-img .modal-body .nav-pills{
        border-bottom: 1px solid #eee;
        margin-left: 0!important;
    }
    .account-change-img .modal-body .nav-pills .nav-link.active{
        background: transparent;
        color: var(--main-color);
        box-shadow: none;
        border: 1px solid #eee;
        border-bottom-color: transparent;
        margin-bottom: -5px;
        background: white;
    }
    .account-change-img .modal-body .nav-pills .nav-link.active span{
        color: var(--main-color)!important;
    }
    .account-change-img .modal-body .nav-pills .nav-link{
        border-radius: 0;
        font-size:var(--fs-300);
        display: flex;
        justify-content: center;
        align-items: center;
        color:var(--gray);
        font-weight: 600;
    }
    .account-change-img .modal-body .nav-pills .nav-link span{
        font-size:var(--fs-400);
        color:var(--main-color);
    }
    .account-change-img .modal-body .tab-content{
        border: 1px solid #eee;
        border-top: transparent;
        border-radius: 0;
        padding-top: 3rem;
        padding-bottom: 1rem;
    }
    .account-change-img .modal-body .change-avatar-screen{
        font-size:var(--fs-300);
        color:var(--main-color);
        font-weight: 600;
    }
    .account-change-img .modal-body .bp-feedback.info .bp-icon {
        background-color: var(--bs-yellow)!important;
    }
    .account-change-img .bp-feedback .bp-help-text{
        font-size:var(--fs-300);
        color:var(--main-color);
    }
    .account-change-img form .bp-help-text{
        font-size:var(--fs-200);
        color:var(--gray);
    }
    .account-change-img .modal-body .bp-feedback{
        border: 1px dashed var(--bs-yellow);
        box-shadow:none;
    }
    .account-change-img .modal-body input[type=file]{
        height:fit-content!important;
        margin-bottom: 1rem;
    }
    .account-change-img #svga-start-boys:hover, #svga-start-girls:hover{
        border:1px solid #eee;
    }
    .account-change-img .bp-profile-wrapper{
        border:none!important;
    }
    /* profile status */
    .top-right-scn.row:first-child{
        padding:0!important;
    }
    /* top section style *****************************************/
    /* end top section **************************************/
    .upload-file-label{
        position: relative;
        cursor: pointer;
        width: 100%;
        text-transform: none!important;
        height: var(--input-height)!important;
    }
    .upload-file-label input{
        position: absolute;
        top:0;
        left:0;
        height: var(--input-height);
        display: block;
        z-index: 999;
        width: 100%;
        cursor: pointer;
        height: var(--input-height)!important;
        padding: 10px!important;
    }
    .upload-file-label label{
        position: absolute;
    }
    .upload-file-label .add-file{
        position: absolute;
        top: 0px;
        left: 0;
        cursor: pointer;
        width: 100%;
        white-space: nowrap;
        display: flex;
        justify-content: start;
        align-items: center;}
    .upload-file-label .add-file span{
        color: var(--main-color)!important;
        font-size:var(--fs-500);
        cursor: pointer;
        width: 30px;
        height: 30px;
        border-radius:50%;
        background:#eee;
        margin-right:5px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top:5px;
    }
    .upload-file-label  input[type=file]{
        width: fit-content;
        border: none;
        padding: 0;
        background: transparent;
        box-shadow: none;
        display: inline-block;
        padding-left: 4vw;
        box-sizing: border-box;}
    .upload-file-label p{
        font-size:var(--fs-200);
        margin-top: calc(var(--input-height) + 2px);
    }
    .upload-file-label input[type=file]::file-selector-button {
        opacity: 0;
        width: 100px;
    }
    .sub-navs{
        background: #fff!important;
        margin-bottom: 15px!important;
        padding: 20px;
        border-radius: 20px;
    }
    .notifications_nav{
        display: flex;
        justify-content: end;
        align-items: center;
    }
    .notifications_nav h4{
        display: flex;
        justify-content: start;
        align-items: center;
    }
    .notifications_nav div{
        background: #f1f3f3;
        border-radius: 31px;
    }
    .notifications_nav a{
        margin:5px 10px;
        color:var(--main-color);
        font-size:var(--fs-300);
        opacity: .8;
        transition:200ms linear;
        height: 30px;
        width: 30px;
        border-radius:50%;
        padding: 10px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
    }
    .notifications_nav a:hover{
        opacity: 1;
        background:#fff;
    }
    .g_noti_head .material-icons,.controls .material-icons, td .material-icons,.add_payment_method .material-icons{
        background: var(--blue);
        width: 26px;
        height: 26px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        padding: 10px;
        margin-right: 3px;
        margin-bottom: 10px;
        color:#fff;
        opacity: .8;
        transition:200ms linear;
        cursor: default;
    }
    .g_noti_head .material-icons:hover,.controls .material-icons:hover,td .material-icons:hover,.add_payment_method .material-icons:hover{
        opacity: 1;
    }
    .member-Email{
        max-width:160px;
        display: block;
    }
    .aside-info-title{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .aside-info-title h2{
        margin-bottom: 0;
    }
    .aside-info-title h2 span{
        font-size: var(--fs-300);
        color: var(--main-color);
        font-weight: 500;
    }
    .aside-info-title .aside-icons{
        font-size: 10px;
        margin-right: 3px;
        width: 20px;
        height: 20px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        color: #fff;
    }
    .plan-aside-info{
        position: relative;
    }
    .plan-aside-info .aside-info-title .aside-icons{
        background: #fbba3b;
    }
    .plan-aside-details h3{
        margin-bottom:10px;
        line-height: normal;
    }
    .plan-aside-details h3 span,.plan-aside-details h3 small{
        font-size: var(--fs-200);
        color: var(--main-color);
    }
    .plan-aside-details h3 .aside-icons{
        font-size: 10px;
        margin-right: 3px;
        background: #9277b6;
        width: 20px;
        height: 20px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        color: #fff;
    }
    .aside-link{
        width: 100%;
        display: flex;
        justify-content: end;
    }
    #member_link{
        width: auto;
        height: 20px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        background: #eee;
        border-radius: 10px;
        opacity: .8;
        transition:200ms linear;
        transform: translateX(3px);
    }
    #member_link:hover{
        opacity: 1;
        background:#9277b6;
        color:#fff!important;
        transform: translateX(3px);
    }
    #member_link:hover span{
        color:#fff!important;
    }
    #member_link span{
        font-size: var(--fs-200);
        color: var(--main-color);
    }
    /* maember tab ===Learners tab**************** */
    .account-learners-table{}
    .account-learners-table button{
        background-color: transparent!important;
        border:none!important;
        width: 30px;
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .account-learners-table-name{
        vertical-align: middle!important;
    }
    .account-learners-table-pass{
        display: flex;
        align-items: center;}
    .account-learners-details{
        position: absolute;
        left:200%;
        border: 1px solid #eee;
        border-radius: 0 ;
        padding: 15px 15px 0 15px;
        background: rgb(241 243 243 / 40%);
    }
    .toggle_details{
        position: relative;
        left:0;
    }
    .rotate-btn span{
        transform: rotate(180deg);
    }
    .learner-container{
        display: block;
        border-left: 4px solid var(--blue);
        padding: 10px 0 0 0;
        flex-wrap: wrap;
        width: 100%;
        margin-bottom: 15px;
        box-shadow: 0 0 10px rgb(0 0 0 / 10%)
    }
    .learner-basic-data div:first-child{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .learner-basic-data div:first-child span,.learner-subjects-data h6{
        font-size: var(--fs-300);
        font-weight: 600;
        color: var(--main-color);
    }
    .learner-basic-data div .material-icons,.account-learners-details h6 .material-icons{
        width: 20px;
        height: 20px;
        background: var(--blue);
        color: #fff;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
    }
    .learner-basic-data div button{
        width: 20px;
        height: 20px;
        background: transparent;
        color: var(--main-color);
        display: inline-flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        padding: 0;
    }
    .learner-basic-data div .learner-edit-btn .material-icons{
        background: transparent;
        color: var(--main-color);
    }
    .learner-container:last-child{
        border-bottom: none!important;
    }
    .leaner-basic-info{
        display: flex;
        justify-content: space-between;
        align-items: end;
        position: relative;
    }
    .learners-data{
        display: flex;
        justify-content: start;
        flex-direction: column;
        align-items: start;
    }
    .learner-name{
        display: flex;
        align-items: start;
        flex-direction:column;
        width: 25%;
        padding-left: 10px;
    }
    .learner-name h4{
        font-size: 12px!important;
        margin: 0 5px;
        margin-bottom: 0;
        white-space: nowrap;
    }
    .learner-name .learner-relationship{
        font-size: 10px!important;
        margin-bottom: 0;
        padding: 0;
        height: 15px;
        border-radius: 19px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        color: #5a8dee !important;
    }
    .learner-awards{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .learner-awards div{
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-direction:row;
        margin: 5px;
        opacity: .8;
    }
    .learner-awards div span:nth-child(2){
      font-size: .5rem!important;
      line-height: 15px;
      border-radius: 50%;
      padding: 0;
      background-color: #e5edfc !important;
      color: #5a8dee !important;
      width: 20px;
      height: 20px;
      display: inline-flex;
      justify-content: center;
      align-items: center;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .learner-awards div span:first-child{
        font-size: var(--fs-300)!important;
        font-weight: 500;
        line-height: 15px;
    }
    .learner-summery{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50%;
    }
    .learner-summery div{
        display: flex;
        align-items: center;
        flex-direction:column;
        margin:0 5px;
    }
    .learner-summery div span{
        font-size: var(--fs-200)!important;
    }
    .learner-summery div .learner-num{
        font-size: var(--fs-300)!important;
        font-weight: 600;
        width: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 20px;
        border-radius: 50%;
    }
    .learner-summery div .learner-num.learner-num-recorded{
        /* background-color: #dff9ec !important; */
        color: #5a8dee !important;
    }
    .learner-summery div .learner-num.learner-num-late{
        /* background-color: #ffe5e5 !important; */
        color: var(--yellow) !important;
    }
    .learner-summery div .learner-num.learner-num-cancellation{
        /* background-color: #fff2e1 !important; */
        color: var(--orange) !important;
    }
    .learner-summery div .learner-num.learner-num-no_show{
        color:  #ff5b5c!important;
    }
    .learner-summery div .learner-num.learner-num-recorded:hover{
        background-color: #dff9ec !important;
    }
    .learner-summery div .learner-num.learner-num-late:hover{
        background-color: #ffe5e5 !important;
    }
    .learner-summery div .learner-num.learner-num-cancellation:hover{
        background-color: #fff2e1 !important;
    }
    .learner-summery div .learner-num.learner-num-no_show:hover{
        background-color: #ffe5e5 !important;
    }
    .learner-status-info span{
        background-color: #dff9ec !important;
        color: #39da8a !important;
        padding: 3px 10px;
        font-size: 10px!important;
        border-radius: 10px;
    }
    .learner-contact-info{
        display: flex;
        align-items: center;
    }
    .learner-contact-info span{
        font-size: 10px!important;
    }
    .learner-contact-info button{
        background: transparent!important;
        border-radius:0!important;
        padding: 5px!important;
        color:var(--main-color)!important;
    }
    .learner-dtails-btn-container{
        position: absolute;
        top: -10px;
        right: 15px;
        background: var(--blue);
        width: 86px;
        height: 23px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .learner-dtails-btn-container button{
        background: transparent;
        position: absolute;
        color: #fff;
        font-size: .7rem!important;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 5px;
        box-sizing:border-box;
        border:none!important
    }
    .learner-dtails-btn-container button:hover{
        background-color: transparent!important;
    }
    .learner-dtails-btn-container button span{
        color: #fff;
        font-size: .7rem!important;
    }
    .learners-tab-title h2{
        font-size: var(--fs-400);
        display: flex;
        justify-content: start;
        align-items: center;
        color: var(--main-color);
        font-weight: 500;
    }
    .learners-tab-title span{
        margin-right:5px
    }
    .account-learners-details span{
        margin-right:5px
    }
    .account-learners-details h6{
        display: flex;
        justify-content: start;
        align-items: center;
        margin-left: 0;
        margin-bottom: 5px;
    }
    .account-learners-details span{
        margin-right:5px
    }
    .learner-password-container{
        display: flex;
        justify-content: end;
        align-items: center;
        flex-wrap: nowrap;
        padding-right: 10px;
        width: 30%;
    }
    td.learner-password-container{
        width: auto!important;
    }
    .learner-password{
        border:none!important;
        font-size: var(--fs-200)!important;
    }
    table,button{
        border:none!important;
    }
    .pass-btn{
        background: transparent;
        padding: 0;
        width: 25px;
        height: 25px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        border-radius:50%;
        border: none!important;
    }
    .pass-btn:hover{
        background-color: transparent!important;
        border: apx solid var(--blue)!important;
        color: var(--blue)!important;
    }
    .pass-btn .material-icons{
        background-color: transparent!important;
        color:var(--main-color)!important;
        margin: 0!important;
    }
    /* learner details table *************************/
    .learner-subjects-data table thead td,.learner-basic-data table thead td{
        font-size: var(--fs-200)!important;
        font-weight: 600!important;
        color: var(--main-color)!important;
        text-align: center;
        padding: 5px;
    }
    .learner-subjects-data table tbody td,.learner-basic-data table tbody td{
        font-size: var(--fs-200)!important;
        font-weight: 300!important;
        color: var(--main-color)!important;
        text-align: center;
        padding: 5px;
    }
    .learner-table-status span{
        color: #39da8a;
        border-color: transparent;
        background: #dff9ec;
        border-radius: 10px;
        padding: 5px 8px;
        font-size: 10px!important;
    }
    .add-new-learner button{
        background-color:var(--blue);
        color:#fff;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 5px 20px;
        height: 25px;
        border-radius: 0;
        transition: 200ms linear;
    }
    .add-new-learner button:hover{
        background-color:var(--blue);
    }
    .learner-table-pass{
        display: none;
    }
    .buddypanel .site-content{
        padding: 0 10px!important;
    }
    /* billing tab *********************************/
    .billing-subscriptions h2,.billing-overview h2{
        margin-bottom: 5px;
    }
    .billing-subscriptions h2 .material-icons,.billing-overview h2 .material-icons{
        font-size: var(--fs-300);
        margin-right: 3px;
        background:var(--blue);
        width: 20px;
        height: 20px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        color: #fff;
    }
    .billing-subscriptions h2 span:nth-child(2) ,.billing-overview h2 span:nth-child(2){
        font-size: var(--fs-300);
        font-weight: 600;
        color: var(--main-color);
    }
    .billing-subscriptions  tr td,.invoices-card table tbody tr td{
        font-size: var(--fs-200)!important;
        color: var(--main-color)!important;
        text-align: center;
        padding: 5px;
    }
    .billing-subscriptions  tr:first-child td ,.invoices-card table thead tr td{
        font-size: var(--fs-200)!important;
        font-weight: 600!important;
        color: var(--main-color)!important;
        text-align: center;
        padding: 5px;
    }
    .invoices-card br{
        display: none;
    }
    /* billing_tab_subscriptions */
    .billing_tab_subscriptions{

    }
    /* billing_tab_invoices */
    .billing_tab_invoices{

    }
    /*billing_tab_paymentmethod*/
    .billing_tab_paymentmethod form div{
        display: flex;
        justify-content: start;
        align-items: center;
        margin-bottom: 15px;
    }
    .billing_tab_paymentmethod form div label{
        width: 30%!important;
        white-space: nowrap;
        display: flex;
        justify-content: start;
        align-items: center;
        margin-bottom: 0!important;
    }
    .billing_tab_paymentmethod label span.material-icons{
        margin-bottom: 0!important;
    }
    .billing_tab_paymentmethod div input[type="button"]{
        border-radius: 0!important;
        background: var(--blue)!important;
        transition: 200ms linear;
        width: fit-content!important;
    }
    .billing_tab_paymentmethod div input[type="button"]:hover{
        transform: translateX(3px);
    }
    .billing_overview_table .billing_overview_table_header td,.billing_invoices_table_header td{
        font-weight: 600!important;
        border: 0!important;
    }
    .billing_invoices_table_message{
        padding: 10px;
        border-left: 5px solid #39da8a;
        font-size: var(--fs-400);
        background-color: #dff9ec !important;
        color: #39da8a !important;
    }
    /* activity log tab style ****************************/
    .nontfications-log-tab-title{
        border-bottom: 1px solid #eee;
        padding: 15px 0;
        margin-bottom: 5px!important;
        font-size: var(--fs-400);
        display: flex;
        justify-content: start;
        align-items: center;
        color: var(--main-color);
        font-weight: 500;
    }
    .nontfications-log-tab-title .material-icons{
        margin-right: 5px;
    }
    .activity-log-container ul{
        position: relative;
        margin: 0!important;
    }
    .activity-log-container ul::before{
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1;
        height: 100%;
        width: 1px;
        border: 0;
        border-left: 1px dashed #d4d8dd;
        content: "";
    }
    .activity-log-container ul li{
        display: flex;
        justify-content: start;
        align-items: start;
        width: 100%;
        position: relative;
        z-index: 2;
    }
    .activity-log-container ul li .notification-log-category-icon{
        display: inline-flex;
        justify-content: center;
        align-items: center;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: #f1f1f6 ;
        margin-left: -10px;
        padding: 6px;
        color: #39da8a;
        margin-top: 12px;
        border: 1px solid;
    }
    .activity-log-container ul li .activity-log-notfication-content{
        display: flex;
        justify-content: space-between;
        align-items: start;
        width: 90%;
        padding: 15px;
        position: relative;
        border-radius: 15px;
        margin-left: 25px!important;
        margin-bottom: 15px;
    }
    .activity-log-container ul li .activity-log-notfication-content::before{
        position: absolute;
        content: "";
        height: 0;
        width: 0;
        border: 10px solid transparent;
        left: -20px;
        top: 12px;
    }
    .activity-log-container ul li .activity-log-notfication-content .activity-log-notfication-details h5{
        margin-bottom: 5px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .activity-log-container ul li .activity-log-notfication-content .activity-log-notfication-details{
        width: 100%;
    }
    .activity-log-container ul li .activity-log-notfication-content .activity-log-notfication-details p {
        display: block;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 5px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        line-clamp: 2;
        -webkit-box-orient: vertical;
        line-height: 20px;
        font-size: .7rem!important;
    }
    .activity-log-container ul li .activity-log-notfication-content .activity-log-notfication-details p span{
        font-size: .7rem!important;
    }
    .activity-log-container ul li .activity-log-notfication-content .activity-log-notfication-details {
    }
    .activity-log-notfication-time span{
        font-size: var(--fs-100)!important;
    }
    p.notfications-log-additional-data{
        display: flex!important;
        justify-content: space-between;
        align-items: center;
    }
    /* icon by notifiction category */
    .activity-log-container ul .notfications-log-general-actegory.General .notification-log-category-icon{
        border-color: #495563 !important;
        color: #495563 !important;
    }
    .activity-log-container ul .notfications-log-general-actegory.Billing .notification-log-category-icon{
        border-color:rgba(250,192,51,1) !important;
        color: rgba(250,192,51,1) !important;
    }
    .activity-log-container ul .notfications-log-general-actegory.Learning .notification-log-category-icon{
        border-color: #00cfdd !important;
        color: #00cfdd !important;
    }
    .activity-log-container ul .notfications-log-general-actegory.ClassManagment .notification-log-category-icon{
        border-color: #5a8dee !important;
        color: #5a8dee !important;
    }
    .activity-log-container ul .notfications-log-general-actegory.Support .notification-log-category-icon{
        border-color: rgb(146 119 182 / 100%) !important;
        color: rgb(146 119 182 / 100%) !important;
    }
    /* color of notifiction by category */
    .activity-log-container ul .notfications-log-general-actegory.General .activity-log-notfication-content{
        background-color: rgba(73,85,99,.1);
    }
    .activity-log-container ul .notfications-log-general-actegory.Billing .activity-log-notfication-content{
        background-color: rgb(252 185 24 / 22%)
    }
    .activity-log-container ul .notfications-log-general-actegory.Learning .activity-log-notfication-content{
        background-color: rgba(0,207,221,.1);
    }
    .activity-log-container ul .notfications-log-general-actegory.ClassManagment .activity-log-notfication-content{
        background-color: rgba(90,141,238,.1);
    }
    .activity-log-container ul .notfications-log-general-actegory.Support .activity-log-notfication-content{
        background-color: rgb(146 119 182 / 25%);
    }
    /* arrow color */
    .activity-log-container ul .notfications-log-general-actegory.General .activity-log-notfication-content::before{
        border-right-color: rgba(73,85,99,.1);
    }
    .activity-log-container ul .notfications-log-general-actegory.Billing .activity-log-notfication-content::before{
        border-right-color: rgb(252 185 24 / 22%)
    }
    .activity-log-container ul .notfications-log-general-actegory.Learning .activity-log-notfication-content::before{
        border-right-color: rgba(0,207,221,.1);
    }
    .activity-log-container ul .notfications-log-general-actegory.ClassManagment .activity-log-notfication-content::before{
        border-right-color: rgba(90,141,238,.1);
    }
    .activity-log-container ul .notfications-log-general-actegory.Support .activity-log-notfication-content::before{
        border-right-color: rgb(146 119 182 / 25%);
    }
    /* notification filter  */
    .notfications-log-filter{
        display: flex;
        justify-content: start;
        align-items: start;
        width: 100%;
        flex-direction: column;
        margin: 0 0 20px 0;
    }
    .notfications-log-filter h6{
        font-size: var(--fs-200);
        color: var(--main-color);
        margin-bottom: -10px!important;
    }
    .notfications-log-filter ul{
        list-style: none;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0!important;
    }
    .notfications-log-filter ul li{
        height: 20px;
    }
    .notfications-log-filter ul li label{
        position: relative;
        margin: 10px 1px;
        height: 5px;
        width: 50px;
        background-color: #9277B6;
        transition: 200ms linear;
    }
    .notfications-log-filter ul li label:hover{
        height: 10px;
    }
    .notfications-log-filter ul li label[for="All"]{background-color: var(--main-color)!important;}
    .notfications-log-filter ul li label[for="General"]{background-color: #495563!important;}
    .notfications-log-filter ul li label[for="Billing"]{background-color: #fdac41!important;}
    .notfications-log-filter ul li label[for="Learning"]{background-color: #00cfdd!important;}
    .notfications-log-filter ul li label[for="ClassManagment"]{background-color: #5a8dee!important;}
    .notfications-log-filter ul li label input{
        opacity: 0;
        position: absolute;
        width: 100%;
        height: 100%!important;
        top: 0;
        left: 0;
        z-index: 999;
        display: block;}
    .notfications-log-filter ul li label input:checked ~ span{}
    .notfications-log-filter ul li label span{opacity: 0;}
    .activity-log-container ul .notfications-log-general-actegory.Billing .activity-log-notfication-content .material-icons{
        width: 60px;
        height: 60px;
        background: #fcb918;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 12px;
        margin-right: 10px;
        color: #fff;
        font-size: 30px;
    }
    .activity-log-container ul .notfications-log-general-actegory.Billing .notfications-log-additional-data{
        margin-left: -60px;
        padding-top: 10px;
        border-top: 1px solid #fff;
    }
    /* form tab************************************************************** */
    .request-sponsership-tab-title,.sposer-student-tab-title,.send-agift-tab-title{
        font-size: var(--fs-400);
        display: flex;
        justify-content: start;
        align-items: center;
        color: var(--main-color);
        font-weight: 500;
        width: 100%;
        border-bottom: 1px solid #eee;
        padding-bottom: 10px;
    }
    .request-sponsership-tab-title span,.sposer-student-tab-title span,.send-agift-tab-title span{
        margin-right: 5px;
    }
    .gform_wrapper.gravity-theme .gfield-choice-input+label{
        margin-bottom: 10px!important;
    }
    .gform_wrapper.gravity-theme .gfield input[type="checkbox"]{
        appearance: auto!important;
    }
    .gform_wrapper.gravity-theme .ginput_product_price_label,.gform_wrapper.gravity-theme .ginput_product_price{
        font-size: .7rem!important;
        font-weight: bold;
    }
    .gfield_checkbox input[type=checkbox]+label:before{
        width: 15px!important;
        height: 15px!important;
    }
    .gfield_checkbox input[type=checkbox]:checked+label:after{
        content: '\e876'!important;
        font-family: 'Material Icons'!important;
        left: 0px!important;
        top: 0px!important;
    }
    #field_22_6 .gchoice{
        margin-left: 15px;
    }
    .gfield_checkbox input[type=checkbox]:checked + label:before {
        background-color: var(--blue)!important;
    }
    .gform_wrapper form .gform_fileupload_multifile .gform_drop_area{
        border: 1px dashed #f2f2f2!important;
        border-left: 4px solid var(--blue)!important;
        box-shadow: 0 0 10px rgb(0 0 0 / 10%);
    }
    .add_learner_table td label{
        display: flex;
        justify-content: start;
        align-items: center;

    }
    .add_learner_table td label span{
        margin-bottom: 0!important;
    }
    .request_sponsership_tab fieldset,.request_sponsership_tab .gfield{
        padding: 0!important;
        margin-top: 20px!important;
        margin-bottom: 20px!important;
    }
    .request_sponsership_tab .gform_wrapper form .gform_fileupload_multifile .gform_drop_area{
        padding: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .request_sponsership_tab .gform_wrapper form .gform_fileupload_multifile .gform_drop_area span{
        margin-right: 5px;
        color: var(--main-color);
        font-size: var(--fs-300);
        opacity: .9;
        transition: 200ms linear;
    }
    .request_sponsership_tab .gform_wrapper form .gform_fileupload_multifile .gform_drop_area button,.request_sponsership_tab .gform_footer button{
        background-color: var(--blue);
        border-radius: 0!important;
        opacity: .9;
        transition: 200ms linear;
    }
    .gform_footer button:hover{
        transform: translateX(3px);
    }
    .request_sponsership_tab .gform_wrapper form .gform_fileupload_multifile .gform_drop_area button:hover{
        transform: translateY(-3px);
    }
    .request_sponsership_tab .gform_wrapper form .gform_fileupload_multifile .gform_drop_area span:hover{
        opacity: 1!important;
    }
    .sponsor_astudent_tab .gfield_price_25_9{
        display: flex;
        justify-content: start;
        align-items: center;
    }
    .sponsor_astudent_tab .gfield_price_25_9 label{
        margin-right: 15px;
        margin-bottom: 0;
    }
    .sponsor_astudent_tab .gform_wrapper.gravity-theme .gfield input[type="checkbox"]{
        width: 15px!important;
        margin-right: 5px;
    }
    .gfield_required.gfield_required_text{
        color:var(--fc-danger)
    }
    .change_pass_btn{
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 0!important;
        transition: 200ms linear;
    }
    .change_pass_btn:hover{
        transform: translateX(3px);
    }
    .cancel_pass{
        border: 1px solid var(--gray)!important;
        opacity: .8;
    }
    h6.not_heading{
        white-space: nowrap;
    }
    .get_template.billing_link.active .billing-notfication-num {
        right: 15px!important;
        top: 23px!important;
    }

    /* media query */
    /* media query */
    @media (max-width:1220px){
        .top-right-scn.row:first-child{
            margin-top: 15px!important;
        }
        .account-summery{
            padding: 0!important;
        }

        .account-left-section{
            position: relative!important;
            width: 100%!important;
            margin-top: -25px!important;
            height: 50vh!important;
            margin-bottom: 50px;
            min-height:fit-content!important;
            left: 0!important;
        }
        .img_cont{
            margin-top: -40px!important;
        }
        .img_cont img{
            box-shadow: 0 0 10px rgb(0 0 0 / 16%);
        }
        .soc_ul{
            justify-content: center;
            align-items: center;
            display: flex;}
        .soc_ul li.text-muted{
            margin-left: 15px!important;
            margin-right: 15px!important;
        }
        .account-left-section ~ .account-right-section{
            margin-left: 0!important;
            margin-top: 30px;
        }
        .plan-aside-info{
        }
        .plan-aside-details{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap:wrap
        }
        .plan-aside-details h3{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 10px!important;
        }
        .aside-link{
            width: 100%!important;
            justify-content: center;
            align-items: center;
        }
        .learner-dtails-btn-container {
            top:0;
            right: 10px;
            position: relative!important;
        }
        .leaner-basic-info{align-items: center!important;}
        .learner-name{
            display: flex;
            align-items: start;
            flex-direction: column;
            width: 30%;
            padding-left: 10px;
        }
        .pass-big-scrns{
            display: none!important;
        }
        .learner-table-pass{
            display: block;
        }
        .learner-table-DateOfBirth{
            display: none;
        }
        .learner-table-gender{
            display: none;
        }
        .learner-summery{
            width: calc(70% - 100px);
            justify-content: start;
            flex-wrap: wrap;
        }
        .plan-aside-details h3 .aside-icons{display: none!important;}
        .plan-aside-details h3:nth-child(3){
            width: 100%;
            justify-content: start!important;
        }
        /* .activity-log-container ul li .activity-log-notfication-content .activity-log-notfication-details p{
        max-width: 300px;
        } */
    }
    @media (max-width:992px){
        :root {
            --fs-xl: 1.2rem;
            --fs-600: 1rem;
            --fs-500: .9rem;
            --fs-400: .8rem;
            --fs-300: 0.7rem;
            --fs-200: .5rem;
            --fs-100: .6vh;
            --fs-50: .5vh;
            --input-height: 2rem;
            --sqaure:2.5rem;
            --box-shadow: 0 0 30px 0 rgba(0,0,0,.16);
        }
        .account-summery h2,.billing-aside-info h2{
            text-align: left;
        }
        .account-right-section{
            margin-left:0!important;
            width: 100%!important;
            padding: 0!important;
        }
        .account-left-section{
            position: relative!important;
            height: auto!important;
            width: 100%!important;
        }
        .nav-pills{
            margin: 0!important;
            margin-top: 15px!important;
            padding: 0!important;
            padding-left: 15px!important;
        }
        .nav-pills.flex-column{
            flex-direction:row!important
        }
        .member-pass{
            display: none;
        }
        .main-nav .nav-item a .nav-icon{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .main-nav .nav-item a .nav-text{
            display: none!important;
        }
        .main-nav.nav-pills{
            justify-content: space-around!important;
        }
        .nav-pills li a{
            padding: .5rem!important;
        }
        .nav-pills.main-nav{
            margin-bottom: -30px!important;
        }
        .main-nav .nav-item a{
            width:5rem!important;
            height:5rem!important;
        }
        .top-right-scn{height: auto;}
        .top-right-scn.row:first-child{
            padding:15px!important;
        }
        .account-summery, .billing-aside-info, .makeup-balance{
            height: auto;
            display: flex!important;
            flex-direction: column!important;
            justify-content: center important;
            align-items: start!important;
            min-height: auto;
        }
        .billing-aside-info{
            min-width: 250px!important;
        }
        .learner-table-pass{
            display: block;
        }
        .learner-table-DateOfBirth{
            display: none;
        }
        .learner-table-gender{
            display: none;
        }
        .pass-big-scrns{
            display: none!important;
        }
        .learner-table-email{
            display: none;
        }
        .plan-aside-details{
            display: flex;
            justify-content: start;
            align-items: start;
            flex-direction:column!important
        }
        .plan-aside-details .plan-aside-details h3{
            display: flex;
            justify-content: start;
            align-items: center;
            width: 100%!important;
            margin: 10px!important;
        }
        .aside-link{
            width: 100%!important;
        }
        .learner-summery div{
            width: 80px;
        }
        .activity-log-container ul li .activity-log-notfication-content{
            padding: 10px;
        }
        .billing-notfication-num{
            right: 15px!important;
            top: 15px!important;
        }
    }
    /* mobile************* */
    @media (max-width:450px){
        .activity-log-container ul .notfications-log-general-actegory.Billing .activity-log-notfication-content .material-icons{
            display: none!important;
        }
        .billing-notfication-num {
            right: 10px!important;
            top: 10px!important;
        }
        .get_template.billing_link.active .billing-notfication-num {
            right: -5px!important;
            top: 3px!important;
        }
        .soc_ul li.text-muted{
            display: none!important;
        }
        .account-change-img .modal-body input[type=submit]{
            float: right;
        }
        .member-last{
            display: none;
        }
        .main-nav .nav-item a{
            width:3rem!important;
            height:3rem!important;
        }
        .nav-pills.main-nav {
            margin-bottom: -35px!important;
            margin-left: 0!important;
        }
        .member-Email{
            max-width:100px;
        }
        .account-summery, .billing-aside-info, .makeup-balance{
            height: auto;
            display: flex!important;
            flex-direction: column!important;
            justify-content: center important;
            align-items: start!important;
            min-height: auto;
        }
        .learner-subject-Assignedhours,.learner-subject-teacher,.learner-summery,.learner-table-fullName{display: none;}
        .learner-name{
            width: 100%!important;
            align-items: start;
        }
        .activity-log-container ul li .activity-log-notfication-content{
            flex-direction: column-reverse;
            overflow: hidden;
            width: 100%;
            margin-left: 0!important;
            padding: 5px;
        }
        .activity-log-container ul li .activity-log-notfication-content::before,.notification-log-category-icon,.activity-log-container ul::before{display: none!important;}
        /* .activity-log-container ul li .activity-log-notfication-content .activity-log-notfication-details p{
        min-width: 150px;} */
        .col-md-6.col-sm-12,.col-md-3.col-sm-12,.col-md-4.col-sm-12{
            width: 100% !important;
            max-width: 100%;
        }
        input[name=secondary_email],input[name=LastName]{
            margin-top: 10px;
        }
        .billing_tab_paymentmethod form div{
            flex-direction: column;
            align-items: start;
        }
        .billing_tab_paymentmethod form div label{
            width: 100%!important;
        }
    }
    /* end media query */
    /* #svga-group-hair-front path[data-stroketype=hijab]{transform: translate(-25px,-26px);} */
    #svga-group-hair-front path[data-stroketype=st0]{fill:#9277B6;}
    #svga-group-hair-front path[data-stroketype=st1]{fill:#816AA1;}
    #svga-group-hair-front path[data-stroketype=st2]{fill:#8B72AD;}
    /* .st0{fill:#9277B6;}
    .st1{fill:#816AA1;}
    .st2{fill:#8B72AD;} */
    /* preloader */
    div#loader{
        height: 40px!important;
        width: 40px!important;
        top:1rem!important;
    }
    /* .preloader {
    position: fixed;
    overflow: hidden;
    width: 100%;
    height: 100vh;
    background: #fff;
    z-index: 999999999;
    display: flex;
    justify-content: center;
    align-items: center;
    top: 0;
    left: 0;
    background-repeat: no-repeat;
    background-image: url("<?php echo get_stylesheet_directory_uri(); ?>/images/gearloading.gif");
   background-position: center;
   background-size: 5rem;
   } */
    .billing_rmv_br br{display: none!important;}
</style>
<?php  /* template name: acc */ ?>
<?php get_header();
$user_id = get_current_user_id();
$user = wp_get_current_user();
$staff =  array('administrator','teamleader');
if(in_array('parent',$user->roles)){
    $rol='parent';
  //  $tab_w = "25%";
}elseif (in_array('student',$user->roles)) {
    $rol='student';
    //$tab_w = "50%";
}elseif ((in_array('teacher',$user->roles))) {
    $rol='teacher';
  //  $tab_w = "20%";
}else {
    $rol='staff';
  //  $tab_w = "20%";
}
?>
<!-- <div class="header-navbar-shadow"></div> -->
<!-- BEGIN: Content-->
<?php //var_dump(get_all_notification_checked('announcements','email')) ; ?>
<!-- <a href="javascript:void(0)" class="asdasdasd">asdasdasd</a> -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<?php


    if( checkIfParent($user_id) == true ):
        global $wpdb;
        $parent_stats_table = $wpdb->prefix . 'muslimeto_parent_stats';
        // get all teachers
        $parent_stats_results = $wpdb->get_results(
            "SELECT paid_hours,total_hours FROM $parent_stats_table where parent_wp_user_id = {$user_id}"
        );
        $wpdb->flush();
        if( !empty($parent_stats_results) ):
            $assigned_hrs = json_decode($parent_stats_results[0]->total_hours)->total_current_hrs;
            $starting_hrs = json_decode($parent_stats_results[0]->total_hours)->total_starting_hrs;
            $paid_hrs = $parent_stats_results[0]->paid_hours;
        endif;
    endif;

?>

<div class="app-content content" style="margin:0;padding:10px;min-width:100%;">
    <!-- <div class="content-overlay"></div> -->
    <div class="content-wrapper account_wrapper" style="margin:0">
        <!-- <div class="preloader"></div> -->
        <div class="content-body">
            <div class="pro_info card">
                <!-- profile container -->
                <div class="row ">
                    <!-- left section contain img  -->
                    <div class="account-left-section ">
                        <div class=" img_cont">
                            <div class="img-change-container">
                                <?php echo get_avatar( $user->ID, 100 ); ?>
                                <div class="middle_im" data-toggle="modal" data-target="#model_img">
                                    <div class="text">
                                        <i class="fas fa-camera text-secondary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" ">
                            <!-- name and budge -->
                            <div class="account-title-container">
                                <h6 style="margin-bottom: 0;display:inline-block"><?php echo $user->first_name. ' ' . $user->last_name?></h6>
                                <small class="" style="opacity:.8"><?php echo $rol ?></small>
                                <div class="u_time_zone ">
                                    <?php
                                    $u_date = get_user_meta($user_id, 'time_zone', true);
                                    $u_time_zone = !empty($u_date) ? $u_date : 'UTC';
                                    $tz=timezone_open($u_time_zone);
                                    $dateTimeOslo=date_create("now",timezone_open($u_time_zone));
                                    $gmt = timezone_offset_get($tz,$dateTimeOslo)/60/60;
                                    $gmt_strt = strtotime($gmt);
                                    echo datum(true,$gmt)  . ' ' . '('.$u_time_zone. ')' ;
                                    ?>
                                </div>
                            </div>
                            <!-- <hr style="margin:0"> -->
                            <ul class="soc_ul mt-0">
                                <li class="text-muted">
                                    <!-- <i class="fa fa-envelope text-danger"></i> -->
                                    <span class="material-icons">email</span>
                                    <?php
                                    echo !empty($user->data->user_email) ? $user->data->user_email : 'NA';
                                    ?>
                                </li>
                                <li class="text-muted">
                                    <!-- <i class="fa fa-phone text-success"></i> -->
                                    <span class="material-icons">call</span>
                                    <?php
                                    $phone = get_user_meta($user_id, 'primary_phone', true);
                                    echo !empty($phone) ? $phone : 'NA';
                                    ?>
                                </li>
                                <!-- <li class="text-muted"> </li> -->
                            </ul>
                        </div>

                        <?php if( checkIfParent($user_id) == true ): ?>
                        <div class=" plan-aside-info">
                            <div class="aside-info-title">
                                <h2>
                                    <span>Assigned Learning </span>
                                </h2>
                            </div>
                            <div class="plan-aside-details">
                                <h3>
                                    <span class="material-icons aside-icons">work_history</span>
                                    <span>Assigned Hours:</span>
                                    <small><?= $assigned_hrs?> Hrs</small>
                                </h3>
                                <h3>
                                    <span class="material-icons aside-icons">school</span>
                                    <span>Paid Hours:</span>
                                    <small><?= $paid_hrs ?> Hrs</small>
                                </h3>

                                <?php if( $starting_hrs != $assigned_hrs ): ?>
                                <h3>
                                    <span class="material-icons aside-icons">next_week</span>
                                    <span>Upcoming Changes Scheduled </span>
                                    <!-- <span>No Upcoming Changed Scheduled</span> -->
                                </h3>
                                <?php endif; ?>

                                <div class="aside-link">
                                    <a id="member_link" class="nav-link get_template " href="#" data-template-name="members" data-template-folder="/user-profile/" data-tab-name="template-data" >
                                        <span>Details</span>
                                        <span class="material-icons">keyboard_arrow_right</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                    </div>
                    <!-- right section contain tabs -------------------------------------------------->
                    <div class="col-md account-right-section">
                      <?php if(in_array('parent',$user->roles)): ?>
                        <div class="row top-right-scn " style="">
                            <?php get_template_part('template-parts/user-profile/template-user-stats'); ?>
                        </div>
                      <?php endif ?>
                        <?php get_template_part('template-parts/template-user-profile'); ?>
                    </div>
                </div>
                <!--modal to change avatar  -->
                <!-- profile modal -->
                <div class="modal fade account-change-img" id="model_img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content ava_model">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    <span class="material-icons">add_a_photo</span>
                                    Change Avatar
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" >
                                <ul class="nav nav-pills " id="tabContent">
                                    <li class="active nav-item"><a class="nav-link active" href="#details" data-toggle="pill" aria-selected="true"><span class="material-icons">camera</span> Upload Photo</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#access-security" data-toggle="pill"><span class="material-icons">face_retouching_natural</span> Create Avatar</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="details">
                                        <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                            <div class="bp-profile-wrapper">
                                                <div class="bp-profile-content">

                                                    <?php get_template_part('template-parts/user-profile/template-upload-avatar'); ?>

                                                    <?php if ( ! (int) bp_get_option( 'bp-disable-avatar-uploads' ) ) : ?>

                                                        <?php
                                                        /**
                                                         * Load the Avatar UI templates
                                                         *
                                                         * @since 2.3.0
                                                         */
                                                        //bp_avatar_get_templates();
                                                        ?>
                                                    <?php else : ?>
                                                        <p class="bp-help-text">
                                                            <?php
                                                            /* Translators: %s is used to output the link to the Gravatar site */
                                                            printf( esc_html__( 'Your profile photo will be used on your profile and throughout the site. To change your profile photo, create an account with %s using the same email address as you used to register with this site.', 'buddypress' ),
                                                                /* Translators: Url to the Gravatar site, you can use the one for your country eg: https://fr.gravatar.com for French translation */
                                                                '<a href="' . esc_url( __( 'https://gravatar.com', 'buddypress' ) ) . '">Gravatar</a>'
                                                            ); ?>
                                                        </p>
                                                    <?php endif; ?>
                                                    <?php
                                                    bp_nouveau_member_hook( 'after', 'avatar_upload_content' );?>
                                                    <!-- <iframe src="https://mslmcomdev.wpengine.com/members/aish/profile/change-avatar/" width="600" height="500" allow="fullscreen"></iframe> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="access-security">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <?php echo do_shortcode('[svgAvatars]') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    (function($){

        $('.save_n_pass').on('click', function(e){
            e.preventDefault();
            const n_pass = $('.new_pass').val();
            const o_pass = $('.old_pass').val();
            $.post('<?php echo admin_url('admin-ajax.php'); ?>', {
                action: 'change_user_pass',
                new_pass: n_pass,
                old_pass: o_pass
            }, function (response){
                toastr[response.type](response.message)
            })
        });


        $(document).on("change",'.checkbox .n_type',function(e) {
            const val = this.value;
            const checkBoxes = $('input[value='+val+']').not(this);
            $(checkBoxes).filter(function () {
                return !this.disabled;
            }).prop('checked',  this.checked); });


        $('.asdasdasd').on('click', function(e){
            $.post('<?php echo admin_url('admin-ajax.php'); ?>', {
                ddd: 'ddd',
                action: 'hulk_test',
            }, function (response){
                console.log(response);
            })

        });
        $('.save-change').on('click', function(e){
            e.preventDefault();
            const n_type_announcements = [], n_type_newsletter =[], n_type_new_course =[], n_type_new_quiz =[], n_type_new_assignment =[], n_type_course_completed =[], n_type_certificate_awarded =[], n_type_reset_password =[], n_type  = [], n_type_session_reminder = [];

            $("input:checkbox[name=n_type]:checked").each(function(){
                n_type.push($(this).val());
            });
            $("input.n_type_session_reminder:checked").each(function(){
                n_type_session_reminder.push($(this).val());
            });
            $(".n_type_announcements:checked").each(function(){
                n_type_announcements.push($(this).val());
            });
            $(".n_type_newsletter:checked").each(function(){
                n_type_newsletter.push($(this).val());
            });
            $(".n_type_new_course:checked").each(function(){
                n_type_new_course.push($(this).val());
            });
            $(".n_type_new_quiz:checked").each(function(){
                n_type_new_quiz.push($(this).val());
            });
            $(".n_type_new_assignment:checked").each(function(){
                n_type_new_assignment.push($(this).val());
            });
            $(".n_type_course_completed:checked").each(function(){
                n_type_course_completed.push($(this).val());
            });
            $(".n_type_certificate_awarded:checked").each(function(){
                n_type_certificate_awarded.push($(this).val());
            });
            $(".n_type_reset_password:checked").each(function(){
                n_type_reset_password.push($(this).val());
            });
            $.post('<?php echo admin_url('admin-ajax.php'); ?>', {
                n_type: n_type,
                n_type_announcements:n_type_announcements,
                n_type_newsletter:n_type_newsletter,
                n_type_new_course:n_type_new_course,
                n_type_new_quiz:n_type_new_quiz,
                n_type_new_assignment:n_type_new_assignment,
                n_type_course_completed:n_type_course_completed,
                n_type_course_completed:n_type_course_completed,
                n_type_certificate_awarded:n_type_certificate_awarded,
                n_type_reset_password:n_type_reset_password,
                n_type_session_reminder:n_type_session_reminder,
                action: 'account_save_change',
            }, function (response){
              //  console.log(response);
               toastr[response.type](response.message)
            })
        });

        $('.mult_sel').select2();

        $("#member_link").on("click",function(){
          $("#member_secn").trigger('click')
        })

    }(jQuery));
</script>


<?php  wp_enqueue_script('app-vendor'); ?>
<?php  get_footer() ?>
