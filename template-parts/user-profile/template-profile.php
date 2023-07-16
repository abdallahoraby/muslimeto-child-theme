<?php

$user = wp_get_current_user();
$user_id = get_current_user_id();
$staff =  array('administrator','teamleader');
if(in_array('parent',$user->roles)){
    $rol='parent';
    //$tab_w = "25%";
}elseif (in_array('tutoring-student',$user->roles)) {
    $rol='student';
    //$tab_w = "50%";
}elseif ((in_array('teacher',$user->roles))) {
    $rol='teacher';
    //$tab_w = "20%";
}else {
    $rol='staff';
    //$tab_w = "20%";
}

?>


<!-- account setting page start -->
<?php
$wp_user_id = get_current_user_id();
$user_info = get_userdata( $wp_user_id );
 ?>
<section id="page-account-settings">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <!-- left menu section -->
                <div class="col-md-12  pills sub-navs">
                    <ul class="nav nav-pills flex-row sub-nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link   align-items-center active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                <span class="material-icons">manage_accounts</span>
                                <span>Information</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link align-items-center" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                <span class="material-icons">gpp_good</span>
                                <span>Change Password</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link align-items-center" id="account-pill-notifications" data-toggle="pill" href="#account-vertical-notifications" aria-expanded="false">
                                <span class="material-icons">notifications</span>
                                <span>Notifications</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- right content section -->
                <div class="col-md-12 bg-white">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content p-0">

                                <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                   <h5 class="nontfications-log-tab-title mb-2"><span class="material-icons">manage_accounts</span>Information</h5>
                                   <div class="account-personal_info">
                                    <form action="">
                                      <div style="display:none;" class="ajax_image_section p_form"> <div class="ajaxloader"></div> </div>
                                                    <!-- name feild set -->
                                                    <div id="" class="acc_info_name_container row">
                                                        <legend class="acc_info_legend col-md-12">
                                                            <span class="material-icons">person</span>Name
                                                        </legend>
                                                        <div class="acc_info_name_input_container row" id="">
                                                                <!-- select -->
                                                                <div id="" class="name_select col-md-4 col-sm-12">
                                                                    <select name="pre_name" id="" aria-required="false" class="acc_info_input">
                                                                         <option value=""></option>
                                                                         <option value="Br.">Br.</option>
                                                                         <option value="Sr.">Sr.</option>
                                                                         <option value="Mr.">Mr.</option>
                                                                         <option value="Mrs.">Mrs.</option>
                                                                         <option value="Ms.">Ms.</option>
                                                                         <option value="Dr.">Dr.</option>
                                                                    </select>
                                                                </div>
                                                                <!-- first name -->
                                                                <div id="" class="name_first col-md-4 col-sm-12">
                                                                    <input type="text" name="f_name" id="" value="<?php echo $user->first_name ?>" aria-required="false" class="acc_info_input" placeholder="first name">
                                                                </div>
                                                                <!-- last name -->
                                                                <div id="" class="name_last col-md-4 col-sm-12">
                                                                    <input type="text" name="l_name" id="" value="<?php echo $user->last_name ?>" aria-required="false" class="acc_info_input" placeholder="last name">
                                                                </div>
                                                       </div>
                                                    </div>
                                                    <!-- end of name -->
                                                    <!-- email -->
                                                    <div class="row acc_info_email_container">
                                                           <!--primary email  -->
                                                            <div id="" class="col-md-6 col-sm-12">
                                                                <label class="acc_info_legend" for="">
                                                                    <span class="material-icons">email</span>
                                                                    Primary Email
                                                                    <span class=" ">
                                                                        <span class="star_required">*</span>
                                                                    </span>
                                                                </label>
                                                                <div class="">
                                                                    <input name="u_email"  type="email" value="<?php echo $user_info->user_email ?>" class="acc_info_input" aria-required="true" placeholder="Primary Email">
                                                                </div>
                                                            </div>
                                                            <!-- seconadry email -->
                                                            <div id="" class="col-md-6 col-sm-12">
                                                                <label class="acc_info_legend" for="">
                                                                    <span class="material-icons">email</span>
                                                                    Secondary Email

                                                                </label>
                                                                <div class="">
                                                                    <input name="secondary_email" id="" type="email" value="<?php echo get_user_meta($wp_user_id,'secondary_email',true) ?>" class="acc_info_input" aria-required="true" placeholder="secondary_email">
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <!-- end of email -->
                                                     <!-- phone -->
                                                     <div class="row acc_info_phone_container">
                                                           <!--primaryphone  -->
                                                            <div id="" class="col-md-6 col-sm-12">
                                                                <label class="acc_info_legend" for="">
                                                                    <span class="material-icons">call</span>
                                                                    Mobile
                                                                    <span class=" ">
                                                                        <span class="star_required">*</span>
                                                                    </span>
                                                                </label>
                                                                <div class="">
                                                                    <input name="primary_phone" id="" type="tel" value="<?php echo get_user_meta($wp_user_id,'primary_phone',true) ?>" class="acc_info_input" aria-required="true" placeholder="primary_phone">
                                                                </div>
                                                            </div>
                                                            <!-- seconadry phone -->
                                                            <div id="" class="col-md-6 col-sm-12">
                                                                <label class="acc_info_legend" for="">
                                                                    <span class="material-icons">call</span>
                                                                    Secondary Phone

                                                                </label>
                                                                <div class="">
                                                                    <input name="secondary_phone" id="" type="email" value="<?php echo get_user_meta($wp_user_id,'secondary_phone',true) ?>" class="acc_info_input" aria-required="true" placeholder="Secondary Phone">
                                                                </div>
                                                            </div>
                                                    </div>



                                                    <!-- phone -->
                                                    <div class="row acc_info_phone_container">
                                                          <!--primaryphone  -->
                                                           <div id="" class="col-md-6 col-sm-12">

                                                               <div class="">
                                                                   <input name="birthday" id="" type="tel" value="<?php echo get_user_meta($wp_user_id,'birthday',true) ?>" class="acc_info_input" aria-required="true" placeholder="birthday">
                                                               </div>
                                                           </div>
                                                           <!-- seconadry phone -->
                                                           <div id="" class="col-md-6 col-sm-12">


                                                               <div class="">
                                                                   <input name="gender" id="" type="email" value="<?php echo get_user_meta($wp_user_id,'gender',true) ?>" class="acc_info_input" aria-required="true" placeholder="gender">
                                                               </div>
                                                           </div>
                                                   </div>
                                                    <!-- end of phone -->
                                                     <!-- adress -->
                                                     <div class="row acc_info_phone_container">
                                                           <!--Street address  -->
                                                            <div id="" class="col-md-12 col-sm-12">
                                                                <label class="acc_info_legend" for="">
                                                                    <span class="material-icons">place</span>
                                                                    Address

                                                                </label>
                                                                <div class="">
                                                                    <input name="street_address_1" id="" type="text" value="<?php echo get_user_meta($wp_user_id,'street_address_1',true) ?>" class="acc_info_input" aria-required="true" placeholder="street_address_1">
                                                                </div>
                                                            </div>
                                                            <!-- city -->
                                                            <div id="" class="col-md-12">

                                                                <div class="">
                                                                    <input name="street_address_2" id="" type="text" value="<?php echo get_user_meta($wp_user_id,'street_address_2',true) ?>" class="acc_info_input" aria-required="true" placeholder="street_address_2">
                                                                </div>
                                                            </div>
                                                             <!-- city -->
                                                             <div id="" class="col-md-6 col-sm-12">

                                                                <div class="">
                                                                    <input name="city" id="" type="text" value="<?php echo get_user_meta($wp_user_id,'city',true) ?>" class="acc_info_input" aria-required="true" placeholder="city">
                                                                </div>
                                                            </div>
                                                             <!--state-->
                                                             <div id="" class="col-md-6 col-sm-12">

                                                                <div class="">
                                                                    <input name="state" id="" type="text" value="<?php echo get_user_meta($wp_user_id,'state',true) ?>" class="acc_info_input" aria-required="true" placeholder="state">
                                                                </div>
                                                            </div>
                                                             <!-- post code -->
                                                             <div id="" class="col-md-6 col-sm-12">

                                                                <div class="">
                                                                    <input name="postal_code" id="" type="text" value="<?php echo get_user_meta($wp_user_id,'postal_code',true) ?>" class="acc_info_input" aria-required="true" placeholder="postal_code">
                                                                </div>
                                                            </div>
                                                            <!-- country -->
                                                            <div id="" class="col-md-6 col-sm-12">

                                                                <div class="">
                                                                    <select name="country" id="input_14_11_6" aria-required="false" class="acc_info_input">
                                                                    <option value="<?php echo get_user_meta($wp_user_id,'country',true) ?>" selected="selected"><?php echo get_user_meta($wp_user_id,'country',true) ?></option>
                                                                    <option value="Egypt" >Egypt</option>
                                                                    <option value="us" >us</option>
                                                                </select>
                                                                </div>
                                                            </div>

                                                    </div>
                                                    <!-- end of adress -->
                                                    <div class="row acc_info_text">
                                                        <div class="col-md-12">
                                                                    <strong>Spouse Information</strong>
                                                                    <p>
                                                                         Please add your spouse's details to allow her/him to be able to request changes to your account.
                                                                    </p>
                                                        </div>
                                                        <div class="row">
                                                                    <!-- title -->
                                                                    <div id="" class="col-md-3 col-sm-12">
                                                                        <label class="acc_info_legend" for="">
                                                                            <span class="material-icons">how_to_reg</span>Title
                                                                        </label>
                                                                                <div class="">
                                                                                    <select name="spouse_title"  class="acc_info_input" placeholder="">
                                                                                      <option value="<?php echo get_user_meta($wp_user_id,'spouse_title',true) ?>" selected><?php echo get_user_meta($wp_user_id,'spouse_title',true) ?></option>
                                                                                        <option value="Br.">Br.</option>
                                                                                        <option value="Sr.">Sr.</option>
                                                                                        <option value="Mr.">Mr.</option>
                                                                                        <option value="Mrs.">Mrs.</option>
                                                                                        <option value="Ms.">Ms.</option>
                                                                                        <option value="Dr.">Dr.</option>
                                                                                </select>
                                                                                </div>
                                                                    </div>
                                                                    <!-- name -->
                                                                    <div class="col-md-3 col-sm-12">
                                                                            <label class="acc_info_legend" for="">
                                                                                <span class="material-icons">person</span>Name
                                                                            </label>
                                                                            <div class="">
                                                                                <input name="spouse_name"  type="text" value="<?php echo get_user_meta($wp_user_id,'spouse_name',true) ?>" class="acc_info_input" placeholder="spouse name">
                                                                            </div>
                                                                    </div>
                                                                      <!-- phone -->
                                                                      <div class="col-md-3 col-sm-12">
                                                                            <label class="acc_info_legend" for="">
                                                                                <span class="material-icons">call</span>Phone
                                                                            </label>
                                                                            <div class="">
                                                                                <input name="spouse_phone" id="" type="text" value="<?php echo get_user_meta($wp_user_id,'spouse_phone',true) ?>" class="acc_info_input" placeholder="spouse phone">
                                                                            </div>
                                                                    </div>
                                                                      <!-- Email -->
                                                                      <div class="col-md-3 col-sm-12">
                                                                            <label class="acc_info_legend" for="">
                                                                                <span class="material-icons">email</span>Email
                                                                            </label>
                                                                            <div class="">
                                                                                <input name="spouse_email" id="" type="email" value="<?php echo get_user_meta($wp_user_id,'spouse_email',true) ?>" class="acc_info_input" placeholder="spouse email">
                                                                            </div>
                                                                    </div>
                                                        </div>
                                                    </div>
                                                                    <!-- submit -->
                                                                    <div class="row ">
                                                                        <input type="button" id="gform_submit_button_14" class="acc_info_btn" value="Update Account Details" >
                                                                    </div>
                                             </form>
                                   </div>
                                </div>
                               <!-- end of account info ===>profile info<===== -->

                                <!-- change password tab-->
                                <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                <h5 class="nontfications-log-tab-title mb-2"><span class="material-icons">gpp_good</span>Change Password</h5>
                                  <form action="" method="post">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label><span class="material-icons">lock</span>Old Password</label>
                                                        <input type="password" class="form-control old_pass" placeholder="Old Password" name="old_pass" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label><span class="material-icons">lock</span>New Password</label>
                                                        <input type="password" class="form-control new_pass" placeholder="New Password" id="account-new-password" name="new_pass" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end" style="top: 46px;">
                                                <input type="hidden" name="ch_u_pass" value="1">

                                                <button type="reset" class="btn cancel mb-1 col-md-3 mr-1 cancel_pass change_pass_btn">Cancel</button>
                                                <button type="button" class="btn btn-primary glow col-md-3  mb-1 save_n_pass  change_pass_btn">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!-- notfication tab -->
                                <div class="tab-pane fade" id="account-vertical-notifications" role="tabpanel" aria-labelledby="account-pill-notifications" aria-expanded="false">
                                    <div class="row">

                                        <!-- notfication nav -->
                                        <div class="col-12 notifications_nav">
                                               <div>
                                                <!--  -->
                                               <a href="#general" data-bs-toggle="tooltip" data-bs-placement="bottom" title="General">
                                                   <span class="material-icons">widgets</span>
                                                </a>
                                                <!--  -->
                                               <a href="#learning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Learning">
                                                   <span class="material-icons">local_library</span>
                                                </a>
                                                <!--  -->
                                               <a href="#class_management" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Class Managment">
                                                   <span class="material-icons">cast_for_education</span>
                                                </a>
                                               </div>
                                        </div>
                                        <!-- General -->
                                        <div id="general">
                                        <h4 class="g_noti_head" ><span class="material-icons">widgets</span> General</h4>
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
                                        </div>


                                        <!-- learning -->
                                    <div id="learning">
                                        <br>
                                        <hr>
                                        <h4 class="g_noti_head" ><span class="material-icons">local_library</span>Learning</h4>
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

                                        <h6 class="m-1 not_heading">New Quiz</h6>
                                        <div class="col-12 not_choice">
                                            <ul class="list-unstyled mb-0">
                                                <?php
                                                $values = get_field('new_quiz','user_'.$user_id);
                                                $field =  get_field_object('new_quiz','user_'.$user_id);
                                                $choices = $field['choices'];if(!empty($choices)):
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
                                    </div>


                                        <!-- class managment -->
                                     <div id="class_management">
                                        <br>
                                        <hr>
                                        <h4 class="g_noti_head" ><span class="material-icons">cast_for_education</span>Class Management</h4>
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

                                    </div>


                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                            <button type="button" class="save-change btn btn-primary glow mr-sm-1 mb-1 px-3">Save
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


<script type="text/javascript">
    (function($) {

        $('.acc_info_btn').on('click', function(e){
               e.preventDefault();
               $('.ajax_image_section.p_form').show();
               $.post('/wp-admin/admin-ajax.php', {
                     action: 'muslimito_update_user_profile',
                     f_name:  $('input[name="f_name"]').val() ,
                     u_email: $('input[name="u_email"]').val() ,
                     l_name:  $('input[name="l_name"]').val() ,
                     primary_phone: $('input[name="primary_phone"]').val() ,
                     secondary_phone: $('input[name="secondary_phone"]').val() ,
                     secondary_email: $('input[name="secondary_email"]').val() ,
                     street_address_1:  $('input[name="street_address_1"]').val() ,
                     street_address_2:  $('input[name="street_address_2"]').val() ,
                     city:  $('input[name="city"]').val() ,
                     state:  $('input[name="state"]').val(),
                     country:  $('select[name="country"]').val(),
                     postal_code:  $('input[name="postal_code"]').val(),
                     birthday:  $('input[name="birthday"]').val(),
                     gender:  $('input[name="gender"]').val(),
                     relation:  $('input[name="relation"]').val(),
                     spouse_title:  $('select[name="spouse_title"]').val(),
                     spouse_name:  $('input[name="spouse_name"]').val(),
                     spouse_phone:  $('input[name="spouse_phone"]').val(),
                     spouse_email:  $('input[name="spouse_email"]').val(),
                     spouse_relation:  $('input[name="spouse_relation"]').val(),
                 }, function (response){
                 //  alert(response);
                   if(response.success){
                     $.showInfo(response.data);
                   }else{
                     $.showError('Something went wrong !');
                   }
                    console.log(response);
                   $('.ajax_image_section.p_form').hide();
                 })
         });


    }(jQuery));



    //  replace required word by *
    // function replaceRequired(){
    //     let requiredText = document.querySelectorAll('.gfield_required_text');

    //     for(let i = 0;i<requiredText.length;i++){
    //         requiredText[i].innerHTML=requiredText[i].innerHTML.replace(/\(REQUIRED\)/gi,"*");
    //     }
    // }
    // replaceRequired();
    // icons to label
    // jQuery('.ginput_container_name').parent().find('legend').prepend('<span class="material-icons">person</span>');
    // jQuery('.ginput_container_email').parent().find('label').prepend('<span class="material-icons">email</span>');
    // jQuery('.ginput_container_phone').parent().find('label').prepend('<span class="material-icons">call</span>');
    // jQuery('.ginput_container_address').parent().find('legend').prepend('<span class="material-icons">place</span>');
    // jQuery('.ginput_container_select').parent().find('label').prepend('<span class="material-icons">how_to_reg</span>');
    // jQuery('.ginput_container_text').parent().find('label').prepend('<span class="material-icons">person</span>');
</script>
