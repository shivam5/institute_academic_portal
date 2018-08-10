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
      $year = test_input($_POST["year"]);
      $semester = test_input($_POST["semester"]);
      $entry_no = test_input($_POST["entry_no"]);
      $grade = test_input($_POST["grade"]);

   }
 }

 // $fac_id

 $sql = "select course_instructor_id from offered_courses where course_id = '" .  $course_id . "'
  and year = '" .  $year . "' and semester = '" .  $semester . "' ;";
 $result_prev = mysqli_query($conn,$sql);

 if (!$result_prev){
   $err=mysqli_error($conn);
 echo "Error $err ";
 exit();
  }

  $row = mysqli_fetch_assoc($result_prev);

  $rec_instructor = $row['course_instructor_id'];

  if ($fac_id == $rec_instructor){
    echo "This faculty offering the course";
  }
  else{
    echo "This faculty does not offer the mentioned course in that year and semester";
    exit();
  }


  $sql = "select * from transcript_". $entry_no ."
        where course_id = '" .  $course_id . "'
         and course_year = '" .  $year . "' and course_semester = '" .  $semester . "' ;";

  $result_prev = mysqli_query($conn,$sql);

  $num_rows = $result_prev->num_rows;
  if ($num_rows == 0) {
    echo "Student have not taken this course in this year and semester";
    exit();

  }
  if (!$result_prev){
    $err=mysqli_error($conn);
  echo "Error $err ";
  exit();
   }




  $sql = "UPDATE transcript_". $entry_no ."
        SET grade='" . $grade . "'
        where course_id = '" .  $course_id . "'
         and course_year = '" .  $year . "' and course_semester = '" .  $semester . "' ;";

  $result_prev = mysqli_query($conn,$sql);

  if (!$result_prev){
    $err=mysqli_error($conn);
  echo "Error $err ";
  exit();
   }



  echo "Grade added succesfully.";

?>
