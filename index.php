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
    if (isset($_SESSION["type"]) && $_SESSION["type"] == "admin" && ( $_REQUEST["action"] == "view-all-users" || $_REQUEST["action"] == "view-all-hospitals"))
    {
        $act = "home";
    }
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
                    include("view_history.php") ;
                    break ;
        case 'view-profile':
                    include("view_profile.php") ;
                    break ;
        case 'request-blood':
                    include("request.php") ;
                    break ;            
      
        case 'enquiry':
                    include("enquiry.php") ;
                    break ;
        case 'hospital-in-local':
                    include("view_all_hospital.php") ;
                    break ;
        case 'view-all-user':
                    include("admin_users.php");
                    break;
        case 'view-all-hospital':
                    include("admin_hospitals.php");
                    break;                        
        default :
                include("error.php");
        
    }
    include("footer.php") ;
   
?>