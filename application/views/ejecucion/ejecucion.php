<div class="header-content">
	<h2><i class="fa fa-list-alt"></i> Ejecución de clases y asistencias</h2>
	<div class="breadcrumb-wrapper hidden-xs">
		<span class="label">Estas en:</span>
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="<?= base_url() ?>menu">Menú principal</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<i class="fa fa-graduation-cap"></i>
				<a href="<?= base_url() ?>clase">Clases</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li class="active"> Ejecución de clases y asistencias</li>
		</ol>
	</div>
</div>

<div class="body-content animated fadeIn">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="panel rounded shadow no-overflow">
				<div class="panel-heading">
					<center>
						<strong style="font-size: 18px;">Información de la clase</strong>
					</center>
					<ul style="list-style-type: none;">
						<li><strong>Nombre de clase:</strong> <?= $clase->NombreClase ?></li>
						<li><strong>Día:</strong> <?= $clase->Dia ?></li>
						<li><strong>Hora de inicio:</strong> <?= $clase->HoraInicio ?></li>
						<li><strong>Hora de fin:</strong> <?= $clase->HoraFinal ?></li>
						<li><strong>Instructor:</strong> DNI <?= $instructor->Documento.' - '.$instructor->Nombre.' '.$instructor->Apellidos ?></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>
		<input type="hidden" name="IdClase" id="IdClase" value="<?= $idclase ?>">
		<div class="col-md-12">
			<div class="panel rounded shadow no-overflow">
				<center>
					<div class="panel-heading btn btn-success btn-push" style="margin: 20px" onclick="nuevaAsistencia()">
						<a style="text-decoration:none; color:white;"><h3 class="panel-title">Registrar ejecución </h3></a>
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
						<h3 class="panel-title">Asistencias en clases</h3>
					</div>
					<div class="pull-right">
						<button class="btn btn-sm" data-container="body" data-action="collapse" data-toggle="tooltip" data-placement="top" data-title="Collapse" data-original-title="" title=""><i class="fa fa-angle-up"></i></button>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body no-padding" style="margin: 20px;font-size: 16px;" >
					<div class="table-responsive">
						<table id="tablaAsistencia" class="table table-hover">
							<thead>
								<tr>
									<td>-</td>
									<td style="color: red;">Fecha de asistencia</td>
									<td>Nombre clase</td>
									<td>Horario</td>
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

<div class="modal fade bs-example-modal-lg" id="modalAsistencia" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><center>Registro de ejecución y asistencias</center></h4>
			</div>
			<form id="formAsistencia">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<div class="row">
								<div class="col-md-6 form-group">
									<label class="control-label">Seleccione una clase <span style="color: red;">*</span></label>
									<select id="clase" name="clase" data-placeholder="Seleccione una eps" class="chosen-select mb-15" tabindex="-1" style="display: none;">
										<option value="" disabled selected>Seleccione una clase</option>';
										<?php foreach ($this->mdl_clase->listarClasesSelect() as $clases) { ?>
										<option value="<?= $clases->IdClase ?>"><?= $clases->NombreClase . ' - ' . $clases->Dia . ' | ' . $clases->HoraInicio . ' a ' . $clases->HoraFinal ?></option>';
										<?php }?>
									</select>
								</div>
								<div class="col-md-6 form-group">
									<label class="control-label">Fecha de ejecución <span style="color: red;">*</span></label>
									<input type="date" class="form-control" name="fecharegistro" id="fecharegistro" value="<?= date('Y-m-d') ?>">
								</div>
							</div>
							<div class="divider"></div>
						</div>
						<div class="col-md-1"></div>
						<div class="col-md-1"></div>
					</div>
				</div>
				<div class="modal-footer">
					<center>
						<button type="reset" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-info btn-expand" style="background-color: #2A2A2A;">Registrar asistencias</button>
					</center>
				</div>
			</form>
		</div>
	</div>
</div>

