<html lang="en">
    <head>
        <title>
            <?php
                echo "BLOOD BANK - A unique platform for blood donation : ".
                $_REQUEST["action"];
            ?>
        </title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" type="text/css" href="css/header_file.css"/>
        <link rel="stylesheet" type="text/css" href="css/footer_file.css"/>
        


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="js/header_file.js" type="text/javascript" defer></script>    
        <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js" type="text/javascript" charset="utf-8"></script>
        <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js" type="text/javascript" charset="utf-8"></script>
        
    </head>
    <body>
        <div id="top-main-container" class="topcontainer">
            
            <div class="nav-member">
                <a href="?action=home">
                    <img src="img/pic.png" alt="logo-blood-donation" width=50px height=50px>
                </a>
            </div>
            <div id="menubar">
                <div class="nav-member">
                    <a href="?action=home">
                        Home
                    </a>
                </div>
                <div class="nav-member">    
                        <a href="?action=about-us">
                            About
                        </a>
                </div>                    
                <?php
                    if(!isset($_SESSION["uname"]))
                    {    
                        echo "<div class='nav-member'>      
                                    <button id='login-btn'>
                                        Login
                                    </button>
                            </div>
                            <div class='nav-member'>      
                                    <a href='?action=signup'>
                                        Sign up
                                    </a>
                            </div>      
                                ";
                    }
                    else if(isset($_SESSION["uname"]))
                    {   
                        if ($_SESSION["type"]=="user")
                        {          
                            echo"<div class='nav-member'>   
                                    <a href='?action=hospital-in-local'>
                                        List of Hospital in Locality
                                    </a>
                                </div>
                                <div class='nav-member'>   
                                    <a href='?action=view-profile&type=user&uname=".$_SESSION['uname']."'>
                                        ".$_SESSION["uname"]."
                                    </a>
                                </div>
                                <div class='nav-member'>   
                                    <a href='?action=logout&type=user'>
                                        Log Out
                                    </a>
                                </div>   
                                ";
                        }
                        else if ($_SESSION["type"]=="hospital")
                        {
                            echo"<div class='nav-member'>
                                <a href='?action=request-blood'>
                                        Request for Blood Donation
                                    </a>
                                </div>
                                <div class='nav-member'>
                                    <a href='?action=hospital-history&uid=".$_SESSION['uname']."'>
                                        View History
                                    </a>
                                </div>
                                <div class='nav-member'>    
                                    <a href='?action=view-profile&type=hospital&uname=".$_SESSION['uname']."'>
                                        ".$_SESSION["uname"]."
                                    </a>
                                </div>
                                <div class='nav-member'>    
                                    <a href='?action=logout&type=hospital'>
                                        Log Out
                                    </a>
                                </div>    
                                ";
                        }        
                    }
                ?>
                
            </div>
        </div>    
        <div id="user-login-modal" class="modal">
            <div class="modal-content">
                <div class="row">
                    <div class="col">
                        <h1 style="text-align: center;">Login</h1>
                    </div>
                    <div class="col" id="close1">    
                        <span class="close">&times;
                                            
                        </span>
                    </div>    
                </div>    
                    <form id="login-form" method="POST" action="?action=login">
                        <div class="row">
                            <div class="col">
                                <input type="radio" name="type" value="user">User
                            </div>
                            <div class="col">
                                <input type="radio" name="type" value="hospital">Hospital
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                Username
                            </div>
                            <div class="col">
                                <input type="text" name="username" id="uname" placeholder="Username ..." maxlength="25" required>
                            </div>
                        </div>
                        <div class="row">    
                            <div class="col">
                                Password
                            </div>
                            <div class="col">
                                <input type="password" name="password" id="pass" placeholder="*******" maxlength="25" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="submit" value="Login">
                            </div>
                        </div>
                    </form>
                
                
            </div>        
        </div>
            
        
