var o_pos = document.getElementById("btn-O+");
var a_pos = document.getElementById("btn-A+");
var b_pos = document.getElementById("btn-B+");
var ab_pos = document.getElementById("btn-AB+");
var o_neg = document.getElementById("btn-O-");
var a_neg = document.getElementById("btn-A-");
var b_neg = document.getElementById("btn-B-");
var ab_neg = document.getElementById("btn-AB-");
o_pos.onclick = function ()
{
document.getElementById("requests-users-details").innerHTML = document.getElementById("O_pos_view").innerHTML;
};
o_neg.onclick = function()
{

document.getElementById("requests-users-details").innerHTML = document.getElementById("O_neg_view").innerHTML;
};
b_pos.onclick = function()
{
document.getElementById("requests-users-details").innerHTML = document.getElementById("B_pos_view").innerHTML;
};
b_neg.onclick = function()
{
document.getElementById("requests-users-details").innerHTML = document.getElementById("B_neg_view").innerHTML;
};
a_pos.onclick = function()
{
document.getElementById("requests-users-details").innerHTML = document.getElementById("A_pos_view").innerHTML;
};
a_neg.onclick = function()
{
document.getElementById("requests-users-details").innerHTML = document.getElementById("A_neg_view").innerHTML;
};
ab_pos.onclick = function()
{
document.getElementById("requests-users-details").innerHTML = document.getElementById("AB_pos_view").innerHTML;
};
ab_neg.onclick = function()
{
document.getElementById("requests-users-details").innerHTML = document.getElementById("AB_neg_view").innerHTML;
};

function disp_snak(v)
{
    var x = document.getElementById("snackbar");
    x.innerHTML="Email sent to " + v;
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}


function sendemail(user_uname,h_name)
{   
    
    $.post(
        
            "./ajax_calls/make_request_mail.php",
            data = {username: user_uname,
                hospital_name: h_name},
                function (data,status)
                {
                    if (status=="success")
                    {    
                        disp_snak(user_uname);
                        document.getElementById(user_uname+"-request-btn").disabled = true;
                        
                    }
                    else
                    {
                        alert("unable to sent Email");
                    }    
                }
    
    );
}