<?php if (isset($_GET["opt"]) && $_GET["opt"] == "all") :
  $grado = GradosData::getAll();
?>
  <section class="content-header">
    <h1>
      Programas
      <small>Todo los programas</small>
    </h1>
    <br>
    <a href="./?view=nuevogrado" class="btn btn-primary">Nuevo Registros</a>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <?php if (count($grado) > 0) : ?>
              <table class="table table-bordered table-hover" id="table">
                <thead>
                  <tr>
                    <th scope="col">id_programa</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Facultad</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($grado as $gra) : ?>
                    <tr>
                      <td><?= $gra->id_grado; ?></td>
                      <td><?= $gra->nombre; ?></td>
                      <td><?= $gra->nivel; ?></td>
                      <td style="width: 250px;">
                        <a href="./?view=grados&opt=verEst&id=<?= $gra->id_grado; ?>" class="btn btn-primary btn-xs"><i class="fa fa-users fa-lg"></i> Ver estudiantes</a>
                        <a href="./?view=grados&opt=edit&id=<?= $gra->id_grado; ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Editar</a>
                        <a href="./?action=grados&opt=del&id=<?= $gra->id_grado; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o fa-lg"></i> Eliminar</a>
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
    <form method="POST" action="./?action=grados&opt=add">
      <?php
      $nivel = NivelesData::getAll(); ?>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="inputEmail4">Grado:</label>
          <input type="tex" name="nombre" class="form-control" id="inputEmail4" placeholder="Ingrese el grado">
          <label for="exampleInputEmail1">Nivel</label>
          <select name="nivel" class="form-control">
            <option value="">--seleccione--</option>
            <?php foreach ($nivel as $ni) : ?>
              <option value="<?php echo ($ni->nombre); ?>"><?php echo $ni->nombre ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </section>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "edit") :
  $grado = GradosData::getById($_GET["id"]);
?>
  <section class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Editar programa</h1>
        <br>
        <form method="POST" action="./?action=grados&opt=upd">
          <div class="form-group">
            <label for="exampleInputEmail1">Nombre:</label>
            <input type="text" name="nombre" required value="<?= $grado->nombre; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <input type="hidden" name="id" value="<?= $grado->id_grado; ?>">
          <button type="submit" class="btn btn-success">Actualizar</button>
        </form>
  </section>
  <br>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "verEst" && isset($_GET["id"])) :
  $grado =  GradosData::getById($_GET["id"]);
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