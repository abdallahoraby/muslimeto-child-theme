<?php
 // echo admin_url('admin-ajax.php');
 global $wpdb;
 $all_nots = $wpdb->get_results("SELECT * FROM notification_log" );
 ?>
<!doctype html>
<html class="no-js" lang="">
<head>
 <meta charset="utf-8">
 <title>Notifications Log</title>
 <meta name="description" content="">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>
<?php  acf_form_head();  ?>



<div class="container" style="padding:20px;padding-top:60px">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Notifications Messages</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Notifications Log</button>
    </li>
  </ul>
  <br>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

        <?php
        $options = array(
        'form' => true,
        'post_id' => 3144 ,//'user_'.$_GET['user_id'],
        'fields' => array('field_625225b9ef552','field_62522632ef556' ,'field_62522de44fa0f','field_62522e6a4fa13','field_62522e7d4fa17','field_62522e914fa1b','field_62522ea44fa1f','field_62522eb54fa23','field_62522ec44fa27')
        );
        acf_form($options); ?>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
     <table class="table table-hover" id="myTable">
     <thead>
       <tr>
         <th scope="col">#</th>
         <th scope="col">Sender id</th>
         <th scope="col">Receiver id</th>
         <th scope="col">Type</th>
         <th scope="col">CID</th>
         <th scope="col">AID</th>
         <th scope="col">Message</th>
         <th scope="col"> Send Date </th>
       </tr>
     </thead>
     <tbody>
<?php $x=1;foreach ($all_nots as $all_not): ?>
       <tr>
           <th scope="row"><?php echo $x ?></th>
           <td> <?php echo $all_not->sender_id  ?></td>
           <td> <?php echo $all_not->receiver_id  ?></td>
           <td> <?php echo $all_not->type  ?></td>
           <td> <?php echo $all_not->cid  ?></td>
           <td> <?php echo $all_not->aid  ?></td>
           <td> <?php echo $all_not->message  ?></td>
           <td> <?php echo $all_not->send_date  ?></td>
       </tr>
<?php $x++;endforeach; ?>
     </tbody>
   </table></div>

  </div>

  </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
 (function($){
    $('#myTable').DataTable( {
        "order": [[ 0, "desc" ]],
        //"data": '../ajax/data/arrays.txt'
    });
$('input[type="checkbox"]').on('change', function(e){
         const example = $('input:focus').val();
         const myVar = this.value;

          if (example.includes(myVar)) {
         const old = example.replace(myVar, '');
         $("input:focus").val(old) ;
        } else {
          $('input:focus').val(example + myVar);
        }
 });

}(jQuery));
</script>

</body>

</html>
