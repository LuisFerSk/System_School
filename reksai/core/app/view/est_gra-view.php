<?php
$grado =  ProgramaData::getById($_GET["id"]);
$estudiantes = Est_graData::getAllByTeamId($_GET["id"]);
$user = null;
$user = UserData::getById($_SESSION["user_id"]);
?>
<div class="row">
	<div class="col-md-12">
		<h1>Alumnos <small><?php echo "del " . $grado->nombre . " nivel " . $grado->nivel; ?></small></h1>
		<?php if ($user->kind) : ?>
			<a href="./?view=nuevoestu&id_grado=<?php echo $_GET["id"]; ?>" class="btn btn-info"><i class='fa fa-asterisk'></i> Nuevo Alumno</a> <?php endif; ?>
		<?php if (count($estudiantes) > 0) : ?>
			<a href="report/grado-word.php?id_grado=<?php echo $_GET["id"]; ?>" class="btn btn-info"><i class='fa fa-download'></i> Descargar</a>
		<?php endif; ?>
		<br><br>
		<?php
		if (count($estudiantes) > 0) {
			// si hay usuarios
		?>
			<table class="table table-bordered table-hover">
				<thead>
					<th>Identificacion</th>
					<th>Nombre</th>
					<th>Genero</th>
					<th>Estado</th>
				</thead>
				<?php
				foreach ($estudiantes as $estu) {
					$alumn = $estu->getAlumn();
				?>
					<tr>
						<td><?php echo $alumn->dni?></td>
						<td><?php echo $alumn->nombre . " " . $alumn->apellido_paterno . " " . $alumn->apellido_materno; ?></td>
						<td><?php echo $alumn->genero?></td>
						<td><?php echo $alumn->estado?></td>
					</tr>
			<?php
				}
				echo "</table>";
			} else {
				echo "<p class='alert alert-danger'>No hay Alumnos</p>";
			}
			?>
	</div>
</div>