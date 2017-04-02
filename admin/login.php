

<?php

include_once'connect.php';
$error=null;
if (empty($_SESSION['email'])){
if (!empty($_POST['email'])&&!empty($_POST['password']))
{
   //get form data
   $email = addslashes(strip_tags($_POST['email']));
   $password = addslashes(strip_tags($_POST['password']));
   
   if (!$email||!$password)
      $error=0;
   else
   {
    //log in
    $login = mysqli_query($cxn,"SELECT email, password FROM Admin WHERE email='$email'");
    if ($login == False)
       $error=1;
    else
    {
      while ($login_row = mysqli_fetch_assoc($login))
      {
  
       //get database password
       $password_db = $login_row['password'];
  
       //encrypt form password
       $password = $password;
       
       //check password
       if ($password!=$password_db)
          $error=2;
       else
       {
          $_SESSION['email']=$login_row['email'];
          }
       }
  
  
      }
    }
  }
}

if (isset($_SESSION['email']))
  {
    
   echo "<div>Hi, ".$_SESSION['email']." You are logged in. <a href='logout.php'>(Log out)</a> &nbsp;";
  }
  else
  {
   echo "

   <form style='margin:0;padding:0' action='index.php' method='POST' >
   <p style='display=inline'>Email:
   <input style='display:inline' type='text' name='email'>
   Password:
   <input type='password' name='password'>
   <input style='display=inline' type='submit' value='Log in'></p>
   </form>
   ";
    echo "<p style='color:red'>Enter an Email and a Password</p>";
}



?>