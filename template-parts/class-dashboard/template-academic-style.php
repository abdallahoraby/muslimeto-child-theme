<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<style>
    /* root  */
    :root{
        /* colors */
        --fc-success: #49bb88;
        --fc-danger:#cf2e2e;
        --fc-warning:#fcb918;
        --fc-client:#9277b6;
        /* font */

        --fs-xl: 1.4rem;
        --fs-600: 1.2rem;
        --fs-500: 1rem;
        --fs-400: .9rem;
        --fs-300: .8rem;
        --fs-200: .7rem;
        --fs-100: .5rem;
        --fs-50: .4rem;
        --input-height: 2rem;
        --sqaure:3rem;
        --input-height: 2rem;
        /* --input-height:2.3vw; */
        /* box shadow */
        --box-shadow: 0 0 30px 0 rgba(0,0,0,.16);
        /* font-family */
        --title-font:Georgia, serif;
        --body-font:Verdana, sans-serif!important;
    }
    body {
        font-family: var( --body-font);
    }

    input,select{
        height:var(--input-height)!important;
        border-radius:0;
    }
    .bb-groups-content.academic-home{
        max-width: 100%!important;
    }
    /* widget-area */
    body .widget-area:not(.widget-area-secondary){
        display: none;
    }
    .bb-buddypanel.sticky-header .site-content{
        padding-top:15px!important;
    }
    /* filter style **********************/
    .academic-filter-container{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 30px!important
    }
    .content-area {
        padding-top: 15px;
        padding-bottom: 15px;
    }
    /* grid filter */
    .academic-filter-container .grid-filters {
        background: #fff;
        border: 1px solid #e7e9ec;
        border-radius: 3px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        justify-content:center;
        align-items:center;
        font-size: 21px;
        align-items: center;
        height:var(--input-height);
        width: 60px;
        border: none;
        box-shadow: 0 0 10px rgb(0 0 0 / 16%);
        margin-left: 15px;
    }
    .right-filter select{
        border: none;
        box-shadow: 0 0 10px rgb(0 0 0 / 16%);
    }
    .academic-filter-container .grid-filters a i{
        font-size:20px}
    .academic-filter-container .left-filter{
        display:flex;
        justify-content:center;
        align-items: center;
    }
    .academic-filter-container .left-filter form{
        margin-bottom:0!important;
    }
    .academic-filter-container  .right-filter{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .academic-filter-container .bp-dir-search-form button[type=submit] {
        position: absolute;
        opacity: 0;
        visibility: hidden;
        width: 0;
        height: 0;
        left: 7px;
        top: 7px;
        height: 20px;
        width: 20px;}
    .academic-filter-container input[type=search] {
        padding-left: 2rem !important;
        border: none;
        box-shadow: 0 0 10px rgb(0 0 0 / 16%);
    }
    /* academic content ****************************************/
    /* academitic class item */
    .Academic-cards {
        display: grid;
        grid-template-columns: repeat(4,1fr);
        gap: 1rem;
        margin: 1rem 0;
    }
    .Academic-cards .Academic-item{
        padding: var(--fs-100);
        background: #fff;
        border-radius: 0 20px 20px 0;
        /* min-height: 100px; */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        transition:200ms linear;
    }
    .Academic-cards .Academic-item:hover{
        box-shadow:none;
    }
    .Academic-cards .Academic-item .Academic-item-content {
        padding: 10px 0;
        display: flex;
        justify-content: start;
        align-items: self-start;
        border-radius: 20px;
    }
    .Academic-cards .Academic-item .Academic-item-content .Academic-item-media{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-right: 10px;
    }
    .Academic-cards .Academic-item .Academic-item-content .Academic-item-media .class-type-icon{
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: #47b3e61f;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 5px;
        font-size: 20px;
        margin-bottom: 1rem;
        color: #47b3e6;
        box-shadow: 0 0 2px rgb(0 0 0 / 16%);

    }
    .Academic-cards .Academic-item .Academic-item-content .Academic-item-media .students-imgs{
        list-style: none;
        padding-inline-start: 0!important;
        margin-block-start: 0;
        margin: 0;
        width:20px;
    }
    .Academic-cards .Academic-item .Academic-item-content .Academic-item-media .students-imgs .members{
        position: relative;
    }
    .Academic-cards .Academic-item .Academic-item-content .Academic-item-media .students-imgs .members span{
        font-size: .6rem;
        color: #47b3e6;
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        bottom: -12px;
        width: 15px;
        background: rgb(71 179 230 / 20%);
        height: 15px;
        z-index: 1000;
        border-radius: 50%;
        left: 3px;
    }
    .Academic-cards .Academic-item .Academic-item-content .Academic-item-media .students-imgs .bs-group-members{
        width:20px;
        display:flex;
        flex-direction:column;
    }
    .Academic-cards .Academic-item .Academic-item-content .Academic-item-media .students-imgs .bs-group-members img{
        width:20px;
        box-shadow: 0 0 10px rgb(0 0 0 / 16%);
    }
    .Academic-cards .Academic-item .Academic-item-content .Academic-item-info{
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: start;
        width:100%;
    }
    .Academic-cards .Academic-item .Academic-item-content .Academic-item-info .card-header{
        padding:0!important;
    }
    .Academic-cards .Academic-item .Academic-item-content .Academic-item-title{
        font-weight: bold;
        margin-bottom: .8rem;
        width: 80%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        height: 30px;
        font-size: var(--fs-400);
        color: var(--main_color);
        font-family: var(--title-font);
        display: block;
    }
    .Academic-cards .Academic-item .Academic-item-content .Academic-item-schedule{
        display: flex;
        justify-content: start;
        align-items: start;
        flex-direction: row;
        width: 100%;
        padding: .2rem;
        line-height: 18px;
        z-index: 99
    }
    .academic-date div:not(.tooltip-schedule){
        white-space: nowrap;
        text-overflow: ellipsis;
        /* display: flex;
        justify-content: start;
        align-items: start; */
        width: 80%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        display: block;
    }
    .Academic-cards .Academic-item .Academic-item-content .Academic-item-schedule .cairo-date{

    }
    .academic-date div:last-child{
        border-right: none;
    }

    .Academic-cards .Academic-item  .Academic-item-status{
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
    }

    .Academic-cards .Academic-item .Academic-item-status small{
        font-size: var(--fs-200);
    }
    .card-header a.button.zoom-join {
        justify-content: start !important;
        align-items: center!important;
        display: flex !important;
        border-radius: 0 !important;
        background: transparent !important;
        color: var(--main_color) !important;
        border:none!important;
        padding: 0!important;}
    .custom-material-icons{
        font-size: var(--fs-500);
        color: var(--main_color)!important;
        margin-right: 5px;
    }

    .small-text{
        font-size: var(--fs-300)!important;
        font-weight: 400;
        font-family: inherit;
        opacity:.9;
    }
    /* status---------------------- */
    /* succsee status */
    .Academic-status-success{
        border-left: var(--fs-50) solid #49bb88;
    }
    /* warning status */
    .Academic-status-warning{
        border-bottom: var(--fs-50) solid #fcb918!important;
    }
    /* danger status */
    .Academic-status-danger{
        border-bottom: var(--fs-50) solid #cf2e2e!important;
    }
    /* row view =========================================*/
    .Academic-cards.row-view {
        display: grid;
        grid-template-columns: repeat(1,1fr);
        gap: 1rem;
        margin: 1rem 0;
    }
    .Academic-cards.row-view .Academic-item{
        padding: 15px;
        background: #fff;
        border-radius: 20px;
        min-height: 100px;
    }
    .Academic-cards.row-view .Academic-item .Academic-item-content {
        padding: 10px;
        display: flex;
        justify-content: start;
        align-items: self-start;
        border-radius: 20px;

    }
    .Academic-cards.row-view .Academic-item .Academic-item-content .Academic-item-info{}
    .Academic-cards .Academic-item .Academic-item-content .academic-members-names{
        display: flex;
        justify-content: start;
        align-items: center;
        flex-direction: row;
        width: 100%;
        padding: .2rem;
        line-height: 18px;
    }

    .academic-members-name-list{
        display: inline-block;
        margin: 0!important;
    }
    /*.academic-members-name-list li{*/
    /*   display: none;*/
    /*}*/

    ul.academic-members-name-list {
        list-style: none;
    }

    .academic-date {
        width: 100%;
        position: relative;
    }


    .academic-members-name-list li:first-child,
    .academic-members-name-list li:nth-child(2){
        display: block!important;
        margin-bottom:.2vw;
        width: 100%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .academic-members-name-list li{
        display:none;
    }

    /* row view *****************************/
    .list-view{
        grid-template-columns: repeat(1,1fr)!important;
        gap:.2rem;
    }
    .Academic-cards.list-view .Academic-item{
        flex-direction: row;
        height: 10vh;
        border-radius: 0;
        margin-bottom: .6vh!important;
        overflow: visible;
        display: flex;
        align-items: center;
    }
    .Academic-cards.list-view .Academic-item .Academic-item-content{
        width:80%;
    }
    .Academic-cards.list-view .Academic-item .Academic-item-status {
        justify-content: space-between;
        align-items: start;
    }
    .Academic-cards.list-view .Academic-item .Academic-item-status small{display:none}
    .Academic-cards.list-view .Academic-item .Academic-item-content .Academic-item-media {
        flex-direction: column;
        justify-content: start;
        align-items: start;
        margin-right: 20px;}
    .Academic-cards.list-view .Academic-item .Academic-item-content .Academic-item-media .class-type-icon{
        margin-bottom:0!important;
    }
    .Academic-cards.list-view .Academic-item .Academic-item-content .Academic-item-media .students-imgs {
        display: none;
    }
    .Academic-cards.list-view .Academic-item .Academic-item-content .Academic-item-info{
        display: flex;
        flex-direction: row-reverse!important;
        justify-content: start;
        align-items: center;
        width: 100%;
        flex-wrap: wrap;
    }
    .Academic-cards.list-view .Academic-item .card-header{
        flex-direction:row;
        width:55%
    }
    .Academic-cards.list-view .Academic-item .Academic-item-content .Academic-item-title{
        width:70%!important;
        margin-bottom:0;
        font-weight: normal!important;
        font-size: var(--fs-300)!important;
    }

    .Academic-cards.list-view .Academic-item .card-header a.button.zoom-join{
        width:30%!important;

    }
    .Academic-cards.list-view .Academic-item .Academic-item-content .Academic-item-schedule{
        width:18%!important;
        overflow: hidden;
        text-overflow: ellipsis;
        padding: 0!important;
        margin-right: 2%;

    }

    .Academic-cards.list-view .Academic-item .Academic-item-content .academic-members-names{
        width:20%;
        overflow:hidden;
    }
    .Academic-cards.list-view .Academic-item .Academic-item-content .academic-members-names li{
        white-space: nowrap;
        overflow:hidden;
    }
    .Academic-cards.list-view .Academic-item .Academic-item-content .academic-members-names .material-icons{
        display:none!important;
    }
    .Academic-cards.list-view .Academic-item .Academic-item-content .Academic-item-media .bs-group-members {
        width: auto;
        display: flex;
        flex-direction: row;}
    .Academic-cards.list-view .academic-members-name-list li:first-child, .academic-members-name-list li:nth-child(2) {
        display: inline-flex;
        margin-right: 25px;}
    .Academic-cards.list-view .academic-quick-view-manu{
        right: 20px;
        position: absolute;
        top: 40px;
        width: 20%;

        z-index: 999;
        height: auto;

        transform: translateX(-0);
        filter: none;

    }

    .Academic-cards.list-view  .academic-quick-view-content{
        width:100%
    }
    .Academic-cards.list-view .academic-quick-view-content ul{
        padding:15px;
    }
    .Academic-cards.list-view .academic-quick-view-content ul li a {
        margin: 0 15px;
        display: flex;
        font-size: .8rem;
        font-weight:normal;
        transition: all 100ms ease-in-out;
    }
    /* quick view */
    .academic-quickaction-menu-btn{
        cursor: pointer;
        font-size:var(--fs-xl);
    }

    .academic-quick-view-manu{
        right: 0;
        position: absolute;
        top: 0;
        width: 100%;
        background: rgb(255 255 255 / 16%);
        z-index: 99999999;
        height: 100%;
        display:none;
        justify-content: end;
        align-items: center;
        transform: translateX(-0);
        filter: drop-shadow(2px 4px 6px rgba(0,0,0,.4));
        transition: all 100ms ease-in-out;
        cursor: pointer;
    }
    .academic-quick-view-content{
        background: #fff;
        height: 100%;
        width: 60%;
        margin-left: auto!important;
        box-shadow: 0 0 30px rgb(0 0 0 / 16%);
        display: flex;
        justify-content: start;
        align-items: center;
        transition: all 100ms ease-in-out;

    }
    .academic-quick-view-content ul{
        list-style:none;
        margin:0!important;
    }
    .academic-quick-view-content ul li{
        /* padding:10px */
    }
    .academic-quick-view-content ul li a,.academic-send-reminder{
        margin: 15px;
        display: flex;
        justify-content: start;
        align-items: center;
        height: 100%;
        font-size: var(--fs-300);
        font-weight: 600;
        transition: all 500ms ease-in-out;
        font-family: inherit;
    }
    /* academic send reminder */
    .academic-send-reminder{
        background:transparent!important;
        border-radius:0!important;
        padding: 0;
        margin-bottom:5px;
        border:0!important;
    }
    .academic-quick-view-content .material-icons,.academic-send-reminder .material-icons{
        font-size: var(--fs-500);
        padding-right: 7px;
    }
    .academic-quick-view-content a:hover ,.academic-quick-view-content .academic-send-reminder:hover{
        padding-left:3px;
        background:transparent!important;
        box-shadow:none!important;
    }
    .academic-quick-view-content a:hover span ,.academic-send-reminder:hover span{
        color:var(--blue);
    }
    .academic-send-reminder-count-down{
        font-size:var(--fs-200);
        margin:5px 15px;
        font-family: inherit;
        display: flex;
        justify-content: start;
        align-items: center;
        transition: 200ms linear;
        opacity: .8;
        white-space: nowrap;
        padding-left: 10px;
    }
    .academic-send-reminder-count-down p{
        margin-bottom: 0!important;
        margin-right: 3px;
        white-space: nowrap;
    }
    /* pagination */
    .pagination {
        margin: 0!important;
        background: #fff!important;
        padding: 10px!important;
        width: fit-content!important;
        box-shadow: 0 0 10px rgb(0 0 0 / 16%)!important;
        /* border-radius: 0 15px 15px 0!important; */
        display: flex;
        justify-content: center;
        align-items: center;
        transition: 200ms linear;
    }
    .pagination:hover{
        box-shadow: none!important;
    }
    .pagination .pag-count{
        font-size: var(--fs-200);
        color: var(--main-color);
        margin-right: 10px;
    }
    .page-numbers{
        transition: 200ms linear;
        font-size: var(--fs-200)!important;
        color: var(--main-color)!important;
    }
    .page-numbers:hover{
        background: #475f7b!important;
        color: #fff!important;
        font-weight: 600;
        border: 0;
        border-radius: 0;
        box-shadow: 0 0 8px rgb(0 0 0 / 16%);
        transform: scaleY(.9);
    }
    .page-numbers.current{
        background: #475f7b!important;
        color: #fff!important;
        font-weight: 600;
        border: 0;
        border-radius: 0;
        box-shadow: 0 0 8px rgb(0 0 0 / 16%);
    }
    /* animation */
    .animate {
        animation-duration: 0.75s;
        animation-delay: 0.5s;
        animation-name: animate-fade;
        animation-timing-function: cubic-bezier(.26, .53, .74, 1.48);
        animation-fill-mode: backwards;
    }

    /* Fade In */
    .animate.fade {
        animation-name: animate-fade;
        animation-timing-function: ease;
    }
    .tooltip-schedule{
        display: none;
        position: absolute;
        background: #475f7b;
        box-shadow: 0 0 1opx rgba(0,0,0,.1);
        right: 12%;
        width: 100%;
        top: 17px;
        box-shadow: 0 0 10px rgb(0 0 0 / 16%);
        padding: 8px;
        z-index: 998;
        color: #fff;
        font-size: .6rem;
        text-align: center;
        border-radius: 5px;
    }
    .tooltip-schedule::before{
        content: " ";
        position: absolute;
        top: -5px;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;

        border-bottom: 5px solid #475f7b;
    }
    .show-schedules-cairo-timezone.active:hover .tooltip-schedule,.show-schedules-client-timezone.active:hover .tooltip-schedule{
        display: block;
    }
    @keyframes animate-fade {
        0% { right:-100% }
        50% {  right:-25%}
        100% {  right:0}
    }

    [name="timezone-switch"] {
        display: none !important;
    }

    .switch-timezone-section label {
        color: var(--gray);
        font-size: 0.9rem;
        cursor: pointer;
        line-height: 1.2rem;
        display: flex;
        justify-content: center;
        align-items: center;
        height:var(--input-height);
        width: 70px;
        transition: 300ms linear;
    }
    .show-schedules-cairo-timezone.active,.show-schedules-client-timezone.active{
        display: flex;
    }


    .switch-timezone-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin: 0 15px;
        width: 150px;
        height:var(--input-height);
        /* border-radius: 20px; */
        overflow: hidden;
        background: white;
        border: none;
        box-shadow: 0 0 10px rgb(0 0 0 / 16%);
    }

    .switch-timezone-section label.active {
        /* background: #47b3e6; */
        background: #fcb918;
        border-radius: 30px;
        color: #fff;
        font-weight: 600;
    }
    .active-time-zone{
        background: #fcb918;
        /* border-radius: 30px; */
        color: #fff!important;
        font-weight: 600;

    }
    .active-time-zone-cairo{
        background: var(--main_color)!important;
        /* border-radius: 30px; */
        color: #fff!important;
        font-weight: 600;
    }
    .active-time-zone-client{
        background: var(--fc-client)!important;
        /* border-radius: 30px; */
        color: #fff!important;
        font-weight: 600;

    }
    .client-date{
        color:var(--fc-client)!important;
    }
    .cairo-date{
        color:var(--main_color)!important;
    }
    .card-header a.button.zoom-join {
        font-size: 0.8rem;
        width: 100%;
        margin: 0 !important;
        padding: 0.2rem !important;
    }

    .card-header a.button.zoom-join img {
        width: 20px;
        height: 20px;
    }

    .card-header {
        display: flex;
        flex-flow: column;
        overflow: hidden;
        width: 100%;
    }

    .show-schedules-cairo-timezone.active, .show-schedules-client-timezone.active {
        display: flex;
        flex-flow: column;
    }

    .academic-date .schedule_item {
        margin: 0;
        width: 100%;
    }


    /* Media query */
    @media screen and (min-width:1800px){

        .custom-material-icons{
            font-size: 1vw; }
        .Academic-cards{grid-template-columns:repeat(5,1fr)}
        .Academic-cards .Academic-item .Academic-item-content .Academic-item-title{
            height:40px;
            margin-bottom:2rem
        }
        .Academic-cards .Academic-item .Academic-item-content .Academic-item-media .class-type-icon{
            height:40px;
            width:40px;
            margin-bottom:2.2rem;
        }
        .Academic-cards.list-view .academic-quick-view-manu{
            width:14%;
        }
        .Academic-cards.list-view .Academic-item{
            height: 6vh!important;
            margin-bottom:.2vh!important;
        }
        .Academic-cards.list-view .academic-quick-view-manu{
            top:60px!important;
        }
    }
    @media screen and (max-width:1200px){
        .Academic-cards {
            display: grid;
            grid-template-columns: repeat(2,1fr);
            gap: .5rem;
            margin: 1rem 0;
        }

    }
    @media screen and (max-width:992px){


        .Academic-cards {
            display: grid;
            grid-template-columns: repeat(2,1fr);
            gap: 1rem;
            margin: 1rem 0;
        }
        .widget-area:not(.widget-area-secondary) {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%;
        }
        .bb-buddypanel .site-content{
            padding:0 10px!important
        }
        .bb-grid-cell:not(.no-gutter), .bb-grid>:not(.no-gutter) {padding:0!important}

    }
    @media screen and (max-width:768px){
        .Academic-cards {
            display: grid;
            grid-template-columns: repeat(1,1fr);
            gap: 1rem;
            margin: 1rem 0;}
        .bb-buddypanel .site-content{
            padding:0 10px!important
        }
        .academic-filter-container{
            align-items:start!important;
        }
        .academic-filter-container .left-filter{
            justify-content: start!important;
            align-items: start!important;
            flex-direction: column!important;
            margin-bottom:15px;
        }
        .switch-timezone-section{
            margin:0 10!important;

        }
        .academic-filter-container .grid-filters{
            display:none;
        }
        .sub-menu-fixed.mobile{
            display:none!important;
        }
    }
    @media screen and (max-width:450px){
        .bb-buddypanel .site-content{
            padding:0 15px!important
        }
        .Academic-cards .Academic-item{
            border-radius:0!important;
        }
        .academic-filter-container .left-filter{
            justify-content: space-between!important;
            align-items: center!important;
            flex-direction: row!important;
            width:100%;
            flex-wrap:wrap!important;
        }
        .academic-filter-container .left-filter form,.academic-filter-container .left-filter form input,
        .dir-search.members-search.bp-search{
            width: 100%;
        }
        .switch-timezone-section{
            margin:0 !important;
        }
        .academic-filter-container{
            flex-direction: row!important;
            flex-wrap: wrap;
        }

        /* .academic-filter-container .right-filter{
             display:none!important;
         } */
        .switch-timezone-section{
            width:90px;
            margin:5px;
        }
        .switch-timezone-section label{
            width: 40px;
            font-size: .7rem
        }
        .academic-filter-container .grid-filters{
            display:none;
        }
    }



    /* preloader */
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
/* academic-classrooms-content */
.academic-classrooms-content .Academic-cards{
  grid-template-columns: repeat(3,1fr);
}
.academic-classrooms-content   .switch-timezone-section {
  margin: 0 15px 0 0!important;
  width: fit-content!important;
}
.academic-classrooms-content .switch-timezone-section label{
    padding: 0!important;
    margin-bottom: 0!important;
    margin-right: 0!important;
    margin-left: 0!important;
    border-bottom: 0!important;
}
.academic-classrooms-content .Academic-cards.list-view .Academic-item{
  
}
</style>
