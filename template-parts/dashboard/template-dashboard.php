<style>
.panel-header{
  height: fit-content!important;
  padding: 0!important;
}
.panel-header .hidden-panel-close{
    position: absolute;
    right: 10px;
    top: 7px!important;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 0;
}
.panel-header .hidden-panel-close:hover{
  background: var(--main-color)!important;
  transform: translateX(3px);
}
.account-summery h2, .top-info-title h2 span:first-child, .makeup-balance h2{
  font-size: var(--fs-300)!important;
}
illing-aside-details h3 span, .billing-aside-details h3 small {
    font-size: var(--fs-200)!important;
}
.panel-header .hidden-panel-close i{
  color: #fff;
  font-size: 1.2rem!important;
}
.hidden-panel-content {
    padding: 10px 15px!important;
}
.account-overview-num .material-icons{
  display: none!important;
}
.top-info-title h2 span:first-child{
  line-height: 20px!important;
}
.top-info-title h2{
    margin-bottom: 15px!important;
    line-height: 10px!important;
    display: flex!important;
    align-items: center!important;
}
.hidden-panel{
  width: 55vw!important;
  background: #fff!important;
}
.program-data{
  border: 0!important;

}
.program-data th,.program-data th span strong{
  font-size: .6rem!important;
  font-weight: 600;
}
.program-data td{
  font-size: .6rem!important;
}
.hidden-panel-content.panel-content h4{
    font-size: 1.2rem;
    color: var(--main-color);
    margin-bottom: 30px!important;
}
.makeup-balance{
  height: 100%!important;
}
.w-100.mak_down{
  font-size: var(--fs-200)!important;
    color: var(--main-color);
    white-space: nowrap;
    opacity: .8;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 15px auto;
}
.billing-aside-details h3 {
    margin-top: 9px!important;
}
a.view-btn,a.edit-btn,a.copy-cred{
    border-radius: 50%!important;
    width: 25px!important;
    height: 25px!important;
    display: inline-flex!important;
    justify-content: center!important;
    align-items: center!important;
    padding: 0!important;
    font-size: .5rem!important;
}
a.view-btn i,a.edit-btn i,a.copy-cred i{
  transform: none!important;
}
a.view-btn{background-color: #e5edfc !important;}
a.view-btn i{color: #5a8dee !important;}
a.edit-btn{background-color: #dff9ec !important;}
a.edit-btn i{color: #39da8a !important;}
a.copy-cred{background-color: #fff2e1 !important;}
a.copy-cred i{    color: #fdac41 !important;}


br{
  display: none!important;
}
</style>
<?php wp_enqueue_style( 'muslimeto-material-icons' ); ?>
<?php wp_enqueue_style( 'muslimeto-bootstrap-css' ); ?>
<?php wp_enqueue_style( 'muslimeto-dashboard-css' ); ?>



<div class="side-panel">

    <div class="hidden-panel animate__animated animate__slideInRight ">

        <div class="panel-header">
            <span class="hidden-panel-close"><i class="bb-icon-times bb-icon-l"></i></span>
        </div>

        <div class="hidden-panel-content panel-content">



        </div>
    </div>
</div>


<!-- page content -->
<section class="container-fluid support-dashboard">

    <!-- upper section -->
    <div class="row support-dash-top-section">
        <div class="col-lg-3 col-md-12 support-dash-tittle mb-sm-4">
            <section class="live-agents"><?php get_template_part('template-parts/dashboard/template-live-agents'); ?></section>
        </div>
        <div class="col-lg-9 col-md-12 support-dash-wedges total-stats-section">
            <?php get_template_part('template-parts/dashboard/template-total-stats'); ?>
        </div>
    </div>
    <!-- tabs section -->
    <div class="row tabs-section my-2">
        <div class="col-lg-3 col-md-12 aside-nav-container">
            <ul class="nav nav-tabs col-12 p-0" id="myTab" role="tablist">
                <!-- <li class="nav-item" role="presentation">
                    <a class="nav-link active"   id="overview-tab" href="#" data-target="overview">
                        <span class="material-icons">dashboard</span>
                        Overview
                    </a>
                </li> -->
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="due-tab" href="#" aria-controls="troubled-classes" aria-selected="false">
                        <span class="material-icons">dashboard</span>
                        Overdue balance
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link"  id="troubled-classes-tab" href="#" aria-controls="troubled-classes" aria-selected="false" data-target="#Mismatch">
                        <span class="material-icons">settings_suggest</span>
                        Mismatch
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link"  id="vacation-tab" href="#" aria-selected="false" data-target="#Mismatch">
                        <span class="material-icons">settings_suggest</span>
                        On Vacation
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="winning-back-tab" href="#winning-back">
                        <span class="material-icons">settings</span>
                        Winning-back
                    </a>
                </li>
            </ul>

            <?php
            $zoom_meeting_id = 123456;
            ?>
            <!-- notfication section -->
            <div class="upcoming-trouble">
                <?php get_template_part('template-parts/dashboard/template-upcoming-trouble'); ?>
            </div>

        </div>
        <div class="col-lg-9 col-md-12 tab-content" id="myTabContent">
            <div class="tab-pane fade show active p-3" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                <div class="support-dash-data-table-container row parent-stats-section">
                    <?php echo do_shortcode('[parent_status_table]'); ?>
                </div>
            </div>
            <div class="tab-pane fade p-3" id="Mismatch" role="tabpanel" aria-labelledby="troubled-classes-tab">Mismatch</div>
            <div class="tab-pane fade p-3" id="winning-back" role="tabpanel" aria-labelledby="winning-back-tab">winning-back</div>
        </div>
    </div>



</section>
<!-- end of page contant -->

<!-- script -->
<?php wp_enqueue_script( 'muslimeto-bootstrap-js' ); ?>
<script>




    // get upcoming trouble classes section, and parent stats table refresh
    setInterval(function() {
        // get live agents template
        $('.live-agents').load('/wp-content/themes/buddyboss-child-theme/images/laoders/live-agents.svg'); // load svg till ajax finish
        let url_live_agents = ajaxurl + '?template_fullname=/dashboard/template-live-agents' ;

        let data_live_agents = {
            action : 'get_template_by_ajax',
        };
        $.get(url_live_agents, data_live_agents, function (response) { // response callback function
            $('.live-agents').html(response);
        });

        // get total stats template
        /*
        //$('.total-stats-section').load('/wp-content/themes/buddyboss-child-theme/images/laoders/total-stats.svg'); // load svg till ajax finish
        let url_total_stats = ajaxurl + '?template_fullname=/dashboard/template-total-stats' ;

        let data_total_stats = {
            action : 'get_template_by_ajax',
        };
        $.get(url_total_stats, data_total_stats, function (response) { // response callback function
            $('.total-stats-section').html(response);
        });
        */

        // get upcoming trouble classes template
        $('.upcoming-trouble').load('/wp-content/themes/buddyboss-child-theme/images/laoders/trouble-classes.svg');
        let url_upcoming_trouble = ajaxurl + '?template_fullname=/dashboard/template-upcoming-trouble' ;

        let data_upcoming_trouble = {
            action : 'get_template_by_ajax',
        };
        $.get(url_upcoming_trouble, data_upcoming_trouble, function (response) { // response callback function
            $('.upcoming-trouble').html(response);
        });

        // get parent stats table
        /*
        $('.parent-stats-section').load('/wp-content/themes/buddyboss-child-theme/images/laoders/parent-stats-table.svg');
        let url_parent_stats_template = ajaxurl + '?template_fullname=/dashboard/template-parent-stats-table' ;
        let data_parent_stats_template = {
            action : 'get_template_by_ajax',
            target: 'dashboard'
        };
        $.get(url_parent_stats_template, data_parent_stats_template, function (response) { // response callback function
            $('.parent-stats-section').html(response);
        })
        */

    }, 600000); // recursive every x mSec







</script>
