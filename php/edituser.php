<?php
session_start();
$cn=mysqli_connect("localhost","root","","login") or die("Could not Connect My Sql");
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../styles/edituser.css">   
<title> Edit Profile </title>
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
<?php include "navbar.php";?>

 <?php 
 

$UserId=$_SESSION["UserId"];
$email=$_SESSION["email"];
$conn = mysqli_connect("localhost","root","","login") or die("Could not Connect My Sql");

$sql1 = "SELECT *
FROM registration
WHERE email='$email' or UserId='$UserId' ";
$result1 = mysqli_query($conn,$sql1);
while($row = $result1->fetch_assoc()){
    $fname =$lname= $email= $oldpassword=$cpassword= $password="";
 $eoldpassword=$ecpassword= $epassword=$eopassword="";
	if($_SERVER["REQUEST_METHOD"]=="POST" ){
        $fname =$_POST["f_name"];
        $lname =$_POST["l_name"];
        $email =$_POST["email"];
        $password =$_POST["psw"];
        $cpassword =$_POST["psw1"];
        $oldpassword =$_POST["old_password"];
    if(!$fname==""){
        $email= $row["email"];
        $sql="UPDATE registration set f_name='$fname' where email='$email' ;";
        if (mysqli_query($conn, $sql)) {
    
            echo '<script>alert("You edited your data.");  window.location.href = "edituser.php";</script>'; 


        }
    }
    if(!$lname==""){
        $email= $row["email"];
        $sql="UPDATE registration set l_name='$lname' where email='$email' ;";
        if (mysqli_query($conn, $sql)) {
    
            echo '<script>alert("You edited your data.");  window.location.href = "edituser.php";</script>'; 


        }
    }
    if(!$email==""){
        $email1= $row["email"];
        $sql="UPDATE registration set email='$email' where email='$email1' ;";
        if (mysqli_query($conn, $sql)) {
    
            echo '<script>alert("You edited your data.");  window.location.href = "edituser.php";</script>'; 


        }
    }
    if( !$password==""){
        if(!$oldpassword==""){
            if($oldpassword==$row["Password"]){
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
                
                if( $password== $cpassword &&  $epassword=="" ){
                    $email= $row["email"];
                $sql="UPDATE registration set Password='$cpassword' where email='$email' ;";
                if (mysqli_query($conn, $sql)) {
			
                    echo '<script>alert("You edited your data.");  window.location.href = "edituser.php";</script>'; 
        
                }
                }
            else{
                $ecpassword="does not match the new password";
            }
        }
        else{
            $eopassword="does not match the old password";
        }
    }
    else
    {
      $eopassword="enter old password to update";
    }
}
}
    
    ?>
	
	<div class="login-box" style="height: 570px;">
    <img src="../images/av.png" class="avatar">
		<form action="<?php ($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" name="myform">
		First Name<input type="text" name="f_name" placeholder="<?php echo $row["f_name"] ?>" ><br>
		Last Name<input type="text" name="l_name" placeholder="<?php echo $row["l_name"] ?>" ><br>
		Email Id <input type="email" name="email" placeholder="<?php echo $row["email"] ?>" ><br>
		Old password <input type="password" name="old_password"><span style="color: red;"><?php echo $eopassword; ?></span><br>
		New Password<input type="password" name="psw"><span style="color: red;"><?php echo $epassword; ?></span><br>
		Confirm Your Password<input type="password" name="psw1"><br><span style="color: red;"><?php echo $ecpassword; ?></span>
	<br>
    <input type="submit" value="save changes">
</form>
</div>
<?php }?>
</body>
</html>