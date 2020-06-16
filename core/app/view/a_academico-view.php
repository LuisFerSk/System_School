<?php if (isset($_GET["opt"]) && $_GET["opt"] == "all") :
  $academico = A_academicoData::getAll();
?>
  <section class="content-header">
    <h1>
      Periodos Academicos
      <small>Todos los periodos</small>
    </h1>
    <br>
    <a href="./?view=a_academico&opt=new" class="btn btn-primary">Nuevo Registro</a>
  </section>
  <br>
  <section class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <?php if (count($academico) > 0) : ?>
              <table class="table table-bordered table-hover" id="table">
                <thead>
                  <tr>
                    <th scope="col">Numero</th>
                    <th scope="col">Periodo academico</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Operaciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($academico as $acad) : ?>
                    <tr>
                      <td><?= $acad->id_a; ?></td>
                      <td><?= $acad->nombre; ?></td>
                      <td><?= $acad->estado; ?></td>
                      <td style="width: 100px;">
                        <div class="btn-group">
                          <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Acciones <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="./?view=a_academico&opt=edit&id=<?= $acad->id_a; ?>"><i class="fa fa-pencil fa-fw"></i> Editar</a></li>
                            <li><a href="./?action=a_academico&opt=del&id=<?= $acad->id_a; ?>"><i class="fa fa-trash-o fa-fw"></i> Eliminar</a></li>
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
                <p class="alert alert-warning">Aun no hay profesores registrados!</p>
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
      Registrar periodos Academicos
      <small>Digite la información</small>
    </h1>
    <br>
  </section>
  <section class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <form method="POST" action="./?action=a_academico&opt=add">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Periodo academico:</label>
                  <input type="tex" name="nombre" class="form-control" id="inputEmail4" placeholder="ciclo escolar">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputState">Estado:</label>
                  <select id="inputState" name="estado" class="form-control">
                    <option selected>Abierto</option>
                    <option>Cerrado</option>
                  </select>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Fecha inicio periodo:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" name="fechainicio" class="form-control">
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Fecha fin periodo:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" name="fechafin" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Fecha inicio matricula:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" name="iniciomatricula" class="form-control" id="inputEmail4" placeholder="ciclo escolar">
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Fecha fin matricula:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" name="finmatricula" class="form-control" id="inputEmail4">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Fecha inicio primer parcial:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" name="inicioprimerparcial" class="form-control" id="inputEmail4" placeholder="ciclo escolar">
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Fecha fin primer parcial:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" name="finprimerparcial" class="form-control" id="inputEmail4">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Fecha inicio segundo parcial:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" name="iniciosegundoparcial" class="form-control" id="inputEmail4" placeholder="ciclo escolar">
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Fecha fin segundo parcial:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" name="finsegundoparcial" class="form-control" id="inputEmail4">
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Fecha inicio parcial final:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" name="inicioparcialfinal" class="form-control" id="inputEmail4" placeholder="ciclo escolar">
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Fecha fin parcial final:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" name="finparcialfinal" class="form-control" id="inputEmail4">
                    </div>
                  </div>
                </div>
                <div class=" col-lg-10">
                  <button type="submit" class="btn btn-success">Agregar</button>
                  <a href="./?view=a_academico&opt=all" class="btn btn-warning">Cancelar</a>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "edit") :
  $academico = A_academicoData::getById($_GET["id"]);
?>
  <section class="content-header">
    <h1>
      Editar periodos Academicos
      <small>Digite la información</small>
    </h1>
    <br>
  </section>
  <section class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <form method="POST" action="./?action=a_academico&opt=upd">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Periodo academico:</label>
                  <input type="tex" name="nombre" class="form-control" id="inputEmail4" placeholder="ciclo escolar" value="<?= $academico->nombre; ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputState">Estado:</label>
                  <select id="inputState" name="estado" class="form-control">
                    <option <?php if ($academico->estado == 'Abierto') : ?>selected<?php endif; ?>>Abierto</option>
                    <option <?php if ($academico->estado == 'Cerrado') : ?>selected<?php endif; ?>>Cerrado</option>
                  </select>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Fecha inicio periodo:</label>
                    <input type="date" name="fechainicio" class="form-control" value="<?= $academico->fechainicio; ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Fecha fin periodo:</label>
                    <input type="date" name="fechafin" class="form-control" value="<?= $academico->fechafin; ?>">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Fecha inicio matricula:</label>
                    <input type="date" name="iniciomatricula" class="form-control" value="<?= $academico->iniciomatricula; ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Fecha fin matricula:</label>
                    <input type="date" name="finmatricula" class="form-control" value="<?= $academico->finmatricula; ?>">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Fecha inicio primer parcial:</label>
                    <input type="date" name="inicioprimerparcial" class="form-control" value="<?= $academico->inicioprimerparcial; ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Fecha fin primer parcial:</label>
                    <input type="date" name="finprimerparcial" class="form-control" value="<?= $academico->finprimerparcial; ?>">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Fecha inicio segundo parcial:</label>
                    <input type="date" name="iniciosegundoparcial" class="form-control" value="<?= $academico->iniciosegundoparcial; ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Fecha fin segundo parcial:</label>
                    <input type="date" name="finsegundoparcial" class="form-control" value="<?= $academico->finsegundoparcial; ?>">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Fecha inicio parcial final:</label>
                    <input type="date" name="inicioparcialfinal" class="form-control" value="<?= $academico->inicioparcialfinal; ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Fecha fin parcial final:</label>
                    <input type="date" name="finparcialfinal" class="form-control" value="<?= $academico->finparcialfinal; ?>">
                  </div>
                </div>
                <div class=" col-lg-10">
                  <button type="submit" class="btn btn-success">Agregar</button>
                  <button type="date" onclick="location='./?view=a_academico&opt=all'" class="btn btn-warning">Cancelar</button>
                  <input type="hidden" name="id_a" value="<?= $academico->id_a; ?>">
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>