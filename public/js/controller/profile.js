$(document).ready(function() {


    $("#profileimage").change(function(){
        console.log('hello world');
        var input = this;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        // if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg"))
        //  {
        var reader = new FileReader();

        reader.onload = function (e) {
           $('#userprofileimg').attr('src', e.target.result);
        }
       reader.readAsDataURL(input.files[0]);
        // }
        // else
        // {
        //   $('#img').attr('src', '/assets/no_preview.png');
        // }
    })


})
