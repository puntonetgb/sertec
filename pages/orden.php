<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../user/login.php");
    exit;
}

include ("../includes/config.php");


$ord = $_GET["idsertec"];
$cli = $_GET["idcliente"];

?>

<!doctype html>
<html lang="es_ES">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Orden de Servicio - SERTEC Datapoint Informàtica</title>
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
                            <h2 class="pageheader-title">Orden de Servicio <?php echo $ord;?></h2>
                            <p class="pageheader-text">Consulta de Orden de Servicio.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="../index.php" class="breadcrumb-link">Inicio</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Orden de Servicio</li>
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
						<?php
							$result = mysqli_query($link, "SELECT st.*,cli.idcliente, cli.Nombre, est.Estado, est.Color, est.idestado, 
							IF(te.Nombre is null, 'NO ASIGNADO', te.Nombre) as nomTecnico 
							FROM sertec st 
							INNER JOIN clientes cli ON (cli.idcliente=st.idcliente) 
							INNER JOIN estado est ON (est.idestado=st.Estado) 
					        LEFT OUTER JOIN tecnico te ON (te.idtecnico=st.tecnico) 
							WHERE idsertec=$ord");
							while ($row = mysqli_fetch_assoc($result)){?>	
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="card">
                                        <div class="card-header">									
											<h4 class="mb-0">Datos del Equipo</h4>
										</div>	
                                        <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <label for="firstName">Equipo <span class="<?php echo $row["Color"]; ?>"><?php echo $row["Estado"]; ?></span></label>
														<h4><?php echo $row["Equipo"]; ?></h4>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="lastName">Marca</label>
														<h4><?php echo $row["Marca"]; ?></h4>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="lastName">Accesorios</label>
														<h4><?php echo $row["Accesorio"]; ?></h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5 mb-5">
                                                        <label for="firstName">Descripción de Falla</label>
														<textarea class="form-control" id="falla" ="falla" rows="3"><?php echo $row["Descripcion"]; ?></textarea>
                                                    </div>
                                                    <div class="col-md-5 mb-5">
                                                        <label for="firstName">Resolución Tecnico: <?php echo $row["nomTecnico"]; ?></label>
														<textarea class="form-control" id="resolu" name="resolu" rows="3"><?php echo $row["Resolucion"]; ?></textarea>
                                                    </div>
                                                    <div class="col-md-2 mb-2">
                                                        <label for="firstName">Presupuesto</label>
														<h2>$<?php echo $row["Presupuesto"]; ?></h2>
                                                    </div>
                                                </div>									
						<?php } ?>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">									
                                            <h4 class="mb-0">Datos del Cliente</h4>
                                        </div>
                                        <div class="card-body">
                                                <div class="row">
												<?php
												$result = mysqli_query($link, "SELECT * FROM clientes WHERE idcliente=$cli");
												while ($row = mysqli_fetch_assoc($result)){?>	
                                                    <div class="col-md-4 mb-3">
                                                        <label for="firstName">Nombre</label>
														<h4><?php echo $row["Nombre"]; ?></h4>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="lastName">Contacto</label>
														<h4><?php echo $row["Celular"]; ?></h4>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="firstName">Email</label>
														<h4><?php echo $row["Email"]; ?></h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="firstName">Direccion</label>
														<h4><?php echo $row["Direccion"]; ?></h4>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label for="lastName">Cantidad Ordenes</label>
														<h4></h4>
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label for="lastName">Ultima Orden</label>
														<h4></h4>
                                                    </div>
                                                </div>
												<?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="d-flex justify-content-between align-items-center mb-0">
												
                                            </h4>
                                        </div>
                                        <div class="card-body">

                                        </div>
                                    </div>
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