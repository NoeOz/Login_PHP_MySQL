<!doctype html>
<html lang="fr">
  	<head>
    	<title>Crée un compte</title>
    	<meta charset="utf-8">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  	</head>
	<body>
		<div class="container">
			<?php
				include 'conn.php';
				
				$nom = $_POST['nom'];
				$prenom = $_POST['prenom'];
				$pass = $_POST['pass'];
				$adr = $_POST['adresse'];
				$cp = $_POST['cp'];
				$ville = $_POST['ville'];
				
				$passHash = password_hash($pass, PASSWORD_DEFAULT);
				
				$query = "INSERT INTO users (Nom, Prenom, Pass, Adresse, CP, Ville ) VALUES ('$nom', '$prenom', '$passHash', '$adr', '$cp', '$ville')";

				if (mysqli_query($conn, $query)) {
					echo "<div class='alert alert-success mt-4' role='alert'><h3>Votre compte a été crée.</h3>
					<a class='btn btn-outline-primary' href='login.html' role='button'>Se connecter</a></div>";		
				} else {
					echo "<div class='alert alert-danger mt-4' role='alert'><h3>Erreur"+$query+" "+mysqli_error($conn)+"</h3>
					<a class='btn btn-outline-primary' href='login.html' role='button'>Se connecter</a></div>";
				}
				mysqli_close($conn);

				
			?>
		</div>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	</body>
</html>