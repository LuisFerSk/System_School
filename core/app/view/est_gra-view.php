<?php
$grado =  GradosData::getById($_GET["id"]);
$estudiantes = Est_graData::getAllByTeamId($_GET["id"]);
$user=null;
$user= UserData::getById($_SESSION["user_id"]);
?>
<div class="row">
	<div class="col-md-12">
		<h1>Alumnos <small><?php echo "del ".$grado->nombre." nivel ".$grado->nivel;?></small></h1>
		<?php if($user->kind):?>
	<a href="./?view=nuevoestu&id_grado=<?php echo $_GET["id"]; ?>" class="btn btn-info"><i class='fa fa-asterisk'></i> Nuevo Alumno</a> <?php endif;?>
	<?php if(count($estudiantes)>0):?>
	<a href="./?view=asistencia&id_grado=<?php echo $_GET["id"]; ?>" class="btn btn-info"><i class='fa fa-check'></i> Asistencia</a>
	<a href="./?view=conducta&id_grado=<?php echo $_GET["id"]; ?>" class="btn btn-info"><i class='fa fa-smile-o'></i> Comportamiento</a>
	<a href="./?view=calificaciones&id_grado=<?php echo $_GET["id"]; ?>" class="btn btn-info"><i class='fa fa-tasks'></i> Calificaciones</a>
	<a href="./?view=bloques&id_grado=<?php echo $_GET["id"]; ?>" class="btn btn-info"><i class='fa fa-th-large'></i> Bloques</a>
<!-- Single button -->
<div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
    <i class='fa fa-th-list'></i> Listas <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="./?view=lista_asis&id_grado=<?php echo $_GET["id"]; ?>">Asistencia</a></li>
    <li><a href="./?view=lista_conducta&id_grado=<?php echo $_GET["id"]; ?>">Comportamiento</a></li>
    <li><a href="./?view=lista_notas&id_grado=<?php echo $_GET["id"]; ?>">Calificaciones</a></li>
  </ul>
</div>
	<a href="report/grado-word.php?id_grado=<?php echo $_GET["id"]; ?>" class="btn btn-info"><i class='fa fa-download'></i> Descargar</a>
<?php endif; ?>
<!--	<a href="index.php?view=list&id_grado=<?php echo $_GET["id"]; ?>" class="btn btn-info"><i class='fa fa-area-chart'></i> Estadisticas</a> -->


<br><br>
		<?php

		if(count($estudiantes)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<th></th>
			</thead>
			<?php
			foreach($estudiantes as $estu){
				$alumn = $estu->getAlumn();
				?>
				<tr>
				<td><?php echo $alumn->nombre." ".$alumn->apellido_paterno." ".$alumn->apellido_materno; ?></td>
				<td style="width:160px;"><a href="./?view=abrirestu&id=<?php echo $alumn->id_estudiante;?>&tid=<?php echo $grado->id_grado;?>" class="btn btn-info btn-xs">Ver</a> <a href="./?view=editarestudiante&id=<?php echo $alumn->id_estudiante;?>&tid=<?php echo $grado->id_grado;?>" class="btn btn-warning btn-xs">Editar</a> <a href="index.php?action=delalumn&id=<?php echo $alumn->id;?>&tid=<?php echo $grado->id;?>" class="btn btn-danger btn-xs">Eliminar</a></td>
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