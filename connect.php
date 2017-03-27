

<?php
// used to connect to the database
$host = "localhost";
$db_name = "KTownCarShare";
$username = "cisc332";
$password1 = "cisc332password";

try {
    $cxn = new mysqli($host,$username,$password1, $db_name);
}
 
// show error
catch(Exception $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>