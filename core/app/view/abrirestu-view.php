<?php
$estudiantes =  EstuData::getById($_GET["id"]);
$estu_gra = Est_graData::getAllByAlumnId($_GET["id"]);
$grados = GradData::getAllByUserId($_SESSION["user_id"]);
$found = false;
  $txs = array();
  foreach($grados as $grad){ $txs[] = $grad->id_grado; }
  $tys = array();
  foreach($estu_gra as $grad){ $tys[] = $grad->id_estudiante; }
  $tzs = array_diff($txs,$tys);
  if(empty($tzs)){ $found= false; }else { $found=true; }

  ?>
<div class="row">
	<div class="col-md-12">
		<h1><?php echo $estudiantes->nombre." ".$estudiantes->apellido_paterno; ?></h1>
<!-- Single button -->
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    Agregar al Grado <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
  <?php if($found):
  $txs = array();
  foreach($grados as $grad){ $txs[] = $grad->id_grado; }
  $tys = array();
  foreach($estu_gra as $grad){ $tys[] = $grad->id_estudiante; }
  $tzs = array_diff($txs,$tys);


  	foreach ($tzs as $grad) {
  		$te = null;
  		foreach ($grados as $ate) {
  			if($ate->id_grado==$grad){ $te= $ate; }
  		}
		echo "<li><a href='./?action=adestudiante_grado&al_id=$estudiantes->id_estudiante&t_id=$grad'>".$te->nombre."</a></li>";
	}
?>
  <?php else:?>
    <li><a href="javascript:void()">No hay Grupos</a></li>
<?php endif;?>
  </ul>
</div>
<!--	<a href="index.php?view=list&team_id=<?php echo $_GET["id"]; ?>" class="btn btn-default"><i class='fa fa-area-chart'></i> Estadisticas</a> -->


<br><br>
		<?php

		if(count($estu_gra)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<th>Nivel</th>
			<th></th>
			</thead>
			<?php
			foreach($estu_gra as $al){
				$estudiantes = $al->getTeam();
				?>
				<tr>
				<td><?php echo $estudiantes->nombre; ?></td>
				<td><?php echo $estudiantes->nivel; ?></td>
				<td style="width:160px;"><a href="./?view=est_gra&id=<?php echo $estudiantes->id_grado;?>" class="btn btn-default btn-xs">Ver Grupo</a></td>
				</tr>
				<?php

			}

echo "</table>";

		}else{
			echo "<p class='alert alert-danger'>No hay Alumnos</p>";
		}


		?>


	</div>
</div>