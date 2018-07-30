<?php

// Connexion à la base de données

try{
    $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '');

}
catch(Exception $e)
{
       die('Erreur : '.$e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée

$req = $bdd->prepare('INSERT INTO minichat.chat (pseudo, message, date) VALUES(?, ?, NOW())');

$req = $req->execute(array($_POST['pseudo'], $_POST['message']));

if(!$req) {
    die($bdd->errorInfo()[2]);
}

$cookie = setcookie('pseudo', $_POST['pseudo'],time() + 3600*24,'/'  );

header('Location: index.php');