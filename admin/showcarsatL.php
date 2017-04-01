<?php
  //Create a user session or resume an existing one

 ?>

<?php
include_once('./includes/header.class.php');
?>

<!-- Header and Nav -->
<?php
	require('./includes/nav.class.php');
?>

<?php
include_once('connect.php');

if(isset($_Post['Location'])){
$Location = $_Post['Location'];
echo "Cars at location: ", $Location;
$result = (mysqli_query($cxn,"SELECT VIN FROM Car where Location = $Location"));
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)){
	echo "<h2 align = 'center'><br>Car VIN: ", $row['VIN'];

}
}
else{
	echo "<h1 align='center'> No Cars to Show";
}

}
else{
	echo "<h1 align='center'> Error ";
}
?>
<br/><br/><br/><br/>
<?php
	include_once('./includes/footer.class.php');
?>