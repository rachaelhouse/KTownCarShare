<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php
echo "Available Parking Lots" //RHYS YOU WILL NEED TO FORMATE THIS PAGE
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
        echo $row['Address'], "   ", $row['NumSpaces'];
     }
               
?>
