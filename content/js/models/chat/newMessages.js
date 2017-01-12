/**
 * Created by Nikolay on 1/11/2017.
 */
define(['jQuery'],function () {
    function postData(userId,date){
        $.post("chat/newMessages/"+userId,
            {
                date:date
            },
            function(data, status){
                if(status == 'success')
                    $("#message-tap").append(data);
                var temp = document.getElementById("message-tap");
                temp.scrollTop = temp.scrollHeight;
            });
    }
    var checkFriend = function() {
        var userTap = $(".mark")[0];
        if(!(userTap === undefined)){
            var toUser = parseInt($(userTap).attr('id'));
            var date = $(".time").last().text();
            if(date) {
                postData(toUser, date);
            }
        }
    };
    window.setInterval(checkFriend, 1000);
    return checkFriend;
});