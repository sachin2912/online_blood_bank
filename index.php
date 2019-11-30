<?php
    function redirect_func()
    {
        echo"<script>location.href = '?action=home';</script>";
    }
    $act = $_REQUEST["action"] ?? "home";
    session_start();
    
    require("model/data_api.php");
    require("model/db.php");
    require("basic_requirements.php");
    include("view/common/header.php");
        
    switch($act)
    {
        case 'home':
                    include("view/common/home_page.php") ;
                    break ;
        case 'about-us':
                    include("view/common/about_us.php") ;
                    break ;
        
        case 'faq':
                include("view/common/faq.html") ;
                break ;
                        
        case 'login':
                    if(!isset($_SESSION["uname"]))
                    {
                        include("view/common/login.php") ;
                        break;
                    }
        case 'signup':
                    if(!isset($_SESSION["uname"]))
                    {
                        include("view/common/registration_form.php") ;
                        break;
                    }
        case 'contact-us':
                    include("view/common/contact.php") ;
                    break ;
        case 'team':
                    include("view/common/teams.php") ;
                    break ;            
                        
        case 'view-profile':
                    if(isset($_SESSION["uname"]))
                    {
                        include("view/common/view_profile.php") ;
                        break ;
                    }    
        case 'logout':
                    if(isset($_SESSION["uname"]))
                    {
                        include("view/common/logout.php") ;
                        break ;
                    }
        case 'hospital-history':
                    if(isset($_SESSION["type"]) && $_SESSION["type"]=="hospital")
                    {
                        include("view/hospital/view_history.php") ;
                        break ;
                    }    
        case 'request-blood':
                    if(isset($_SESSION["type"]) && $_SESSION["type"]=="hospital")
                    {
                        include("view/hospital/request.php") ;
                        break ;            
                    }
        case 'hospital-in-local':
                    if(isset($_SESSION["type"]) && $_SESSION["type"]=="user")
                    {                    
                        include("view/user/view_all_hospital.php") ;
                        break ;
                    }
                
        case 'view-all-user':
                    if(isset($_SESSION["type"]) && $_SESSION["type"]=="admin")
                    {                    
                        include("view/admin/admin_users.php");
                        break;
                    }    
        case 'view-all-hospital':
                    if(isset($_SESSION["type"]) && $_SESSION["type"]=="admin")
                    {                    
                        include("view/admin/admin_hospitals.php");
                        break;
                    }     
        case 'user-complain':
                    if(isset($_SESSION["type"]) && $_SESSION["type"]=="admin")
                    {                    
                        include("view/admin/admin_complain.php");
                        break; 
                    }                                  
        case 'error':
        default :
                include("view/common/error.php");
        
    }
    include("view/common/footer.php") ;
   
?>