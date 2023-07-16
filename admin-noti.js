

(function($){


 $(document).on("click",".acf-field-621f6fa5e647c > div.acf-input",function(e) {
       e.preventDefault();
       const icon = '<i class="fas fa-spinner fa-2x fa-pulse icon_no"></i>';
       $(this).append(icon);
       const n_type = [];
       const brief = $('#acf-field_621f6f16e647a').val();
       const message = $('#tinymce').val()
      $("div.acf-field.acf-field-checkbox.acf-field-621f6fdce647d > div.acf-input > ul li input:checkbox:checked").each(function(){
        n_type.push($(this).val());
      });
      $.post('/wp-admin/admin-ajax.php', {
      n_type: n_type,
      brief:brief,
      message:message,
      action: 'send_announcement_all',
      }, function (response){
      toastr[response.type](response.message);
      $('.icon_no').remove()
      })

     });

}(jQuery));
