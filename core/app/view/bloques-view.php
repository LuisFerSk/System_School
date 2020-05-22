<?php
$bloques = Bloque_calData::getAllByTeamId($_GET["id_grado"]);
?>
<div class="row">
	<div class="col-md-12">
		<h1>Bloque de calificaciones</h1>
	<a href="./?view=nuevobloque_cal&id_grado=<?php echo $_GET["id_grado"]; ?>" class="btn btn-success"><i class='fa fa-asterisk'></i> Nuevo Curso</a>
	<a href="./?view=est_gra&id=<?php echo $_GET["id_grado"]; ?>" class="btn pull-right btn-sm btn-info"><i class='fa fa-arrow-left'></i> Regresar</a>

<br><br>
		<?php

		if(count($bloques)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Cursos:</th>
			<th>acciones</th>
			</thead>
			<?php
			foreach($bloques as $al){
				?>
				<tr>
				<td><?php echo $al->nom_cal; ?></td>
				<td style="width:130px;"><a href="./?action=borrarbloque&id=<?php echo $al->id;?>" class="btn btn-danger btn-xs">Eliminar</a></td>
				</tr>
				<?php

			}

echo "</table>";

		}else{
			echo "<p class='alert alert-danger'>No hay Bloques</p>";
		}


		?>


	</div>
</div>