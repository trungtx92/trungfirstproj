function check(){
    var timepast=false; 
// var iframe = document.createElement("iframe");
var popup = document.getElementById("popup");
var iframe = document.getElementById("iframe");
var anchor = document.getElementById("anchor");
// iframe.style.cssText = "position:absolute; top:25%; left:25%px; bottom:auto; right:auto; width:50%; height:50%; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;";
iframe.src = "https://www.independent.co.uk/sport/motor-racing/formula1/red-bull-racing-investment-accounts-race-results-verstappen-mercedes-a9156461.html"; // This will work
anchor.setAttribute('target','iframe_a');
//iframe.src = "http://google.com"; // This won't work
// iframe.id = "theFrame";

// If more then 500ms past that means a page is loading inside the iFrame
setTimeout(function() {
    timepast = true;
    },500);

if (iframe.attachEvent){
    iframe.attachEvent("onload", function(){
    if(timepast) {
            console.log("It's PROBABLY OK");
        }
        else {
            console.log("It's PROBABLY NOT OK");
        }
    });
}
else {
    iframe.onload = function(){
        if(timepast) {
            console.log("It's PROBABLY OK");
        }
        else {
            console.log("It's PROBABLY NOT OK");
        }
    };
}
popup.style.display = "block";
// document.body.appendChild(iframe);

}