<?php
session_start();
$cn=mysqli_connect("localhost","root","","login") or die("Could not Connect My Sql");
if($_SESSION["UserId"] == null){
  echo '<script>window.location.href = "index.php";</script>';
}
else{
   
$UserId=$_SESSION["UserId"];  
  $sql = "SELECT *
  FROM registration
  WHERE UserId=$UserId ;";
$result= mysqli_query($cn,$sql);
while($row = $result->fetch_assoc()) {
    $table_name="login".date("m_Y");
    $login_field="login".date("d_m_Y");
    $logout_field="logout".date("d_m_Y");
date_default_timezone_set('Asia/Kolkata');

    $current_time=date("h:i:sa");
    $sql1 = "Create table $table_name (
		`UserId` int NOT NULL,
			`f_name` varchar(30),
			`l_name` varchar(30),
			`email` varchar(40) unique ,
			`location` varchar(600),
			`ip_addr` varchar(20),
			`late_count` int DEFAULT 0
			
			
			)ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		if(mysqli_query($cn,$sql1))
	{
		
	}
   
$sql2="ALTER TABLE $table_name ADD  $login_field  VARCHAR( 25 ) ;";
$sql3="ALTER TABLE $table_name ADD  $logout_field  VARCHAR( 25 ) ;";
// $sql3=`ALTER TABLE $table_name ADD $logout_field VARCHAR( 25 ) NOT NULL`;
if(mysqli_query($cn,$sql2))
{
echo "2 done";

			}
           
    if(mysqli_query($cn,$sql3))
	{
	
	}
    
    $sql4 = "INSERT INTO $table_name (`UserId`,`f_name`,`l_name`,`email`)  VALUES ('$UserId', '$row[f_name]',' $row[l_name]',' $row[email]');";
        }
    if (mysqli_query($cn, $sql4)) {
    
   
    }
    // else {		
    //                 echo"<h1 style='text-align: center;background-color:rgb(180, 178, 178) ;font-size: 40px;font-style: italic; opacity: 1.0;margin-top:300px;'>". "You have entered a existing user's details please check the error below! "."</h1>";
                        
    //                     echo "<h1 style='text-align: center;background-color:rgb(180, 178, 178) ;font-size: 40px;font-style: italic; opacity: 1.0;'>". "Error: " . $sql4 . "" . mysqli_error($cn) ."</h1>";
    //                  }
    $date=(int)date("d");
    $date+=1;
    $login1_field="login".$date.date("_m_Y");
    $logout1_field="logout".$date.date("_m_Y");
    $sql10="ALTER TABLE $table_name ADD  $login1_field  VARCHAR( 25 ) ;";
$sql11="ALTER TABLE $table_name ADD  $logout1_field  VARCHAR( 25 ) ;";
// $sql3=`ALTER TABLE $table_name ADD $logout_field VARCHAR( 25 ) NOT NULL`;
if(mysqli_query($cn,$sql10))
{
echo "3 done";

			}
           
    if(mysqli_query($cn,$sql11))
	{
	
	}
    $date=(int)date("d");
    $date+=2;
    $login1_field="login".$date.date("_m_Y");
    $logout1_field="logout".$date.date("_m_Y");
    $sql12="ALTER TABLE $table_name ADD  $login1_field  VARCHAR( 25 ) ;";
$sql13="ALTER TABLE $table_name ADD  $logout1_field  VARCHAR( 25 ) ;";
// $sql3=`ALTER TABLE $table_name ADD $logout_field VARCHAR( 25 ) NOT NULL`;
if(mysqli_query($cn,$sql12))
{
echo "3 done";

			}
           
    if(mysqli_query($cn,$sql13))
	{
	
	}
    $date=(int)date("d");
    $date+=3;
    $login1_field="login".$date.date("_m_Y");
    $logout1_field="logout".$date.date("_m_Y");
    $sql14="ALTER TABLE $table_name ADD  $login1_field  VARCHAR( 25 ) ;";
$sql15="ALTER TABLE $table_name ADD  $logout1_field  VARCHAR( 25 ) ;";
// $sql3=`ALTER TABLE $table_name ADD $logout_field VARCHAR( 25 ) NOT NULL`;
if(mysqli_query($cn,$sql14))
{
echo "3 done";

			}
           
    if(mysqli_query($cn,$sql15))
	{
	
	}
date_default_timezone_set('Asia/Kolkata');
$hour=(int)date("h");
$mins=(int)date("i");

$sql6 = "SELECT *
  FROM $table_name
  WHERE UserId=$UserId; ";
$result= mysqli_query($cn,$sql6);
while($row = $result->fetch_assoc()) {
echo $row[$logout_field];
    if($row[$login_field]==null){
        echo $hour . $mins;
        if($hour==9 && $mins>45){
           
                $late=$row["late_count"];
                $late+=1;


                $sql9="UPDATE $table_name set late_count=$late where UserId=$UserId ;";
                if (mysqli_query($cn, $sql9)) {
            
                    // echo '<script>alert("You edited your data.");  window.location.href = "userhome.php";</script>'; 
        
        
                }
               
            

        }
        if($hour>9){
            $late=$row["late_count"];
            $late+=1;


            $sql9="UPDATE $table_name set late_count=$late where UserId=$UserId ;";
            if (mysqli_query($cn, $sql9)) {
        
                // echo '<script>alert("You edited your data.");  window.location.href = "userhome.php";</script>'; 
    
    
            }
            // else {		
            //                 echo"<h1 style='text-align: center;background-color:rgb(180, 178, 178) ;font-size: 40px;font-style: italic; opacity: 1.0;margin-top:300px;'>". "You have entered a existing user's details please check the error below! "."</h1>";
                                
            //                     echo "<h1 style='text-align: center;background-color:rgb(180, 178, 178) ;font-size: 40px;font-style: italic; opacity: 1.0;'>". "Error: " . $sql9 . "" . mysqli_error($cn) ."</h1>";
            //                  }
        }
        date_default_timezone_set('Asia/Kolkata');
$hour=(int)date("h");
$mins=(int)date("i");
$am=date("a");
$time=date("h:i:a");
        $sql9="UPDATE $table_name set $login_field='$time' where UserId=$UserId ;";
        if (mysqli_query($cn, $sql9)) {
    
            echo '<script>alert("Your login time is noted.");  window.location.href = "userhome.php";</script>'; 


        }
    }
    else{
        date_default_timezone_set('Asia/Kolkata');
        $hour=(int)date("h");
        $mins=(int)date("i");
        $am=date("a");
        $time=date("h:i:a");
        $table_name1="tasksheet".date("m_Y");
        $update_field="status".date("d_m_y");
        $sql10="UPDATE $table_name1 set $update_field='$_POST[update]' where UserId=$UserId ;";
        if (mysqli_query($cn, $sql10)) {
    
            // echo '<script>alert("You edited your data.");  window.location.href = "userhome.php";</script>'; 


        }
        // else {		
        //                 echo"<h1 style='text-align: center;background-color:rgb(180, 178, 178) ;font-size: 40px;font-style: italic; opacity: 1.0;margin-top:300px;'>". "You have entered a existing user's details please check the error below! "."</h1>";
                            
        //                     echo "<h1 style='text-align: center;background-color:rgb(180, 178, 178) ;font-size: 40px;font-style: italic; opacity: 1.0;'>". "Error: " . $sql10 . "" . mysqli_error($cn) ."</h1>";
        //                  }
        $sql9="UPDATE $table_name set $logout_field='$time' where UserId=$UserId ;";
        if (mysqli_query($cn, $sql9)) {
    
            echo '<script>alert("Your logout time is noted.");  window.location.href = "userhome.php";</script>'; 


        }

    }
}
// $sql9="UPDATE $table_name set $login_field=$hour where UserId=0 ;";
//         if (mysqli_query($cn, $sql9)) {
    
//             echo '<script>alert("You edited your data.");  window.location.href = "edituser.php";</script>'; 


//         }
//         else {		
//             echo"<h1 style='text-align: center;background-color:rgb(180, 178, 178) ;font-size: 40px;font-style: italic; opacity: 1.0;margin-top:300px;'>". "You have entered a existing user's details please check the error below! "."</h1>";
                
//                 echo "<h1 style='text-align: center;background-color:rgb(180, 178, 178) ;font-size: 40px;font-style: italic; opacity: 1.0;'>". "Error: " . $sql . "" . mysqli_error($cn) ."</h1>";
//              }
        



}
?>