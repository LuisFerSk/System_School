<div class="row">
	<div class="col-md-12">
	<a href="./?view=est_gra&id=<?php echo $_GET["id_grado"]; ?>" class="btn pull-right btn-sm btn-default"><i class='fa fa-arrow-left'></i> Regresar</a>
		<h1>Lista de Asistencia</h1>
<!--	<a href="index.php?view=list&id_grado=<?php echo $_GET["id_grado"]; ?>" class="btn btn-default"><i class='fa fa-check'></i> Asistencia</a> -->
<form class="form-horizontal" id="loadlist" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Inicio/Fin:</label>
    <div class="col-lg-3">
      <input type="date" name="start_at" value="<?php echo date("Y-m-d");?>" required class="form-control" >
    </div>
    <div class="col-lg-3">
      <input type="date" name="finish_at" value="<?php echo date("Y-m-d");?>" required class="form-control" >
    </div>
    <div class="col-lg-offset-3">
    <input type="hidden" name="id_grado" value="<?php echo $_GET["id_grado"];?>">
      <button type="submit" class="btn btn-primary">Buscar</button>
    </div>

  </div>
</form>

<div id="data"> 
	<p class="alert alert-warning">No hay datos, por favor selecciona una fecha.</p>
</div>

	</div>
</div>

<script>
	$("#loadlist").submit(function(e){
		e.preventDefault();
		var d = $("#loadlist").serialize();
		$.get("./?action=listar_asis",d,function(data){
			console.log(data);
			$("#data").html(data);

		});
	});
</script>