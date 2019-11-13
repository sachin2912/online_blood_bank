
function warn_user(c_id,admin_uname)
{
    $.post(
        "./ajax_calls/warn_user.php",
        data = {
            c_id : c_id,
            admin_uname: admin_uname,
        },
        function (data)
        {
            alert(data);
        }
    );
}

function reject_complain(c_id,admin_uname)
{
    $.post(
        "./ajax_calls/reject_complain.php",
        data = {
            c_id : c_id,
            admin_uname: admin_uname,
        },
        function (data)
        {
            alert(data);
        }
    );
}


function display_image(src)
{
    var img_tag = "'" + src + "'" ; 
    document.getElementById("modal-content-id").innerHTML = "<img src ="+src+">";
    var modal = document.getElementById("modal-class");
    modal.style.display = "block";  
}
var span = document.getElementsByClassName("close")[0];
span.onclick = function() {
    document.getElementById("modal-class").style.display = "none";
  }

window.onclick = function(event) {
  if (event.target == document.getElementById("modal-class")) {
    document.getElementById("modal-class").style.display = "none";
  }
}
