<?php
session_start();
$cn=mysqli_connect("localhost","root","","login") or die("Could not Connect My Sql");
if($_SESSION["UserId"] == null){
  echo '<script>window.location.href = "index.php";</script>';
}
if($_POST['save'])
    {
error_reporting(E_ALL);
ini_set('display_errors', '1');


    $ip = $_SERVER['REMOTE_ADDR']. " / " .$_SERVER['REMOTE_ADDR'];
	$date = date("d-m-Y");
        $target_dir = "reimbursement_proof/";
        if (!file_exists($target_dir))
	{
		@mkdir($target_dir, 0777);
	}  
        date_default_timezone_set('Asia/Kolkata');
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        echo $target_file;
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $temp = explode(".", $_FILES["fileToUpload"]["name"]);
        $target_file = $target_dir . round(microtime(true)) . '.' . end($temp);
        if (file_exists($target_file)) 
            {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
               
              
            }
        if ($_FILES["fileToUpload"]["size"] > 400000)
            {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
        if($imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "pdf" && $imageFileType != "jpg" && $imageFileType != "png"&& $imageFileType != "jpeg" ) 
            {
                echo "Sorry, only doc, docx, pdf, jpg, png, jpeg";
                $uploadOk = 0;
            }
        if ($uploadOk == 0) 
            {
                echo "Sorry, your file was not uploaded.";
            } 
        else 
            {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
                    {
                        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                        $proof_link=  $target_file;
                        $cn=mysqli_connect("localhost","root","","login") or die("Could not Connect My Sql");
                        $UserId=$_SESSION["UserId"];  
                          $sql = "SELECT f_name, l_name, email
                          FROM registration
                          where UserId=$UserId";
                        $result= mysqli_query($cn,$sql);
                        while($row = $result->fetch_assoc()) {     
$sql1 = "INSERT INTO `reimbursement` (`UserId`,`f_name`,`l_name`,`email`,`reimbursement_date`,`from`,`to`,`amount`,`reason`,`proof`)  VALUES ('$UserId','$row[f_name]',' $row[l_name]',' $row[email]','$_POST[reimbursement_date]','$_POST[reimbursement_from]','$_POST[reimbursement_to]','$_POST[reimbursement_amount]','$_POST[reason]','$proof_link')";
if (mysqli_query($cn, $sql1)) {

echo '<script>alert("You have successfully applied for a leave! "); window.location.href = "userhome.php"; </script>'; 


}

else {		
echo"<h1 style='text-align: center;background-color:rgb(180, 178, 178) ;font-size: 40px;font-style: italic; opacity: 1.0;margin-top:300px;'>". "You have entered a existing user's details please check the error below! "."</h1>";

echo "<h1 style='text-align: center;background-color:rgb(180, 178, 178) ;font-size: 40px;font-style: italic; opacity: 1.0;'>". "Error: " . $sql1 . "" . mysqli_error($cn) ."</h1>";
}

                        }

                    } 
                else 
                    {
                        echo "Sorry, there was an error uploading your file.";
                    }
            }
    }

?>