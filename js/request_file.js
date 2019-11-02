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