<?php

session_start();

if(isset($_SESSION['user']))
  $user = $_SESSION['user'];

$dir    = './vocabulary';
$files = scandir($dir);

for($i = 2; $i < count($files); ++$i) {
    echo $files[$i];
}

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
      <div class="jumbotron" style="background-image:url(Images/board.jpg); background-size: cover; color:white;">
        <div class="container">
          <h1 class="display-3">Shakespeare - Spelling</h1>
          <br>
          <p>Correct common mistakes and identify false friends.</p>
          <br>
        </div>
      </div>

      <div class="container">
 
      </div> <!-- /container -->

    </main>

    <script>
  
  /*
var question = {
    "phrase": "<p>I'm hapy to be here today !</p>",
    "triger": "hapy"
}


  $(".clickable").click(function(e){
         s = window.getSelection();
         var range = s.getRangeAt(0);
         var node = s.anchorNode;
         while(range.toString().indexOf(' ') != 0) {                 
            range.setStart(node,(range.startOffset -1));
         }
         range.setStart(node, range.startOffset +1);
         do{
           range.setEnd(node,range.endOffset + 1);

        }while(range.toString().indexOf(' ') == -1 && range.toString().trim() != '');
        var str = range.toString().trim();
        if(str == question.triger)
        alert(str);
        else
        alert("Nope");
       });
    
    $(".clickable").html("question.phrase");
        */
  </script>

   <!-- <p id="questiont" class="clickable">test</p>-->

 <style>
 html {
  position: relative;
  min-height: 100%;
}
body {
  margin-bottom: 60px; /* Margin bottom by footer height */
}
 .footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 60px; /* Set the fixed height of the footer here */
  line-height: 60px; /* Vertically center the text there */
  background-color: #f5f5f5;
}
 </style>

<?php include './footer.php'; ?>  

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>