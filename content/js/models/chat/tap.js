function getOutput(userId) {
    getRequest(
        'chat/conversation/'+userId,
        drawOutput,
        drawError
    );
    return false;
}
function drawError() {
    var container = $('#friends');
    container.text('Bummer: there was an error!');
}

function drawOutput(responseText) {
    var container = $('#message-tap');
    container.html(responseText);
}

function getRequest(url, success, error) {
    var req = false;
    try{
        // most browsers
        req = new XMLHttpRequest();
    } catch (e){
        // IE
        try{
            req = new ActiveXObject("Msxml2.XMLHTTP");
        } catch(e) {
            // try an older version
            try{
                req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch(e) {
                return false;
            }
        }
    }
    if (!req) return false;
    if (typeof success != 'function') success = function () {};
    if (typeof error!= 'function') error = function () {};
    req.onreadystatechange = function(){
        if(req.readyState == 4) {
            return req.status === 200 ?
                success(req.responseText) : error(req.status);
        }
    }
    req.open("GET", url, true);
    req.send(null);
    return req;
}

function tap(userName,id) {
    var liElement = $("span#"+id+userName);
    var ulElement = $('#conversation-taps');
    var liSelected = $(".mark")[0];
    if(!(liSelected === undefined)){
        $(liSelected).removeClass("mark");
    }
    if(liElement.length == 0){
        var onclick = "tap('"+userName+"',"+id+");"
        ulElement.append("<span id="+id+userName+" class='btn mark' onclick="+onclick+">"+userName+"</span>");
    } else{
        $(liElement).addClass("mark");
    }
    getOutput(id);
}