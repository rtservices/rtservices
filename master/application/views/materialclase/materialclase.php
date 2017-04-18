<div class="header-content">
	<h2>Clase: <?= $nombreClase ?></h2>
	<div class="breadcrumb-wrapper hidden-xs">
		<span class="label">Estas en:</span>
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="menu">Menú principal</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<a href="clase">Gestión de clases</a> 
				<i class="fa fa-angle-right"></i>
			</li>
			<li class="active">
				<a href="#">Clase: <?= $nombreClase?></a>
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel rounded shadow no-overflow">
			<div class="panel-heading">
				<center>
				<a href="clase"><button type="button" class="btn btn-success btn-expand" style="background-color: #2A2A2A;">Regresar a gestión de clases</button></a>
				</center>
			</div>
		</div>
	</div>
	<div class="col-md-12">
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
				<form id="registroMc" name="registroMc">
					<input type="hidden" name="claseR" id="claseR" value="<?= $idClase ?>">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="row">
								<div class="col-md-6 form-group">
									<label class="control-label">Nombre de la clase</label>
									<input id="nombreClaseR" name="nombreClaseR" class="form-control" type="text" disabled style="text-align: center;" value="<?= $nClase ?>">
								</div>
								<div class="col-md-6 form-group">
									<label class="control-label">Cantidad</label>
									<input id="cantidadR" name="cantidadR" class="form-control" type="text" style="text-align: center;">
								</div>
								<div class="col-md-12 form-group">
									<label class="control-label">Material </label>
									<select id="materialR" name="materialR" data-placeholder="Seleccione un material" class="chosen-select mb-15" tabindex="-1" sstyle="text-align: center;" >
										<option value="" disabled selected>Seleccione un material</option>';
										<?php foreach ($this->mdl_material->listarMateriales() as $mate) { ?>
										<option value="<?= $mate->IdMaterial ?>"><?= $mate->DescripcionMaterial ?></option>';
										<?php }?>
									</select>
								</div>
							</div>
							<div class="col-md-2"></div>
						</div>
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
</div>
<!-- tabla-->
<div class="body-content animated fadeIn">
	<div class="row">
		<div class="col-md-12">
			<div class="panel rounded shadow no-overflow">
				<div class="panel-heading">
					<div class="pull-left">
						<h3 class="panel-title">Materiales inscriptos a esta clase</h3>
					</div>
					<div class="pull-right">
						<button class="btn btn-sm" data-container="body" data-action="collapse" data-toggle="tooltip" data-placement="top" data-title="Collapse" data-original-title="" title=""><i class="fa fa-angle-up"></i></button>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="panel-body no-padding" style="margin: 20px;font-size: 16px;" >
					<div class="table-responsive">
						<table id="tablaMateriaClase" class="table table-hover">
							<thead>
								<tr>
									<td>-</td>
									<td style="color: red;">Nombre material</td>
									<td>Cantidad </td>
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
<!--Modificar-->
<div class="modal fade bs-example-modal-lg" id="modalMc" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="editarMc" name="editarMc">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><center>Editar Materiales</center></h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<input class="form-control" id="idMaterialClase" name="idMaterialClase" type="hidden">
							<div class="row">
								<div class="col-md-6 form-group">
									<label class="control-label">Nombre de la clase</label>
									<input id="nombreClaseE" name="nombreClaseE" class="form-control" type="text" disabled style="text-align: center;" value="<?= $nClase ?>">
								</div>
								<div class="col-md-6 form-group">
									<label class="control-label">Cantidad</label>
									<input id="cantidade" name="cantidadE" class="form-control" type="text" style="text-align: center;">
								</div>
								<div class="col-md-12 form-group">
									<label class="control-label">Material </label>
									<select id="materialE" name="materialE" data-placeholder="Seleccione un material" class="chosen-select mb-15" tabindex="-1" sstyle="text-align: center;" >
										<option value="" disabled selected>Seleccione un material</option>';
										<?php foreach ($this->mdl_material->listarMateriales() as $mate) { ?>
										<option value="<?= $mate->IdMaterial ?>"><?= $mate->DescripcionMaterial ?></option>';
										<?php }?>
									</select>
								</div>
							</div>
							<div class="col-md-2"></div>
						</div>
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

