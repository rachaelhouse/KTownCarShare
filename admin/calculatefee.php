<?php
include_once('./includes/header.class.php');
?>


<?php
  require('./includes/nav.class.php');

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

echo "Monthly Fee:" , $mFee,  "<br>";

$resFee = 0;

$resFeerows = (mysqli_query($cxn,"SELECT resFee FROM Reservation WHERE MemID = $MemberID"));

while ($row = mysqli_fetch_assoc($resFeerows))
{
	$resFee = $resFee + $row['resFee'];
}

echo "Rental Fee(s): " , $resFee, "<br>";

$total = $resFee + $mFee;

echo "Total Free: ", $total, "<br>";

echo "Email sent, with monthly invoice!";

}



?>

<?php
  include_once('./includes/footer.class.php');
?>
