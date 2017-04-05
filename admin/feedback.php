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
echo "<h1 align = 'center'><br>Comments Needing Feedback";

$result = (mysqli_query($cxn,"SELECT Comment, MemID, VIN, Rating FROM Comment"));
while ($row = mysqli_fetch_assoc($result)){
	echo "<h4 align = 'center'><br>Member: ", $row['MemID'],"<br> VIN: ", $row['VIN'],"<br> Comment: ", $row['Comment'],"<br> Rating: ", $row['Rating'], "<br>";	
	echo "<form action='feedbackPage.php'>";
	echo "<textarea name='comment' rows='7' cols='50'> </textarea>";
	echo "<input type='submit' name='id' value='Submit'>";
	error_reporting(E_ALL ^ E_NOTICE);
	$VIN1 = $_GET[$row['VIN']];
	$sql = "DELETE FROM 'Comment' WHERE 'VIN' = $VIN1";
	if(isset($_POST['id']))
	{
		$VIN1 = $_GET['VIN'];
 		$sql = "DELETE FROM 'Comment' WHERE 'VIN' = $VIN1"; 
 		echo"hi";
	}
	echo "</form>";

}
?>

<?php
	echo "<h5><br>";
	include_once('./includes/footer.class.php');
?>