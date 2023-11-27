var success_popup=document.getElementById("success");

var s_close=document.getElementById("s_button");

var s_btn =document.getElementById("success_trigger");

s_btn.onclick=function(){
    success_popup.style.display ="block";

}

s_close.onclick =function(){
    success_popup.style.display="none";
}
