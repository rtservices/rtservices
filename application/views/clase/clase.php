<div class="header-content">
	<h2><i class="fa fa-list-alt"></i> Gestión de Clases</h2>
	<div class="breadcrumb-wrapper hidden-xs">
		<span class="label">Estas en:</span>
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="<?= base_url() ?>menu">Menú principal</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li class="active">Gestión de clases</li>
		</ol>
	</div>
</div>

<div class="body-content animated fadeIn">
	<div class="row">
		<div class="col-md-12">
			<div class="panel rounded shadow no-overflow">
				<center>
					<div class="panel-heading btn btn-success btn-push" style="margin: 20px" onclick="nuevaC()">
						<a style="text-decoration:none; color:white;"><h3 class="panel-title">Registrar Clases </h3></a>
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
									<td>Cantidad jugadores</td>
									<td>Instructor</td>
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
			<form id="registroC" name="registroC">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><center>Registro de clases</center></h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
								<div class="row">
									<div class="col-md-6 form-group">
										<label class="control-label">Nombre de la clase</label>
										<input id="nombreClaseR" name="nombreClaseR" class="form-control" type="text" style="text-align: center;">
									</div>
									<div class="col-md-6 form-group">
										<label class="control-label">Día </label>
										<select id="diaClaseR" name="diaClaseR" class="form-control">
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
											<input type="text" id="horaInicioR" readonly name="horaInicioR"  class="form-control">
											<span class="input-group-addon" style="color: green">
												<span class="glyphicon glyphicon-time"></span>
											</span>
										</div>
									</div>
									<div class="col-md-6 form-group">
										<label class="control-label">Hora final</label>
										<div class="input-group clockpicker">
											<input type="text" id="horaFinR" readonly name="horaFinR"  class="form-control">
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-time" style="color: red"></span>
											</span>
										</div>
									</div>
								</div> 
								<div class="row">
									<div class="col-md-12 form-group">
										<label class="control-label">Instructor encargado</label>
										<select id="instructorClaseR" name="instructorClaseR" data-placeholder="Instructor" class="chosen-select mb-15" tabindex="-1" style="display: none;">
											<option value="" disabled>Seleccione un instructor</option>
											<?php foreach ($this->mdl_clase->listarInstructores() as $ins) { ?>
											<option value="<?= $ins->IdPersonaRol ?>">DNI <?= $ins->Documento.' - '.$ins->Nombre.' '.$ins->Apellidos ?></option>';
											<?php }?>
										</select>
									</div>
								</div>
							</div>
						<div class="col-md-2"></div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="modal-footer">
					<center>
						<button type="reset" class="btn btn-danger btn-expand" style="color:white; background-color: #2A2A2A;"  data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-success btn-expand" style="color:white; background-color: #2A2A2A;" >Registrar clase</button>
					</center>
				</div>
			</form>
		</div>
	</div>
</div>