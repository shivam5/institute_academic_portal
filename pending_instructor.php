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

$username = $_SESSION['user'];
$servername = $_SESSION['server'];
$password = $_SESSION['pass'];
$dbname = $_SESSION['dbn'];

$conn = mysqli_connect($servername, $username, $password, $dbname);


?>


<!DOCTYPE html>
<html>
<head>
<title>root_user</title>

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

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container2 {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

.col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}

</style>

</head>
<body>
<?php
$fac_id = substr($username, 8, 17);

 $sql = "SELECT * FROM ticket where '" . $fac_id . "'=instructor_id and current_holder = 1 and status = 0;";
 echo $sql;
 $result = mysqli_query($conn,$sql);




// if (!$result){
//   $err=mysqli_error($conn);
// echo "Error $err ";
// exit();
//  }

    ?>




    <div class="header">
        <div class="container">
            <div class="logo">
                <a href="index.php"><span>Academic</span>Portal</a>
            </div>
            <div class="header-right">
                <button class="btn btn-primary" onclick="window.location.href='course_catalogue.php'">Display courses</button>
                <button class="btn btn-primary" onclick="window.location.href='offered_courses.php'">Display offered courses</button>
                <button class="btn btn-primary" onclick="window.location.href='add_offered_course.php'">Add offered course</button>
                <button class="btn btn-primary" onclick="window.location.href='add_grade.php'">Add grade</button>
                <button class="btn btn-primary" onclick="window.location.href='faculty_transcript.php'">Display student transcripts</button>
                <button class="btn btn-primary" onclick="window.location.href='pending_instructor.php'">Pending Tickets as Faculty</button>
                <button class="btn btn-primary" onclick="window.location.href='pending_advisor.php'">Pending Tickets as Advisor</button>
                <button class="btn btn-primary" onclick="window.location.href='logout.php'">Log Out</button>
            </div>

        </div>
    </div>

    <div style="overflow-x:auto;">
  <table>
    <tr>
      <th>Ticket ID</th>
      <th>Student ID</th>
      <th>Course_ID</th>
      <th>Semester</th>
      <th>Year</th>
    </tr>
    <?php

        while($row = mysqli_fetch_array($result))
        {

          $t_id = $row['ticket_id'];
          $s_id = $row['student_id'];
          $course = $row['course_offered_id'];
          $year = $row['year_course'];
          $sem = $row['semester_course'];

           echo "
             <tr>
               <td>$t_id</td>
               <td>$s_id</td>
               <td>$course</td>
               <td>$year</td>
               <td>$sem</td>
             </tr>";
        }
  ?>

  </table>
</div>

<br> <br> <br> <br>

<form action="accept_ticket.php" method="post">

    <h1 id="lost">Accept Ticket

          <span id="lost_span">Enter ticket ID to accept.</span>

    </h1>

    <label>

       <span>Ticket ID :</span>

       <input type="text" name="t_id" required><br>

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
