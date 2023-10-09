<?php 
    session_start();
    include 'tools.php';
	if (empty($_SESSION['email']) || $_SESSION['email'] != "admin@server.com") {
		header('Location: ../index.php');
	}
	$query = query("SELECT * FROM `ACT12__webs`",true);
	$webs = "";
	foreach ($query as $key => $web) {
		$webs .= "<h2>".$web['dominio']."</h2>";
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Panel Admin</title>
</head>
<body>
	<h1>Todas las Webs: </h1>
	<?php echo $webs; ?>
</body>
</html>