<div class="header-content">
	<h2><i class="fa fa-list-alt"></i> Gestión de Planes de Clase</h2>
	<div class="breadcrumb-wrapper hidden-xs">
		<span class="label">Estas en:</span>
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="dashboard.html">Menú principal</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li class="active">Gestión de planes de clases</li>
		</ol>
	</div>
</div>

<div class="body-content animated fadeIn">
	<div class="row">
		<div class="col-md-12">
			<div class="panel rounded shadow no-overflow">
				<center>
					<div class="panel-heading btn btn-success btn-push" style="margin: 20px" onclick="nuevoPC()">
						<h3 class="panel-title">Registrar plan de clase</h3>
						<div class="clearfix"></div>
					</div>
				</center>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel rounded shadow no-overflow">
				<div class="panel-heading">
					<div class="pull-left">
						<h3 class="panel-title">Clases inscritas en el sistema</h3>
					</div>
					<div class="pull-right">
						<button class="btn btn-sm" data-container="body" data-action="collapse" data-toggle="tooltip" data-placement="top" data-title="Collapse" data-original-title="" title=""><i class="fa fa-angle-up"></i></button>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body no-padding" style="margin: 20px;font-size: 16px;" >
					<div class="table-responsive">
						<table id="tablaClase" class="table table-hover">
							<thead>
								<tr>
									<td>-</td>
									<td style="color: red;">Nombre clase</td>
									<td>Horario</td>
									<td>Cantidad Jugadores</td>
									<td style="text-align: center;">Acciones</td>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
					<br>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade bs-example-modal-lg" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><center>Registro de nuevas Clases</center></h4>
			</div>
			<div class="modal-body">
				<form id="registro" name="registro">
					<div id="DivAccionRegistrar">
						<div class="row">
							<div class="col-md-6 form-group">
								<label class="control-label">Nombre de la clase</label>
								<input class="form-control" placeholder="Ingrese un nombre para la clase" id="claseR" name="claseR" type="text">
							</div>
							<div class="col-md-6 form-group">
								<label class="control-label">Dia</label>
								<select class="form-control" id="diaR" name="diaR">
									<option value="" disabled selected>Seleccione un dia</option>
									<option value="Lunes">Lunes</option>
									<option value="Martes">Martes</option>
									<option value="Miercoles">Miercoles</option>
									<option value="Jueves">Jueves</option>
									<option value="Viernes">Viernes</option>
									<option value="Sabado">Sabado</option>
									<option value="Domingo">Domingo</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-group">
								<label class="control-label">Instructor <span style="color: red;">*</span></label>
								</div>
								<div class="col-md-3 form-group">
									<label class="control-label">Hora final</label>
									<div id="holota" class="input-group clockpicker">
										<input type="text" id="horainicioR" readonly name="horainicioR"  class="form-control" value="16:00">
										<span class="input-group-addon" style="color: green">
											<span class="glyphicon glyphicon-time"></span>
										</span>
									</div>
								</div>
								<div class="col-md-3 form-group">
									<label class="control-label">Hora final</label>
									<div id="holita" class="input-group clockpicker">
										<input type="text" id="horafinalR" readonly name="horafinalR"  class="form-control" value="16:45">
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-time" style="color: red"></span>
										</span>
									</div>
								</div>						
							</div>
							<div class="divider"></div>
							<div class="row">
								<center><button type="submit" class="btn btn-warning btn-expand" style="background-color: #2A2A2A;">Aplicar cambios</button></center>
							</div>
						</div>
					</form>
					<div class="divider" style="background: black"></div>
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<div class="col-md-6 form-group">
								<label class="control-label">Jugador <span style="color: red;">*</span></label>
								</div>
								<div class="divider" style="background: black"></div>
								<center><h4 style="background-color: rgba(0,0,0,0.4); padding: 5px; color: white;">Jugadores inscritos en esta clase</h4></center>
								<table id="tablaJugadorR" class="table table-hover">
									<thead>
										<tr>
											<td style="color: red;">Documento</td>
											<td>Nombre completo</td>
											<td style="text-align: center;">Eliminar</td>
										</tr>
									</thead>
									<tbody>

									</tbody>
								</table>
							</div>
							<div class="col-md-1"></div>
						</div>
					</div>
					<div class="modal-footer">
						<center>
							<button type="reset" class="btn btn-danger btn-expand" style="background-color: #2A2A2A;" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-success btn-expand" style="background-color: #2A2A2A;">Finalizar cambios en la clase</button>
						</center>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade bs-example-modal-lg" id="modalInfo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" >
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel"><center>Información de la clase</center></h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6 form-group">
								<label class="control-label">Nombre de la clase</label>
								<input class="form-control" id="claseR" name="claseR" type="text" disabled>
							</div>
							<div class="col-md-6 form-group">
								<label class="control-label">Dia</label>
								<select class="form-control" id="diaR" name="diaR" disabled>
									<option value="Lunes">Lunes</option>
									<option value="Martes">Martes</option>
									<option value="Miercoles">Miercoles</option>
									<option value="Jueves">Jueves</option>
									<option value="Viernes">Viernes</option>
									<option value="Sabado">Sabado</option>
									<option value="Domingo">Domingo</option>
								</select>
							</div>
						</div>
						<div class="row">
								<div class="col-md-3 form-group">
									<label class="control-label">Hora final</label>
									<div class="input-group">
										<input type="text" id="horainicioR" readonly name="horainicioR"  class="form-control" disabled>
										<span class="input-group-addon" style="color: green">
											<span class="glyphicon glyphicon-time"></span>
										</span>
									</div>
								</div>
								<div class="col-md-3 form-group">
									<label class="control-label">Hora final</label>
									<div class="input-group">
										<input type="text" id="horafinalR" readonly name="horafinalR"  class="form-control" disabled>
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-time" style="color: red"></span>
										</span>
									</div>
								</div>						
							</div>
							<div class="divider" style="background: black"></div>
							<div class="row">
								<div class="col-md-1"></div>
								<div class="col-md-10">
									<center><h4 style="background-color: rgba(0,0,0,0.4); padding: 5px; color: white;">Jugadores inscritos en esta clase</h4></center>
									<table id="tablaJugadorV" class="table table-hover">
										<thead>
											<tr>
												<td style="color: red;">Documento</td>
												<td>Nombre completo</td>
												<td style="text-align: center;">Eliminar</td>
											</tr>
										</thead>
										<tbody>

										</tbody>
									</table>
								</div>
								<div class="col-md-1"></div>
							</div>
						</div>
						<div class="modal-footer">
							<center>
								<button type="reset" class="btn btn-danger btn-expand" style="background-color: #2A2A2A;" data-dismiss="modal">Cerrar</button>
							</center>
						</div>
					</div>
				</div>
			</div>
