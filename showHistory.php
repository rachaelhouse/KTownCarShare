<?php
  //Create a user session or resume an existing one
 session_start();
 ?>

<?php
include_once('./includes/header.class.php');
?>

<!-- Header and Nav -->
<?php
	require('./includes/nav.class.php');
?>

<?php
include_once('connect.php');

if(isset($_SESSION['member_ID'])){
$member_ID = $_SESSION['member_ID'];
echo "<h1 align= 'center'>Your Reservations: <br>";
$result = (mysqli_query($cxn,"SELECT RNo, RDate,Length, VIN FROM Reservation where MemID = '$member_ID'"));
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)){
	echo "<h3 align = 'center'><br><b>Reservation Number: </b>", $row['RNo'], " <br><b>Reservation Date: </b>", $row['RDate'], " <br><b>Length of Rental: </b>", $row['Length'], " <br><b>VIN: </b>", $row['VIN'],"<br><br>";

}
}
else{
	echo "<h1 align='center'> No Reservations to show ";
}

}
else{
	echo "<h1 align='center'> You must be logged in to show rental history";
}
?>
<br/><br/><br/><br/>
<?php
	include_once('./includes/footer.class.php');
?>