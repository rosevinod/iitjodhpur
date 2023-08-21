
$(function () {
    
    $('#login').click(function (e) {

        let self = $(this);

        e.preventDefault(); // prevent default submit behavior

        var data = $('#login-form').serialize(); // get form data

        // sending ajax request to login.php file, it will process login request and give response.
        $.ajax({
            url: './login.php',
            type: "POST",
            data: data,
        }).done(function (res) {
            res = JSON.parse(res); 
            console.log(res);
            if (res['status']) // if login successful redirect user to secure.php page.
            {
                location.href = "dashboard.php"; // redirect user to secure.php location/page.
            } else {
                var errorMessage = "";
                $.each(res['msg'], function(index, message) {
                    errorMessage += '' + message + '';
                });
                alert(errorMessage);
                                
            }
        }).fail(function () {
            alert("POST error.");
        });
    });
});
