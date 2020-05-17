// Simple mobile detect for Scoreboard php
if( navigator.userAgent.match(/Android/i)
 || navigator.userAgent.match(/webOS/i)
 || navigator.userAgent.match(/iPhone/i)
 || navigator.userAgent.match(/iPad/i)
 || navigator.userAgent.match(/iPod/i)
 || navigator.userAgent.match(/BlackBerry/i)
 || navigator.userAgent.match(/Windows Phone/i)) {
    //alert("You're using Mobile Device!!");
 }

 if(window.innerHeight > window.innerWidth){
    //alert("You are using portrait screen!");
}
