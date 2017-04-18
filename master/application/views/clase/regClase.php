<div class="header-content">
	<h2>Registro de clases</h2>
	<div class="breadcrumb-wrapper hidden-xs">
		<span class="label">Estas en:</span>
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="<?= base_url() ?>menu">Menú principal</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<a href="<?= base_url() ?>clase">Registro de clases</a> 
				<i class="fa fa-angle-right"></i>
			</li>
			<li class="active">
				<a href="#"></a>
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
						<a href="clase"><button type="button" class="btn btn-success btn-expand" style="background-color: #2A2A2A;">Terminar edición</button></a>
					</center>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel rounded shadow no-overflow">
				<div class="panel-heading">
					<div class="pull-left">
						<h3 class="panel-title">Información de la clase</h3>
					</div>
					<div class="pull-right">
						<button class="btn btn-sm" data-container="body" data-action="collapse" data-toggle="tooltip" data-placement="top" data-title="Collapse" data-original-title="" title=""><i class="fa fa-angle-up"></i></button>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body no-padding" style="margin: 20px; font-size: 15px">
					<form id="gClaseR" name="gClaseR">
						<input type="hidden" name="idClaseActualR" id="idClaseActualR">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-6 form-group">
										<label class="control-label">Nombre de la clase</label>
										<input id="nombreClase" name="nombreClase" class="form-control" type="text" style="text-align: center;">
									</div>
									<div class="col-md-6 form-group">
										<label class="control-label">Día </label>
										<select id="diaClase" name="diaClase" class="form-control">
											<option  value="Lunes">Lunes</option>
											<option value="Martes">Martes</option>
											<option  value="Miercoles">Miércoles</option>
											<option  value="Jueves">Jueves</option>
											<option  value="Viernes">Viernes</option>
											<option value="Sabado">Sábado</option>
											<option value="Domingo">Domingo</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 form-group">
										<label class="control-label">Hora inicio</label>
										<div class="input-group clockpicker">
											<input type="text" id="horaInicio" readonly name="horaInicio"  class="form-control">
											<span class="input-group-addon" style="color: green">
												<span class="glyphicon glyphicon-time"></span>
											</span>
										</div>
									</div>
									<div class="col-md-6 form-group">
										<label class="control-label">Hora final</label>
										<div class="input-group clockpicker">
											<input type="text" id="horaFin" readonly name="horaFin"  class="form-control">
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-time" style="color: red"></span>
											</span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 form-group">
										<label class="control-label">Instructor encargado</label>
										<select id="instructorClase" name="instructorClase" data-placeholder="Instructor" class="chosen-select mb-15" tabindex="-1" style="display: none;">
											<option value="" disabled>Seleccione un instructor</option>
											<?php foreach ($this->mdl_clase->listarInstructores() as $ins) { ?>
											<option value="<?= $ins->IdPersonaRol ?>"><?= $ins->Documento.'-'.$ins->Nombre.' '.$ins->Apellidos ?></option>';
											<?php }?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-2"></div>
						</div>
						<br>
						<div class="row">
							<center><button type="submit" class="btn btn-warning btn-expand" style="background-color: #2A2A2A;">Registrar clase</button></center>
						</div>
					</form>
				</div>
				<br>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel rounded shadow no-overflow">
				<div class="panel-heading">
					<div class="pull-left">
						<h3 class="panel-title">Inscripción de jugadores a la clase</h3>
					</div>
					<div class="pull-right">
						<button class="btn btn-sm" data-container="body" data-action="collapse" data-toggle="tooltip" data-placement="top" data-title="Collapse" data-original-title="" title=""><i class="fa fa-angle-up"></i></button>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body no-padding" style="margin: 20px; font-size: 15px">
					<form id="registroJugadorC" name="registroJugadorC">
						<input type="hidden" name="idClaseActual" id="idClaseActual" >
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-12">
										<center><small><p>Aquí solo se cargaran los jugadores que tengan un plan de clases activo, la gestión de cada plan de clase se hace respectivamente en la sección 'Plan de clases' definida en el menú como la tercera opción en el apartado de clases.</p></small></center>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 form-group">
										<center><label class="control-label">Documento - Nombre completo </label></center>
										<select id="selPlanJugador" name="selPlanJugador" class="chosen-select mb-16" placeholder="Seleccione una opción">
											<?php 
											foreach ($this->mdl_clase->selJugadorPlan() as $valJugador)
											{ 
												?>
												<option value="<?= $valJugador->IdPlanClase ?>"><?= $valJugador->Documento ?> - <?= $valJugador->Nombre.' '.$valJugador->Apellidos ?></option>
												<?php 
											} 
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-2"></div>
						</div>
						<br>
						<div class="row">
							<center><button type="submit" class="btn btn-success btn-expand" style="background-color: #2A2A2A;">Asignar jugador a esta clase</button></center>
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
						<h3 class="panel-title">Jugadores inscritos en esta clase</h3>
					</div>
					<div class="pull-right">
						<button class="btn btn-sm" data-container="body" data-action="collapse" data-toggle="tooltip" data-placement="top" data-title="Collapse" data-original-title="" title=""><i class="fa fa-angle-up"></i></button>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body no-padding" style="margin: 20px; font-size: 15px" >
					<div class="table-responsive">
						<table id="tablaJugadorClase" class="table table-hover">
							<thead>
								<tr>
									<td style="color: red;">Documento</td>
									<td>Nombre completo</td>
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
