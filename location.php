<?php
  //Create a user session or resume an existing one
 session_start();
 ?>
<?php
include_once('./includes/header.class.php');
?>

<?php
  require('./includes/nav.class.php');
?>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
h1 {
  text-align: center;
  font: bold 30px arial, sans-serif;
  text-decoration: underline;
}
h2{
  text-align: center;
  font: 20px arial;
}
</style>
</head>

<?php
echo "<h1>Available Parking Spaces:</h1>" //RHYS YOU WILL NEED TO FORMATE THIS PAGE
?>

<?php
    include_once('connect.php');
    $DateStart='$start';
    $DateEnd='$end';
    $location='$Parking';

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $DateStart=test_input($_POST["start"]);
        $DateEnd=test_input($_POST["end"]);  
        $Parking= test_input($_POST["Parking"]);
        
            }
    function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }
?>
 
<?php
    $locations= mysqli_query($cxn, "SELECT Address, NumSpaces FROM Parking ");
    while($row = mysqli_fetch_assoc($locations)){
        echo "<h2>", $row['Address'], "   ", $row['NumSpaces'], "</h2><br><br><br>";
     }
               
?>

<?php
  include_once('./includes/footer.class.php');
?>

