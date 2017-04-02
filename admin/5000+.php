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

echo "<h2 align = 'center'><br>Cars Traveled 5000+ Km's Since Last Maintence";

$result = (mysqli_query($cxn,"SELECT VIN FROM History WHERE (DropOdReading - PickOdReading > '5000')"));
while ($row = mysqli_fetch_assoc($result)){
	echo "<h2 align = 'center'><br>VIN: ", $row['VIN'], "<br>";

	
}

?>

<?php
	include_once('./includes/footer.class.php');
?>

</body>
