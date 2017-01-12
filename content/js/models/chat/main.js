define(['friends','send','newMessages','jQuery'],function (friends,send,newMessages) {
    friends();
    $("#send-btn").click(send);
    newMessages();

    $("#send-text").keypress(function (e) {
        if(e.which == 13){
            send();
        }
    });
});