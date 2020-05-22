		<?php

		$estudiantes = Est_graData::getAllByTeamId($_GET["id_grado"]);
		if(count($estudiantes)>0){
			// si hay usuarios
			?>
			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<th>
			</th>
			</thead>
			<?php
			foreach($estudiantes as $al){
				$alumn = $al->getAlumn();
				$asist = AssistanceData::getByATD($alumn->id_estudiante,$_GET["id_grado"],$_GET["fecha"]);
				$values = array(""=>"Sin seleccion","1"=>"Asistencia","2"=>"Falta","3"=>"Retardo","4"=>"Justificacion");  
				?>
				<tr>
				<td style="width:250px;"><?php echo $alumn->nombre." ".$alumn->apellido_paterno; ?></td>
				<td >
				<form id="form-<?php echo $al->id_estudiante; ?>">
				<input type="hidden" name="id_estudiante" value="<?php echo $alumn->id_estudiante; ?>">
				<input type="hidden" name="fecha" value="<?php echo $_GET["fecha"]; ?>">
				<input type="hidden" name="id_grado" value="<?php echo $_GET["id_grado"]; ?>">  
				<select class="form-control input-sm"  name="tipo" id="select-<?php echo $al->id_estudiante; ?>">
					<?php foreach($values as $k=>$v):?>
					<option value="<?php echo $k; ?>"  <?php if($asist!=null && $asist->tipo==$k){ echo "selected"; }?>> <?php echo $v;?> </option>
					<?php endforeach; ?>
				</select>
				</form>
				<script>
				$("#select-<?php echo $al->id_estudiante; ?>").change(function(){
					$.post("./?action=agregarasistencia",$("#form-<?php echo $al->id_estudiante; ?>").serialize(), function(data){
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
