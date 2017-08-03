/**
 * Created by alexander.andreev on 03.08.2017.
 */
$(document).ready(function () {
    $("#loginButton").click(function (e) {
        e.preventDefault();

        var uname = $("#lusername").val();
        var password = $("#lpassword").val();

        $.ajax({
            type: 'GET',
            url: 'index.php?r=site/login&username=' + uname + '&password=' + password,
            success: function (data) {
                if(data === 'your login is empty')
                {
                    $(".validation").append(data);
                }
                if(data === 'your password is empty')
                {
                    $(".validation").append(data);
                }
                if(data === 'Your login or password is incorrect')
                {
                    $(".validation").append(data);
                }
                if(data === 'OK')
                {
                    window.location.reload();
                }
            }
        })
    });
})