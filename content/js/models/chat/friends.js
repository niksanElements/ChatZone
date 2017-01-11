define(['jQuery'],function (menu) {
    function getOutput() {
        getRequest(
            'chat/friends',
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
        var container = $('#friends');
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
    var checkFriends = function() {
        getOutput();
    };
    window.setInterval(checkFriends, 10000);
    return checkFriends;
});