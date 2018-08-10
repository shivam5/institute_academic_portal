<!DOCTYPE html>
<html>
<head>
<title>login</title>
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
</head>
<body>


	<?php

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

				$type = test_input($_POST["type"]);
	      $id = test_input($_POST["id"]);
	      $pass = test_input($_POST["password"]);
	   }
	 }

		 // echo $type . $id . $pass;



		 if ($type == "root" ){
			 $servername = "localhost";
			 $username = $id;
			 $password = $pass;
			 $dbname = "academic_portal";

		 }
		 else if ($type == "student" ){

			 $servername = "localhost";
			 $username = "student_".$id;
			 $password = $pass;
			 $dbname = "academic_portal";

		 }
		 else if ($type == "faculty" ){
			 $servername = "localhost";
			 $username = "faculty_".$id;
			 $password = $pass;
			 $dbname = "academic_portal";

		 }
		 else if ($type == "dean_academics" ){
			 $servername = "localhost";
			 $username = "dean_acad_".$id;
			 $password = $pass;
			 $dbname = "academic_portal";

		 }
		 else if ($type == "staff_dean_office" ){
			 $servername = "localhost";
			 $username = "staff_".$id;
			 $password = $pass;
			 $dbname = "academic_portal";

		 }
		 else if ($type == "hod" ){
			 $servername = "localhost";
			 $username = "hod_".$id;
			 $password = $pass;
			 $dbname = "academic_portal";

		 }
		 else{
			 echo "Not valid type";
		 }

		 // echo $servername.$username.$password;

		 // Creating a connection
		 $conn = mysqli_connect($servername, $username, $password, $dbname);

		 // Checking connection
		 if (!$conn) {
		     die("Connection failed: " . mysqli_connect_error());
		 }
		 else{
			 echo "Login successfull";
		 }

		 session_start();
		 $_SESSION['user']=$username;
		 $_SESSION['server']=$servername;
		 $_SESSION['pass']=$password;
		 $_SESSION['dbn']=$dbname;

		 echo substr($_SESSION['user'],0, 8);

		 if($_SESSION['user'] == "root"){
			 header("location: root_user.php");
		 }
		 else if(substr($_SESSION['user'],0, 8) == "student_"){
			 header("location: student.php");
		 }

		 else if(substr($_SESSION['user'],0, 8) == "faculty_"){
			 header("location: faculty.php");
		 }

		 else if(substr($_SESSION['user'],0, 10) == "dean_acad_"){
			 header("location: dean_acad.php");
		 }

		 else if(substr($_SESSION['user'],0, 6) == "staff_"){
			 header("location: staff.php");
		 }

		 else if(substr($_SESSION['user'],0, 4) == "hod_"){
			 header("location: hod.php");
		 }



	?>


<div class="header">
		<div class="container">
			<div class="logo">
				<a href="index.php"><span>Academic</span>Portal</a>
			</div>
			<div class="header-right">


		<!--footer section start-->
			<footer class="diff">
			   <p class="text-center">&copy 2017 IIT Ropar. All Rights Reserved</p>
			</footer>
        <!--footer section end-->
	</section>
</body>
</html>
