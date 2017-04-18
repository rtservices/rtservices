<div class="header-content">
	<h2>Planes de clase de <?= (strlen($nomJugador) > 25 ) ? substr($nomJugador, 0, 24) . '...' : $nomJugador ?></h2>
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
				<a href="#">Planes de clase de <?= (strlen($nomJugador) > 25 ) ? substr($nomJugador, 0, 24) . '...' : $nomJugador ?></a>
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
						<a href="persona"><button type="button" class="btn btn-success btn-expand" style="background-color: #2A2A2A;">Terminar gestión de planes de clase</button></a>
					</center>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="panel rounded shadow no-overflow">
				<div class="panel-heading">
					<div class="pull-left">
						<h3 class="panel-title">Activar de Planes de Clase a Jugador <?= $nomJugador ?></h3>
					</div>
					<div class="pull-right">
						<button class="btn btn-sm" data-container="body" data-action="collapse" data-toggle="tooltip" data-placement="top" data-title="Collapse" data-original-title="" title=""><i class="fa fa-angle-up"></i></button>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body no-padding" style="margin: 20px; font-size: 15px">
					<form id="gPClase" name="gPClase">
						<input type="hidden" name="idJugador" id="idJugador" value="<?= $IdJugador ?>">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-12 form-group">
										<center>
											<p>Al activar un plan de clases estas asignando a una persona una cantidad de clases dependiendo del monto que la persona pago para recibir clases.</p>
										</center>
										<label class="control-label">Plan de clases</label>
										<select id="tipoPlan" name="tipoPlan" class="form-control" tabindex="-1">
											<option value="noselect" selected>Seleccione un tipo de plan de clases</option>
											<option value="3">3 meses para un total de 24 clases de 45 minutos</option>
											<option value="6">6 meses para un total de 48 clases de 45 minutos</option>
											<option value="9">9 meses para 72 clases de 45 minutos</option>
											<option value="12">1 año (12 meses) para 96 clases de 45 minutos</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-2"></div>
						</div>
						<br>
						<div class="row">
							<center><button type="submit" class="btn btn-warning btn-expand" style="background-color: #2A2A2A;">Asignar plan de clase</button></center>
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
						<h3 class="panel-title">Planes de Clase</h3>
					</div>
					<div class="pull-right">
						<button class="btn btn-sm" data-container="body" data-action="collapse" data-toggle="tooltip" data-placement="top" data-title="Collapse" data-original-title="" title=""><i class="fa fa-angle-up"></i></button>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body no-padding" style="margin: 20px; font-size: 15px" >
					<div class="table-responsive">
						<table id="tablaPlanClase" class="table table-hover">
							<thead>
								<tr>
									<td style="color: red;">Estado</td>
									<td>Fecha de Creación</td>
									<td>Clases Restantes</td>
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