<?php 
$grados = GradData::getById($_GET["id"]);
$nivel=NivelesData::getAll();
?>
<div class="row">
	<div class="col-md-12">
	<h1>Editar Programa</h1>
	<br>
		<form class="form-horizontal" method="post" id="addcategory" action="./?action=updategrado" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Programa*</label>
    <div class="col-md-6">
      <input type="text" name="nombre" required value="<?php echo $grados->nombre; ?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <div class="checkbox">
        <label>
          <input type="hidden" name="fav" <?php if($grados->fav){ echo "checked"; }?>>
        </label>
      </div>
    </div>
  </div>
    <div class="form-group">
      <div class="col-lg-offset-2 col-lg-5">
      <label for="exampleInputEmail1">Facultad</label>
        <select name="nivel" class="form-control">
      <option value="">--seleccione--</option>
      <?php foreach($nivel as $ni):?>
      <option value="<?php echo($ni->nombre); ?>"><?php echo $ni->nombre?></option>
      <?php endforeach;?>
    </select>
    </div>
    </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="id_grado" value="<?php echo $grados->id_grado; ?>">
      <button type="submit" class="btn btn-primary">Actualizar Programa</button>
    </div>
  </div>
</form>
	</div>
</div>