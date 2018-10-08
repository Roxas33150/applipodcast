<?php 	session_start();?>

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
	
		if(!isset($_SESSION['login'])) {
 		echo '<h1>Vous n\'êtes pas connecté, accés interdit !</h1> <meta http-equiv="refresh" content="0; URL=index.php"> ';
	}
	?> 

</center>

		</div>
	</div>
</div>


</body>
</html>