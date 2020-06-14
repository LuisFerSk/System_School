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
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <?php if (count($programa) > 0) : ?>
              <table class="table table-bordered table-hover" id="table">
                <thead>
                  <tr>
                    <th scope="col">id programa</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Facultad</th>
                    <th scope="col">Duracion</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($programa as $pro) : ?>
                    <tr>
                      <td><?= $pro->id_programa; ?></td>
                      <td><?= $pro->nombre; ?></td>
                      <td><?= $pro->facultad; ?></td>
                      <td><?= $pro->numeroPeriodos; ?></td>
                      <td style="width: 250px;">
                        <a href="./?view=programa&opt=verEst&id=<?= $pro->id_programa; ?>" class="btn btn-primary btn-xs"><i class="fa fa-users fa-lg"></i> Ver estudiantes</a>
                        <a href="./?view=programa&opt=edit&id=<?= $pro->id_programa; ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Editar</a>
                        <a href="./?action=programas&opt=del&id=<?= $pro->id_programa; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o fa-lg"></i> Eliminar</a>
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
  <section class="container">
    <h3>Agregar programa</h3>
    <br>
    <form method="POST" action="./?action=programas&opt=add">
      <?php
      $facultad = FacultadData::getAll();
      ?>
      <div class="form-row">
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
      </div>
    </form>
  </section>
  <br>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "edit") :
  $programa = ProgramaData::getById($_GET["id"]);
?>
  <section class="container">
    <h3>Agregar programa</h3>
    <br>
    <form method="POST" action="./?action=programas&opt=upd">
      <?php
      $programa = ProgramaData::getById($_GET["id"]);
      $facultad = FacultadData::getAll();
      ?>
      <div class="form-row">
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
            <option selected>Abierto</option>
            <option>Cerrado</option>
          </select>
        </div>
      </div>
      <div class=" col-lg-10">
        <button type="submit" class="btn btn-success">Actualizar</button>
      </div>
      <input type="hidden" name="id_programa" value="<?=$programa->id_programa?>">
    </form>
  </section>
  <br>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "verEst" && isset($_GET["id"])) :
  $grado =  ProgramaData::getById($_GET["id"]);
  $estudiantes = Est_graData::getAllByTeamId($_GET["id"]);
  $user = UserData::getById($_SESSION["user_id"]);
?>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <h1>Alumnos <small><?php echo "del " . $grado->nombre . " nivel " . $grado->nivel; ?></small></h1>
        <?php if ($user->kind) : ?>
          <a href="./?view=nuevoestu&id_grado=<?php echo $_GET["id"]; ?>" class="btn btn-info"><i class='fa fa-asterisk'></i> Nuevo Alumno</a> <?php endif; ?>
        <?php if (count($estudiantes) > 0) : ?>
          <a href="report/grado-word.php?id_grado=<?php echo $_GET["id"]; ?>" class="btn btn-info"><i class='fa fa-download'></i> Descargar</a>
        <?php endif; ?>
        <br><br>
        <?php
        if (count($estudiantes) > 0) {
          // si hay usuarios
        ?>
          <table class="table table-bordered table-hover">
            <thead>
              <th>Identificacion</th>
              <th>Nombre</th>
              <th>Genero</th>
            </thead>
            <?php
            foreach ($estudiantes as $estu) {
              $alumn = $estu->getAlumn();
            ?>
              <tr>
                <td><?php echo $alumn->dni ?></td>
                <td><?php echo $alumn->nombre . " " . $alumn->apellido_paterno . " " . $alumn->apellido_materno; ?></td>
                <td><?php echo $alumn->genero ?></td>
              </tr>
          <?php
            }
            echo "</table>";
          } else {
            echo "<p class='alert alert-danger'>No hay Alumnos</p>";
          }
          ?>
      </div>
    </div>
  </section>
<?php endif; ?>