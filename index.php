<?php
session_start();

if(isset($_SESSION['user']))
  $user = $_SESSION['user'];
?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" type="image/png" href="Images/favicon_uk.png">

		<title>Shakespeare - Master the language</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
		
		<!-- Custom styles for this template -->
		<link href="custom.css" rel="stylesheet">
	</head>

	<body>    
	
	<?php include './header.php'; ?>  

		<main role="main"> 

			<!-- Main jumbotron for a primary marketing message or call to action -->
			<div class="jumbotron" style="background-image:url(Images/london_header.jpg); background-size: cover; color:white;">
				<div class="container">
					<h1 class="display-3">Shakespeare</h1>
					<p>This platform is designed to help you master the language of Shakespeare. You will find many exercises adapted to your level to learn and improve at your own pace.</p>
					<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
				</div>
			</div>

			<div class="container">
				<!-- Example row of columns -->
				<div class="row">

				<div class="col-md-4">
					<h2>General Knowledge</h2>
					<p>Learn general things about countries, cities, ...</p>
					<p><a class="btn btn-secondary" href="general.php" role="button">View details &raquo;</a></p>
				</div>

				<div class="col-md-4">
					<h2>Vocabulary</h2>
					<p>Learn new vocabulary by theme.</p>
					<p><a class="btn btn-secondary" href="vocabulary.php" role="button">View details &raquo;</a></p>
				</div>

				<div class="col-md-4">
					<h2>Spelling</h2>
					<p>Correct common mistakes and identify false friends.</p>
					<p><a class="btn btn-secondary" href="spelling.php" role="button">View details &raquo;</a></p>
				</div>

				<div class="col-md-4">
					<h2>Conjugaison</h2>
					<p>Past, present, future, become unstoppable and no longer lose yourself in the maze of time.</p>
					<p><a class="btn btn-secondary" href="conjugaison.php" role="button">View details &raquo;</a></p>
				</div>

				</div>
				
				<hr>

			</div> <!-- /container -->

		</main>

		<?php include './footer.php'; ?>  

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	</body>
</html>