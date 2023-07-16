
    <style>
        .my-dashboard{
           display: flex;
           justify-content: space-between;
           align-items: start;
           width: 100%!important;
           margin-top: 4rem;

        }
        *::-webkit-scrollbar {
           width: 5px;
           height: 5px;
        }

      *::-webkit-scrollbar-track {
         box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
       }

       *::-webkit-scrollbar-thumb {
         background-color: #475F7B;
       }
        .parent-dash{
          height: calc(100vh - 5rem);
           overflow: hidden;
        }
        .my-dashboard-left-scn{
          width: 66%!important;
          height: 100%!important;
          padding: 10px 5px 10px 10px;
          display: flex;
          flex-direction: column;
          justify-content: space-between;
          row-gap:10px;
        }
        .my-dashboard-right-scn{
          width: 34%!important;
          height: 100%!important;
          padding: 10px 5px 10px 10px;
          display: flex;
          flex-direction: column;
          row-gap:10px;
        }
        .my-dashboard-upper-scn{
          display: flex;
          justify-content: space-between;
          width: 100%;
          column-gap: 10px;
        }
        .my-dashboard-upper-scn section{
          padding: 10px;
          background: #fff;
          box-shadow: 0 0 10px rgba(0,0,0,.16);
          border-radius: 10px;
          height: 15vh;
          min-height: 100px;
        }
        .my-dashboard-lower-scn{
          display: flex;
          justify-content: space-between;
          width: 100%;
          column-gap: 10px;
        }
        .my-dashboard-lower-scn section{
          width: 50%;
          padding: 10px;
          background: #fff;
          box-shadow: 0 0 10px rgba(0,0,0,.16);
          border-radius: 10px;
          height: calc(81vh - 5rem);
          display: flex;
          flex-direction: column;
          overflow-y: auto;
        }
        .my-dashboard-lower-scn section.my-dashboard-recent-billing{
          padding: 0!important;
        }
        .my-dashboard-right-scn section{
          width: 100%;
          padding: 10px;
          background: #fff;
          box-shadow: 0 0 10px rgba(0,0,0,.16);
          border-radius: 10px;
          height: 50%!important;
          overflow-y: auto;
          overflow-x: hidden;
          min-height: auto;
        }
        /* card style upper scn */
        .dash-quarter-item{
          display: flex;
          justify-content: space-between;
          align-items: center;
          transition: 200ms linear;
          width: 25%;
        }
        .card-icon{
          width: 34%;
          display: flex;
          justify-content: center;
          align-items: center;
        }
        .card-icon span{
           width: 40px;
           height: 40px;
           display: inline-flex;
           justify-content: center;
           align-items: center;
           border-radius: 50%;
        }
        .card-icon span i{
          font-size: 2rem;
          color: var(--blue);
        }
        /* icon colors */
        /* background */
        .dash-quarter-item:first-child .card-icon span{
           background: rgb(112 192 229 / 10%);
        }
        .dash-quarter-item:nth-child(3) .card-icon span{
           background: rgb(253 172 65 / 10%) !important;
        }
        .dash-quarter-item:nth-child(2) .card-icon span{
           background-color: #dff9ec !important;
        }
        .dash-quarter-item:nth-child(4) .card-icon span{
           background:rgb(112 192 229 / 10%);
        }
        /* icon color */
        .dash-quarter-item:first-child .card-icon span i{
          color: var(--blue);
        }
        .dash-quarter-item:nth-child(3) .card-icon span i{
          color: rgb(253, 172, 65) !important;
        }
        .dash-quarter-item:nth-child(2) .card-icon span i{
          color: #39da8a !important;
        }
        .dash-quarter-item:nth-child(4) .card-icon span i{
          color: var(--blue);
        }

        /* end icon colors */
        .card-info{
          display: flex;
          flex-direction: column;
          justify-content: space-between;
          width: 75%;
        }
        .card-info h3{
          display: inline-flex;
          justify-content: center;
          white-space: nowrap;
          font-size: .9rem;
          white-space: nowrap;
          font-weight: 500;
          margin-bottom: 0!important;
          color: var(--main_color);
        }
        h3.card-tittle{opacity: .7}
        .card-info h3.card-number{
           font-size: 1.4rem!important;
           font-weight: bold;
           gap: 10px;
           position: relative;
        }
        .card-links{
          display: inline-flex;
          justify-content: end;
          align-items: center;
        }
        .card-links a{
          white-space: nowrap;
         font-size: .65rem;
         font-weight: 500;
         color: var(--main_color);
         opacity: .7;
         transition: 200ms linear;
        }
        .card-links a:hover{
          color: var(--blue);
          opacity: 1;
          transform: translateX(3px);
        }
       .my-dashboard-all-tickets  .card-info h3.card-number{
         justify-content: space-around;
       }
       .my-dashboard-all-tickets p,.my-dashboard-makeup-balance p{
          margin-bottom: 0!important;
         line-height: 28px;
         font-size: .6rem;
         position: relative;
        }
       .my-dashboard-all-tickets p span:first-child,.my-dashboard-makeup-balance p span:first-child{
          font-size: 1.4rem!important;
        }
        .my-dashboard-all-tickets p span:nth-child(2),.my-dashboard-makeup-balance p span:nth-child(2){
           opacity: .7;
           top: 15px;
           left: 1px;
        }
        .my-dashboard-makeup-balance p span:nth-child(2){
          position: absolute;
        }
        .border-tittle-card{
          width: 100%;
          border-bottom: 1px solid #eee;
        }
        .border-tittle-card h3{
          font-size: .9rem;
          font-weight: 600;
          color: var(--main_color);
          margin-bottom: 0!important;
        }
        /* recent learners */
        .learners-list{
          list-style: none;
          margin: 0!important;
        }
        .learners-list li{
          box-shadow: 0 0 10px rgb(0 0 0 / 10%);
         padding: 5px;
         border-radius: 10px;
        }
         .learner-card{
          display: flex;
          justify-content: space-between;
          align-items: center;
        }
        .learner-name{
          white-space: nowrap;
         font-size: .8rem;
         font-weight: 600;
        }
        .learner-img img{
          width: 40px;
          height: 40px;
          border-radius: 50%;
          box-shadow: 0 0 10px rgba(0,0,0,.1);
          display: flex;
        }
        .learner-info{
          display: flex;
          flex-direction: column;
         width: 80%;
        }
        .learner-info .learner-content{
          display: flex;
          justify-content: start;
          align-items: center;
          gap:10px;
        }
        .learner-info .learner-content p{
          margin-bottom: 0!important;
          white-space: nowrap;
        }
        .learner-report-issu span{
          width: 30px;
         height: 30px;
         border-radius: 50%;
         background: rgb(112 192 229 / 10%);
         display: inline-flex;
         justify-content: center;
         align-items: center;
        }
        .learner-report-issu span i{
          color: var(--blue);
          font-size: 2rem;
        }
       .my-dashboard-recent-attendance .billing_scn, .my-dashboard-recent-attendance .makeup-balance{
         display: none!important
       }
       .my-dashboard-recent-attendance .account-summery{
         width: 100%!important;
       }
       .my-dashboard-recent-attendance .account-summery h2{
         font-size: .7rem!important;
         color: var(--main_color);
       }
       /* billing table */
       table.parent-billing-table{
        border: 0!important;
       }
       .parent-billing-table thead tr{
          background: #e5f6fd;
          border-bottom: 3px solid #fff;
          border-radius: 5px;
       }
       .parent-billing-table tbody tr{
         box-shadow: 0 0 10px rgba(0,0,0,.1);
         border-bottom: 3px solid #fff;
         border-top: 3px solid #fff;
       }
       .parent-billing-table td{
        padding: 6px 5px!important;
        font-size: .6rem!important;
        color: var(--main_color)!important;
       }
       .parent-billing-table td span{
         background: #e5f6fd;
          border-radius: 5px;
          padding: 0 3px;
          width: 50px;
          color: var(--blue);
       }
        .parent-billing-table th{
          padding: 6px 5px!important;
          font-size: .6rem!important;
          color: var(--blue)!important;
        }
       .sec-tittle{
        font-size: .7rem!important;
        margin-bottom: 0!important;
       }
       .time-box{
        color:  var(--blue);
        font-weight: 600;
        width: 20px;
        height: 20px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
       }
       .time-box-container{
        display: flex;
        justify-content: flex-start;
        gap: 2px;
        align-items: center;

       }
       .time-caption{
        margin-bottom: 5px;
        display: flex;
        justify-content: end;
        font-size: .5rem;
       }

       /* learner list */
       .learner-cards{
         width: 100%;
       height: 90%;
       display: flex;
       align-items: start;
       justify-content: start;
       background: linear-gradient(0deg, #f1f3f3, #fff);
       overflow-y: auto;
       overflow-x: hidden;
       position: relative;

       }
       .learner-cards .learner-outer {
         display: flex;
          align-items: center;
          justify-content: start;
          flex-direction: column;
          width: 100%;
          padding: 10px;
       }
       .learner-cards .learner-card{
         background: #ffffff;
          min-width: 330px;
          width: 100%;
          display: flex;
          align-items: center;
          padding: 10px 20px;
          justify-content: space-between;
          border-radius: 100px 20px 20px 100px;
          box-shadow: 0 0 10px rgb(0 0 0 / 10%);
          height: 50px;
          margin: 10px 0;
          position: relative;
       }
       .learner-outer:hover .learner-card{
         animation-play-state: paused;
       }
       .learner-cards .learner-card:last-child {
         animation-delay: calc(-3s * var(--delay));
       }

       .learner-card .content {
         display: flex;
         align-items: center;
         max-width: 80%!important
       }
       .learner-cards .learner-card .img {
          height: 60px;
          width: 60px;
          position: absolute;
          left: 2px;
          background: #fff;
          border-radius: 50%;
          padding: 5px;
          box-shadow: 0px 0px 5px rgb(0 0 0 / 20%);
          display: inline-flex;
          justify-content: center;
          align-items: center;
       }
       .learner-card .img img {
         height: 100%;
         width: 100%;
         border-radius: 50%;
         object-fit: cover;
       }
       .learner-card .details {
         margin-left: 50px;
       }
       .learner-card .details h3 {
         margin-bottom: 0;
         font-size: .6rem;
         color: var(--main-color)!important;
         line-height: 15px;
       }
       .learner-card .details p {
         margin-bottom: 0;
         font-size: .65rem;
         color: var(--main-color)!important;
         white-space: nowrap;
          max-width: 30%;
          overflow: hidden;
          text-overflow: ellipsis;
       }
       .learner-card .details span.name {
         font-weight: 600;
         font-size: .8rem;
         color: var(--main-color)!important;
         margin-right: 5px;
       }
       .learner_class_info{
          display: flex;
          justify-content:flex-start;
          width: 100%;
       }
       .learner-card a.class_status {
         font-size: .6rem;
         padding: 0px 10px;
         display: inline-flex;
         justify-content: center;
         align-items: center;
         height: 15px;
         transition: all 0.3s ease;
         border-radius: 10px;
         margin-right: 30px;
         width: 85px;
         overflow: hidden;
         white-space: normal;
         text-overflow: ellipsis;
         min-width: 75px;
         display: inline-flex;
         text-align: center;
       }
       .learner-card a.class_status:hover {
         transform: scale(0.94);
       }
       /* class status colole */
        .learner-card a.class_status.attended{
          background-color: #dff9ec !important;
          color: #39da8a !important;
        }
        .learner-card a.class_status.holiday{
          background-color: #e5edfc !important;
          color: #5a8dee !important;
        }
        .learner-card a.class_status.attended-tl{
          color: rgb(253, 172, 65) !important;
          background: rgb(253 172 65 / 10%) !important;
        }
        .learner-card a.class_status.no-show-s{
          background-color: #ffe5e5 !important;
           color: #ff5b5c !important;
         }
        .learner-card a.class_status.attended-sl{
          color: rgb(253, 172, 65) !important;
          background: rgb(253 172 65 / 10%) !important;
        }
       /*end  class status colole */
       /* learner action */
       .learner_class_action{
          position: absolute;
          width: 48px;
          height: 50px;
          top: -5px;
          right: -25px;
          cursor: pointer;
       }

       .learner_class_action a{
          color: var(--main_color);
          position: absolute;
          top: 0;
       }
       .learner_action_list{
         position: absolute;
          background: #fff;
          box-shadow: 0 0 10px rgb(0 0 0 / 16%);
          right: 30px;
          top: 10px;
          padding: 5px;
          display: none;
       }
       .toggle_list{
         display:block;
       }
      .learner_action_list ul{
          margin: 0;
          list-style: none;
       }
       .learner_action_list ul a{
         color: var(--main-color);
         font-size: .6rem;
         font-weight: 600;
         margin: 5px 10px;
        }
        .learner_action_list ul a i{
          width: 20px;
          font-size: .8rem;
          height: 20px;
          border-radius: 50%;
          margin-right: 3px;
          color: rgb(253, 172, 65) !important;
          background: rgb(253 172 65 / 10%) !important;
        }
        /* activity log */
        .activity-feed {
                padding: 15px;
                overflow-y: auto;
                position: relative;
                height: 80%;
        }
        .activity-feed .feed-item {
          position: relative;
          padding-bottom: 10px;
          padding-left: 20px;
          border-left: 1px dashed #e4e8eb;
        }
        .activity-feed .feed-item:last-child {
          border-color: transparent;
        }
        .activity-feed .feed-item:after {
          font-family: 'bb-icons';
          display: flex;
          position: absolute;
          top: 0;
          left: -10px;
          width: 20px;
          height: 20px;
          border-radius: 10px;
          justify-content: center;
          align-items: center;
          color: #fff;
        }
        .activity-feed .feed-item .date {
          position: relative;
          top: -5px;
          color: #8c96a3;
          text-transform: uppercase;
          font-size: .7rem;
        }
        .activity-feed .feed-item .text {
          position: relative;
          top: -3px;
          font-size: 10px;
          padding: 5px 8px;
          font-weight: normal;
          line-height: 20px;
          display: block;
          text-overflow: ellipsis;
          overflow: hidden;
          border-radius: 10px;
        }
        /* notification filter  */
        .recent-activities-filter{
            display: flex;
            justify-content: start;
            align-items: end;
            width: 100%;
            flex-direction: column;
            margin: 0;
        }
        .recent-activities-filter h6{
            font-size: var(--fs-200);
            color: var(--main-color);
            margin-bottom: -10px!important;
        }
        .recent-activities-filter ul{
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0!important;
        }
        .recent-activities-filter ul li{
            height: 20px;
            cursor: pointer;
        }
        .recent-activities-filter ul li label{
            position: relative;
            margin: 10px 1px;
            height: 4px;
            width: 2rem;
            background-color: #9277B6;
            transition: 200ms linear;
            cursor: pointer;
        }
        .recent-activities-filter ul li label:hover{
            height: 10px;
        }
        .recent-activities-filter ul li label[for="All"]{background-color: var(--main-color)!important;}
        .recent-activities-filter ul li label[for="General"]{background-color: #495563!important;}
        .recent-activities-filter ul li label[for="Billing"]{background-color: #fdac41!important;}
        .recent-activities-filter ul li label[for="Learning"]{background-color: #00cfdd!important;}
        .recent-activities-filter ul li label[for="ClassManagment"]{background-color: #5a8dee!important;}
        .recent-activities-filter ul li label input{
            opacity: 0;
            position: absolute;
            width: 100%;
            height: 100%!important;
            top: 0;
            left: 0;
            z-index: 999;
            display: block;}
        .recent-activities-filter ul li label input:checked ~ span{}
        .recent-activities-filter ul li label span{opacity: 0;}
        .recent-activities-container ul .recent-activities-actegory.Billing .recent-activities-content .material-icons{
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
        .recent-activities-container ul .recent-activities-actegory.Billing .recent-activities-additional-data{
            margin-left: -60px;
            padding-top: 10px;
            border-top: 1px solid #fff;
        }
        /* clrs notfication */
        .feed-item.recent-activities-ctegory.Billing .text{
          background: rgb(253 172 65 / 10%);
        }
        .feed-item.recent-activities-ctegory.ClassManagment  .text{
          background-color: rgb(90 141 238 / 10%)!important;
        }
        .feed-item.recent-activities-ctegory.Support .text{
          background-color: rgb(146 119 182 / 10%);
        }
        .feed-item.recent-activities-ctegory.Learning  .text{
          background-color: rgb(0 207 221 / 10%)!important;
        }
        .feed-item.recent-activities-ctegory.General .text{
          background-color: rgb(73 85 99 / 10%)!important;
        }
        /* clrs notfication */
        .feed-item.recent-activities-ctegory.Billing::after{
          background-color: #fdac41!important;
          content: "\ef6d";
        }
        .feed-item.recent-activities-ctegory.ClassManagment::after{
          background-color: #5a8dee!important;
          content: "\eeac";
        }
        .feed-item.recent-activities-ctegory.Support::after{
          background-color: rgb(146 119 182 / 100%);
          content: "\eeb1";
        }
        .feed-item.recent-activities-ctegory.Learning::after{
          background-color: #00cfdd!important;
          content: "\edc3";
        }
        .feed-item.recent-activities-ctegory.General::after{
          background-color: #495563!important;
          content: "\eeaa";
        }
        /* clrs notfication */
        .activity-feed .feed-item.Billing .date{
           color: #fdac41!important;
        }
      .activity-feed .feed-item.ClassManagment .date{
            color: #5a8dee!important;
        }
       .activity-feed .feed-item.Support .date{
           color: rgb(146 119 182 / 100%);
        }
         .activity-feed .feed-item.Learning .date{
           color: #00cfdd!important;
        }
       .activity-feed .feed-item.General .date{
           color: #495563!important;
        }
        /* learning plan */
        .parent-learning-plan{
          background: rgb(0 162 232 / 10%);
          display: flex;
          justify-content: space-around;
          padding: 10px;
          align-items: center;
          margin-bottom: 10px!important
        }
        .parent-learning-plan-img{
          width: 50px;
          height: 50px;
          border-radius: 50%;
          background: #fff;
          display: flex;
          justify-content: center;
          align-items: center;
          overflow: hidden;
          box-shadow: 0 0 10px rgb(141 207 234 / 50%);
        }
        .parent-learning-plan-img img{
          width: 40px;
          height: 40px
        }
        .billings-container{padding: 10px!important}
        /* mediaquery */
        @media screen and (max-width: 1200px){
          .my-dashboard{height: auto!important;}
          .my-dashboard-upper-scn,.my-dashboard-lower-scn{
            flex-wrap: wrap;
            row-gap:10px;
          }
          .my-dashboard-upper-scn section{
            width: 49%!important
          }
          .my-dashboard-lower-scn section{
            width: 100%;
          }
          .my-dashboard-right-scn section{
            height: 50vh!important
          }
        }
        @media screen and (max-width: 997px) {
          .my-dashboard-upper-scn section{
            width: 100%!important
          }
         }
     </style>
</head>
<body>
    <section class="my-dashboard parent-dash">

        <!-- left layout -->
        <div class="my-dashboard-left-scn">
             <!-- upper section -->
              <div class="my-dashboard-upper-scn">
                <section class="my-dashboard-actv-learners dash-quarter-item">
                       <!-- icon -->
                       <div class="card-icon">
                         <span><i class="bb-icon-graduation-cap bb-icon-l"></i></span>
                       </div>
                       <!-- card info -->
                       <div class="card-info">

                         <!-- card tittle -->
                         <h3 class="card-tittle">
                           Active Learners
                         </h3>

                         <!-- card number -->
                         <h3 class="card-number">
                             4
                         </h3>

                         <!-- card link -->
                         <span class="card-links">
                           <a href="#">+ Add Learner</a>
                         </span>
                       </div>
                </section>
                <section  class="my-dashboard-actv-classrooms dash-quarter-item">
                  <!-- icon -->
                  <div class="card-icon">
                    <span><i class="bb-icon-picture-in-picture bb-icon-l"></i></span>
                  </div>
                  <!-- card info -->
                  <div class="card-info">

                    <!-- card tittle -->
                    <h3 class="card-tittle">
                      Active Class Rooms
                    </h3>

                    <!-- card number -->
                    <h3 class="card-number">
                        4
                    </h3>

                    <!-- card link -->
                    <span class="card-links">
                      <a href="#">+ More Details</a>
                    </span>
                  </div>
                </section>
                <section  class="my-dashboard-all-tickets dash-quarter-item">
                  <!-- icon -->
                  <div class="card-icon">
                    <span><i class="bb-icon-poll-h bb-icon-l"></i></span>
                  </div>
                  <!-- card info -->
                  <div class="card-info">

                    <!-- card tittle -->
                    <h3 class="card-tittle">
                      All Tickets
                    </h3>

                    <!-- card number -->
                    <h3 class="card-number">
                      <p><span>7</span><span>Opened</span></p>
                      <p><span>5</span><span>Closed</span></p>
                    </h3>

                    <!-- card link -->
                    <span class="card-links">
                      <a href="#">+ Add Ticket</a>
                    </span>
                  </div>
                </section>
                <section  class="my-dashboard-makeup-balance dash-quarter-item">
                  <!-- icon -->
                  <div class="card-icon">
                    <span><i class="bb-icon-wallet bb-icon-l"></i></span>
                  </div>
                  <!-- card info -->
                  <div class="card-info">

                    <!-- card tittle -->
                    <h3 class="card-tittle">
                      Makeup Balance
                    </h3>

                    <!-- card number -->
                    <h3 class="card-number">
                      <p><span data-balloon-pos="down" data-balloon="Hours">07</span></p>
                      <p><span>:</span></p>
                      <p><span data-balloon-pos="down" data-balloon="Minutes">50 </span></p>
                    </h3>

                    <!-- card link -->
                    <span class="card-links">
                      <a href="#">Schedual Makeup</a>
                    </span>
                  </div>
                </section>
              </div>

              <!-- lowe section -->
               <div class="my-dashboard-lower-scn">
                   <section  class="my-dashboard-recent-attendance">
                         <!-- tittle -->
                         <div class="border-tittle-card">
                           <h3><i class="bb-icon-article bb-icon-l"></i>Recent Attendence</h3>
                         </div>
                         <!-- Attendence statud -->
                         <div class="learners_attendence_status">
                           <div class="border-tittle-card">
                             <h3>Attendence Summery</h3>
                           </div>
                         </div>
                         <!-- learners list -->
                          <div class="learner-cards">
                            <div class="learner-outer">
                              <div class="learner-card" >
                                <div class="content">
                                  <div class="img"><img src="https://dev.portal.muslimeto.com/wp-content/uploads/avatars/398/svgA012187598240370523-bpfull.svg"></div>
                                  <div class="details">
                                    <h3>
                                      <span class="name">Student Name</span>
                                      <span class="date">10/16/2022</span>
                                    </h3>
                                    <div class="learner_class_info">
                                      <p data-balloon-pos="down" data-balloon="Recorded By"><i class="bb-icon-l bb-icon-user"></i>U.Nasra</p>
                                      <p>|</p>
                                      <p data-balloon-pos="down" data-balloon="Class"><i class="bb-icon-l bb-icon-graduation-cap"></i>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>

                                  </div>
                                </div>
                                <a href="#" class="attended class_status">Attended</a>
                                <!-- learner class action -->
                                <div class="learner_class_action">
                                  <a href="#">
                                    <i class="bb-icon-ellipsis-h bb-icon-l"></i>
                                  </a>
                                </div>
                                <div class="learner_action_list">
                                  <ul>
                                    <li>
                                      <a href="#"><i class="bb-icon-exclamation bb-icon-l"></i>Report Issue</a>
                                    </li>
                                  </ul>
                                </div>

                              </div>

                              <!-- end learner card -->
                              <div class="learner-card" >
                                <div class="content">
                                  <div class="img"><img src="https://dev.portal.muslimeto.com/wp-content/uploads/avatars/398/svgA012187598240370523-bpfull.svg"></div>
                                  <div class="details">
                                    <h3>
                                      <span class="name">Student Name</span>
                                      <span class="date">10/16/2022</span>
                                    </h3>
                                    <div class="learner_class_info">
                                      <p data-balloon-pos="down" data-balloon="Recorded By"><i class="bb-icon-l bb-icon-user"></i>U.Nasra</p>
                                      <p>|</p>
                                      <p data-balloon-pos="down" data-balloon="Class"><i class="bb-icon-l bb-icon-graduation-cap"></i>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>

                                  </div>
                                </div>
                                <a href="#" class="holiday class_status">Holiday</a>
                                <!-- learner class action -->
                                <div class="learner_class_action">
                                  <a href="#">
                                    <i class="bb-icon-ellipsis-h bb-icon-l"></i>
                                  </a>
                                </div>
                                <div class="learner_action_list">
                                  <ul>
                                    <li>
                                      <a href="#"><i class="bb-icon-exclamation bb-icon-l"></i>Report Issue</a>
                                    </li>
                                  </ul>
                                </div>

                              </div>

                              <!-- end learner card -->
                              <div class="learner-card" >
                                <div class="content">
                                  <div class="img"><img src="https://dev.portal.muslimeto.com/wp-content/uploads/avatars/398/svgA012187598240370523-bpfull.svg"></div>
                                  <div class="details">
                                    <h3>
                                      <span class="name">Student Name</span>
                                      <span class="date">10/16/2022</span>
                                    </h3>
                                    <div class="learner_class_info">
                                      <p data-balloon-pos="down" data-balloon="Recorded By"><i class="bb-icon-l bb-icon-user"></i>U.Nasra</p>
                                      <p>|</p>
                                      <p data-balloon-pos="down" data-balloon="Class"><i class="bb-icon-l bb-icon-graduation-cap"></i>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>

                                  </div>
                                </div>
                                <a href="#" class="attended-tl class_status">Attended TL</a>
                                <!-- learner class action -->
                                <div class="learner_class_action">
                                  <a href="#">
                                    <i class="bb-icon-ellipsis-h bb-icon-l"></i>
                                  </a>
                                </div>
                                <div class="learner_action_list">
                                  <ul>
                                    <li>
                                      <a href="#"><i class="bb-icon-exclamation bb-icon-l"></i>Report Issue</a>
                                    </li>
                                  </ul>
                                </div>

                              </div>

                              <!-- end learner card -->

                              <div class="learner-card" >
                                <div class="content">
                                  <div class="img"><img src="https://dev.portal.muslimeto.com/wp-content/uploads/avatars/398/svgA012187598240370523-bpfull.svg"></div>
                                  <div class="details">
                                    <h3>
                                      <span class="name">Student Name</span>
                                      <span class="date">10/16/2022</span>
                                    </h3>
                                    <div class="learner_class_info">
                                      <p data-balloon-pos="down" data-balloon="Recorded By"><i class="bb-icon-l bb-icon-user"></i>U.Nasra</p>
                                      <p>|</p>
                                      <p data-balloon-pos="down" data-balloon="Class"><i class="bb-icon-l bb-icon-graduation-cap"></i>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>

                                  </div>
                                </div>
                                <a href="#" class="no-show-s class_status">No Show</a>
                                <!-- learner class action -->
                                <div class="learner_class_action">
                                  <a href="#">
                                    <i class="bb-icon-ellipsis-h bb-icon-l"></i>
                                  </a>
                                </div>
                                <div class="learner_action_list">
                                  <ul>
                                    <li>
                                      <a href="#"><i class="bb-icon-exclamation bb-icon-l"></i>Report Issue</a>
                                    </li>
                                  </ul>
                                </div>

                              </div>

                              <!-- end learner card -->
                              <div class="learner-card" >
                                <div class="content">
                                  <div class="img"><img src="https://dev.portal.muslimeto.com/wp-content/uploads/avatars/398/svgA012187598240370523-bpfull.svg"></div>
                                  <div class="details">
                                    <h3>
                                      <span class="name">Student Name</span>
                                      <span class="date">10/16/2022</span>
                                    </h3>
                                    <div class="learner_class_info">
                                      <p data-balloon-pos="down" data-balloon="Recorded By"><i class="bb-icon-l bb-icon-user"></i>U.Nasra</p>
                                      <p>|</p>
                                      <p data-balloon-pos="down" data-balloon="Class"><i class="bb-icon-l bb-icon-graduation-cap"></i>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>

                                  </div>
                                </div>
                                <a href="#" class="attended class_status">Attended</a>
                                <!-- learner class action -->
                                <div class="learner_class_action">
                                  <a href="#">
                                    <i class="bb-icon-ellipsis-h bb-icon-l"></i>
                                  </a>
                                </div>
                                <div class="learner_action_list">
                                  <ul>
                                    <li>
                                      <a href="#"><i class="bb-icon-exclamation bb-icon-l"></i>Report Issue</a>
                                    </li>
                                  </ul>
                                </div>

                              </div>

                              <!-- end learner card -->
                              <div class="learner-card" >
                                <div class="content">
                                  <div class="img"><img src="https://dev.portal.muslimeto.com/wp-content/uploads/avatars/398/svgA012187598240370523-bpfull.svg"></div>
                                  <div class="details">
                                    <h3>
                                      <span class="name">Student Name</span>
                                      <span class="date">10/16/2022</span>
                                    </h3>
                                    <div class="learner_class_info">
                                      <p data-balloon-pos="down" data-balloon="Recorded By"><i class="bb-icon-l bb-icon-user"></i>U.Nasra</p>
                                      <p>|</p>
                                      <p data-balloon-pos="down" data-balloon="Class"><i class="bb-icon-l bb-icon-graduation-cap"></i>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>

                                  </div>
                                </div>
                                <a href="#" class="attended class_status">Attended</a>
                                <!-- learner class action -->
                                <div class="learner_class_action">
                                  <a href="#">
                                    <i class="bb-icon-ellipsis-h bb-icon-l"></i>
                                  </a>
                                </div>
                                <div class="learner_action_list">
                                  <ul>
                                    <li>
                                      <a href="#"><i class="bb-icon-exclamation bb-icon-l"></i>Report Issue</a>
                                    </li>
                                  </ul>
                                </div>

                              </div>

                              <!-- end learner card -->
                              <div class="learner-card" >
                                <div class="content">
                                  <div class="img"><img src="https://dev.portal.muslimeto.com/wp-content/uploads/avatars/398/svgA012187598240370523-bpfull.svg"></div>
                                  <div class="details">
                                    <h3>
                                      <span class="name">Student Name</span>
                                      <span class="date">10/16/2022</span>
                                    </h3>
                                    <div class="learner_class_info">
                                      <p data-balloon-pos="down" data-balloon="Recorded By"><i class="bb-icon-l bb-icon-user"></i>U.Nasra</p>
                                      <p>|</p>
                                      <p data-balloon-pos="down" data-balloon="Class"><i class="bb-icon-l bb-icon-graduation-cap"></i>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>

                                  </div>
                                </div>
                                <a href="#" class="attended class_status">Attended</a>
                                <!-- learner class action -->
                                <div class="learner_class_action">
                                  <a href="#">
                                    <i class="bb-icon-ellipsis-h bb-icon-l"></i>
                                  </a>
                                </div>
                                <div class="learner_action_list">
                                  <ul>
                                    <li>
                                      <a href="#"><i class="bb-icon-exclamation bb-icon-l"></i>Report Issue</a>
                                    </li>
                                  </ul>
                                </div>

                              </div>

                              <!-- end learner card -->





                            </div>
                          </div>
                   </section>
                   <section  class="my-dashboard-recent-billing">

                      <!-- learning plan -->
                        <div class="parent-learning-plan">
                          <div class="parent-learning-plan-img">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/invoice.png" alt="">
                          </div>
                          <div class="">
                            <h3 class="sec-tittle">learning plan</h3>
                            <div>
                                <!-- days -->
                                <div class="time-box-container">
                                        <span class="time-box">02</span>
                                        <span class="time-box">20</span>
                                        <span class="time-box">20</span>
                                </div>
                                <p class="time-caption">2 days, 20 hours ,20 minutes left to renew</p>
                            </div>
                          </div>

                        </div>
                        <!-- billing -->
                        <!-- tittle -->
                        <div class="billings-container">
                          <h3 class="sec-tittle">Recent Billing</h3>
                          <div>
                              <table class="parent-billing-table">
                                  <thead>
                                      <th>ID</th>
                                      <th>Balance</th>
                                      <th>Inv Total</th>
                                      <th>Refund Status</th>
                                      <th>Date Sent</th>
                                      <th>Date</th>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td>1</td>
                                          <td>Balance</td>
                                          <td>Inv Total</td>
                                          <td><span>Refund Status</span></td>
                                          <td>Date Sent</td>
                                          <td>Date</td>
                                      </tr>
                                      <tr>
                                          <td>1</td>
                                          <td>Balance</td>
                                          <td>Inv Total</td>
                                          <td><span>Refund Status</span></td>
                                          <td>Date Sent</td>
                                          <td>Date</td>
                                      </tr>
                                      <tr>
                                          <td>1</td>
                                          <td>Balance</td>
                                          <td>Inv Total</td>
                                          <td><span>Refund Status</span></td>
                                          <td>Date Sent</td>
                                          <td>Date</td>
                                      </tr>
                                      <tr>
                                          <td>1</td>
                                          <td>Balance</td>
                                          <td>Inv Total</td>
                                          <td><span>Refund Status</span></td>
                                          <td>Date Sent</td>
                                          <td>Date</td>
                                      </tr>
                                      <tr>
                                          <td>1</td>
                                          <td>Balance</td>
                                          <td>Inv Total</td>
                                          <td><span>Refund Status</span></td>
                                          <td>Date Sent</td>
                                          <td>Date</td>
                                      </tr>

                                  </tbody>
                              </table>
                          </div>
                        </div>

                   </section>
               </div>
        </div>
        <!-- right layout -->
        <div class="my-dashboard-right-scn">
          <section  class="my-dashboard-recently-activities">
            <!-- tittle -->
            <div class="border-tittle-card">
              <h3><i class="bb-icon-briefcase bb-icon-l"></i>Recent Activities</h3>
            </div>

            <!-- notfication filter -->
            <div class="recent-activities-filter">
            <ul>
                     <li>
                        <label class="recent-activities-filter-label" for="All" data-balloon-pos="down" data-balloon="All">
                            <input type="radio" name="recent-activities-radio-input"  value="All">
                        </label>
                    </li>
                    <li>
                        <label class="recent-activities-filter-label" for="General" data-balloon-pos="down" data-balloon="Announcements">
                            <input type="radio" name="recent-activities-radio-input"  value="General">
                        </label>
                    </li>

                    <li>
                       <label class="recent-activities-filter-label" for="Learning" data-balloon-pos="down" data-balloon="Learning Programs ">
                            <input type="radio" name="recent-activities-radio-input"  value="Learning">
                        </label>
                    </li>
                    <li>
                       <label class="recent-activities-filter-label" for="ClassManagment" data-balloon-pos="down" data-balloon="Class Activity">
                            <input type="radio" name="recent-activities-radio-input"  value="ClassManagment">
                       </label>
                    </li>
                    <li>
                       <label class="recent-activities-filter-label" for="Billing" data-balloon-pos="down" data-balloon="Billing Notfications">
                            <input type="radio" name="recent-activities-radio-input"  value="Billing">
                        </label>
                    </li>
                    <li>
                       <label class="recent-activities-filter-label" for="Support" data-balloon-pos="down" data-balloon="Support">
                            <input type="radio" name="recent-activities-radio-input"  value="Support">
                        </label>
                    </li>

                </ul>
            </div>

            <div class="activity-feed">
              <div class="feed-item recent-activities-ctegory Billing All">
                <div class="date">Sep 25</div>
                <div class="text">
                  You have earned 10 Points for completing "Joining Muslimeto Family, Welcome Aboard!"
                </div>
              </div>
              <div class="feed-item recent-activities-ctegory ClassManagment All">
                <div class="date">Sep 24</div>
                <div class="text">Added an interest “Volunteer Activities”</div>
              </div>
              <div class="feed-item recent-activities-ctegory ClassManagment All">
                <div class="date">Sep 23</div>
                <div class="text">Joined the group <a href="#">“Boardsmanship Forum”</a></div>
              </div>
              <div class="feed-item recent-activities-ctegory Learning All">
                <div class="date">Sep 21</div>
                <div class="text">Responded to need <a href="#">“In-Kind Opportunity”</a></div>
              </div>
              <div class="feed-item recent-activities-ctegory Learning All">
                <div class="date">Sep 18</div>
                <div class="text">  You have earned 10 Points for completing "Joining Muslimeto Family, Welcome Aboard!"</div>
              </div>
              <div class="feed-item recent-activities-ctegory All Support">
                <div class="date">Sep 17</div>
                <div class="text">  You have earned 10 Points for completing "Joining Muslimeto Family, Welcome Aboard!"</div>
              </div>

              <div class="feed-item recent-activities-ctegory All General">
                <div class="date">Sep 17</div>
                <div class="text">Attending the event <a href="#">“Some New Event”</a></div>
              </div>

              <div class="feed-item recent-activities-ctegory All General">
                <div class="date">Sep 17</div>
                <div class="text">  You have earned 10 Points for completing "Joining Muslimeto Family, Welcome Aboard!"</div>
              </div>
            </div>

          </section>
          <section  class="my-dashboard-recently-news">
            <!-- tittle -->
            <div class="border-tittle-card">
              <h3><i class="bb-icon-globe bb-icon-l"></i>News</h3>
            </div>
            <div>
                <ul>
                    <li>
                        <!-- news img -->
                        <div>
                            <div><img src="" alt=""></div>
                        </div>
                        <div>
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque
                                commodi inventore dolore possimus vitae dolor provident ducimus ad sequi.
                                Deserunt cumque, pariatur culpa saepe dolorem blanditiis tenetur. Id, porro reiciendis?
                            </p>
                            <a href="#">Read more</a>
                        </div>
                    </li>
                </ul>
            </div>
          </section>
        </div>
      </section>


      </section>
<script type="text/javascript">
jQuery(document).ready(function (){
  jQuery('.learner_class_action').each(function() {
              jQuery(this).on("click",function(){
                jQuery(this).next(".learner_action_list").toggleClass("toggle_list");
              })
         });
})

//filter notfications log
const filterNotficationLog = ()=>{
       let clickedValue = document.querySelectorAll('[name=recent-activities-radio-input]');
       let getAllNotificationsItems = document.querySelectorAll('.recent-activities-ctegory');
       for(let x=0; x<clickedValue.length;x++){
           for(let i = 0;i<getAllNotificationsItems.length; i++){
                   clickedValue[x].addEventListener('click',(e)=>{
                       console.log(e.target.value)

                       let filterCategory = document.querySelectorAll("."+ e.target.value);


                       for(let y =0;y<filterCategory.length;y++){
                           getAllNotificationsItems[i].style.display="block";

                           getAllNotificationsItems[i].style.display="none";
                           filterCategory[y].style.display="block"
                       }


               })
               }
       }
   }
   filterNotficationLog();

</script>
