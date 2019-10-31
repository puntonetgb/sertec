<?php
	include "../includes/config.php";


$tip = $_GET["tipo"];

switch ($tip) {
   case 1:
		$idst = $_GET['sertec'];
		$sentencia="UPDATE sertec SET Estado=2 WHERE idsertec='".$idst."' ";
		$link->query($sentencia) or die ("Error al actualizar datos".mysqli_error($link));
		mysqli_close($link);
		header('Location: serviciotecnico.php');		
		break;
   case 2:
		$idst = $_GET['sertec'];
		$sentencia="UPDATE sertec SET Estado=6 WHERE idsertec='".$idst."' ";
		$link->query($sentencia) or die ("Error al actualizar datos".mysqli_error($link));
		mysqli_close($link);
		header('Location: serviciotecnico.php');
		break;
}

?>
