<?php
include_once'connect.php';
if (empty($_POST["Name"])||empty($_POST["Address"])||empty($_POST["Phone"])||empty($_POST["Email"])||empty($_POST["License"])||empty($_POST["password"])){
    echo "<p>Please fill all the information!</p>";
    $link_address='./registration.php';
    echo "<a href='$link_address'>Go Back!</a>";
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
mysqli_query($cxn, "INSERT INTO Member VALUES('$memID,'$Name', '$Address', '$Phone','$Email', '$License', '$memFee', '$password')");

$HOME='./index.php';
    echo "Successfully Register!<br/>";
    echo "<a href='$HOME'>HOME</a>";
}
?>

