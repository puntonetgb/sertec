<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../user/login.php");
    exit;
}

include "../includes/config.php";

	$tec = $_GET["idtecnico"];
	$tip = $_GET["tipo"];
	$nom = $_POST["nombre"];
	

switch ($tip) {
   case 1:
		$sql = "INSERT INTO tecnico (Nombre) VALUES ('$nom')";
		$dato=mysqli_query($link, $sql);
		mysqli_close($link);
		header('Location: tecnicos.php');	
		break;
   case 2:
		$sentencia="UPDATE tecnico SET Nombre='".$nom."' WHERE idtecnico='".$tec."' ";
		$link->query($sentencia) or die ("Error al actualizar datos".mysqli_error($link));
		mysqli_close($link);
		header('Location: tecnicos.php');
		break;
   case 3:
		$del="DELETE FROM tecnico WHERE idtecnico='".$tec."' ";
		$link->query($del) or die ("Error al eliminar".mysqli_error($link));
		mysqli_close($link);
		header('Location: tecnicos.php');	
		break;	
}


?>