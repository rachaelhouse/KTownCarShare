<?php
  //Create a user session or resume an existing one
 session_start();
 ?>
<?php

include 'connect.php';

if ($_POST['register'])
{
 //get form data
 $password = addslashes(strip_tags($_POST['password']));
 $email = addslashes(strip_tags($_POST['email']));
 $Name = addcslashes(strip_tags($POST), ['Name']);
 $Address = addslashes(strip_tags($_POST['Address']));
 $License = addslashes(strip_tags($_POST['License']));
 $phone = addslashes(strip_tags($_POST['phone']));


 
 if (!$password||!$email|| !$Name || !Address || !License || !phone)
    echo "Please fill out all fields";
 else
 {
    //encrypt password
    $password = md5($password);
    
    //check if username already taken
    $check = mysql_query("SELECT * FROM members WHERE email='$email'");
    if (mysql_num_rows($check)>=1)
       echo "Email already used";
    else
    {
       $memID = rand(10000000, 99999999)
       //register into database
       $register = mysql_query("INSERT INTO members VALUES ('$memID,'$name', '$Address', '$phone','$email', '$License', '$150', '$password')";
       echo "You have been registered successfully! Please check your email ($email) to activate your account";
       }

    }
 }
}
else
{

?>

<form action='register.php' method='POST'>
Choose Name:<br />
<input type='text' name='Name'><p />
Choose password:<br />
<input type='password' name='password'><p />
Choose Email:<br />
<input type='text' name='email'><p />
Choose Address:<br />
<input type='text' name='Address'><p />
Choose Phone:<br />
<input type='text' name='phone'><p />
Choose License:<br />
<input type='text' name='License'><p />
<input type='submit' name='register' value='Register'>
</form>

<?php

}

?>