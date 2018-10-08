<?php session_start();?>

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
	    	
    		<li><a href="index.php" class="pages">Accueil</a></li>
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


    </div><!-- FIN DE LA NAVBAR -->
  </div><!-- /.container-fluid -->
</nav>
                         
<div class="container corps"><!-- début container-->
		<br/>
		<br/>
			<div class="row"><!--début row bandeau-->
				<div class="col-md-12"><!--image bandeau-->
					<img src="img/bgfinal.jpg" class="img-responsive">
				</div><!--fin image bandeau-->
			</div><!--fin row bandeau-->

		</br>
		</br>

<center>

<?php
	// on se connecte à MySQL 
	try{
		$connection = new PDO(
		"mysql:host=localhost;".
		"dbname=podcastradio", "root", "root" );
	}
	catch (PDOException $e){
		echo "Erreur !: " . $e->getMessage() . "<br/>";
		die();
	}

		if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['password'])) {
		  $password = hash("sha256", $_POST['password']);
		  $login = $_POST['login'];
		  // on recupére le password de la table qui correspond au login du visiteur
		  $sql = "SELECT password, login FROM membre WHERE login='".$login."'";

		  $data = $connection->query( $sql )->fetch(PDO::FETCH_ASSOC);

	    if($data['password'] != $password) {
	      echo '<div class="alert alert-dismissable alert-danger">
		  <button type="button" class="close" data-dismiss="alert">x</button>
		  <strong>Wesh le zin tu t\'es trompé !</strong> Mauvais login / password. Allez hop recommence foufou !
		</div>';
		  }
	  
	  else {
	    $_SESSION['login'] = $login;
	    
	    echo '<div class="alert alert-dismissable alert-success">
	  <button type="button" class="close" data-dismiss="alert">×</button>
	  <strong>Bravo le zin QUE BUENA MEMORIA !</strong> Tu es logué, redirection dans 5 secondes ! <meta http-equiv="refresh" content="5; URL=ajouterpodcast.php">
	</div>';
	    // ici vous pouvez afficher un lien pour renvoyer
	    // vers la page d'accueil de votre espace membres 
	  }    
	}
	else {
	  $champs = '<p><b>(Remplissez tous les champs pour vous connectez !)</b></p>';
	}


?>









	<form method="post" action="">

    	<legend>Connexion au Panel</legend>

		    <div class="form-group">
		      <label class="col-lg-2 control-label">Login</label>
		      <div class="col-lg-10">
		        <input type="text" class="form-control" name="login" placeholder="Login">
		      </div>
		    </div><br/><br/><br/>

		    <div class="form-group">
		      <label class="col-lg-2 control-label">Mot de passe</label>
		      <div class="col-lg-10">
		        <input type="password" class="form-control" name="password" placeholder="Mot de passe">
		      </div>
		    </div>

			<br/><br/><center><button type="submit" name="submit" class="btn btn-primary">Connexion</button></center>
	</form>

</center>

		</div>
	</div>
</div>


</body>
</html>
