/**
 * Created by alexander.andreev on 03.08.2017.
 */
$(document).ready(function () {
    $("#regButton").click(function (e) {
        e.preventDefault();

        var username = $("#username").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var rpassword = $("#password_repeat").val();

        $.ajax({
            type: 'GET',
            url: 'index.php?r=site/register&username=' + username + '&email=' + email + '&password=' + password + '&rpassword=' + rpassword,
            success: function (data) {
                if(data === 'OK'){
                    window.location.reload();
                }
                if(data === 'passwords does not match' || data === 'email is not correct')
                {
                    $(".validation").append(data);
                }
            }
        })
    })
});