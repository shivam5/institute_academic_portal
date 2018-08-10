<?php

session_start();

if( !isset($_SESSION['user']) or substr($_SESSION['user'],0, 8) != "faculty_" ){
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

$fac_id = substr($username, 8, 17);


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

      $course_id = test_input($_POST["course_id"]);
      $student_limit = test_input($_POST["student_limit"]);
      $cgpa = test_input($_POST["cgpa"]);
      $time_id = test_input($_POST["time_id"]);
      $lec_hall = test_input($_POST["lec_hall"]);
      $batches_allowed = test_input($_POST["batches_allowed"]);
   }
 }

 $sql = "select year, semester from semesters where status = 1;";
 $result_prev = mysqli_query($conn,$sql);

 if (!$result_prev){
   $err=mysqli_error($conn);
 echo "Error $err ";
 exit();
  }


$row = mysqli_fetch_assoc($result_prev);

$year =  $row['year'];
$sem =  $row['semester'];

// echo $year ;
// echo $sem;


 $sql = "select time_slot_id, lecture_hall from offered_courses where time_slot_id = '" .  $time_id . "' and lecture_hall = '" . $lec_hall . "'
  and year = '" . $year . "' and semester = '" . $sem . "' ;";
 $results2 = mysqli_query($conn,$sql);

 // print_r($results2);

 $num_rows = $results2->num_rows;
 if ($num_rows > 0) {
   echo "There exists a course offering in this year and sem which has same time slot and same lecture hall.";
   exit();
 }

 if (!$results2){
   $err=mysqli_error($conn);
 echo "Error $err ";
 exit();
  }

  $course_id = test_input($_POST["course_id"]);
  $student_limit = test_input($_POST["student_limit"]);
  $cgpa = test_input($_POST["cgpa"]);
  $time_id = test_input($_POST["time_id"]);
  $lec_hall = test_input($_POST["lec_hall"]);
  $batches_allowed = $_POST["batches_allowed"];

 $sql = "INSERT INTO offered_courses
 VALUES('$course_id', '$year', '$sem', '$student_limit', '$cgpa', '$fac_id' , '$time_id', '$lec_hall');";
 $result = mysqli_query($conn,$sql);

 if (!$result){
   $err=mysqli_error($conn);
 echo "Error $err ";
 exit();
  }

  $batches_array = explode(',', $batches_allowed);

  foreach ($batches_array as $batch) {
      $batch_year = explode('|', $batch)[0];
      $batch_dept = explode('|', $batch)[1];
      // echo $batch_dept;
      $batch_year = substr($batch_year,1);
      $batch_dept = substr($batch_dept,0, -1);
      // echo $batch_year;
      // echo "...........";
      // echo $batch_dept;

      $sql = "INSERT INTO batches_allowed
      VALUES('$course_id', '$year', '$sem', '$batch_year', '$batch_dept');";
      $result = mysqli_query($conn,$sql);

      if (!$result){
        $err=mysqli_error($conn);
      echo "Error $err ";
      exit();
       }


  }



  echo "Course offering added successfully";

?>
