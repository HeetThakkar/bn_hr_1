<?php
session_start();
?>
<html>
<head>
<title> Verification </title>
<style>
  body{
    background-color: cyan;
    text-align: left;
  }
</style>
</head>
<body> 
  <h1 style="text-align: center;">Please select verified only if details match</h1>
<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'login';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM registration
WHERE verification is null
LIMIT 1;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "- Employee Id: " . $row["UserId"]."<br>"."<br>";
    echo "- first name: " . $row["f_name"]."<br>"."<br>";
    echo " - last Name: " . $row["l_name"]."<br>"."<br>";
    echo "- Aadhar number " . $row["aadhar"]."<br>"."<br>";
    echo "- Date of birth " . $row["dob"] ."<br>"."<br>";
    $_SESSION["UserId"] = $row["UserId"];
    ?>
   
    <form action="verification.php" method="POST">
        <select name="verification" id="">
            <option value="verified">verified</option>
            <option value="not-verified" default>not-verified</option>

        </select>
        <input type="submit" value="submit">

    </form>
    <?php
?>

<?php   
}
} else {
  echo "0 results";
}
$conn->close();
?>
 </body>
</html> 