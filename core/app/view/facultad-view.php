<?php if (isset($_GET["opt"]) && $_GET["opt"] == "all") :
  $facultad = FacultadData::getAll();
?>
  <section class="content-header">
    <h1>
      Facultades
      <small>todas las facultades</small>
    </h1>
    <br>
    <a href="./?view=facultad&opt=new" class="btn btn-primary">Nueva facultad</a>
  </section>
  <br>
  <section class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <?php if (count($facultad) > 0) : ?>
              <table class="table table-bordered table-hover" id="table">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">nombre</th>
                    <th scope="col">estado</th>
                    <th scope="col">Operaciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($facultad as $fd) : ?>
                    <tr>
                      <td><?= $fd->id_facultad; ?></td>
                      <td><?= $fd->nombre; ?></td>
                      <td><?= $fd->estado; ?></td>
                      <td style="width: 100px;">
                        <div class="btn-group">
                          <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Acciones <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                          <li><a href="./?view=facultad&opt=edit&id=<?= $fd->id_facultad; ?>"><i class="fa fa-pencil fa-fw"></i> Editar</a></li>
                          <li><a href="./?action=facultad&opt=del&id=<?= $fd->id_facultad; ?>"><i class="fa fa-trash-o fa-fw"></i> Eliminar</a></li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            <?php else : ?>
              <div class="box-body">
                <p class="alert alert-warning">Aun no hay facultades registrados!</p>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <br>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "new") : ?>
  <section class="content-header">
    <h1>
      Registrar facultad
      <small>Digite la información.</small>
    </h1>
    <br>
  </section>
  <section class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <form method="POST" action="./?action=facultad&opt=add">
              <div class="form-row clearfix">
                <div class="form-group col-md-9">
                  <label>Nombre:</label>
                  <input type="tex" name="nombre" class="form-control" placeholder="Nombre de la facultad">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputState">Estado:</label>
                  <select id="inputState" name="estado" class="form-control">
                    <option selected>Abierto</option>
                    <option>Cerrado</option>
                  </select>
                </div>
              </div>
              <div class=" col-lg-10">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href='./?view=facultad&opt=all' class="btn btn-warning">Cancelar</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "edit") :
  $facultad = FacultadData::getById($_GET["id"]);
?>
  <section class="content-header">
    <h1>
      Editar Faculta
      <small>Digite la información.</small>
    </h1>
    <br>
  </section>
  <section class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <form method="POST" action="./?action=facultad&opt=upd">
              <div class="form-row clearfix">
                <div class="form-group col-md-9">
                  <label>Nombre:</label>
                  <input type="text" name="nombre" required value="<?= $facultad->nombre; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group col-md-3">
                  <label>Estado:</label>
                  <select name="estado" class="form-control">
                    <option selected><?= $facultad->estado; ?></option>
                    <option><?= $facultad->estado=="Abierto"?"Cerrado":"Abierto"; ?></option>
                  </select>
                </div>
              </div>
              <div class=" col-lg-10">
                <input type="hidden" name="id" value="<?= $facultad->id_facultad; ?>">
                <button type="submit" class="btn btn-success">Actualizar</button>
                <button onclick="location='./?view=facultad&opt=all'" class="btn btn-warning">Cancelar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>