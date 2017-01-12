define(['jQuery'],function () {

    function postData(userId,text) {
        $.post("chat/message/"+userId,
            {
                text:text
            },
            function(data, status){
                if(status == 'success')
                    $("#message-tap").append(data);
                var temp = document.getElementById("message-tap");
                temp.scrollTop = temp.scrollHeight;
            });
    }


   var init = function () {
        var userTap = $(".mark")[0];
       if(!(userTap === undefined)){
           var userId = parseInt($(userTap).attr('id'));
           var textarea = $("#send-text");
           var text = $("#send-text").val();
           console.log(text);
           console.log("Here");
           textarea.val("");
           if(text.length != 0)
               postData(userId,text);
       }
   }

    return init;
});