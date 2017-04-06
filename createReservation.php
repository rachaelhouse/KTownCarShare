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
	<tr><td align="center"><p><b>Create Reservation</b></p></td></tr>
	<tr>
		<td align="center">
			<br />


			<FORM METHOD="POST" ACTION="createReservation.php">
		
			<div class="col-lg-12" align="left">
			VIN:<Input class="form-control" Type="TEXT" NAME="VIN" placeholder="VIN" size="20"/>
			</div>
			<br />
			<div class="col-lg-12" align="left">
			Date:<Input class="form-control" Type="TEXT" NAME="DATE" placeholder="Y-m-d " size="20"/>
			</div>
			<br />
			<div class="col-lg-12" align="left">
			Location:<Input class="form-control" Type="TEXT" NAME="Location" placeholder="Location" size="20"/>
			</div>
			<br>
			<div class="col-lg-12" align="left">
			Length:<Input class="form-control" Type="TEXT" NAME="Length" placeholder="Length of Rental" size="20"/>
			</div>
			<br>
			<div>
			<button type="submit" class="btn btn-primary">Submit Reserivation</button>
			</div>

			</FORM>
		</td>
	</tr>
</table>
</div>
<?php

include_once('connect.php');
if (isset($_SESSION['member_ID'])){
if (isset($_POST['VIN'])){
	$MemberID = $_SESSION["member_ID"];
    $VIN = $_POST["VIN"];
    $Date= $_POST["DATE"];
	$LocationID=$_POST['Location'];
	$Length=$_POST['Length'];
	$Rno = rand(1111,9999);
	$Fee = rand(10, 100);

if(mysqli_query($cxn, "INSERT INTO Reservation VALUES('$Rno', '$Date', '$Length', '$MemberID', '$VIN', '$Fee')")){
    echo "<h1 align='center'> You successfully made a Reservation. Reservation Number (for pickup/ Drop off )", $Rno;

}
else{
	echo "<p>Please fill in all the information!</p>";
    
}
}
}
else{
	echo "<h1 align='center'> You must be logged in to create a reservation ";
}

?>
<?php
	include_once('./includes/footer.class.php');
?>

</body>



