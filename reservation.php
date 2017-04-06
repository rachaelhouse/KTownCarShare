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
	<tr><td align="center"><Form METHOD="POST" ACTION="showHistory.php"><input type="submit" class="btn btn-primary" name="rentalhistory" value="Show My Reservations"></Form></td></tr> 
	<tr><td align="center"><Form METHOD="POST" ACTION="createReservation.php"><input type="submit" class="btn btn-primary" name="createReservation" value="Create new Reservation"></Form></td></tr> 
	
			</FORM>
		</td>
	</tr>
</table>
</div>

<?php
  echo "<h5><br>";
  include_once('./includes/footer.class.php');
?>