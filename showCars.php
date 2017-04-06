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

<head>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
h1 {
  text-align: center;
  font: bold 30px arial, sans-serif;
}
h2{
  text-align: center;
  font: 20px arial;
}
</style>
</head>

<?php
include_once('connect.php');

$date= ($_POST['DATE']);


echo "<h1>Cars Available on ", $date, "</h2><br>";


$cars = (mysqli_query($cxn,"SELECT * FROM Car "));
if (mysqli_num_rows($cars) > 0) {
while ($row = mysqli_fetch_assoc($cars)){
  $unCars = (mysqli_query($cxn,"SELECT VIN,RDate,Length FROM Reservation"));
  if (mysqli_num_rows($unCars) > 0){
  while($unavailCar = mysqli_fetch_assoc($unCars)){
    $resStartDate = strtotime($unavailCar['RDate']);
    $Length = $unavailCar['Length'];
    $resEndDate = strtotime("+$Length days", $resStartDate);
    if ($unavailCar['VIN'] === $row['VIN'] and strtotime($date) < $resStartDate or strtotime($date) > $resEndDate){
echo "<h2><br>VIN: ", $row['VIN'], ",\tMake: ", $row['Make'], ",\tModel: ", $row['Model'], ",\tYear: ", $row['Year'] ,",\tLocation: ", $row['Location'], ",\tFee: ", $row['Fee'], "<br></h2>";
    }
  }
  }
  else {
    echo "<h2><br>VIN: ", $row['VIN'], ",\tMake: ", $row['Make'], ",\tModel: ", $row['Model'], ",\tYear: ", $row['Year'] ,",\tLocation: ", $row['Location'], ",\tFee: ", $row['Fee'], "<br></h2>";
  }
  }
	


}

?>

<?php
	include_once('./includes/footer.class.php');
?>