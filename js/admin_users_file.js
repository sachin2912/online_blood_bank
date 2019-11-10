function delete_user(uname)
{
    $.post(
        "./delete_user.php",
        data = {
            username: uname,
        },
        function (status)
        {
            if ( status == "success" )
            {
                alert("user with username : "+uname+" is deleted !!!");
                location.reload();
            }
        }
    );
}