<?php
  //Create a user session or resume an existing one
 session_start();
 ?>
<?php
include('./includes/header.class.php');
?>


<!-- Header and Nav -->
<?php	
require('./includes/nav.class.php');
?>
<style type="text/css">

.rwd-table {
  margin: 1em 0;
  min-width: 300px; 
  }
  .rwd-table tr {
    border-top: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
  }
  
 .rwd-table th {
    display: none;
  }
  
  .rwd-table td {
    display: block; 
    }

    .rwd-table td:first-child {
      padding-top: .5em;
    }
    .rwd-table td::last-child {
      padding-bottom: .5em;
    }
  .rwd-table th, td {
    text-align: center;
    display: table-cell;
    padding: .5em .5em;
  }
.rwd-table th, td:first-child {
        padding-left: 0;
      }
      
.rwd-table th, td:last-child {
        padding-right: 0;
      }



// presentational styling

@import 'http://fonts.googleapis.com/css?family=Montserrat:300,400,700';

body {
  padding: 0 2em;
  font-family: Montserrat, sans-serif;
  -webkit-font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
  color: #444;
  background: #eee;
}


.rwd-table {
  background: #0099CC;
  color: #fff;
  border-radius: .4em;
  overflow: hidden;
}
 .rwd-table tr {
    border-color: lighten(#34495E, 10%);
  }
 .rwd-table th, td {
    margin: 1em 1em;
  }

.rwd-table th, td:before {
    color: #000000;
 }
</style>

<div class="container">

<table cellspacing="50" align="center">
	<tr><td align="center"><Form METHOD="POST" ACTION="rentalHistory.php"><input type="submit" class="btn btn-primary" name="rentalhistory" value="Show My Rental History"></Form></td></tr> 
	<tr><td align="center"><Form METHOD="POST" ACTION="createReservation.php"><input type="submit" class="btn btn-primary" name="createReservation" value="Create new Reservation"></Form></td></tr> 
	
			</FORM>
		</td>
	</tr>
</table>
</div>

<?php
include_once('connect.php');
$condition=0;
if (!empty($_POST)){
	include_once'connect.php';
if (isset($_POST['rentalhistory'])){
	if (!empty($_SESSION)){
	$memberID=$_SESSION['member_ID'];
	$reservations=mysqli_query($cxn,"SELECT * FROM reservation WHERE member_ID='$memberID' AND status='return' order by pick_up_time DESC");
	}else{
		echo "<h2 align='center' style='color:FF0000'>Please Log In to see your Rental History<h2>";
		$condition=1;
	}
}elseif (empty($_POST['reservID'])&&empty($_POST['memberID'])){
	echo "<p align='center' style='color:red'> Please enter either a reservation ID or a member ID <p align='center' style='color:red'> Note member ID is not your Email Address</p>";
	$condition=1;
}elseif (!empty($_POST['reservID'])){
	$reservnum=$_POST['reservID'];
	$reservations=mysqli_query($cxn,"SELECT * FROM reservation WHERE reservation_number='$reservnum'");
}elseif (!empty($_POST['memberID'])){
	$member_ID=$_POST['memberID'];
	$reservations=mysqli_query($cxn,"SELECT * FROM reservation WHERE member_ID='$member_ID' order by pick_up_time DESC");
}else{
	echo "<p>entered both</p>";

}

if ($condition===0){
if(!empty(mysqli_num_rows($reservations))){
?>
<div align="center">
<table class="rwd-table">
	<col width="200">
	<col width="200">
	<col width="200">
	<col width="200">
	<col width="200">
  <tr>
    <th>Reservation Number</th>
    <th>Reservationist ID</th>
    <th>Booking Time</th>
    <th>Pick_up_Time</th>
    <th>Status</th>
  </tr>
  <?php 
  	while($reservation=mysqli_fetch_assoc($reservations)){
  		echo "<tr><td>".$reservation['reservation_number']."</td>
  		<td>".$reservation['member_ID']."</td>
  		<td>".$reservation['date']."</td>
  		<td>".$reservation['pick_up_time']."</td>
  		<td>".$reservation['status']."</td>
  		</tr>";
  	}
  	?>
</table>
</div>
<?php
}else{
	echo "<h2 align='center' style='color:FF0000'>No Reservation Found.<h2>";
}
}
	
?>

<?php
}
include_once('./includes/footer.class.php');
?>