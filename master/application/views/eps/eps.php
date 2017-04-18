<div class="header-content">
  <h2><i class="fa fa-list-alt"></i> Gestión de eps</h2>
  <div class="breadcrumb-wrapper hidden-xs">
    <span class="label">Estas en:</span>
    <ol class="breadcrumb">
      <li>
        <i class="fa fa-home"></i>
        <a href="<?= base_url() ?>menu">Menú principal</a>
        <i class="fa fa-angle-right"></i>
      </li>
      <li class="active">Gestión de eps</li>
    </ol>
  </div>
</div>


<div class="body-content animated fadeIn">

  <div class="row">
    <div class="col-md-12">
      <div class="panel rounded shadow no-overflow">
        <center>
          <div class="panel-heading btn btn-success btn-push" style="margin: 20px" onclick="nuevaE()">
            <h3 class="panel-title">Registrar eps nueva</h3>
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
            <table id="tablaEps" class="table table-hover">
              <thead>
                <tr>
                  <td style="color: red">Nombre eps</td>
                  <td>Telefono</td>
                  <td>Estado</td>
                  <td style="text-align: center">Acciones</td>
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
      <form id="registro" name="registro">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><center>Registro de nuevas eps</center></h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 form-group">
              <label class="control-label">Nombre eps</label>
              <input class="form-control" name="nombreepsR" id="nombreepsR" type="text">
            </div>
            <div class="col-md-6 form-group">
              <label class="control-label">Número de teléfono</label>
              <input class="form-control" name="telefonoepsR" id="telefonoepsR" type="text">
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="modal-footer">
          <center>
            <button type="reset" class="btn btn-danger btn-expand" style="background-color: #2A2A2A;" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success btn-expand" style="background-color: #2A2A2A;">Registrar eps</button>
          </center>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-lg" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="editarE" name="editarE">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><center>Modificar eps</center></h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 form-group">
              <input id="ideps" name="ideps" type="hidden">
              <label class="control-label">Nombre eps</label>
              <input class="form-control" name="nombreeps" id="nombreeps" type="text">
            </div>
            <div class="col-md-6 form-group">
              <label class="control-label">Número de teléfono</label>
              <input class="form-control" name="telefonoeps" id="telefonoeps" type="text">
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="modal-footer">
          <center>
            <button type="reset" class="btn btn-danger btn-expand" style="background-color: #2A2A2A;" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success btn-expand" style="background-color: #2A2A2A;">Modificar eps</button>
          </center>
        </div>
      </form>
    </div>
  </div>
</div>