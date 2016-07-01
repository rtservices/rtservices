<div class="header-content">
	<h2><i class="fa fa-trophy"></i> Gestión de torneos</h2>
	<div class="breadcrumb-wrapper hidden-xs">
		<span class="label">Estas en:</span>
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="dashboard.html">Menú principal</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li class="active">Gestión de torneos</li>
		</ol>
	</div>
</div>

<div class="body-content animated fadeIn">
	<div class="row">
		<div class="col-md-12">
			<div class="panel rounded shadow no-overflow">
				<center>
					<div class="panel-heading btn btn-success btn-push" style="margin: 20px" onclick="nuevaPersona()">
						<h3 class="panel-title">Registrar nuevo torneo</h3>
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
						<h3 class="panel-title">Torneos inscritos en el sistema</h3>
					</div>
					<div class="pull-right">
						<button class="btn btn-sm" data-container="body" data-action="collapse" data-toggle="tooltip" data-placement="top" data-title="Collapse" data-original-title="" title=""><i class="fa fa-angle-up"></i></button>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body no-padding" style="margin: 20px; font-size: 15px" >
					<div class="table-responsive">
						<table id="tablaTorneo" class="table table-hover">
							<thead>
								<tr>
									<td>-</td>
									<td style="color: red;">Nombre del torneo</td>
									<td>Fecha</td>
									<td style="text-align: center;">Etapas</td>
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

<div class="modal fade bs-example-modal-lg" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="cuenta" name="cuenta">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><center>Gestion de cuenta</center></h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<form id="">
								<div class="col-md-12 form-input">
									<label class="control-label">Nombre de usuario</label>
									<input class="form-control" id="usuario" name="usuario" type="text" style="center">
								</div>
								<div class="divider"></div>
								<div class="form-group">
									<center>
										<button type="reset" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
										<button type="button" class="btn btn-success" style="background-color: #81B71A">Registrar usuario</button>
									</center>
								</div>
							</form>
							<div class="col-md-6 form-input">
								<label class="control-label">Contraseña</label>
								<input class="form-control" name="documento" type="text" style="center">
							</div>
							<div class="col-md-6 form-input">
								<label class="control-label">Confirme </label>
								<input class="form-control" id="nombre" name="nombre" type="text">
							</div>
							
							<div class="col-md-6 form-input">
								<label class="control-label">Apellidos</label>
								<input class="form-control" id="apellido" name="apellido" type="text">
							</div>
							<div class="col-md-6 form-input">
								<label class="control-label"></label>
								<input class="form-control" id="nombre" name="nombre" type="text">
							</div>
						</div>
						<div class="col-md-1"></div>
					</div>
				</div>
				<div class="modal-footer">
					<center>
						<button type="reset" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<button type="button" class="btn btn-success" style="background-color: #81B71A">Registrar usuario</button>
					</center>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade bs-example-modal-lg" id="modalEtapa" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="registro" name="registro">
				<input type="hidden" id="idetapa" name="idetapa">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><center><span id="titulo"></span></center></h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<div class="row">
								<div class="col-md-6 form-input">
									<label class="control-label">Fecha de inicio</label>
									<input class="form-control" id="finicio" name="finicio" type="date" min="<?= date("Y").'-01-01' ?>" max="<?= date("Y").'-12-31' ?>">
								</div>
								<div class="col-md-6 form-input">
									<label class="control-label">Fecha de fin</label>
									<input class="form-control" id="ffin" name="ffin" type="date" min="<?= date("Y").'-01-01' ?>" max="<?= date("Y").'-12-31' ?>">
								</div>
							</div>
							<div class="row" style="margin-top: 10px;"></div>
							<div class="clearfix"></div>
						</div>
						<div class="col-md-1"></div>
					</div>
					<div class="row" style="margin-top: 10px;">
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingOne">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											<i class="fa fa-user-plus"></i> - Inscribir nuevos jugadores
										</a>
									</h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
									<div class="panel-body">
										<select id="persona" name="persona" data-placeholder="Seleccione una eps" class="chosen-select mb-15" tabindex="-1" style="display: none;">
											<option value="" disabled selected>Seleccione un jugador</option>';
											<?php foreach ($jugadoresnoinscritos as $jni) { ?>
											<option value="<?= $jni->IdPersona ?>"><?= 'DNI: '.$jni->Documento.' - '.$jni->Nombre.' '.$jni->Apellidos ?></option>';
											<?php }?>
										</select>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingTwo">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
											<i class="fa fa-list"></i> - Jugadores inscritos
										</a>
									</h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
									<div class="panel-body">
										<table id="tablaInscritos" class="table table-hover" style="font-size: 18px;">
											<thead>
												<tr>
													<th>Categoria</th>
													<th>Documento</th>
													<th>Jugador</th>
													<th>Acciones</th>
												</tr>
											</thead>
											<tbody>

											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="heading">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
											<i class="fa fa-square-o"></i> - Cuadros generados
										</a>
									</h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading">
									<div class="panel-body">
									<h1>a la puta mierda</h1>
										<div id"cuadrosGenerados">
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<center>
						<button type="reset" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-success" style="background-color: #81B71A">Guardar cambios</button>
					</center>
				</div>
			</form>
		</div>
	</div>
</div>
