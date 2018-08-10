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

      $id = test_input($_POST["entnum"]);
      $name = test_input($_POST["name"]);
      $phone = test_input($_POST["phone"]);
      $date = test_input($_POST["date"]);
      $prob = test_input($_POST["loc"]);
      $year = test_input($_POST["year"]);
      $dept = test_input($_POST["dept"]);
      $pass = test_input($_POST["pswd"]);
   }
 }


 $sql = "INSERT INTO students(entry_no, name, phone, dob, is_probated, batch_year, dept_name)
 VALUES('$id', '$name', '$phone', '$date', '$prob', '$year', '$dept');";
 $result = mysqli_query($conn,$sql);

 if (!$result){
   $err=mysqli_error($conn);
 echo "Error $err ";
 exit();
  }


  $user = 'student_' . $id;

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

$sql = "GRANT SELECT ON academic_portal.courses TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

$result = mysqli_query($conn,$sql);

if (!$result){
  $err=mysqli_error($conn);
echo "Error $err ";
exit();
 }

 $sql = "GRANT SELECT ON academic_portal.prerequisite TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

 $result = mysqli_query($conn,$sql);

 if (!$result){
   $err=mysqli_error($conn);
 echo "Error $err ";
 exit();
  }

  $sql = "GRANT SELECT ON academic_portal.department TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

  $result = mysqli_query($conn,$sql);

  if (!$result){
    $err=mysqli_error($conn);
  echo "Error $err ";
  exit();
   }

   $sql = "GRANT SELECT ON academic_portal.faculty TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

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



    $sql = "GRANT SELECT ON academic_portal.offered_courses TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

    $result = mysqli_query($conn,$sql);

    if (!$result){
      $err=mysqli_error($conn);
    echo "Error $err ";
    exit();
     }

     $sql = "GRANT SELECT ON academic_portal.hod TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

     $result = mysqli_query($conn,$sql);

     if (!$result){
       $err=mysqli_error($conn);
     echo "Error $err ";
     exit();
      }

      $sql = "GRANT SELECT ON academic_portal.staff_deans_office TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

      $result = mysqli_query($conn,$sql);

      if (!$result){
        $err=mysqli_error($conn);
      echo "Error $err ";
      exit();
       }


       $sql = "GRANT SELECT ON academic_portal.batch TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

       $result = mysqli_query($conn,$sql);

       if (!$result){
         $err=mysqli_error($conn);
       echo "Error $err ";
       exit();
        }

        $sql = "GRANT SELECT ON academic_portal.batches_allowed TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

        $result = mysqli_query($conn,$sql);

        if (!$result){
          $err=mysqli_error($conn);
        echo "Error $err ";
        exit();
         }

         $sql = "GRANT SELECT ON academic_portal.batch TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

         $result = mysqli_query($conn,$sql);

         if (!$result){
           $err=mysqli_error($conn);
         echo "Error $err ";
         exit();
          }

          $sql = "GRANT SELECT ON academic_portal.batches_allowed TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

          $result = mysqli_query($conn,$sql);

          if (!$result){
            $err=mysqli_error($conn);
          echo "Error $err ";
          exit();
           }

           $sql = "GRANT SELECT ON academic_portal.students TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

           $result = mysqli_query($conn,$sql);

           if (!$result){
             $err=mysqli_error($conn);
           echo "Error $err ";
           exit();
            }

            $sql = "GRANT SELECT, INSERT, DELETE ON academic_portal.course_registrations TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

            $result = mysqli_query($conn,$sql);

            if (!$result){
              $err=mysqli_error($conn);
            echo "Error $err ";
            exit();
             }

             $sql = "GRANT SELECT ON academic_portal.dean_academics TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

             $result = mysqli_query($conn,$sql);

             if (!$result){
               $err=mysqli_error($conn);
             echo "Error $err ";
             exit();
              }


              $sql = "GRANT SELECT, INSERT, DELETE ON academic_portal.ticket TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

              $result = mysqli_query($conn,$sql);

              if (!$result){
                $err=mysqli_error($conn);
              echo "Error $err ";
              exit();
               }

               $sql = "GRANT SELECT ON academic_portal.semesters TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

               $result = mysqli_query($conn,$sql);

               if (!$result){
                 $err=mysqli_error($conn);
               echo "Error $err ";
               exit();
                }


                $sql_query = "CREATE TABLE transcript_" . $id . " (
                  course_id varchar(10),
                  course_year integer,
                  course_semester varchar(10),
                  grade integer,
                credit decimal(4,2),
                PRIMARY KEY (course_id, course_year, course_semester),
                FOREIGN KEY (course_id, course_year, course_semester) references offered_courses(course_id, year, semester)
                )";

                if (mysqli_query($conn, $sql_query)) {
                    echo nl2br( "transcript table created successfully\n");
                }
                else {
                    echo nl2br( "Error creating transcript table: " . mysqli_error($conn). "\n");
                }


                $sql = "GRANT SELECT, INSERT ON academic_portal.transcript_" . $id . " TO '" . $user . "'@'" . $servername . "' IDENTIFIED BY '" . $pass ."';" ;

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

  echo "Student added successfully";

?>
