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

<?php
    include_once ('./connect.php');
    if(!empty($_SESSION['username'])){
        $member_ID=$_SESSION['member_ID'];
        $result=mysqli_query($cxn,"SELECT * From Member,Reservation where Reservation.MemID='$member_ID'");
        if ($result == False){
            echo "<h3 align='center'>It seems you have no outstanding vehicle In Use</h3>";
        }else{
            if (empty($_POST['millage'])){
                echo "
                <Form Action='pickup.php' method='POST'>
                Reservation Number:
                <Input type='text' name='Rnum'>
                Current Millage:
                <Input type='text' name='millage'>
            Status:
                <Input type='text' name='status'>
                <Button type='submit'>Submit</Button>
                </Form>
                ";
            }else{
                $reservation=mysqli_fetch_assoc($result);
                $reservationnum=$reservation['RNo'];
                $vin = $reservation['VIN'];
                
                $member_ID=$reservation['MemID'];
                $pickuptime=$reservation['RDate'];
                $returntime=date("Y-m-d");
                $status = $_POST['status'];
                $millage=$_POST['millage'];
                
                mysqli_query($cxn,"UPDATE History SET PickOdReading='$millage',Status='$status' WHERE VIN='$vin'");
                echo "<p align='center'> You have successfully picked up your car.</p>";
                echo "<h3 align='center'>Thank You for Car Sharing with Us</h3>";
            }
        }
    }else{
        echo "<h3 align='center'>You have not logged in yet.</h3>";
    }
    ?>
<a align="right" href='index.php'>go back</a>


<?php
    include_once('./includes/footer.class.php');
    ?>