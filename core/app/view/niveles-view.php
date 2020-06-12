<?php if (isset($_GET["opt"]) && $_GET["opt"] == "all") :
  $nivel = NivelesData::getAll();
?>
  <section class="content-header">
    <h1>
      Facultades
      <small>todas las facultades</small>
    </h1>
    <br>
    <a href="./?view=niveles&opt=new" class="btn btn-primary">Nuevo</a>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <?php if (count($nivel) > 0) : ?>
              <table class="table table-bordered table-hover" id="table">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">nombre</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($nivel as $ni) : ?>
                    <tr>
                      <td><?= $ni->id_nivel; ?></td>
                      <td><?= $ni->nombre; ?></td>
                      <td style="width: 130px;">
                        <a href="./?view=niveles&opt=edit&id=<?= $ni->id_nivel; ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Editar</a>
                        <a href="./?action=niveles&opt=del&id=<?= $ni->id_nivel; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o fa-lg"></i> Eliminar</a>
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
    <form method="POST" action="./?action=niveles&opt=add">
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="inputEmail4">Nombre:</label>
          <input type="tex" name="nombre" class="form-control" id="inputEmail4" placeholder="Nombre el curso">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </section>
  <br>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "edit") :
  $nivel = NivelesData::getById($_GET["id"]);
?>
  <section class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Editar Facultad</h1>
        <br>
        <form method="POST" action="./?action=niveles&opt=upd">
          <div class="form-group">
            <label for="exampleInputEmail1">Nombre:</label>
            <input type="text" name="nombre" required value="<?= $nivel->nombre; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <input type="hidden" name="id" value="<?= $nivel->id_nivel; ?>">
          <button type="submit" class="btn btn-success">Actualizar</button>
        </form>
        <br>
  </section>
  <br>
<?php endif; ?>