<?php
include_once('./includes/header.class.php');
?>


<?php
  require('./includes/nav.class.php');
  include_once('connect.php');
  ?>
<div class="container">

<table cellspacing="50" align="center">
  <!--<tr><td align="center"><a href='./location'><button class='btn btn-primay'>Make Reservation</button></a></td></tr> 
  <tr><td><br/><br/></td></tr>-->
  <tr><td align="center"><p><b>Show Reservations</b></p></td></tr>
  <tr>
    <td align="center">
      <br />


      <FORM METHOD="POST" ACTION="showHistory.php">
      <div class="col-lg-12" align="left">
      MemberID:<INPUT CLASS="form-control" TYPE="TEXT" NAME = "MemID" placeholder="MemberID" size="20"/>
      </div>
      <br />
      <div>
      <button type="submit" class="btn btn-primary">Show Reserivation</button>
      </div>

      

      </FORM>
    </td>
  </tr>
</table>
</div>

<?php

?>
<?php
  include_once('./includes/footer.class.php');
?>

</body>