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
	<tr><td align="center"><p><b>Cars Available By Date</b></p></td></tr>
	<tr>
		<td align="center">
			<br />


			<FORM METHOD="POST" ACTION="showCars.php">
			<div class="col-lg-12" align="left">
			Date:<Input class="form-control" Type="DATE" NAME="DATE" placeholder="Y-m-d " size="20"/>
			</div>
			<br />
			<div>
			<button type="submit" class="btn btn-primary">Submit Date</button>
			</div>

			</FORM>
		</td>
	</tr>
</table>
</div>

<?php

?>
<?php
	include_once('./includes/footer.class.php');
?>

</body>