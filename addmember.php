
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

<?php
include_once'connect.php';
if (empty($_POST["Name"])||empty($_POST["Address"])||empty($_POST["Phone"])||empty($_POST["Email"])||empty($_POST["License"])||empty($_POST["password"])){
    echo "<h1 align ='center'>Please fill in all the information!</h1>";
    $link_address='./registration.php';
    echo "<h3 align ='center'><a href='$link_address'>Go Back</a>";
}
else{
$Name=$_POST["Name"];
$Address=$_POST["Address"];
$Phone=$_POST["Phone"];
$Email=$_POST["Email"];
$License=$_POST["License"];
$Password=$_POST["password"];

$memID = rand(10000000, 99999999);
$memFee = rand(0, 250);
mysqli_query($cxn, "INSERT INTO Member VALUES('$memID','$Name', '$Address', '$Phone','$Email', '$License', '$memFee', '$Password')");
$_SESSION['username'] = $Name;
$_SESSION['member_ID']=$memID;
$_SESSION['email']=$Email;

$HOME='./index.php';
    echo "<h1 align='center'>Successfully Registered!<br/>";
}
?>
<br/><br/>
<?php
	echo "<h5><br><br>";
	include_once('./includes/footer.class.php');
?>

