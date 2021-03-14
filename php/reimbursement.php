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
  <title>Request Reimbursement</title>
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
  echo $row["f_name"]; }?>, Please fill the below form to request for reimbursement. </h3>


<form class="careers_form" enctype="multipart/form-data" role="form" id="careers_form" method="post" action="insert_reimbursement.php">
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
Reimbursement Date: <input type="date" name="reimbursement_date" ><br><br>
From: <input type="text" name="reimbursement_from"><br><br>
To: <input type="text" name="reimbursement_to"><br><br>
Amount: <input type="text" name="reimbursement_amount"><br><br>
Reason: <textarea  placeholder="Reason For Reimbursement" name="reason"></textarea><br><br>
<input type="file"  name="fileToUpload" id="fileToUpload"><br><br>
 <input type="submit" class="careers_submit_btn" name="save" value="Submit">
</form>


</body>
</html>
<?php 
}
?>