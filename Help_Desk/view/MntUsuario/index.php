<?php
  require_once("../../Config/conexion.php"); 
  if(isset($_SESSION["usu_id"])){ 
  
?>

<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php"); ?>
    <title>ResolveX::AdministrarUsuario</title>
<body class="with-side-menu">
	<?php require_once("../../view/MainHeader/header.php") ?>

	<div class="mobile-menu-left-overlay"></div>
	<?php require_once("../../view/MainNav/nav.php")?>

	<div class="page-content">
		<div class="container-fluid">
			<header class="section-header">
				
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Administrar Usuarios</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="../Home/">Home</a></li>
								<li class="active">	Administrar Usuarios</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
			<button type="button" id="btnnuevo" class="btn btn-rounded btn-inline btn-primary-outline">Nuevo usuario</button>
				<table id="usuario_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th style="width: 5%;" >Nombres</th>
							<th style="width: 15%;" >Apellidos</th>
							<th class="d-none d-sm-table-cell" style="width: 25%;" >Correo Electrónico</th>
							<th class="d-none d-sm-table-cell" style="width: 5%;" >Password</th>
							<th class="d-none d-sm-table-cell" style="width: 10%;" >Rol usuario</th>
							<th class="d-none d-sm-table-cell" style="width: 10%;" >Editar</th>
							<th class="text-center" style="width: 5%;" >Eliminar</th>							
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>

		</div>
	</div>
	<?php require_once("../../view/MntUsuario/modalmantenimiento.php") ?>
	<?php require_once("../../view/MntUsuario/modaleditar.php") ?>
    <?php require_once("../../view/MainJS/JS.php") ?>
	<script type="text/javascript" src="mtnusuario.js"></script>
</body>
</html>


<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>