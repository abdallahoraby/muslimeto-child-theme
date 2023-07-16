<style>
   .dataTable{
     max-height: 90vh!important;
     margin: 20px 0!important;
   }
   .Attendence_page{
     display: flex;
   }
   .container.load-table{
     margin-right: 0;
     width: 85%;
   }
   .attendence_actions{
     width: 20%;
     margin-top: 4rem;
     margin-right: 10px;
   }
   .table_summery_container{
     background: #fff;
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgb(0 0 0 / 10%);
   }
   .table_summery_container h5 ,.table_summery_container table{
     margin-bottom: 5px!important
   }
   .dataTables_wrapper .dataTables_filter{
     display: none!important;
   }
   .table.table-bordered{
    background: #fff;
    height: 85vh;
    box-shadow: 0 0 10px rgb(0 0 0 / 10%);
   }
   .table.table-bordered{
    background: #fff;
    height: 85vh;
    box-shadow: 0 0 10px rgb(0 0 0 / 10%);
}

.dataTable tbody td{border: 1px solid #eee!important;}

.dataTable thead th, .table:not(.table-dark) thead:not(.table-dark) th{
background: #fff;
}
.dataTable tbody td:last-child,.dataTable thead th:last-child{
position:sticky;
right:0;
z-index: 99;
}

.dataTable tbody td:first-child{
position:sticky;
left:0;
z-index: 99;
}
.dataTable tbody td:nth-child(odd),dataTable thead th:nth-child(odd){
background:#eee!important}
   .scroll-up-button{
     position: absolute;
    top: 40%;
    right: 0;
    z-index: 999;
    background: #fff;
    border: 0;
    padding: 0;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    box-shadow: 0 0 10px rgb(0 0 0 / 10%);
   }

    .scroll-down-button{
      position: absolute;
    bottom: 40%;
    right: 0;
    z-index: 999;
    background: #fff;
    border: 0;
    padding: 0;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    box-shadow: 0 0 10px rgb(0 0 0 / 10%);

    }
    .scroll-right-button{
      position: absolute;
      top: 0;
      right:40%;
      z-index: 999;
      width: 20px;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 20px;
      border-radius: 50%;
      background: #fff;
      border: 0;
      color: var(--main-color);
      box-shadow: 0 0 10px rgb(0 0 0 / 10%);

    }
    .scroll-left-button{
      position: absolute;
      top: 0%;
      left: 40%;
      z-index: 999;
      width: 20px;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 20px;
      border-radius: 50%;
      background: #fff;
      border: 0;
      color: var(--main-color);
      box-shadow: 0 0 10px rgb(0 0 0 / 10%);

    }
   .dataTable::-webkit-scrollbar {
      width: 5px;
      height: 5px;
   }

  .dataTable::-webkit-scrollbar-track {
    box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
  }

  .dataTable::-webkit-scrollbar-thumb {
    background-color: #475F7B;
  }
  .dataTable thead tr:not(tr.parent_tr){
    background: #f2f4f4!important;
    position: sticky;
    top: 47px;
    z-index: 100;
    box-shadow: 3px 1px 4px rgb(0 0 0 / 7%);
    overflow: hidden;
  }
   .dataTable thead th:first-child,.table:not(.table-dark) thead:not(.table-dark) th:first-child:not(.parents_row th){
         overflow: hidden;
         position: sticky;
         left: 0;
         z-index: 102;
         padding: 0px!important;
         border: 1px solid #fff!important;
   }
   .dataTable thead th,.table:not(.table-dark) thead:not(.table-dark) th{
   padding: 0 3px !important;
   border: 1px solid transparent!important;
   width: 25px!important;
   max-width: 25px!important;
   height: 30px;
   writing-mode: vertical-lr!important;
   font-size: .8rem;
   color: var(--main-color);
   font-weight: 500;
   text-align: left;
   white-space: nowrap;
   background: #f2f4f4;
   }
   .dataTable thead th span,.table:not(.table-dark) thead:not(.table-dark) th span{
     transform: translate(9px,0px) rotate(-172deg);
     font-size: .56rem;
     padding-left: 10px;
     font-weight: 600;
     color: var(--main-color);
     border-left: 1px solid #263c550f;
     display: block;
     overflow: hidden;
     text-overflow: ellipsis;
     text-transform: capitalize;
}
.table:not(.table-dark) thead:not(.table-dark) th:not(th:first-child){
  /* transform: translateX(13px); */
}
table.dataTable tbody tr{
  background: transparent!important;
}
.dataTable thead th select,.table:not(.table-dark) thead:not(.table-dark) th select{
       display: flex;
       margin-top: 0;
       border: 0;
       box-shadow: 0 0 10px rgb(0 0 0 / 10%);
       width: 25px;
       height: 100%;
      font-size: .5rem;
      max-width: 25px;
      padding-right: 10px!important;
}
   .dataTable tbody th,table.dataTable tr:last-child th{
     padding: 3px!important;
    border: 1px solid #fff!important;
    white-space: nowrap;

    background: #f2f4f4;
    font-size: .56rem;
    color: var(--main-color);
    font-weight: 500;
    line-height: 10px;

   }
   .dataTable tbody th{
     position: sticky;
     left: 0;
     z-index: 99
   }
   .dataTable tbody td{
       padding: 3px!important;
       border:1px solid #263c550f!important;
       width: 25px!important;
       max-width: 25px!important;
       min-width: 25px!important;
       font-size: .6rem;
       font-weight: 500;
       position: relative;
   }
.dataTable tbody td:hover .popover_td_attendance{
  display: block;
}
.dataTable tbody td p{
  margin-bottom: 0!important;
  white-space: nowrap;
  font-size: .6rem!important;
  width: 100%;
  height: 100%;
}
.popover_td_attendance{
  display: none;
  position: absolute;
    min-height: 100px;
    background: #fff;
    width: 200px;
    box-shadow: 0 0 10px rgb(0 0 0 / 10%);
    border-radius: 15px;
    top: -22px;
    left: 30px;
    border: 1px solid #e2e0e0;
    z-index: 999;
    padding: 3px;
}
.popover_td_attendance::after {
    content: " ";
    height: 0px;
    width: 0px;
    position: absolute;
    left: -10px;
    top: 47px;
    transform: translateY(-50%);
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    border-right: 10px solid #fff;
}
/* td[data-status="attended"]{
    background-color: #dff9ec !important;
  }
td[data-status="attended"] p{
     color: #39da8a !important;
  }
td[data-status="no-show-s"]{
  background-color: #ffe5e5 !important;
}
td[data-status="no-show-s"] p{
   color: #ff5b5c !important;
} */
.sec-title{
    width: 70px;
    display: inline-flex;
    justify-content: start;
    align-items: center;
    font-size: .5rem!important;
    color: var(--main_color);
    font-weight: 600;
}
.sec-title i{
    font-size: .75rem!important;
    margin-right: 3px;
}
.class_time_Attendance p.attendance_details span{display: inline-flex!important;}
.class_time_Attendance p[data-status="attended"].attendance_details{
  background-color: #dff9ec !important;
  color: #39da8a !important;
}
.class_time_Attendance p[data-status="attended"].attendance_details span{
  color: #39da8a !important;
}
.class_time_Attendance p[data-status="no-show-s"].attendance_details{
  background-color: #ffe5e5 !important;
  color: #ff5b5c !important;
}
.class_time_Attendance p[data-status="no-show-s"].attendance_details span{
  color: #ff5b5c !important;
}
class_time_Attendance p[data-status="no-show-s"].attendance_details span i,.attendance_details li i{
    font-size: .7rem!important;
    margin-right: 3px!important;
}
.attendance_details{
  display: flex;
  justify-content: space-between;
}
.class_time_Attendance{

}
.class_time_Attendance p:first-child{
    font-size: .45rem!important;
    padding: 3px;
    color: var(--main-color)!important;
    line-height: 8px;
    text-align: left;
}
.class_time_Attendance p:nth-child(2){
    font-size: .45rem!important;
    padding: 3px;
    color: var(--main-color)!important;
    line-height: 8px;
}
.class_info_Attendance h3{
    margin-bottom: 0!important;
    text-align: left;
    padding: 3px;
    font-size: .55rem;
    color: var(--main-color);
    line-height: 5px;
    white-space: nowrap;
    width: 90%;
    overflow: hidden;
    text-overflow: ellipsis;
    display: block;
}
.class_info_Attendance p{
    text-align: left;
    padding: 3px;
    line-height: 5px;
    font-size: .5rem!important;
    font-weight: normal;
}
.class_info_Attendance ul{
   margin: 0!important;
    list-style: none;
    padding-inline-start: 0;
    text-align: left;
    padding: 3px;
}
.class_info_Attendance ul li{
    font-size: .5rem;
    font-weight: normal;
    line-height: 10px;
}
section{
    border-bottom: 1px solid #eee;
    display: block;
    margin-bottom: 5px;
}
section:last-child{
  border-bottom: 0!important;
}
.container.load-table{
  margin-top: 4rem!important;
  position: relative;
}
.status-list{
    margin: 0!important;
    list-style: none;
    display: flex;
    flex-wrap: wrap;
    justify-content: start;
    gap: 1px;
    width: 30px;
}
.status-list li{
  width: 8px!important;
  height: 2px!important;
  overflow: hidden;
  opacity: .7;
}
li.status-Attended{background: rgb(57, 218, 138)}
li.status-no-show-s{background:rgb(255, 91, 92) }
li.status-attended-sl{background:rgb(253, 172, 65) }
li.status-noshow-teacher{background:rgb(0, 207, 221) }
li.status-attended-tl{background:#5a8dee }
li.status-holiday{background:#69809a }
.attended::after,.attended-tl::after,.attended-sl::after{
    content: " ";
    background: rgb(57, 218, 138);
    width: 8px!important;
    height: 3px!important;
    overflow: hidden;
    opacity: .7;
    bottom: 0;
    left: 0;
    position: absolute;
}
.no-show-s::before{
    content: " ";
    background:rgb(255, 91, 92);
    width: 8px!important;
    height: 3px!important;
    overflow: hidden;
    opacity: .7;
    bottom: 0;
    left: 10px;
    position: absolute;
}
.holiday span::after{
  content: " ";
    background:rgb(255, 91, 92);
    width: 8px!important;
    height: 3px!important;
    overflow: hidden;
    opacity: .7;
    bottom: 0;
    left: 10px;
    position: absolute;
}

.legend-status-list{
  display: flex;
  flex-wrap: wrap;
  justify-content: start;
}
.legend-status-list p{
  margin-bottom: 0!important;
  margin-right: 10px!important;
  white-space: nowrap;
  width: 100px;
}
.legend-status-list p span:first-child{
   color: #fff!important;
    font-size: .6rem;
    display: inline-flex;
    padding: 0;
    justify-content: center;
    align-items: center;
}
.legend-color{
  width: 16px;
  height: 16px;
  display: inline-flex;
}
.legend-text{
  font-size: .6rem!important;
}
.legend-status-Attended .legend-color{background: rgb(57, 218, 138)}
.legend-status-noshow-student .legend-color{background:rgb(255, 91, 92) }
.legend-status-excused-student .legend-color{background:rgb(253, 172, 65) }
.legend-status-noshow-teacher .legend-color{background:rgb(0, 207, 221) }
.legend-status-excused-teacher .legend-color{background:#5a8dee }
.legend-status-holiday .legend-color{background:#69809a }

.dataTables_info{
    font-size: .6rem!important;
    color: var(--main-color)!important;
}
.table:not(.table-dark) thead:not(.table-dark) .parents_row th{
  writing-mode: horizontal-tb!important;
  font-size: .6rem!important;
  text-overflow: ellipsis;
  overflow: hidden;
  height: 10px;
  border: 1px solid #fff!important;
  transform:translateX(37px);
  position: relative;
}
.table:not(.table-dark) thead:not(.table-dark) .parents_row th:nth-child(odd){
  background: #5ec6f30f;
}
.total_day{
    position: sticky!important;
    right: 0;
    background-color: #f2f4f4!important;
    z-index: 99;
    padding: 3px!important;
    width: 25px!important;
    max-width: 25px!important;
}
.attendence-legend{
    align-self: center;
    justify-self: center;
    background: #fff;
    padding: 5px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 40px auto;
    box-shadow: 0 0 10px rgb(0 0 0 / 10%);
    width: fit-content;
}
.dataTables_info{
  display: none!important;
}
.scroll-btns-vertical{
  position: absolute;
    top: 1.2rem;
    right: 5px;
    background: #fffafabd;
    width: 22px;
    height: 100%;
    z-index: 100;
    box-shadow: 0 0 10px rgb(0 0 0 / 10%);
    display: none;
}
.scroll-btns-horizontal{
  position: absolute;
  top: 85vh;
  /* right: 20px; */
  background: #fffafabd;
  width: 100%;
  height: 30px;
  z-index: 100;
  box-shadow: 0 0 10px rgb(0 0 0 / 10%);
  display: none;
}
.parent_tr{
    z-index: 999!important;
    position: sticky;
    top: 0;
    background: #f2f4f4;
    border: 0;
    transform: translateX(4px);
}
.parent_tr td{
     height: 25px;
      max-height: 25px;
      min-height: 25px;
      white-space: nowrap!important;
      border: 0;
      border-bottom: 0!important;
      border-right: 1px solid #fff!important;
}
.parent_tr td:first-child{
  border-right: 0!important
}
.parent_td{
    padding: 5px!important;
    max-width: 25px;
}
.parent_td span{
  display: block;
    max-width: 25px;
    overflow: hidden;
    text-overflow: ellipsis;
}
.container.load-table .dataTables_wrapper{

    position: relative;
    width: fit-content!important;
    overflow: hidden;
    max-width: 100%;
    max-height: 100vh;
}
.total-tr td{
    position: sticky!important;
    bottom: 0;
    z-index: 99;
    background-color: #f2f4f4!important;
    box-shadow: 0 0 10px rgb(0 0 0 / 10%)!important;
}
.total-tr td:first-child{
  left: 0!important
}
td,th{
  text-align: center;
  vertical-align: middle;
}
pre{margin-top: 40px!important}
.class_mins{text-align: left;}
.sel_container select{
    border: 0!important;
    height: 30px!important;
    box-shadow: 0 0 10px rgb(0 0 0 / 10%)!important;
}
.table-summery{border:0!important}
.table-summery th {
    background: #EEE;
    border-color: #BBB;
    padding: 5px;
    font-size: .7rem!important;
    color: var(--main-color)!important
}
.table-summery td{
  border-color: #DDD;
  padding: 5px;
  font-size: .7rem!important;
  white-space: nowrap!important;
}
.tt_hours{background-color:green!important;color:white!important;}
.container.load-table label{
  font-size: .6rem!important;
}
.table_summery_container h5{
  font-size: .8rem!important;
}
</style>
<?php /*Template Name: teacher-attendance*/ ?>
<?php get_header();

$date = date('Y-m');
$newdate =  date('Y-m-d',strtotime($date.' -1 months'));
$st =  date('Y-m-d', strtotime($newdate. '+ 21 days'));
$en =  date('Y-m-d', strtotime("+1 months", strtotime($st)));

$teacher_id = 51;
$teacher_info=get_userdata($teacher_id);
$all_childs = [];
$c_data=[];
$staff_id = getStaffId( $teacher_id );
$res = $wpdb->get_results("SELECT zrsap_bookly_customer_appointments.appointment_id, zrsap_bookly_customer_appointments.customer_id, zrsap_bookly_customer_appointments.custom_fields,zrsap_bookly_customer_appointments.status , zrsap_bookly_appointments.staff_id, zrsap_bookly_appointments.start_date, zrsap_bookly_appointments.end_date FROM zrsap_bookly_customer_appointments INNER JOIN zrsap_bookly_appointments ON zrsap_bookly_customer_appointments.appointment_id = zrsap_bookly_appointments.id HAVING zrsap_bookly_appointments.staff_id = $staff_id AND zrsap_bookly_appointments.start_date >= '{$st}' AND
   zrsap_bookly_appointments.end_date <= '{$en}' ORDER BY zrsap_bookly_appointments.start_date ASC");
$all_childs = array_unique(array_column( $res, 'customer_id' ));
// pre_dump($res);
foreach ($res as $val){
  $types = [ "one-on-one","one-to-one" ];
  $class = json_decode($val->custom_fields);
  $group_id = $class[0]->value ;
  if(in_array($val->customer_id , $all_childs)
  && ( $val->status === "attended" ||  $val->status === "holiday" ||  $val->status === "attended-tl" ||  $val->status === "no-show-s" || $val->status === "attended-sl" ) &&  in_array(getBBgroupType($group_id), $types) ){
      $c_data[$val->customer_id][] = $val;
  }
}
$all_childs = array_keys($c_data); ?>

<?php  if(!empty($all_childs)) : $args = array(
    'role__in'    => [ 'teacher', 'team_leader' ],
    'orderby' => 'user_nicename',
    'order'   => 'ASC'
);
$techers = get_users( $args );

$admin_roles = ["administrator", "head_of_pd",  "support", "hr", "head_of_support", "head_of_education"];
$user_meta = get_userdata(get_current_user_id());  ?>

<div class="Attendence_page">
<div class="container load-table">
  <div class="sel_container">
    <label for="">Teacher</label>
    <select class="ch_teacher" name="">
      <?php  if( array_intersect($admin_roles, $user_meta->roles ) ) : ?>
      <?php foreach ($techers as $techer):?>
      <option value="<?php echo $techer->ID ?>" <?php if($techer->ID == 51){echo 'selected';} ?>>
        <?php echo $techer->display_name ?>
      </option>
    <?php endforeach; ?>
  <?php elseif ( in_array( 'team_leader', (array) $user_meta->roles ) ):
      $teachers = get_team_teachers(get_current_user_id()); ?>
        <option value="" selected disabled>---</option>
    <?php foreach ($teachers as $teacher): $t_user = get_user_by( 'email', $teacher['email'] ); if($t_user->ID):?>
        <option value="<?php echo $t_user->ID ?>"><?php $t_user->display_name ?></option>
      <?php endif; endforeach; ?>
    <?php elseif ( in_array( 'teacher', (array) $user->roles ) ): ?>
    <option value="<?php echo $ser_meta->ID ?>" selected><?php echo $user_meta->display_name ?></option>
  <?php endif; ?>
    </select>
    <label for="">Month</label>
    <select class="ch_moth" name="">
      <?php
      $begin = new DateTime('2022-09-01');
      $end = new DateTime(date("Y-m-d"));
      $interval = DateInterval::createFromDateString('1 month');
      $period = new DatePeriod($begin, $interval, $end);
      foreach ($period as $dt) :?>
        <option value="<?php echo $dt->format("Y-m-d"); ?>" <?php if($dt->format("Y-m") == date("Y-m")){echo "selected";} ?>>
          <?php echo $dt->format("F") . "/" .  $dt->format("Y"); ?>
        </option>
     <?php endforeach; ?>
    </select>
  </div>
  <div class="load_t_h">
    <table class="table table-bordered table-responsive attendence-table">
      <thead>
        <tr class="parent_tr">
          <td>##</td>
          <?php if( $all_childs ): foreach ($all_childs as $val) : $child = get_userdata($val);
              $prnt_id = getParentID($val); $pnrt_info = get_userdata($prnt_id);?>
              <td colspan="" data-balloon-pos="down" data-balloon="<?php echo $pnrt_info->display_name?$pnrt_info->display_name:$pnrt_info->ID  ?>" class="parent_td">
              <span><?php echo $pnrt_info->display_name?$pnrt_info->display_name:$pnrt_info->ID  ?></span>
              </td>
               <?php endforeach;endif; ?>
         </tr>
        <tr>
          <th></th>
        <?php if( $all_childs ): foreach ($all_childs as $val) : $child = get_userdata($val); ?>
             <th scope="col"><span><?php echo $child->first_name?$child->first_name:$val; ?></span></th>
           <?php endforeach;endif; ?>
             <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $begin = new DateTime($st);
        $end = new DateTime($en);
        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end);
        $x=0;foreach ($period as $dt) : $total=0;$att_hours=0;$total_ijaza=0; ?>
                <tr>
                 <td><span><?php echo $dt->format("d") .'</span>-<span>'. $dt->format("M") .'</span>'; ?></td>
                <?php if(!empty($c_data)): foreach ($all_childs as $value):
                      $child = getCustomerFullName($value);
                      echo '<td><div class="popover_td_attendance">';
                      $t=1;$o_time = 0; $statues=" ";
                      foreach ($c_data[$value] as $nval):
                      $class = json_decode($nval->custom_fields);
                      $total_inx = array_search(2583, array_column($class, 'id'));
                      $group_name = bp_get_group_name($class[0]->value);
                      $c_Date = new DateTime($nval->start_date);
                      if( $dt->format("Y-m-d") == $c_Date->format("Y-m-d") ):
                        $sp_entry_id = getBBgroupGFentryID($class[0]->value);
                        $bookly_service_id = getBooklyServiceId($sp_entry_id);
                        $minutes = $class[$total_inx]->value; $total+=$minutes;
                        $o_time+=$minutes; $statues .= " " . $nval->status;
                        if($bookly_service_id == 18){$total_ijaza+=$minutes;}?>
                       <section>
                         <p class="class_status"><span class="status-<?php echo $nval->status;?>"></span></p>
                          <div class='class_time_Attendance'>
                               <p><span class="sec-title"><i class='bb-icon-calendar bb-icon-l'></i>Date:</span><?php echo $dt->format("Y-m-d") ; ?></p>
                               <p data-status='<?php echo $nval->status;?>' class='attendance_details'>
                                 <span><span class="sec-title"><i class='bb-icon-checkbox bb-icon-l'></i>Status:</span><?php echo $nval->status;?></span>
                               </p>
                               <p class="class_mins"><span class="sec-title"><i class='bb-icon-user-clock bb-icon-l'></i>Class Time:</span><?php echo $minutes ?></p>
                           </div>
                         <div class='class_info_Attendance'>
                           <h3><span class="sec-title"><i class='bb-icon-user-card bb-icon-l'></i>CID:</span><?php echo $group_name?$group_name:$class[0]->value; ?></h3>
                               <p>
                                 <span><span class="sec-title"><i class='bb-icon-user bb-icon-l'></i>Teacher</span><?php echo $teacher_info->display_name ?></span>
                                 <span>
                                  <ul>
                                    <li><span class="sec-title"><i class='bb-icon-users bb-icon-l'></i>Learners:</span><?php echo $child ?></li>
                                  </ul>
                                 </span>
                               </p>
                          </div>
                       </section>
                    <?php $t++; endif;endforeach; echo '</div>';if($o_time):?>
                      <p class="<?php echo $statues ?>"> <span> <?php echo $o_time ; ?> </span> </p>
                    <?php endif; echo '</td>'; endforeach; endif; ?>
                    <td><?php echo $total ?></td>
                  </tr>
           <?php $x++;  $att_hours+=$total;  endforeach;  ?>
               <tr>
                 <td>Total</td>
                 <?php $tot_hours=0; foreach ($all_childs as $all_child) :$times=0; echo '<td>';
                        foreach($c_data[$all_child] as $nval):
                      $datetime1 = strtotime($nval->start_date);
                      $datetime2 = strtotime($nval->end_date);
                      $interval  = abs($datetime2 - $datetime1);
                      $minutes   = round($interval / 60); $times += $minutes; ?>
                <?php endforeach; echo $times . '</td>'; $tot_hours+=$times; endforeach;  ?>
                <td class="tt_hours" style="background-color:green!important"><?php echo $tot_hours/60 .' h'; ?></td>
               </tr>
      </tbody>
    </table>
    <input type="hidden" class="hours_inp" value="<?php echo ($tot_hours/60) . ' h'?>">
    <input type="hidden" class="ijaza_inp" value="<?php echo ($total_ijaza/60) . ' h'?>">
    <input type="hidden" class="total_inp" value="<?php echo ($tot_hours-$total_ijaza) / 60 . ' h'; ?>">
<?php else: ?>
<h3 class="p-5 text-center">No attendance data found for this month.</h3>
<?php endif;?>
</div>
</div>
  <!-- end of table area -->
  <!-- Action area -->
  <div class="attendence_actions">
    <!-- table summery -->
    <div class="table_summery_container">
      <h5>Summery</h5>
     <table class="table-summery">
      <tr>
        <th>Total Hrs</th>
        <td class="summery_tt_hours">0</td>
      </tr>
      <tr>
        <th>Ijaza total hours</th>
        <td class="ijaza_tot"><?php echo ($total_ijaza/60) . ' h'?></td>
      </tr>
      <tr>
        <th>Total (Others)</th>
        <td class="outijaza_tot"><?php echo ($tot_hours-$total_ijaza) / 60 . ' h'; ?></td>
      </tr>

    </table><br>
  <table class="table-summery">
       <h5>No Shows</h5>
     <tr>
       <th>Num of No Shows</th>
       <td class="num_noshows">0</td>
     </tr>
    </table>
    </div>

  </div>
</div>

<?php

 get_footer();?>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
     (function($){

        $('.table-bordered').DataTable({"ordering": false,"bPaginate": false,});
        $('.tt_hours').css('background-color','green')
        $(document).on('change','.ch_teacher, .ch_moth',function(e){
         e.preventDefault();
         $('body').append('<div class="ajax_image_section ch_moth_loader"><div class="ajaxloader"></div></div>');
         const teacher = this.value;
         $.post('<?php echo admin_url('admin-ajax.php'); ?>', {
                action: 'load_teacher_attd_table',
                teacher:$('.ch_teacher').find(':selected').val(),
                month: $('.ch_moth').find(':selected').val(),
                }, function (response){
                $('.ch_moth_loader').remove();
                $('.load_t_h').html(response);
                $('td.ijaza_tot').text($('.ijaza_inp').val() );
                $('td.summery_tt_hours').text($('.hours_inp').val());
                $('td.outijaza_tot').text($('.total_inp').val());
                $('.table-bordered').DataTable({"ordering": false,"bPaginate": false,});
                })
          });



          // scrll ctrls
          $('#DataTables_Table_0_wrapper').append('<div class="scroll-btns-vertical"><button class="scroll-up-button"><i class="Arrow Left bb-icon-arrow-up bb-icon-l"></i></button><button class="scroll-down-button"><i class="Arrow Left bb-icon-arrow-down bb-icon-l"></i></button></div>')
          $('#DataTables_Table_0_wrapper').append('<div class="scroll-btns-horizontal"><button class="scroll-left-button"><i class="Arrow Left bb-icon-arrow-left bb-icon-l"></i></button><button class="scroll-right-button"><i class="Arrow Left bb-icon-arrow-right bb-icon-l"></i></button></div>')
          $('.scroll-up-button').on('click', function() {
              var x = $('.attendence-table').scrollTop(); // current page position
              $('.attendence-table').scrollTop(x - 150); // scroll up 150px
          });


          $('.scroll-down-button').on('click', function() {
              var y = $('.attendence-table').scrollTop(); // current page position
              $('.attendence-table').scrollTop(y + 150); // scroll down 150px
          });

          $('.scroll-left-button').on('click', function() {
              var n = $('.attendence-table').scrollLeft(); // current page position
              $('.attendence-table').scrollLeft(n - 150); // scroll down 150px
          });

          $('.scroll-right-button').on('click', function() {
              var z = $('.attendence-table').scrollLeft(); // current page position
              $('.attendence-table').scrollLeft(z + 150); // scroll down 150px
          });
          // display hide scroll byns
                  document.querySelector('.attendence-table').addEventListener("mousemove",function(e){

                    const rectt = document.querySelector('.attendence-table').getBoundingClientRect();
                    // item width&height
                    const widthtable= document.querySelector('.attendence-table').offsetWidth;
                    const heighttable= document.querySelector('.attendence-table').offsetHeight;
                    // Mouse position
                    const width_x = e.clientX - rectt.left;
                    const height_y = e.clientY - rectt.top;
                    // dif
                    const checkWidthpos = widthtable-width_x;
                    const checkHeightpos = heighttable-height_y;

                    if(checkWidthpos < 90 ){
                       document.querySelector('.scroll-btns-vertical').style.display="flex";
                    }else if(checkHeightpos < 10){
                         document.querySelector('.scroll-btns-horizontal').style.display="flex";
                    }
                });
                 document.querySelector('.scroll-btns-vertical').addEventListener("mouseout",function(e){
                   document.querySelector('.scroll-btns-vertical').style.display="none";
                 })
                 document.querySelector('.scroll-btns-horizontal').addEventListener("mouseout",function(e){
                   document.querySelector('.scroll-btns-horizontal').style.display="none";
                 })

                 // handle total hrs in summery table_summery_container
                 $(".summery_tt_hours").text( $(".tt_hours").text());
                 $(".num_noshows").text($('p.no-show-s').length);
   })(jQuery);
 </script>
<style media="screen">
  /* td[data-status="attended"] {background-color:#95e395}          $('#DataTables_Table_0_wrapper').prepend('<div class="scroll-btns-vertical"><button class="scroll-up-button"><i class="Arrow Left bb-icon-arrow-up bb-icon-l"></i></button><button class="scroll-down-button"><i class="Arrow Left bb-icon-arrow-down bb-icon-l"></i></button></div>')
  $('#DataTables_Table_0_wrapper').prepend('<div class="scroll-btns-vertical"><button class="scroll-up-button"><i class="Arrow Left bb-icon-arrow-up bb-icon-l"></i></button><button class="scroll-down-button"><i class="Arrow Left bb-icon-arrow-down bb-icon-l"></i></button></div>')

  td[data-status="no-show-s"] {background-color:#ff7070} */

</style>
