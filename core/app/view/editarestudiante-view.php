<?php
$estudiante = EstuData::getById($_GET["id"]);
?>
<section class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>editar Alumnos</h1>
      <br>
      <form method="POST" action="./?action=updatestudiante">
        <?php $estado = EstadoData::getAll();
        $genero = GeneroData::getAll(); ?>
        <div class="form-group">
          <div class="form-group col-md-3"> <label for="inputEmail4">DNI:</label>
            <input type="tex" value="<?= $estudiante->dni; ?>" name="dni" class="form-control" id="inputEmail4" placeholder="Numero de DNI">
          </div>
          <div class="form-group col-md-3">
            <label for="inputEmail4">Nombres:</label>
            <input type="text" value="<?= $estudiante->nombre; ?>" name="nombre" class="form-control" id="inputEmail4" placeholder="Nombres">
          </div>
          <div class="form-group col-md-3">
            <label for="inputEmail4">Apellido Paterno:</label>
            <input type="text" value="<?= $estudiante->apellido_paterno; ?>" name="apellido_paterno" class="form-control" id="inputEmail4" placeholder="Apellido paterno">
          </div>
          <div class="form-group col-md-3">
            <label for="inputEmail4">Apellido Materno:</label>
            <input type="text" value="<?= $estudiante->apellido_materno; ?>" name="apellido_materno" class="form-control" id="inputEmail4" placeholder="Apellido materno">
          </div>
          <div class="form-group col-md-3">
            <label for="inputState">Genero:</label>
            <select id="inputState" value="<?= $estudiante->genero; ?>" name="genero" class="form-control">
              <?php foreach ($genero as $gene) : ?>
                <option><?php echo $gene->genero ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="inputEmail4">Numero / Cel:</label>
            <input type="text" value="<?= $estudiante->num_cel; ?>" name="num_cel" class="form-control" id="inputEmail4" placeholder="999999999">
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Direccion:</label>
            <input type="text" value="<?= $estudiante->direccion; ?>" name="direccion" class="form-control" id="inputEmail4" placeholder="Av. ejemplo 215">
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Apoderado(a)</label>
            <input type="text" value="<?= $estudiante->apoderado; ?>" name="apoderado" class="form-control" id="inputEmail4" placeholder="apoderado">
          </div>
          <div class="form-group col-md-3">
            <label>Fecha de Nacimiento:</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" value="<?= $estudiante->fecha_nac; ?>p" name="fecha_nac" class="form-control">
            </div>
            <!-- /.input group -->
          </div>
          <div class="form-group col-md-3">
            <label for="inputState">Estado:</label>
            <select id="inputState" value="<?php echo ($esta->nombre); ?>" name="estado" class="form-control">
              <?php foreach ($estado as $esta) : ?>
                <option><?php echo $esta->nombre ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <input type="hidden" name="id" value="<?= $estudiante->id_estudiante; ?>">
        <div class=" col-lg-10">
          <input type="hidden" name="alumn_id" value="<?php echo $_GET["id"]; ?>">
          <input type="hidden" name="tid" value="<?php echo $_GET["tid"]; ?>">
          <button type="submit" class="btn btn-success">Actualizar</button>
          <button type="button" onclick="location='./?view=a_academico&opt=all'" class="btn btn-warning">Cancelar</button>
        </div>
      </form>
</section>