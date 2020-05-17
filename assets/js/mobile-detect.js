// Simple mobile detect for Scoreboard php
if( navigator.userAgent.match(/Android/i)
 || navigator.userAgent.match(/webOS/i)
 || navigator.userAgent.match(/iPhone/i)
 || navigator.userAgent.match(/iPad/i)
 || navigator.userAgent.match(/iPod/i)
 || navigator.userAgent.match(/BlackBerry/i)
 || navigator.userAgent.match(/Windows Phone/i)) {
    //alert("You're using Mobile Device!!");
 } else {
   LoadCSSFile();
 }

 if(window.innerHeight > window.innerWidth){
    //alert("You are using portrait screen!");
}

function LoadCSSFile() {
   console.log('%c Desktop User', 'background: #303030; color: #15b7d4');

   var file = location.pathname.split( "/" ).pop();

   var link = document.createElement( "link" );
   link.href = file.substr( 0, file.lastIndexOf( "." ) ) + "assets/css/desktop-styles.css";
   link.type = "text/css";
   link.rel = "stylesheet";
   link.media = "screen,print";

   document.getElementsByTagName( "head" )[0].appendChild( link );
}
