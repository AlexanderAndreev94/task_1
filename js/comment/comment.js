/**
 * Created by alexander.andreev on 01.08.2017.
 */
$(document).ready(function () {
    $("#addComment").click(function (e) {
        e.preventDefault();

        var comment = $("#commentArea").val();
        var userId = $("#uid").attr("uid");
        var postId = $("#postId").attr("pid");

        $.ajax({
            type: "GET",
            url: "index.php?r=site/addcomment&comment="+comment+"&userId="+userId+"&postId=" + postId,
            success: function (data) {
                var decoded = JSON.parse(data);
                
                $(".items").append('<div class="view">' + '<b id="uid" uid="8" >Username:</b>' + '<a href="/test/index.php?r=site/view&amp;id='+ decoded.id +'">' + decoded.username+'</a><br />' + '<b>Content:</b>'+ decoded.content + '<br /> ' + '<b>Pub Date:</b>' + decoded.date_created + '<br /></div> ');
            }
        });
    });
});