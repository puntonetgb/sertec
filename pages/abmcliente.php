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
		$celu = $_POST["celu"];
		$ema = $_POST["email"];
		$dir = $_POST["dir"];
		
		$sql = "INSERT INTO clientes (Nombre, Celular, Email, Direccion) VALUES ('$nom','$celu','$ema','$dir')";
		$dato=mysqli_query($link, $sql);	
		mysqli_close($link);
		header('Location: clientes.php');	
		break;
   case 2:
		$idCli = $_GET['idcliente'];
		$nom=$_POST['nombre'];
		$emai=$_POST['email'];
		$celu=$_POST['celu'];
		$dire=$_POST['dir'];
		
	    $sentencia="UPDATE clientes SET Nombre='".$nom."', Email='".$emai."', Celular='".$celu."', Direccion='".$dire."' WHERE idcliente='".$idCli."' ";
	    $link->query($sentencia) or die ("Error al actualizar datos".mysqli_error($link));
		mysqli_close($link);
		header('Location: clientes.php');
		break;
   case 3:
		$cli= $_GET['idcliente'];
		$del="DELETE FROM clientes WHERE idcliente='".$cli."' ";
		$link->query($del) or die ("Error al eliminar".mysqli_error($link));
		mysqli_close($link);
		header('Location: clientes.php');	
		break;	
}




?>