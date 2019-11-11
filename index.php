<?php
    function redirect_func()
    {
        echo"<script>location.href = '?action=home';</script>";
    }
    $act = isset( $_REQUEST["action"] ) ? $_REQUEST["action"] : "home";
    session_start();
    require("model/data_api.php");
    require("model/db.php");
    require("basic_requirements.php");
    include("view/common/header.php");
    if (isset($_SESSION["type"]) && $_SESSION["type"] == "admin" && ( $_REQUEST["action"] == "view-all-users" || $_REQUEST["action"] == "view-all-hospitals"))
    {
        $act = "home";
    }
    switch($act)
    {
        case 'home':
                    include("view/common/home_page.php") ;
                    break ;
        case 'about-us':
                    include("view/common/about_us.php") ;
                    break ;
        case 'team':
                    include("team_info.php") ;
                    break;
        case 'login':
                    include("view/common/login.php") ;
                    break;
        case 'signup':
                    include("view/common/registration_form.php") ;
                    break;
        case 'logout':
                    include("view/common/logout.php") ;
                    break ;
        case 'faq':
                    include("view/common/faq.php") ;
                    break ;
        case 'hospital-history':
                    include("view/hospital/view_history.php") ;
                    break ;
        case 'view-profile':
                    include("view/common/view_profile.php") ;
                    break ;
        case 'request-blood':
                    include("view/hospital/request.php") ;
                    break ;            
      
        case 'enquiry':
                    include("enquiry.php") ;
                    break ;
        case 'hospital-in-local':
                    include("view/user/view_all_hospital.php") ;
                    break ;
        case 'view-all-user':
                    include("view/admin/admin_users.php");
                    break;
        case 'view-all-hospital':
                    include("view/admin/admin_hospitals.php");
                    break;                        
        default :
                include("error.php");
        
    }
    include("view/common/footer.php") ;
   
?>