function verify(uname,what_to_do)
{
    $.post(
        "./ajax_calls/verify_hos.php",
        data = {
            username: uname,
            what_to_do : what_to_do,
        },
        function (status)
        {
            if ( status == "verified" )
            {
                alert("Hospital Named : "+uname+" is verified !!!");
                location.reload();
            }
            else if (status == "deleted")
            {
                alert("Hospital Named : "+uname+" Information is Deleted !!!");
                location.reload();
            }
        }
    );
}