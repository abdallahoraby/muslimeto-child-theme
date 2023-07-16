 <?php $user = wp_get_current_user(); ?>
<div class="row order-0 order-md-1 p-0">
    <!-- User Pills -->
    <div class="row nav-tabs">

        <ul class="nav nav-pills flex-column col-md-9 flex-md-row main-nav">
        <li class="nav-item">
            <a class="nav-link get_template active" href="#" data-template-name="profile" data-template-folder="/user-profile/" data-tab-name="template-data">
                <span class="material-icons nav-icon">person</span>
                <span class="nav-text">Profile</span>

            </a>
        </li>


  <?php if(in_array('parent',$user->roles)): ?>
        <li class="nav-item">
            <a class="nav-link get_template" href="#" data-template-name="members" data-template-folder="/user-profile/" data-tab-name="template-data" id="member_secn">
                <span class="material-icons nav-icon">diversity_3</span>
                <span class="nav-text">Learners</span>

            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link get_template billing_link" href="#" data-template-name="billing" data-template-folder="/user-profile/" data-tab-name="template-data" id="billing_secn">

                <span class="material-icons nav-icon">credit_score</span>
                <span class="nav-text">Billing</span>
                <p class="billing-notfication-num">!</p>
            </a>
        </li>



        <li class="nav-item">
            <a class="nav-link get_template" href="#" data-template-name="forms" data-template-folder="/user-profile/" data-tab-name="template-data">
                <span class="material-icons nav-icon">quiz</span>
                <span class="nav-text">Forms</span>

            </a>
        </li>
<?php endif; ?>
            <!-- <li class="nav-item">
                <a class="nav-link get_template" href="#" data-template-name="activity-log" data-template-folder="/user-profile/" data-tab-name="template-data">

                    <span class="material-icons nav-icon">edit_notifications</span>
                    <span class="nav-text">Activity</span>

                </a>
            </li>     -->

    </ul>
    </div>
    <!--/ User Pills -->

    <!-- template data -->
    <div class="card-data p-0">
        <div class="card-body">
            <div class="template-data">
                <?php get_template_part('template-parts/user-profile/template-profile'); ?>
            </div>
        </div>
    </div>
    <!--/ template data -->



</div>
