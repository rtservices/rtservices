<div class="header-content">
	<h2><i class="fa fa-list-alt"></i> Gestión de personas <span>Modo <?php foreach ($this->mdl_login->cargarUsuario() as $us) { echo $us->NombreRol; break;} ?></span></h2>
	<div class="breadcrumb-wrapper hidden-xs">
		<span class="label">Estas en:</span>
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="dashboard.html">Menú principal</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li class="active">Gestión de personas</li>
		</ol>
	</div>
</div>

<div class="body-content animated fadeIn">
	<div class="row">
		<div class="col-md-12">
			<div class="panel rounded shadow no-overflow">
				<center>
					<div class="panel-heading btn btn-success btn-push" style="margin: 20px" onclick="nuevaPersona()">
						<h3 class="panel-title">Registrar personas nuevas</h3>
						<div class="clearfix"></div>
					</div>
				</center>
			</div>
		</div>
	</div>

	<!-- <?php echo substr(date('Ymd') - (19580422), 0,2); ?> -->

	<div class="row">
		<div class="col-md-12">
			<div class="panel rounded shadow no-overflow">
				<div class="panel-heading">
					<div class="pull-left">
						<h3 class="panel-title">Personas inscritas en el sistema</h3>
					</div>
					<div class="pull-right">
						<button class="btn btn-sm" data-container="body" data-action="collapse" data-toggle="tooltip" data-placement="top" data-title="Collapse" data-original-title="" title=""><i class="fa fa-angle-up"></i></button>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body no-padding" style="margin: 20px; font-size: 15px" >
					<div class="table-responsive">
						<table id="tablaPersona" class="table table-hover">
							<thead>
								<tr>
									<td>-</td>
									<td style="color: red;">Documento</td>
									<td>Nombre completo</td>
									<td style="text-align: center;">Roles utilizados</td>
									<td style="text-align: center;">Cuenta</td>
									<td style="text-align: center;">Acciones</td>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade bs-example-modal-lg" id="modalCuenta" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><center>Gestion de cuenta</center></h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="row">
							<h4 style="text-align: center;">Modificar nombre de usuario</h4>
							<form id="formUsuario">
								<input type="hidden" id="idusuarioU" name="idusuarioU">
								<div class="row">
									<div class="col-md-12 form-group">
										<label class="control-label">Nombre de usuario</label>
										<input class="form-control" id="usuario" name="usuario" type="text" style="center">
									</div>
								</div>
								<div class="row">
									<div class="form-group" style="margin-top: 10px;">
										<center>
											<button type="submit" class="btn btn-info btn-expand" style="background-color: #2A2A2A;">Modificar nombre de usuario</button>
										</center>
									</div>
								</div>
							</form>
						</div>
						<div class="divider"></div>
						<div class="row">
							<h4 style="text-align: center;">Modificar contraseña</h4>
							<form id="formClave">
								<input type="hidden" id="idusuarioC" name="idusuarioC">
								<div class="row">
									<div class="col-md-6 form-group">
										<label class="control-label">Nueva contraseña</label>
										<input class="form-control" id="clave" name="clave" type="password" style="center">
									</div>
									<div class="col-md-6 form-group">
										<label class="control-label">Confirma nueva contraseña</label>
										<input class="form-control" id="repiteclave" name="repiteclave" type="password" style="center">
									</div>
								</div>
								<div class="row">
									<div class="form-group" style="margin-top: 10px;">
										<center>
											<button type="submit" class="btn btn-warning btn-expand" style="background-color: #2A2A2A;">Modificar contraseña</button>
										</center>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
			<div class="modal-footer">
				<center>
					<button type="reset" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				</center>
			</div>
		</div>
	</div>
</div>

<div class="modal fade bs-example-modal-lg" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="registro" name="registro">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><center>Registro de nuevas personas</center></h4>
					<center><small>Campos con <span style="color: red;">*</span> son requeridos.</small></center>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<div class="row">
								<div class="col-md-6 form-group">
									<label class="control-label">Numero de documento <span style="color: red;">*</span></label>
									<input class="form-control" id="documento" name="documento" type="text">
								</div>
								<div class="col-md-6 form-group">
									<label class="control-label">Genero <span style="color: red;">*</span></label>
									<select class="form-control" id="genero" name="genero">
										<option value="" selected disabled>Seleccione un género</option>
										<option value="H">Hombre</option>
										<option value="M">Mujer</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 form-group">
									<label class="control-label">Nombre(s) <span style="color: red;">*</span></label>
									<input class="form-control" id="nombre" name="nombre" type="text">
								</div>
								<div class="col-md-6 form-group">
									<label class="control-label">Apellidos <span style="color: red;">*</span></label>
									<input class="form-control" id="apellidos" name="apellidos" type="text">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 form-group">
									<label class="control-label">Correo electrónico <span style="color: red;">*</span></label>
									<input class="form-control" id="correo" name="correo" type="text">
								</div>
								<div class="col-md-6 form-group">
									<label class="control-label">Dirección de residencia <span style="color: red;">*</span></label>
									<input class="form-control" id="direccion" name="direccion" type="text">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 form-group">
									<label class="control-label">Teléfono fijo <span style="color: red;">*</span></label>
									<input class="form-control" id="telefono" name="telefono" type="text">
								</div>
								<div class="col-md-6 form-group">
									<label class="control-label">Teléfono celular</label>
									<input class="form-control" id="celular" name="celular" type="text">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 form-group">
									<label class="control-label">Eps <span style="color: red;">*</span></label>
									<select id="eps" name="eps" data-placeholder="Seleccione una eps" class="chosen-select mb-15" tabindex="-1" style="display: none;">
										<option value="" disabled selected>Seleccione una eps</option>';
										<?php foreach ($this->mdl_persona->listarEps() as $eps) { ?>
										<option value="<?= $eps->IdEps ?>"><?= $eps->NombreEps ?></option>';
										<?php }?>
									</select>
								</div>
								<div class="col-md-6 form-group">
									<label class="control-label">Fecha de nacimiento <span style="color: red;">*</span></label>
									<input class="form-control" id="fnacimiento" name="fnacimiento" type="date" min="1930-01-01" value="2000-01-01" max="<?= date("Y")-5 ?>-12-31">
								</div>
							</div>
						</div>
						<div class="col-md-1"></div>
					</div>
				</div>
				<div class="modal-footer">
					<center>
						<button type="reset" class="btn btn-danger btn-expand" style="background-color: #2A2A2A;"data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-success btn-expand" style="background-color: #2A2A2A;">Registrar persona</button>
					</center>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade bs-example-modal-lg" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="editar" name="editar">
				<input type="hidden" id="idpersona" name="idpersona">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><center>Modificar persona</center></h4>
					<center><small>Campos con <span style="color: red;">*</span> son requeridos.</small></center>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<div class="row">
								<div class="col-md-6 form-group">
									<label class="control-label">Numero de documento <span style="color: red;">*</span></label>
									<input class="form-control" id="documentoM" name="documentoM" type="text">
								</div>
								<div class="col-md-6 form-group">
									<label class="control-label">Genero <span style="color: red;">*</span></label>
									<select class="form-control" id="generoM" name="generoM">
										<option value="" selected disabled>Seleccione su genero</option>
										<option value="H">Hombre</option>
										<option value="M">Mujer</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 form-group">
									<label class="control-label">Nombre(s) <span style="color: red;">*</span></label>
									<input class="form-control" id="nombreM" name="nombreM" type="text">
								</div>
								<div class="col-md-6 form-group">
									<label class="control-label">Apellidos <span style="color: red;">*</span></label>
									<input class="form-control" id="apellidosM" name="apellidosM" type="text">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 form-group">
									<label class="control-label">Correo electrónico <span style="color: red;">*</span></label>
									<input class="form-control" id="correoM" name="correoM" type="text">
								</div>
								<div class="col-md-6 form-group">
									<label class="control-label">Dirección de residencia <span style="color: red;">*</span></label>
									<input class="form-control" id="direccionM" name="direccionM" type="text">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 form-group">
									<label class="control-label">Teléfono fijo <span style="color: red;">*</span></label>
									<input class="form-control" id="telefonoM" name="telefonoM" type="text">
								</div>
								<div class="col-md-6 form-group">
									<label class="control-label">Teléfono celular</label>
									<input class="form-control" id="celularM" name="celularM" type="text">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 form-group">
									<label class="control-label">Eps <span style="color: red;">*</span></label>
									<select class="form-control" id="epsM" name="epsM">
										<option value="" disabled>Seleccione una eps</option>
										<?php foreach ($this->mdl_persona->listarEps() as $eps) { ?>
										<option value="<?= $eps->IdEps ?>"><?= $eps->NombreEps ?></option>';
										<?php }?>
									</select>
								</div>
								<div class="col-md-6 form-group">
									<label class="control-label">Fecha de nacimiento <span style="color: red;">*</span></label>
									<input class="form-control" id="fnacimientoM" name="fnacimientoM" type="date" min="1930-01-01" max="<?= date("Y")-5 ?>-12-31">
								</div>
							</div>
						</div>
						<div class="col-md-1"></div>
					</div>
				</div>
				<div class="modal-footer">
					<center>
						<button type="reset" class="btn btn-danger btn-expand" style="background-color: #2A2A2A;"data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-info btn-expand" style="background-color: #2A2A2A;">Modificar persona</button>
					</center>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade bs-example-modal-lg" id="modalInformacion" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><center>Información de <span id="nombreCI"></span></center></h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="row">
							<div class="row">
								<center>
									<h5>Fecha de inscripción - <span id="fechaI"></span></h5>
								</center>
							</div>
							<div class="divider"></div>
							<div class="row">
								<div class="col-md-3" style="text-align: center;">
									<label title="Documento nacional de identificación">
										<i class="fa fa-hashtag"></i> - Documento 
									</label>
									<br>
									<span id="documentoI"></span>
								</div>
								<div class="col-md-5" style="text-align: center;">
									<label title="Nombres y apellidos">Nombre(s) y Apellidos</label>
									<br>
									<span id="nombreI"></span>
								</div>
								<div class="col-md-2" style="text-align: center;">
									<label title="Genero"><i class="fa fa-venus-mars"></i> - Genero</label>
									<br>
									<span id="generoI"></span>
								</div>
								<div class="col-md-2" style="text-align: center;">
									<label title="Genero"><i class="fa fa-calendar"></i> - Nacimiento</label>
									<br>
									<span id="fnacimientoI"></span>
								</div>
							</div>
						</div>
						<div class="divider"></div>
						<div class="row">
							<div class="col-md-6" style="text-align: center;">
								<label title="Correo electrónico">
									<i class="fa fa-at"></i> - Correo electrónico
								</label>
								<br>
								<span id="correoI"></span>
							</div>
							<div class="col-md-6" style="text-align: center;">
								<label title="Dirección de residencia"><i class="fa fa-home"></i> - Dirección de residencia</label>
								<br>
								<span id="direccionI"></span>
							</div>
						</div>
						<div class="divider"></div>
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-4" style="text-align: center;">
								<label title="Teléfono fijo">
									<i class="fa fa-phone"></i> - Telefono fijo
								</label>
								<br>
								<span id="telefonoI"></span>
							</div>
							<div class="col-md-4" style="text-align: center;">
								<label title="Teléfono celular">
									<i class="fa fa-mobile"></i> - Celular
								</label>
								<br>
								<span id="celularI"></span>
							</div>	
							<div class="col-md-2"></div>
						</div>
						<div class="divider"></div>
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6" style="text-align: center;">
								<label title="Eps asociada">
									<i class="fa fa-hospital-o"></i> - Eps
								</label>
								<br>
								<span id="epsI"></span>
							</div>	
							<div class="col-md-3"></div>
						</div>
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
			<div class="modal-footer">
				<center>
					<button type="button" class="btn btn-info btn-expand" style="background-color: #2A2A2A;"data-dismiss="modal">Cerrar</button>
				</center>
			</div>
		</div>
	</div>
</div>

<div class="modal fade bs-example-modal-lg" id="modalResponsable" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><center>Gestion de responsables - <span id="nombrejugador"></span></center></h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="row">
							<h4 style="text-align: center;">Información de jugador</h4>
							<input type="hidden" id="idusuarioU" name="idusuarioU">
							<div class="row">
								<div class="col-md-12 form-group">
									<center><label class="control-label">Dni - Nombre completo</label></center>
									<input class="form-control" readonly id="infojugador" name="infojugador" type="text" style="text-align: center;">
								</div>
								<div id="divNot"></div>
							</div>
						</div>
						<div class="divider"></div>
						<div class="row">
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingOne">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
												Nuevo responsable
											</a>
										</h4>
									</div>
									<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
										<div class="panel-body">
											<form id="formResponsable" name="formResponsable">
												<input type="hidden" id="idjugadorR" name="idjugadorR">
												<div class="row">
													<div class="col-md-6 form-group">
														<select data-placeholder="Seleccione una jugador" name="slResponsable"  id="slResponsable" class="chosen-select mb-15" tabindex="-1" style="display: none;">
															<?php foreach ($this->mdl_persona->listarResponsableCombo() as $jugador) { ?>
															<option value="<?= $jugador->IdPersona ?>">Dni <?= $jugador->Documento.' - '.$jugador->Nombre.' '.$jugador->Apellidos ?></option>
															<?php } ?>
														</select>
													</div>
													<div class="col-md-6 form-group">
														<select data-placeholder="Seleccione un parentesco" name="slRRol"  id="slRRol" class="chosen-select mb-15" tabindex="-1" style="display: none;">
															<option value="Padre">Padre</option>
															<option value="Madre">Madre</option>
															<option value="Hermano">Hermano</option>
															<option value="Hermana">Hermana</option>
															<option value="Tio">Tio</option>
															<option value="Tia">Tia</option>
															<option value="Abuelo">Abuelo</option>
															<option value="Abuela">Abuela</option>
															<option value="Primo">Primo</option>
															<option value="Prima">Prima</option>
															<option value="Otro">Otro</option>
														</select>
													</div>
												</div>
												<div class="row">
													<div class="form-group" style="margin-top: 10px;">
														<center>
															<button type="submit" class="btn btn-warning btn-expand" style="background-color: #2A2A2A;">Asignar responsable a <span id="nombre"></span></button>
														</center>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingTwo">
										<h4 class="panel-title">
											<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
												Consultar responsales de <span id="NombreJug"></span>
											</a>
										</h4>
									</div>
									<div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
										<div class="panel-body">
											<div class="row">
												<table id="tablaResponsable" class="table table-hover">
													<thead>
														<tr>
															<th>-</th>
															<th style="color: red;">Documento</th>
															<th>Nombre completo</th>
															<th>Contacto</th>
															<th style="text-align: center;">Acciones</th>
														</tr>
													</thead>
													<tbody>

													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
			<div class="modal-footer">
				<center>
					<button type="reset" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				</center>
			</div>
		</div>
	</div>
</div>