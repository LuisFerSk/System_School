
<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="./?view=nuevogrado" class="btn btn-success"><i class='fa  fa-plus'></i> Nuevo Grado</a>
</div>
		<h1>Grados</h1>
<br>
		<?php

		$grados = GradData::getAll();
		if(count($grados)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th></th>
			<th>Grado</th>
			<th>Nivel</th>
			<th><i class="fa fa-cog fa-spin fa-1x fa-fw"></i> Acciones</th>
			</thead>
			<?php
			foreach($grados as $grado){
				?>
				<tr>
				<td style="width:130px;"><a href="./?action=selectteam&id=<?php echo $grado->id_grado;?>" class="btn btn-default btn-xs">Seleccionar <i class="fa fa-arrow-right"></i></a></td>
				<td><a href="./?view=grado&id=<?php echo $grado->id;?>"><?php echo $grado->nombre; ?></a></td>
				<td><a href="./?view=grado&id=<?php echo $grado->id;?>"><?php echo $grado->nivel; ?></a></td>
				<td style="width:130px;"><a href="./?view=editargrado&id=<?php echo $grado->id_grado;?>" class="btn btn-warning btn-xs">Editar</a> <a href="./?action=borrargrado&id=<?php echo $grado->id_grado;?>" class="btn btn-danger btn-xs">Eliminar</a></td>
				</tr>

<?php
			}
			?>
		</table>

<?php
		}else{
			echo "<p class='alert alert-danger'>No hay Grupos</p>";
		}


		?>


	</div>
</div>
