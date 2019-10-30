<?php
	require("get_loc.php");
	
	if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
	{
		if ( isset( $_POST["fname"] ) )
		{	
			$db_obj=new DB;
			$latlong = array();
			$latlong = get_location($_POST["address"]);
			$api_obj = new api_1($db_obj,"user");
			$field = "fname,lname,uname,user_address,latitude,longitude,email,mobile_number,blood_group";
			$values = "'" . $_POST["fname"] . "'," . "'" . $_POST["lname"] . "'," . "'" . $_POST["uname"]. 
			"'," . "'". $_POST["address"] . "'," . "'" . $latlong[0] . "'," . "'" . $latlong[1] . "'," .
			"'" . $_POST["email"] . "'," . "'" . $_POST["mnumber"] . "'," .
			"'" . $_POST["blood_group"] . "'" ;
			$api_obj->insert_details($field,$values);
			$api_obj1 = new api_1($db_obj,"logincredentails");
			$field1="uname,password,status";
			$values1="'" . $_POST["uname"] . "'," . "'" . $_POST["pass"] . "',0" ;
			$api_obj1->insert_details($field1,$values1);

		}
	}
	
?>
<style>
	.posneg
	{
		display: block;
	}
</style>	
<div id="button-change" style="width: 100%;
    display: inline-block;
    text-align: center;">    
	<button  onclick=form_change(1)>
		User
	</button>
	<button onclick=form_change(2)>
		Hospital
	</button>
</div>
<div id="registraion-form" style="text-align: center;">
	
	<form id="user-reg-form" method="POST" action="?action=signup">
		<h1>Registration Form </h1>
		<div class="row">
			<div class="col">
				First Name
			</div>
			<div class="col">
				<input type="text" name="fname" placeholder="vivek kumar" maxlenght=25 required>
			</div>
			<div class="col">
				Last Name
			</div>
			<div class="col">
				<input type="text" name="lname" placeholder="singh" maxlenght=25 required>
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
			<div class="col">
				Username
			</div>
			<div class="col">
				<input type="text" name="uname" placeholder="username ... " maxlength=25 required>
			</div>
			
			<div class="col">
				Password
			</div>
			<div class="col">
				<input type="password" name="pass" placeholder="*******" maxlength=25 required>
			</div>
		</div>
		<div class="row">	
			<div class="col">
				Address
			</div>
			<div class="col">
				<textarea row=10 col=50 name="address" placeholder="Address ..." style="resize: none;" required></textarea>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<input type="submit" value="Register"> 
			</div>
		</div>
	</form>
	
	


	<form id="hos-reg-form" method="POST" style="display: none;" action="?action=signup">
	<h1>Registration Form </h1>
		<div class="row">
			<div class="col">
				Name of Hospital
			</div>
			<div class="col">
				<input type="text" name="hname" placeholder="Govt Hospital" maxlenght=25 required>
			</div>
			<div class="col">
				Person's Name (as in Point of Contact)
			</div>
			<div class="col">
				<input type="text" name="posname" placeholder="Ram singh" maxlenght=25 required>
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
				<input type="email" name="website" placeholder="www.example.com" required>
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
				<input type="password" name="pass" placeholder="*******" maxlength=25 required>
			</div>
			<div class="col">
				Confirm Password
			</div>
			<div class="col">
				<input type="password" name="confirm_pass" placeholder="*******" maxlength=25 required>
			</div>
		</div>
		<div class="row">	
			<div class="col">
				Address
			</div>
			<div class="col">
				<textarea row=10 col=50 name="address" placeholder="Address ..." style="resize: none;" required></textarea>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<input type="submit" value="Register"> 
			</div>
		</div>
	</form>		
</div>	
	<script>
	function form_change(v)
	{	
		if (v == 1)
		{
			document.getElementById("hos-reg-form").style.display = "none";
			document.getElementById("user-reg-form").style.display="block"; 
		}
		else if (v == 2)
		{
			document.getElementById("hos-reg-form").style.display = "block";
			document.getElementById("user-reg-form").style.display="none"; 
		} 
	}
	</script>
