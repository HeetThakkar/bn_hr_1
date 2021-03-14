<html>
<head>
<link rel="stylesheet" type="text/css" href="../styles/style.css">   
<title> Registration </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
	span{
		color: red;
	}
	</style>
</head>
<body> 


<?php
	$fname =$lname= $email= $dob=$aadhar=$cpassword=$image= $password="";
	$efname =$elname= $eemail= $edob=$eaadhar=$ecpassword=$eimage= $epassword ="";
	if($_SERVER["REQUEST_METHOD"]=="POST" ){
        $fname =$_POST["f_name"];
        $lname =$_POST["l_name"];
        $email =$_POST["email"];
        $dob=$_POST["dob"];
        $aadhar =$_POST["aadhar"];
		$password =$_POST["psw"];
		$cpassword =$_POST["psw1"];
		if(empty($fname)){
			$efname="First Name is required";
			echo "<script>document.myform.f_name.focus();</script>";
		  }
		  if(empty($lname)){
			$elname="Last Name is required";
		  }
		  if(empty($email)){
			$eemail="Email-Id is required";
		  }
		  if(empty($dob)){
			$edob="Date of Birth is required";
		  }
		  if(empty($aadhar)){
			$eaadhar="aadhar number is required";
		  }
		  if(!empty($aadhar)){
			if (strlen($_POST["aadhar"]) < '12' || strlen($_POST["aadhar"]) > '12') {
				$eaadhar="Please enter a valid aadhar without space";
			}
		  }
		  if(empty($password)){
			$epassword="Password is required";
		  }

		  if(empty($cpassword)){
			$ecpassword="Confirm password is required";
		  }
		  
		  if($cpassword!=$password){
			$ecpassword="Password does not match ";
		  }
		  if(!empty($password)){
			if (strlen($_POST["psw"]) <= '8') {
				$epassword = "Your Password Must Contain At Least 8 Characters!";
			}
			elseif(!preg_match("#[0-9]+#",$password)) {
				$epassword = "Your Password Must Contain At Least 1 Number!";
			}
			elseif(!preg_match("#[A-Z]+#",$password)) {
				$epassword = "Your Password Must Contain At Least 1 Capital Letter!";
			}
			elseif(!preg_match("#[a-z]+#",$password)) {
				$epassword = "Your Password Must Contain At Least 1 Lowercase Letter!";
			} else {
				$epassword = "";
			}
		  }
		}
		if(empty($fname) || empty($lname) || empty($email) ||empty($dob) || empty($aadhar) || empty($password) || empty($cpassword) || !empty($efname) || !empty($elname) || !empty($eemail) || !empty($edob) || !empty($eaadhar) || !empty($epassword) || !empty($ecpassword) ){
		
	?>     
	<div class="login-box" style="height: 820px;">
    <img src="../images/brandniti+designlogo.png" class="avatar">
		<form action="<?php ($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" name="myform">
		First Name<input type="text" name="f_name" placeholder="First Name" ><span>*<?php echo $efname ?></span><br>
		Last Name<input type="text" name="l_name" placeholder="Last Name"><span>*<?php echo $elname ?></span><br>
		Email Id <input type="email" name="email" placeholder="Email" ><span>*<?php echo $eemail ?></span><br>
		DOB <input type="date" name="dob" placeholder="DOB"><span>*<?php echo $edob ?></span><br>
		Aadhar number <input type="Text" name="aadhar" placeholder="Aadhar" ><span>*<?php echo $eaadhar ?></span><br>
		Password<input type="password" name="psw" placeholder="Password"><span>*<?php echo $epassword ?></span><br>
		Confirm Your Password<input type="password" name="psw1" placeholder="Confirm Password"><span>*<?php echo $ecpassword ?></span><br>
		Department <select name="Department" class="department" placeholder="Select">
		<option value="admin">Admin</option>
		<option value="digital_marketing">Digital Marketing</option>
		<option value="designer" default>Graphic Designer</option>
		<option value="developer">Web Developer</option>
		<option value="team_manager">Team Manager</option>
		<option value="social_media">Social Media</option>
		<option value="copy_writter">Copy Writter</option>
		<option value="hr">Human Resource</option>
		
		</select><br><br>
    <button type="submit" class="submit_btn" >Submit</button>
</form>
</div>
<br>
	<?php   }
	else{

		$cn=mysqli_connect("localhost","root","","login") or die("Could not Connect My Sql");

	     $sql = "INSERT INTO `Registration` (`f_name`,`l_name`,`email`,`dob`,`aadhar`,`Password`,`Department`)  VALUES ('$_POST[f_name]','$_POST[l_name]','$_POST[email]','$_POST[dob]','$_POST[aadhar]','$_POST[psw]','$_POST[Department]')";
		if (mysqli_query($cn, $sql)) {
		
			echo '<script>alert("You are successfully registered! ");  window.location.href = "index.php";</script>'; 

		}
		else {		
	echo"<h1 style='text-align: center;background-color:rgb(180, 178, 178) ;font-size: 40px;font-style: italic; opacity: 1.0;margin-top:300px;'>". "You have entered a existing user's details please check the error below! "."</h1>";
		
		echo "<h1 style='text-align: center;background-color:rgb(180, 178, 178) ;font-size: 40px;font-style: italic; opacity: 1.0;'>". "Error: " . $sql . "" . mysqli_error($cn) ."</h1>";
	 }



	}	
	
?>
</body>
</html>