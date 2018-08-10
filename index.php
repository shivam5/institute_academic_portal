
<!DOCTYPE html>
<html>
<head>
<title>Index</title>
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

<div class="header">
		<div class="container">
			<div class="logo">
				<a href="index.php"><span>Academic</span>Portal</a>
			</div>
			<div class="header-right">


	<!-- Large modal -->
			</div>
		</div>
	</div>
	 <section>
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-in-form">
						<div class="sign-in-form-top">
							<h1>Log in</h1>
						</div>
						<div class="signin">

							<form action = "check_login.php" method = "post">
								<div class="log-input">
									<div class="log-input-left">
										<select value="type" name="type">
										<option value="root">Root</option>
										<option value="student">Student</option>
										<option value="faculty">Faculty</option>
										<option value="dean_academics">Dean Academics</option>
										<option value="staff_dean_office">Staff Dean Office</option>
										<option value="hod">HOD</option>
									</select>
									</div>
									<div class="clearfix"> </div>
								</div>

								<div class="log-input">
									<div class="log-input-left">
									   <input type="text" class="user" value="id" name="id" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'id';}"/>
									</div>
									<div class="clearfix"> </div>
								</div>
							<div class="log-input">
								<div class="log-input-left">
								   <input type="password" class="lock" value="password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password:';}"/>
								</div>
								<div class="clearfix"> </div>
							</div>
							<input type="submit" name="submit" value="Log in">
						</form>
							<br>

						</div>
					</div>
				</div>
			</div>
		<!--footer section start-->
			<footer class="diff">
			   <p class="text-center">&copy 2017 IIT Ropar. All Rights Reserved</p>
			</footer>
        <!--footer section end-->
	</section>
</body>
</html>
