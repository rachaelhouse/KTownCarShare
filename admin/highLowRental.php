<?php
  //Create a user session or resume an existing one
 session_start();
 ?>
<?php
include_once('./includes/header.class.php');
?>


<?php
	require('./includes/nav.class.php');
	include_once('connect.php');
?>

<?php

echo "<h1 align = 'center'><br><b>Highest/Lowest Car Rentals</b>";

$result = (mysqli_query($cxn,"SELECT VIN, RentalNo FROM Car ORDER BY RentalNo"));
while ($row = mysqli_fetch_assoc($result)){
	echo "<h4 align = 'center'><br><b>VIN: </b>", $row['VIN'],"<br><b> Number of Rentals: </b>", $row['RentalNo'];
}

?>

<?php
	echo "<h5><br><br>";
	include_once('./includes/footer.class.php');
?>

</body>
