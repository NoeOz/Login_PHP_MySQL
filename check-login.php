<?php
	session_start();
?>

<!doctype html>
<html lang="en">
	<head>
		<title>Verification</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<?php
				include 'conn.php';
				
				$nom = $_POST['nom'];
				$prenom = $_POST['prenom']; 
				$pass = $_POST['pass'];
				
				$result = mysqli_query($conn, "SELECT * FROM users WHERE Nom = '$nom' and Prenom = '$prenom'");
				
				$row = mysqli_fetch_assoc($result);
				
				$hash = $row['Pass'];
				
				if (password_verify($_POST['pass'], $hash)) {	
					
					$_SESSION['loggedin'] = true;
					$_SESSION['prenom'] = $row['prenom'];
					$_SESSION['start'] = time();
					$_SESSION['expire'] = $_SESSION['start'] + (10 * 60) ;						
					
					echo "<div class='alert alert-success mt-4' role='alert'><strong>Bienvenue!</strong> $row[Prenom]				
					<p><a href='logout.php'>Se deconnecter</a></p></div>
					<p>Adresse: $row[Adresse]</p>
					<p>Code Postal: $row[CP]</p>
					<p>Ville: $row[Ville]</p>";	
				
				} else {
					echo "<div class='alert alert-danger mt-4' role='alert'>Email ou Mot de passe incorrects!
					<p><a href='login.html'><strong>Réessayez s'il vous plaît!</strong></a></p></div>";			
				}	
			?>
		</div>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	</body>
</html>