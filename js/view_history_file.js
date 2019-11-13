function verify_request(r_id,what_to_do)
{
    $.post(
        
        "./ajax_calls/verify_status.php",
        data = {r_id: r_id,
            what_to_do: what_to_do,
            },
            function (status)
            {
                
                if (status=="Verified")
                {    
                    
                    document.getElementById(r_id+"-action-btn").innerHTML = "Verified";
                    
                }
                else if (status == "Rejected")
                {
                    document.getElementById(r_id+"-action-btn").innerHTML = "Rejected";
                }
                    
            }

    );
}

function get_uname_rid()
{
    document.getElementById("uname_value").disabled = false;
    document.getElementById("r_id").disabled = false; 
    
}

function reg_complain(r_id,uname)
{
    
    document.getElementById("uname_value").value = uname
    document.getElementById("r_id").value = r_id;
    
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
