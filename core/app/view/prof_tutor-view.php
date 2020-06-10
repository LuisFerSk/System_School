<?php

if (!isset($_SESSION["user_id"])) {
  Core::redir("./");
}
$user = UserData::getById($_SESSION["user_id"]);
// si el id  del usuario no existe.
if ($user == null) {
  Core::redir("./");
}

if (isset($_GET["opt"]) && $_GET["opt"] == "all") : ?>
  <section class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Lista de Profesores</h2>
        <br><br>
        <?php
        $users = UserData::getAll();
        if (count($users) > 0) {
        ?>
          <div class="box box-info">
            <table class="table table-bordered datatable table-hover">
              <thead>
                <th>Codigo/Prof</th>
                <th>Nombre completo</th>
                <th>Nombre de usuario</th>
                <th>e-mail</th>
                <th></th>
              </thead>
              <?php
              foreach ($users as $user) {
                if (!$user->kind == 1) {
              ?>
                  <tr>
                    <td><?php echo $user->id_prof; ?></td>
                    <td><?php echo $user->name . " " . $user->lastname; ?></td>
                    <td><?php echo $user->username; ?></td>
                    <td><?php echo $user->email; ?></td>
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
            </table>
          </div>
      </div>
      <div class="col-md-12">
        <div class="btn-group pull-right">

          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
            <i class="fa fa-question-circle"></i> Ayuda
          </button>

          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  Para agregar un profesor como usuario haga click en el boton <span class="btn btn-success btn-xs">Agregar usuario<i class="fa fa-arrow-right"></i></span> en la lista de profesores
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Entendido</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <h2>Agregar Usuario</h2>
        <br>
        <?php

        $profesores = ProfesoresData::getAll();
        if (count($profesores) > 0) {
          // si hay usuarios
        ?>

          <table class="table table-bordered table-hover">
            <thead>
              <th></th>
              <th>Nombres y Apellidos</th>
      </thead>
      <?php
          foreach ($profesores as $prof) {

      ?>
        <tr>
        <td style=" width:130px;"><a href="./?action=selectprof&id=<?php echo $prof->id_prof; ?>" class="btn btn-success btn-xs">Agregar usuario <i class="fa fa-arrow-right"></i></a></td>
              <td><?php echo $prof->nombres . " " . $prof->apellidos; ?></td>
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
  <section class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Agregar Usuario</h2>
        <br>
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
          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
              <button type="submit" class="btn btn-info">Agregar Usuario</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>

<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "edit") : ?>
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
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endif; ?>