<div class="header-content">
	<h2><i class="fa fa-bars"></i> Gestión de etapas</h2>
	<div class="breadcrumb-wrapper hidden-xs">
		<span class="label">Estas en:</span>
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="menu">Menú principal</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li class="active">
				<i class="fa fa-trophy"></i>
				<a href="torneo">Gestión de torneos</a> 
				<i class="fa fa-angle-right"></i>
			</li>
			<li class="active">
				<i class="fa fa-bars"></i>
				<a href="#">Gestión de etapas</a>
			</li>
		</ol>
	</div>
</div>

<div class="body-content animated fadeIn">
	<input type="hidden" name="idEtapaActual" id="idEtapaActual" value="<?= $idEtapaActual ?>">
	<div class="row">
		<div class="col-md-6">
			<div class="panel rounded shadow no-overflow">
				<div class="panel-heading">
					<div class="pull-left">
						<h3 class="panel-title">Información de etapa</h3>
					</div>
					<div class="pull-right">
						<button class="btn btn-sm" data-container="body" data-action="collapse" data-toggle="tooltip" data-placement="top" data-title="Collapse" data-original-title="" title=""><i class="fa fa-angle-up"></i></button>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body no-padding" style="margin: 20px; font-size: 15px">
					<form id="gEtapa" name="gEtapa">
						<input type="hidden" id="idetapa" name="idetapa" value="<?= $idetapa ?>">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-6 form-group">
										<label class="control-label">Nombre de etapa</label>
										<input id="nombreEtapa" name="nombreEtapa" class="form-control" type="text" style="text-align: center;" value="<?= $nEtapa ?>">
									</div>
									<div class="col-md-6 form-group">
										<label class="control-label">Estado </label>
										<select id="estadoEtapa" name="estadoEtapa" class="form-control" value="<?= $eEtapa ?>">
											<option value="activo">Activo</option>
											<option value="inactivo">Inactivo</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 form-group">
										<label class="control-label">Fecha de inicio</label>
										<input class="form-control" id="fechaInicio" name="fechaInicio" type="date" style="text-align: center;" value="<?= $fechaIni ?>">
									</div>
									<div class="col-md-6 form-group">
										<label class="control-label">Fecha de fin</label>
										<input class="form-control" id="fechaFin" name="fechaFin" type="date" style="text-align: center;" value="<?= $fechaFin ?>">
									</div>
								</div>
							</div>
							<div class="col-md-2"></div>
						</div>
						<br>
						<div class="row">
							<center><button type="submit" class="btn btn-info">Modificar etapa</button></center>
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
						<h3 class="panel-title">Inscripción de jugadores</h3>
					</div>
					<div class="pull-right">
						<button class="btn btn-sm" data-container="body" data-action="collapse" data-toggle="tooltip" data-placement="top" data-title="Collapse" data-original-title="" title=""><i class="fa fa-angle-up"></i></button>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body no-padding" style="margin: 20px; font-size: 15px">
					<form id="gEtapa" name="gEtapa">
						<input type="hidden" id="idetapa" name="idetapa" value="<?= $idetapa ?>">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<div class="col-md-12 form-group">
									<center><label class="control-label">Documento - Nombre completo </label></center>
									<select id="estadoEtapa" name="estadoEtapa" class="chosen-select mb-16" value="<?= $eEtapa ?>">
										<?php foreach ($selJugador as $valJugador){ ?>
										<option value="<?= $valJugador->IdPersona ?>"><?= $valJugador->Documento ?> - <?= $valJugador->Nombre.' '.$valJugador->Apellidos ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-2"></div>
						</div>
						<br>
						<div class="row">
							<center><button type="submit" class="btn btn-success">Asignar jugador a dicha etapa</button></center>
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
						<h3 class="panel-title">Jugadores inscritos en esta etapa</h3>
					</div>
					<div class="pull-right">
						<button class="btn btn-sm" data-container="body" data-action="collapse" data-toggle="tooltip" data-placement="top" data-title="Collapse" data-original-title="" title=""><i class="fa fa-angle-up"></i></button>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body no-padding" style="margin: 20px; font-size: 15px" >
					<div class="table-responsive">
						<table id="tablaEtapa" class="table table-hover">
							<thead>
								<tr>
									<td>-</td>
									<td style="color: red;">Documento</td>
									<td>Nombre completo</td>
									<td>Categoria</td>
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
