
<?php

session_start();


	if( !isset($_SESSION['user']) or $_SESSION['user'] != "root" ){
    // echo "Executeddd";
     header("location:index.php");
  }
  else{
    // echo "Not executedd";
  }


$username = $_SESSION['user'];
$servername = $_SESSION['server'];
$password = $_SESSION['pass'];
$dbname = $_SESSION['dbn'];

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Checking connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
  echo "Login successfull";
}


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//
// // $norecord ="";
// // $pass = "";
function test_input($data)
{
  $data=trim($data);
  $data=addslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}

  if(isset($_POST["submit"])){
    // echo "YESSSSS";
    // print_r($_POST) ;

   if($_SERVER["REQUEST_METHOD"] == "POST") {

     // echo $_POST;
      // username and password sent from form

      $id = test_input($_POST["id"]);
      $name = test_input($_POST["name"]);
      $doj = test_input($_POST["doj"]);
      $pass = test_input($_POST["pswd"]);
   }
 }



 $sql = "INSERT INTO staff_deans_office(id, name, joining_date)  VALUES('$id', '$name', '$doj');";
 $result = mysqli_query($conn,$sql);

 if (!$result){
   $err=mysqli_error($conn);
 echo "Error $err ";
 exit();
  }


  $user = 'staff_' . $id;

  $sql = "DROP USER IF EXISTS'" . $user . "'@'" . $servername . "';";
  $result = mysqli_query($conn,$sql);

  if (!$result){
    $err=mysqli_error($conn);
  echo "Error $err ";
  exit();
   }

   // echo "Reached here -2.5";

   $sql = "FLUSH PRIVILEGES;" ;
   // $sql = "GRANT SELECT, INSERT, UPDATE, DELETE ON academic_portal.courses TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

   $result = mysqli_query($conn,$sql);

   if (!$result){
     $err=mysqli_error($conn);
   echo "Error $err ";
   exit();
    }

    // echo "Reached here 3";


// Sql statements:

$sql = "CREATE USER '" . $user . "'@'" . $servername . "' IDENTIFIED WITH mysql_native_password AS '" . $pass . "';";
$result = mysqli_query($conn,$sql);

if (!$result){
  $err=mysqli_error($conn);
echo "Error $err ";
exit();
 }

 // echo "Reached here -1";

 $sql = "SET PASSWORD FOR '" . $user . "'@'" . $servername . "' = PASSWORD('" . $pass . "');";
 $result = mysqli_query($conn,$sql);

 if (!$result){
   $err=mysqli_error($conn);
 echo "Error $err ";
 exit();
  }

  // echo "Reached here 0";

//
$sql = "REVOKE ALL PRIVILEGES ON *.* FROM '" . $user . "'@'" . $servername . "';";
$result = mysqli_query($conn,$sql);

if (!$result){
  $err=mysqli_error($conn);
echo "Error $err ";
exit();
 }

 $sql = "GRANT EXECUTE ON `academic_portal`.* TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

 $result = mysqli_query($conn,$sql);

 if (!$result){
   $err=mysqli_error($conn);
 echo "Error $err ";
 exit();
  }



$sql = "GRANT SELECT, UPDATE ON academic_portal.* TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

$result = mysqli_query($conn,$sql);

if (!$result){
  $err=mysqli_error($conn);
echo "Error $err ";
exit();
 }


 // $sql = "GRANT SELECT, INSERT, UPDATE, DELETE ON academic_portal.courses TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY PASSWORD('" . $pass ."');" ;
 $sql = "GRANT INSERT, DELETE ON academic_portal.courses TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

 $result = mysqli_query($conn,$sql);

 if (!$result){
   $err=mysqli_error($conn);
 echo "Error $err ";
 exit();
  }

  // $sql = "GRANT SELECT, INSERT, UPDATE, DELETE ON academic_portal.courses TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY PASSWORD('" . $pass ."');" ;
  $sql = "GRANT INSERT,DELETE ON academic_portal.prerequisite TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

  $result = mysqli_query($conn,$sql);

  if (!$result){
    $err=mysqli_error($conn);
  echo "Error $err ";
  exit();
   }




// $sql = "GRANT SELECT, INSERT, UPDATE, DELETE ON academic_portal.courses TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY PASSWORD('" . $pass ."');" ;
$sql = "GRANT INSERT, DELETE ON academic_portal.offered_courses TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

$result = mysqli_query($conn,$sql);

if (!$result){
  $err=mysqli_error($conn);
echo "Error $err ";
exit();
 }
 // echo "Reached here 2.5";


  // $sql = "GRANT SELECT, INSERT, UPDATE, DELETE ON academic_portal.courses TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY PASSWORD('" . $pass ."');" ;
  $sql = "GRANT INSERT,DELETE ON academic_portal.course_registrations TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

  $result = mysqli_query($conn,$sql);

  if (!$result){
    $err=mysqli_error($conn);
  echo "Error $err ";
  exit();
   }


   $sql = "GRANT UPDATE ON academic_portal.ticket TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

   $result = mysqli_query($conn,$sql);

   if (!$result){
     $err=mysqli_error($conn);
   echo "Error $err ";
   exit();
    }


 $sql = "FLUSH PRIVILEGES;" ;
 // $sql = "GRANT SELECT, INSERT, UPDATE, DELETE ON academic_portal.courses TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

 $result = mysqli_query($conn,$sql);

 if (!$result){
   $err=mysqli_error($conn);
 echo "Error $err ";
 exit();
  }

  echo "Staff deans office added successfully";

?>
