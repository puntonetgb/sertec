<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../user/login.php");
    exit;
}

include ("../includes/config.php");

?>

<!doctype html>
<html lang="es_ES">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Servicio Tecnico - SERTEC Datapoint Informàtica</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

	
      <script type="text/javascript">
		$(document).ready(function () {
		 
					(function ($) {
		 
						$('#filtrar').keyup(function () {
		 
							var rex = new RegExp($(this).val(), 'i');
							$('.buscar tr').hide();
							$('.buscar tr').filter(function () {
								return rex.test($(this).text());
							}).show();
		 
						})
		 
					}(jQuery));
		 
				});
      </script>	
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
       <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="../index.php">SERTEC</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo htmlspecialchars($_SESSION["username"]); ?></h5>
                                </div>
                                <a class="dropdown-item" href="../user/perfil.php"><i class="fas fa-user mr-2"></i>Perfil</a>
                                <a class="dropdown-item" href="../user/recuperar.php"><i class="fas fa-cog mr-2"></i>Resetear Clave</a>
                                <a class="dropdown-item" href="../user/logout.php"><i class="fas fa-power-off mr-2"></i>Salir</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
<?php include_once "sidebar.php" ?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Servicio Técnico</h2>
                            <p class="pageheader-text">Listados de Servicios Técnicos.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="../index.php" class="breadcrumb-link">Inicio</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Servicio Técnico</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
				<div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <!-- Modal ALTA -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
									<div id="error_msg"></div>
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Alta de Servicio Técnico</h5>
                                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                                        </a>
                                        </div>				
                                    </div>
                                </div>
                            </div>									
							
                            <div class="card-header d-flex"><a href="clientes.php" class="btn btn-success">Nuevo Servicio Técnico</a>
							<div class="toolbar ml-auto">
								<input id="filtrar" type="text" class="form-control" placeholder="Buscar...">
							</div>
							</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre</th>
                                                <th>Equipo</th>
                                                <th>Fecha Inicial</th>
                                                <th>Estado</th>
												<th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody class="buscar">
											
											<?php
											$result = mysqli_query($link, "SELECT st.*,cli.idcliente, cli.Nombre, est.Estado, est.Color, est.idestado FROM sertec st INNER JOIN clientes cli ON (cli.idcliente=st.idcliente) INNER JOIN estado est ON (est.idestado=st.Estado) ORDER BY idsertec desc");
											while ($row = mysqli_fetch_assoc($result)){	?>
															<tr><td><?php echo $row["idsertec"]; ?></center></td>
															<td><?php echo $row["Nombre"]; ?></td>
															<td><?php echo $row["Equipo"]; ?></td>
															<td><?php $originalDate = $row["Fecha"];
																	  $newDate = date("d/m/Y", strtotime($originalDate));
																	  echo $newDate; ?></td>
															<td><a href="orden.php?idsertec=<?php echo $row["idsertec"]; ?>&idcliente=<?php echo $row["idcliente"]; ?>"><span class="<?php echo $row["Color"]; ?>"><?php echo $row["Estado"]; ?></span></a></td>
															<td>
																<?php
																$i=($row["idestado"]);
																switch ($i) {
																   case 0:
																		break;
																   case 1: ?>
																		<!-- Ingresado -->
																		<button type="button" class="btn btn-xs btn-success" title="En Curso" data-toggle="modal" data-target="#curso<?php echo $row['idsertec'];?>"><i class="fas fa-wrench"></i></button>		
																
																<?php break;
																   case 2: ?>
																		<!-- En Curso -->
																		<?php 
																		$pres= mysqli_query($link, "SELECT Presupuesto FROM sertec WHERE idsertec=".$row["idsertec"]); 
																		while ($row4 = mysqli_fetch_assoc($pres)){
																		$tp=$row4['Presupuesto'];
																		
																		if ($tp > 0) { ?>
																		<button type="button" class="btn btn-xs btn-warning" title="Presupuestado"><b>$ <?php echo $row4['Presupuesto'];?></b></button> 
																		<button type="button" class="btn btn-xs btn-primary" title="Facturar" data-toggle="modal" data-target="#factura<?php echo $row['idsertec'];?>"><i class="fas fa-dollar-sign"></i></button>
																		<button type="button" class="btn btn-xs btn-danger"  title="Cancelar" data-toggle="modal" data-target="#cancela<?php echo $row['idsertec'];?>"><i class="fas fa-times"></i></button></td></tr>																		
																		<?php
																		} else { ?>																			
																		<button type="button" class="btn btn-xs btn-warning" title="Presupuestar" data-toggle="modal" data-target="#presu<?php echo $row['idsertec'];?>"><i class="fas fa-sticky-note"></i></button>  
																		<button type="button" class="btn btn-xs btn-primary" title="Facturar" data-toggle="modal" data-target="#factura<?php echo $row['idsertec'];?>"><i class="fas fa-dollar-sign"></i></button>
																		<button type="button" class="btn btn-xs btn-danger"  title="Cancelar" data-toggle="modal" data-target="#cancela<?php echo $row['idsertec'];?>"><i class="fas fa-times"></i></button></td></tr>																			
																		<?php
																		}
																		} ?>																		 
															   
																<?php
																		 break;
																   case 3: ?>
																		<!-- Presupuestado -->
																		<?php 
																		$pres= mysqli_query($link, "SELECT Presupuesto FROM sertec WHERE idsertec=".$row["idsertec"]); 
																		while ($row4 = mysqli_fetch_assoc($pres)){?>	
																		<b>$ <?php echo $row4['Presupuesto'];?></b> 
																		<?php } ?>
																		<a href="abmpresu.php?sertec=<?php echo $row['idsertec'];?>&tipo=1"><button type="button" class="btn btn-xs btn-success" title="Aceptado"><i class="fas fa-check"></i></button></a>
																		<a href="abmpresu.php?sertec=<?php echo $row['idsertec'];?>&tipo=2"><button type="button" class="btn btn-xs btn-danger" title="Denegado"><i class="fas fa-times"></i></button></a></td></tr>																
																<?php
																		break;
																   case 4: ?>
																		<!-- Facturado -->
																		<?php
																		$pres= mysqli_query($link, "SELECT Importe FROM sertec WHERE idsertec=".$row["idsertec"]); 
																		while ($row4 = mysqli_fetch_assoc($pres)){?>																		
																		<b>$ <?php echo $row4['Importe'];?></b> 
																		<?php
																		}
																		?>
																		<a href="abmfinal.php?sertec=<?php echo $row['idsertec'];?>"><button type="button" class="btn btn-xs btn-dark" data-toggle="tooltip" data-placement="top" title="Cobrar y Finalizar"><i class="fas fa-handshake"></i></button></a></td></tr>															
																<?php
																		break;
																   case 5: ?>
																		<!-- Finalizado -->
																		
																<?php
																}
																?>
																									
																		<!-- Modal PASA A EN CURSO -->
																		<div class="modal fade" id="curso<?php echo $row['idsertec'];?>" tabindex="-1" role="dialog" aria-labelledby="En Curso" aria-hidden="true">
																			<div class="modal-dialog" role="document">
																				<div class="modal-content">
																					<div class="modal-header">
																						<h5 class="modal-title" id="exampleModalLabel">Asignar Técnico</h5>
																						<a href="#" class="close" data-dismiss="modal" aria-label="Close">
																								<span aria-hidden="true">&times;</span>
																													</a>
																					</div>
																					<div class="modal-body">
																						<form class="needs-validation" action="abmsertec.php?sertec=<?php echo $row['idsertec'];?>&tipo=2" method="post" novalidate>
																							<div class="form-row">
																								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-12">
																									<div class="form-group">
																										<label for="exampleFormControlSelect1">Técnico Responsable</label>
																										<select class="form-control" id="tecnico" name="tecnico">																											
																											<?php
																											$tec = mysqli_query($link, "SELECT * FROM tecnico");
																											while ($row1 = mysqli_fetch_assoc($tec)){?>																									  
																											<option value = "<?php echo $row1['idtecnico'];?>"><?php echo $row1['Nombre'];?></option>
																											<?php } ?>
																										</select>
																									</div>
																								</div>
																							</div>
																							<div class="form-row">
																								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " align="right">
																									<button class="btn btn-success" type="submit">PONER EN CURSO</button>
																								</div>
																							</div>
																						</form>
																					</div>
																				</div>
																			</div>
																		</div>	

																		<!-- Modal PASA A PRESUPUESTADO -->
																		<div class="modal fade" id="presu<?php echo $row['idsertec'];?>" tabindex="-1" role="dialog" aria-labelledby="En Curso" aria-hidden="true">
																			<div class="modal-dialog" role="document">
																				<div class="modal-content">
																					<div class="modal-header">
																						<h5 class="modal-title" id="exampleModalLabel">Asignar Técnico</h5>
																						<a href="#" class="close" data-dismiss="modal" aria-label="Close">
																								<span aria-hidden="true">&times;</span>
																													</a>
																					</div>
																					<div class="modal-body">
																						<form class="needs-validation" action="abmsertec.php?sertec=<?php echo $row['idsertec'];?>&tipo=3" method="post" novalidate>
																							<div class="form-row">
																								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-12">
																									<div class="form-group">
																										<label for="exampleFormControlSelect1">Técnico Responsable</label>
																										<select class="form-control" id="tecnico" name="tecnico">	
																											<?php
																											$tec = mysqli_query($link, "SELECT * FROM tecnico");
																											while ($row1 = mysqli_fetch_assoc($tec)){?>																									  
																											<option value = "<?php echo $row1['idtecnico'];?>"><?php echo $row1['Nombre'];?></option>
																											<?php } ?>
																										</select>
																									</div>
																									<div class="form-group">
																										<label for="exampleFormControlSelect2">Concepto</label>
																										<textarea class="form-control" id="concepto" name="concepto" rows="3"></textarea>
																									</div>
																									<div class="form-group">
																										<label for="exampleFormControlSelect3">Importe</label>																									
																										<input type="number" class="form-control" id="presu" name="presu" required>
																									</div>
																							
																								</div>
																							</div>
																							<div class="form-row">
																								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " align="right">
																									<button class="btn btn-warning" type="submit">PRESUPUESTAR</button>
																								</div>
																							</div>
																						</form>
																					</div>
																				</div>
																			</div>
																		</div>	

																		<!-- Modal FACTURAR -->
																		<div class="modal fade" id="factura<?php echo $row['idsertec'];?>" tabindex="-1" role="dialog" aria-labelledby="Facturar" aria-hidden="true">
																			<div class="modal-dialog" role="document">
																				<div class="modal-content">
																					<div class="modal-header">
																						<h5 class="modal-title" id="exampleModalLabel">Facturar Orden <?php echo $row['idsertec'];?> a <?php echo $row['Nombre'];?></h5>
																						<a href="#" class="close" data-dismiss="modal" aria-label="Close">
																								<span aria-hidden="true">&times;</span></a>
																					</div>
																					<div class="modal-body">
																					<form class="needs-validation" action="abmsertec.php?sertec=<?php echo $row['idsertec'];?>&tipo=4" method="post" novalidate>
																							<div class="form-row">
																								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-12">
																									<div class="form-group">
																										<label for="exampleFormControlSelect1">Técnico Responsable</label>
																										<select class="form-control" id="tecnico" name="tecnico">	
																											<?php
																											$tec = mysqli_query($link, "SELECT * FROM tecnico");
																											while ($row1 = mysqli_fetch_assoc($tec)){?>																									  
																											<option value = "<?php echo $row1['idtecnico'];?>"><?php echo $row1['Nombre'];?></option>
																											<?php } ?>
																										</select>
																									</div>
																									<div class="form-group">
																										<label for="exampleFormControlSelect2">Concepto</label>
																										<textarea class="form-control" id="concepto" name="concepto" rows="3"></textarea>
																									</div>
																									<div class="form-group">
																										<label for="exampleFormControlSelect3">Importe</label>																									
																										<input type="number" class="form-control" id="total" name="total" required>
																									</div>
																							
																								</div>
																							</div>
																							<div class="form-row">
																								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " align="right">
																									<button class="btn btn-primary" type="submit">FACTURAR</button>
																								</div>
																							</div>
																						</form>	
																					</div>
																				</div>
																			</div>
																		</div>				

																	<!-- Modal CANCELAR ORDEN -->				
																	<div id="cancela<?php echo $row['idsertec'];?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
																		<div class="modal-dialog" role="document">
																			<div class="modal-content">
																				<div class="modal-header">
																					<h5 class="modal-title" id="exampleModalLabel">Cancelar Orden</h5>
																					<a href="#" class="close" data-dismiss="modal" aria-label="Close">
																							<span aria-hidden="true">&times;</span></a>
																				</div>
																				<div class="modal-body">
																					<p>Realmente desea cancelar la Orden: <b><?php echo $row["idsertec"]; ?> de <?php echo $row["Nombre"]; ?></b></p>
																				</div>
																				<div class="modal-footer">
																					<a href="abmsertec.php?sertec=<?php echo $row['idsertec'];?>&tipo=6"><button class="btn btn-success">SI</button></a>
																					<button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
																				</div>
																			</div>
																		</div>
																	</div>																			
											
											<?php	}
											 mysqli_close($link); ?>																													
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre</th>
                                                <th>Equipo</th>
                                                <th>Fecha Inicial</th>
                                                <th>Estado</th>
												<th>Acciones</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
</body>
 
</html>