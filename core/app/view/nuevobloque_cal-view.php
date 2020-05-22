<?php
$bloques=CursosData::getAll();
?>
<div class="row">
	<div class="col-md-12">
	<h1>Nuevo Bloque</h1>
	<br>
		<form class="form-horizontal" method="post" id="addcategory" action="./?action=agregarbloque_cal" role="form">

<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Curso*</label>
    <div class="col-md-6">
      <select name="nom_cal" class="form-control">

        <option value="">selecione un curso</option>
        <?php foreach ($bloques as $bloq):
         ?>
        <option value="<?php echo $bloq->nombre?>"><?php echo $bloq->nombre ?></option>
      <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="id_grado" value="<?php echo $_GET["id_grado"];?>">
      <button type="submit" class="btn btn-primary">Agregar Bloque</button>
    </div>
  </div>
</form>
	</div>
</div>