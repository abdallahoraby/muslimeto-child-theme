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

    $unpaid_invoices = muslimito_get_parent_invoices(get_current_user_id(),'false');
    $paid_invoices   = muslimito_get_parent_invoices(get_current_user_id(),'true');
    $subscriptions   =  muslimito_get_parent_subscriptions();
?>

<section id="page-account-settings">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <?php if($rol=='parent') :?>
                    <div class="col-md-12 sub-navs">
                        <ul class="nav nav-pills flex-row sub-nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center active "  data-toggle="pill" href="#b11" aria-expanded="true">
                                    <!-- <i class="fa fa-award"></i> -->
                                    <span class="material-icons">topic</span>
                                    <span>Overview </span>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" data-toggle="pill" href="#b12" aria-expanded="true">
                                    <span class="material-icons">subscriptions</span>
                                    <span>Subscriptions</span>
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" data-toggle="pill" href="#b13" aria-expanded="true">
                                    <!-- <i class="fa fa-report"></i> -->
                                    <span class="material-icons">account_balance_wallet</span>
                                    <span>Invoices</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" data-toggle="pill" href="#b14" aria-expanded="true">
                                    <!-- <i class="fa fa-report"></i> -->
                                    <span class="material-icons">credit_score</span>
                                    <span>Add Payment Method</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-12 bg-white">
                        <div class="tab-content p-0">
                            <div role="tabpanel" class="tab-pane active billing_tab_subscriptions" id="b11" aria-labelledby="b11" aria-expanded="true">
                                <div class="row" id="basic-table">
                                    <div class="card">
                                        <div class="card-body">
                                        <!-- overview -->
                                        <div class="col-12 billing-overview">
                                            <h2>
                                                  <span class="material-icons">subscriptions</span>
                                                  <span>Overview</span>
                                            </h2>
                                               <table width="100%" padding:10px="" class="table table-sm billing_overview_table">
                                                        
                                                        <tbody>
                                                                <tr class="billing_overview_table_header">
                                                                        <td>&nbsp;Program</td>
                                                                        <td>Status</td>
                                                                        <td>Next Bill Date</td>
                                                                        <td>Billing Amount</td>
                                                                        <td>Card id</td>
                                                                </tr>
                                                            <?php foreach ($subscriptions as $sub):?>
                                                            <tr>
                                                            <td><?php echo  muslimito_get_sub_name( $sub->product_id ) ?></td>
                                                                <td><?php echo  'active';  ?></td>
                                                                <td><?php echo $sub->next_bill_date  ?></td>
                                                                <td><?php echo $sub->billing_amount  ?></td>
                                                                <td><?php echo $sub->credit_card_id  ?></td>
                                                            </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                </table>
                                        <?php
                                            $postz = '<p font-family: Oxygen, Sans-serif; color: #3A3365;>
                                                     [memb_has_payf strict=n]
                                                     <strong>Action Required: please pay the outstanding balance ASAP</strong>
                                                     [else_memb_has_payf]<strong>All Good, JAK!</strong>
                                                     [/memb_has_payf]
                                                         <br/>
                                                     [memb_has_payf strict=n]Balance: Outstanding Balance Overdue
                                                     [else_memb_has_payf]Balance: No Overdue Balance[/memb_has_payf]
                                                     [memb_has_creditcard]<br/>Payment Method: Valid Payment Method On File[else_memb_has_creditcard]<br/>Payment Method: No Valid/Active Payment Method On File[/memb_has_creditcard]
                                                     [memb_has_payf strict=n]
                                                     </p>
                                                     <p font-family: Oxygen, Sans-serif; color: #3A3365;>
                                                     <strong>Unpaid Invoices</strong>
                                                     </p>
                                                      <table width="100%" >
                                                      <thead font-family: Oxygen, Sans-serif; color: #3A3365;>
                                                      <td>Inv#</td>
                                                       <td>Invoice Total</td>
                                                      <td>Paid</td>
                                                      <td>Amount Due</td>
                                                      <td>Due Date</td>
                                                      <td></td>
                                                      <td></td>
                                                      </thead>
                                                      [memb_list_invoices paid=0 unpaid=1]
                                                      <tr font-family: Oxygen, Sans-serif; color: #3A3365;>
                                                      <td>%%invoice.id%%</td>
                                                      <td>$%%invoice.total%%</td>
                                                      <td>$%%total.paid%%</td>
                                                      <td>$%%amount.due%%</td>
                                                      <td>%%date.due%%</td>
                                                      <td>%%creditcard.dropdown%%</td>
                                                      <td>%%submit%%</span></td>
                                                      </tr>
                                                      [/memb_list_invoices]
                                                      </table>
                                                     [/memb_has_payf]';
                                            $output =  apply_filters( 'the_content', $postz );
                                            //echo $output;

                                            ?>
                                        </div><!-- end of overiew -->
                                        <!-- subscriptions -->
                                        <div class="col-12 billing-subscriptions">
                                            <h2>
                                                  <span class="material-icons">subscriptions</span>
                                                  <span>Subscriptions</span>
                                            </h2>
                                        <?php
                                                $chikd = '<style> thead td { font-weight:bold; } </style>
                                                               <table width="100%" padding:10px class="table table-sm my-2 billing_invoices_table">
                                                               <tbody>
                                                               <tr font-family: Oxygen, Sans-serif; color: #3A3365; class="billing_invoices_table_header">
                                                               <td>&nbsp;Program</td>
                                                               <td>Status</td>
                                                               <td>Next Bill Date</td>
                                                               <td>Card</td>
                                                               <td>Last 4</td>
                                                               [memb_list_subscriptions status="active"]
                                                               <tr font-family: Oxygen, Sans-serif; color: #3A3365;>
                                                               <td>&nbsp; %%subscription.name%%</td>
                                                               <td>%%subscription.status%%</td>
                                                               <td>%%subscription.nextbilling%%</td>
                                                               <td>%%creditcard.type%%</td>
                                                               <td>%%creditcard.last4%% </td>
                                                               </tr>
                                                               [/memb_list_subscriptions]
                                                               </tbody>
                                                               </table>';
                                                $output =  apply_filters( 'the_content', $chikd );
                                                //echo $output; ?>
                                             </div><!-- end of  subscriptions -->

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane billing_tab_invoices" id="b13">
                                <div class="row" id="basic-table">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body invoices-card">
                                                <?php
                                                if($unpaid_invoices): ?>
                                                <table width="100%" class="table table-sm my-2 billing_invoices_table">
                                                <thead>
                                                <tr class="billing_invoices_table_header">
                                                <td>Inv#</td>
                                                <td>Description</td>
                                                <td>Invoice Total</td>
                                                <td>Paid</td>
                                                <td>Amount Due</td>
                                                <td>Due Date</td>
                                                </tr>
                                                </thead>
                                                <?php foreach($unpaid_invoices as $value):?>
                                                <tr>
                                                <td><?php echo $value->id ?></td>
                                                <td><?php echo $value->title ?></td>
                                                <td><?php echo $value->total ?></td>
                                                <td><?php echo $value->status ?></td>
                                                <td><?php echo $value->total_paid ?></td>
                                                <td><?php echo $value->total_due ?></td>
                                                </tr>
                                              <?php endforeach; ?>
                                              </table>
                                              <br><hr>
                                            <?php  else:
                                                  echo '<div class="billing_invoices_table_message"> All good, no unpaid invoices, JAK! </div>';
                                             endif;


                                                $chikd = '[memb_has_payf strict=n]
                                                              <table width="100%" class="table table-sm my-2 billing_invoices_table">
                                                              <thead class="billing_invoices_table_header">
                                                              <td>Inv#</td>
                                                              <td>Description</td>
                                                              <td>Invoice Total</td>
                                                              <td>Paid</td>
                                                              <td>Amount Due</td>
                                                              <td>Due Date</td>
                                                              <td></td>
                                                              <td></td>
                                                              </thead>
                                                              [memb_list_invoices paid=0 unpaid=1]
                                                              <tr>
                                                              <td>%%invoice.id%%</td>
                                                              <td>%%description%%</td>
                                                              <td>$%%invoice.total%%</td>
                                                              <td>$%%total.paid%%</td>
                                                              <td>$%%amount.due%%</td>
                                                              <td>%%date.due%%</td>
                                                              <td>%%creditcard.dropdown%%</td>
                                                              <td>%%submit%%</span></td>
                                                              </tr>
                                                              [/memb_list_invoices]
                                                              </table>
                                                             [else_memb_has_payf]
                                                             <br/><span class="billing-stats"> All good, no unpaid invoices, JAK! </span>
                                                             [/memb_has_payf]
                                                             <style>
                                                             thead td { font-weight:bold; }
                                                             </style>
                                                             <table width="100%">
                                                             <thead>
                                                             <td>Inv#</td>
                                                             <td>Description</td>
                                                             <td>Invoice Total</td>
                                                             <td>Paid</td>
                                                             <td>Amount Due</td>
                                                             </thead>
                                                             [memb_list_invoices paid=1 unpaid=0]
                                                             <tr>
                                                             <td>%%invoice.id%%</td>
                                                             <td>%%description%%</td>
                                                             <td>$%%invoice.total%%</td>
                                                             <td>$%%total.paid%%</td>
                                                             <td>$%%amount.due%%</td>
                                                             </tr>
                                                             [/memb_list_invoices]
                                                             </table>';
                                                $output =  apply_filters( 'the_content', $chikd );
                                                //echo $output; ?>

                                                <table width="100%" class="table table-sm my-2 billing_invoices_table">
                                                <thead>
                                                <tr class="billing_invoices_table_header">
                                                <td>Inv#</td>
                                                <td>Description</td>
                                                <td>Invoice Total</td>
                                                <td>Paid</td>
                                                <td>Amount Due</td>
                                                <td>Total Paid</td>
                                                </tr>
                                                </thead>
                                                <?php foreach($paid_invoices as $value):?>
                                                <tr>
                                                <td><?php echo $value->id ?></td>
                                                <td><?php echo $value->title ?></td>
                                                <td><?php echo $value->total ?></td>
                                                <td><?php echo $value->status ?></td>
                                                <td><?php echo $value->total_due ?></td>
                                                <td><?php echo $value->total_paid ?></td>
                                                </tr>
                                              <?php endforeach; ?>
                                              </table>


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane billing_tab_paymentmethod" id="b14">
                                <div class="row" id="basic-table">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body billing_rmv_br">
                                                <?php
                                                $chikd='Credit Cards [memb_list_creditcards]
                                                   <span class="billing-stats"> Card: %%card.type%%-%%card.last4%% Expiration: %%card.month%%/%%card.year%% </span>
                                                   [/memb_list_creditcards]
                                                   <h4 class="add_payment_method"><span class="material-icons">credit_card</span>Add Payment Method</h4>
                                                   [memb_add_creditcard backcharge=yes set_default=yes successurl=http://portal.muslimeto.com/sucess-cc-added failureurl=http://portal.muslimeto.com/fail addonly=yes]
                                                   Memberium';
                                                $output =  apply_filters( 'the_content', $chikd );
                                                //echo $output; ?>

                                                    <form>
                                                    <div style="display:none;" class="ajax_image_section learner_loader"> <div class="ajaxloader"></div> </div>
                                                    <div>
                                                         <label><span class="material-icons">numbers</span>Card Number:</label>
                                                          <input name="cc_number"  placeholder="Credit Card Number" type="text" size="20" maxlength="20" required="required" pattern="[0-9]{13,16}" x-autocompletetype="cc-number" autocomplete="cc-number"> </div>
                                                    <div>
                                                        <label><span class="material-icons">payments</span>Card Type:</label>
                                                        <select name="cardtype" required="required" autocompelete="cc-type">
                                                            <option value=""></option>
                                                            <option value="American Express">American Express</option>
                                                            <option value="Discover">Discover</option>
                                                            <option value="MasterCard">MasterCard</option>
                                                            <option value="Visa">Visa</option>
                                                        </select>
                                                    </div>
                                                        <div>
                                                        <label><span class="material-icons">calendar_month</span>Expiration Month:</label>
                                                        <select name="expirationmonth" required="required" autocomplete="cc-exp-month">
                                                            <option value="01">01 - January</option>
                                                            <option value="02">02 - February</option>
                                                            <option value="03">03 - March</option>
                                                            <option value="04">04 - April</option>
                                                            <option value="05">05 - May</option>
                                                            <option value="06">06 - June</option>
                                                            <option value="07">07 - July</option>
                                                            <option value="08">08 - August</option>
                                                            <option value="09">09 - September</option>
                                                            <option value="10">10 - October</option>
                                                            <option value="11">11 - November</option>
                                                            <option value="12">12 - December</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label><span class="material-icons">calendar_month</span>Expiration Year:</label>
                                                        <select name="expirationyear" required="required" autocomplete="cc-exp-year">
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                            <option value="2025">2025</option>
                                                            <option value="2026">2026</option>
                                                            <option value="2027">2027</option>
                                                            <option value="2028">2028</option>
                                                            <option value="2029">2029</option>
                                                            <option value="2030">2030</option>
                                                            <option value="2031">2031</option>
                                                            <option value="2032">2032</option>
                                                            <option value="2033">2033</option>
                                                            <option value="2034">2034</option>
                                                            <option value="2035">2035</option>
                                                            <option value="2036">2036</option>
                                                        </select>
                                                    </div>
                                                    <div> 
                                                        <label><span class="material-icons">vpn_key</span>CVV Code:</label> 
                                                        <input name="cvv2" type="text" size="4" maxlength="4" required="" placeholder="" value="" autocomplete="cc-csc"> </div>
                                                    <div> 
                                                        <label><span class="material-icons">person</span>Name on Card:</label> 
                                                        <input name="nameoncard" value="Loai Said" placeholder="Full Name on Card" type="text" size="30" required="required" autocomplete="cc-name"> </div>
                                                    <div>
                                                         <label><span class="material-icons">call</span>Phone Number:</label> 
                                                         <input name="phonenumber" value="+17037894480" placeholder="Best Phone Number" type="tel" size="20" required="required" autocomplete="tel"> </div>
                                                    <div>
                                                         <label><span class="material-icons">place</span>Street Address:</label>
                                                          <input name="streetaddress1" value="Street address" placeholder="Address Line 1" size="30" type="text" required="required" autocomplete="address-line1"> </div>
                                                    <div> 
                                                        <label><span class="material-icons">place</span>Street Address:</label> 
                                                        <input name="streetaddress2" value="City" placeholder="Optional Address Line 2" size="30" type="text" autocomplete="address-line2"> </div>
                                                    <div> 
                                                        <label><span class="material-icons">place</span>City:</label> 
                                                        <input name="city" value="City" placeholder="City" type="text" required="required" autocomplete="address-level2"> </div>
                                                    <div> 
                                                        <label><span class="material-icons">place</span>State/Province:</label> 
                                                        <input name="state" value="State" placeholder="N/A if none" type="text" size="30" required="required" autocomplete="address-level1"> </div>
                                                    <div> 
                                                        <label><span class="material-icons">subtitles</span>Postal Code:</label> 
                                                        <input name="postalcode" value="12345" placeholder="Zip or Postal Code" type="text" size="15" required="required" autocmoplete=""> </div>
                                                    <div>
                                                    <label><span class="material-icons">place</span>Country:</label>
                                                    <select name="country" required="required">
                                                        <option value="Åland Islands">Åland Islands</option>
                                                        <option value="Aland Islands">Aland Islands</option>
                                                        <option value="Afghanistan">Afghanistan</option>
                                                        <option value="Albania">Albania</option>
                                                        <option value="Algeria">Algeria</option>
                                                        <option value="American Samoa">American Samoa</option>
                                                        <option value="Andorra">Andorra</option>
                                                        <option value="Angola">Angola</option>
                                                        <option value="Anguilla">Anguilla</option>
                                                        <option value="Antarctica">Antarctica</option>
                                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                        <option value="Argentina">Argentina</option>
                                                        <option value="Armenia">Armenia</option>
                                                        <option value="Aruba">Aruba</option>
                                                        <option value="Australia">Australia</option>
                                                        <option value="Austria">Austria</option>
                                                        <option value="Azerbaijan">Azerbaijan</option>
                                                        <option value="Bahamas (the)">Bahamas (the)</option>
                                                        <option value="Bahrain">Bahrain</option>
                                                        <option value="Bangladesh">Bangladesh</option>
                                                        <option value="Barbados">Barbados</option>
                                                        <option value="Belarus">Belarus</option>
                                                        <option value="Belgium">Belgium</option>
                                                        <option value="Belize">Belize</option>
                                                        <option value="Benin">Benin</option>
                                                        <option value="Bermuda">Bermuda</option>
                                                        <option value="Bhutan">Bhutan</option>
                                                        <option value="Bolivia (Plurinational State of)">Bolivia (Plurinational State of)</option>
                                                        <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
                                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                        <option value="Botswana">Botswana</option>
                                                        <option value="Bouvet Island">Bouvet Island</option>
                                                        <option value="Brazil">Brazil</option>
                                                        <option value="British Indian Ocean Territory (the)">British Indian Ocean Territory (the)</option>
                                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                        <option value="Bulgaria">Bulgaria</option>
                                                        <option value="Burkina Faso">Burkina Faso</option>
                                                        <option value="Burundi">Burundi</option>
                                                        <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                                                        <option value="Cabo Verde">Cabo Verde</option>
                                                        <option value="Cambodia">Cambodia</option>
                                                        <option value="Cameroon">Cameroon</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="Cayman Islands (the)">Cayman Islands (the)</option>
                                                        <option value="Central African Republic (the)">Central African Republic (the)</option>
                                                        <option value="Chad">Chad</option>
                                                        <option value="Chile">Chile</option>
                                                        <option value="China">China</option>
                                                        <option value="Christmas Island">Christmas Island</option>
                                                        <option value="Cocos (Keeling) Islands (the)">Cocos (Keeling) Islands (the)</option>
                                                        <option value="Colombia">Colombia</option>
                                                        <option value="Comoros (the)">Comoros (the)</option>
                                                        <option value="Congo (the Democratic Republic of the)">Congo (the Democratic Republic of the)</option>
                                                        <option value="Congo (the)">Congo (the)</option>
                                                        <option value="Cook Islands (the)">Cook Islands (the)</option>
                                                        <option value="Costa Rica">Costa Rica</option>
                                                        <option value="Croatia">Croatia</option>
                                                        <option value="Cuba">Cuba</option>
                                                        <option value="Curaçao">Curaçao</option>
                                                        <option value="Cyprus">Cyprus</option>
                                                        <option value="Czech Republic (the)">Czech Republic (the)</option>
                                                        <option value="Denmark">Denmark</option>
                                                        <option value="Djibouti">Djibouti</option>
                                                        <option value="Dominica">Dominica</option>
                                                        <option value="Dominican Republic (the)">Dominican Republic (the)</option>
                                                        <option value="Ecuador">Ecuador</option>
                                                        <option value="Egypt">Egypt</option>
                                                        <option value="El Salvador">El Salvador</option>
                                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                        <option value="Eritrea">Eritrea</option>
                                                        <option value="Estonia">Estonia</option>
                                                        <option value="Ethiopia">Ethiopia</option>
                                                        <option value="Falkland Islands (the) [Malvinas]">Falkland Islands (the) [Malvinas]</option>
                                                        <option value="Faroe Islands (the)">Faroe Islands (the)</option>
                                                        <option value="Fiji">Fiji</option>
                                                        <option value="Finland">Finland</option>
                                                        <option value="France">France</option>
                                                        <option value="French Guiana">French Guiana</option>
                                                        <option value="French Polynesia">French Polynesia</option>
                                                        <option value="French Southern Territories (the)">French Southern Territories (the)</option>
                                                        <option value="Gabon">Gabon</option>
                                                        <option value="Gambia (the)">Gambia (the)</option>
                                                        <option value="Georgia">Georgia</option>
                                                        <option value="Germany">Germany</option>
                                                        <option value="Ghana">Ghana</option>
                                                        <option value="Gibraltar">Gibraltar</option>
                                                        <option value="Greece">Greece</option>
                                                        <option value="Greenland">Greenland</option>
                                                        <option value="Grenada">Grenada</option>
                                                        <option value="Guadeloupe">Guadeloupe</option>
                                                        <option value="Guam">Guam</option>
                                                        <option value="Guatemala">Guatemala</option>
                                                        <option value="Guernsey">Guernsey</option>
                                                        <option value="Guinea">Guinea</option>
                                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                        <option value="Guyana">Guyana</option>
                                                        <option value="Haiti">Haiti</option>
                                                        <option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
                                                        <option value="Holy See (the)">Holy See (the)</option>
                                                        <option value="Honduras">Honduras</option>
                                                        <option value="Hong Kong">Hong Kong</option>
                                                        <option value="Hungary">Hungary</option>
                                                        <option value="Iceland">Iceland</option>
                                                        <option value="India">India</option>
                                                        <option value="Indonesia">Indonesia</option>
                                                        <option value="Iran (Islamic Republic of)">Iran (Islamic Republic of)</option>
                                                        <option value="Iraq">Iraq</option>
                                                        <option value="Ireland">Ireland</option>
                                                        <option value="Isle of Man">Isle of Man</option>
                                                        <option value="Israel">Israel</option>
                                                        <option value="Italy">Italy</option>
                                                        <option value="Jamaica">Jamaica</option>
                                                        <option value="Japan">Japan</option>
                                                        <option value="Jersey">Jersey</option>
                                                        <option value="Johnston Island">Johnston Island</option>
                                                        <option value="Jordan">Jordan</option>
                                                        <option value="Kazakhstan">Kazakhstan</option>
                                                        <option value="Kenya">Kenya</option>
                                                        <option value="Kiribati">Kiribati</option>
                                                        <option value="Korea (the Democratic People's Republic of)">Korea (the Democratic People's Republic of)</option>
                                                        <option value="Korea (the Republic of)">Korea (the Republic of)</option>
                                                        <option value="Kuwait">Kuwait</option>
                                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                        <option value="Lao People's Democratic Republic (the)">Lao People's Democratic Republic (the)</option>
                                                        <option value="Laos">Laos</option>
                                                        <option value="Latvia">Latvia</option>
                                                        <option value="Lebanon">Lebanon</option>
                                                        <option value="Lesotho">Lesotho</option>
                                                        <option value="Liberia">Liberia</option>
                                                        <option value="Libya">Libya</option>
                                                        <option value="Liechtenstein">Liechtenstein</option>
                                                        <option value="Lithuania">Lithuania</option>
                                                        <option value="Luxembourg">Luxembourg</option>
                                                        <option value="Macao">Macao</option>
                                                        <option value="Macedonia (the former Yugoslav Republic of)">Macedonia (the former Yugoslav Republic of)</option>
                                                        <option value="Madagascar">Madagascar</option>
                                                        <option value="Malawi">Malawi</option>
                                                        <option value="Malaysia">Malaysia</option>
                                                        <option value="Maldives">Maldives</option>
                                                        <option value="MV">MV</option>
                                                        <option value="Mali">Mali</option>
                                                        <option value="Malta">Malta</option>
                                                        <option value="Marshall Islands (the)">Marshall Islands (the)</option>
                                                        <option value="Martinique">Martinique</option>
                                                        <option value="Mauritania">Mauritania</option>
                                                        <option value="Mauritius">Mauritius</option>
                                                        <option value="Mayotte">Mayotte</option>
                                                        <option value="Mexico">Mexico</option>
                                                        <option value="Micronesia (Federated States of)">Micronesia (Federated States of)</option>
                                                        <option value="Midway Islands">Midway Islands</option>
                                                        <option value="Moldova (the Republic of)">Moldova (the Republic of)</option>
                                                        <option value="Monaco">Monaco</option>
                                                        <option value="Mongolia">Mongolia</option>
                                                        <option value="Montenegro">Montenegro</option>
                                                        <option value="Montserrat">Montserrat</option>
                                                        <option value="Morocco">Morocco</option>
                                                        <option value="Mozambique">Mozambique</option>
                                                        <option value="Myanmar">Myanmar</option>
                                                        <option value="Namibia">Namibia</option>
                                                        <option value="Nauru">Nauru</option>
                                                        <option value="Nepal">Nepal</option>
                                                        <option value="Netherlands (the)">Netherlands (the)</option>
                                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                        <option value="New Caledonia">New Caledonia</option>
                                                        <option value="New Zealand">New Zealand</option>
                                                        <option value="Nicaragua">Nicaragua</option>
                                                        <option value="Niger (the)">Niger (the)</option>
                                                        <option value="Nigeria">Nigeria</option>
                                                        <option value="Niue">Niue</option>
                                                        <option value="Norfolk Island">Norfolk Island</option>
                                                        <option value="Northern Mariana Islands (the)">Northern Mariana Islands (the)</option>
                                                        <option value="Norway">Norway</option>
                                                        <option value="Oman">Oman</option>
                                                        <option value="Pakistan">Pakistan</option>
                                                        <option value="Palau">Palau</option>
                                                        <option value="Palestine, State of">Palestine, State of</option>
                                                        <option value="Panama">Panama</option>
                                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                                        <option value="Paraguay">Paraguay</option>
                                                        <option value="Peru">Peru</option>
                                                        <option value="Philippines (the)">Philippines (the)</option>
                                                        <option value="Pitcairn">Pitcairn</option>
                                                        <option value="Poland">Poland</option>
                                                        <option value="Portugal">Portugal</option>
                                                        <option value="Puerto Rico">Puerto Rico</option>
                                                        <option value="Qatar">Qatar</option>
                                                        <option value="Réunion">Réunion</option>
                                                        <option value="Romania">Romania</option>
                                                        <option value="Russian Federation (the)">Russian Federation (the)</option>
                                                        <option value="Rwanda">Rwanda</option>
                                                        <option value="Samoa">Samoa</option>
                                                        <option value="San Marino">San Marino</option>
                                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                                        <option value="Senegal">Senegal</option>
                                                        <option value="Serbia">Serbia</option>
                                                        <option value="Seychelles">Seychelles</option>
                                                        <option value="Sierra Leone">Sierra Leone</option>
                                                        <option value="Singapore">Singapore</option>
                                                        <option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
                                                        <option value="Slovakia">Slovakia</option>
                                                        <option value="Slovenia">Slovenia</option>
                                                        <option value="Solomon Islands">Solomon Islands</option>
                                                        <option value="Somalia">Somalia</option>
                                                        <option value="South Africa">South Africa</option>
                                                        <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                                                        <option value="South Sudan">South Sudan</option>
                                                        <option value="Southern Rhodesia">Southern Rhodesia</option>
                                                        <option value="Spain">Spain</option>
                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                        <option value="Saint Barthélemy">Saint Barthélemy</option>
                                                        <option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
                                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                        <option value="Saint Lucia">Saint Lucia</option>
                                                        <option value="Saint Martin (French part)">Saint Martin (French part)</option>
                                                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                        <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                                        <option value="Sudan (the)">Sudan (the)</option>
                                                        <option value="Suriname">Suriname</option>
                                                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                        <option value="Swaziland">Swaziland</option>
                                                        <option value="Sweden">Sweden</option>
                                                        <option value="Switzerland">Switzerland</option>
                                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                        <option value="Taiwan (Province of China)">Taiwan (Province of China)</option>
                                                        <option value="Tajikistan">Tajikistan</option>
                                                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                        <option value="Thailand">Thailand</option>
                                                        <option value="Timor-Leste">Timor-Leste</option>
                                                        <option value="Togo">Togo</option>
                                                        <option value="Tokelau">Tokelau</option>
                                                        <option value="Tonga">Tonga</option>
                                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                        <option value="Tunisia">Tunisia</option>
                                                        <option value="Turkey">Turkey</option>
                                                        <option value="Turkmenistan">Turkmenistan</option>
                                                        <option value="Turks and Caicos Islands (the)">Turks and Caicos Islands (the)</option>
                                                        <option value="Tuvalu">Tuvalu</option>
                                                        <option value="Uganda">Uganda</option>
                                                        <option value="Ukraine">Ukraine</option>
                                                        <option value="United Arab Emirates (the)">United Arab Emirates (the)</option>
                                                        <option value="United Kingdom">United Kingdom</option>
                                                        <option value="United States" selected="">United States</option>
                                                        <option value="Upper Volta">Upper Volta</option>
                                                        <option value="Uruguay">Uruguay</option>
                                                        <option value="United States Minor Outlying Islands (the)">United States Minor Outlying Islands (the)</option>
                                                        <option value="Uzbekistan">Uzbekistan</option>
                                                        <option value="Vanuatu">Vanuatu</option>
                                                        <option value="Venezuela (Bolivarian Republic of)">Venezuela (Bolivarian Republic of)</option>
                                                        <option value="Viet Nam">Viet Nam</option>
                                                        <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                                        <option value="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
                                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                        <option value="Western Sahara">Western Sahara</option>
                                                        <option value="Yemen">Yemen</option>
                                                        <option value="Zambia">Zambia</option>
                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <input name="defaultcard" class="add_new_card_method" value="Submit" type="button"> 
                                                </div>
                                                </form>
                                            </div>
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
                                <?php echo do_shortcode('[bookly-staff-days-off]') ?>
                            </div>
                        </div>
                    </div>
                <?php elseif ($rol == 'student') :?>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h3>Certificates</h3>
                                <?php echo do_shortcode('[ld_certificate]') ?>
                                <hr><br>
                                <h3>Achievements</h3>
                                <?php echo do_shortcode('[gamipress_achievements]') ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">

    (function($) {
        $('.add_new_card_method').on('click', function(e){
               e.preventDefault();
               $('.ajax_image_section.learner_loader').show();
               $.post('/wp-admin/admin-ajax.php', {
                     action: 'muslimito_Add_Payment_Method',
                     cc_number: $('input[name="cc_number"]').val() ,
                     cardtype:  $('select[name="cardtype"]').val() ,
                     expirationmonth:  $('select[name="expirationmonth"]').val() ,
                     expirationyear: $('select[name="expirationyear"]').val() ,
                     nameoncard: $('input[name="nameoncard"]').val() ,
                     streetaddress1:  $('input[name="streetaddress1"]').val() ,
                     streetaddress2:  $('input[name="streetaddress2"]').val() ,
                     postalcode:  $('input[name="postalcode"]').val() ,
                     state:  $('select[name="state"]').val(),
                     country_code:  $('select[name="country"]').val(),
                     city:  $('input[name="city"]').val()
                 }, function (response){
                   if(response.success){
                     $.showInfo(response.data.message);
                   }else{
                     $.showError(response.data.message);
                   }
                //   console.log(response);
                   $('.ajax_image_section.learner_loader').hide();
                 })
         });
    }(jQuery));

</script>
