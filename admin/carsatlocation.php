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
    <tr><td align="center"><p><b>Find Cars at Location</b></p></td></tr>
    <tr>
        <td align="center">
            <br />


            <FORM METHOD="POST" ACTION="carsatlocation.php">
        
            <div class="col-lg-12" align="left">
            Location:<Input class="form-control" Type="TEXT" NAME="Location" placeholder="Location" size="20"/>
            </div>
            <br />
            <div>
            <button type="submit" class="btn btn-primary">Submit Location</button>
            </div>

            </FORM>
        </td>
    </tr>
</table>
</div>

<?php

include_once('connect.php');

if (isset($_POST['Location'])){
    $Location = $_POST["Location"];
   
 echo "<h2 align = 'center'><br>Cars at ", $Location, "<br>";
$result = (mysqli_query($cxn,"SELECT Car.VIN, Location, RNo FROM Car LEFT JOIN Reservation ON Car.VIN = Reservation.VIN WHERE Car.Location = '$Location'")); 
if ($result !== FALSE){
while ($row = mysqli_fetch_assoc($result)){
    if ($row['RNo']== NULL){
        echo "<h2 align = 'center'><br>Car VIN: ", $row['VIN'], "<br> Reservation Number: Not Reserved";
    }
    else{
    echo "<h2 align = 'center'><br>Car VIN: ", $row['VIN'], "<br> Reservation Number: ", $row['RNo'] ;
    }
}
}
else{
$result = (mysqli_query($cxn,"SELECT VIN FROM Car WHERE Location = '$Location'"));
while ($row = mysqli_fetch_assoc($result)){
    echo "<h2 align = 'center'><br>Car VIN: ", $row['VIN'], "<br>" ;
}
}
}
else{

    echo "<h2 align = 'center'><br>Please enter location";
}


?>
<?php
    echo "<h5><br>";
    include_once('./includes/footer.class.php');
?>

</body>