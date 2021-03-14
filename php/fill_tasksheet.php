<?php
session_start();
$cn=mysqli_connect("localhost","root","","login") or die("Could not Connect My Sql");
if($_SESSION["UserId"] == null || $_SESSION["Department"] !="team_manager" ){
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
  echo $row["f_name"]; }?> please make the tasksheet for <?php $date_d=    date("d");
  $date_d=(int)$date_d;
  $date_d+=1;
  echo $date_d.date(":m:y");?> </h3>

<form action="insert_timesheet.php" method="POST">
  <br><br>
<?php $UserId=$_SESSION["UserId"];  
    $sql = "SELECT *
    FROM registration
    where verification='verified'and Department !='admin' and Department !='hr' ;";
$result= mysqli_query($cn,$sql);


while($row = $result->fetch_assoc()) {?>
<label>
 <?php echo $row["f_name"]; ?></label>

 <textarea name="<?php
$task_of="task".$row["UserId"];
echo $task_of;?>" cols="30" rows="5"></textarea><br><br>
	<?php } ?>
<input type="submit"  value=" Assign">

</form>

	

</body>
</html>
<?php 
}
?>