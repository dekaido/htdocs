<!doctype html>
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>My Profile</title>
<link href="../HackPSU/HackPSU.css" rel="stylesheet" type="text/css">
<link href="HackPSU.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
</head>


<?php

$first = $_POST["firstName"];
$last = $_POST["lastName"];
$id = $_POST["id"];
?>
<div class="container"> 
  <!-- Navigation -->

	<header>
		<nav>
		<div class = "logo">
		  <img src="C:\xampp\htdocs\HackPSU Images\psu_logo.png" alt="" width="200" class="psu"/>
	    </div>
		  <h3 class="title">Student Organizations</h3>
		<ul>
			<li><a href="Index">Home</a></li>
			<li><a href="Profile">My Profile</a></li>
		</ul>
	  	</nav>
		<div class = "club_title">
			<div class = "club_info">
				<?php echo $_POST["firstName"] . " " . $_POST["lastName"];?>
<div class="club_header" id="info_header"><h2>User Info</h2></div>
				<div class="club_contact_info"><ul class="user_info">
					<li>Semester:</li>
					<li>Credits:</li>
					<li>GPA:</li>
					<li>Major:</li>
					<li>Interests</li>
				  <ul class="interests">
						<li>Science</li>
						<li>Math</li>
						<li>Technology</li>
					</ul>
			  </ul></div>
			</div>
		</div>
  </header>
</div>
</html>
