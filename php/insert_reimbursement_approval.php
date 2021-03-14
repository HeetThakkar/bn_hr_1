<?php
session_start();
$cn=mysqli_connect("localhost","root","","login") or die("Could not Connect My Sql");
if($_SESSION["UserId"] == null){
  echo '<script>window.location.href = "index.php";</script>';
}
else{
$approval_field=$_SESSION["Department"].'verification';
    $sql = "SELECT *
    FROM reimbursement
    where hrverification is null or adminverification is null";
$result= mysqli_query($cn,$sql);


while($row = $result->fetch_assoc()) {
    $leave_app=$_POST[$row["reimbursement_id"]];
    
    $approval_field=$_SESSION["Department"].'verification';
if($leave_app!=null){
         $sql8="UPDATE reimbursement set $approval_field='$leave_app' where reimbursement_id='$row[reimbursement_id]' ;";
        if (mysqli_query($cn, $sql8)) {
    
            echo '<script>alert("You have successfully the approved reimbursment.");  window.location.href = "userhome.php";</script>'; 

        }
       
        
        }
        else{
            echo '<script>alert("You have successfully the approved reimbursment.");  window.location.href = "userhome.php";</script>'; 

        }
 }
}
?>