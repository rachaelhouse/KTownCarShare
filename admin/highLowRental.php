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

echo "<h2 align = 'center'><br>Highest/Lowest Car Rentals";

$result = (mysqli_query($cxn,"SELECT VIN, RentalNo FROM Car ORDER BY RentalNo"));
while ($row = mysqli_fetch_assoc($result)){
	echo "<h2 align = 'center'><br>VIN: ", $row['VIN'],"<br> Number of Rentals: ", $row['RentalNo'];
}

?>

<?php
	include_once('./includes/footer.class.php');
?>

</body>
