<?php
include_once('connect.php');

$MemberID= $_POST['MemberID'];


$fee = (mysqli_query($cxn,"SELECT memFee FROM Member WHERE MemID = $MemberID"));

if (!$fee) {
	echo "Not a valid memberID";
}
else{


echo "Fee for member   ", $MemberID, "<br>";
$row = mysqli_fetch_assoc($fee)
	
mFee = $row['memFee']

resFee

}



?>