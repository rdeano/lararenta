$(document).ready(function() {



})


function showOwnerInfoModal(userid) {
    var action="showownerinfo";

    $.ajax({
        type:"GET",
        url: "../selectQuery",
        data: {userid:userid,action:action},
        success: function(response,status) {
            var result = $.parseJSON(response);
            // console.log(result);

            $("#ownerpicture").attr('src','../storage/app/'+result[0].picture)
            $("#ownername").html(result[0].name);
            $("#owneraddr").html(result[0].address);
            $("#ownercontactnum").html(result[0].contactnumber);
            $("#ownerabout").html(result[0].about);

            $("#ownerInfoModal").modal();
        }

    })

}
