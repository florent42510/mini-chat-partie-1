<?php
include 'vendor/autoload.php';
use \Colors\RandomColor;

// Connexion à la base de données

try{
    $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '');

}
catch(Exception $e)
{
       die('Erreur : '.$e->getMessage());
}

    function get_ip() {
        // IP si internet partagé
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }
        // IP derrière un proxy
        elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        // Sinon : IP normale
        else {
            return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
        }
    }
    
        
// Insertion du message à l'aide d'une requête préparée

$req = $bdd->prepare('INSERT INTO chat (pseudo, message, date, ip, user) VALUES(?, ?, NOW(),?,?)');

$req = $req->execute(array($_POST['pseudo'], $_POST['message'],get_ip(),$_SERVER['HTTP_USER_AGENT']));

if(!$req) {
    die($bdd->errorInfo()[2]);
}

$cookie = setcookie('pseudo', $_POST['pseudo'],time() + 3600*24,'/'  );

//Si le user est inexistant alors attribuer couleur

    // $req2 = $bdd->prepare('INSERT INTO minichat.user(pseudo, color) VALUES(?,?)');
    // $req2->execute(array($_POST['pseudo'], RandomColor::one() ));

$user_exist = $bdd->prepare('SELECT COUNT(*) FROM user WHERE pseudo = ?');
$user_exist->execute ([$_POST['pseudo']]);

$userWithColor = $user_exist->fetchColumn();


if($userWithColor ==="0"){
    //si non existant
    $insertQuery = $bdd->prepare('INSERT INTO user (pseudo, color)
    VALUES (?,?)');
    $insertQuery->execute(array($_POST["pseudo"], RandomColor::one() ));

    if(!$insertQuery) {
        die("Erreur mysql : ".$bdd -> errorInfo()[2]."\n<br>".$sql);
    }
}


//header('Location: index.php');