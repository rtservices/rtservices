<div class="header-content">
	<h2>Responsables de <?= $nomJugador ?></h2>
	<div class="breadcrumb-wrapper hidden-xs">
		<span class="label">Estas en:</span>
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="menu">Menú principal</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<a href="persona">Gestión de personas</a> 
				<i class="fa fa-angle-right"></i>
			</li>
			<li class="active">
				<a href="#">Responsables de <?= $nomJugador ?></a>
			</li>
		</ol>
	</div>
</div>

<div class="body-content animated fadeIn">
	<div class="row">
		<div class="col-md-12">
			<div class="panel rounded shadow no-overflow">
				<div class="panel-heading">
					<center>
						<a href="persona"><button type="button" class="btn btn-success btn-expand" style="background-color: #2A2A2A;">Terminar edición</button></a>
					</center>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="panel rounded shadow no-overflow">
				<input type="hidden" name="idPersona" id="idPersona" value="<?= $idPersona ?>">
				<div class="panel-heading">
					<div class="pull-left">
						<h3 class="panel-title">Inscripción de responsables</h3>
					</div>
					<div class="pull-right">
						<button class="btn btn-sm" data-container="body" data-action="collapse" data-toggle="tooltip" data-placement="top" data-title="Collapse" data-original-title="" title=""><i class="fa fa-angle-up"></i></button>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body no-padding" style="margin: 20px; font-size: 15px">
					<form id="gResponsablesJugador" name="gResponsablesJugador">
						<input type="hidden" name="idJugador" id="idJugador" value="<?= $idJugador ?>">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-12">
										<center><small><p>Aquí se listan las personas que se encuentran activas y son mayores de edad según su fecha de nacimiento. Parentesco con el jugador al que desea asociar el responsable, cabe aclarar que el parentesco es en forma general.</p></small></center>
									</div>
									<div class="col-md-6 form-group">
										<center><label class="control-label">Documento - Nombre completo </label></center>
										<select id="idResponsable" name="idResponsable" class="chosen-select mb-16" placeholder="Seleccione una opción" value="">
											<option value="" disabled="true" selected="true">Seleccione una persona responsable</option>
											<?php foreach ($this->mdl_persona->selPersonas() as $valResponsable) { if (intval(substr((intval(str_replace('-', '', date('Y-m-d'))) - intval(str_replace('-', '', $valResponsable->FechaNacimiento))), 0,2)) > 18) { ?>
												<option value="<?= $valResponsable->IdPersona ?>"><?= $valResponsable->Documento ?> - <?= $valResponsable->Nombre.' '.$valResponsable->Apellidos ?></option>
												<?php }} ?>
											</select>
										</div>
										<div class="col-md-6 form-group">
											<center><label class="control-label">Parentesco </label></center>
											<select name="sResponsableParentesco"  id="sResponsableParentesco" class="chosen-select mb-15" tabindex="-1" style="display: none;">
												<option value="" selected="true" disabled="true">Seleccione un parentesco</option>
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
								</div>
								<div class="col-md-2"></div>
							</div>
							<br>
							<div class="row">
								<center><button type="submit" class="btn btn-success btn-expand" style="background-color: #2A2A2A;">Asignar responsable a <?= $nomJugador ?></button></center>
							</div>
						</form>
					</div>
					<br>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel rounded shadow no-overflow">
					<div class="panel-heading">
						<div class="pull-left">
							<h3 class="panel-title">Responsables asociados a <?= $nomJugador ?></h3>
						</div>
						<div class="pull-right">
							<button class="btn btn-sm" data-container="body" data-action="collapse" data-toggle="tooltip" data-placement="top" data-title="Collapse" data-original-title="" title=""><i class="fa fa-angle-up"></i></button>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-body no-padding" style="margin: 20px; font-size: 15px" >
						<div class="table-responsive">
							<table id="tablaJugadorResponsable" class="table table-hover">
								<thead>
									<tr>
										<td style="color: red;">Estado</td>
										<td>Responsable</td>
										<td>Parentesco</td>
										<td>Contacto</td>
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
	<!-- modalEditarResponsable -->

	<div class="modal fade bs-example-modal-lg" id="modalEditarResponsable" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form id="formEditarResponsable">
					<div style="width: 300px; height: 300px;" class="precarga" id="loadingRJ"></div>
					<div id="listoRJ">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel"><center>Edición de responsables</center></h4>
						</div>
						<div class="modal-body">
							<div class="row">
								<input type="hidden" name="eiIdResponsableJugador" id="eiIdResponsableJugador">
								<div class="col-md-2"></div>
								<div class="col-md-8">
									<div class="row">
										<div class="col-md-12">
											<center><small><p>Aquí se listan las personas que se encuentran activas y son mayores de edad según su fecha de nacimiento. Parentesco con el jugador al que desea asociar el responsable, cabe aclarar que el parentesco es en forma general.</p></small></center>
										</div>
										<div class="col-md-6 form-group">
											<center><label class="control-label">Documento - Nombre completo </label></center>
											<input type="text" disabled="true" name="ePersona"  id="ePersona" class="form-control" name="id">
										</div>
										<div class="col-md-6 form-group">
											<center><label class="control-label">Parentesco </label></center>
											<select name="eParentesco"  id="eParentesco" class="form-control">
												<option value="" disabled="true">Seleccione un parentesco</option>
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
												<option value="Autorizado">Autorizado</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
						</div>
						<div class="modal-footer">
							<center>
								<button type="submit" class="btn btn-warning btn-expand" style="background-color: #2A2A2A;">Modificar responsable</button>
								<button type="button" class="btn btn-info btn-expand" style="background-color: #2A2A2A;" data-dismiss="modal">Cerrar</button>
							</center>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
