
$(function () {

    $.ajax({
        url: './footer.html',
        type: "GET"        
    }).done(function (res) {
        $("#footer").html(res);
    }).fail(function () {
        alert("POST error.");
    });

});
