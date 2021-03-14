<?php
session_start();
?>
<html>
<body style="background-color: cyan;">
<?php
$verification = $_POST['verification'];
$UserId=$_SESSION["UserId"];
$conn=mysqli_connect("localhost","root","","login") or die("Could not Connect My Sql");

if($verification=='verified')
{
$sql="UPDATE registration
SET verification ='verified'
WHERE UserId =$UserId;";
}
else{
    $sql="UPDATE registration
    SET verification ='not-verified'
    WHERE UserId =$UserId;";
}
if (!mysqli_query($conn,$sql))
  {
  die('Error: ');
  }
	echo"<h1 style='text-align: center ;font-size: 40px;font-style: italic; opacity: 1.0;margin-top:250px;'>". "User saved as $verification! "."</h1>";
mysqli_close($conn)
?>
<a href="verify.php" style="margin-left: 42%;text-decoration:none ">Click here to Verify users</a>
</body>
</html>