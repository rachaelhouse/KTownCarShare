<?php
  //Create a user session or resume an existing one
 session_start();
 ?>
<?php 
    if(isset($_POST['reservPost']) AND $_POST['reservPost']) { 
        // Check Reservation Func.

        $result = searchReservation($cxn, $_POST['reservID']);
        

    }




?>