<?php 
	include 'tools.php';
	if (isset($_SESSION['email'])) {
		header('Location: php/panel.php');
	}
	$message = "";
	if (isset($_POST['btnAccept'])) {
		if ($_POST['email'] == "admin@server.com" && $_POST['pass'] == "serveradmin") {
			$_SESSION['email'] = $_POST['email'];
			header('Location: php/paneladmin.php');
		}
		$user = validateUser($_POST['email'],$_POST['pass']);
		if ($user) {
			$_SESSION['email'] = $user[0]['email'];
			$_SESSION['id'] = $user[0]['idUsuario'];
			header('Location: php/panel.php');
		}
		$message = "Email o Password Incorrecto";	
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Webgenerator | Login</title>
	<link rel="stylesheet" href="css/admin/estilo.css">
</head>
<body>
	<div class="wrapper backred">
		<div class="container backgris">
			<h1 class="unboun cblue">WEBGENERATOR <br> Francisco Behrendt</h1>
			<div class="contain_form">
				<div class="second backred">
					<h1 class="unboun cgris">Iniciar Sesion</h1>
					<form method="POST" class="lato">
						<input class="lato backgris" type="text" name="email" placeholder="EMAIL" required>
						<input class="lato backgris" type="password" name="pass" placeholder="PASSWORD" required>
						<input class="unboun cred backpink" type="submit" name="btnAccept" value="Aceptar">
					</form>
					<a class="unboun cgris" href="php/register.php">No tiene cuenta? Registrese</a>
				</div>
				<h2 class="lato cred"><?php echo $message; ?></h2>
			</div>
		</div>
	</div>
</body>
</html>