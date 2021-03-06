<?php

session_start();

$user = "";
$pass = "";
$alert ="";

if(isset($_POST["inputLogin"]))
    $user = htmlspecialchars($_POST["inputLogin"]);
  
if(isset($_POST["inputPassword"]))
    $pass = htmlspecialchars($_POST["inputPassword"]);

if(file_exists("users/".$user.".json") && isset($_POST["inputLogin"]) && isset($_POST["inputPassword"])){

    $file = fopen("users/".$user.".json", "r") or die("Unable to open file!");
    
    $line_of_text = fgets($file);
    $json = json_decode($line_of_text, true);

    if(password_verify($pass, $json["data"][1][1])){
      $_SESSION['user'] = $user;
      $alert = "
      <div class=\"alert alert-success text-center\">
        <strong>Great !</strong> You are log in !
      </div> ";
      header( "Refresh:3; url=index.php", true, 303);
    }else{
      $alert = "
      <div class=\"alert alert-warning text-center\">
        <strong>Humm !</strong> It's embarassing... The password is not good !
      </div> ";
    }

    fclose($file);
    
}else{
  if(isset($_POST["inputLogin"]) && isset($_POST["inputPassword"])){
    $alert = "
    <div class=\"alert alert-danger text-center\">
      <strong>Error !</strong> This account doesn't exists !
    </div> ";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="Images/favicon_uk.png">

    <title>Shakespeare - Master the language</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="custom.css" rel="stylesheet">
  </head>

  <body>

  <div class="container">
  
        <form class="form-signin" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">

          <?php echo $alert;?>

          <h2 class="form-signin-heading">Please sign in</h2>
          <label for="inputLogin" class="sr-only">Login</label>
          <input type="text" name="inputLogin" id="inputLogin" class="form-control" placeholder="Login" required autofocus>
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
          <button class="btn btn-lg btn-success btn-block" type="submit">Sign in</button>
          <hr>
          <a class="btn btn-lg btn-info btn-block" href="create.php" role="button">Create Account</a>
        </form>
  
      </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>
