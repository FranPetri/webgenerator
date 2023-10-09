<?php 
    session_start();
    include 'tools.php';
    if (empty($_SESSION['email'])) {
        header('Location: ../index.php');
    }
    $idUser = $_SESSION['id'];
    $links = "";
    if (isset($_POST['btnWeb'])) {
        $url = $idUser.$_POST['web'];
        $web = createWeb($url,$idUser);
        if ($web) {
            shell_exec("../.././wix.sh ".$url);
            shell_exec('zip ../../'.$url.'/'.$url.'.zip ../../'.$url);
        }
    }
    $webs_id = query("SELECT * FROM `ACT12__webs` WHERE `idUsuario` = '$idUser'",true);   
    foreach ($webs_id as $key => $web) {
        $dominio = $web['dominio'];
        $download = '<a href="../../'.$dominio.'/'.$dominio.'.zip" download> Descargar Web </a>';
        $delete = '<form method="POST"><input type="submit" name="'.$dominio.'" value="Eliminar"></form>';
        $links .= '<div class="weblink"><a href="../../'.$dominio.'">'.$dominio.'</a> '.$download.' '.$delete.' <br>';
        // var_dump($_POST);
        if (isset($_POST[$dominio])) {
            shell_exec("rm -r ../../".$dominio);
            query("DELETE FROM `ACT12__webs` WHERE `dominio` = '$dominio'",true);
            header('Location: panel.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webgenerator | Panel</title>
    <link rel="stylesheet" href="../css/admin/estilo.css">
</head>
<body>
    <h1 class="lato">Bienvenido a tu panel</h1>
    <a href="logout.php">Cerrar sesion de <?php echo $idUser; ?></a>
    <h2 class="lato">Generar Web de: </h2>
    <form method="POST">
        <input type="text" name="web" placeholder="WEB">
        <input type="submit" name="btnWeb" value="Crear web">
    </form>
    <?php echo $links; ?>
</body>
</html>