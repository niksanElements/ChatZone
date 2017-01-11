define(['jQuery'],function () {

    function postData(userId,text) {
        $.post("chat/message/"+userId,
            {
                text:text
            },
            function(data, status){
                if(status == 'success')
                    $("#message-tap").append(data);
            });
    }


   var init = function () {
        var userTap = $(".mark")[0];
       if(!(userTap === undefined)){
           var userId = parseInt($(userTap).attr('id'));
           var textarea = $("#send-text");
           var text = textarea.val();
           textarea.val("");
           console.log(text);
           postData(userId,text);
       }
   }

    return init;
});