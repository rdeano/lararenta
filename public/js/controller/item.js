

$(document).ready(function() {




    $("#edititempicture").change(function(){
      console.log('hello world');
        var input = this;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        // if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg"))
        //  {
        var reader = new FileReader();

        reader.onload = function (e) {
           $('#edititempictureimg').attr('src', e.target.result);
        }
       reader.readAsDataURL(input.files[0]);
        // }
        // else
        // {
        //   $('#img').attr('src', '/assets/no_preview.png');
        // }
    })

})



function showEditItemModal(id) {
    $("#editItemModal").modal();
    var action = $("#edititemaction").val();

    $.ajax({
        type:"GET",
        url: "selectQuery",
        data: {id:id,action:action},
        success: function(response,status) {

            var result = $.parseJSON(response);
            $("#edititemid").val(id);
            $("#editcategory").val(result[0].category_id);
            $("#edititemname").val(result[0].name);
            $("#edititemdesc").val(result[0].description);
            var amountforrent = (Math.round(result[0].amount_for_rent * 100)/100);
            $("#edititemamountforrent").val(amountforrent);
            $("#edititempictureimg").attr("src","storage/app/"+result[0].picture);

        }

    })
}
