<?php
session_start();
$cn=mysqli_connect("localhost","root","","login") or die("Could not Connect My Sql");
if($_SESSION["UserId"] == null){
  echo '<script>window.location.href = "index.php";</script>';
}
else{
    $table_name="rating".date("Y");
    $login_field="rating".date("_m_Y");
date_default_timezone_set('Asia/Kolkata');
$field_name1='rating'.'_01'.date("_Y");
$field_name2='rating'.'_02'.date("_Y");
$field_name3='rating'.'_03'.date("_Y");
$field_name4='rating'.'_04'.date("_Y");
$field_name5='rating'.'_05'.date("_Y");
$field_name6='rating'.'_06'.date("_Y");
$field_name7='rating'.'_07'.date("_Y");
$field_name8='rating'.'_08'.date("_Y");
$field_name9='rating'.'_09'.date("_Y");
$field_name10='rating'.'_10'.date("_Y");
$field_name11='rating'.'_11'.date("_Y");
$field_name12='rating'.'_12'.date("_Y");


    $current_time=date("h:i:sa");
    $sql1 = "Create table $table_name (
		`UserId` int primary key,
			`f_name` varchar(30),
			`l_name` varchar(30),
			`email` varchar(40) unique,
            $field_name1 varchar(20),
            $field_name2 varchar(20),
            $field_name3 varchar(20),
            $field_name4 varchar(20),
            $field_name5 varchar(20),
            $field_name6 varchar(20),
            $field_name7 varchar(20),
            $field_name8 varchar(20),
            $field_name9 varchar(20),
            $field_name10 varchar(20),
            $field_name11 varchar(20),
            $field_name12 varchar(20)
			
			
			)ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		if(mysqli_query($cn,$sql1))
	{
		
	}
   
   
$sql2="ALTER TABLE $table_name ADD  $login_field  VARCHAR( 1000 ) ;";
$sql3="ALTER TABLE $table_name ADD  $logout_field  VARCHAR( 1000) ;";
// $sql3=`ALTER TABLE $table_name ADD $logout_field VARCHAR( 25 ) NOT NULL`;
if(mysqli_query($cn,$sql2))
{
echo "2 done";

			}
           
           
    if(mysqli_query($cn,$sql3))
	{
	
	}
   

    $sql = "SELECT *
    FROM registration
    where verification='verified'";
$result= mysqli_query($cn,$sql);


while($row = $result->fetch_assoc()) {
    $task_of="task".$row["UserId"];
    
    $sql4 = "INSERT INTO $table_name (`UserId`,`f_name`,`l_name`,`email`)  VALUES ($row[UserId], '$row[f_name]','$row[l_name]','$row[email]');";
        
    if (mysqli_query($cn, $sql4)) {
    
   
    }
    else {		
        echo"<h1 style='text-align: center;background-color:rgb(180, 178, 178) ;font-size: 40px;font-style: italic; opacity: 1.0;margin-top:300px;'>". "You have entered a existing user's details please check the error below! "."</h1>";
            
            echo "<h1 style='text-align: center;background-color:rgb(180, 178, 178) ;font-size: 40px;font-style: italic; opacity: 1.0;'>". "Error: " . $sql . "" . mysqli_error($cn) ."</h1>";
         }
         $task_of= $_POST[$row["UserId"]];
         $sql8="UPDATE $table_name set $login_field='$task_of' where UserId='$row[UserId]' ;";
        if (mysqli_query($cn, $sql8)) {
    
            echo '<script>alert("You have successfully the assigned ratings.");  window.location.href = "userhome.php";</script>'; 

        }
        

 }
}
?>