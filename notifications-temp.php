<?php  /* template name: notifications-temp */ ?>
<?php  ?>
<?php get_header() ?>

<?php  acf_form_head(); ?>


<div class="container">

 <h2><?php the_title() ?></h2>


  <div>Available variables</div>
  <span class="aaa">{sender_id}</span>
  <span class="aaa">{receiver_id}</span>
  <span class="aaa">{cid}</span>
  <span class="aaa">{aid}</span>
      <?php
      $options = array(
      'form' => true,
      'post_id' => 3212 ,//'user_'.$_GET['user_id'],
      'fields' => array('field_625225b9ef552','field_62522632ef556' ,'field_62522de44fa0f','field_62522e6a4fa13','field_62522e7d4fa17','field_62522e914fa1b','field_62522ea44fa1f','field_62522eb54fa23','field_62522ec44fa27','field_62522eed4fa2b','field_62522efd4fa2f','field_625233b08d4ef','field_625233bc8d4f3','field_625233cd8d4f7','field_625233db8d4fb','field_625230b9ee58d','field_625441b7142a8','field_6254411a142a4','field_62544258204c1','field_6254426b204c5','field_6254427a204c9','field_62544288204cd','field_625230b2ee58c','field_62a101db7eb0c','field_62a102507eb0d','field_62a102867eb11','field_62a102967eb15','field_62a102a57eb19','field_62a102c37eb1d')
      );
      acf_form($options);  ?>
    </div>


<script type="text/javascript">
 (function($){

$('.aaa').on('click', function(e){
         const example = $('input:focus').val();
         const myVar = $(this).text();
          if (example.includes(myVar)) {
         const old = example.replace(myVar, '');
         $("input:focus").val(old) ;
        } else {
          $('input:focus').val(example + myVar);
        }
 });

}(jQuery));
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<?php  get_footer() ?>
