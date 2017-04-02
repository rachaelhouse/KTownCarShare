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

echo "<h2 align = 'center'><br>Damaged/Need Repair Cars";

$result = (mysqli_query($cxn,"SELECT VIN, Status FROM History where (Status = 'Not Running' or Status = 'Damaged')"));
while ($row = mysqli_fetch_assoc($result)){
	echo "<h2 align = 'center'><br>VIN: ", $row['VIN'],"<br> Status: ", $row['Status'];
}

?>

<?php
	include_once('./includes/footer.class.php');
?>

</body>
