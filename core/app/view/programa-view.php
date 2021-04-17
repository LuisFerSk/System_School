<?php if (isset($_GET["opt"]) && $_GET["opt"] == "all") :
  $programa = ProgramaData::getAll();
?>
  <section class="content-header">
    <h1>
      Programas
      <small>Todo los programas</small>
    </h1>
    <br>
    <a href="./?view=programa&opt=new" class="btn btn-primary">Nuevo Registros</a>
  </section>
  <br>
  <section class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <?php if (count($programa) > 0) : ?>
              <table class="table table-bordered table-hover" id="table">
                <thead>
                  <tr>
                    <th scope="col">id programa</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Facultad</th>
                    <th scope="col">Operaciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($programa as $pro) : ?>
                    <tr>
                      <td><?= $pro->id; ?></td>
                      <td><?= $pro->nombre; ?></td>
                      <td><?= $pro->facultad; ?></td>
                      <td style="width: 100px;">
                        <div class="btn-group">
                          <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Acciones <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="./?view=programa&opt=edit&id=<?= $pro->id; ?>"><i class="fa fa-pencil fa-fw"></i> Editar</a></li>
                            <li><a href="./?action=programas&opt=del&id=<?= $pro->id; ?>"><i class="fa fa-trash-o fa-fw"></i> Eliminar</a></li>
                          </ul>
                        </div>
                        </th>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            <?php else : ?>
              <div class="box-body">
                <p class="alert alert-warning">Aun no hay grados registrados!</p>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "new") : ?>
  <section class="content-header">
    <h1>
      Registrar programa
      <small>Digite la información</small>
    </h1>
    <br>
  </section>
  <section class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <form method="POST" action="./?action=programas&opt=add">
              <?php
              $facultad = FacultadData::getAll();
              ?>
              <div class="form-row clearfix">
                <div class="form-group col-md-3">
                  <label>Programa:</label>
                  <input type="tex" name="nombre" class="form-control" placeholder="Ingrese el programa">
                </div>
                <div class="form-group col-md-3">
                  <label>Numero de periodos:</label>
                  <input type="number" name="numeroPeriodos" class="form-control" placeholder="Ingrese la duracion">
                </div>
                <div class="form-group col-md-3">
                  <label>Facultad</label>
                  <select name="facultad" class="form-control">
                    <option value="">--seleccione--</option>
                    <?php foreach ($facultad as $fd) : ?>
                      <option value="<?php echo ($fd->nombre); ?>"><?php echo $fd->nombre ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label>Estado:</label>
                  <select name="estado" class="form-control">
                    <option selected>Abierto</option>
                    <option>Cerrado</option>
                  </select>
                </div>
              </div>
              <div class=" col-lg-10">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href='./?view=programa&opt=all' class="btn btn-warning">Cancelar</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "edit") :
  $programa = ProgramaData::getById($_GET["id"]);
?>
  <section class="content-header">
    <h1>
      Editar programa
      <small>Digite la ingormación</small>
    </h1>
    <br>
  </section>
  <section class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <form method="POST" action="./?action=programas&opt=upd">
              <?php
              $programa = ProgramaData::getById($_GET["id"]);
              $facultad = FacultadData::getAll();
              ?>
              <div class="form-row clearfix">
                <div class="form-group col-md-3">
                  <label>Programa:</label>
                  <input type="tex" name="nombre" class="form-control" placeholder="Ingrese el programa" value="<?= $programa->nombre; ?>">
                </div>
                <div class="form-group col-md-3">
                  <label>Numero de periodos:</label>
                  <input type="number" name="numeroPeriodos" class="form-control" placeholder="Ingrese la duracion" value="<?= $programa->numeroPeriodos; ?>">
                </div>
                <div class="form-group col-md-3">
                  <label>Facultad</label>
                  <select name="facultad" class="form-control">
                    <?php
                    foreach ($facultad as $fd) :
                      if ($programa->facultad == $fd->nombre) : ?>
                        <option selected value="<?php echo ($fd->nombre); ?>"><?php echo $fd->nombre ?></option>
                      <?php else : ?>
                        <option value="<?php echo ($fd->nombre); ?>"><?php echo $fd->nombre ?></option>
                    <?php endif;
                    endforeach; ?>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label>Estado:</label>
                  <select name="estado" class="form-control">
                    <option selected><?= $programa->estado; ?></option>
                    <option><?= $programa->estado=="Abierto"?"Cerrado":"Abierto"; ?></option>
                  </select>
                </div>
              </div>
              <div class=" col-lg-10">
                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href='./?view=programa&opt=all' class="btn btn-warning">Cancelar</a>
                <input type="hidden" name="id_programa" value="<?= $programa->id_programa ?>">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>