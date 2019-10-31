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
    <title>Servicios - SERTEC Datapoint Informàtica</title>
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
                            <h2 class="pageheader-title">Servicios</h2>
                            <p class="pageheader-text">Alta, Baja y Modificación de Servicios.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="../index.php" class="breadcrumb-link">Inicio</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Servicios</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
				
                            <!-- Modal ALTA -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Alta de Servicio</h5>
                                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                                        </a>
                                        </div>
                                        <div class="modal-body">
											<form class="needs-validation" action="abmservicio.php?idservicio=0&tipo=1" method="post" novalidate>
												<div class="form-row">
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
														<label for="validationCustom01">Nombre</label>
														<input type="text" name="nombre" class="form-control" id="validationCustom01" required>
														<div class="valid-feedback">
															Bien!
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-6">
														<label for="validationCustom03">Precio</label>
														<input type="number" class="form-control" name="precio" id="validationCustom03" required>
														<div class="invalid-feedback">
															Por favor ingresa un precio.
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-6">
														  <div class="form-group">
															<label for="exampleFormControlSelect1">Grupo</label>
															<select class="form-control" id="grupo" name="grupo">
															  <option>Mantenimiento</option>
															  <option>Instalacion</option>
															  <option>Actualizacion</option>
															  <option>Otro</option>
															</select>
														  </div>
														<div class="invalid-feedback">
															Selecciona un Grupo.
														</div>
													</div>
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
														<button class="btn btn-primary" type="submit">Agregar</button>
													</div>
												</div>
											</form>
                                        </div>
                                    </div>
                                </div>
                            </div>					
				
				<div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">					
                            <div class="card-header d-flex"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Nuevo Servicio
                            </a>
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
                                                <th>Precio</th>
                                                <th>Grupo</th>
												<th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody class="buscar">
											<?php
											$result = mysqli_query($link, "SELECT * FROM servicios ORDER BY Nombre");
											while ($row = mysqli_fetch_assoc($result)){?>

															<tr><td><center><?php echo $row["idservicio"]; ?></center></td>
															<td><?php echo $row["Nombre"]; ?></td>
															<td>$ <?php echo $row["Precio"]; ?></td>
															<td><?php echo $row["Grupo"]; ?></td>
															<td><button type="button" class="btn btn-xs btn-outline-light" data-toggle="modal" data-target="#edit<?php echo $row['idservicio'];?>"><i class="far fa-edit"></i></button> 
																<button type="button" class="btn btn-xs btn-outline-light" data-toggle="modal" data-target="#elimina<?php echo $row['idservicio'];?>"><i class="far fa-trash-alt"></i></button></td></tr>
											
											
																<!-- Modal ELIMINAR -->				
																<div id="elimina<?php echo $row['idservicio'];?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																			<div class="modal-header">
																				<h5 class="modal-title" id="exampleModalLabel">Eliminar Servicio</h5>
																				<a href="#" class="close" data-dismiss="modal" aria-label="Close">
																						<span aria-hidden="true">&times;</span></a>
																			</div>
																			<div class="modal-body">
																				<p>Realmente desea eliminar: <b><?php echo $row["Nombre"]; ?></b></p>
																			</div>
																			<div class="modal-footer">
																				<a href="abmservicio.php?idservicio=<?php echo $row['idservicio'];?>&tipo=3"><button class="btn btn-success" data-href="abmservicio.php?idservicio=<?php echo $row['idservicio'];?>&tipo=3">SI</button></a>
																				<button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
																			</div>
																		</div>
																	</div>
																</div>	

																<!-- Modal EDITAR -->
																<div id="edit<?php echo $row['idservicio'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																			<div class="modal-header">
																				<h5 class="modal-title" id="edit">Edición de Servicio</h5>
																				<a href="#" class="close" data-dismiss="modal" aria-label="Close">
																						<span aria-hidden="true">&times;</span>
																											</a>
																			</div>
																			<div class="modal-body">
																				<form action="abmservicio.php?idservicio=<?php echo $row['idservicio'];?>&tipo=2" method="post" novalidate>
																					<div class="form-row">
																						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
																							<label for="validationCustom01">Nombre</label>
																							<input type="text" name="nombre" class="form-control" value="<?php echo $row['Nombre'];?>">
																							<div class="valid-feedback">
																								Bien!
																							</div>
																						</div>
																					</div>
																					<div class="form-row">
																						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-6 ">
																							<label for="validationCustom02">Precio</label>
																							<input type="number" data-parsley-type="email" name="precio" class="form-control" value="<?php echo $row['Precio'];?>">
																							<div class="valid-feedback">
																								Bien!
																							</div>
																						</div>
																						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-6">
																							  <div class="form-group">
																								<label for="exampleFormControlSelect1">Grupo</label>
																								<select class="form-control" id="grupo" name="grupo" value="<?php echo $row['Grupo'];?>">
																								  <option>Mantenimiento</option>
																								  <option>Instalacion</option>
																								  <option>Actualizacion</option>
																								  <option>Otro</option>
																								</select>
																							  </div>
																							<div class="invalid-feedback">
																								Seleccion un Grupo.
																							</div>
																						</div>
																						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
																							<button class="btn btn-primary" type="submit">Modificar</button>
																						</div>
																					</div>
																				</form>
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
                                                <th>Precio</th>
                                                <th>Grupo</th>
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