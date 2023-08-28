<div id="modalEditar" class="modal fade bd-example-modal-lg"
		tabindex="-1"
		role="dialog"
		aria-labelledby="myLargeModalLabel"
		aria-hidden="true">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
					<i class="font-icon-close-2"></i>
				</button>
				<h4 class="modal-title" id="mdltitulo"></h4>
			</div>
			<form method="post" id="Editar_form">
				<div class="modal-body">

					<input type="hidden" id="usu_idE" name="usu_idE">

					<div class="form-group">
						<label class="form-label" for="usu_nom">Nombre</label>
						<input type="text" class="form-control" id="usu_nomE" name="usu_nomE" placeholder="Ingrese nombres" value="">
					</div>
					<div class="form-group">
						<label class="form-label" for="usu_ape">Apellido</label>
						<input type="text" class="form-control" id="usu_apeE" name="usu_apeE" placeholder="Ingrese Apellidos" value="">
					</div>
					<div class="form-group">
						<label class="form-label" for="usu_correo">Correo elecrónico</label>
						<input type="email" class="form-control" id="usu_correoE" name="usu_correoE" placeholder="Ingrese nombres" value="ejemplo@resolvex.com">
					</div>
					<div class="form-group">
						<label class="form-label" for="usu_pass">Password</label>
						<input type="password" class="form-control" id="usu_passE" name="usu_passE" placeholder="Ingrese nombres" value="">
					</div>

					<div>
						<label class="form-label" for="rol_id">Rol</label>
						<select class="select2" id="rol_idE" name="rol_idE">
							<option value="1">Usuario</option>
							<option value="2">Soporte</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" name="action" value="add"  class="btn btn-rounded btn-primary">Guardar</button>
					
				</div>
			</form>
		</div>
	</div>
</div>