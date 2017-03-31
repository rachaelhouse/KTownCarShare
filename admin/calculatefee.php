<?php
include_once('connect.php');

$MemberID= $_POST['MemberID'];


$fee = (mysqli_query($cxn,"SELECT memFee FROM Member WHERE MemID = $MemberID"));

if (!$fee) {
	echo "Not a valid memberID";
}
else{


echo "Fee for member   ", $MemberID, "<br>";
$rowfee= mysqli_fetch_assoc($fee);
	
$mFee = $rowfee['memFee'];

echo $mFee;

$resFee = 0;

$resFeerows = (mysqli_query($cxn,"SELECT resFee FROM Reservation WHERE MemID = $MemberID"));

while ($row = mysqli_fetch_assoc($resFeerows))
{
	$resFee = $resFee + $row['resFee']
}

echo $resFee;

}



?>