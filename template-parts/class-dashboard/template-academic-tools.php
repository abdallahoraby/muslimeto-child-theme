<?php

    echo do_shortcode('[mus_announcement_shortcode]');

?>
<script>
  let checkbtn = $("#teest");
      if($(checkbtn).attr('checked','checked')){
       $('.academic-tools-content .btn').html('Send Test')
      }else{
      $('.academic-tools-content .btn').html('Send To All Parents')
       }

       $(checkbtn).on("change",function(e){
         if(e.target.checked){
            $('.academic-tools-content .btn').html('Send Test')
           }else{
           $('.academic-tools-content .btn').html('Send To All Parents')
            }
       })
</script>
