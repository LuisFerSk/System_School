<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="index.php?view=newteam" class="btn btn-default"><i class='fa fa-th-list'></i> Nuevo Grupo</a>
</div>
		<h1>Grupos</h1>
<br>
		<?php

		$grados = GradosData::getAllByUserId($_SESSION["user_id"]);
		if(count($grados)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th></th>
			<th>Nombre</th>
			<th></th>
			</thead>
			<?php
			foreach($grados as $grado){
				?>
				<tr>
				<td style="width:130px;"><a href="./?action=selectteam&id=<?php echo $grado->id_grado;?>" class="btn btn-default btn-xs">Seleccionar <i class="fa fa-arrow-right"></i></a></td>
				<td><a href="./?view=grado&id=<?php echo $grado->id;?>"><?php echo $grado->nombre." ".$grado->nivel; ?></a></td>				
				<td style="width:130px;"><a href="index.php?view=editteam&id=<?php echo $grado->id;?>" class="btn btn-warning btn-xs">Editar</a> <a href="index.php?view=delteam&id=<?php echo $grado->id;?>" class="btn btn-danger btn-xs">Eliminar</a></td>
				</tr>
				<?php

			}
			echo "</table>";

		}else{
			echo "<p class='alert alert-danger'>No hay Grupos</p>";
		}


		?>


	</div>
</div>
