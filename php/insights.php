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
  <title>User Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../styles/style2.css">  
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
  echo $row["f_name"]; }?> please go through the bellow instructions before you Login. </h3>
<ol style="margin-left: 8%;">
<li>Check if the account is your else click <a href="index.php" >Log Out</a>. </li>
</ol>
<h3>Total Late Count: <?php
    $table_name="login".date("m_Y");
$sql2 = "SELECT late_count
FROM $table_name
where UserId=$UserId;";
$result= mysqli_query($cn,$sql2);
while($row = $result->fetch_assoc()) {
echo $row["late_count"]; }
?></h3>
<br>
<h3>Total Leaves Count: <?php
$sql2 = "SELECT count(Leave_Id)
FROM leaves
where UserId=$UserId;";
$result= mysqli_query($cn,$sql2);
while($row = $result->fetch_assoc()) {
echo $row["count(Leave_Id)"]; }
?></h3><br>
<h3>Ratings:</h3><br>
<?php  
$table_name='rating'.date("Y");
$sql3 = "SELECT *
FROM $table_name
where UserId=$UserId;";
$result= mysqli_query($cn,$sql3); ?>
<table style="width:100%">
  <tr>
    <th>Jan</th>
    <th>Feb</th>
    <th>March</th>
    <th>April</th>
    <th>May</th>
    <th>June</th>
    <th>July</th>
    <th>Aug</th>
    <th>Sept</th>
    <th>Oct</th>
    <th>Nov</th>
    <th>Dec</th>
  </tr>
<?php
while($row = $result->fetch_assoc()) { ?>

<td><?php $field_name='rating'.'_01'.date("_Y"); echo $row[$field_name]; ?></td>
<td><?php $field_name='rating'.'_02'.date("_Y"); echo $row[$field_name]; ?></td>
<td><?php $field_name='rating'.'_03'.date("_Y"); echo $row[$field_name]; ?></td>
<td><?php $field_name='rating'.'_04'.date("_Y"); echo $row[$field_name]; ?></td>
<td><?php $field_name='rating'.'_05'.date("_Y"); echo $row[$field_name]; ?></td>
<td><?php $field_name='rating'.'_06'.date("_Y"); echo $row[$field_name]; ?></td>
<td><?php $field_name='rating'.'_07'.date("_Y"); echo $row[$field_name]; ?></td>
<td><?php $field_name='rating'.'_08'.date("_Y"); echo $row[$field_name]; ?></td>
<td><?php $field_name='rating'.'_09'.date("_Y"); echo $row[$field_name]; ?></td>
<td><?php $field_name='rating'.'_10'.date("_Y"); echo $row[$field_name]; ?></td>
<td><?php $field_name='rating'.'_11'.date("_Y"); echo $row[$field_name]; ?></td>
<td><?php $field_name='rating'.'_12'.date("_Y"); echo $row[$field_name]; ?></td>
<?php
 } ?>
</body>
</html>
<?php 
}
?>