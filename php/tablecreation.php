<html>
<head>
<title> Create table  </title>
</head>
<body>
<?php
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'login';
	$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	$sql = "Create table Registration(
		`UserId` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`f_name` varchar(30),
			`l_name` varchar(30),
			`email` varchar(40) Unique,
			`aadhar` int,
			`dob` date,
			`Password` varchar(30),
			`Department` varchar(20),
			`verification` varchar(30)
			
			)ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		if(mysqli_query($conn,$sql))
	{
		echo "Table Created Successfully";
	}
	else
	{
		echo "Error".mysqli_error($conn);
	}
$sql2="ALTER TABLE Registration AUTO_INCREMENT=1001;";
if(mysqli_query($conn,$sql2))
{
	echo "Table Created Successfully";
}
else
{
	echo "Error".mysqli_error($conn);
}

$sql1="Create table Leaves(
	`UserId` int,
	`Leave_Id` int AUTO_INCREMENT primary key,
		`f_name` varchar(30),
		`l_name` varchar(30),
		`email` varchar(40),
		`leave_type` varchar(15),
		`leavestart` date,
		`leaveenddate` date,
		`reason` varchar(600),
		`hrverification` varchar(30),
		`adminverification` varchar(30)
		
		)ENGINE=InnoDB DEFAULT CHARSET=latin1;";
if(mysqli_query($conn,$sql1))
{
	echo "Table Created Successfully";
}
else
{
	echo "Error".mysqli_error($conn);
}
$sql3="ALTER TABLE Leaves AUTO_INCREMENT=1;";
if(mysqli_query($conn,$sql3))
{
	echo "Table Created Successfully";
}
else
{
	echo "Error".mysqli_error($conn);
}
$table_name="login".date("m_Y");
$login_field="login".date("d_m_Y");
$logout_field="logout".date("d_m_Y");
date_default_timezone_set('Asia/Kolkata');

$current_time=date("h:i:sa");
$sql4 = "Create table $table_name (
	`UserId` int NOT NULL ,
		`f_name` varchar(30),
		`l_name` varchar(30),
		`email` varchar(40) unique ,
		`location` varchar(600),
		`ip_addr` varchar(20),
		`late_count` int DEFAULT 0
		
		
		)ENGINE=InnoDB DEFAULT CHARSET=latin1;";
	if(mysqli_query($conn,$sql4))
{
	
}
$sql5 = "Create table reimbursement (
	reimbursement_id int AUTO_INCREMENT primary key,
	`UserId` int NOT NULL,
		`f_name` varchar(30),
		`l_name` varchar(30),
		`email` varchar(40),
		`reimbursement_date` date,
		`from` varchar(600),
		`to` varchar(20),
		`amount` int,
		`reason` varchar(1000),
		`proof` varchar(1000),
		`hrverification` varchar(30),
		`adminverification` varchar(30)
		
		
		)ENGINE=InnoDB DEFAULT CHARSET=latin1;";
	if(mysqli_query($conn,$sql5))
{
	
}

	mysqli_close($conn);
?>
</body>
</html>