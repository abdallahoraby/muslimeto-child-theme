<style>
    .upload_progress {
        background-color: #e3e3e3;
        width: 100% !important;
    }

    #upload {
        width: fit-content;
        margin: 1rem auto;
        display: block;
        background: var(--logo_blue);
        border: 0;
    }

    .progress-bar{
        transition: all 0.5s ease-in-out;
    }


</style>

<div class="bp-profile-content">


    <h2 class="screen-heading change-avatar-screen">

        Change Profile Photo
    </h2>



    <p class="bp-feedback info">
        <span class="bp-icon" aria-hidden="true"></span>
        <span class="bp-help-text"> Your profile photo will be used on your profile and throughout the site. </span>
    </p>

    <form action="" method="post" id="avatar-upload-form" class="standard-form" enctype="multipart/form-data" data-parsley-validate="">


        <input type="hidden" id="_wpnonce" name="_wpnonce" value="c657f26b59"><input type="hidden" name="_wp_http_referer" value="/account/">			<p class="bp-help-text">Click below to select a JPG, GIF or PNG format photo from your computer and then click 'Upload Image' to proceed.</p>

        <p id="avatar-upload">
            <label for="file" class="bp-screen-reader-text">Select an image</label>
            <input type="file" name="file" id="file" required>
<!--            <a href="#" id="upload" class="button"> Upload Image </a>-->
            <button class="button" id="upload" type="submit"> Upload Image </button>
            <input type="hidden" name="action" id="action" value="bp_avatar_upload">
            <input type="hidden" id="wp_user_id" value="<?= get_current_user_id() ?>" required>
        </p>

    </form>

    <div class="progress progress-striped upload_progress hidden">
        <div class="progress-bar"  role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 0%; background: var(--logo_blue);">
            <span class="sr-only">65% Complete</span>
        </div>
    </div>
    <div id="apf-response"> </div>

</div>



<script>

    (function($){

        $('#upload').on('click', function(e){
            e.preventDefault();
            let image_file = $('#file')[0].files[0];
            let wp_user_id = $('#wp_user_id').val();
            var result_div = $('#apf-response');
            if( ! image_file ){
                $.showError(' You must select image first.');
            } else {
                result_div.html('');
                $('.upload_progress').removeClass('hidden');
                $('.progress-bar').css('width', 20 + '%');
                var fd = new FormData();
                fd.append( "member_image_avatar", image_file);
                fd.append("wp_user_id", wp_user_id);
                fd.append( "action", 'upload_member_avatar');
                //Append here your necessary data
                jQuery.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        $('.progress-bar').css('width', 100 + '%');
                        if( data == 'uploaded' ){
                            $.showInfo('Image changed successfully');
                            location.reload();
                        } else {
                            $.showError(data);
                        }
                    },
                    error: function(MLHttpRequest, textStatus, errorThrown) {
                        alert(errorThrown);
                    }

                });

            }
        });

    }(jQuery));

</script>