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

echo "<h2 align = 'center'><br>Comments Needing Feed Back";

$result = (mysqli_query($cxn,"SELECT Comment, MemID, VIN, Rating FROM Comment"));
while ($row = mysqli_fetch_assoc($result)){
	echo "<h2 align = 'center'><br>Member: ", $row['MemID'],"<br> VIN: ", $row['VIN'],"<br> Comment: ", $row['Comment'],"<br> Rating: ", $row['Rating'], "<br>";

	
}

?>

<?php
	include_once('./includes/footer.class.php');
?>

</body>
