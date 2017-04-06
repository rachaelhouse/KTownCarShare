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
	include_once ('./connect.php');
	if(!empty($_SESSION['username'])){
		$member_ID=$_SESSION['member_ID'];
		$result=mysqli_query($cxn,"SELECT * From Member,Reservation where Reservation.MemID='$member_ID'");
		if ($result == False){
			echo "<h3 align='center'>It seems you have no outstanding vehicle In Use</h3>";
		}else{
			if (empty($_POST['millage'])){
				echo "
				<Form Action='return.php' method='POST'>
				Reservation Number:
                <Input type='text' name='Rnum'>
				Current Millage:
				<Input type='text' name='millage'>
				Status:
				<Input type='text' name='status'>
				<Button type='submit'>Submit</Button>
				</Form>
				";
			}else{
			$reservation=mysqli_fetch_assoc($result);
			$reservationnum=$reservation['RNo'];
			$vin = $reservation['VIN'];

			$member_ID=$reservation['MemID'];
			$pickuptime=$reservation['RDate'];
			$returntime=date("Y-m-d");
			$status = $_POST['status'];
			
			$rate=mysqli_fetch_assoc(mysqli_query($cxn,"SELECT * FROM Car WHERE VIN='$vin'"))['Fee'];

			if (strtotime($returntime)-strtotime($pickuptime)> 0){
			
			$pay=floor((abs(strtotime($returntime)-strtotime($pickuptime))/(60*60))*$rate);
			$millage=$_POST['millage'];

			mysqli_query($cxn,"UPDATE History SET DropOdReading='$millage',Status='$status' WHERE VIN='$vin'");
			mysqli_query($cxn,"DELETE FROM Reservation WHERE RNo = $reservationnum");
			echo "<p align='center'> The total payment is $".$pay.". And it will be charged automatically through your credit card.</p>";
			}
			else{
				echo "<p align='center'> The total payment is $0. And it will be charged automatically through your credit card.</p>";
			}
			mysqli_query($cxn,"DELETE FROM Reservation WHERE RNo = $reservationnum");
			echo "<h3 align='center'>Thank You for Car Sharing with Us</h3>";
			}
		}
	}else{
		echo "<h3 align='center'>You have not logged in yet.</h3>";
	}
?>
<a align="right" href='index.php'>go back</a>


<?php
	include_once('./includes/footer.class.php');
?>