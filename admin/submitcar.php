<?php
  //Create a user session or resume an existing one
 session_start();
 ?>
<?php
include_once('connect.php');

if (isset($_SESSION['member_ID'])){
	$member_ID = $_SESSION['member_ID'];

if(isset($_POST['VIN'])){
$VIN=$_POST['VIN'];
$Make= $_POST["Make"];
$Model= $_POST["Model"];
$Year= $_POST["Year"];
$Location=$_POST['Location'];





if(mysqli_query($cxn,"INSERT INTO Car VALUES ('$VIN', '$Make', '$Model', '$Year','$Location' , '0')")){
echo "<h1 align='center'> The car was successfully added! Redirecting to homepage in 5 seconds";
header('Refresh: 5; URL=index.php');

}else{
	echo "<h1 align='center'> The car was not NOT sucessfully added. Redirecting back to Add car page in 5 seconds ";
	header('Refresh: 5; URL=admin/addcar.php');
}
}else{
	echo "<h1 align='center'> The car was not NOT sucessfully added. Redirecting back to Add car page in 5 seconds ";
	header('Refresh: 5; URL=addcar.php');

}
}else{
echo "<h1 align='center'> The car was not NOT sucessfully added. Redirecting back to Add car page in 5 seconds ";
	header('Refresh: 5; URL=addcar.php');
}

?>


