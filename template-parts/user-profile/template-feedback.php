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
                                <a class="nav-link d-flex align-items-center active"  data-toggle="pill" href="#f11" aria-expanded="true">
                                    <!-- <i class="fa fa-award"></i> -->
                                    <span class="material-icons">rate_review</span>
                                    <span>Class Feedback </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center"  data-toggle="pill" href="#f12">
                                    <!-- <i class="fa fa-award"></i> -->
                                    <span class="material-icons">live_help</span>
                                    <span>Complaints/Violations</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center"  data-toggle="pill" href="#f13">
                                    <!-- <i class="fa fa-award"></i> -->
                                    <span class="material-icons">emoji_objects</span>
                                    <span>Suggestion/Ideas</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="col-md-12 bg-white">
                        <div class="tab-content p-0">
                            <div role="tabpanel" class="tab-pane active" id="f11" aria-labelledby="f11" aria-expanded="true">
                                <div class="row" id="basic-table">
                                    <div class="card">
                                        <div class="card-body">
                                            forms
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="f12" aria-labelledby="f12">
                                <div class="row" id="basic-table">
                                    <div class="card">
                                        <div class="card-body">
                                            f12
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="f13" aria-labelledby="f13">
                                <div class="row" id="basic-table">
                                    <div class="card">
                                        <div class="card-body">
                                            f13
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="f14" aria-labelledby="f14">
                                <div class="row" id="basic-table">
                                    <div class="card">
                                        <div class="card-body">
                                            f14
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="f15" aria-labelledby="f15">
                                <div class="row" id="basic-table">
                                    <div class="card">
                                        <div class="card-body">
                                            f15
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
    </div>
</section>