<?php
session_start();
$cn=mysqli_connect("localhost","root","","login") or die("Could not Connect My Sql");
if($_SESSION["UserId"] == null){
  echo '<script>window.location.href = "index.php";</script>';
}
else{
$approval_field=$_SESSION["Department"].'verification';
    $sql = "SELECT *
    FROM registration
    where verification is null";
$result= mysqli_query($cn,$sql);


while($row = $result->fetch_assoc()) {
    $leave_app=$_POST[$row["UserId"]];
    
    $approval_field=$_SESSION["Department"].'verification';
if($leave_app!=null){
         $sql8="UPDATE registration set verification='$leave_app' where UserId='$row[UserId]' ;";
        if (mysqli_query($cn, $sql8)) {
    
            echo '<script>alert("You have successfully the approved User.");  window.location.href = "userhome.php";</script>'; 

        }
        else {		
                        echo"<h1 style='text-align: center;background-color:rgb(180, 178, 178) ;font-size: 40px;font-style: italic; opacity: 1.0;margin-top:300px;'>". "You have entered a existing user's details please check the error below! "."</h1>";
                            
                            echo "<h1 style='text-align: center;background-color:rgb(180, 178, 178) ;font-size: 40px;font-style: italic; opacity: 1.0;'>". "Error: " . $sql8 . "" . mysqli_error($cn) ."</h1>";
                         }
       
        
        }
        else{
            echo '<script>alert("You have successfully the approved User.");  window.location.href = "userhome.php";</script>'; 

        }
 }
}
?>