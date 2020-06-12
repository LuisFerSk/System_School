<section class="container">
  <h3>Agregar programa</h3>
  <br>
  <form method="POST" action="./?action=grados&opt=add">
    <?php
    $nivel = NivelesData::getAll();
    $grado = GradData::getAll();
    $profesor = ProfesoresData::getAll(); ?>
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="exampleInputEmail1">Nombre del programa</label>
        <input type="text" name="nombre" class="form-control">
        <label for="exampleInputEmail1">Facultad</label>
        <select name="nivel" class="form-control">
          <option value="">--seleccione--</option>
          <?php foreach ($nivel as $ni) : ?>
            <option value="<?php echo ($ni->nombre); ?>"><?php echo $ni->nombre ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <input type="hidden" name="fav">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
</section>
<br>