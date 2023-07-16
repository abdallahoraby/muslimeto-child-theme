<style>
    /* root */
    :root{
        /* colors */
        --fc-success: #49bb88;
        --fc-danger:#cf2e2e;
        --fc-warning:#fcb918;
        --main-color:#616971!important;
        /* font */
        --fs-xl:1.8vw;
        --fs-600:1.5vw;
        --fs-500:1.2vw;
        --fs-400:1vw;
        --fs-300:.8vw;
        --fs-200:.6vw;
        --fs-100:.4vw;
        --fs-50:.2vw;
        /* box shadow */
        --box-shadow: 0 0 30px 0 rgba(0,0,0,.16);
        /* input height */
        --input-height:2.3vw;
        /* fonts */
        /* font pairs */
        --title-font:'SF UI Display',sans-serif!important;
        --body-font:Verdana, sans-serif!important;
    }
    /* media query */
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
            --box-shadow: 0 0 30px 0 rgba(0,0,0,.16);
        }
        #bookly-tbs .ec-day {
            height: 8rem!important;
        }
        #bookly-tbs .ec-header .ec-day {
            height: auto!important;
        }
        .sidebar{
            display: none;
        }

    }
    @media (max-width:450px){
        #bookly-tbs .ec-day {
            height: 8rem!important;
        }
        #bookly-tbs .ec-header .ec-day {
            height: auto!important;
        }

    }
    /* end media query */
    body{
        font-family: var(--body-font)!important;
        font-size:var(--fs-300)!important;
    }
    :is(.ec-dayGridMonth,.ec-timeGridDay,.ec-sidebar,.ec-toolbar .ec-listWeek,.ec-toolbar .ec-timeGridWeek,.ec-toolbar .ec-today){
        display: none !important;
    }
    #bookly-tbs .ec-header .ec-day {
        height: auto!important;
        margin-top: 0!important;
    }
    #bookly-tbs .ec .ec-event{

        width: 100%;
        background: green;
        height: 100%;
        padding: 0;
        margin: 0;
        overflow: hidden;
        min-height:100%!important;
        max-height:100%!important;
    }
    #bookly-tbs .ec .ec-event{
        top: 0!important;
    }
    .ec-lines{
        display: none!important;
    }
    /* #bookly-tbs .ec .ec-event:first-child {
        top: 0!important;
    }
    #bookly-tbs .ec .ec-event:nth-child(2) {
        top: calc(100% + 20px)!important;
    }
    #bookly-tbs .ec .ec-event:nth-child(3) {
        top: calc(200% + 20px)!important;
    } */

    .ec-week .ec-events{
        height: 100%;
        min-height:100%;
        max-height:100%;
        padding: 0!important;
    }
    #bookly-tbs .ec-day{
        height: 5vw;
        margin-top: 25px;
        position: relative;
        border: none!important;
    }

    .ec-bg-event{
        background:transparent!important;
    }
    .ec-line::after,.ec-day{
        border:none!important
    }

    .ec-header,.ec-days{
        background: #fff;
        border: none !important;
    }
    .ec-header{
        border-bottom: 5px solid #f2f4f4!important;
    }
    #bookly-tbs .card{
        background: transparent!important;
        border:none!important;
        padding: 0!important;
    }
    #bookly-tbs .card-body{
        padding: 0!important;
    }
    .class-routine-tab{
        padding: 1rem 0!important;
    }
    #bookly-tbs .ec .ec-event:before ,#bookly-tbs .ec .ec-event{
        background:transparent!important;
        border: none!important;
    }
    .ec-body{
        position: relative!important;
        overflow: hidden!important;
        height: 40vh;
        border: none!important;
        background: #fff;
        box-shadow: 0 0 10px rgb(0 0 0 / 16%)!important;
    }
    #bookly-tbs .ec .ec-event{
        height:100%!important;
        min-width: 100%!important;
        font-size:var(--fs-300)!important;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0!important;

        border-bottom: 3px solid #eee;
        border-top: 3px solid #53b8e8;
        background: rgb(83 184 232 / 14%);
        color: var(--main-color)!important;
    }





    .ec-header .ec-day{
        margin-top: 0!important;
        padding: 10px 0!important;
        font-size:var(--fs-300)!important;
        font-weight: 400!important;
        display: flex;
        justify-content: center;
        align-items: center;
        height: auto!important;
        color: var(--main-color)!important;
    }

    #bookly-tbs .btn-default.ec-prev, #bookly-tbs .btn-default.ec-next {
        color: #fff!important;
        border-color: transparent!important;
        background: var(--main-color)!important;
        border-radius: 0!important;
        height: var( --input-height);
        display: flex!important;
        justify-content: center;
        align-items: center;
    }
    #bookly-tbs .btn-default i.ec-icon{
        color: #fff!important;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #bookly-tbs  .btn-default .ec-icon.ec-prev:after,#bookly-tbs .btn-default .ec-icon.ec-next:after{
        border-top: 2px solid #ffffff!important;
        border-right: 2px solid #ffffff!important;
    }
    #bookly-tbs .ec .ec-toolbar .ec-title{
        font-size: var(--fs-300)!important;
        color:var(--main-color);
        font-family: var(--title-font);
        transition:200ms linear;
    }
    #bookly-tbs .ec .ec-toolbar .ec-title::after{
        font-size: .7rem!important;
        color:var(--main-color);
        display: none;

    }
    #bookly-tbs .ec .ec-toolbar .ec-title:hover{
        color:var(--main-color)!important;
        transform:scale(.98);
    }
    #bookly-tbs  .btn-default.ec-next{
        margin-left: 1px!important;
    }
    .ec-icon{
        transition:200ms linear;
    }
    #bookly-tbs  .btn-default.ec-prev:hover .ec-icon.ec-prev{
        transform:translateX(-3px);
    }
    #bookly-tbs  .btn-default.ec-next:hover .ec-icon.ec-next{
        transform:translateX(3px);
    }
    #bookly-tbs .btn-group>.btn:focus {
        box-shadow: none!important;
    }
    .ec-day.ec-today {
        background-color: transparent!important;
    }
    /* event-title */
    #bookly-tbs .ec .ec-day .ec-event:hover{
        height: 100%!important;

    }
    #bookly-tbs .ec .ec-day .ec-event:hover .event-title{
        height: 100%!important;
    }
    #bookly-tbs .ec .ec-day .ec-event:hover .bookly-ec-popover{
        display: none!important;
    }
    .event-title{
        left: 0!important;
        width: 100%!important;
        max-width: 100%;
        height: 100%!important;
        overflow:hidden;
        border-bottom: 3px solid #eee;
        border-top: 3px solid #53b8e8;
        background: rgb(83 184 232 / 14%);
        color: var(--main-color)!important;
        box-shadow: 0 0 5px rgb(0 0 0 / 16%)!important;
        border-radius: 0!important;
        display: flex;
        flex-flow: column;
        justify-content: center;
        padding: 2px;
        align-items: center;
        font-size: var(--fs-200);
    }
    .event-title:hover{
        background: rgb(83 184 232 / 100%);
        height:100%;
    }
    .event-title:hover p{
        color:#fff!important;
    }
    .event-title p{
        white-space: nowrap;
        font-size: var(--fs-300)!important;
        color: var(--main-color)!important;
        margin: 10px 0 !important;
        text-align: center;
    }
    .muslimeto_calendar.academic p.event-learner{
        display:none
    }

    .tab {
        min-height: 100vh !important;
    }

    body.academic-home {
        background: #f2f4f4;
    }

    .single-sfwd-lessons div#content,
    .single-sfwd-lessons div#primary{
        padding: 0;
        margin: 0;
    }

</style>