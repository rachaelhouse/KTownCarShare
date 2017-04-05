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

echo "<h1 align = 'center'><br><b>Cars Traveled 5000+ Km's Since Last Maintence:</b>";

$result = (mysqli_query($cxn,"SELECT VIN FROM History WHERE (DropOdReading - PickOdReading > '5000')"));
while ($row = mysqli_fetch_assoc($result)){
	echo "<h3 align = 'center'><br><b>VIN: </b>", $row['VIN'], "<br>";

	
}

?>

<?php
	echo "<h5><br>";
	include_once('./includes/footer.class.php');
?>

</body>
