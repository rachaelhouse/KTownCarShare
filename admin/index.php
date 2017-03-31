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

<div class="container">

<table cellspacing="50" align="center">
	<tr><td align="center" style="font-size:300%"><p><b>Welcome to K-Town Car Share</b></p></td></tr>
	<tr><td align="center" style="font-size:100%"><p><b>Brought to you by</b></p></td></tr>
	<tr><td align="center" style="font-size:300%"><p><b>RRR</b></p></td></tr>
</table>

</div>
<div align="center">
<img src="cars.png" width="877" height="407" alt=""/> </div>
<br/><br/><br/><br/>
<?php
	include_once('./includes/footer.class.php');
?>

