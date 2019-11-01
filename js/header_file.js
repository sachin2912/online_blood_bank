var modal=document.getElementById("user-login-modal");
var btn=document.getElementById("login-btn");
var span=document.getElementsByClassName("close")[0];
var span1=document.getElementsByClassName("close")[1];
btn.onclick = function()
{
    modal.style.display="block";
}
span.onclick = function()
{
    modal.style.display="none";
}
window.onclick = function(event)
{
    if (event.target == modal)
    {
        modal.style.display="none";
    }    
}
