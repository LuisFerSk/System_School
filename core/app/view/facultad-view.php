<?php if (isset($_GET["opt"]) && $_GET["opt"] == "all") :
  $facultad = FacultadData::getAll();
?>
  <section class="content-header">
    <h1>
      Facultades
      <small>todas las facultades</small>
    </h1>
    <br>
    <a href="./?view=facultad&opt=new" class="btn btn-primary">Nuevo</a>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <?php if (count($facultad) > 0) : ?>
              <table class="table table-bordered table-hover" id="table">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">nombre</th>
                    <th scope="col">estado</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($facultad as $fd) : ?>
                    <tr>
                      <td><?= $fd->id_facultad; ?></td>
                      <td><?= $fd->nombre; ?></td>
                      <td><?= $fd->estado; ?></td>
                      <td style="width: 130px;">
                        <a href="./?view=facultad&opt=edit&id=<?= $fd->id_facultad; ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Editar</a>
                        <a href="./?action=niveles&opt=del&id=<?= $fd->id_facultad; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o fa-lg"></i> Eliminar</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            <?php else : ?>
              <div class="box-body">
                <p class="alert alert-warning">Aun no hay facultades registrados!</p>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <br>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "new") : ?>
  <section class="container">
    <h3>Agregar Facultad</h3>
    <br>
    <form method="POST" action="./?action=facultad&opt=add">
      <div class="form-row">
        <div class="form-group col-md-9">
          <label for="inputEmail4">Nombre:</label>
          <input type="tex" name="nombre" class="form-control" id="inputEmail4" placeholder="Nombre de la facultad">
        </div>
        <div class="form-group col-md-3">
          <label for="inputState">Estado:</label>
          <select id="inputState" name="estado" class="form-control">
            <option selected>Abierto</option>
            <option>Cerrado</option>
          </select>
        </div>
      </div>
      <div class=" col-lg-10">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="date" onclick="location='./?view=facultad&opt=all'" class="btn btn-warning">Cancelar</button>
      </div>
    </form>
  </section>
  <br>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "edit") :
  $facultad = FacultadData::getById($_GET["id"]);
?>
  <section class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Editar Facultad</h1>
        <br>
        <form method="POST" action="./?action=facultad&opt=upd">
          <div class="form-row">
            <div class="form-group col-md-9">
              <label for="exampleInputEmail1">Nombre:</label>
              <input type="text" name="nombre" required value="<?= $facultad->nombre; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group col-md-3">
              <label for="inputState">Estado:</label>
              <select id="inputState" name="estado" class="form-control">
                <option selected>Abierto</option>
                <option>Cerrado</option>
              </select>
            </div>
          </div>
          <div class=" col-lg-10">
            <input type="hidden" name="id" value="<?= $facultad->id_facultad; ?>">
            <button type="submit" class="btn btn-success">Actualizar</button>
            <button type="date" onclick="location='./?view=facultad&opt=all'" class="btn btn-warning">Cancelar</button>
          </div>
        </form>
        <br>
  </section>
  <br>
<?php endif; ?>