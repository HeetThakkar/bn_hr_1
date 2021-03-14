<?php 
date_default_timezone_set('Asia/Kolkata');
echo "Today is ". date("d+1:m:y") . "<br>";
$date_d=    date("d");
$date_d=(int)$date_d;
$date_d+=1;
echo $date_d.date(":m:y");
?>