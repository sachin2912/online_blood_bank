function form_change(v)
{	
    if (v == 1)
    {
        document.getElementById("hos-reg-form").style.display = "none";
        document.getElementById("user-reg-form").style.display="block";
    }
    else if (v == 2)
    {
        document.getElementById("hos-reg-form").style.display = "block";
        document.getElementById("user-reg-form").style.display="none"; 
    } 
}

function validate(v)
{
    if (v == 1)
    {
        if (document.getElementById("weight").value < 50)
        {
            alert("Weight less than 50 are not eligible for blood donation");
            return false;
        }
        else if (document.getElementById("user_username").value == "not valid" )
        {
            alert ("Username not Unique");
            return false;
        }
        else if (document.getElementById("user_email").value == "not valid" )
        {
            alert ("Email not Unique");
            return false;
        }
        else if (document.getElementById("pass") == document.getElementById("confirm_pass") )
        {
            alert("Password and Confirm password does not match . Both are different !! ");
            return false;
        }
        return true;
         
    }
    else if (v == 2)
    {
        if (document.getElementById("hpass") == document.getElementById("hconfirm_pass") )
        {
            alert("Password and Confirm password does not match . Both are different !! ");
            return false;
        }
        
        return true;    
    }
    
}

function check_username(value)
{
    $.post(
        "./ajax_calls/check_username.php",
        data = {username: value},
            function (data)
            {
                
                if (data == "exist")
                {    
                    document.getElementById("user_exist").innerHTML="Username does exist";
                    document.getElementById("user_username").value = "not valid";
                }
                else
                {
                    document.getElementById("user_exist").innerHTML="Username available";
                    document.getElementById("user_exist").style.backgroundColor="green";
                }    
            }

    );
    document.getElementById("user_exist").style.display = "block" ; 
}	

function verify_otp()
{
    var email_value = document.getElementById("user_email").value;
    var otp_value = document.getElementById("otp-value").value;
    $.post(
        "./ajax_calls/verify_email.php",
        data = {
            otp: otp_value,
            email: email_value,
        },
        function (data,status)
        {
            if (status == "success")
            {
                if (data == "verified")
                {
                    alert ("Email Verified");
                    document.getElementById("submit-btn").style.display = "block";

                    document.getElementById("otp-value").type = "hidden";
                    document.getElementById("otp-div").style.display = "none";
                }
                else 
                {
                    alert("email not verified !!!");
                }
            }
        }

    );
}

function send_otp()
{
    if (document.getElementById("otp-req-btn").innerHTML == "Resend OTP")
    {
        alert("IMPORTANT :  Old OTP is Invalid now !!!!!");
    }
    var email_value = document.getElementById("user_email").value;
    $.post(
        "./ajax_calls/send_otp.php",
        data = 
        {
            email: email_value,
        },
        function ( response )
        {
            
            if (response == "success")
            {
                document.getElementById("otp-div").style.display = "block";
                document.getElementById("otp-req-btn").innerHTML = "Resend OTP";
            }
        }
    );
}

function check_email(value)
{
    $.post(
        "./ajax_calls/check_email.php",
        data = {
            email: value,
        },
        function ( data )
        {
            if ( data == "exist" )
            {    
                document.getElementById("email_exist").innerHTML="Email already registered with us";
                document.getElementById("user_email").value = "not valid";
                document.getElementById("email_exist").style.color = "red";
            }
            else
            {
                document.getElementById("email_exist").innerHTML = "<button type='button' id='otp-req-btn' onclick='send_otp()'>Send OTP</button>" ;
            }    
            document.getElementById("email_exist").style.display = "block" ;
        }
    );
}