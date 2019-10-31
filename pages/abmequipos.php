<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../user/login.php");
    exit;
}

include "../includes/config.php";

	$equ = $_GET["idequipo"];
	$tip = $_GET["tipo"];
	$nom = $_POST["nombre"];
	

switch ($tip) {
   case 1:
		$sql = "INSERT INTO equipos (Nombre) VALUES ('$nom')";
		$dato=mysqli_query($link, $sql); 	
		mysqli_close($link);
		header('Location: equipos.php');	
		break;
   case 2:
		$sentencia="UPDATE equipos SET Nombre='".$nom."' WHERE idequipo='".$equ."' ";
		$link->query($sentencia) or die ("Error al actualizar datos".mysqli_error($link));
		mysqli_close($link);
		header('Location: equipos.php');
		break;
   case 3:
		$del="DELETE FROM equipos WHERE idequipo='".$equ."' ";
		$link->query($del) or die ("Error al eliminar".mysqli_error($link));
		mysqli_close($link);
		header('Location: equipos.php');	
		break;	
}


?>