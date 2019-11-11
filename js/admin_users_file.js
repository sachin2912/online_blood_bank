function delete_user(uname)
{
    $.post(
        "./ajax_calls/delete_user.php",
        data = {
            username: uname,
        },
        function (status)
        {
            alert(status);
            if ( status == "success" )
            {
                alert("user with username : "+uname+" is deleted !!!");
                location.reload();
            }
        }
    );
}

function make_admin(uname)
{
    $.post(
        "./ajax_calls/make_admin.php",
        data = {
            username: uname,
        },
        function (status)
        {
            if ( status == "success" )
            {
                alert("user with username : "+uname+" is also Admin Now !!!");
                location.reload();
            }
        }
    );
}