<div id="ajax">
<?php 
 try{  $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '');

}catch(Exception $e)
{
       die('Erreur : '.$e->getMessage());
}

// Récupération des 10 derniers messages

$reponse = $bdd->query('SELECT m.pseudo, m.message, m.date, u.color FROM minichat.chat m  LEFT JOIN user u ON m.pseudo = u.pseudo ORDER BY ID DESC LIMIT 0, 10');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)

    while ($donnees = $reponse->fetch()){
        echo '<p><strong style= "color: '.$donnees['color']. '">' . htmlspecialchars($donnees['pseudo']) . '</strong> : <span style="color: white">' . htmlspecialchars($donnees['message']) . '</span>' . $donnees['date']. '</p>';
    }
    $reponse->closeCursor();
?>
</div>
