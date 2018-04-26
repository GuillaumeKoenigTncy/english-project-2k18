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
		
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

		<!-- Custom styles for this template -->
		<link href="custom.css" rel="stylesheet">
	</head>

  	<body>    
 
  		<?php include './header.php'; ?>  

		<main role="main"> 

			<!-- Main jumbotron for a primary marketing message or call to action -->
			<div class="jumbotron" style="background-image:url(Images/board.jpg); background-size: cover; color:white;">
				<div class="container">
					<h1 class="display-3">Shakespeare - Result</h1>
				</div>
			</div>

			<div class="container text-center">

				<div class="row">
					<div class="col-sm-12">
						<h1 class="quizTitle"></h1>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<h2 class="result"></h2>
					</div>
				</div>

				<br>

				<script>
					var url_string = window.location.href;
					var url = new URL(url_string);
					var categ = url.searchParams.get("category");
					document.write('<a href="'+categ+'.php" class="btn btn-primary" role="button">Go back to '+categ+'</a>');
				</script>  
			
				<script src="js/script1.js" type="text/javascript"></script>
				<script src="js/calculateresult1.js?v=1" type="text/javascript"></script>

			</div> <!-- /container -->

		</main>  

		<?php include './footer.php'; ?>  

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  	</body>
</html>