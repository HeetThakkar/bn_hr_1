<?php
session_start();
$cn=mysqli_connect("localhost","root","","login") or die("Could not Connect My Sql");
if($_SESSION["UserId"] == null){
  echo '<script>window.location.href = "index.php";</script>';
}
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Request Leave</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php include "navbar.php";?>

<br><br>
  <h3 style="color: red; margin-left:5%;"> Dear <?php $UserId=$_SESSION["UserId"];  
    $sql = "SELECT f_name
    FROM registration
    where UserId=$UserId";
$result= mysqli_query($cn,$sql);
while($row = $result->fetch_assoc()) {
  echo $row["f_name"]; }?>, Please fill the below form to request leave. </h3>


<form action="leave_application.php" method="POST">
First Name: <input type="text" name="name" value="<?php $UserId=$_SESSION["UserId"];  
    $sql = "SELECT f_name FROM registration where UserId=$UserId";$result= mysqli_query($cn,$sql); while($row = $result->fetch_assoc()) {  echo $row["f_name"]; }?>" placeholder="<?php $UserId=$_SESSION["UserId"];  
  $sql = "SELECT f_name
  FROM registration
  where UserId=$UserId";
$result= mysqli_query($cn,$sql);
while($row = $result->fetch_assoc()) {
echo $row["f_name"]; }?>" disabled><br><br>
Last Name: <input type="text" name="lname" value="<?php $UserId=$_SESSION["UserId"];  
    $sql = "SELECT l_name
    FROM registration
    where UserId=$UserId";
$result= mysqli_query($cn,$sql);
while($row = $result->fetch_assoc()) {
  echo $row["l_name"]; }?>" placeholder="<?php $UserId=$_SESSION["UserId"];  
  $sql = "SELECT l_name
  FROM registration
  where UserId=$UserId";
$result= mysqli_query($cn,$sql);
while($row = $result->fetch_assoc()) {
echo $row["l_name"]; }?>" disabled><br><br>
Email: <input type="text" name="email" value="<?php $UserId=$_SESSION["UserId"];  
    $sql = "SELECT email
    FROM registration
    where UserId=$UserId";
$result= mysqli_query($cn,$sql);
while($row = $result->fetch_assoc()) {
  echo $row["email"]; }?>" placeholder="<?php $UserId=$_SESSION["UserId"];  
  $sql = "SELECT email
  FROM registration
  where UserId=$UserId";
$result= mysqli_query($cn,$sql);
while($row = $result->fetch_assoc()) {
echo $row["email"]; }?>" disabled><br><br>
Leave Start Date: <input type="date" name="leave_start_date" ><br><br>
Leave End Date: <input type="date" name="leave_end_date" ><br><br>
Leave Type: <select id="leave_type" name="leave_type"><br><br>
  <option value="Sick">Sick</option>
  <option value="Casual">Casual</option>
</select><br><br>
Reason: <textarea  placeholder="Reason For Leave" name="reason"></textarea><br><br>
  <input type="submit" value="Apply">
</form>


</body>
</html>
<?php 
}
?>