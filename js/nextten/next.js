/**
 * Created by alexander.andreev on 05.07.2017.
 */
$(document).ready(function(){
    $("#nextButton").click(function () {
        var category = $(this).attr("catId");
        var offset = $(this).attr("offset");

        $.ajax({
            type: 'GET',
            url: 'index.php?r=site/index&catId=' + category + '&offset=' + offset,
            success: function(data)
            {
                var decData = JSON.parse(data);
                $(".view").remove();

                for(var i = 0; i < decData.length; i++)
                {
                    $('<div class="view">'+
                        '<b>Title</b>' +
                        '<a href="index.php?r=site/post&id="'+ decData[i].id +'">'+ decData[i].title +'</a><br />' +
                        '<b>Pub Date:</b>' + decData[i].pub_date + '<br />' +
                    '</div').insertBefore("#nextButton");
                }

                if(decData[0].offset !== null)
                    $("#nextButton").attr("offset", decData[0].offset);
            }
        });
    });
});