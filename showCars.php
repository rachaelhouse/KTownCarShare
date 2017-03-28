<?php
include_once('connect.php');

$date=date("Y-m-d");

echo "Cars Available on ", $date;

$unCars = (mysqli_query($cxn,"SELECT VIN FROM Reservation WHERE RDate = $date"));
$cars = (mysqli_query($cxn,"SELECT * FROM Car "));
if (mysqli_num_rows($cars) > 0) {
while ($row = mysqli_fetch_assoc($cars)){
	echo "VIN: ", $row['VIN'], " Make: ", $row['Make'], " Model: ", $row['Model'], " Year: ", $row['Year'] ," Location: ", $row['Location'], " Fee: ", $row['Fee'];

}
}

?>