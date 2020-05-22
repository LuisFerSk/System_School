<?php
$bloques = Bloque_calData::getAllByTeamId($_GET["id_grado"]);
?>

<div class="row">
	<div class="col-md-12">
	<a href="./?view=est_gra&id=<?php echo $_GET["id_grado"]; ?>" class="btn pull-right btn-sm btn-default"><i class='fa fa-arrow-left'></i> Regresar</a>
		<h1>Calificaciones</h1>
        <?php if(count($bloques)>0):?>
<!--	<a href="index.php?view=list&id_grado=<?php echo $_GET["id_grado"]; ?>" class="btn btn-default"><i class='fa fa-check'></i> Asistencia</a> -->
<form class="form-horizontal" id="loadlist" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Seleccionar Curso:</label>
    <div class="col-lg-7">
    <select class="form-control" name="id_bloque" required>
    <option value="">-- SELECCIONE --</option>
    	<?php foreach($bloques as $bloq):?>
    		<option value="<?php echo $bloq->id; ?>"><?php echo $bloq->nom_cal; ?></option>
    	<?php endforeach; ?>
    </select>
    </div>
    <div class="col-lg-offset-3">
    <input type="hidden" name="id_grado" value="<?php echo $_GET["id_grado"];?>">
      <button type="submit" class="btn btn-default">Seleccionar</button>
    </div>

  </div>
</form>
<?php else:?>
    <p class="alert alert-danger">No hay cursos, por favor crea cursos para asignar calificaciones.</p>
<?php endif;?>
<div id="data">
	<p class="alert alert-warning">No hay datos, por favor selecciona un curso y de click en el boton buscar.</p>
</div>

	</div>
</div>

<script>
	$("#loadlist").submit(function(e){
		e.preventDefault();
		var d = $("#loadlist").serialize();
		$.get("./?action=cargarcalificacion",d,function(data){
			console.log(data);
			$("#data").html(data);

		});
	});
</script>