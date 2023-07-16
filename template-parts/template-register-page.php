<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<style>
 .load_data #loader{
      width: 20px!important;
      height: 20px!important;
      border-top:3px solid #dbe0e3!important;
    }
   .site-content{
   background: var(--bb-body-background-color);
   }
   .tab-content{
   background: #fff;
   padding: 15px;
   min-height: 80vh;
   }
   .registration_page{
       margin: 20px auto!important;
       min-height: 80vh!important;
       margin-top: 6rem!important;
   }
   .registration_page .nav-pills:not(.nav-fill):not(.nav-justified) .nav-link {
   display: flex;
   justify-content: start;
   align-items: center;

   flex-direction: row;
   white-space: nowrap;
   background: #fff;
   border-radius: 0;
   color: var(--main-color);
   padding: 15px!important;
   margin-bottom:0;
   transition: 200ms linear;
   }
   .registration_page .nav-pills:not(.nav-fill):not(.nav-justified) .nav-link.active{
   border-top: 3px solid var(--blue);
   color:var(--blue);
   box-shadow: none;
   }
   .registration_page .nav-pills:not(.nav-fill):not(.nav-justified) .nav-link:hover{
   transform: translateX(3px);
   }
   .registration_page .nav-pills:not(.nav-fill):not(.nav-justified) .nav-link .material-icons,
   .registration_page .nav-pills:not(.nav-fill):not(.nav-justified) .nav-link.active .material-icons{
   margin-right: 5px;
   font-size: 1.2rem;
   color: var(--main-color);
   }
   .registration_page .nav-pills:not(.nav-fill):not(.nav-justified) .nav-link.active .material-icons{
   color:var(--blue)!important;
   }
   .registration_page h2{
   border-bottom: 1px solid #eee;
   padding-bottom: 15px;
   margin-bottom: 15px;
   font-size: var(--fs-400);
   font-weight: 600;
   color: var(--main-color);
   display: none;
   }
   .input-container label{
   justify-content: start;
   align-items: center;
   display: flex;
   white-space: nowrap;
   font-size: var(--fs-200)!important;
   color: var(--main-color)!important;
   font-weight: 500!important;
   line-height: 1;
   text-transform: none!important;
   }
   .registration_page label .material-icons{
   background: var(--blue);
   font-size: .75rem!important;
   width: 17px;
   height: 17px;
   display: inline-flex;
   justify-content: center;
   align-items: center;
   border-radius: 50%;
   margin-right: 5px;
   color: #fff;
   opacity: .8;
   transition: 200ms linear;
   cursor: default;
   }
   .registration_page input ,.registration_page select,.registration_page span.select2-selection.select2-selection--single,
   .registration_page .chosen-container-single .chosen-single{
   height: var(--input-height)!important;
   font-size: var(--fs-200)!important;
   padding: 0px 15px!important;
   border: 1px solid #eee!important;
   border-radius: 20px;
   width: 100%!important;
   margin-bottom: 15px;
   background: transparent!important;
   }
   .registration_page .chosen-container.col-md-12{
      border:0!important;
      padding:0!important;
   }
   .select2-container--default .select2-selection--single .select2-selection__arrow{
   top: 5px;
   right: 10px;
   }
   .select2-container{
   width: 100%!important;
   }
   button[type="submit"]{
   border: 0;
   border-radius: 0;
   background: var(--blue);
   transition: 200ms linear;
   width: 100px;
   }
   button[type="submit"]:hover{
   transform: translateX(3px);
   background: var(--blue);
   }
   .flex-row.nav-pills{
   display: flex;
   justify-content: center;
   align-items: center;
   flex-wrap: nowrap;
   background: #fff;
   margin-bottom: 10px!important;
   box-shadow: 0 0 10px rgb(0 0 0 / 10%);
   }
   .registration_page .nav-pills:not(.nav-fill):not(.nav-justified) .nav-link.active .text_tab{
      display: flex!important;
      color: var(--blue)!important;
   }
   .registration_page .chosen-container .chosen-drop{
      border-color: #eee!important;
   }
   .sssssss{
      display: none;
   }
   @media screen and (max-width: 997px){
   .registration_page{
   margin: 20px auto;
   }


   }
   @media screen and (max-width: 450px){
   .registration_page .nav-pills:not(.nav-fill):not(.nav-justified) .nav-link .text_tab,.registration_page .nav-pills:not(.nav-fill):not(.nav-justified) .nav-link.active .text_tab{
      display: none!important;
   }
   .registration_page .nav-pills:not(.nav-fill):not(.nav-justified) .nav-link {
    justify-content: center;
    align-items: center;}
    .registration_page h2{
      display: flex!important;
    }
   }
</style>
<!-- start registration page tabs -->

<div class="container mt-5 registration_page">
   <div class="">
      <!-- nav tabs -->
      <div class="nav flex-row nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
         <button class="nav-link active" id="v-pills-new_student-tab" data-bs-toggle="pill" data-bs-target="#v-pills-new_student" type="button" role="tab" aria-controls="v-pills-new_student" aria-selected="true">
         <span class="material-icons" >person_add_alt</span>
         <span class="text_tab">Add New Member</span>

         </button>
         <button class="nav-link" id="v-pills-link_student-tab" data-bs-toggle="pill" data-bs-target="#v-pills-link_student" type="button" role="tab" aria-controls="v-pills-link_student" aria-selected="false">
         <span class="material-icons" >link</span>
         <span class="text_tab">Link Member to Account</span>

         </button>
      </div>
      <!-- end of nav tabs -->
      <!-- tabs container -->
      <div class="tab-content" id="v-pills-tabContent">
         <!-- add student tab -->
         <div class="tab-pane fade show active" id="v-pills-new_student" role="tabpanel" aria-labelledby="v-pills-new_student-tab">
            <h2>Add New Member</h2>
            <form class="validate-form" action="" method="post">
               <!-- select parent -->
               <div style="display:none;" class="ajax_image_section learner_loader">
                 <div class="ajaxloader"></div>
               </div>
               <div class="input-container">
                  <div><label> <span class="material-icons">family_restroom</span>Parent: *</label></div>
                  <div class="fn_container">
                     <input list="users" type="text" class="fn_input" placeholder="Search by first or lastname at least 3 letters"  data-role="parent"/>
                     <div class="load_data">

                     </div>
                  </div>
               </div>
               <!-- select parent -->
               <!-- name -->
               <div class="input-container">
                  <div><label><span class="material-icons">person</span> Name:*</label></div>
                  <div><input name="FirstName" class="ff_name" required type="text" placeholder="FirstName" /> <input name="LastName" required type="text" placeholder="LastName" /></div>
               </div>
               <!-- name -->
               <!-- email -->
               <div class="input-container">
                  <div><label><span class="material-icons">info</span> Additional info: </label>
                  </div>
                  <input name="primary_phone" type="text" placeholder="Phone (optional) "/>
                  <input name="secondary_email" type="text" placeholder="Email (optional) "/>
                  <select name="relation">
                      <option selected="true" disabled="disabled">Choose Relationship</option>
                      <option value="Son">Son</option>
                      <option value="Daughter">Daughter</option>
                      <option value="Husband ">Husband </option>
                      <option value="Wife ">Wife </option>
                      <option value="Brother">Brother</option>
                      <option value="Sister">Sister</option>
                      <option value="Father">Father</option>
                      <option value="Mother">Mother</option>
                      <option value="Grandfather ">Grandfather </option>
                      <option value="Grandmother">Grandmother</option>
                      <option value="Grandchild">Grandchild</option>
                  </select>
                  <div><label><span class="material-icons">email</span>Email:</label><input name="u_email" type="text" placeholder="email" value='std<?php echo rand(11111111111111,99999999999999);?>@muslimeto.com' readonly disabled/></div>
                  <label><span class="material-icons">key</span>Password:</label><input type="text" name="u_pass" value="<?php echo rand(1111111,999999); ?>" readonly disabled>
               </div>
               <!-- email -->
               <!-- gender -->
               <div class="input-container">
                  <div><label><span class="material-icons">wc</span> Gender: *</label></div>
                  <div>
                     <select name="gender" required="required">
                        <option>Male</option>
                        <option>Female</option>
                     </select>
                  </div>
               </div>
               <!-- gender -->
               <!-- date of birth -->
               <div class="input-container">
                  <div><label> <span class="material-icons">calendar_today</span>Date of Birth:</label></div>
                  <div><input name="birthday" type="date" /></div>
               </div>
               <!-- date of birth -->
               <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                  <button type="button" name="add_new_std" value="add" class="btn add_child_btn btn-primary glow mr-sm-1 mb-1">Add</button>
               </div>
            </form>
         </div>
         <!-- end student tab -->
         <div class="tab-pane fade" id="v-pills-link_student" role="tabpanel" aria-labelledby="v-pills-link_student-tab">
            <h2>Link Member to Account.</h2>
            <form class="validate-form" action="" method="post">
              <div style="display:none;" class="ajax_image_section learner_link">
                <div class="ajaxloader"></div>
              </div>
               <div class="row">
                  <div class="col-12">
                     <div class="input-container">
                        <label class="col-md-12">Learners</label>
                        <div class="fn_container">
                           <input list="users" type="text" class="fn_input_ch learner_id" placeholder="write first name for learner" data-role="tutoring_student"/>
                           <div class="load_data">
                           </div>
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="input-container">
                        <label class="col-md-12">Accounts</label>
                        <div class="fn_container">
                           <input list="users" type="text" class="fn_input" data-role="parent" placeholder="write first name for parent"/>
                           <div class="load_data">

                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                     <button type="button" name="add_std" value="add" class="btn learner_link_btn btn-primary glow mr-sm-1 mb-1">Link</button>
                  </div>
               </div>
            </form>
         </div>
         <!-- end link  tab-->
      </div>
      <!-- end of tabs container -->
   </div>
</div>
<!-- end registration page tabs -->

<script>
                       (function($){

                         $( document ).ready(function() {




                               var inputElm = document.querySelector('.fn_input');
                                inputElm.addEventListener('input', onInput);
                                var $inp = $(inputElm);
                                function onInput(){
                                  clearTimeout(inputElm._timer);
                                  inputElm._timer = setTimeout(()=>{
                                    update(this.value);
                                  }, 1200);
                                }

                                var inputElm2 = document.querySelector('.fn_input_ch');
                                 inputElm2.addEventListener('input', onInput2);
                                 var $inp2 = $(inputElm2);
                                 function onInput2(){
                                   clearTimeout(inputElm2._timer);
                                   inputElm2._timer = setTimeout(()=>{
                                     update2(this.value);
                                   }, 1200);
                                 }

                                 function update2(){
                                    if( inputElm2.value.length >= 3 ) {
                                      $inp2.next('.load_data').html('<div id="loader"></div>');
                                      $.post('/wp-admin/admin-ajax.php', {
                                          action: 'get_user_by_fn',
                                          first_name: inputElm2.value,
                                          role: inputElm2.getAttribute('data-role'),
                                      }, function (res){
                                           $inp2.next('.load_data').html(res);
                                           $('#loader').hide()
                                      })

                                  };
                                 }
                                function update(){
                                   if( inputElm.value.length >= 3 ) {
                                     $inp.next('.load_data').html('<div id="loader"></div>');
                                     $.post('/wp-admin/admin-ajax.php', {
                                         action: 'get_user_by_fn',
                                         first_name: inputElm.value,
                                         role: inputElm.getAttribute('data-role'),
                                     }, function (res){
                                          $inp.next('.load_data').html(res);
                                          $('#loader').hide()
                                     })

                                 };
                                }




                $('.add_child_btn').on('click', function(e){
                    // e.preventdefault();
                    $('.ajax_image_section.learner_loader').show();
                    const FirstName = $('input[name="FirstName"]').val();
                    const LastName = $('input[name="LastName"]').val();
                    const u_email = $('input[name="u_email"]').val();
                    const prnt_id = $('select[name="prnt_id"]').val();
                    const birthday = $('input[name="birthday"]').val();
                    const primary_phone = $('input[name="primary_phone"]').val();
                    const secondary_email = $('input[name="secondary_email"]').val();
                    const u_pass = $('input[name="u_pass"]').val();
                    const relation = $('select[name="relation"]').val();
                    const gender = $('select[name="gender"]').val();

                    $.post('/wp-admin/admin-ajax.php', {
                        action: 'add_new_learner_for_prnt',
                        FirstName: FirstName ,
                        LastName:  LastName ,
                        prnt_id: prnt_id ,
                        u_email:  u_email ,
                        birthday: birthday ,
                        primary_phone: primary_phone ,
                        secondary_email:  secondary_email ,
                        u_pass:  u_pass ,
                        relation:  relation ,
                        gender:  gender
                    }, function (res){
                         //console.log(res);
                         if(res.success){
                         $.showInfo('New learner added successfully');
                         }else{
                           $.showError('Something went wrong!');
                         }
                         $('.ajax_image_section.learner_loader').hide();
                         window.location.reload();
                    })
                });

                $(".ff_name").on('input',function(e){
                     $('.learn_exist').remove();
                     $(".add_child_btn").removeAttr('disabled');
                     var val = $(this).val().trim();
                     const prnt_id = $('select[name="prnt_id"]').val();
                     val = val.replace(/\s+/g, '');
                     if(val.length >= 3) {
                       $.post('/wp-admin/admin-ajax.php', {
                           action: 'check_first_name',
                           first_name:  val ,
                           prnt_id:prnt_id,
                       }, function (res){
                               if(res){
                               $(".ff_name").after('<p class="learn_exist" role="alert" style="font-size: 12px;color:red">Learner already exist!</p>') ;
                               $(".add_child_btn").attr('disabled','disabled');
                               }
                       })
                     }
                });

                $('.learner_link_btn').on('click', function(e){
                    $('.ajax_image_section.learner_link').show();
                    $.post('/wp-admin/admin-ajax.php', {
                        action: 'link_learner_to_prnt',
                        prnt_id:  $('select[name="prnt_id"]').val() ,
                        learner_id:  $('select[name="learner_id"]').val() ,
                    }, function (res){
                            //console.log(res);
                            if(res){
                            $.showInfo('Learner linked to parent successfully!');
                            }else{
                              $.showError('Something went wrong!');
                            }
                            $('.ajax_image_section.learner_link').hide();
                            window.location.reload();
                    })
                });
                });
         }(jQuery));
</script>
