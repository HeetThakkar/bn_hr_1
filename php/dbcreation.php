<html>
<head>
<title> Database Creation </title>
</head>
<body>
<?php
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$conn = mysqli_connect($dbhost,$dbuser,$dbpass);
	$sql = "Create database login";
	if(mysqli_query($conn,$sql))
	{
		echo "Database created Successfully";
	}
	else
	{
		echo "Error".mysqli_error($conn);
	}
	mysqli_close($conn);
?>
</body>
</html>