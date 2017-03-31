<?php
  //Create a user session or resume an existing one
 session_start();
 ?>
<?php
include_once('connect.php');

if (isset($_SESSION['member_ID'])){
	$member_ID = $_SESSION['member_ID'];

if(isset($_POST['VIN'])){
$VIN=$_POST['VIN'];
$date= $_POST["DATE"];
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
}else{
echo "<h1 align='center'> You must be logged in to make a reservation. Redirecting to Home page in 5 seconds ";
	header('Refresh: 5; URL=index.php');
}

?>



