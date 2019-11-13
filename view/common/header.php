<html lang="en">
    <head>
        <title>
            <?php
                $title = $_REQUEST["action"]??"home";
                echo "BLOOD BANK - A unique platform for blood donation : ".
                $title;
            ?>
        </title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" type="text/css" href="css/header_file.css"/>
        
        <script src="js/header_file.js" type="text/javascript" defer></script>  
            
         
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
                                    <button id='login-btn' onclick='openForm()'>
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
                                        List of Hospitals(Registered with us)
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
                                    <a href='?action=hospital-history&uid=".$_SESSION["uname"]."'>
                                        View Request History
                                    </a>
                                </div>
                                <div class='nav-member'>   
                                    <a href='?action=request-blood'>
                                        Request Blood
                                    </a>
                                </div>
                                
                                <div class='nav-member'>   
                                    <a href='?action=view-profile&type=hospital&uname=".$_SESSION['uname']."'>
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
                        else if ( $_SESSION["type"] == "admin" )
                        {
                            echo"<div class='nav-member'>
                            <a href='?action=view-all-user'>
                                View all Users
                            </a>
                            </div>
                            <div class='nav-member'>
                                <a href='?action=view-all-hospital'>
                                    View All Hospitals
                                </a>
                            </div>
                                
                            <div class='nav-member'>    
                                <a href='?action=view-profile&type=user&uname=".$_SESSION['uname']."'>
                                    ".$_SESSION["uname"]."
                                </a>
                            </div>
                            <div class='nav-member'>
                                <a href='?action=user-complain'>
                                    View Complain 
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
            

        <div class="form-popup" id="myForm">
            <form method="POST" action="?action=login" class="form-container">
                <h1>Login</h1>
                <div class="row">
                    <div class="col">
                        <input type="radio" name="type" value="user">User
                    </div>
                    <div class="col">
                        <input type="radio" name="type" value="hospital">Hospital
                    </div>
                </div>
                
                <label for="username"><b>Username</b></label>
                <input type="text" name="username" id="uname" placeholder="Username ..." maxlength="25" required>
                <label for="password"><b>Password</b></label>
                <input type="password" name="password" id="pass" placeholder="*******" maxlength="25" required>

                <button type="submit" class="btn">Login</button>
                <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
        </div>

        