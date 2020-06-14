<div class="row">
	<div class="col-md-12">
		<!--
<div class="btn-group pull-right">
	<a href="index.php?view=newteam" class="btn btn-default"><i class='fa fa-th-list'></i> Nuevo Grupo</a>
</div>
-->
		<h1>Seleccione un grupo para registrar la asistencia</h1>
<br>
		<?php

		$grados = CursosData::getAllByUserId($_SESSION["user_id"]);
		if(count($grados)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th></th>
			<th>Nombre</th>
			</thead>
			<?php
			foreach($grados as $grado){
				?>
				<tr>
				<td style="width:130px;"><a href="./?action=selectteamcur&id=<?php echo $grado->id_grado;?>" class="btn btn-default btn-xs">Seleccionar <i class="fa fa-arrow-right"></i></a></td>
				<td><?php echo $grado->nombre ?></td>				
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
