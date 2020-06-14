<?php if (isset($_GET["opt"]) && $_GET["opt"] == "all") :
  $profesor = ProfesoresData::getAll();
?>
  <section class="content-header">
    <h1>
      Profesores
      <small>Lista de profesores</small>
    </h1>
    <br>
    <a href="./?view=profesores&opt=new" class="btn btn-success">Nuevo Registro</a>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <?php if (count($profesor) > 0) : ?>
              <table class="table table-bordered table-hover" id="table">
                <thead>
                  <tr>
                    <th scope="col">DNI</th>
                    <th scope="col">Nombres y Apellidos</th>
                    <th scope="col">E_mail</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Operaciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($profesor as $prof) : ?>
                    <tr>
                      <td><?= $prof->dni; ?></td>
                      <td><?= $prof->nombres . " " . $prof->primer_apellido . " " . $prof->segundo_apellido; ?></td>
                      <td><?= $prof->email; ?></td>
                      <td><?= $prof->estado; ?>
                      <td style="width: 130px;">
                        <div class="btn-group">
                          <a class="btn btn-info " href="#"><i class="fa fa-cog fa-spin fa-1x fa-fw"></i> Acciones</a>
                          <a class="btn btn-warning dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                          </a>
                          <ul class="dropdown-menu">
                            <li><a href="./?view=profesores&opt=edit&id=<?= $prof->id_prof; ?>"><i class=" fa fa-pencil fa-fw"></i> Editar</a></li>
                            <li><a href="./?action=profesores&opt=del&id=<?= $prof->id_prof; ?>"><i class="fa fa-trash-o fa-fw"></i> Eliminar</a></li>
                          </ul>
                        </div>
                      </td>
                      <td>
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
  <br>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "new") :
  $estado = EstadoData::getAll();
?>
  <section class="container">
    <h3>Agregar Profesor</h3>
    <br>
    <form method="POST" action="./?action=profesores&opt=add">
      <div class="form-row">
        <div class="form-group col-md-3">
          <label for="inputEmail4">DNI:</label>
          <input type="tex" name="dni" class="form-control" placeholder="Numero de DNI">
        </div>
        <div class="form-group col-md-3">
          <label for="inputEmail4">Nombres:</label>
          <input type="text" name="nombres" class="form-control" placeholder="Nombres y Apellidos">
        </div>
        <div class="form-group col-md-3">
          <label for="inputEmail4">Primer apellido:</label>
          <input type="text" name="primer_apellido" class="form-control" placeholder="Primer apellido">
        </div>
        <div class="form-group col-md-3">
          <label for="inputEmail4">Segundo apellido:</label>
          <input type="text" name="segundo_apellido" class="form-control" placeholder="Segundo apellido">
        </div>
        <div class="form-group col-md-9">
          <label for="inputEmail4">Email</label>
          <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
        </div>
        <div class="form-group col-md-3">
          <label>Estado:</label>
          <select name="estado" class="form-control">
            <?php foreach ($estado as $esta) : ?>
              <option><?php echo $esta->nombre; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class=" col-lg-10">
        <button type="submit" class="btn btn-success">Guardar</button>
        <button type="button" onclick="location='./?view=profesores&opt=all'" class="btn btn-warning">Cancelar</button>
      </div>
    </form>
  </section>
  <br>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "edit") :
  $profesor = ProfesoresData::getById($_GET["id"]);
  $estado = EstadoData::getAll();
?>
  <section class="container">
    <h3>Agregar Profesor</h3>
    <br>
    <form method="POST" action="./?action=profesores&opt=upd">
      <div class="form-row">
        <div class="form-group col-md-3">
          <label>DNI:</label>
          <input type="tex" value="<?= $profesor->dni; ?>" name="dni" class="form-control" placeholder="Numero de DNI">
        </div>
        <div class="form-group col-md-3">
          <label>Nombres:</label>
          <input type="text" value="<?= $profesor->nombres; ?>" name="nombres" class="form-control" placeholder="Nombres y Apellidos">
        </div>
        <div class="form-group col-md-3">
          <label>Primer apellido:</label>
          <input type="text" value="<?= $profesor->primer_apellido; ?>" name="primer_apellido" class="form-control" placeholder="Primer apellido">
        </div>
        <div class="form-group col-md-3">
          <label>Segundo apellido:</label>
          <input type="text" value="<?= $profesor->segundo_apellido; ?>" name="segundo_apellido" class="form-control" placeholder="Segundo apellido">
        </div>
        <div class="form-group col-md-9">
          <label>Email</label>
          <input type="email" value="<?= $profesor->email ?>" name="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group col-md-3">
          <label>Estado:</label>
          <select name="estado" class="form-control">
            <?php foreach ($estado as $esta) :
              if ($estu->estado == $esta->nombre) : ?>
                <option selected value="<?= $esta->nombre; ?>"><?= $esta->nombre; ?></option>
              <?php else : ?>
                <option value="<?= $esta->nombre; ?>"><?= $esta->nombre; ?></option>
            <?php endif;
            endforeach; ?>
          </select>
        </div>
        <input type="hidden" name="id" value="<?= $profesor->id_prof; ?>">
      </div>
      <div class=" col-lg-10">
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <button type="button" onclick="location='./?view=profesores&opt=all'" class="btn btn-warning">Cancelar</button>
      </div>
    </form>
  </section>
  <br>
<?php endif; ?>