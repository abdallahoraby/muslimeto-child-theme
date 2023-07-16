<?php wp_enqueue_style( 'muslimeto-material-icons' ); ?>
<?php wp_enqueue_script( 'muslimeto-bootstrap-css' ); ?>

<?php wp_enqueue_style( 'muslimeto-dashboard-css' ); ?>


<!-- page content -->
<section class="container-fluid support-dashboard">

    <!-- tabs section -->
    <div class="row tabs-section my-2">
        <div class="col-lg-3 col-md-12 aside-nav-container">
            <ul class="nav nav-tabs col-12 p-0" id="myTab" role="tablist">
<!--                <li class="nav-item" role="presentation">-->
<!--                    <a class="nav-link active" id="all-accounts-tab" data-toggle="tab" href="#all-accounts" data-target="all" role="tab" aria-controls="all-accounts" aria-selected="true">-->
<!--                        <span class="material-icons">dashboard</span>-->
<!--                        All Accounts-->
<!--                    </a>-->
<!--                </li>-->

                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="all-accounts-tab" data-toggle="tab" href="#all-accounts" role="tab" data-target="all" aria-controls="all-accounts" aria-selected="false">
                        <span class="material-icons">settings_suggest</span>
                        All
                    </a>
                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="active-accounts-tab" data-toggle="tab" href="#active-accounts" role="tab" data-target="256" aria-controls="" aria-selected="false">
                        <span class="material-icons">settings_suggest</span>
                        Active
                    </a>
                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="trialing-accounts-tab" data-toggle="tab" href="#trialing-accounts" role="tab" data-target="380" aria-controls="trialing-accounts" aria-selected="false">
                        <span class="material-icons">settings</span>
                        Trialing
                    </a>
                </li>


                <!-- <li class="nav-item" role="presentation">
                    <a class="nav-link" id="on-vacation-accounts-tab" data-toggle="tab" href="#on-vacation-accounts" role="tab" data-target="394" aria-controls="on-vacation-accounts" aria-selected="false">
                        <span class="material-icons">settings</span>
                        On Vacation
                    </a>
                </li> -->

                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="all-cancelled-accounts-tab" data-toggle="tab" href="#all-cancelled-accounts" role="tab" data-target="362" aria-controls="all-cancelled-accounts" aria-selected="false">
                        <span class="material-icons">settings</span>
                        All Cancelled
                    </a>
                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="vip-accounts-tab" data-toggle="tab" href="#vip-accounts" role="tab" data-target="396" aria-controls="vip-accounts" aria-selected="false">
                        <span class="material-icons">settings</span>
                        VIP
                    </a>
                </li>


            </ul>


        </div>
        <div class="col-lg-9 col-md-12 tab-content" id="myTabContent">

            <div class="tab-pane fade show active p-3" id="all-accounts" role="tabpanel" aria-labelledby="all-accounts-tab">
                <div class="support-dash-data-table-container row all-parent-stats-section">
                    <!-- get template all parent stats table -->
                    <?php echo do_shortcode('[all_parent_status_table target="all"]'); ?>
                </div>
            </div>

<!--            <div class="tab-pane fade p-3" id="active-accounts" role="tabpanel" aria-labelledby="active-accounts-tab"> Active </div>-->
<!---->
<!--            <div class="tab-pane fade p-3" id="vip-accounts" role="tabpanel" aria-labelledby="vip-accounts-tab">VIP Accounts</div>-->
<!---->
<!--            <div class="tab-pane fade p-3" id="on-vacation-accounts" role="tabpanel" aria-labelledby="on-vacation-accounts-tab">On Vacation Accounts</div>-->
<!---->
<!--            <div class="tab-pane fade p-3" id="trialing-accounts" role="tabpanel" aria-labelledby="trialing-accounts-tab">Trialing Accounts</div>-->
<!---->
<!--            <div class="tab-pane fade p-3" id="all-cancelled-accounts" role="tabpanel" aria-labelledby="all-cancelled-accounts-tab">All cancelled Accounts</div>-->

        </div>
    </div>



</section>
<style media="screen">
 .nav-link.active {
  color: #343a40 ;
  border-color: transparent;
  font-weight: 500;
  border-left: 5px solid #343a40!important ;
}
</style>
<!-- end of page contant -->
<!-- script -->
<?php wp_enqueue_script( 'muslimeto-bootstrap-js' ); ?>

<script>
    jQuery(document).ready(function(){

        $(".nav-link").on('click', function(){

            let target = $(this).data('target');
            $('.all-parent-stats-section').html('<div id="loader"> </div>');
            // send ajax delte confirmation
            $.post(ajaxurl, {
                action : 'get_all_parents_table_target',
                target : target
            }, function (response) { // response callback function
                $('.all-parent-stats-section').html(response);
                //$('.all-accounts tr').not('.' + target).hide();

            })
            .done(function () {

            });
        });

    });



</script>
