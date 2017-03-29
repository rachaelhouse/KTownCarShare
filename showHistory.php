<?php
  //Create a user session or resume an existing one
 session_start();
 ?>
<?php
include_once('connect.php');

if(isset($_POST['MemID'])){
$member_ID = $_POST['MemID'];
echo "Your Reservations  ";
$result = (mysqli_query($cxn,"SELECT RNo, RDate,Length, VIN FROM Reservation where MemID = $member_ID"));
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)){
	echo "Reservation Number: ", $row['RNo'], " Reservation Date: ", $row['RDate'], " Length of Rental: ", $row['Length'], " VIN: ", $row['VIN'];

}
}

}
?>