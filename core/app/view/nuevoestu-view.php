<section class="container">

  <h3>Agregar Estudiante</h3>
  <br>
  <form method="POST" action="./?action=addest">
    <?php $estado=EstadoData::getAll();
    $genero=GeneroData::getAll(); ?>
  <div class="form-row">
  <div class="form-group col-md-3">
      <label for="inputEmail4">DNI:</label>
      <input type="tex" name="dni" class="form-control" id="inputEmail4" placeholder="Numero de DNI">
    </div>
    <div class="form-group col-md-3">
      <label for="inputEmail4">Apellido Paterno:</label>
      <input type="text" name="apellido_paterno" class="form-control" id="inputEmail4" placeholder="Apellido paterno">
    </div>
    <div class="form-group col-md-3">
      <label for="inputEmail4">Apellido Materno:</label>
      <input type="text" name="apellido_materno" class="form-control" id="inputEmail4" placeholder="Apellido materno">
    </div>
    <div class="form-group col-md-3">
      <label for="inputEmail4">Nombres:</label>
      <input type="text" name="nombre" class="form-control" id="inputEmail4" placeholder="Nombres">
    </div>
    <div class="form-group col-md-3">
                <label>Fecha de Nacimiento:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="fecha_nac" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
        <div class="form-group col-md-3">
      <label for="inputState">Genero:</label>
      <select id="inputState" name="genero" class="form-control">
        <option selected>Seleccione....</option>
        <?php foreach($genero as $gene):?>
      <option value="<?php echo($gene->genero); ?>"><?php echo $gene->genero?></option>
      <?php endforeach;?>
      </select>
  </div>
    <div class="form-group col-md-3">
      <label for="inputEmail4">Numero / Cel:</label>
      <input type="text" name="num_cel" class="form-control" id="inputEmail4" placeholder="999999999">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Direccion:</label>
      <input type="text" name="direccion" class="form-control" id="inputEmail4" placeholder="Av. ejemplo 215">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Apoderado(a)</label>
      <input type="text" name="apoderado" class="form-control" id="inputEmail4" placeholder="apoderado">
    </div>
     <div class="form-group col-md-3">
      <label for="inputState">Estado:</label>
      <select id="inputState" name="estado" class="form-control">
        <option selected>Seleccione....</option>
        <?php foreach($estado as $esta):?>
      <option value="<?php echo($esta->nombre); ?>"><?php echo $esta->nombre?></option>
      <?php endforeach;?>
      </select>
  </div>
  </div>
  <div class=" col-lg-10">
    <input type="hidden" name="id_grado" value="<?php echo $_GET["id_grado"];?>">
  <button type="submit" class="btn btn-success">Agregar</button>
  <button type="button" onclick = "location='./?view=a_academico&opt=all'" class="btn btn-warning">Cancelar</button>
</div>
</form>
    </section>