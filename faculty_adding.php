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
  echo "Login successfull \n";
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
      $phone = test_input($_POST["phone"]);
      $doj = test_input($_POST["doj"]);
      $dept = test_input($_POST["dept"]);
      $pass = test_input($_POST["pswd"]);
   }
 }

 // echo $id;
 // echo $name;
 // echo $phone;
 // echo $doj;
 // echo $dept;
 // echo $pass;

 $sql = "INSERT INTO faculty(id, name, phone,department_name,joining_date)
 VALUES('$id', '$name', '$phone', '$dept','$doj');";
 $result = mysqli_query($conn,$sql);

 if (!$result){
   $err=mysqli_error($conn);
 echo "Error $err ";
 exit();
  }


  $user = 'faculty_' . $id;

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

 // echo "Reached here 1";


 // $sql = "alter default privileges in schema public grant SELECT on tables to '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;
 // $sql = "alter default privileges grant select on tables to '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;
// $sql = "alter default privileges grant select on tables to public;";
// $sql = "GRANT SELECT ON DATABASE academic_portal TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;
//
// $result = mysqli_query($conn,$sql);
//
// if (!$result){
//   $err=mysqli_error($conn);
// echo "Error $err ";
// exit();
//  }
//  // echo "Reached here 2";

$sql = "GRANT SELECT, UPDATE ON academic_portal.* TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

$result = mysqli_query($conn,$sql);

if (!$result){
  $err=mysqli_error($conn);
echo "Error $err ";
exit();
 }


// $sql = "GRANT SELECT, INSERT, UPDATE, DELETE ON academic_portal.courses TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY PASSWORD('" . $pass ."');" ;
$sql = "GRANT INSERT ON academic_portal.offered_courses TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

$result = mysqli_query($conn,$sql);

if (!$result){
  $err=mysqli_error($conn);
echo "Error $err ";
exit();
 }
 // echo "Reached here 2.5";

 $sql = "GRANT INSERT,DELETE ON academic_portal.batches_allowed TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

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

  echo "Faculty added successfully";

?>
