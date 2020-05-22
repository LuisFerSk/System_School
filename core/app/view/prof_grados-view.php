<?php $profesores=ProfesoresData::getById($_GET["id"]);
?>
    <section class="container">
<div class="row">
	<div class="col-md-12">
	<h2>Agregar Usuario</h2>
	    <p><b>NOTA:</b> <br>
  Con el<b> nombre de usuario(N° de DNI)</b> y la <b>contraseña</b> que Ud. establesca podran acceder los profesores al sistema</p>

	<br>
<form class="form-horizontal" method="post" id="addproduct" action="./?action=users&opt=add" role="form">
	<input type="hidden" name="id_prof" value="<?php echo $_GET["id"];?>">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" readonly="readonly" value="<?=$profesores->nombres;?>" name="name" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-6">
      <input type="text" readonly="readonly" value="<?=$profesores->apellidos;?>" name="lastname" required class="form-control" id="lastname" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre de usuario(DNI)*</label>
    <div class="col-md-6">
      <input type="text" readonly="readonly" value="<?=$profesores->dni;?>" name="username" class="form-control" required id="username" placeholder="Nombre de usuario">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
    <div class="col-md-6">
      <input type="text" readonly="readonly" value="<?=$profesores->email;?>" name="email" class="form-control" id="email" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Contrase&ntilde;a</label>
    <div class="col-md-6">
      <input type="password" name="password" class="form-control" id="inputEmail1" placeholder="crea una contrase&ntilde;a para este usuario">
    </div>
  </div>
  <input type="hidden" name="kind" value="0">
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">

      <button type="submit" class="btn btn-info">Agregar Usuario</button>
      <button type="button" onclick = "location='./?view=prof_tutor&opt=all'" class="btn btn-warning">Cancelar</button>
    </div>
  </div>
</form>
	</div>
</div>
</section>