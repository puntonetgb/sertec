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
		$fecha= date("Y,m,d");
		$cli = $_GET["idcliente"];
		$tequipo = $_POST["equipo"];
		$marca = $_POST["marca"];
		$desc = $_POST["desc"];
		$acc = $_POST["acce"];
		$est = 1;
		
		$sql = "INSERT INTO sertec (idcliente, Equipo, Marca, Descripcion, Accesorio, Estado, Fecha) VALUES ('$cli','$tequipo','$marca','$desc','$acc','$est','$fecha')";
		$dato=mysqli_query($link, $sql);
		mysqli_close($link);
		header('Location: serviciotecnico.php');	
		break;
   case 2:
		$tec = $_POST["tecnico"];
		$st = $_GET["sertec"];	
		$sql = "UPDATE sertec SET Tecnico='".$tec."', Estado=2 WHERE idsertec='".$st."'";
		$dato=mysqli_query($link, $sql);
		mysqli_close($link);
		header('Location: serviciotecnico.php');
		break;
   case 3:
		$idst = $_GET['sertec'];
		$tec=$_POST['tecnico'];
		$conc=$_POST['concepto'];
		$imp=$_POST['presu'];
	
	    $sentencia="UPDATE sertec SET Tecnico='".$tec."', Resolucion='".$conc."', Presupuesto='".$imp."', Estado=3 WHERE idsertec='".$idst."' ";
	    $link->query($sentencia) or die ("Error al actualizar datos".mysqli_error($link));
		mysqli_close($link);
		header('Location: serviciotecnico.php');	
		break;	
   case 4:
 		$idst = $_GET['sertec'];
   		$tec=$_POST['tecnico'];
   		$conc=$_POST['concepto'];
   		$total=$_POST['total'];		
  		$sentencia="UPDATE sertec SET Resolucion='".$conc."', Importe='".$total."', Estado=4 WHERE idsertec='".$idst."' ";
		$link->query($sentencia) or die ("Error al actualizar datos".mysqli_error($link));
		mysqli_close($link);		 
		header('Location: serviciotecnico.php');	
		break;	
   case 5:

		mysqli_close($link);
		header('Location: serviciotecnico.php');	
		break;	
   case 6:
		$st = $_GET["sertec"];
		$sql = "UPDATE sertec SET Estado=6 WHERE idsertec='".$st."'";
		$dato=mysqli_query($link, $sql);
		mysqli_close($link);
		header('Location: serviciotecnico.php');	
		break;	
}

?>
