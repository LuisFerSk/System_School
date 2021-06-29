<?php
if (!isset($_SESSION["id"])) :
  Core::redir("./");
endif;

$user = UserData::getById($_SESSION["id"]);

if ($user == null) :
  Core::redir("./");
endif;

if (isset($_GET["opt"]) && $_GET["opt"] == "user" && isset($_POST["id"])) : ?>
  <section class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="btn-group pull-right">
          <p>aqui va lo que trabajo leo -></p>
        </div>
      </div>
    </div>
  </section>

<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "all" && stristr($user->kind, '1')) : ?>
  <section class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="btn-group pull-right">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenterim">
            <i class="fa  fa-exclamation-circle"></i> Importante
          </button>
          <!-- Modal -->
          <div class="modal fade" id="exampleModalCenterim" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-body ">
                  <div>Nota:
                    <p>Tenga en cuenta que al agregar un usuario como nuevo Administrador, este tendra todos los siguientes previlegios:
                    <ul>
                      <li>agregar, editar y eliminar todos los datos</li>
                      <li>cambiar todas las configuraciones</li>
                    </ul>
                    </p>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Entendido</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <h2>Lista de Administradores</h2>
        <br><br>
        <?php $users = UserData::getAll();
        if (count($users) > 0) : ?>
          <div class="box box-info">
            <table class="table table-bordered datatable table-hover">
              <thead>
                <th>Nombre completo</th>
                <th>Email</th>
                <th><i class="fa fa-cog fa-spin fa-1x fa-fw"></i> Acciones</th>
              </thead>
              <?php foreach ($users as $user) :
                if (stristr($user->kind, '1')) : ?>
                  <tr>
                    <td><?php echo $user->nombre . " " . $user->apellidos; ?></td>
                    <td><?php echo $user->email; ?></td>
                    <td style="width:120px;">
                      <a href="./?view=users&opt=edit&id=<?php echo $user->id; ?>" class="btn btn-warning btn-xs">Editar</a>
                    </td>
                  </tr>
              <?php endif;
              endforeach; ?>
            </table>
          </div>
        <?php else : ?>
          <p class="alert alert-warning">No hay usuarios.</p>
        <?php endif; ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <br>
        <div class="btn-group pull-right">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCentera">
            <i class="fa fa-question-circle"></i> Ayuda
          </button>
          <!-- Modal -->
          <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">Agregar Administrador</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Para agregar otro administrador haga click en el boton <span class=" btn btn-warning">Agregar administrador <i class="fa fa-arrow-right"></i></span> que aparece en la lista de usuarios
                  <br>
                  <br>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Entendido</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        $users = UserData::getAll();
        if (count($users) > 0) : ?>
          <h2> Lista de Usuarios</h2>
          <div class="box box-info">
            <table class="table table-bordered datatable table-hover">
              <thead>
                <th></th>
                <th>DNI</th>
                <th>Informacion</th>
                <th>Rol</th>
                <th><i class="fa fa-cog fa-spin fa-1x fa-fw"></i> Acciones</th>
              </thead>
              <?php foreach ($users as $user) : ?>
                <tr>
                  <td style="width:130px;"><a href="./?action=select_userprof&id=<?php echo $user->id; ?>" class="btn btn-warning btn-xs">Agregar administrador <i class="fa fa-arrow-right"></i></a></td>
                  <td><?php echo $user->dni ?></td>
                  <td>
                    <p><strong>Nombre:</strong> <?php echo $user->nombre . " " . $user->apellidos; ?></p>
                    <p><strong>Email:</strong> <?php echo $user->email; ?> </p>
                  </td>
                  <td>
                    <?php if (stristr($user->kind, '1')) : ?>
                      <p>Administrador</p>
                    <?php endif;
                    if (stristr($user->kind, '2')) : ?>
                      <p>Profesor</p>
                    <?php endif;
                    if (stristr($user->kind, '3')) : ?>
                      <p>Estudiante</p>
                    <?php endif; ?>
                  </td>
                  <td style="width:120px;">
                    <a href="./?view=users&opt=edit&id=<?php echo $user->id; ?>" class="btn btn-warning">Editar</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
        <?php else : ?>
          <p class='alert alert-danger'>No hay Grupos</p>
        <?php endif; ?>
      </div>
    </div>
  </section>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "new") : ?>
  <br>
  <section class="container">
    <div class="row">
      <div class="col-md-12">
        <form class="form-horizontal" method="post" action="./?action=users&opt=add" role="form">
          <div class="form-group">
            <label class="col-lg-2 control-label">Nombre*</label>
            <div class="col-md-6">
              <input type="text" name="nombre" class="form-control" placeholder="Nombre">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 control-label">Apellido*</label>
            <div class="col-md-6">
              <input type="text" name="apellidos" required class="form-control" placeholder="Apellido">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 control-label">Email*</label>
            <div class="col-md-6">
              <input type="text" name="email" class="form-control" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 control-label">Contrase&ntilde;a</label>
            <div class="col-md-6">
              <input type="password" name="password" class="form-control" placeholder="Contrase&ntilde;a">
            </div>
          </div>
          <input type="hidden" value="1" name="kind">
          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
              <button type="submit" class="btn btn-info">Agregar Usuario</button>
              <button type="button" onclick="location='./?view=users&opt=all'" class="btn btn-warning">Cancelar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <? elseif (isset($_GET["opt"]) && $_GET["opt"] == "edit" && isset($_POST["id"])) : ?>
  <div class="container">
    <?php $usuario = UserData::getById($_GET["id"]); ?>
    <div class="row">
      <div class="col-md-12">
        <h2>Editar Usuario</h2>
        <br>
        <form class="form-horizontal" method="post" action="./?action=users&opt=upd" role="form">
          <div class="form-group">
            <label class="col-lg-2 control-label">Nombre*</label>
            <div class="col-md-6">
              <input type="text" name="nombre" value="<?php echo $usuario->nombre; ?>" class="form-control" placeholder="Nombre">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 control-label">Apellidos*</label>
            <div class="col-md-6">
              <input type="text" name="apellidos" value="<?php echo $usuario->apellidos; ?>" required class="form-control" placeholder="Apellido">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 control-label">Email*</label>
            <div class="col-md-6">
              <input type="text" name="email" value="<?php echo $usuario->email; ?>" class="form-control" required placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 control-label">Contrase&ntilde;a</label>
            <div class="col-md-6">
              <input type="password" name="password" class="form-control" placeholder="Contrase&ntilde;a">
              <p class="help-block">La contrase&ntilde;a solo se modificara si escribes algo, en caso contrario no se modifica.</p>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
              <input type="hidden" name="id" value="<?php echo $usuario->id; ?>">
              <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
              <button type="button" onclick="location='./?view=users&opt=all'" class="btn btn-warning">Cancelar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endif; ?>