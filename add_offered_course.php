<?php

session_start();

// print_r($_SESSION);
// echo $_SESSION['user'];

if( !isset($_SESSION['user']) or substr($_SESSION['user'],0, 8) != "faculty_" ){
  // echo "Executeddd";
   header("location:index.php");
}
else{
  // echo "Not executedd";
}
?>


<!DOCTYPE html>
<html>
<head>
<title>add_offered_course</title>

<link rel="stylesheet" type="text/css" href="style_lost.css" />
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">



<script   src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>

 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker3.min.css">


<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Resale Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!--//fonts-->
<!-- js -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- js -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-select.js"></script>
<script>
  $(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });
  });
</script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
<link href="css/jquery.uls.css" rel="stylesheet"/>
<link href="css/jquery.uls.grid.css" rel="stylesheet"/>
<link href="css/jquery.uls.lcd.css" rel="stylesheet"/>
<!-- Source -->
<script src="js/jquery.uls.data.js"></script>
<script src="js/jquery.uls.data.utils.js"></script>
<script src="js/jquery.uls.lcd.js"></script>
<script src="js/jquery.uls.languagefilter.js"></script>
<script src="js/jquery.uls.regionfilter.js"></script>
<script src="js/jquery.uls.core.js"></script>
<script>
            $( document ).ready( function() {
                $( '.uls-trigger' ).uls( {
                    onSelect : function( language ) {
                        var languageName = $.uls.data.getAutonym( language );
                        $( '.uls-trigger' ).text( languageName );
                    },
                    quickList: ['en', 'hi', 'he', 'ml', 'ta', 'fr'] //FIXME
                } );
            } );
        </script>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>

</head>
<body>





    <div class="header">
        <div class="container">
            <div class="logo">
                <a href="index.php"><span>Academic</span>Portal</a>
            </div>
            <div class="header-right">
                      <button class="btn btn-primary" onclick="window.location.href='logout.php'">Display courses</button>
                      <button class="btn btn-primary" onclick="window.location.href='logout.php'">Display offered courses</button>
      				<button class="btn btn-primary" onclick="window.location.href='add_offered_course.php'">Add offered course</button>
                      <button class="btn btn-primary" onclick="window.location.href='logout.php'">Display student transcripts</button>
                      <button class="btn btn-primary" onclick="window.location.href='logout.php'">Log Out</button>
      			</div>

        </div>

        <?php
        $username = $_SESSION['user'];
        $servername = $_SESSION['server'];
        $password = $_SESSION['pass'];
        $dbname = $_SESSION['dbn'];

        $conn = mysqli_connect($servername, $username, $password, $dbname);


            // print_r($_SESSION);
          // echo $_SESSION['user'];


        $user_name = substr($username, 8, 17);

         // $sql = "SELECT * FROM course_registrations where '" . $user_name . "'=student_entry_no;";
         // $result = mysqli_query($conn,$sql);
         //



        // if (!$result){
        //   $err=mysqli_error($conn);
        // echo "Error $err ";
        // exit();
        //  }

            ?>



    </div>

      </form>


      <form action="adding_offered_course.php" method="post">

      <h1 id="lost">Adding Offered Course

            <span id="lost_span">Please fill all the texts in the fields.</span>

      </h1>

      <label>

         <span>Course Id :</span>

         <input type="text" name="course_id" required><br>

      </label>

      <label>


      <label>

         <span>Student limit :</span>

         <input type="text" name="student_limit" required><br>

      </label>


      <label>

         <span>CGPA required: &nbsp; </span>

         <input type="text" name="cgpa" required><br>

      </label>

      <label>

         <span>Time slot id:</span>

         <input type="text" name="time_id" required><br>

      </label>

      <label>

         <span>Lecture hall:</span>

         <input type="text" name="lec_hall" required><br>

      </label>

      <label>

         <span>List of batches allowed (batch_year|batch_department): (separated by commas)</span>

         <input type="text" name="batches_allowed" required><br>

      </label>


      <br>

      <input type="submit" name = "submit" value="SUBMIT">

      </form>


        <!--footer section start-->
            <footer class="diff">
               <p class="text-center">&copy 2017 IIT Ropar. All Rights Reserved</p>
            </footer>
        <!--footer section end-->
    </section>
</body>
</html>
