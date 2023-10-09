<?php 
	include 'tools.php';
	if (isset($_SESSION['email'])) {
		header('Location: php/panel.php');
	}
	$message = "";
	if (isset($_POST['btnAccept'])) {
		if ($_POST['pass'] == $_POST['pass2']) {
			$user = createUser($_POST['email'],$_POST['pass']);
			if ($user) {
				header('Location: ../index.php');
			}
			$message = "Email ya registrado";	
		}else{
			$message = "Contraseñas no coinciden";	
		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Webgenerator | Register</title>
	<link rel="stylesheet" href="../css/admin/estilo.css">
</head>
<body>
	<div class="wrapper backred">
		<div class="container backgris">
			<h1 class="unboun cblue">Registrarse <br> es simple.</h1>
			<div class="contain_form">
				<div class="second backred">
					<h1 class="unboun cgris">Registrarse</h1>
					<form method="POST" class="lato">
						<input class="lato backgris" type="text" name="email" placeholder="EMAIL" required>
						<input class="lato backgris" type="text" name="pass" placeholder="PASSWORD" required>
						<input class="lato backgris" type="text" name="pass2" placeholder="REPETIR PASSWORD" required>
						<input class="unboun cred backpink" type="submit" name="btnAccept" value="Aceptar">
					</form>
				</div>
				<h2 class="lato cred"><?php echo $message; ?></h2>
			</div>
		</div>
	</div>
</body>
</html>