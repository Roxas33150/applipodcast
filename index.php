<br/>
<br/>

<!DOCTYPE html>
<html>
<head>
	<title>Ondes Palmer</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Oswald:400,500" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top"><!--DEBUT DE LA NAVBAR-->
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>


    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    	<ul class="nav navbar-nav">
	    	

	        <li class="active"><a href="index.php" class="pages">Accueil<span class="sr-only">(current)</span></a></li>
	        <li><a href="podcast.php" class="pages">Les podcasts</a></li>
	        <li><a href="nous.php" class="pages">Qui sommes-nous ?</a></li>
	        <li><a href="contact.php" class="pages">Contact</a></li>
        </ul>
      
      	<form method="GET" class="navbar-form navbar-right">
      		
       		<div class="form-group">
          		<input type="search" class="form-control" name="recherche" placeholder="Recherche..." />
        	</div>
        		<button type="submit"  class="btn btn-default">Valider</button>
        </form>

        <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><p class="visible-xs">S'identifier</p><span class="hidden-xs iconelogin hidden-xs glyphicon glyphicon-user" aria-hidden="true"></span><span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="register.php" class="pages">S'enregistrer</a></li>
	 		    <li><a href="login.php" class="pages">Connexion</a></li>
	        		</div>
	        	</form>
	          </ul>
	    </li>
		</ul>


    </div><!-- FIN DE LA NAVBAR -->
  </div><!-- /.container-fluid -->
</nav>


<?php
//BASE DE DONNES SQL POUR LES PODCASTS//
	try{
		$connection = new PDO(
		"mysql:host=localhost;".
		"dbname=podcastradio", "root", "root" );
	}
	catch (PDOException $e){
		echo "Erreur !: " . $e->getMessage() . "<br/>";
		die();
	}

	$query = "SELECT * FROM podcast 
		JOIN categorie on podcast.categorie_id = categorie.id
		JOIN animateur on podcast.animateur_id = animateur.id
		ORDER BY date_publication DESC;";
		$r = $connection->query( $query )->fetchAll(PDO::FETCH_ASSOC);
// FIN DE LA BASE DE DONNE SQL PODCAST //
?>

<?php
//var_dump( $_POST );
?>


<!-- RESULTAT DE LA RECHERCHE -->
<?php 
	$podcast = $connection -> $query = "SELECT titre , lien FROM podcast ORDER BY date_publication DESC";
			
	$envoyer = false;

	if(isset($_GET['recherche']) AND !empty($_GET['recherche'])) {
	$envoyer = true;
	$search = htmlspecialchars($_GET['recherche']);
	$podcast = $connection->query('SELECT titre , lien FROM podcast WHERE titre LIKE "%'.$search.'%" ORDER BY date_publication DESC')->fetchAll(PDO::FETCH_ASSOC);
	}
?>



<div class="container corps"><!-- début container-->

	<div class="row"><!--début row bandeau-->
		<div class="col-md-12"><!--image bandeau-->
			<img src="img/bgfinal.jpg" class="img-responsive">
		</div><!--fin image bandeau-->
	</div><!--fin row bandeau-->


	<div class="row"><!--début row contenu-->
		<div class="col-md-7">

			<?php
			if ($envoyer) {
				echo "<h1>Résultat de la recherche :</h1>";
				if(count($podcast) > 0) {
					foreach ($podcast as $p) {
						echo "<a href =\"".$p["lien"]."\">".$p['titre']."</a></br>";
					}
				}
				else {
						echo "Aucun titre correspondant !";
					}
			}
			?>
				<h1>Les Podcasts</h1>

			<?php

			/*echo '<pre>';
			var_dump($r);
			echo '</pre>';*/

			foreach ($r as $row) {
				echo "<a href =\"".$row["lien"]."\">".$row['titre']."</a></br>";
					echo " ";
				echo "Durée :"." ".$row['durée']."</br>";
					echo " ";
				echo "Catégorie :"." ".$row['type']."</br>";
					echo " ";
				echo "Animé par :"." "."<a href =\"animateur.php?id=".$row['animateur_id']."\" target=_blank>".$row['prenom']." ".$row['nom']."</a></br>";
					echo " ";
				echo "Parue le :"." ".$row['date_publication']."</br></br><hr>";

			}

			?>
		</div>

		<div class="col-md-offset-1 col-md-4">
			<h2>Tu l'as entendu sur Ondes Palmer :</h2>
			<iframe src="https://www.youtube.com/embed/Dst9gZkq1a8" class="youtube" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

			<h2>Nos partenaires :</h2>
			<a href="https://www.nike.com" class="partenaires"><img class="img-responsive" src="img/nike.jpg"></a>
		</div>
	</div><!--fin row contenu-->
</div><!--fin container-->

<!--DEBUT ACTIVATION JAVASCRIPT-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<!--FIN JAVASCRIPT-->
</body>
</html>