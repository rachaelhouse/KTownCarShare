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
<div class="container">

<table cellspacing="50" align="center">
	<!--<tr><td align="center"><a href='./location'><button class='btn btn-primay'>Make Reservation</button></a></td></tr> 
	<tr><td><br/><br/></td></tr>-->
	<tr><td align="center"><p><b>Find Car Rental History</b></p></td></tr>
	<tr>
		<td align="center">
			<br />


			<FORM METHOD="POST" ACTION="carRentalHistory.php">
			<div class="col-lg-12" align="left">
			VIN:<Input class="form-control" Type="TEXT" NAME="VIN" placeholder="VIN" size="20"/>
			</div>
			<br />
			<div>
			<button type="submit" class="btn btn-primary">Submit VIN</button>
			</div>

			</FORM>
		</td>
	</tr>
</table>
</div>

<?php

include_once('connect.php');
if (isset($_POST['VIN'])){
    $VIN = $_POST["VIN"];
   

echo "<h3 align = 'center'><br><b>Rental History for Car:  </b>", $VIN;
$result = (mysqli_query($cxn,"SELECT memID, RNo, Status,PickOdReading, DropOdReading FROM History where VIN = '$VIN'"));
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)){
	echo "<h4 align = 'center'><br>Reservation Number: ", $row['RNo'],"<br> MemberID: ", $row['memID'], "<br> Status: ", $row['Status'], "<br>Pickup Odometer Reading: ", $row['PickOdReading'],"<br>Drop off Odometer Reading: ", $row['DropOdReading'],'<br>';

}
}
else{
	echo "<h1 align = 'center'>Please enter a valid VIN!!";

}

}
?>
<?php
	echo "<h5><br>";
	include_once('./includes/footer.class.php');
?>

</body>