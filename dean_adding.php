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
      $doj = test_input($_POST["doj"]);
      $pass = test_input($_POST["pswd"]);
   }
 }

 // echo $id;
 // echo $name;
 // echo $phone;
 // echo $doj;
 // echo $dept;
 // echo $pass;


 $sql = "INSERT INTO dean_academics(id, joining_date)
 VALUES('$id', '$doj');";
 $result = mysqli_query($conn,$sql);

 if (!$result){
   $err=mysqli_error($conn);
 echo "Error $err ";
 exit();
  }

 $sql = "select id from dean_academics where leaving_date is null and id != '" . $id . "';";
 $result_prev = mysqli_query($conn,$sql);

 if (!$result_prev){
   $err=mysqli_error($conn);
 echo "Error $err ";
 exit();
  }

$sql = "update dean_academics set leaving_date= '" . $doj . "' where leaving_date is null and id != '" . $id . "';";
$result = mysqli_query($conn,$sql);

if (!$result){
  $err=mysqli_error($conn);
echo "Error $err ";
exit();
 }



$result_prev = mysqli_fetch_assoc($result_prev);

echo $result_prev['id'];

$user = 'dean_acad_' . $result_prev['id'];

$sql = "DROP USER IF EXISTS'" . $user . "'@'" . $servername . "';";
$result = mysqli_query($conn,$sql);

if (!$result){
  $err=mysqli_error($conn);
echo "Error $err ";
exit();
 }



  $user = 'dean_acad_' . $id;

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
  $sql = "GRANT EXECUTE ON `academic_portal`.* TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

  $result = mysqli_query($conn,$sql);

  if (!$result){
    $err=mysqli_error($conn);
  echo "Error $err ";
  exit();
   }


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

$sql = "GRANT SELECT ON academic_portal.* TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

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
   $sql = "GRANT INSERT,DELETE ON academic_portal.department TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

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
 $sql = "GRANT INSERT,DELETE ON academic_portal.batch TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

 $result = mysqli_query($conn,$sql);

 if (!$result){
   $err=mysqli_error($conn);
 echo "Error $err ";
 exit();
  }


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

    $sql = "GRANT INSERT ON academic_portal.semesters TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

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

  echo "Dean academics added successfully";

?>
