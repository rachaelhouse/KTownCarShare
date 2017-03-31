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
	<tr><td align="center"><p><b>Comments</b></p></td></tr>
	<tr>
		<td align="center">
			<br />


			<FORM METHOD="POST" ACTION="comment.php">
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
if (isset($_SESSION['member_ID'])){
if (isset($_POST['VIN']) && isset($_POST['COMMENT']) && isset($_POST['Rating'])){
	$MemberID = $_SESSION["member_ID"];
    $VIN = $_POST["VIN"];
    $COMMENT = $_POST["COMMENT"];
    $Rating = $_POST["Rating"];

if(mysqli_query($cxn, "INSERT INTO COMMENT VALUES('$MemberID', '$VIN', '$Rating', '$COMMENT')")){
    echo "<h1 align='center'> You successfully made a comment. Redirecting to Home page in 5 seconds ";
	header('Refresh: 5; URL=index.php');
}
else{
	echo "<p>Please fill in all the information!</p>";
    $link_address='./comment.php';
    echo "<a href='$link_address'>Go Back!</a>";
}
}
}
else{
	echo "<h1 align='center'> You must be logged in to leave a comment. ";
}

?>
<?php
	include_once('./includes/footer.class.php');
?>

</body>