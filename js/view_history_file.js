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

