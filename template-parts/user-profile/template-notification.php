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

<!-- notification setting page start -->
<section id="page-notification-settings">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <!-- left menu section -->
                <div class="col-md-12 sub-navs pills">
                    <ul class="nav nav-pills flex-row sub-nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link   align-items-center active" id="pill-notifications-general" data-toggle="pill" href="#notifications-general" aria-expanded="true">
                                <!-- <i class="fa fa-cog"></i> -->
                                <span class="material-icons">widgets</span>
                                <span>General</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link align-items-center" id="pill-notifications-learning" data-toggle="pill" href="#notifications-learning" aria-expanded="false">
                                <!-- <i class="fa fa-lock"></i> -->
                                <span class="material-icons">local_library</span>
                                <span>Learning</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link align-items-center" id="pill-notifications-class" data-toggle="pill" href="#notifications-class" aria-expanded="false">
                                <!-- <i class="fa fa-bell"></i> -->
                                <span class="material-icons">cast_for_education</span>
                                <span>Class Management</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- right content section -->
                <div class="col-md-12 bg-white">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <div role="tabpanel" class="tab-pane active" id="notifications-general" aria-labelledby="pill-notifications-general" aria-expanded="true">

                                    <div class="row">
                                        <h4 class="g_noti_head">General </h4>
                                        <h6 class="m-1 not_heading">Announcements</h6>
                                        <div class="col-12 not_choice">
                                            <ul class="list-unstyled mb-0">
                                                <?php
                                                $values = get_field('announcements','user_'.$user_id);
                                                $field =  get_field_object('announcements','user_'.$user_id);
                                                $choices = $field['choices'];if(!empty($choices)):
                                                    foreach($choices as $choice_value => $choice_label):?>
                                                        <li class="d-inline-block mr-2 mb-1">
                                                            <div class="checkbox checkbox-primary checkbox-glow">
                                                                <input type="checkbox" id="n_type_1<?php echo $choice_value; ?>" value="<?php echo $choice_value; ?>" <?php if(in_array($choice_value,$values)) {echo 'checked';} ?> disabled readonly checked class="n_type_announcements" disabled readonly/>
                                                                <label for="n_type_1<?php echo $choice_value; ?>"><?php echo $choice_label; ?></label>
                                                            </div>
                                                        </li>
                                                    <?php endforeach; else:?>
                                                    <li class="d-inline-block mr-2 mb-1">
                                                        <div class="checkbox checkbox-primary checkbox-glow">
                                                            <input class="n_type_announcements" type="checkbox" id="type_13" value="email" name="n_type" disabled readonly checked/>
                                                            <label for="type_13">EMAIL</label>
                                                        </div>
                                                    </li>
                                                    <li class="d-inline-block mr-2 mb-1">
                                                        <div class="checkbox checkbox-primary checkbox-glow">
                                                            <input class="n_type_announcements" type="checkbox" id="type_14" value="sms" name="n_type" disabled readonly checked/>
                                                            <label for="type_14">SMS</label>
                                                        </div>
                                                    </li>
                                                <?php endif; ?>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input type="checkbox" disabled readonly checked/>
                                                        <label>PORTAL</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <h6 class="m-1 not_heading">Password Reset</h6>
                                        <div class="col-12 not_choice">
                                            <ul class="list-unstyled mb-0">
                                                <?php
                                                $values = get_field('reset_password','user_'.$user_id);
                                                $field =  get_field_object('reset_password','user_'.$user_id);
                                                $choices = $field['choices'];if(!empty($choices)):
                                                    foreach($choices as $choice_value => $choice_label):?>
                                                        <li class="d-inline-block mr-2 mb-1">
                                                            <div class="checkbox checkbox-primary checkbox-glow">
                                                                <input checked readonly disabled type="checkbox" id="n_type_1<?php echo $choice_value; ?>" value="<?php echo $choice_value; ?>" <?php if(in_array($choice_value,$values)) {echo 'checked';} ?> class="n_type_reset_password" />
                                                                <label for="n_type_1<?php echo $choice_value; ?>"><?php echo $choice_label; ?></label>
                                                            </div>
                                                        </li>
                                                    <?php endforeach; else:?>
                                                    <li class="d-inline-block mr-2 mb-1">
                                                        <div class="checkbox checkbox-primary checkbox-glow">
                                                            <input class="n_type_reset_password" type="checkbox" id="type_13q" value="email" name="n_type" checked readonly disabled/>
                                                            <label for="type_13q">EMAIL</label>
                                                        </div>
                                                    </li>
                                                    <li class="d-inline-block mr-2 mb-1">
                                                        <div class="checkbox checkbox-primary checkbox-glow">
                                                            <input class="n_type_reset_password" type="checkbox" id="type_14q" value="sms" name="n_type" checked readonly disabled/>
                                                            <label for="type_14q">SMS</label>
                                                        </div>
                                                    </li>
                                                <?php endif; ?>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input type="checkbox" disabled readonly checked/>
                                                        <label>PORTAL</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <h6 class="m-1 not_heading">Newsletter</h6>
                                        <div class="col-12 not_choice">
                                            <ul class="list-unstyled mb-0">
                                                <?php
                                                $values = get_field('newsletter','user_'.$user_id);
                                                $field =  get_field_object('newsletter','user_'.$user_id);
                                                $choices = $field['choices'];if(!empty($choices)):
                                                    foreach($choices as $choice_value => $choice_label):?>
                                                        <li class="d-inline-block mr-2 mb-1">
                                                            <div class="checkbox checkbox-primary checkbox-glow">
                                                                <input type="checkbox" id="n_type_2<?php echo $choice_value; ?>" value="<?php echo $choice_value; ?>" <?php if(in_array($choice_value,$values)) {echo 'checked';} ?> class="n_type_newsletter" />
                                                                <label for="n_type_2<?php echo $choice_value; ?>"><?php echo $choice_label; ?></label>
                                                            </div>
                                                        </li>
                                                    <?php endforeach; else:?>
                                                    <li class="d-inline-block mr-2 mb-1">
                                                        <div class="checkbox checkbox-primary checkbox-glow">
                                                            <input class="n_type_newsletter" type="checkbox" id="type_15" value="email" name="n_type" />
                                                            <label for="type_15">EMAIL</label>
                                                        </div>
                                                    </li>
                                                    <li class="d-inline-block mr-2 mb-1">
                                                        <div class="checkbox checkbox-primary checkbox-glow">
                                                            <input class="n_type_newsletter" type="checkbox" id="type_16" value="sms" name="n_type" />
                                                            <label for="type_16">SMS</label>
                                                        </div>
                                                    </li>
                                                <?php endif; ?>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input type="checkbox" disabled readonly checked/>
                                                        <label>PORTAL</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>


                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                            <button type="button" class="save-change btn btn-primary glow mr-sm-1 mb-1">Save
                                                changes</button>
                                            <!-- <button type="reset" class="btn btn-light mb-1">Cancel</button> -->
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade " id="notifications-learning" role="tabpanel" aria-labelledby="pill-notifications-learning" aria-expanded="false">

                                    <div class="row">
                                        <h4 class="g_noti_head">Learning</h4>
                                        <h6 class="m-1 not_heading">New Course</h6>
                                        <div class="col-12 not_choice">
                                            <ul class="list-unstyled mb-0">
                                                <?php
                                                $values = get_field('new_course','user_'.$user_id);
                                                $field =  get_field_object('new_course','user_'.$user_id);
                                                $choices = $field['choices'];if(!empty($choices)):
                                                    foreach($choices as $choice_value => $choice_label):?>
                                                        <li class="d-inline-block mr-2 mb-1">
                                                            <div class="checkbox checkbox-primary checkbox-glow">
                                                                <input  type="checkbox" id="n_type_71<?php echo $choice_value; ?>" value="<?php echo $choice_value; ?>" <?php if(in_array($choice_value,$values)) {echo 'checked';} ?> class="n_type_new_course" />
                                                                <label for="n_type_71<?php echo $choice_value; ?>"><?php echo $choice_label; ?></label>
                                                            </div>
                                                        </li>
                                                    <?php endforeach; else:?>
                                                    <li class="d-inline-block mr-2 mb-1">
                                                        <div class="checkbox checkbox-primary checkbox-glow">
                                                            <input class="n_type_new_course" type="checkbox" id="type_18" value="email" name="n_type" />
                                                            <label for="type_18">EMAIL</label>
                                                        </div>
                                                    </li>
                                                    <li class="d-inline-block mr-2 mb-1">
                                                        <div class="checkbox checkbox-primary checkbox-glow">
                                                            <input class="n_type_new_course" type="checkbox" id="type_19" value="sms" name="n_type" />
                                                            <label for="type_19">SMS</label>
                                                        </div>
                                                    </li>
                                                <?php endif; ?>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input type="checkbox" disabled readonly checked/>
                                                        <label>PORTAL</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <hr>

                                        <h6 class="m-1 not_heading">New Quiz</h6>
                                        <div class="col-12 not_choice">
                                            <ul class="list-unstyled mb-0">
                                                <?php
                                                $values = get_field('new_quiz','user_'.$user_id);
                                                $field =  get_field_object('new_quiz','user_'.$user_id);
                                                $choices = $field['choices'];
                                                pre_dump($choices);
                                                pre_dump($values);
                                                if(!empty($choices)):

                                                    foreach($choices as $choice_value => $choice_label):?>
                                                        <li class="d-inline-block mr-2 mb-1">
                                                            <div class="checkbox checkbox-primary checkbox-glow">
                                                                <input type="checkbox" id="n_type_4<?php echo $choice_value; ?>" value="<?php echo $choice_value; ?>" <?php if(in_array($choice_value,$values)) {echo 'checked';} ?> class="n_type_new_quiz" />
                                                                <label for="n_type_4<?php echo $choice_value; ?>"><?php echo $choice_label; ?></label>
                                                            </div>
                                                        </li>
                                                    <?php endforeach; else:?>
                                                    <li class="d-inline-block mr-2 mb-1">
                                                        <div class="checkbox checkbox-primary checkbox-glow">
                                                            <input class="n_type_new_quiz" type="checkbox" id="type_131" value="email" name="n_type" />
                                                            <label for="type_131">EMAIL</label>
                                                        </div>
                                                    </li>
                                                    <li class="d-inline-block mr-2 mb-1">
                                                        <div class="checkbox checkbox-primary checkbox-glow">
                                                            <input class="n_type_new_quiz" type="checkbox" id="type_141" value="sms" name="n_type" />
                                                            <label for="type_141">SMS</label>
                                                        </div>
                                                    </li>
                                                <?php endif; ?>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input type="checkbox" disabled readonly checked/>
                                                        <label>PORTAL</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <h6 class="m-1 not_heading">New Assignment </h6>
                                        <div class="col-12 not_choice">
                                            <ul class="list-unstyled mb-0">
                                                <?php
                                                $values = get_field('new_assignment','user_'.$user_id);
                                                $field =  get_field_object('new_assignment','user_'.$user_id);
                                                $choices = $field['choices'];if(!empty($choices)):
                                                    foreach($choices as $choice_value => $choice_label):?>
                                                        <li class="d-inline-block mr-2 mb-1">
                                                            <div class="checkbox checkbox-primary checkbox-glow">
                                                                <input type="checkbox" id="n_type_5<?php echo $choice_value; ?>" value="<?php echo $choice_value; ?>" <?php if(in_array($choice_value,$values)) {echo 'checked';} ?> class="n_type_new_assignment" />
                                                                <label for="n_type_5<?php echo $choice_value; ?>"><?php echo $choice_label; ?></label>
                                                            </div>
                                                        </li>
                                                    <?php endforeach; else:?>
                                                    <li class="d-inline-block mr-2 mb-1">
                                                        <div class="checkbox checkbox-primary checkbox-glow">
                                                            <input class="n_type_new_assignment" type="checkbox" id="type_132" value="email" name="n_type" />
                                                            <label for="type_132">EMAIL</label>
                                                        </div>
                                                    </li>
                                                    <li class="d-inline-block mr-2 mb-1">
                                                        <div class="checkbox checkbox-primary checkbox-glow">
                                                            <input class="n_type_new_assignment" type="checkbox" id="type_143" value="sms" name="n_type" />
                                                            <label for="type_143">SMS</label>
                                                        </div>
                                                    </li>
                                                <?php endif; ?>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input type="checkbox" disabled readonly checked/>
                                                        <label>PORTAL</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <h6 class="m-1 not_heading">Course Completed</h6>
                                        <div class="col-12 not_choice">
                                            <ul class="list-unstyled mb-0">
                                                <?php
                                                $values = get_field('course_completed','user_'.$user_id);
                                                $field =  get_field_object('course_completed','user_'.$user_id);
                                                $choices = $field['choices'];if(!empty($choices)):
                                                    foreach($choices as $choice_value => $choice_label):?>
                                                        <li class="d-inline-block mr-2 mb-1">
                                                            <div class="checkbox checkbox-primary checkbox-glow">
                                                                <input checked readonly disabled type="checkbox" id="n_type_6<?php echo $choice_value; ?>" value="<?php echo $choice_value; ?>" <?php if(in_array($choice_value,$values)) {echo 'checked';} ?> class="n_type_course_completed" />
                                                                <label for="n_type_6<?php echo $choice_value; ?>"><?php echo $choice_label; ?></label>
                                                            </div>
                                                        </li>
                                                    <?php endforeach; else:?>
                                                    <li class="d-inline-block mr-2 mb-1">
                                                        <div class="checkbox checkbox-primary checkbox-glow">
                                                            <input class="n_type_course_completed" type="checkbox" id="type_134" value="email" name="n_type" checked readonly disabled/>
                                                            <label for="type_134">EMAIL</label>
                                                        </div>
                                                    </li>
                                                    <li class="d-inline-block mr-2 mb-1">
                                                        <div class="checkbox checkbox-primary checkbox-glow">
                                                            <input class="n_type_course_completed" type="checkbox" id="type_145" value="sms" name="n_type" checked readonly disabled/>
                                                            <label for="type_145">SMS</label>
                                                        </div>
                                                    </li>
                                                <?php endif; ?>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input type="checkbox" disabled readonly checked/>
                                                        <label>PORTAL</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <h6 class="m-1 not_heading">Certificate Awarded</h6>
                                        <div class="col-12 not_choice">
                                            <ul class="list-unstyled mb-0">
                                                <?php
                                                $values = get_field('certificate_awarded','user_'.$user_id);
                                                $field =  get_field_object('certificate_awarded','user_'.$user_id);
                                                $choices = $field['choices'];if(!empty($choices)):
                                                    foreach($choices as $choice_value => $choice_label):?>
                                                        <li class="d-inline-block mr-2 mb-1">
                                                            <div class="checkbox checkbox-primary checkbox-glow">
                                                                <input type="checkbox" id="n_type_7<?php echo $choice_value; ?>" value="<?php echo $choice_value; ?>" <?php if(in_array($choice_value,$values)) {echo 'checked';} ?> class="n_type_certificate_awarded" checked readonly disabled />
                                                                <label for="n_type_7<?php echo $choice_value; ?>"><?php echo $choice_label; ?></label>
                                                            </div>
                                                        </li>
                                                    <?php endforeach; else:?>
                                                    <li class="d-inline-block mr-2 mb-1">
                                                        <div class="checkbox checkbox-primary checkbox-glow">
                                                            <input class="n_type_certificate_awarded" type="checkbox" checked readonly disabled id="type_136" value="email" name="n_type" />
                                                            <label for="type_136">EMAIL</label>
                                                        </div>
                                                    </li>
                                                    <li class="d-inline-block mr-2 mb-1">
                                                        <div class="checkbox checkbox-primary checkbox-glow">
                                                            <input class="n_type_certificate_awarded" type="checkbox" checked readonly disabled id="type_147" value="sms" name="n_type" />
                                                            <label for="type_147">SMS</label>
                                                        </div>
                                                    </li>
                                                <?php endif; ?>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input type="checkbox" disabled readonly checked/>
                                                        <label>PORTAL</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                            <button type="button" class="save-change btn btn-primary glow mr-sm-1 mb-1">Save
                                                changes</button>
                                            <!-- <button type="reset" class="btn btn-light mb-1">Cancel</button> -->
                                        </div>
                                    </div>



                                </div>

                                <div class="tab-pane fade" id="notifications-class" role="tabpanel" aria-labelledby="pill-notifications-class" aria-expanded="false">
                                    <div class="row">
                                        <h4 class="g_noti_head">Class Management</h4>
                                        <h6 class="m-1 not_heading">New Class</h6>
                                        <div class="col-12 not_choice">
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input class="n_type_class_end_date_update" type="checkbox" value="email" disabled readonly checked/>
                                                        <label for="nn13">EMAIL</label>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input class="n_type_class_end_date_update" type="checkbox" value="sms" disabled readonly checked/>
                                                        <label for="nn12">SMS</label>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input type="checkbox" disabled readonly checked/>
                                                        <label>PORTAL</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <h6 class="m-1 not_heading">Session Reminder</h6>
                                        <div class="col-12 not_choice">
                                            <ul class="list-unstyled mb-0">
                                                <?php
                                                $values = get_field('session_reminder','user_'.$user_id);
                                                $field =  get_field_object('session_reminder','user_'.$user_id);
                                                $choices = $field['choices'];if(!empty($choices)):
                                                    foreach($choices as $choice_value => $choice_label):?>
                                                        <li class="d-inline-block mr-2 mb-1">
                                                            <div class="checkbox checkbox-primary checkbox-glow">
                                                                <input type="checkbox"
                                                                       id="s_r<?php echo $choice_value; ?>"  value="<?php echo $choice_value; ?>" <?php if(in_array($choice_value,$values)) {echo 'checked';} ?> class="n_type_session_reminder" name="n_type_session_reminder" <?php if($choice_value == "email"){echo 'checked readonly disabled';} ?>
                                                                />
                                                                <label for="s_r<?php echo $choice_value; ?>"><?php echo $choice_label; ?></label>
                                                            </div>
                                                        </li>
                                                    <?php endforeach; else:?>
                                                    <li class="d-inline-block mr-2 mb-1">
                                                        <div class="checkbox checkbox-primary checkbox-glow">
                                                            <input class="n_type_session_reminder" type="checkbox"  value="email" name="n_type_session_reminder" disabled checked readonly/>
                                                            <label>EMAIL</label>
                                                        </div>
                                                    </li>
                                                    <li class="d-inline-block mr-2 mb-1">
                                                        <div class="checkbox checkbox-primary checkbox-glow">
                                                            <input class="n_type_session_reminder" type="checkbox" value="sms" id="ddds" name="n_type_session_reminder"/>
                                                            <label for="ddds">SMS</label>
                                                        </div>
                                                    </li>
                                                <?php endif; ?>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input type="checkbox" disabled readonly checked/>
                                                        <label>PORTAL</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <h6 class="m-1 not_heading">Class Feedback</h6>
                                        <div class="col-12 not_choice">
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input class="n_type_class_end_date_update" type="checkbox" value="email" disabled readonly checked/>
                                                        <label for="nn13">EMAIL</label>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input class="n_type_class_end_date_update" type="checkbox" value="sms" disabled readonly checked/>
                                                        <label for="nn12">SMS</label>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input type="checkbox" disabled readonly checked/>
                                                        <label>PORTAL</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <h6 class="m-1 not_heading">Class Schedule Update</h6>
                                        <div class="col-12 not_choice">
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input class="n_type_class_end_date_update" type="checkbox" value="email" disabled readonly checked/>
                                                        <label for="nn13">EMAIL</label>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input class="n_type_class_end_date_update" type="checkbox" value="sms" disabled readonly checked/>
                                                        <label for="nn12">SMS</label>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input type="checkbox" disabled readonly checked/>
                                                        <label>PORTAL</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <h6 class="m-1 not_heading">Session Cancelled</h6>
                                        <div class="col-12 not_choice">
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input class="n_type_class_end_date_update" type="checkbox" value="email" disabled readonly checked/>
                                                        <label for="nn13">EMAIL</label>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input class="n_type_class_end_date_update" type="checkbox" value="sms" disabled readonly checked/>
                                                        <label for="nn12">SMS</label>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input type="checkbox" disabled readonly checked/>
                                                        <label>PORTAL</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <h6 class="m-1 not_heading">Makeup Scheduled</h6>
                                        <div class="col-12 not_choice">
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input class="n_type_class_end_date_update" type="checkbox" value="email" disabled readonly checked/>
                                                        <label for="nn13">EMAIL</label>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input class="n_type_class_end_date_update" type="checkbox" value="sms" disabled readonly checked/>
                                                        <label for="nn12">SMS</label>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input type="checkbox" disabled readonly checked/>
                                                        <label>PORTAL</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <h6 class="m-1 not_heading">Class No Show Absence</h6>
                                        <div class="col-12 not_choice">
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input class="n_type_class_end_date_update" type="checkbox" value="email" disabled readonly checked/>
                                                        <label for="nn13">EMAIL</label>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input class="n_type_class_end_date_update" type="checkbox" value="sms" disabled readonly checked/>
                                                        <label for="nn12">SMS</label>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input type="checkbox" disabled readonly checked/>
                                                        <label>PORTAL</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <h6 class="m-1 not_heading">Class Hold</h6>
                                        <div class="col-12 not_choice">
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input class="n_type_class_end_date_update" type="checkbox" value="email" disabled readonly checked/>
                                                        <label for="nn13">EMAIL</label>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input class="n_type_class_end_date_update" type="checkbox" value="sms" disabled readonly checked/>
                                                        <label for="nn12">SMS</label>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input type="checkbox" disabled readonly checked/>
                                                        <label>PORTAL</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <h6 class="m-1 not_heading">Class Hold Reactivation Reminder</h6>
                                        <div class="col-12 not_choice">
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input class="n_type_class_end_date_update" type="checkbox"  value="email" disabled readonly checked/>
                                                        <label for="nn13">EMAIL</label>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input class="n_type_class_end_date_update" type="checkbox" value="sms" disabled readonly checked/>
                                                        <label for="nn12">SMS</label>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input type="checkbox" disabled readonly checked/>
                                                        <label>PORTAL</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <h6 class="m-1 not_heading">Class Suspension Notice</h6>

                                        <div class="col-12 not_choice">
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input class="n_type_class_end_date_update" type="checkbox" value="email" disabled readonly checked/>
                                                        <label for="nn13">EMAIL</label>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input class="n_type_class_end_date_update" type="checkbox" value="sms" disabled readonly checked/>
                                                        <label for="nn12">SMS</label>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input type="checkbox" disabled readonly checked/>
                                                        <label>PORTAL</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <h6 class="m-1 not_heading">Class Reactivation</h6>
                                        <div class="col-12 not_choice">
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input class="n_type_class_end_date_update" type="checkbox" value="email" disabled readonly checked/>
                                                        <label for="nn13">EMAIL</label>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input class="n_type_class_end_date_update" type="checkbox" value="sms" disabled readonly checked/>
                                                        <label for="nn12">SMS</label>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input type="checkbox" disabled readonly checked/>
                                                        <label>PORTAL</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <h6 class="m-1 not_heading">Class Cancellation</h6>
                                        <div class="col-12 not_choice">
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input class="n_type_class_end_date_update" type="checkbox" value="email" disabled readonly checked/>
                                                        <label for="nn13">EMAIL</label>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input class="n_type_class_end_date_update" type="checkbox" value="sms" disabled readonly checked/>
                                                        <label for="nn12">SMS</label>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input type="checkbox" disabled readonly checked/>
                                                        <label>PORTAL</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <h6 class="m-1 not_heading">Class End Date Update</h6>
                                        <div class="col-12 not_choice">
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input class="n_type_class_end_date_update" type="checkbox" value="email" disabled readonly checked/>
                                                        <label for="nn13">EMAIL</label>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input class="n_type_class_end_date_update" type="checkbox" value="sms" disabled readonly checked/>
                                                        <label for="nn12">SMS</label>
                                                    </div>
                                                </li>
                                                <li class="d-inline-block mr-2 mb-1">
                                                    <div class="checkbox checkbox-primary checkbox-glow">
                                                        <input type="checkbox" disabled readonly checked/>
                                                        <label>PORTAL</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                            <button type="button" class="save-change btn btn-primary glow mr-sm-1 mb-1">Save
                                                changes</button>
                                            <!-- <button type="reset" class="btn btn-light mb-1">Cancel</button> -->
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
</section>
