<?php
include_once('./includes/header.class.php');
?>

<!-- Header and Nav -->
<?php
	require('./includes/nav.class.php');
?>

<div class="container">

<table cellspacing="50" align="center">
	<tr><td align="center" style="font-size:300%"><p><b>Welcome to K-Town Car Share</b></p></td></tr>
	<tr><td align="center" style="font-size:100%"><p><b>Brought to you by</b></p></td></tr>
	<tr><td align="center" style="font-size:300%"><p><b>RRR</b></p></td></tr>
</table>

</div>
<div align="center">
<img src="cars.jpg" width="957" height="497" alt=""/> </div>
<br/><br/><br/><br/>
<?php
	include_once('./includes/footer.class.php');
?>
<?php

include_once'connect.php';
$error=null;
if (empty($_SESSION['username'])){
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
    $login = mysqli_query($cxn,"SELECT * FROM member WHERE email='$email'");
    if (mysqli_num_rows($login)===0)
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
          $_SESSION['username']=$login_row['Name']; //assign session
          $_SESSION['member_ID']=$login_row['MemID'];
          $_SESSION['email']=$login_row['Email'];
          }
       }
  
  
      }
    }
  }
}
echo "<a href='gotoAdmin.php'>Go to Admin</a>";
if (isset($_SESSION['username']))
  {
    
   echo "<div>Hi, ".$_SESSION['username']." You are logged in. <a href='logout.php'>(Log out)</a> &nbsp; <a href='return.php'>return car</a></div>";
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
   if ($error===0){
    echo "<p style='color:red'>Enter a Email and a Password</p>";
   }elseif ($error===1){
    echo "<p style='color:red'>No Such User Exist</p>";
   }elseif($error===2){
    echo "<p style='color:red'>You have entered the wrong Password</p>";
   }else{
    echo "";
   }
}



?>