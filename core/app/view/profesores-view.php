      <?php if(isset($_GET["opt"])&& $_GET["opt"]=="all"):
      $profesor=ProfesoresData::getAll();

      ?>

         <section class="content-header">
      <h1>
        Profesores
        <small>Lista de profesores</small>
      </h1>
       <a href="./?view=profesores&opt=new" class="btn btn-success">Nuevo Registro</a>
    </section>

      <!--<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>-->

    <!-- Main content -->

<section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">


          <?php if(count($profesor)>0):?>
          <table class="table table-bordered table-hover" id="table" >
            <thead >
              <tr>
              <th scope="col">Nombres y Apellidos</th>
              <th scope="col">Especialidad</th>
              <th scope="col">Telefono</th>
              <th scope="col">E_mail</th>
              <th scope="col">Direccion</th>
              <th scope="col">Operaciones</th>
            </tr>
            </thead>
            <tbody>
           <?php foreach($profesor as $prof):?>
            <tr>
               <td><?=$prof->nombres." ".$prof->apellidos;?></td>
              <td><?=$prof->especialidad;?></td>
              <td><?=$prof->num_cel;?></td>
              <td><?=$prof->email;?></td>
              <td><?=$prof->direccion;?></td>
              <td>
                <div class="btn-group">
  <a class="btn btn-info " href="#"><i class="fa fa-cog fa-spin fa-1x fa-fw"></i> Acciones</a>
  <a class="btn btn-warning dropdown-toggle" data-toggle="dropdown" href="#">
    <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
  </a>
  <ul class="dropdown-menu">
    <li><a href="./?view=profesores&opt=edit&id=<?=$prof->id_prof;?>" ><i class=" fa fa-pencil fa-fw"></i> Editar</a></li>
    <li><a href="./?action=profesores&opt=del&id=<?=$prof->id_prof;?>" ><i class="fa fa-trash-o fa-fw"></i> Eliminar</a></li>
  </ul>
</div>
              </td>
            </tr>
          <?php endforeach;?>
        </tbody>
          </table>
        <?php else:?>
          <div class="box-body">
          <p class="alert alert-warning">Aun no hay profesores registrados!</p>
        </div>
        <?php endif;?>
        </div>
      </div>
    </div>
  </div>
    </section>

<?php elseif(isset($_GET["opt"])&& $_GET["opt"]=="new"):?>
    <section class="container">

  <h3>Agregar Profesor</h3>
  <br>
  <form method="POST" action="./?action=profesores&opt=add">
  <div class="form-row">
  <div class="form-group col-md-3">
      <label for="inputEmail4">DNI:</label>
      <input type="tex" name="dni" class="form-control" id="inputEmail4" placeholder="Numero de DNI">
    </div>
    <div class="form-group col-md-3">
      <label for="inputEmail4">Nombres:</label>
      <input type="text" name="nombres" class="form-control" id="inputEmail4" placeholder="Nombres y Apellidos">
    </div>
      <div class="form-group col-md-3">
      <label for="inputEmail4">Apellidos:</label>
      <input type="text" name="apellidos" class="form-control" id="inputEmail4" placeholder="Nombres y Apellidos">
    </div>
    <div class="form-group col-md-3">
      <label for="inputEmail4">Numero / Cel:</label>
      <input type="text" name="num_cel" class="form-control" id="inputEmail4" placeholder="999999999">
    </div>
    <div class="form-group col-md-3">
      <label for="inputEmail4">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
  </div>
   <div class="form-group col-md-6">
      <label for="inputEmail4">Especialidad:</label>
      <input type="text" name="especialidad" class="form-control" id="inputEmail4" placeholder="especialidad">
    </div>
     <div class="form-group col-md-6">
      <label for="inputEmail4">Direccion:</label>
      <input type="text" name="direccion" class="form-control" id="inputEmail4" placeholder="especialidad">
    </div>
   <div class=" col-lg-10">
  <button type="submit" class="btn btn-success">Guardar</button>
  <button type="button" onclick = "location='./?view=profesores&opt=all'" class="btn btn-warning">Cancelar</button>
</div>
</form>
    </section>

<?php elseif(isset($_GET["opt"])&& $_GET["opt"]=="edit"):
$profesor=ProfesoresData::getById($_GET["id"]);
?>
   <section class="container">
<div class="row">
  <div class="col-md-12">
  <h1>Editar Profesor</h1>
  <br>
        <form method="POST" action="./?action=profesores&opt=upd">
  <div class="form-group">
    <label for="exampleInputEmail1">Nombres:</label>
    <input type="text" name="nombres" required value="<?=$profesor->nombres;?>"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <label for="exampleInputEmail1">Apellidos:</label>
    <input type="text" name="apellidos" required value="<?=$profesor->apellidos;?>"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <label for="exampleInputEmail1">DNI:</label>
    <input type="text" name="dni" required value="<?=$profesor->dni;?>"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
     <label for="exampleInputEmail1">Especialidad:</label>
    <input type="text" name="especialidad" required value="<?=$profesor->especialidad;?>"   class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    <label for="exampleInputEmail1">Telefono:</label>
    <input type="text" name="num_cel" required  value="<?=$profesor->num_cel;?>"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    <label for="exampleInputEmail1">E-mail:</label>
    <input type="email" name="email" required value="<?=$profesor->email;?>"   class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
     <label for="exampleInputEmail1">Direccion:</label>
    <input type="text" name="direccion" required value="<?=$profesor->direccion;?>"   class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >

  </div>
  <input type="hidden" name="id" value="<?=$profesor->id_prof;?>">
   <div class=" col-lg-10">
  <button type="submit" class="btn btn-success">Actualizar</button>
  <button type="button" onclick = "location='./?view=profesores&opt=all'" class="btn btn-warning">Cancelar</button>
</div>
</form>
    </section>
  <?php endif;?>