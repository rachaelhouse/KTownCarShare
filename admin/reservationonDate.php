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
    <!--<tr><td align="center"><a href='./submitcar.php'><button class='btn btn-primay'>Submit Car Details</button></a></td></tr> 
    <tr><td><br/><br/></td></tr>-->
    <tr><td align="center"><p><b>Reservations By Date</b></p></td></tr>
    <tr>
        <td align="center">
            <br />


            <FORM METHOD="POST" ACTION="reservationonDate.php">
        
            <div class="col-lg-12" align="left">
            Date:<Input class="form-control" Type="TEXT" NAME="Date" placeholder="Date" size="20"/>
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

include_once('connect.php');

if (isset($_POST['Date'])){
    $Date = $_POST["Date"];
   
 echo "<h2 align = 'center'><br>Reservations on ", $Date, "<br>";
$result = (mysqli_query($cxn,"SELECT VIN, MemID, Rno FROM  Reservation WHERE RDate = '$Date'")); 
while ($row = mysqli_fetch_assoc($result)){
    echo "<h2 align = 'center'><br>Car VIN: ", $row['VIN'], "<br> Reservation Number: ", $row['Rno'], "<br> Member ID: ", $row['MemID'];
}

}
else{

    echo "<h2 align = 'center'>Please enter a date";
}


?>
<?php
    echo "<h5><br><br>";
    include_once('./includes/footer.class.php');
?>

</body>