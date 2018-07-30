<div id="ajax">
<?php 
 try{  $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '');

}catch(Exception $e)
{
       die('Erreur : '.$e->getMessage());
}

// Récupération des 10 derniers messages

$reponse = $bdd->query('SELECT pseudo, message, date FROM minichat.chat ORDER BY ID DESC LIMIT 0, 10');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)

    while ($donnees = $reponse->fetch()){
        echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . $donnees['date']. '</p>';
    }
    $reponse->closeCursor();
?>
</div>
