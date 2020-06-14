<?php if (isset($_GET["opt"]) && $_GET["opt"] == "all") :
  $asignatura = AsignaturaData::getAll();
?>
  <section class="content-header">
    <h1>
      Asignatura
      <small>Lista de asignaturas</small>
    </h1>
    <br>
    <a href="./?view=asignatura&opt=new" class="btn btn-primary">Nuevo Registro</a>
  </section>
  <br>
  <section class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <?php if (count($asignatura) > 0) : ?>
              <table class="table table-bordered table-hover" id="table">
                <thead>
                  <tr>
                    <th scope="col">Cogido</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Creditos</th>
                    <th scope="col">Horas por semana</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Operaciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($asignatura as $asig) : ?>
                    <tr>
                      <td><?= $asig->codigo; ?></td>
                      <td><?= $asig->nombre; ?></td>
                      <td><?= $asig->creditos; ?></td>
                      <td><?= $asig->horas_semanales; ?>
                      <td><?= $asig->estado; ?></td>
                      <td style="width: 130px;">
                        <div class="btn-group">
                          <a class="btn btn-warning " href="#"><i class="fa fa-cog fa-spin fa-1x fa-fw"></i> Acciones</a>
                          <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                          </a>
                          <ul class="dropdown-menu">
                            <li><a href="./?view=asignatura&opt=edit&id=<?= $asig->id_asig; ?>"><i class=" fa fa-pencil fa-fw"></i> Editar</a></li>
                            <li><a href="./?action=asignatura&opt=del&id=<?= $asig->id_asig; ?>"><i class="fa fa-trash-o fa-fw"></i> Eliminar</a></li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            <?php else : ?>
              <div class="box-body">
                <p class="alert alert-warning">Aun no hay asignaturas registradas!</p>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "new") :
  $estado = EstadoData::getAll();
?>
  <section class="content-header">
    <h1>
      Registrar asignatura
      <small>Digite la información</small>
    </h1>
  </section>
  <br>
  <section class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <form method="POST" action="./?action=asignatura&opt=add">
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Codigo:</label>
                  <input type="text" name="codigo" class="form-control" placeholder="Digite el codigo">
                </div>
                <div class="form-group col-md-9">
                  <label>Nombre:</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Digite el nombre">
                </div>
                <div class="form-group col-md-5">
                  <label>Número de creditos:</label>
                  <input type="number" name="creditos" class="form-control" placeholder="Digite el número de creditos">
                </div>
                <div class="form-group col-md-5">
                  <label>Horas de clases semanales:</label>
                  <input type="number" name="horas_semanales" class="form-control" placeholder="Dígite el numero de horas de clases semanales">
                </div>
                <div class="form-group col-md-2">
                  <label>Estado:</label>
                  <select name="estado" class="form-control">
                    <option>Abierto</option>
                    <option>Cerrado</option>
                  </select>
                </div>
              </div>
              <div class=" col-lg-10">
                <button type="submit" class="btn btn-success">Guardar</button>
                <button type="button" onclick="location='./?view=asignatura&opt=all'" class="btn btn-warning">Cancelar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "edit") :
  $asignatura = AsignaturaData::getById($_GET["id"]);
  $estado = EstadoData::getAll();
?>
  <section class="content-header">
    <h1>
      Actualizar asignatura
      <small>Digite la información</small>
    </h1>
  </section>
  <br>
  <section class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <form method="POST" action="./?action=asignatura&opt=upd">
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Codigo:</label>
                  <input type="text" value="<?= $asignatura->codigo ?>" name="codigo" class="form-control" placeholder="Digite el codigo">
                </div>
                <div class="form-group col-md-9">
                  <label>Nombre:</label>
                  <input type="text" value="<?= $asignatura->nombre ?>" name="nombre" class="form-control" placeholder="Digite el nombre">
                </div>
                <div class="form-group col-md-5">
                  <label>Número de creditos:</label>
                  <input type="number" value="<?= $asignatura->creditos ?>" name="creditos" class="form-control" placeholder="Digite el número de creditos">
                </div>
                <div class="form-group col-md-5">
                  <label>Horas de clases semanales:</label>
                  <input type="number" value="<?= $asignatura->horas_semanales ?>" name="horas_semanales" class="form-control" placeholder="Dígite el numero de horas de clases semanales">
                </div>
                <div class="form-group col-md-2">
                  <label>Estado:</label>
                  <select name="estado" class="form-control">
                    <option <?php if ($asignatura->estado == 'Abierto') : ?>selected<?php endif; ?>>Abierto</option>
                    <option <?php if ($asignatura->estado == 'Cerrado') : ?>selected<?php endif; ?>>Cerrado</option>
                  </select>
                </div>
              </div>
              <div class=" col-lg-10">
                <button type="submit" class="btn btn-success">Guardar</button>
                <button type="button" onclick="location='./?view=asignatura&opt=all'" class="btn btn-warning">Cancelar</button>
              </div>
              <input type="hidden" name="id" value="<?= $asignatura->id_asig; ?>">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>