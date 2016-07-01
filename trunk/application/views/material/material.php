<div class="header-content">
	<h2><i class="fa fa-list-alt"></i> Gestión de Material</h2>
	<div class="breadcrumb-wrapper hidden-xs">
		<span class="label">Estas en:</span>
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="dashboard.html">Menú principal</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li class="active">Gestión de material</li>
		</ol>
	</div>
</div>
<!-- comienzo de boton de categorias-->
<div class="body-content animated fadeIn">
	<div class="row">
		<div class="col-md-12">
			<div class="panel rounded shadow no-overflow">
				<center>
					<div class="panel-heading btn btn-success btn-push" style="margin: 20px" onclick="nuevaC()">
						<h3 class="panel-title">Registrar Materiales</h3>
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
						<h3 class="panel-title">Materiales inscritos en el sistema</h3>
					</div>
					<div class="pull-right">
						<button class="btn btn-sm" data-container="body" data-action="collapse" data-toggle="tooltip" data-placement="top" data-title="Collapse" data-original-title="" title=""><i class="fa fa-angle-up"></i></button>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body no-padding" style="margin: 20px; font-size: 15px" >
					<div class="table-responsive">
						<table id="tablaMaterial" class="table table-hover">
							<thead>
								<tr>
									<td style="color: red;">Descripcion</td>
									<td>Estado</td>
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
<!-- Large modal -->
<div class="modal fade bs-example-modal-lg" id="registroC" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="registro" name="registro">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><center>Registro de materiales</center></h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8 form-group">
							<center><label class="control-label">Descripcion del material</label></center>
							<input class="form-control" id="materialR" name="materialR" type="text">
						</div>
						<div class="col-md-2"></div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="modal-footer">
					<center>
						<button type="reset" class="btn btn-danger btn-expand" style="color:white; background-color: #2A2A2A;"  data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-success btn-expand" style="color:white; background-color: #2A2A2A;" >Registrar Material</button>
					</center>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- comenzar editar categoria -->
<div class="modal fade bs-example-modal-lg" id="editarC" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="editar" name="editar">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><center>Editar Materiales</center></h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-2"></div>
						<input class="form-control" id="idmaterial" name="idmaterial" type="hidden">
						<div class="col-md-8 form-input">
							<center><label class="control-label">Descripcion del material</label></center>
							<input class="form-control" id="material" name="material" type="text">
						</div>
						<div class="col-md-2"></div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="modal-footer">
					<center>
						<button type="reset" class="btn btn-danger btn-expand" style="color:white; background-color: #2A2A2A;"  data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-success btn-expand" style="color:white; background-color: #2A2A2A;" >Editar material</button>
					</center>
				</div>
			</form>
		</div>
	</div>
</div>
