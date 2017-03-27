<?php
include_once('connect.php');

$History= mysqli_query($cxn, "SELECT VIN, RNo FROM History WHERE MemID = $MemID");
while($row = mysqli_fetch_assoc($History)){
      echo $row['VIN'], "   ", $row['RNo'];
    }

?>

  
