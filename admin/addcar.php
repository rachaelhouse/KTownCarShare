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
    <tr><td align="center"><p><b>Add New Car to Fleet</b></p></td></tr>
    <tr>
        <td align="center">
            <br />


            <FORM METHOD="POST" ACTION="addcar.php">
        
            <div class="col-lg-12" align="left">
            VIN:<Input class="form-control" Type="TEXT" NAME="VIN" placeholder="VIN" size="20"/>
            </div>
            <br />
            <div class="col-lg-12" align="left">
            Make:<Input class="form-control" Type="TEXT" NAME="Make" placeholder="Make" size="20"/>
            </div>
            <br />
            <div class="col-lg-12" align="left">
            Model:<Input class="form-control" Type="TEXT" NAME="Model" placeholder="Model" size="20"/>
            </div>
            <br>
            <div class="col-lg-12" align="left">
            Year:<Input class="form-control" Type="TEXT" NAME="Year" placeholder="Year" size="20"/>
            </div>
            <br>
            <div class="col-lg-12" align="left">
            Location:<Input class="form-control" Type="TEXT" NAME="Location" placeholder="Location" size="20"/>
            </div>
            <br>
            <div>
            <button type="submit" class="btn btn-primary">Submit Car Details</button>
            </div>

            </FORM>
        </td>
    </tr>
</table>
</div>

<?php

include_once('connect.php');

if (isset($_POST['VIN'])){
    $VIN=$_POST['VIN'];
    $Make= $_POST['Make'];
    $Model= $_POST['Model'];
    $Year= $_POST['Year'];
    $Location=$_POST['Location'];
    $numRentals = rand(0,20);
}

else{

    echo "<h2 align = 'center'>Please Enter Car Info";
}

if(mysqli_query($cxn,"INSERT INTO Car VALUES ('$VIN', '$Make', '$Model', '$Year','$Location' , '20', '$numRentals' )")){

    echo "<h2 align = 'center'>You have sucessfully added a new car!";
}
else{
    echo "<h2 align = 'center'>Add Car Failed";
}
?>
<?php
    echo "<h5><br><br>";
    include_once('./includes/footer.class.php');
?>

</body>