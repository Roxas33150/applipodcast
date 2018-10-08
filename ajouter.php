<?php

try{
 $connection = new PDO(
 "mysql:host=localhost;".
 "dbname=podcastradio", "root", "root" );
}
catch (PDOException $e){
 echo "Erreur !: " . $e->getMessage() . "<br/>";
 die();
}
$titre = $_POST['titre'];
$resume = $_POST['resume'];
$lien = $_POST['lien'];
$format = $_POST['format'];
$duree = $_POST['durée'];
$datemel = $_POST['date_mise_en_ligne'];
$datepubli = $_POST['date_publication'];
$connection->exec("INSERT INTO podcast (id, titre, resume, lien, format, durée, date_mise_en_ligne, date_publication) VALUES (NULL, '$titre', '$resume', '$lien', '$format', '$duree', '$datemel', '$datepubli')");
echo "Podcast ajouté";

?>

<p>
  <a href="http://localhost:8888/applipodcast/login.php" class="bouton">Ajouter un autre podcast</a>
</p>

<p>
  <a href="http://localhost:8888/applipodcast/" class="bouton">Retourner sur la page d'accueil</a>
</p>