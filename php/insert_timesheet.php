<?php
session_start();
$cn=mysqli_connect("localhost","root","","login") or die("Could not Connect My Sql");
if($_SESSION["UserId"] == null){
  echo '<script>window.location.href = "index.php";</script>';
}
else{
    $table_name="tasksheet".date("m_Y");
    $date_d=    date("d");
$date_d=(int)$date_d;
$date_d+=1;
 echo  $date_d.date("_m_y");
    $login_field="task". $date_d.date("_m_y");
    $logout_field="status". $date_d.date("_m_y");
date_default_timezone_set('Asia/Kolkata');

    $current_time=date("h:i:sa");
    $sql1 = "Create table $table_name (
		`UserId` int primary key,
			`f_name` varchar(30),
			`l_name` varchar(30),
			`email` varchar(40) unique 
			
			
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
         echo $_POST["$task_of"]. $login_field.$row["UserId"].$table_name ;
         $sql8="UPDATE $table_name set $login_field='$_POST[$task_of]' where UserId='$row[UserId]' ;";
        if (mysqli_query($cn, $sql8)) {
    
            echo '<script>alert("You have successfully the assigned task.");  window.location.href = "userhome.php";</script>'; 

        }
        

 }
}
?>