<?php
include_once('connect.php');

if(isset($_POST['VIN'])){
$member_ID = $_POST['MemID'];
$VIN=$_POST['VIN'];
$date=date("Y-m-d H:i:s");
$locationID=$_POST['Location'];
$length=$_POST['Length'];


$Rno = rand(1111,9999);
if(mysqli_query($cxn,"INSERT INTO reservation values ('$Rno', '$date', $length, '$member_ID','$VIN')")){
echo "<h1 align='center'> The Booking was successful!";

}else{
	echo "<h1 align='center'> The Booking was NOT successful. ";
	
}
}else{
	echo "<h1 align='center'> The Booking was NOT successful. ";

}

?>
