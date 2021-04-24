<?php
if (!isset($_SESSION["id"])) {
  Core::redir("./");
}
$user = UserData::getById($_SESSION["id"]);
// si el id  del usuario no existe.
if ($user == null) {
  Core::redir("./");
}
if (isset($_GET["opt"]) && $_GET["opt"] == "user") : ?>
  <section class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="btn-group pull-right">
        
        </div>
      </div>
    </div>
  </section>

<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "all") : ?>
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
                    <p>Tenga en cuenta que al agregar un usuario como nuevo superusuario(Usuario Administrador), este tendra todos los siguientes previlegios:
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
        <h2>Lista de SuperUsuarios</h2>
        <br><br>
        <?php
        $users = UserData::getAll();
        if (count($users) > 0) {
        ?>
          <div class="box box-info">
            <table class="table table-bordered datatable table-hover">
              <thead>
                <th>Nombre completo</th>
                <th>Nombre de usuario</th>
                <th><i class="fa fa-cog fa-spin fa-1x fa-fw"></i> Acciones</th>
              </thead>
              <?php
              foreach ($users as $user) {
                if ($user->kind == 1) {
                  # code...
              ?>
                  <tr>
                    <td><?php echo $user->name . " " . $user->lastname; ?></td>
                    <td><?php echo $user->username; ?></td>
                    <td style="width:120px;">
                      <a href="./?view=users&opt=edit&id=<?php echo $user->id; ?>" class="btn btn-warning btn-xs">Editar</a>
                      <!-- <a href="./?action=users&opt=del&id=<?php echo $user->id; ?>" class="btn btn-danger btn-xs">Eliminar</a> -->
                    </td>
                  </tr>
              <?php
                }
              }
              echo "</table></div>";
            } else {
              ?>
              <p class="alert alert-warning">No hay usuarios.</p>
            <?php
            }
            ?>
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
            <div class="modal fade" id="exampleModalCentera" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Agregar Administrador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Para agregar otro administrador haga click en el boton <span class=" btn btn-warning">Agregar administrador <i class="fa fa-arrow-right"></i></span> que aparece en la lista de profesores
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
          $profesores = UserData::getAll();
          if (count($profesores) > 0) {
          ?>
            <h2> Lista de Profesores</h2>
            <table class="table table-bordered table-hover">
              <thead>
                <th></th>
                <th>DNI</th>
                <th>Nombres y Apellidos</th>
              </thead>
              <?php
              foreach ($profesores as $prof) {
              ?>
                <tr>
                  <td style="width:130px;"><a href="./?action=select_userprof&id=<?php echo $prof->id_prof; ?>" class="btn btn-warning btn-xs">Agregar administrador <i class="fa fa-arrow-right"></i></a></td>
                  <td><?php echo $prof->dni ?></td>
                  <td><?php echo $prof->nombres . " " . $prof->primer_apelldio . " " . $prof->segundo_apellido; ?></td>
                </tr>
              <?php
              }
              ?>
            </table>
          <?php
          } else {
            echo "<p class='alert alert-danger'>No hay Grupos</p>";
          }
          ?>
        </div>
      </div>
  </section>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "new") : ?>
  <br>
  <section class="container">
    <div class="row">
      <div class="col-md-12">
        <form class="form-horizontal" method="post" id="addproduct" action="./?action=users&opt=add" role="form">
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
            <div class="col-md-6">
              <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
            <div class="col-md-6">
              <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellido">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Nombre de usuario*</label>
            <div class="col-md-6">
              <input type="text" name="username" class="form-control" required id="username" placeholder="Nombre de usuario">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
            <div class="col-md-6">
              <input type="text" name="email" class="form-control" id="email" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Contrase&ntilde;a</label>
            <div class="col-md-6">
              <input type="password" name="password" class="form-control" id="inputEmail1" placeholder="Contrase&ntilde;a">
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
  <? elseif (isset($_GET["opt"]) && $_GET["opt"] == "edit") : ?>
  <div class="container">
    <?php $user = UserData::getById($_GET["id"]); ?>
    <div class="row">
      <div class="col-md-12">
        <h2>Editar Usuario</h2>
        <br>
        <form class="form-horizontal" method="post" id="addproduct" action="./?action=users&opt=upd" role="form">
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
            <div class="col-md-6">
              <input type="text" name="name" value="<?php echo $user->name; ?>" class="form-control" id="name" placeholder="Nombre">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
            <div class="col-md-6">
              <input type="text" name="lastname" value="<?php echo $user->lastname; ?>" required class="form-control" id="lastname" placeholder="Apellido">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Nombre de usuario*</label>
            <div class="col-md-6">
              <input type="text" name="username" value="<?php echo $user->username; ?>" class="form-control" required id="username" placeholder="Nombre de usuario">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
            <div class="col-md-6">
              <input type="text" name="email" value="<?php echo $user->email; ?>" class="form-control" id="email" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Contrase&ntilde;a</label>
            <div class="col-md-6">
              <input type="password" name="password" class="form-control" id="inputEmail1" placeholder="Contrase&ntilde;a">
              <p class="help-block">La contrase&ntilde;a solo se modificara si escribes algo, en caso contrario no se modifica.</p>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
              <input type="hidden" name="user_id" value="<?php echo $user->id; ?>">
              <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
              <button type="button" onclick="location='./?view=users&opt=all'" class="btn btn-warning">Cancelar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endif; ?>