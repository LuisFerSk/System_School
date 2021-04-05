<?php if (isset($_GET["opt"]) && $_GET["opt"] == "all") :
	$estudiante = EstudiantesData::getAll();
?>
	<section class="content-header">
		<h1>
			Estudiantes
			<small>todas los estudiantes</small>
		</h1>
		<br>
		<a href="./?view=estudiantes&opt=new" class="btn btn-primary">Nuevo estudiante</a>
	</section>
	<br>
	<section class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<?php if (count($estudiante) > 0) : ?>
							<table class="table table-bordered table-hover" id="table">
								<thead>
									<tr>
										<th scope="col">DNI</th>
										<th scope="col">Nombres</th>
										<th scope="col">Datos</th>
										<th scope="col">Fecha/Registro</th>
										<th scope="col">Estado</th>
										<th scope="col">Operaciones</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($estudiante as $estu) : ?>
										<tr>
											<td><?= $estu->dni; ?></td>
											<td><?= $estu->nombre . "<br> " . $estu->primer_apellido . " " . $estu->segundo_apellido; ?>
											</td>
											<td>
												<strong>Programa: </strong><?= $estu->programa; ?><br>
												<strong>Fecha Nacimiento: </strong><?= $estu->fecha_nac; ?><br>
												<strong>Genero: </strong><?= $estu->genero; ?><br>
												<strong>Email: </strong><?= $estu->email; ?>
											</td>
											<td><?= $estu->fecha_reg; ?></td>
											<td><?= $estu->estado; ?></td>
											<td style="width: 100px;">
												<div class="btn-group">
													<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														Acciones <span class="caret"></span>
													</button>
													<ul class="dropdown-menu">
														<li><a href="./?view=estudiantes&opt=edit&id=<?= $estu->id_estudiante; ?>"><i class="fa fa-pencil fa-fw"></i> Editar</a></li>
														<li><a href="./?action=estudiantes&opt=del&id=<?= $estu->id_estudiante; ?>"><i class="fa fa-trash-o fa-fw"></i> Eliminar</a></li>
													</ul>
												</div>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						<?php else : ?>
							<div class="box-body">
								<p class="alert alert-warning">Aun no hay estudiantes registrados!</p>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "new") : ?>
	<section class="content-header">
		<h1>
			Registro de estudiantes
			<small>Suministre la información</small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<form method="POST" action="./?action=estudiantes&opt=add">
							<?php
							$estado = EstadoData::getAll();
							$genero = GeneroData::getAll();
							$programa = ProgramaData::getAll();
							?>
							<div class="form-row clearfix">
								<div class="form-group col-md-3">
									<label>DNI:</label>
									<input type="tex" name="dni" class="form-control" id="inputEmail4" placeholder="Numero de DNI">
								</div>
								<div class="form-group col-md-3">
									<label>Programa:</label>
									<select name="programa" class="form-control">
										<option selected>Seleccione....</option>
										<?php foreach ($programa as $prog) : ?>
											<option value="<?php echo ($prog->nombre); ?>"><?php echo $prog->nombre ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="form-group col-md-3">
									<label>Primer apellido:</label>
									<input type="text" name="primer_apellido" class="form-control" placeholder="Apellido paterno">
								</div>
								<div class="form-group col-md-3">
									<label>Apellido Materno:</label>
									<input type="text" name="segundo_apellido" class="form-control" placeholder="Apellido materno">
								</div>
								<div class="form-group col-md-3">
									<label for="inputEmail4">Nombres:</label>
									<input type="text" name="nombre" class="form-control" placeholder="Nombres">
								</div>
								<div class="form-group col-md-3">
									<label>Fecha de Nacimiento:</label>
									<div class="input-group">
										<input type="date" name="fecha_nac" class="form-control">
									</div>
								</div>
								<div class="form-group col-md-3">
									<label>Genero:</label>
									<select name="genero" class="form-control">
										<option selected>Seleccione....</option>
										<option>Masculino</option>
										<option>Femenino</option>
									</select>
								</div>
								<div class="form-group col-md-3">
									<label>Estado:</label>
									<select name="estado" class="form-control">
										<option selected>Seleccione....</option>
										<?php foreach ($estado as $esta) : ?>
											<option value="<?php echo ($esta->nombre); ?>"><?php echo $esta->nombre ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label>Email:</label>
									<input type="text" name="email" class="form-control" placeholder="Email">
								</div>
							</div>
							<div class=" col-lg-10">
								<button type="submit" class="btn btn-success">Agregar</button>
								<button type="button" onclick="location='./?view=estudiantes&opt=all'" class="btn btn-warning">Cancelar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php elseif (isset($_GET["opt"]) && $_GET["opt"] == "edit") :
	$estu = EstudiantesData::getById($_GET["id"]);
	$estado = EstadoData::getAll();
	$genero = GeneroData::getAll();
	$programa = ProgramaData::getAll();
?>
	<section class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>editar Alumnos</h1>
				<br>
				<form method="POST" action="./?action=estudiantes&opt=upd">
					<div class="form-group clearfix">
						<div class="form-group col-md-3">
							<label>DNI:</label>
							<input type="tex" value="<?= $estu->dni; ?>" name="dni" class="form-control" placeholder="Numero de DNI">
						</div>
						<div class="form-group col-md-3">
							<label>Programa:</label>
							<select name="programa" class="form-control">
								<?php foreach ($programa as $prog) :
									if ($estu->programa == $prog->nombre) : ?>
										<option selected value="<?= $prog->nombre; ?>"><?= $prog->nombre; ?></option>
									<?php else : ?>
										<option value="<?= $prog->nombre; ?>"><?= $prog->nombre; ?></option>
								<?php endif;
								endforeach; ?>
							</select>
						</div>
						<div class="form-group col-md-3">
							<label>Nombres:</label>
							<input type="text" value="<?= $estu->nombre; ?>" name="nombre" class="form-control" placeholder="Nombres">
						</div>
						<div class="form-group col-md-3">
							<label>Primer apellido:</label>
							<input type="text" value="<?= $estu->primer_apellido; ?>" name="primer_apellido" class="form-control" placeholder="Apellido paterno">
						</div>
						<div class="form-group col-md-3">
							<label>Segundo apellido:</label>
							<input type="text" value="<?= $estu->segundo_apellido; ?>" name="segundo_apellido" class="form-control" placeholder="Apellido materno">
						</div>
						<div class="form-group col-md-3">
							<label>Genero:</label>
							<select value="<?= $estu->genero; ?>" name="genero" class="form-control">
								<?php foreach ($genero as $gene) :
									if ($estu->genero == $gene->genero) : ?>
										<option selected value="<?= $gene->genero; ?>"><?= $gene->genero; ?></option>
									<?php else : ?>
										<option value="<?= $gene->genero; ?>"><?= $gene->genero; ?></option>
								<?php endif;
								endforeach; ?>
							</select>
						</div>
						<div class="form-group col-md-3">
							<label>Fecha de Nacimiento:</label>
							<div class="input-group">
								<input type="date" value="<?= $estu->fecha_nac; ?>" name="fecha_nac" class="form-control">
							</div>
						</div>
						<div class="form-group col-md-3">
							<label>Estado:</label>
							<select name="estado" class="form-control">
								<?php foreach ($estado as $esta) :
									if ($estu->estado == $esta->nombre) : ?>
										<option selected value="<?= $esta->nombre; ?>"><?= $esta->nombre; ?></option>
									<?php else : ?>
										<option value="<?= $esta->nombre; ?>"><?= $esta->nombre; ?></option>
								<?php endif;
								endforeach; ?>
							</select>
						</div>
						<div class="form-group col-md-6">
							<label>Email:</label>
							<input type="email" value="<?= $estu->email; ?>" name="email" class="form-control" placeholder="Email">
						</div>
					</div>
					<div class=" col-lg-10">
						<input type="hidden" name="id" value="<?= $estu->id_estudiante; ?>">
						<button type="submit" class="btn btn-success">Actualizar</button>
						<button type="button" onclick="location='./?view=estudiantes&opt=all'" class="btn btn-warning">Cancelar</button>
					</div>
				</form>
	</section>
	<br>
<?php endif; ?>