
    <head>
        <link rel="stylesheet" type="text/css" href="css/footer_file.css"/>
    </head>
    
        <div id="footer-main-container">
            <div id="right-container">
                <h2>
                    Know us better
                </h2>    
                <div class="nav-member-f">
                    <a href="?action=team">
                        Team
                    </a>
                </div>
               
                <div class="nav-member-f">
                    <a href="?action=faq">
                        FAQ
                    </a>
                </div>
                <div class="nav-member-f">
                    <a href="?action=contact-us">
                        Contact us
                    </a>
                </div>
            </div>
            <div id="left-container">
                <h2>
                    Quick Links
                </h2>
                <div class="nav-member-f">
                    <a href="?action=home">
                        Home
                    </a>
                </div>
                <div class="nav-member-f">
                    <a href='?action=about-us'>
                        About Us
                    </a>    
                </div>
                <?php 
                if ( !isset( $_SESSION["uname"] ) )
                {
                    echo "<div class='nav-member-f'>
                        <a href='?action=signup'>
                            Sign Up
                        </a>    
                    </div>";
                }    
                ?>
            </div>
        </div>
        
    </body>
</html>