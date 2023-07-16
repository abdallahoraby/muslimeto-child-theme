<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
<style>
    .load-gif {
        width: 100%;
        background: #fff!important;
        position: absolute;
        height: 100%;
        z-index: 999;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .feedback-select{
        position: relative;
        min-width: 100%;
        min-height: 100px;
    }
    .preloader{
      position: fixed;
    width: calc(100% - 150px);
    right: 0;
    height: 100vh;
    background-color: #f1f3f3;
    overflow: hidden;
    z-index: 9999999999999999;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 0 10px rgb(0 0 0 / 10%);

  }
  .student #pp_record2 .modal-content{

  }
  .student #pp_record2 .modal-content::after{
    content: " ";
    position: absolute;
    width: 90px;
    height: 90px;
    top: -40px;
    left: -35px;
    z-index: 9999999999999;
    background-size: 90px 90px!important;
    background-repeat: no-repeat;
    background-position: center;
    background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/sun.png);

  }
  .student #pp_record2 .modal-content::before{
    content: " ";
    position: absolute;
    width: 150px;
    height: 160px;
    bottom: -26px;
    right: -20px;
    z-index: 9999999999999;
    background-size: 150px 165px!important;
    background-repeat: no-repeat;
    background-position: bottom;
    background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/tree.png);
  }
  .mdp-contacter-start-btn-box.mdp-hover-none{
    width: 170px;
    background-size: 130px 100px;
    background-position: top center;
    display: flex;
    justify-content: center;
    align-items: end;
    background-repeat: no-repeat;
  }

  .waves_modal div{
    background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/wave_one.png);
    background-size: 100%;
    background-repeat: no-repeat;
    background-position: center;
  }
  .student .mdp-contacter-before-txt div{
    background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/airplane.png);
    width: 80px;
    height: 60px;
    background-size: 100%;
    background-position: center;
    background-repeat: no-repeat;
    transform: scaleX(-1);
  }
  @media screen and (max-width: 768px){
    .preloader{width: 100%!important}
  }
</style>
<div class="preloader">
    <div id="muslimeto_loader"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/laoders/Muslimeto-Loader-1.gif" class="normal" alt=""></div>
</div>
<!-- Modal count-down-upcomming-class-->
<div class="header-upcomming-classes-modals">
        <div class="modal fade" id="count-down-upcomming-class"  tabindex="-1" aria-labelledby="count-down-upcomming-classLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
            <div class="modal-content upcomming-class-modal-content">
                <div class="modal-header">
                    <h5 class="modal-title upcomming-class-title" id="today-upcomming-classLabel">
                    <i class="bb-icon-alarm bb-icon-l"></i>
                    <span class="upcomming-text-container">
                            <!-- <span class="count-down-timer-upcomming-class"> No Upcoming Class </span> -->
                    </span>


                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body m-0">


                    <!-- <div class="upcomming-class-info d-flex justify-content-center">



                        <div class="today-class-detail">
                                <a href="#" class="today-class-title">Quran Reading (Foundation) – CID 1</p>
                        </div>


                    </div> -->
                    <!-- <div class="upcomming-class-join-link">
                          <a>
                            Join Class
                            <i class="bb-icon-arrow-right bb-icon-l"></i>
                          </a>
                    </div> -->

                    <div class="upcoming-table-modal">
                          <h6>
                              No Upcoming classes
                          </h6>
                    </div>


            </div>


            </div>
        </div>
        </div>
</div>
<!-- end of modal -->
<!-- Modal ongoing-class-->
<div class="header-upcomming-classes-modals">
        <div class="modal fade" id="ongoing-classes-class" tabindex="-1" aria-labelledby="ongoing-classes-classLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
            <div class="modal-content ongoing-classes-class-content">
                <div class="modal-header">
                    <h5 class="modal-title ongoing-classes-class-title" id="ongoing-classes-classLabel">
                    <i class="bb-icon-alarm bb-icon-l"></i>
                    <span class="upcomming-text-container">
                            <span class="count-down-timer-ongoing-classes-class"> Ongoing classes </span>
                    </span>


                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body m-0 ">


                    <div class="ongoing-classes-class-info d-flex justify-content-center">



                         <div class="my-5">
                            <div id="loader"></div>
                         </div>


                    </div>



            </div>


            </div>
        </div>
        </div>
</div>
<!-- end of modal -->
<!-- Modal today-upcomming-class-->
<div class="header-upcomming-classes-modals">
        <div class="modal fade" id="today-upcomming-class" tabindex="-1" aria-labelledby="today-upcomming-classLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-md">
            <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title upcoming-title" id="today-upcomming-classLabel">Upcoming Classes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-0 ">

                        <!--upcomming class -->
                        <div class="today-classes-list">
                            <div class="today-classes-list-table">
                               <div id="loader"></div>
                            </div>
                        </div><!--upcomming class -->
                        <!-- complated class -->
                        <div class="complated-classes">
                                <h5>Completed Classes</h5>
                                <a <a target='_blank' href="<?= site_url() . '/attendance' ?>" class="record_Attendence">Attendance<i class="bb-icon-external-link bb-icon-l"></i></a>
                        </div>

                        <div class="today-complated-class">

                        <div id="loader"></div>
                        </div>
               </div><!-- end complated class -->

            </div>
        </div>
        </div>
</div>
<!-- end of modal today-upcomming-class-->



<!-- Modal feedback class in upcoming class-->
<div class="">
        <div class="modal fade feedback-modal-class " id="feedback-modal-class" tabindex="-1" aria-labelledby="today-practice-classLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-md">
            <div class="modal-content feedback-modal-content py-3 animate__animated animate__flipInX ">
            <div class="modal-header pb-0">
                <div class="modal-title" id="today-practice-classLabel">
                    <h5 class="mb-0">
                            <i class="bb-icon-exclamation-triangle bb-icon-l"></i>
                            Report Issue
                    </h5>
                    <span class="feedback-modal-note">Help us understand what happened with this session. </span>

                    <h5 class="SessionName">Session Name</h5>
                    <h6 class="SessionTeacher mb-0 " data-toggle='tooltip' data-placement='bottom' title='Session Details(Time|Teacher|Learner)'>Session Details</h6>
                </div>


                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body m-0 pt-0">
                     <!-- setion Info -->

                      <form class="">
                             <!-- checkbox -->
                            <label class="title-label mb-2">Which of the following issues occurred (you may select one or more)?</label>
                            <div class="feedback-select row g-3"></div>

                           <!-- textarea -->
                            <label class="title-label"> Additional details</label>
                            <div class="form-check mb-0 px-0">
                                <textarea class="form-control" placeholder="Share any further details here" id="floatingTextarea2" style="height: 100px"></textarea>
                            </div>

                          <input type="hidden" value="" class="feedback_ca_id">

                            <a href="#" class="btn btn-primary submit-modal-feedback"> Submit </a>
                      </form>
               </div>

            </div>
        </div>
        </div>
</div>

<!-- Modal feedback class-->
<div class="">
        <div class="modal fade feedback-modal-schedual" id="feedback-modal-schedual" tabindex="-1" aria-labelledby="today-practice-classLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-md">
            <div class="modal-content feedback-modal-content py-3 animate__animated animate__flipInX ">
            <div class="modal-header pb-0">
                <div class="modal-title" >
                    <h5>Help us understand what happened with You </h5>
                </div>


                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body m-0 pt-0">
                     <!-- setion Info -->
                      <form class="">
                              <!-- checkbox -->
                            <label class="title-label mb-2">Which of the following issues occurred (you may select one or more)?</label>
                            <div class="feedback-schedual-select row g-3">

                                <div class="form-check">
                                    <input type="radio" value="0" name="schedual-feedback">
                                    <label>
                                    This Is Not The Time I Agreed On With Teacher
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" value="0" name="schedual-feedback">
                                    <label>
                                    Teacher Didn't Contact Me For This Session
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" value="0" name="schedual-feedback">
                                    <label>
                                    Teacher Scheduled Too Many Makeup Sessions
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" value="0" name="schedual-feedback">
                                    <label>
                                       Other
                                    </label>
                                </div>
                            </div>

                           <!-- textarea -->
                            <label class="title-label"> Issue Details</label>
                            <div class="form-check mb-0 px-0">
                                <textarea class="form-control" placeholder="Share any further details here" id="floatingTextarea2" style="height: 100px"></textarea>
                            </div>

                          <input type="hidden" value="" class="feedback_ca_id">

                            <a href="#" class="btn btn-primary submit-modal-feedback"> Submit </a>
                      </form>
               </div>

            </div>
        </div>
        </div>
</div>






<!-- end of practice modal-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
