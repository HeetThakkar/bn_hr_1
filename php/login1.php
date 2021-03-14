<?php
session_start();
$cn=mysqli_connect("localhost","root","","login") or die("Could not Connect My Sql");
if($_SESSION["UserId"] == null){
  echo '<script>window.location.href = "index.php";</script>';
}
else{
echo '$_POST[f_name]' ,'$_POST[l_name]','$_POST[email]';
$cn=mysqli_connect("localhost","root","","login") or die("Could not Connect My Sql");
$UserId=$_SESSION["UserId"];  
  $sql = "SELECT f_name, l_name, email
  FROM registration
  where UserId=$UserId";
$result= mysqli_query($cn,$sql);
while($row = $result->fetch_assoc()) {
$row["f_name"]; 
$sql = "INSERT INTO `Leaves` (`f_name`,`l_name`,`email`,`leave_type`,`leavestart`,`leaveenddate`,`reason`)  VALUES ('$row[f_name]','$row[l_name]','$row[email]','$_POST[leave_type]','$_POST[leave_start_date]','$_POST[leave_end_date]','$_POST[reason]')";
if (mysqli_query($cn, $sql)) {

echo '<script>alert("You have successfully applied for a leave! ");  window.location.href = "userhome.php";</script>'; 

}

else {		
echo"<h1 style='text-align: center;background-color:rgb(180, 178, 178) ;font-size: 40px;font-style: italic; opacity: 1.0;margin-top:300px;'>". "You have entered a existing user's details please check the error below! "."</h1>";

echo "<h1 style='text-align: center;background-color:rgb(180, 178, 178) ;font-size: 40px;font-style: italic; opacity: 1.0;'>". "Error: " . $sql . "" . mysqli_error($cn) ."</h1>";
}
}
}
?>