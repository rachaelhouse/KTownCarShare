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
echo "<br><h1 align ='center'><b>Comment Successfully Sent!</b><br><br><br>";
?>

<?php
	echo "<h5><br>";
	include_once('./includes/footer.class.php');
?>
