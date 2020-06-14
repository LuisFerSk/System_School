<?php if (isset($_GET["opt"]) && $_GET["opt"] == "all") :
  $curso = CursosData::getAll();
?>
  <section class="content-header">
    <h1>
      Grupo
      <small>Todo los grupos</small>
    </h1>
    <br>
    <a href="./?view=cursos&opt=new" class="btn btn-primary">Nuevo</a>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <?php if (count($curso) > 0) : ?>
              <table class="table table-bordered table-hover" id="table">
                <thead>
                  <tr>
                    <th scope="col">Numero</th>
                    <th scope="col">Asignatura</th>
                    <th scope="col">Profesor Encargado</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($curso as $cu) : ?>
                    <tr>
                      <td><?= $cu->id_curso; ?></td>
                      <td><?= $cu->nombre; ?></td>
                      <?php $profesor = ProfesoresData::getById($cu->profesor); ?>
                      <td><?= $profesor->nombres; ?></td>
                      <td style="width: 250px;">
                      <a href="./?view=abrirestu&id=<?= $cu->id_curso; ?>" class="btn btn-primary btn-xs"><i class="fa fa-user"></i> Agregar estudiante</a>
                        <a href="./?view=cursos&opt=edit&id=<?= $cu->id_curso; ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Editar</a>
                        <a href="./?action=cursos&opt=del&id=<?= $cu->id_curso; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o fa-lg"></i> Eliminar</a>
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
  </section>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "new") : ?>
  <section class="container">
    <h3>Agregar grupo</h3>
    <br>
    <form method="POST" action="./?action=cursos&opt=add">
      <?php $prof = ProfesoresData::getAll(); ?>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Nombre:</label>
          <input type="tex" name="nombre" class="form-control" id="inputEmail4" placeholder="Nombre el curso">
        </div>
        <div class="form-group col-md-6">
          <label for="inputState">Profesor:</label>
          <select id="inputState" name="profesor" class="form-control">
            <option selected>Seleccione....</option>
            <?php foreach ($prof as $pro) : ?>
              <option value="<?php echo ($pro->id_prof); ?>"><?php echo $pro->nombres ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class=" col-lg-10">
          <button type="submit" class="btn btn-success">Agregar</button>
          <button type="button" onclick="location='./?view=cursos&opt=all'" class="btn btn-warning">Cancelar</button>
        </div>
      </div>
    </form>
  </section>
  <br>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "edit") :
  $curso = CursosData::getById($_GET["id"]);
?>
  <section class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>editar Alumnos</h1>
        <br>
        <form method="POST" action="./?action=cursos&opt=upd">
          <?php $prof = ProfesoresData::getAll(); ?>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">Nombre:</label>
              <input type="text" name="nombre" required value="<?= $curso->nombre; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group col-md-6">
              <label for="inputState">Profesor:</label>
              <select id="inputState" name="profesor" class="form-control">
                <option selected>Seleccione....</option>
                <?php foreach ($prof as $pro) : ?>
                  <option value="<?php echo ($pro->id_prof); ?>"><?php echo $pro->nombres ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <input type="hidden" name="id" value="<?= $curso->id_curso; ?>">
            <div class=" col-lg-10">
              <button type="submit" class="btn btn-success">Actualizar</button>
              <button type="button" onclick="location='./?view=cursos&opt=all'" class="btn btn-warning">Cancelar</button>
            </div>
          </div>
        </form>
  </section>
  <br>
<?php endif; ?>