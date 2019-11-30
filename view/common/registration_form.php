<?php
	if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
	{
		$db_obj=new DB;
		$latlong = array();
		$latlong = get_location($_POST["address"]);
			
		if ( isset( $_POST["fname"] ) )
		{	
			$api_obj_3 = new api_1(new DB,"otp");
			$cnt = "where otp='".$_POST["OTP_verify"]."' and email ='".$_POST["email"]."' and used = 1";
			$res = $api_obj_3->verify_otp($cnt);
			
			if ($res > 0 )
			{
				$cnt_3 = " where email='".$_POST["email"]."'";
    			$api_obj_3->delete_operation($cnt_3);
				$table = "user";
				$field = "fname,lname,uname,user_address,latitude,longitude,email,mobile_number,blood_group,age,weight";
				$values = "'" . $_POST["fname"] . "'," . "'" . $_POST["lname"] . "'," . "'" . $_POST["uname"]. 
				"'," . "'". $_POST["address"] . "'," . "'" . $latlong[0] . "'," . "'" . $latlong[1] . "'," .
				"'" . $_POST["email"] . "'," . "'" . $_POST["mnumber"] . "'," .
				"'" . $_POST["blood_group"] . "'," ."" . $_POST["age"] . ","."" . $_POST["weight"] . ""  ;
				$field1="uname,password,status";
				$values1="'" . $_POST["uname"] . "'," . "'" . $_POST["pass"] . "',1" ;
				$table1 = "login_credentials" ;
			}
			else
			{
				echo "<script>
				alert('OTP not Verified');
				
				</script>";
			}	
		}	
		else if ( isset( $_POST["hname"] ) )
		{
			$table = "hospital";
			$field = "h_name,poc_name,address,latitude,longitude,email,phone_number,website,reg_no";
			$values = "'" . $_POST["hname"] . "'," . "'" . $_POST["posname"] . "'," . 
			 "'". $_POST["address"] . "'," . "'" . $latlong[0] . "'," . "'" . $latlong[1] . "'," .
			"'" . $_POST["email"] . "'," . "'" . $_POST["mnumber"] . "','" .$_POST["website"]."','".
			$_POST["reg_no"]."'";
			$field1="uname,password,status";
			$values1 = "'" . $_POST["hname"] . "'," . "'" . $_POST["pass"] . "',1" ;
			$table1 = "hospital_login_credentials" ;

		}
		$api_obj = new api_1($db_obj,$table);
		$resp = $api_obj->insert_details($field,$values);
		
		$api_obj1 = new api_1($db_obj,$table1);
		$resp1 = $api_obj1->insert_details($field1,$values1);
		echo $resp1;
		echo $resp;
		if ($resp == "success" && $resp1 == "success")
		{
			if (isset($_POST["uname"]))
			{
				$_SESSION["uname"] = $_POST["uname"];
				$_SESSION["type"] = "user";
			}
			else if (isset($_POST["hname"]))
			{
				echo "<script>
				alert('Your Hospital is Registered but it needs to be verfied .\n It may take 24 hrs to get verfied . Thanks
				for registering with us ');
				</script>";
			}
			redirect_func();		
		}
		else
		{
			echo "<script>
			alert('Failed could not Register');
			</script>";
		}
		 
	}
?>
<head>
	<link rel="stylesheet" type="text/css" href="css/registration.css"/>
	<script src="js/registration_file.js" type="text/javascript" defer></script>
	<script src='js/jquery-3.4.1.min.js'></script>

</head>
<div id="button-change" style="width: 100%;
    display: inline-block;
    text-align: center;">    
	<button  id="user-btn-reg" onclick=form_change(1)>
		User
	</button>
	<button id="hospital-btn-reg" onclick=form_change(2)>
		Hospital
	</button>
</div>
<div id="registraion-form" style="text-align: center;">
	
	<form id="user-reg-form" onsubmit="return validate(1)" method="POST" action="?action=signup">
		<h1>User Registration Form </h1>
		<div class="row">
			<div class="col">
				First Name
			</div>
			<div class="col">
				<input type="text" name="fname" placeholder="vivek kumar" maxlength=25 required>
			</div>
			<div class="col">
				Last Name
			</div>
			<div class="col">
				<input type="text" name="lname" placeholder="singh" maxlength=25 required>
			</div>
		</div>

		<div class="row">
			<div class="col">
				Weight
			</div>
			<div class="col">
				<input type="number" id="weight" name="weight" placeholder="50 (in KGs)" required>
			</div>
			<div class="col">
				Contact Number
			</div>
			<div class="col">
				<input type="text"  name="mnumber" placeholder="9632587410" minlength=10 required>
			</div>
		</div>
		
		<div class="row">
			<div class="col">
				Username
			</div>
			<div class="col">
				
				<input type="text" id="user_username" name="uname" placeholder="username ... " onchange="check_username(this.value)" maxlength=25 required>
			</div>
			<div class="col">
				Email
			</div>
			<div class="col">
				<input type="email" id="user_email" name="email" onchange="check_email(this.value)" placeholder="you@example.com" required>
			</div>
			
		</div>
		<div class="row">
			<div class="col" >
				<h5 id="user_exist" style="display: none;"></h5>
			</div>
			<div class="col" id="email_exist" style='display: none;'>
				
			</div>
			
		</div>
		<div class="row">	
			<div class="col">
				Password
			</div>
			<div class="col">
				<input type="password" id="pass" name="pass" placeholder="*******" maxlength=25 required>
			</div>
			<div class="col">
				Confirm Password
			</div>
			<div class="col">
				<input type="password" id="confirm_pass" name="confirm_pass" placeholder="*******" maxlength=25 required>
			</div>
		</div>
		
		<div class="row">
			
			<div class="col">
				Age
			</div>
			<div class="col">
				<input type="number" name="age" placeholder="18" required>
			</div>
			<div class="col">
				Blood Group
			</div>
			<div class="posneg">
				<div class="col">
					<input type="radio" value="O+" name="blood_group" required>O+ 
				</div>
				<div class="col">
					<input type="radio" value="O-" name="blood_group" required>O- 
				</div>
			</div>
			<div class="posneg">
				<div class="col">
					<input type="radio" value="AB+" name="blood_group" required>AB+ 
				</div>
				<div class="col">
					<input type="radio" value="AB-" name="blood_group" required>AB- 
				</div>
			</div>
			<div class="posneg">
				<div class="col">
					<input type="radio" value="A+" name="blood_group" required>A+ 
				</div>
				<div class="col">
					<input type="radio" value="A-" name="blood_group" required>A- 
				</div>
			</div>
			<div class="posneg">
				<div class="col">
					<input type="radio" value="B+" name="blood_group" required>B+ 
				</div>
				<div class="col">
					<input type="radio" value="B-" name="blood_group" required>B- 
				</div>
			</div>
		</div>
		<div class="row">	
			<div class="col" style='top: 40%'>
				Address
			</div>
			<div class="col">
				<textarea rows=5 cols=50 name="address" placeholder="Address ..." style="resize: none;" required></textarea>
			</div>
		</div>
		<div class="row" id="otp-div" style="display: none;">
			<div class="col">
				Enter OTP : 
			</div>
			<div class="col">
				<input type="text" id="otp-value" placeholder="OTP" name="OTP_verify" required>

			</div>
			<div class="col">
				<button  type="button" id="otp-btn" onclick="verify_otp()">
				 Verify
				 </button>
			</div>
		</div>
		<div class="row">
			<div class="col" id="submit-btn" style="display: none;">
				<input type="submit"  value="Register"> 
			</div>
		</div>
	</form>
	
	


	<form id="hos-reg-form" method="POST" onsubmit="return validate(2)" style="display: none;" action="?action=signup">
	<h1>Hospital Registration Form </h1>
		<div class="row">
			<div class="col">
				Name of Hospital
			</div>
			<div class="col">
				<input type="text" name="hname" placeholder="Govt Hospital" maxlength=25 required>
			</div>
			<div class="col">
				Person's Name (as in Point of Contact)
			</div>
			<div class="col">
				<input type="text" name="posname" placeholder="Ram singh" maxlength=25 required>
			</div>
		</div>
		<div class="row">
			<div class="col">
				Email
			</div>
			<div class="col">
				<input type="email" name="email" placeholder="you@example.com" required>
			</div>
			<div class="col">
				Contact Number
			</div>
			<div class="col">
				<input type="text"  name="mnumber" placeholder="9632587410" required>
			</div>
		</div>
		<div class="row">
			<div class="col">
				Website
			</div>
			<div class="col">
				<input type="text" id="h_website" name="website" placeholder="www.example.com" required>
			</div>
			<div class="col">
				Registration Number
			</div>
			<div class="col">
				<input type="text"  name="reg_no" placeholder="9632587410" required>
			</div>
		</div>
		<div class="row">
			<div class="col">
				Password
			</div>
			<div class="col">
				<input type="password" id="hpass" name="pass" placeholder="*******" maxlength=25 required>
			</div>
			<div class="col">
				Confirm Password
			</div>
			<div class="col">
				<input type="password" id="hconfirm_pass" name="confirm_pass" placeholder="*******" maxlength=25 required>
			</div>
		</div>
		<div class="row">	
			<div class="col">
				Address
			</div>
			<div class="col">
				<textarea rows=5 cols=50 name="address" placeholder="Address ..." style="resize: none;" required></textarea>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<input type="submit" value="Register"> 
			</div>
		</div>
	</form>		
</div>	
	