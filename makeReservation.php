
<?php
include_once('connect.php');

if(isset($_POST['VIN'])){
$member_ID = $_POST['MemID'];
$VIN=$_POST['VIN'];
$date=$_POST("date");
$locationID=$_POST['Location'];
$length=$_POST['Length'];


$Rno = rand(1111,9999);
if(mysqli_query($cxn,"INSERT INTO reservation values ('$Rno', '$date', $length, '$member_ID','$VIN')")){
echo "<h1 align='center'> The Booking was successful! Redirecting to homepage in 5 seconds";
header('Refresh: 5; URL=index.php');

}else{
	echo "<h1 align='center'> The Booking was NOT successful. Redirecting to Reservation page in 5 seconds ";
	header('Refresh: 5; URL=createReservation.php');
}
}else{
	echo "<h1 align='center'> The Booking was NOT successful. Redirecting to Reservation in 5 seconds";
	header('Refresh: 5; URL=createReservation.php');

}


?>



