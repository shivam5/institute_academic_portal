<?php

session_start();

if( !isset($_SESSION['user']) or (substr($_SESSION['user'],0, 5) != "dean_"  and substr($_SESSION['user'],0, 6) != "staff_" ) ){
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
  // echo "Login successfull \n";
}

$dean_id = substr($username, 5, 17);


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
     // echo "YESSSSS";

     // echo $_POST;
      // username and password sent from form

      $t_id = test_input($_POST["t_id"]);
   }
 }

 $sql = "UPDATE ticket SET status = 1 where '" . $t_id . "'=ticket_id;";
 echo $sql;
 $result = mysqli_query($conn,$sql);


 ?>
