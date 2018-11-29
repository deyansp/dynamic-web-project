$(document).ready(function setCookie() {
    var now = new Date();
    now.setTime(now.getTime() + 1 * 3600 * 1000);
    // setting the cookie to expire after an hour 
    document.cookie = "favColour=blue; expires=" + now.toUTCString() + "; path=/";
});