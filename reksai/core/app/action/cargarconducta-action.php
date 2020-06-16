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
				$asist = ConductaData::getByATD($alumn->id_estudiante,$_GET["id_grado"],$_GET["date_at"]);
				$values = array(""=>"Normal","buena"=>"Buena","excelente"=>"Excelente","mala"=>"Mala","muy mala"=>"Muy Mala");
				?>
				<tr>
				<td style="width:250px;"><?php echo $alumn->nombre." ".$alumn->apellido_paterno." ".$alumn->apellido_materno; ?></td>
				<td >
				<form id="form-<?php echo $al->id; ?>">
				<input type="hidden" name="id_estudiante" value="<?php echo $alumn->id_estudiante; ?>">
				<input type="hidden" name="date_at" value="<?php echo $_GET["date_at"]; ?>">
				<input type="hidden" name="id_grado" value="<?php echo $_GET["id_grado"]; ?>">
				<select class="form-control input-sm"  name="tipo" id="select-<?php echo $al->id; ?>">
					<?php foreach($values as $k=>$v):?>
					<option value="<?php echo $k; ?>"  <?php if($asist!=null && $asist->tipo==$k){ echo "selected"; }?>> <?php echo $v;?> </option>
					<?php endforeach; ?>
				</select>
				</form>
				<script>
				$("#select-<?php echo $al->id; ?>").change(function(){
					$.post("./?action=agregarconducta",$("#form-<?php echo $al->id; ?>").serialize(), function(data){
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
