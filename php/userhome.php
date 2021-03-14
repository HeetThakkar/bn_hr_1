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
<?php if($_SESSION["Department"]!="admin" ){ ?>

  <h3 style="color: red; margin-left:5%;"> Dear <?php $UserId=$_SESSION["UserId"];  
    $sql = "SELECT f_name
    FROM registration
    where UserId=$UserId";
$result= mysqli_query($cn,$sql);


while($row = $result->fetch_assoc()) {
  echo $row["f_name"]; }?> please go through the bellow instructions before you Login. </h3>
<ol style="margin-left: 8%;">
<li>Check if the account is your else click <a href="index.php" >Log Out</a>. </li>

<li>Accept the terms and condition to Login . </li><br>
</ol>

<form action="login_logout_time.php" method="POST" class="home_page_form">
 <?php  
  $table_name="login".date("m_Y");
  $task_table="tasksheet".date("m_Y");
  $tasksheet="task".date("d_m_Y");
  $update="status".date("d_m_Y");
  $login_field="login".date("d_m_Y");
  $logout_field="logout".date("d_m_Y");
 $sql6 = "SELECT *
  FROM $table_name
  WHERE UserId=$UserId; ";
  $result= mysqli_query($cn,$sql6);
 
while($row = $result->fetch_assoc()) {
if( $row[$login_field] ==null ){?>
  <input type="submit" value="Start Working">
 <?php }
 elseif ($row[$logout_field] ==null ){ 
  $sql7 = "SELECT *
  FROM $task_table
  WHERE UserId=$UserId; ";
  $result= mysqli_query($cn,$sql7);
 
while($row= $result->fetch_assoc()) {
  ?>
  <h1>Tasksheet for:<?php echo date("d:m:y");?> </h1>
<div class="tasksheet">
  <p> <?php
$tasksheet="task".date("d_m_y");
  
  echo $row[$tasksheet]; ?>  </p>
</div>
<div class="update">
  <textarea name="update"  cols="30" rows="5"></textarea>
</div>
<?php } ?>

  <input id="go_home" type="submit" value="GO HOME :)" style="display: block;">
<?php } ?>
<?php } if($row==null ){?>
<input type="submit" id="start_working" value="Start Working">

</form>

<?php }}?>
<?php if($_SESSION["Department"]=="admin" ){ 
  $table_name="login".date("m_Y");
  $login_field="login".date("d_m_Y");
  $logout_field="logout".date("d_m_Y");
  $table_name1="tasksheet".date("m_Y");
  $login_field1="task".date("d_m_y");
$logout_field1="status".date("d_m_y");
	$sql8="SELECT $table_name.f_name,$table_name.l_name,  $login_field, $logout_field, $login_field1,$logout_field1
  FROM $table_name 
  JOIN $table_name1 
  on $table_name.UserId = $table_name1.UserId;";
 $result= mysqli_query($cn,$sql8);

?>
<table style="width:100%">
  <tr>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Login Time</th>
    <th>Logout Time </th>
    <th>Task Assigned</th>
    <th>Task Updates</th>
  </tr>
  <?php
 while($row = $result->fetch_assoc()) {
   ?>

  <td><?php echo $row["f_name"]; ?></td>
  <td><?php echo $row["l_name"]; ?></td>
  <td><?php echo $row[$login_field] ;?></td>
  <td><?php echo $row[ $logout_field]; ?></td>
  <td><?php echo $row[ $login_field1]; ?></td>
  <td><?php echo $row[ $logout_field1]; ?></td>

<?php
 }
 } ?>
	
	<script>


if (document.getElementById("go_home").style.display=="block"){
document.getElementById("start_working").style.display = "none";
}
console.log("hello");
  
  </script>
</body>
</html>
<?php 
}
?>