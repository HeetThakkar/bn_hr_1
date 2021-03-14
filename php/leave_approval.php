<?php
session_start();
$cn=mysqli_connect("localhost","root","","login") or die("Could not Connect My Sql");
$depart = array("admin", "hr");


if($_SESSION["UserId"] == null  || $_SESSION["Department"] =='digital_marketing'|| $_SESSION["Department"] =='developer'|| $_SESSION["Department"] =='social_media'|| $_SESSION["Department"] =='team_manager'|| $_SESSION["Department"] =='designer' || $_SESSION["Department"] =='copy_writter' ){
  echo '<script>window.location.href = "index.php";</script>';
}
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Home</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../styles/style2.css">  

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
  echo $row["f_name"]; }?> please approve the leaves </h3>

<form action="insert_leave_approval.php" method="POST">
  <br><br>
<?php 
$approval_field= $_SESSION["Department"].'verification';
    $sql2 = "SELECT *
    FROM leaves
    where $approval_field is null;";
$result= mysqli_query($cn,$sql2);?>

<table style="width:100%">
  <tr>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Email</th>
    <th>Leave Type</th>
    <th>Leave Start Date</th>
    <th>Leave End Date</th>
    <th>Reason</th>
    <th>Validate</th>
  </tr>
  <?php
while($row = $result->fetch_assoc()) {?>

<tr>
<td><?php echo $row["f_name"]; ?></td>
<td><?php echo $row["l_name"]; ?></td>
<td><?php echo $row["email"] ;?></td>
<td><?php echo $row["leave_type"]; ?></td>
<td><?php echo $row["leavestart"]; ?></td>
<td><?php echo $row["leaveenddate"]; ?></td>
<td><?php echo $row["reason"]; ?></td>
<td><select name="<?php echo $row["Leave_Id"];  ?>" id="">
            <option value="">Select</option>
            <option value="approve">approve</option>
            <option value="reject" default>reject</option>

        </select></td>
</tr>
<?php } ?>
</table>
<input type="submit"  value=" Assign">

</form>

	

</body>
</html>
<?php 
}
?>