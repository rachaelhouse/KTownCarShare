<?php
  //Create a user session or resume an existing one
 session_start();
 ?>
<?php
include_once('connect.php');

$date=date("Y-m-d");

echo "Cars Available on ", $date, "<br>";

$unCars = (mysqli_query($cxn,"SELECT VIN FROM Reservation WHERE RDate = $date"));
$cars = (mysqli_query($cxn,"SELECT * FROM Car "));
if (mysqli_num_rows($cars) > 0) {
while ($row = mysqli_fetch_assoc($cars)){
	echo "<br>VIN: ", $row['VIN'], "\tMake: ", $row['Make'], "\tModel: ", $row['Model'], "\tYear: ", $row['Year'] ,"\tLocation: ", $row['Location'], "\tFee: ", $row['Fee'], "<br>";

}
}

?>