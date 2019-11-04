<?php
    function redirect_func()
    {
        echo"<script>location.href = '?action=home';</script>";
    }
    $act = isset( $_REQUEST["action"] ) ? $_REQUEST["action"] : "home";
    session_start();
    require("data_api.php");
    require("db.php");
    require("basic_requirements.php");
    include("header.php");
    switch($act)
    {
        case 'home':
                    include("home_page.php") ;
                    break ;
        case 'about-us':
                    include("about_us.php") ;
                    break ;
        case 'team':
                    include("team_info.php") ;
                    break;
        case 'login':
                    include("login.php") ;
                    break;
        case 'signup':
                    include("registration_form.php") ;
                    break;
        case 'logout':
                    include("logout.php") ;
                    break ;
        case 'faq':
                    include("faq.php") ;
                    break ;
        case 'hospital-history':
                    include("hos_history.php") ;
                    break ;
        case 'view-profile':
                    include("view_profile.php") ;
                    break ;
        case 'request-blood':
                    include("request.php") ;
                    break ;            
        case 'send_request_mail' :
                    echo "<script>
                    alert('idhar');
                    </script>";
                    include ("make_request_mail.php");
                    break;
        case 'enquiry':
                    include("enquiry.php");
                    break;
        default :
                include("error.php");
        
    }
    include("footer.php") ;
   
?>