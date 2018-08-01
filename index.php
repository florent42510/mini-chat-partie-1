<?php
use \Colors\RandomColor;
include 'vendor/autoload.php';
?>

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href= "mini.css">
    <title>Mini-Chat</title>
    
   
  </head>
  <body>
 
  <div id="container" class="container-fluid">
    <div class="row col-4  text-center">
       <div class="jumbotron fond text-white">
          <h1 class="display-4">Hey, bienvenue dans ce mini-chat !</h1>
          <p class="lead">Écris dès maintenant ton message</p>
          <form action="post.php" method = "post" onsubmit = "envoiMessage(event, this)">
            <div class="form-group">
                <label for="exampleInputEmail1">Pseudo</label>
                <input 
                type="text"  isset
                class="form-control" 
                id="exampleInputEmail1" 
                name= "pseudo" 
                placeholder="Entrez votre pseudo"
                value="<?= ($_COOKIE['pseudo']) ??  ""; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Message</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name= "message" placeholder="Tapez votre message">
            </div>
                <button type="submit" class="btn btn-warning">Envoyer</button>
          </form>
        </div>

     </div>
    <div id= "text" class="row col-8 ">
    <?php include 'store.php'; ?>
    </div>
  </div>
  
  <audio controls="controls">
        <source src="Kavinsky.mp3"  autostart="True"controller="false"  type="audio/mp3">
       
    </audio>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>

     <!-- Fichier JS --> 

    <script type="text/javascript" src="mini.js"></script>      
  

    <!--Récupération de l'adresse IP des visiteurs -->

 
  </body>
</html>