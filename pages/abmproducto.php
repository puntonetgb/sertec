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
		$stock = $_POST["stock"];
		$grupo = $_POST["grupo"];
		$sql = "INSERT INTO productos (Nombre, Precio, Stock, Grupo) VALUES ('$nom','$precio','$stock','$grupo')";
		$dato=mysqli_query($link, $sql);
		mysqli_close($link);
		header('Location: productos.php');	
		break;
   case 2:
		$idCli = $_GET['idproducto'];
		$nom=$_POST['nombre'];
		$prec=$_POST['precio'];
		$sto=$_POST['stock'];	
		$grup=$_POST['grupo'];	
	    $sentencia="UPDATE productos SET Nombre='".$nom."', Precio='".$prec."', Stock='".$sto."', Grupo='".$grup."' WHERE idproducto='".$idCli."' ";
	    $link->query($sentencia) or die ("Error al actualizar datos".mysqli_error($link));
		mysqli_close($link);
		header('Location: productos.php');
		break;
   case 3:
		$pro= $_GET['idproducto'];
		$del="DELETE FROM productos WHERE idproducto='".$pro."' ";
		$link->query($del) or die ("Error al eliminar".mysqli_error($link));
		mysqli_close($link);
		header('Location: productos.php');	
		break;	
}

?>