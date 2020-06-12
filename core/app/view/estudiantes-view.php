<?php if (isset($_GET["opt"]) && $_GET["opt"] == "all") :
  $estu = EstudiantesData::getAll();
?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (count($estu) > 0) : ?>
            <table class="table table-bordered table-hover" id="table">
              <thead>
                <tr>
                  <th scope="col">Nombres</th>
                  <th scope="col">Datos</th>
                  <th scope="col">Apoderado(a)</th>
                  <th scope="col">Fecha/Registro</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Operaciones</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($estu as $es) : ?>
                  <tr>
                    <td><?= $es->nombre . "<br> " . $es->apellido_paterno . " " . $es->apellido_materno; ?></td>
                    <td>fecha Nacimiento: <?= $es->fecha_nac; ?><br>Telf/Cel: <?= $es->num_cel; ?><br>Direccion: <?= $es->direccion; ?></td>
                    <td><?= $es->apoderado; ?></td>
                    <td><?= $es->fecha_reg; ?></td>
                    <td><?= $es->estado; ?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-warning " href="#"><i class="fa fa-cog fa-spin fa-1x fa-fw"></i> Acciones</a>
                        <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                          <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a href="./?view=estudiantes&opt=edit&id=<?= $es->id_estudiante; ?>"><i class="fa fa-pencil fa-fw"></i> Editar</a></li>
                          <li><a href="./?action=estudiantes&opt=del&id=<?= $es->id_estudiante; ?>"><i class="fa fa-trash-o fa-fw"></i> Eliminar</a></li>
                        </ul>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else : ?>
            <div class="box-body">
              <p class="alert alert-warning">Aun no hay estudiantes registrados!</p>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "new") : ?>
  <section class="container">

    <h3>Agregar Estudiante</h3>
    <br>
    <form method="POST" action="./?action=estudiantes&opt=add">
      <?php $estado = EstadoData::getAll();
      $genero = GeneroData::getAll(); ?>
      <div class="form-row">
        <div class="form-group col-md-3">
          <label for="inputEmail4">DNI:</label>
          <input type="tex" name="dni" class="form-control" id="inputEmail4" placeholder="Numero de DNI">
        </div>
        <div class="form-group col-md-3">
          <label for="inputEmail4">Apellido Paterno:</label>
          <input type="text" name="apellido_paterno" class="form-control" id="inputEmail4" placeholder="Apellido paterno">
        </div>
        <div class="form-group col-md-3">
          <label for="inputEmail4">Apellido Materno:</label>
          <input type="text" name="apellido_materno" class="form-control" id="inputEmail4" placeholder="Apellido materno">
        </div>
        <div class="form-group col-md-3">
          <label for="inputEmail4">Nombres:</label>
          <input type="text" name="nombre" class="form-control" id="inputEmail4" placeholder="Nombres">
        </div>
        <div class="form-group col-md-3">
          <label>Fecha de Nacimiento:</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" name="fecha_nac" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
          </div>
          <!-- /.input group -->
        </div>
        <div class="form-group col-md-3">
          <label for="inputState">Genero:</label>
          <select id="inputState" name="genero" class="form-control">
            <option selected>Seleccione....</option>
            <?php foreach ($genero as $gene) : ?>
              <option value="<?php echo ($gene->id_genero); ?>"><?php echo $gene->genero ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label for="inputEmail4">Numero / Cel:</label>
          <input type="text" name="num_cel" class="form-control" id="inputEmail4" placeholder="999999999">
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Direccion:</label>
          <input type="text" name="direccion" class="form-control" id="inputEmail4" placeholder="Av. ejemplo 215">
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Apoderado(a)</label>
          <input type="text" name="apoderado" class="form-control" id="inputEmail4" placeholder="apoderado">
        </div>
        <div class="form-group col-md-3">
          <label for="inputState">Estado:</label>
          <select id="inputState" name="estado" class="form-control">
            <option selected>Seleccione....</option>
            <?php foreach ($estado as $esta) : ?>
              <option value="<?php echo ($esta->id_estado); ?>"><?php echo $esta->nombre ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class=" col-lg-10">
        <button type="submit" class="btn btn-success">Agregar</button>
        <button type="button" onclick="location='./?view=a_academico&opt=all'" class="btn btn-warning">Cancelar</button>
      </div>
    </form>
  </section>

<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "edit") :
  $estu = EstudiantesData::getById($_GET["id"]);
?>
  <section class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>editar Alumnos</h1>
        <br>
        <form method="POST" action="./?action=estudiantes&opt=upd">
          <?php $estado = EstadoData::getAll();
          $genero = GeneroData::getAll(); ?>
          <div class="form-group">
            <div class="form-group col-md-3"> <label for="inputEmail4">DNI:</label>
              <input type="tex" value="<?= $estu->dni; ?>" name="dni" class="form-control" id="inputEmail4" placeholder="Numero de DNI">
            </div>
            <div class="form-group col-md-3">
              <label for="inputEmail4">Nombres:</label>
              <input type="text" value="<?= $estu->nombre; ?>" name="nombre" class="form-control" id="inputEmail4" placeholder="Nombres">
            </div>
            <div class="form-group col-md-3">
              <label for="inputEmail4">Primer apellido:</label>
              <input type="text" value="<?= $estu->apellido_paterno; ?>" name="apellido_paterno" class="form-control" id="inputEmail4" placeholder="Apellido paterno">
            </div>
            <div class="form-group col-md-3">
              <label for="inputEmail4">Segundo apellido:</label>
              <input type="text" value="<?= $estu->apellido_materno; ?>" name="apellido_materno" class="form-control" id="inputEmail4" placeholder="Apellido materno">
            </div>
            <div class="form-group col-md-3">
              <label for="inputState">Genero:</label>
              <select id="inputState" value="<?= $estu->genero; ?>" name="genero" class="form-control">
                <?php foreach ($genero as $gene) : ?>
                  <option><?php echo $gene->genero ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label>Fecha de Nacimiento:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" value="<?= $estu->fecha_nac; ?>p" name="fecha_nac" class="form-control">
              </div>
              <!-- /.input group -->
            </div>
            <div class="form-group col-md-3">
              <label for="inputState">Estado:</label>
              <select id="inputState" value="<?php echo ($esta->nombre); ?>" name="estado" class="form-control">
                <?php foreach ($estado as $esta) : ?>
                  <option><?php echo $esta->nombre ?></option>
                <?php endforeach; ?>
              </select>

            </div>
          </div>
          <input type="hidden" name="id" value="<?= $estu->id_estudiante; ?>">
          <div class=" col-lg-10">
            <button type="submit" class="btn btn-success">Actualizar</button>
            <button type="button" onclick="location='./?view=a_academico&opt=all'" class="btn btn-warning">Cancelar</button>
          </div>
        </form>
  </section>
  <br>
<?php endif; ?>