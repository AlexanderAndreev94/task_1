/**
 * Created by alexander.andreev on 01.08.2017.
 */
$(document).ready(function () {
    $("#submitComment").click(function (e) {
        e.PreventDefault();

        var comment = $("#commentArea").val();
        var userId = $("#uid").attr("uid");

        $.ajax({
            type: "GET",
            url: "index.php?r=comment/add&comment="+comment+"&uid="+userId,
            success: function (data) {

            }
        })
    })
})