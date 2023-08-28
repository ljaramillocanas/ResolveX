<?php
  require_once("../../Config/conexion.php"); 
  if(isset($_SESSION["usu_id"])){ 
  
?>

<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php"); ?>
    <title>Detalle Ticket</title>
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
							<h3 id="lblidticket"> </h3>
              <span  id="lblestado"></span>
              <span class="label label-pill label-primary" id="lblnomusuario"></span>
              <span class="label label-pill label-info" id="lblfechcrea"></span>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="../ConsultarTicket/index.php">Home</a></li>
								<li class="active">	Detalle Ticket </li>
							</ol>
						</div>
					</div>
				</div>
			</header>

      <div class="box-typical box-typical-padding">
          <div class="row">

              <div class="col-lg-6">
                <fieldset class="form-group">
                  <label class="form-label semibold" for="cat_nom">Categoria</label>
                  <input type="text" class="form-control" id="cat_nom" name="cat_nom" readonly>
                </fieldset>
              </div>

              <div class="col-lg-6">
                <fieldset class="form-group">
                  <label class="form-label semibold" for="tick_titulo">Titulo</label>
                  <input type="text" class="form-control" id="tick_titulo" name="tick_titulo" readonly>
                </fieldset>
              </div>

              <div class="col-lg-12">
							<fieldset class="form-group">
								<label class="form-label semibold" for="tickd_descripcionDet">Descripcion</label>
								<div class="summernote-theme-1" >
									<textarea id="tickd_descripcionDet" class="summernote" name="tickd_descripcionDet" readonly></textarea>
								</div>
							</fieldset>
						</div>

          </div>
      </div>


      <section class="activity-line" id="lbldetalle">
		
			</section>

      <div class="box-typical box-typical-padding" id="pnldetalle">
			<div class="row">						
				 	<div class="col-lg-12">
						<fieldset class="form-group">
							<label class="form-label semibold" for="tickd_descripcion">Ingresar Comentario</label>
							<div class="summernote-theme-1" >
								<textarea id="tickd_descripcion" class="summernote" name="tickd_descripcion"></textarea>
							</div>
						</fieldset>
					</div>
					<div class="col-lg-12">
						<button type="button" id="btnenviar" class="btn btn-rounded btn-inline btn-primary"><font style="vertical-align: inherit;">Guardar</font></button>
              			<button type="button" id="btncerrar" class="btn btn-rounded btn-inline btn-danger"><font style="vertical-align: inherit;">Cerrar Ticket</font></button>
					</div>
				</div>
			</div>
		</div>
	</div>


    <?php require_once("../../view/MainJS/JS.php") ?>
	
    <script type="text/javascript" src="detalleticket.js"></script>

</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>