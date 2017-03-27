<?php
include_once('connect.php');

if(isset($_POST['VIN'])){
$member_ID = $_Post['memID'];
$VIN=$_POST['VIN'];
$date=date("Y-m-d H:i:s");
$locationID=$_POST['location'];
$pick_up_time=$_POST['STime'];
$return_time=$_POST['ETime']; 

$Start = date('Y-m-d H:i:s',$pick_up_time);
$End = date('Y-m-d H:i:s',$return_time);

if(mysqli_query($cxn,"INSERT INTO reservation values (UUID_SHORT(),'$member_ID','$VIN','$date','$locationID','$Start','','active','$End','')")){
echo "<h1 align='center'> The Booking was successful! You will be redirected to the home page in 5 sec...</h1>";
header('Refresh: 5; URL=localhost/KTownCarShare');
}else{
	echo "<h1 align='center'> The Booking was NOT successful. You will be redirected to the booking page in 5sec...</h1>";
	header('Refresh: 5; URL=localhost/KTownCarShare');
}
}else{
	echo "<h1 align='center'> The Booking was NOT successful. You will be redirected to the booking page in 5sec...</h1>";
	header('Refresh: 5; URL=localhost/KTownCarShare');
}

?>
