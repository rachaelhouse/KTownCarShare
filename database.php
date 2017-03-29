<html>
<head><title>Load KTownCarShare Database</title></head>
<body>

<?php
/* Program: KTownCarShare.php
 * Desc:    Creates and loads the Company database tables with 
 *          sample data.
 */
 
 $host = "localhost";
 $user = "cisc332";
 $password = "cisc332password";
 $database = "KTownCarShare";
 $cxn = mysqli_connect($host,$user,$password, $database);
 // Check connection
 if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
  }
   mysqli_query($cxn,"drop table Parking;");
   mysqli_query($cxn,"drop table Car;");
   mysqli_query($cxn,"drop table RentalHistory;");
   mysqli_query($cxn,"drop table MaintenanceHistory;");
   mysqli_query($cxn,"drop table Member;");
   mysqli_query($cxn,"drop table MemberHistory;");
   mysqli_query($cxn,"drop table Comment;");
   mysqli_query($cxn,"drop table Reservation;");
      mysqli_query($cxn,"drop table Admin;");

   echo "Tables dropped.<br />";

    mysqli_query($cxn,"create table Parking 
    (Address VARCHAR(50),
     NumSpaces INTEGER,
     primary key(Address)
     );");

    echo "Parking created. <br />";          
  
    mysqli_query($cxn,"create table Car
      (VIN INTEGER not null,
      Make CHAR(50),
      Model CHAR(50),
      Year INTEGER,
      Location CHAR(50) not null,
      Fee INTEGER not null,
      primary key(VIN)
      );");

    echo "Car created. <br />"; 

    mysqli_query($cxn,"create table MaintenanceHistory 
      (VIN INTEGER not null,
      MDate VARCHAR(50) not null,
      OdReading INTEGER not null,
      Type CHAR(50) not null,
      primary key(VIN, MDate, OdReading, Type)
      );"); 

    echo "MaintenanceHistory created. <br />";

    mysqli_query($cxn,"create table Member 
      (MemID INTEGER not null,
      Name CHAR(50) not null,
      Address VARCHAR(50),
      Phone VARCHAR(50),
      Email CHAR(50) not null,
      License VARCHAR(50) not null,
      MemFee INTEGER,
      password VARCHAR(50),
      primary key (MemID)
      );");

    echo "Member created. <br />"; 


    mysqli_query($cxn,"create table History 
      (MemID INTEGER not null,
      RNo INTEGER not null,
      VIN INTEGER not null,
      PickOdReading INTEGER,
      DropOdReading INTEGER,
      Status CHAR(50),
      PickGas CHAR(50),
      DropGas CHAR(50),
      primary key(MemID, RNo, VIN)
      );");

    echo "History created. <br />";

    mysqli_query($cxn,"create table Comment
      (MemID INTEGER not null,
      VIN INTEGER not null,
      Rating INTEGER,
      Comment CHAR(50),
      primary key(MemID, VIN)
      );");

    echo "Comment created <br />"; 

    mysqli_query($cxn,"create table Reservation
      (RNo INTEGER not null,
      RDate DATE,
      Length INTEGER,
      MemID INTEGER,
      VIN INTEGER,
      primary key(RNo)
      );");

    echo "Reservation created <br />";

     mysqli_query($cxn,"create table Admin
      (email Char(50) not null,
      password Char(50) not null, 
      primary key(email)
      );");

    echo "Admin created <br />";

    mysqli_query($cxn,"insert into Parking values 
      ('North Lot', '34');");

      mysqli_query($cxn,"insert into Reservation values
      ('0124', '223', '24/05/17', '4'),
      ('0125', '649', '26/05/17', '2'),
      ('0126', '115', '20/05/17', '14');");

      mysqli_query($cxn,"insert into Member values 
      ('10017155', 'John Gold',   '12 Windy Road',    '(613)-123-2324', 'gold@rogers.com',      'A2B 5K8L', '150', 'password'),
      ('10018232', 'Eric Jones',  '5 Beach Drive',    '(416)-642-5599', 'ejones@hotmail.com',   'D4T4 R0X', '150', 'password'),
      ('10011026', 'Jenny Pipes', '42 Apple Avenue',  '(613)-443-4753', 'jenpipes@hotmail.com', '2FAST4U',  '150', 'password');");

      mysqli_query($cxn,"insert into Car values 
      ('554783', 'Ford',  'Escort', '2010', 'North Lot', '40'),
      ('468538', 'Chevy', 'Civic',  '2006', 'North Lot', '30'),
      ('539030', 'Ford',  'Camaro', '2013', 'North Lot', '50');");

      mysqli_query($cxn,"insert into MaintenanceHistory values 
      ('554783', '18/02/17', '0763489', 'Body Work'),
      ('468538', '14/11/16', '0905736', 'Schedule'),
      ('539030', '28/01/17', '0089281', 'Repair');");

      mysqli_query($cxn,"insert into History values 
      ('10017155', '0124', '554783', '0836432', '0836585', 'Normal',      'Full', 'Half'),
      ('10018232', '0125', '468538', '1003509', '1004235', 'Damaged',     'Full', 'Full'),
      ('10011026', '0126', '539030', '0458273', '1000091', 'Not Running', 'Full', 'Empty');");

      mysqli_query($cxn,"insert into Comment values 
      ('10017155', '554783', '4', 'Nice reliable car.'),
      ('10018232', '468538', '2', 'Big blind spot.'),
      ('10011026', '539030', '3', 'Very Fast!');");

      mysqli_query($cxn,"insert into Admin values 
      ('sarah@ktcs.ca', 'password'),
      ('bill@ktcs.ca', 'password'),
      ('rhys@ktcs.ca', 'password';");

    mysqli_close($cxn); 
echo "KTownCarShare database created.";
?>
</body></html>




