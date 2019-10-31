<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../user/login.php");
    exit;
}

include "../includes/config.php";

$tip = $_GET["tipo"];

switch ($tip) {
   case 1:
		$nom = $_POST["nombre"];
		$precio = $_POST["precio"];
		$grup = $_POST["grupo"];
		$sql = "INSERT INTO servicios (Nombre, Precio, Grupo) VALUES ('$nom','$precio','$grup')";
		$dato=mysqli_query($link, $sql);

		mysqli_close($link);
		header('Location: servicios.php');		
		break;
   case 2:
		$idCli = $_GET['idservicio'];
		$nom=$_POST['nombre'];
		$prec=$_POST['precio'];
		$grup=$_POST['grupo'];
	    $sentencia="UPDATE servicios SET Nombre='".$nom."', Precio='".$prec."', Grupo='".$grup."' WHERE idservicio='".$idCli."' ";
	    $link->query($sentencia) or die ("Error al actualizar datos".mysqli_error($link));
		mysqli_close($link);
		header('Location: servicios.php');
		break;
   case 3:
		$ser= $_GET['idservicio'];
		$del="DELETE FROM servicios WHERE idservicio='".$ser."' ";
		$link->query($del) or die ("Error al eliminar".mysqli_error($link));
		mysqli_close($link);
		header('Location: servicios.php');	
		break;	
}
