$(function () {

    var url_params = new URLSearchParams(window.location.search);
    //alert(url_params.get('guid'))
    $.ajax({
        url: './update.php?guid=' + url_params.get('guid'),
        type: "POST",
        data: url_params.get('guid'),
    }).done(function (res) {
        console.log(res);
        res = JSON.parse(res);
        if (res['status']) // if login successful redirect user to secure.php page.
        {
            var email = "";
            $.each(res['data'], function (index, message) {
                email = message.email;
            });
            $('#email').attr('value', email);
            $('#guid').attr('value',url_params.get('guid'))
        } else {
            alert(res['msg']);
        }
    }).fail(function () {
        alert("POST error.");
    });

    $('#update').click(function (e) {

        let self = $(this);

        e.preventDefault(); // prevent default submit behavior

        var data = $('#update-form').serialize(); // get form data

        // sending ajax request to login.php file, it will process login request and give response.
        $.ajax({
            url: './update.php',
            type: "POST",
            data: data,
        }).done(function (res) {
            console.log(res);
            res = JSON.parse(res);            
            if (res['status']) {
                alert(res['msg']);
                location.href = "dashboard.php";
            } else {
                alert(res['msg']);
            }
        }).fail(function () {
            alert("POST error.");
        });
    });
});
