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


			<FORM METHOD="POST" ACTION="makeReservation.php">
			<div class="col-lg-12" align="left">
			MemberID:<INPUT CLASS="form-control" TYPE="TEXT" NAME = "MemID" placeholder="MemberID" size="20"/>
			</div>
			<br />
			<div class="col-lg-12" align="left">
			VIN:<Input class="form-control" Type="TEXT" NAME="VIN" placeholder="VIN" size="20"/>
			</div>
			<br />
			<div class="col-lg-12" align="left">
			Date:<Input class="form-control" Type="DATE" NAME="DATE" placeholder="Y-m-d " size="20"/>
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

mysqli_query($cxn, "INSERT INTO COMMENT VALUES('MemberID', 'VIN', 'Rating', 'Comment')");

?>
<?php
	include_once('./includes/footer.class.php');
?>

</body>