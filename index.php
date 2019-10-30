<?php
    function redirect_func()
    {
        echo"<script>location.href = '?action=home';</script>";
    }
    $act = isset( $_REQUEST["action"] ) ? $_REQUEST["action"] : "home";
    session_start();
    require("data_api.php");
    require("db.php");
    include("header.php") ;
    switch($act)
    {
        case 'home':
                    include("homepage.php") ;
                    break ;
        case 'about-us':
                    include("about_us.php") ;
                    break ;
        case 'team':
                    include("about_us.php") ;
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
                    include("about_us.php") ;
                    break ;
        case 'hospital-histroy':
                    include("about_us.php") ;
                    break ;
        case 'view-profile':
                    include("about_us.php") ;
                    break ;
        case 'request-blood':
                    include("request_blood.php") ;
                    break ;            

        case 'enquiry':
                    include("enquiry.php");
                    break;
        default :
                include("error.php");
        
    }
    include("footer.php") ;
                    

?>