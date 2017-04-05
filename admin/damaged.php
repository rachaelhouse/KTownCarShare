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

echo "<h1 align = 'center'><br>Damaged/Need Repair Cars";

$result = (mysqli_query($cxn,"SELECT VIN, Status FROM History where (Status = 'Not Running' or Status = 'Damaged')"));
while ($row = mysqli_fetch_assoc($result)){
	echo "<h4 align = 'center'><br><b>VIN: </b>", $row['VIN'],"<br> <b>Status: </b>", $row['Status'];
}

?>

<?php
	echo "<h5><br><br>";
	include_once('./includes/footer.class.php');
?>

</body>
