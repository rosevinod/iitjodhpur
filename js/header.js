
$(function () {

    $.ajax({
        url: './header.html',
        type: "GET"        
    }).done(function (res) {
        $("#header").html(res);
    }).fail(function () {
        alert("POST error.");
    });

});
