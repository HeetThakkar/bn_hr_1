<?php
session_start();
?>
<html>
<body>
<?php
$conn = mysqli_connect("localhost","root","","login") or die("Could not Connect My Sql");

$user = $_POST["email"];
$pwd = "$_POST[password]";
if ($user=='admin' & $pwd=='admin'){
	header("location: admin.php");
}
$sql = "SELECT *
 	 FROM registration
     WHERE UserId='$user' or email='$user' ";

$result = mysqli_query($conn,$sql);
while ($row = $result->fetch_assoc()) {
$_SESSION["UserId"]= $row['UserId'];
$_SESSION["email"]= $row['email'];
$_SESSION["Department"]= $row['Department'];

if ($pwd == $row['Password']) 
	{
		if ($row['verification']=='verified') 
	{
		if (mysqli_num_rows($result1)==0)
		{
			header("location: userhome.php");

		}
		else
		{
			header("location: userhome.php");

		
		}
       
	
	}
	else{
		echo '<script>alert("You are not a verified user! ");  window.location.href = "index.php";</script>'; 

	}
	}
    if ($pwd != $row['Password'])
    
	{
		echo '<script>alert("You have entered wrong password! ");  window.location.href = "index.php";</script>'; 
        
       
	}
}
?>
</body>
</html>