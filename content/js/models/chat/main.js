define(['friends','send','newMessages','jQuery'],function (friends,send,newMessages) {
    friends();
    $("#send-btn").click(send);
    newMessages();
});