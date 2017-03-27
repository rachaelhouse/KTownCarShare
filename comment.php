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
	<tr><td align="center"><p><b>Comments</b></p></td></tr>
	<tr>
		<td align="center">
			<br />


			<FORM METHOD="POST" ACTION="comment.php">
			<div class="col-lg-12" align="left">
			MemberID:<INPUT CLASS="form-control" TYPE="TEXT" NAME = "MemberID" placeholder="MemberID" size="20"/>
			</div>
			<br />
			<div class="col-lg-12" align="left">
			VIN:<Input class="form-control" Type="TEXT" NAME="VIN" placeholder="VIN" size="20"/>
			</div>
			<br />
			<div class="col-lg-12" align="left">
			Comment:<Input class="form-control" Type="COMMENT" NAME="COMMENT" placeholder="COMMENT" size="20"/>
			</div>
			<br />
			<div class="col-lg-12" align="left">
			Rating:<Input class="form-control" Type="TEXT" NAME="Rating" placeholder="Rating(1-5)" size="20"/>
			</div>
			<br>
			<div>
			<button type="submit" class="btn btn-primary">Submit Comment</button>
			</div>

			</FORM>
		</td>
	</tr>
</table>
</div>

<?php

include_once('connect.php');
    $MemberID = $_POST["MemberID"];
    $VIN = $_POST["VIN"];
    $COMMENT = $_POST["COMMENT"];
    $Rating = $_POST["Rating"];

mysqli_query($cxn, "INSERT INTO COMMENT VALUES('$MemberID', '$VIN', '$Rating', '$COMMENT')");

?>
<?php
	include_once('./includes/footer.class.php');
?>

</body>