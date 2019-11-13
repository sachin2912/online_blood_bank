<head>
    <link rel="stylesheet" type="text/css" href="css/view_history_file.css"/>
    <script src="js/view_history_file.js" type="text/javascript" defer></script>
	<script src='js/jquery-3.4.1.min.js'></script>
</head>
<?php
    if(isset($_POST['submit']))
    {
        $target_dir = "complain_images/";
        $new_file_name = $_POST["uname_complain"]."_".$_POST["r_id_complain"];
        $extension = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
    
        $target_file = $target_dir .$new_file_name.".".$extension;
        
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            
            $uploadOk = 1;
        } 
        else {
            echo "<script>
            alert('File is not an image');
            </script>";
            $uploadOk = 0;
        }
        if (file_exists($target_file)) {
            echo "<script>
            alert('Sorry, file already exists');
            </script>";
            $uploadOk = 0;
        }
        if ($_FILES["fileToUpload"]["size"] > 1500000) 
        {
            echo "<script>
            alert('Sorry, your file is too large');
            </script>";
            $uploadOk = 0;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
            echo "<scipt>
            alert('Sorry, only JPG, JPEG, PNG  files are allowed');
            </script>";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<script>
            alert('Sorry, your file was not uploaded');
            </script>";
        
        } 
        else 
        {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $api_obj = new api_1(new DB,"user_complains");
                $values = $_POST["r_id_complain"].",'".$_POST['uname_complain']."','".$_REQUEST["uid"]."','Registered','".$_POST["complain"]."'";
                $fields = "c_id,uname,h_name,action,complain";
                $res_insert = $api_obj->insert_details($fields,$values);
                $api_obj_1 = new api_1(new DB , "blood_request");
                $res_update = $api_obj_1->update_request("'Complain Registered'",$_POST["r_id_complain"]);
                
                if ($res_insert == "success")
                {
                    echo "<script>
                    alert('Successfully Register Complain\nThanks for informing us to improve');
                    </script>";
                }
            } 
            else {
                echo "
                <script>
                alert('Sorry, there was an error uploading your file');
                </script>";
            }
        }
        header("Refresh: 0");        
    }
    
?>
<?php
    if((isset($_SESSION["uname"]) && $_SESSION["uname"] == $_REQUEST["uid"] && $_SESSION["type"] == "hospital") || $_SESSION["type"] == "ADMIN" )
    {
        echo "<div id='view-history-container'>";
        
        echo "<h1> Hospital Blood Request Details </h1>" ;
        $table = "blood_request" ;
        $condition = " where h_name='".$_REQUEST["uid"]."'";
        $api_obj = new api_1( new DB , $table ) ;
        $result = $api_obj->get_details( " * " , $condition );
        
        if (isset($result))
        {
            echo "<table width=100% align='center' >
            <tr>
            <td>
            Request ID
            </td>
            <td>
            Requested Username
            </td>
            <td>
            Date and Time
            </td>
            <td>
            Current Status
            </td>
            <td>
            Action
            </td>
            </tr>";
            for ( $i = 0 ; $i < count($result) ; $i++ )
            
            {
                echo "<tr> <td>". $result[$i]["r_id"].
                "</td><td>".$result[$i]["uname"]."</td><td>".
                $result[$i]["time_date"]."</td><td>".$result[$i]["status"].
                "</td>";
                if ($result[$i]["status"] == "Requested")
                {
                echo "<td><div class='action-btn' id='".$result[$i]["r_id"]."-action-btn'><div class='btn'><button type='button'
                onclick='verify_request(".$result[$i]["r_id"].",1)'> Verify Request
                </button></div><div class='btn'><button type='button' onclick='verify_request
                (".$result[$i]["r_id"].",2)'> Reject Request </button>
                </div><div class='btn'><button type='button'".' onclick="reg_complain('.$result[$i]["r_id"].",'".$result[$i]["uname"]."')".'"> Register Complain </button>
                </div></div></td>';
                }
                else
                {
                    echo "<td> Action Already Taken </td>";
                }
                echo "</tr>";

            }
            echo "</table>";
        }
        else
        {
            echo "<div style='top: 40%; right: 45%; color: red;'>No requests Made yet</div>";
        }        
        echo "</div>";
    }
    else
    {
        redirect_func();
    }
?>
<div id='modal-class' class='modal'>
    <div class='modal-content'>
            <div class='row'>
            <span class="close">&times;</span>
    
                <h2> Complain Form </h2>
            </div>
            <div id="complain-form-div">
                
                <form id='complain-form' enctype='multipart/form-data' method='POST' onsubmit='get_uname_rid()'>
                <div class="row">
                    <div class="col">
                        Username : 
                    </div>
                    <div class='col'>
                    <input id='uname_value' name="uname_complain" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Request ID : 
                    </div>
                    <div class='col'>
                    <input id='r_id' name='r_id_complain' disabled>
                    </div>
                </div>
                    <div class="row">
                        <div class="col" style='display: flex; justify-content: center;'>
                            Write Complain
                        </div>
                    <div class="col">
                            <textarea required rows=6 cols=50 name='complain' placeholder='Write Your complain here in 200 words only .....'></textarea>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col">
                            File Upload
                        </div>
                        <div class="col">
                            <input type='file' name="fileToUpload" id="fileToUpload">
                        </div>
                        
                    </div>
                    <div class='row'>
                            Accepted formats are jpeg , jpg, png and pdf and size less than 1.5 MB
                    </div>
                    <div class="row">
                        <input type="submit" value="Submit" name="submit" >
                
                    </div>
                    <div class="row">
                        * Do Share image of supporting reports of blood 
                    </div>
                </form>
            </div>
        </div>
    </div>        