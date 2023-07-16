<style>
    .my-dashboard{
       display: flex;
       justify-content: space-between;
       align-items: start;
       width: 100%!important;
       margin-top: 4rem;
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
    }
    .my-dashboard-middle-scn{
        padding: 10px;
        background: #fff;
        box-shadow: 0 0 10px rgba(0,0,0,.16);
        border-radius: 10px;
        height: 15vh;
    }
    .my-dashboard-middle-scn section{
      width: 100%;
      padding: 10px;
      background: #fff;
      border-radius: 10px;
      display: flex;
      flex-direction: column;
    }
    .my-dashboard-lower-scn{
      display: flex;
      justify-content: space-between;
     
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
    }
    .my-dashboard-right-scn section{
      width: 100%;
      padding: 10px;
      background: #fff;
      box-shadow: 0 0 10px rgba(0,0,0,.16);
      border-radius: 10px;
      height: 50%!important;
    }
    /* card style upper scn */
    .dash-quarter-item{
      display: flex;
      justify-content: space-between;
      align-items: center;
      transition: 200ms linear;
      width: 25%;
    }
    .dash-half-item{
      display: flex;
      justify-content: space-between;
      align-items: center;
      transition: 200ms linear;
      width: 50%;
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
 <section class="my-dashboard learner-dash">
 
   <!-- left layout -->
   <div class="my-dashboard-left-scn">
        <!-- upper section -->
         <div class="my-dashboard-upper-scn">
           <section class="my-dashboard-actv-learners dash-half-item">
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
           <section  class="my-dashboard-actv-classrooms dash-half-item">
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
           
         </div>
          <!-- middle sec -->
          <div class="my-dashboard-middle-scn">
            <section>
                content
            </section>
          </div>
         <!-- lowe section -->
          <div class="my-dashboard-lower-scn">
              <section  class="my-dashboard-recent-attendance">
                    <!-- tittle -->
                    <div class="border-tittle-card">
                      <h3><i class="bb-icon-article bb-icon-l"></i>Recent Attendence</h3>
                    </div>
                    <div>  <?php get_template_part('template-parts/user-profile/template-user-stats'); ?></div>
                    <!-- learners list -->
                    <div>
                      <ul class="learners-list">
                        <li>
                              <div class="learner-card">
                                <div class="learner-img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/sun.png" alt="learner img"/></div>
                                <div class="learner-info">
                                  <div class="learner-content">
                                    <p class="learner-name" data-balloon-pos="down" data-balloon="Learner Name">Learner name</p>
                                    <p class="learner-Date" data-balloon-pos="down" data-balloon="Attendence Date">10-22-2022</p>
                                    <p class="learner-Attendence Attended" data-balloon-pos="down" data-balloon="Attendence Status">Attended<spn></span></p>
                                  </div>
                                  <div class="learner-content">
                                    <p class="learner-Recorded-by" data-balloon-pos="down" data-balloon="Recorded By">U.Nassra Sharaf<spn></span></p>
                                    <p class="learner-class-topic">Class Topic<spn></span></p>
                                  </div>
                                </div>
                                <div class="learner-report-issu">
                                     <span>
                                       <i class="bb-icon-info bb-icon-l"></i>
                                     </span>
                                </div>
                              </div>
                        </li>
                      </ul>
                    </div>
              </section>
              <section  class="my-dashboard-recent-billing">
                <!-- tittle -->
                <div class="border-tittle-card">
                  <h3><i class="bb-icon-currency-dollar bb-icon-l"></i>Recent Billing</h3>
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
     </section>
     <section  class="my-dashboard-recently-news">
       <!-- tittle -->
       <div class="border-tittle-card">
         <h3><i class="bb-icon-globe bb-icon-l"></i>News</h3>
       </div>
     </section>
   </div>
 </section>
 
 
 </section>
 