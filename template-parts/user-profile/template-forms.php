<?php
    $user_id = get_current_user_id();
    $user = wp_get_current_user();
    $staff =  array('administrator','teamleader');
    if(in_array('parent',$user->roles)){
        $rol='parent';
        $tab_w = "25%";
    }elseif (in_array('student',$user->roles)) {
        $rol='student';
        $tab_w = "50%";
    }elseif ((in_array('teacher',$user->roles))) {
        $rol='teacher';
        $tab_w = "20%";
    }else {
        $rol='staff';
        $tab_w = "20%";
    }
?>

<section id="page-account-settings">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <?php if($rol=='parent') :?>
                    <div class="col-md-12 sub-navs">
                        <ul class="nav nav-pills flex-row sub-nav-tabs">

                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center active"  data-toggle="pill" href="#f14">
                                    <!-- <i class="fa fa-award"></i> -->
                                    <span class="material-icons">task_alt</span>
                                    <span>Request Sponsorship </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center"  data-toggle="pill" href="#f15">
                                    <!-- <i class="fa fa-award"></i> -->
                                    <span class="material-icons">volunteer_activism</span>
                                    <span>Sponsor A Student</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center"  data-toggle="pill" href="#f16">
                                    <!-- <i class="fa fa-award"></i> -->
                                    <span class="material-icons">card_giftcard</span>
                                    <span>Send A Gift</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-12 bg-white">
                        <div class="tab-content p-0 request_sponsership_tab">
                            <div role="tabpanel" class="tab-pane active" id="f14" aria-labelledby="f14">
                                <div class="row" id="basic-table">
                                    <div class="card">
                                        <div class="card-body">
                                        <h5 class="request-sponsership-tab-title"><span class="material-icons">task_alt</span>Request Sponsorship</h5>
                                         <div class="request-sposership-form">
                                             <?php  echo do_shortcode('[gravityform id="22" title="false" description="false" ajax="true"]') ?>
                                         </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane sponsor_astudent_tab" id="f15" aria-labelledby="f15">
                                <div class="row" id="basic-table">
                                    <div class="card">
                                        <div class="card-body">
                                        <h5 class="sposer-student-tab-title"><span class="material-icons">volunteer_activism</span>Sponsor A Student</h5>
                                         <div class="sponsor-student-form">
                                             <?php  echo do_shortcode('[gravityform id="25" title="false" description="false" ajax="true"]') ?>
                                         </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane send_agift_tab" id="f16" aria-labelledby="f16">
                                <div class="row" id="basic-table">
                                    <div class="card">
                                        <div class="card-body">
                                        <h5 class="send-agift-tab-title"><span class="material-icons">card_giftcard</span>Send A Gift</h5>

                                        <!-- <?php  echo do_shortcode('[gravityform id="25" title="false" description="false" ajax="true"]') ?> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php elseif ($rol=='staff' || $rol=='teacher') :?>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <?php echo do_shortcode('[bookly-staff-special-days]') ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div><script>
    //  replace required word by *
    function replaceRequired(){
        let requiredText = document.querySelectorAll('.gfield_required_text');

        for(let i = 0;i<requiredText.length;i++){
            requiredText[i].innerHTML=requiredText[i].innerHTML.replace(/\(REQUIRED\)/gi,"*");
        }
    }
    replaceRequired();
    // icons to label
    jQuery('.ginput_container_fileupload').parent().find('label').prepend('<span class="material-icons">cloud_upload</span>');
    jQuery('.ginput_container_select').parent().find('label').prepend('<span class="material-icons">description</span>');
    jQuery('.ginput_container_checkbox').parent().find('legend').prepend('<span class="material-icons">description</span>');
</script>
</section>