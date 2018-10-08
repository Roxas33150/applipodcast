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

$query = "SELECT * FROM podcast WHERE animateur_id = \"".$_GET["id"]."\"";
$r = $connection->query( $query )->fetchAll(PDO::FETCH_ASSOC);

foreach ($r as $row) {
	echo "<a href =\"".$row["lien"]."\">".$row['titre']."</a>"."</br>";

}

?>