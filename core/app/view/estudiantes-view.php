<?php if (isset($_GET["opt"]) && $_GET["opt"] == "all") :
	$estudiantes = EstudianteData::getAll();
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
						<?php if (count($estudiantes) > 0) : ?>
							<table class="table table-bordered table-hover" id="table">
								<thead>
									<tr>
										<th scope="col">DNI</th>
										<th scope="col">Datos</th>
										<th scope="col">Estado</th>
										<th scope="col">Operaciones</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($estudiantes as $estudiante) :
										$user = UserData::getByDni($estudiante->dni)
									?>
										<tr>
											<td><?= $user->dni; ?></td>
											<td>
												<strong>Email: </strong><?= $user->email; ?><br>
												<strong>Nombre: </strong><?= $user->nombre . " " . $user->apellidos; ?><br>
												<strong>Programa: </strong><?= $estudiante->programa; ?><br>
											</td>
											<td><?= $estudiante->estado; ?></td>
											<td style="width: 100px;">
												<div class="btn-group">
													<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														Acciones <span class="caret"></span>
													</button>
													<ul class="dropdown-menu">
														<li><a href="./?view=estudiantes&opt=edit&id=<?= $estudiante->id; ?>"><i class="fa fa-pencil fa-fw"></i> Editar</a></li>
														<li><a href="./?action=estudiantes&opt=del&id=<?= $estudiante->id; ?>"><i class="fa fa-trash-o fa-fw"></i> Eliminar</a></li>
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
							$programa = ProgramaData::getAll();
							?>
							<div class="form-row clearfix">
								<div class="form-group col-md-3">
									<label>Email:</label>
									<input type="email" required name="email" class="form-control" placeholder="Email">
								</div>
								<div class="form-group col-md-3">
									<label>DNI:</label>
									<input type="tex" required name="dni" class="form-control" placeholder="Numero de DNI">
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
									<label>Contraseña:</label>
									<input type="password" required name="password" class="form-control" placeholder="Contraseña">
								</div>
								<div class="form-group col-md-3">
									<label>Nombres:</label>
									<input type="text" required name="nombre" class="form-control" placeholder="Nombre">
								</div>
								<div class="form-group col-md-6">
									<label>Apellidos:</label>
									<input type="text" required name="apellidos" class="form-control" placeholder="Apellidos">
								</div>
								<div class="form-group col-md-3">
									<label>Estado:</label>
									<select name="estado" required class="form-control">
										<option selected>Seleccione...</option>
										<?php foreach ($estado as $esta) : ?>
											<option value="<?php echo ($esta->nombre); ?>"><?php echo $esta->nombre ?></option>
										<?php endforeach; ?>
									</select>
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
	$estudiante = EstudianteData::getById($_GET["id"]);
	$user = UserData::getByDni($estudiante->dni);
	$estado = EstadoData::getAll();
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
							<input type="tex" value="<?= $user->dni; ?>" name="dni" class="form-control" placeholder="Numero de DNI">
						</div>
						<div class="form-group col-md-3">
							<label>Programa:</label>
							<select name="programa" class="form-control">
								<?php foreach ($programa as $prog) :
									if ($estudiante->programa == $prog->nombre) : ?>
										<option selected value="<?= $prog->nombre; ?>"><?= $prog->nombre; ?></option>
									<?php else : ?>
										<option value="<?= $prog->nombre; ?>"><?= $prog->nombre; ?></option>
								<?php endif;
								endforeach; ?>
							</select>
						</div>
						<div class="form-group col-md-3">
							<label>Nombre:</label>
							<input type="text" value="<?= $user->nombre; ?>" name="nombre" class="form-control" placeholder="Nombres">
						</div>
						<div class="form-group col-md-3">
							<label>Apellidos:</label>
							<input type="text" value="<?= $user->apellidos; ?>" name="apellidos" class="form-control" placeholder="Apellido paterno">
						</div>
						<div class="form-group col-md-3">
							<label>Estado:</label>
							<select name="estado" class="form-control">
								<?php foreach ($estado as $esta) :
									if ($estudiante->estado == $esta->nombre) : ?>
										<option selected value="<?= $esta->nombre; ?>"><?= $esta->nombre; ?></option>
									<?php else : ?>
										<option value="<?= $esta->nombre; ?>"><?= $esta->nombre; ?></option>
								<?php endif;
								endforeach; ?>
							</select>
						</div>
						<div class="form-group col-md-6">
							<label>Email:</label>
							<input type="email" value="<?= $user->email; ?>" name="email" class="form-control" placeholder="Email">
						</div>
					</div>
					<div class=" col-lg-10">
						<input type="hidden" name="id" value="<?= $estudiante->id; ?>">
						<button type="submit" class="btn btn-success">Actualizar</button>
						<button type="button" onclick="location='./?view=estudiantes&opt=all'" class="btn btn-warning">Cancelar</button>
					</div>
				</form>
	</section>
	<br>
<?php endif; ?>