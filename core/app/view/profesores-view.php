<?php if (isset($_GET["opt"]) && $_GET["opt"] == "all") :
  $profesor = UserData::getAllProfesor();
?>
  <section class="content-header">
    <h1>
      Profesores
      <small>Lista de profesores</small>
    </h1>
    <br>
    <a href="./?view=profesores&opt=new" class="btn btn-primary">Nuevo Registro</a>
  </section>
  <br>
  <section class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <?php if (count($profesor) > 0) : ?>
              <table class="table table-bordered table-hover" id="table">
                <thead>
                  <tr>
                    <th scope="col">DNI</th>
                    <th scope="col">Nombres y Apellidos</th>
                    <th scope="col">Email</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Operaciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($profesor as $prof) : ?>
                    <tr>
                      <td><?= $prof->dni; ?></td>
                      <td><?= $prof->nombre . " " . $prof->apellidos; ?></td>
                      <td><?= $prof->email; ?></td>
                      <td><?= $prof->estado; ?>
                      <td style="width: 100px;">
                        <div class="btn-group">
                          <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Acciones <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="./?view=profesores&opt=edit&id=<?= $prof->id; ?>"><i class="fas fa-pen"></i> Editar</a></li>
                            <!-- <li><a href="./?action=profesores&opt=del&id=<?= $prof->id; ?>"><i class="fa fa-trash-o fa-fw"></i> Eliminar</a></li> -->
                          </ul>
                        </div>
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
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "new") :
  $estado = EstadoData::getAll();
?>
  <section class="content-header">
    <h1>
      Registrar profesor
      <small>Digite la información</small>
    </h1>
  </section>
  <br>
  <section class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <form method="POST" action="./?action=profesores&opt=add">
              <div class="form-row clearfix">
                <div class="form-group col-md-3">
                  <label>DNI:</label>
                  <input type="tex" required name="dni" class="form-control" placeholder="Numero de DNI">
                </div>
                <div class="form-group col-md-3">
                  <label>Nombres:</label>
                  <input type="text" required name="nombre" class="form-control" placeholder="Nombres y Apellidos">
                </div>
                <div class="form-group col-md-3">
                  <label>Apellidos:</label>
                  <input type="text" required name="apellidos" class="form-control" placeholder="Apellidos">
                </div>
                <div class="form-group col-md-3">
                  <label>Contraseña:</label>
                  <input type="password" required name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group col-md-9">
                  <label>Email</label>
                  <input type="email" required name="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
                <div class="form-group col-md-3">
                  <label>Estado:</label>
                  <select required name="estado" class="form-control">
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
          </div>
        </div>
      </div>
    </div>
  </section>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "edit") :
  $profesor = UserData::getById($_GET["id"]);
  $estado = EstadoData::getAll();
?>
  <section class="content-header">
    <h1>
      Actualizar profesor
      <small>Digite la información</small>
    </h1>
  </section>
  <br>
  <section class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <form method="POST" action="./?action=profesores&opt=upd">
              <div class="form-row clearfix">
                <div class="form-group col-md-3">
                  <label>DNI:</label>
                  <input type="tex" value="<?= $profesor->dni; ?>" name="dni" class="form-control" placeholder="Numero de DNI">
                </div>
                <div class="form-group col-md-3">
                  <label>Nombres:</label>
                  <input type="text" value="<?= $profesor->nombre; ?>" name="nombre" class="form-control" placeholder="Nombres y Apellidos">
                </div>
                <div class="form-group col-md-6">
                  <label>Apellidos:</label>
                  <input type="text" value="<?= $profesor->apellidos; ?>" name="apellidos" class="form-control" placeholder="Primer apellido">
                </div>
                <div class="form-group col-md-9">
                  <label>Email</label>
                  <input type="email" value="<?= $profesor->email ?>" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group col-md-3">
                  <label>Estado:</label>
                  <select name="estado" class="form-control">
                    <?php foreach ($estado as $esta) :
                      if ($profesor->estado == $esta->nombre) : ?>
                        <option selected value="<?= $esta->nombre; ?>"><?= $esta->nombre; ?></option>
                      <?php else : ?>
                        <option value="<?= $esta->nombre; ?>"><?= $esta->nombre; ?></option>
                    <?php endif;
                    endforeach; ?>
                  </select>
                </div>
                <input type="hidden" name="id" value="<?= $profesor->id; ?>">
              </div>
              <div class=" col-lg-10">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <button type="button" onclick="location='./?view=profesores&opt=all'" class="btn btn-warning">Cancelar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>