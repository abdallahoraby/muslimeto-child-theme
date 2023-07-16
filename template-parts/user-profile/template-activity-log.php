<?php

$user = wp_get_current_user();
// $staff =  array('administrator','teamleader');
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
                    <div class="col-md-12 sub-navs">
                        <ul class="nav nav-pills flex-row sub-nav-tabs">

                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center active"  data-toggle="pill" href="notfications-log">
                                    <!-- <i class="fa fa-award"></i> -->
                                    <span class="material-icons">task_alt</span>
                                    <span>Notifications Log </span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="col-md-12 bg-white">
                        <div class="tab-content p-0">
                            <div role="tabpanel" class="tab-pane active" aria-labelledby="notfications-log">
                                <div class="row" >
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="nontfications-log-tab-title"><span class="material-icons">notifications</span>Notifications log</h5>
                                            <!-- notfication filter -->
                                            <div class="notfications-log-filter">
                                            <h6>Filter</h6>
                                            <ul>
                                                     <li>
                                                        <label class="notfications-log-filter-label" for="All" data-balloon-pos="down" data-balloon="All">
                                                            <input type="radio" name="notfications-log-radio-input"  value="All">
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="notfications-log-filter-label" for="General" data-balloon-pos="down" data-balloon="Announcements">
                                                            <input type="radio" name="notfications-log-radio-input"  value="General">
                                                        </label>
                                                    </li>
                                                    
                                                    <li>
                                                       <label class="notfications-log-filter-label" for="Learning" data-balloon-pos="down" data-balloon="Learning Programs ">
                                                            <input type="radio" name="notfications-log-radio-input"  value="Learning">
                                                        </label>
                                                    </li>
                                                    <li>
                                                       <label class="notfications-log-filter-label" for="ClassManagment" data-balloon-pos="down" data-balloon="Class Activity">
                                                            <input type="radio" name="notfications-log-radio-input"  value="ClassManagment">
                                                       </label>
                                                    </li>
                                                    <li>
                                                       <label class="notfications-log-filter-label" for="Billing" data-balloon-pos="down" data-balloon="Billing Notfications">
                                                            <input type="radio" name="notfications-log-radio-input"  value="Billing">
                                                        </label>
                                                    </li>
                                                    <li>
                                                       <label class="notfications-log-filter-label" for="Support" data-balloon-pos="down" data-balloon="Support">
                                                            <input type="radio" name="notfications-log-radio-input"  value="Support">
                                                        </label>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                            <div class="activity-log-container">

                                                <ul>
                                                    <!-- notfication item -->
                                                    <li class="notfications-log-general-actegory General notfications-log-item All">
                                                        <span class="material-icons notification-log-category-icon">task_alt</span>
                                                        <div class="activity-log-notfication-content">
                                                            <div class="activity-log-notfication-details">
                                                                <h5>
                                                                    <span>Example of Public Notfication</span>
                                                                    <span class="activity-log-notfication-time">
                                                                            <span>20/04/2022</span>
                                                                            <span>(02:00 AM)</span>
                                                                    </span>
                                                                </h5>
                                                                <p class="notfication-log-text">
                                                                    <span class="notfication-log-text-detail">
                                                                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis molestiae officiis, sapiente, itaque esse eius neque, dolore velit consectetur tempora deleniti ad temporibus modi omnis repellat adipisci? Adipisci, expedita vero.
                                                                    </span>
                                                                </p>
                                                                <p class="notfications-log-additional-data">
                                                                    additional data
                                                                </p>

                                                            </div>
                                                        
                                                        </div>
                                                    </li>
                                                     <!-- notfication item -->
                                                     <li class="notfications-log-general-actegory Support notfications-log-item All">
                                                        <span class="material-icons notification-log-category-icon">task_alt</span>
                                                        <div class="activity-log-notfication-content">
                                                            <div class="activity-log-notfication-details">
                                                                <h5>
                                                                    <span>Example of Public Notfication</span>
                                                                    <span class="activity-log-notfication-time">
                                                                            <span>20/04/2022</span>
                                                                            <span>(02:00 AM)</span>
                                                                    </span>
                                                                </h5>
                                                                <p class="notfication-log-text">
                                                                    <span class="notfication-log-text-detail">
                                                                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis molestiae officiis, sapiente, itaque esse eius neque, dolore velit consectetur tempora deleniti ad temporibus modi omnis repellat adipisci? Adipisci, expedita vero.
                                                                    </span>
                                                                </p>
                                                                <p class="notfications-log-additional-data">
                                                                    additional data
                                                                </p>

                                                            </div>
                                                          
                                                        </div>
                                                    </li>
                                                     <!-- notfication item -->
                                                     <li class="notfications-log-general-actegory Billing notfications-log-item All">
                                                        <span class="material-icons notification-log-category-icon">task_alt</span>
                                                        <div class="activity-log-notfication-content">
                                                            <div class="activity-log-notfication-details">
                                                                <h5>
                                                                    <span>Example of Biling Notfication</span>
                                                                    <span class="activity-log-notfication-time">
                                                                            <span>20/04/2022</span>
                                                                            <span>(02:00 AM)</span>
                                                                    </span>
                                                                </h5>
                                                                <p class="notfication-log-text">
                                                                    <span class="notfication-log-text-detail">
                                                                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis molestiae officiis, sapiente, itaque esse eius neque, dolore velit consectetur tempora deleniti ad temporibus modi omnis repellat adipisci? Adipisci, expedita vero.
                                                                    </span>
                                                                </p>
                                                                <p class="notfications-log-additional-data text-center">
                                                                    <span>Program: <br/> some text</span>
                                                                    <span>Price: <br/> 5$</span>
                                                                    <span>Num of hours: <br/> 20 h</span>
                                                                </p>

                                                            </div>
                                                            
                                                        </div>
                                                    </li>
                                                     <!-- notfication item -->
                                                     <li class="notfications-log-general-actegory Learning notfications-log-item All">
                                                        <span class="material-icons notification-log-category-icon">task_alt</span>
                                                        <div class="activity-log-notfication-content">
                                                            <div class="activity-log-notfication-details">
                                                                <h5>
                                                                    <span>Example of Learning Notfication</span>
                                                                    <span class="activity-log-notfication-time">
                                                                            <span>20/04/2022</span>
                                                                            <span>(02:00 AM)</span>
                                                                    </span>
                                                                </h5>
                                                                <p class="notfication-log-text">
                                                                    <span class="notfication-log-text-detail">
                                                                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis molestiae officiis, sapiente, itaque esse eius neque, dolore velit consectetur tempora deleniti ad temporibus modi omnis repellat adipisci? Adipisci, expedita vero.
                                                                    </span>
                                                                </p>
                                                                <p class="notfications-log-additional-data">
                                                                    additional data
                                                                </p>

                                                            </div>
                                                            
                                                        </div>
                                                    </li>
                                                     <!-- notfication item -->
                                                     <li class="notfications-log-general-actegory ClassManagment notfications-log-item All">
                                                        <span class="material-icons notification-log-category-icon">task_alt</span>
                                                        <div class="activity-log-notfication-content">
                                                            <div class="activity-log-notfication-details">
                                                                <h5>
                                                                    <!-- title -->
                                                                    <span>Example of Class Managment Notfication</span>
                                                                    <span class="activity-log-notfication-time">
                                                                            <span>20/04/2022</span>
                                                                            <span>(02:00 AM)</span>
                                                                    </span>

                                                                </h5>
                                                                <p class="notfication-log-text">
                                                                    <span class="notfication-log-text-detail">
                                                                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis molestiae officiis, sapiente, itaque esse eius neque, dolore velit consectetur tempora deleniti ad temporibus modi omnis repellat adipisci? Adipisci, expedita vero.
                                                                    </span>
                                                                </p>
                                                                <p class="notfications-log-additional-data">
                                                                    additional data
                                                                </p>

                                                            </div>
                                                            
                                                        </div>
                                                    </li>



                                                </ul>
                                                

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
<script>
   
    
jQuery(document).ready(function(){
     //filter notfications log
     const filterNotficationLog = ()=>{
            let clickedValue = document.querySelectorAll('[name=notfications-log-radio-input]');
            let getAllNotificationsItems = document.querySelectorAll('.notfications-log-item');
            for(let x=0; x<clickedValue.length;x++){
                for(let i = 0;i<getAllNotificationsItems.length; i++){
                        clickedValue[x].addEventListener('click',(e)=>{
                            console.log(e.target.value)

                            let filterCategory = document.querySelectorAll("."+ e.target.value);
                            
                           
                            for(let y =0;y<filterCategory.length;y++){
                                getAllNotificationsItems[i].style.display="flex";
                                
                                getAllNotificationsItems[i].style.display="none";
                                filterCategory[y].style.display="flex"
                            }
                            
                            
                    })
                    }
            }
        }  
        filterNotficationLog();
// add icon per catagory
        jQuery('.General').find('.material-icons').html('public');
        jQuery('.Billing').find('.material-icons').html('account_balance_wallet');
        jQuery('.Learning').find('.material-icons').html('school');
        jQuery('.ClassManagment').find('.material-icons').html('video_settings');
        // custom style according to notfication category

        jQuery('.Billing').find('.activity-log-notfication-content').prepend('<span class="material-icons">account_balance_wallet</span>');
})


</script>