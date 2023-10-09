<?php 
    include 'dbconnect.php';
    
	function validateUser($email,$pass){
		return query("SELECT * FROM `ACT12__usuarios` WHERE `email` = '$email' AND `password` = '$pass'",true);
	}

    function createUser($email,$pass){
        $query = query("SELECT * FROM `ACT12__usuarios` WHERE `email` = '$email'",true);
        if (!$query) {
            query("INSERT INTO `ACT12__usuarios`(`email`, `password`) VALUES ('$email','$pass')",true);
            return true;
        }
        return false;
    }

    function createWeb($web,$idUser){   
        $query = query("SELECT * FROM `ACT12__webs` WHERE `dominio` = '$web'",true);
        if (!$query) {
            query("INSERT INTO `ACT12__webs`(`idUsuario`, `dominio`) VALUES ('$idUser','$web')",true);
            return true;
        }
        return false;
    }


 ?>