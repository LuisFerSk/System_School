    <section class="container">

  <h3>Agregar Grados</h3>
  <br>
  <form method="POST" action="./?view=agregargrado">
    <?php
      $nivel=NivelesData::getAll();
      $grado=GradData::getAll();
      $profesor=ProfesoresData::getAll();?>
  <div class="form-row">
  <div class="form-group col-md-12">
      <label for="exampleInputEmail1">Grado</label>
        <input type="text" name="nombre" class="form-control">
      <label for="exampleInputEmail1">Nivel</label>
        <select name="nivel" class="form-control">
      <option value="">--seleccione--</option>
      <?php foreach($nivel as $ni):?>
      <option value="<?php echo($ni->nombre); ?>"><?php echo $ni->nombre?></option>
      <?php endforeach;?>
    </select>
</div>


  <div class="form-group col-md-12">
     <label for="exampleInputEmail1">Profesor (Tutor)</label>
        <select name="id_prof" class="form-control">
      <option value="">--seleccione--</option>
      <?php foreach($profesor as $profe):?>
      <option value="<?php echo($profe->id_prof); ?>"><?php echo $profe->nombres?></option>
      <?php endforeach;?>
    </select>
    </div>

          <div class="checkbox">
        <label>
          <input type="checkbox" name="fav"> Tutor
        </label>
      </div>

  </div>
 <button type="submit" class="btn btn-primary">Guardar</button>
</form>
    </section>