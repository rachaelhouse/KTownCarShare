
<?php
include_once('./includes/header.class.php');
?>


<!-- Header and Nav -->
<?php
	require('./includes/nav.class.php');
?>
<?php

?>
<div class="container">

<table cellspacing="50" align="center">
	<!--<tr><td align="center"><a href='./location'><button class='btn btn-primay'>Make Reservation</button></a></td></tr> 
	<tr><td><br/><br/></td></tr>-->
	<tr><td align="center"><p><b>Register</b></p></td></tr>
	<tr>
		<td align="center">
			<br />


			<FORM METHOD="POST" ACTION="addmember.php">
			<div class="col-lg-12" align="left">
			Name:<INPUT CLASS="form-control" TYPE="TEXT" NAME = "Name" placeholder="Name" size="20"/>
			</div>
			<br />
			<div class="col-lg-12" align="left">
			Address:<Input class="form-control" Type="TEXT" NAME="Address" placeholder="Address" size="20"/>
			</div>
			<br>
			<div class="col-lg-12" align="left">
			Phone: <Input class="form-control" Type="TEXT" NAME="Phone" placeholder="(123)-456-7890" size="20"/>
			</div>
			<br>
			<div class="col-lg-12" align="left">
			Email: <Input class="form-control" Type="TEXT" NAME="Email" placeholder="emailme@gmail.com" size="20"/>
			</div>
			<br>
			<div class="col-lg-12" align="left">
			License:<INPUT CLASS="form-control" TYPE="TEXT" NAME = "License" placeholder="Driver License" size="20"/>
			</div>

			<div class="col-lg-12" align="left">
			Password: <Input class="form-control" Type="PASSWORD" NAME="password" placeholder="Password" size="20"/>
			</div>
			<br>
			<div>
			<button type="submit" class="btn btn-primary">Register</button>
			</div>

			</FORM>
		</td>
	</tr>
</table>
</div>
</body>

<?php

?>

<?php
	include_once('./includes/footer.class.php');
?>
