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
        <link rel="icon" type="image/png" href="images/favicon_uk.png">

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
            <div class="jumbotron" style="background-image:url(images/board.png); background-size: cover; color:white;">
                <div class="container">
                    <h1 class="display-3">Shakespeare - Conjugation</h1>
                    <br>
                    <p>Past, present, future, become unstoppable and no longer lose yourself in the maze of time.</p>
                    <br>
                </div>
            </div>

            <div class="container">
                <?php
                $dir    = './conjugaison';
                $files = scandir($dir);
                for($i = 2; $i < count($files); ++$i) {
                    echo '<a style="margin: 0 10px;" href="/projet/conquizz.php?name='. str_replace ( ".json" , "" , $files[$i] ) .'&category=conjugaison" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">'. str_replace ( ".json" , "" , $files[$i] ) .'</a>';
                }
                ?>
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