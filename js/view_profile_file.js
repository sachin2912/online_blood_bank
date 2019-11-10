function expand_req()
{
    if( document.getElementById("req-details").style.display == "none" )
    {
        document.getElementById("req-details").style.display = "block";
        document.getElementById("expand-req").innerHTML = "-";
    }
    else
    {
        document.getElementById("req-details").style.display = "none";
        document.getElementById("expand-req").innerHTML = "+";
    }
}