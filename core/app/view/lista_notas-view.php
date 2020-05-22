<?php
$blocks = Bloque_calData::getAllByTeamId($_GET["id_grado"]);
?>
<div class="row">
	<div class="col-md-12">
		<h1>Calificaciones</h1>
		<?php if(count($blocks)>0):?>
			<a href="./report/notas-word.php?id_grado=<?php echo $_GET["id_grado"]; ?>" class="btn btn-default"><i class="fa fa-download"></i> Descargar</a>
			<a href="./?view=est_gra&id=<?php echo $_GET["id_grado"]; ?>" class="btn pull-right btn-sm btn-info"><i class='fa fa-arrow-left'></i> Regresar</a>
		<?php endif; ?>
		<br><br>
		<?php

		$alumns = Est_graData::getAllByTeamId($_GET["id_grado"]);
		if(count($alumns)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<?php foreach($blocks as $block):?>
				<th><?php echo $block->nom_cal; ?></th>
			<?php endforeach; ?>

			</thead>
			<?php
			foreach($alumns as $al){
				$alumn = $al->getAlumn();
				?>
				<tr>
				<td><?php echo $alumn->nombre." ".$alumn->apellido_paterno." ".$alumn->apellido_materno; ?></td>
			<?php foreach($blocks as $block):
			$nota = CalificacionData::getByBA($block->id, $alumn->id_estudiante);
			?>
				<td><?php if($nota!=null ){ echo $nota->nota; }  ?></td>
			<?php endforeach; ?>

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