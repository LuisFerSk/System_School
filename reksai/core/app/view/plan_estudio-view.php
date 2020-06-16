<?php if (isset($_GET["opt"]) && $_GET["opt"] == "all") :
  $asignatura = Plan_estudioData::getAll();
?>
  <section class="content-header">
    <h1>
      Plan de estudio
      <small>Lista de planes de estudio</small>
    </h1>
    <br>
    <a href="./?view=plan_estudio&opt=new" class="btn btn-primary">Nuevo Registro</a>
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
                      <td style="width: 100px;">
                        <div class="btn-group">
                          <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Acciones <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="./?view=plan_estudio&opt=edit&id=<?= $asig->id_asig; ?>"><i class=" fa fa-pencil fa-fw"></i> Editar</a></li>
                            <li><a href="./?action=plan_estudio+&opt=del&id=<?= $asig->id_asig; ?>"><i class="fa fa-trash-o fa-fw"></i> Eliminar</a></li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            <?php else : ?>
              <div class="box-body">
                <p class="alert alert-warning">Aun no hay plane de estudio registrado registradas!</p>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "new") :
  $asignatura = AsignaturaData::getAll();
  $programa = ProgramaData::getAll();
?>
  <section class="content-header">
    <h1>
      Registrar plan de estudio
      <small>Digite la información</small>
    </h1>
  </section>
  <br>
  <section class="contaent-header">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <form method="POST" action="./?action=asignatura&opt=add">
            <div class="box-body">
              <form method="POST" action="./?action=asignatura&opt=add">
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label>Codigo:</label>
                    <input type="text" name="codigo" class="form-control" placeholder="Digite el codigo" required>
                  </div>
                  <div class="form-group col-md-5">
                    <label>Programa:</label>
                    <select name="programa" class="form-control">
                      <option selected>Seleccione...</option>
                      <?php foreach ($programa as $prog) : ?>
                        <option value="<?= $prog->nombre; ?>"><?php echo $prog->nombre ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
            </div>
            <div class="box-footer">
              <div class="form-group col-xs-10 content-header">
                <h1><small>Agrege las asignaturas para el plan de estudio.</small></h1>
              </div>
              <div class="form-group col-md-5">
                <label>Asignatura:</label>
                <select id="asignatura" class="form-control">
                  <option selected>Seleccione...</option>
                  <?php foreach ($asignatura as $asig) : ?>
                    <option value="<?= $asig->nombre; ?>"><?= $asig->nombre; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label>Semestre:</label>
                <input id="semestre" type="number" class="form-control" placeholder="Digite el codigo">
              </div>
              <div class="form-group col-md-3">
                <br>
                <input value="Agregar asignatura" class="btn btn-primary" type="button" id="btn_append" />
              </div>
              <div class="form-group col-md-5">
                <label>Requisito de la asignatura:</label>
                <select id="requisito_one" class="form-control">
                  <option selected>Seleccione...</option>
                  <?php foreach ($asignatura as $asig) : ?>
                    <option value="<?= $asig->nombre; ?>"><?= $asig->nombre; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label>Requisito de la asignatura:</label>
                <select id="requisito_two" class="form-control">
                  <option selected>Seleccione...</option>
                  <?php foreach ($asignatura as $asig) : ?>
                    <option value="<?= $asig->nombre; ?>"><?= $asig->nombre; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label>Requisitos de crditos:</label>
                <input value="0" id="requisito_credito" type="number" class="form-control" placeholder="Digite el codigo">
              </div>
              <div class=" col-lg-10">
                <button type="submit" class="btn btn-success">Registrar plan de estudio</button>
                <a href="./?view=plan_estudio&opt=all" class="btn btn-warning">Cancelar</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <section class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <table class="table table-bordered table-hover" id="table">
              <thead>
                <tr>
                  <th scope="col">Requisitos</th>
                  <th scope="col">Asignatura</th>
                  <th scope="col">Semestre</th>
                  <th scope="col">Operaciones</th>
                </tr>
              </thead>
              <tbody class="tb">
              </tbody>
            </table>
            <input type="button" id="btn_append" />
            <input type="button" id="btn_remove" />
          </div>
        </div class="verde">
      </div>
    </div>
  </section>
  <script type="text/javascript">
    $(document).ready(function() {
      // append()
      var asignatura = [];
      asignatura.push($("#asignatura").val());
      $("#btn_append").click(function() {
        $(".odd").remove();
        $(".tb").append("" +
          "<tr id='" + $("#asignatura").val() + "'>" +
          "<td>" + $("#asignatura").val() + "</td>" +
          "<td>" + $("#asignatura").val() + "</td>" +
          "<td>" + $("#semestre").val() + "</td>" +
          "</tr>" +
          '<input type="button" class="' + $("#asignatura").val() + '"></input>' +
          "<script>" +
          '$(".' + $("#asignatura").val() + '").click(function() {' +
          '$("#' + $("#asignatura").val() + '").detach();' +
          "});" +
          "<\/script>" +
          "");
      });
      // prepend()

    });
  </script>
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