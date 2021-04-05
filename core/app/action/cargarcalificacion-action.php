		<?php

		$alumns = Est_graData::getAllByTeamId($_GET["id_grado"]);
		if(count($alumns)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<th>
			</th>
			</thead>
			<?php
			foreach($alumns as $al){
				$alumn = $al->getAlumn();
				$nota = CalificacionData::getByBA($_GET["id_bloque"],$alumn->id_estudiante);
				?>
				<tr>
				<td style="width:250px;"><?php echo $alumn->nombre." ".$alumn->apellido_paterno." ".$alumn->apellido_materno; ?></td>
				<td >
				<form id="form-<?php echo $al->id; ?>">
				<input type="hidden" name="id_estudiante" value="<?php echo $alumn->id_estudiante; ?>">
				<input type="hidden" name="id_bloque" value="<?php echo $_GET["id_bloque"]; ?>">
				<input type="text" class="form-control" id="input-<?php echo $al->id; ?>" required name="nota" value="<?php if($nota!=null){ echo $nota->nota;}?>">
				</form>
				<script>
				$("#input-<?php echo $al->id; ?>").keyup(function(){
					$.post("./?action=agregarcalificacion",$("#form-<?php echo $al->id; ?>").serialize(), function(data){
						console.log(data);
					});
				});



				</script>
				</td>
				</tr>
				<?php

			}
echo "</table>";


		}else{
			echo "<p class='alert alert-danger'>No hay Grupos</p>";
		}


		?>


