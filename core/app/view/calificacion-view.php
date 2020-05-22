      <?php if(isset($_GET["opt"])&& $_GET["opt"]=="all"):
      $notas=CalificacionData::getAll();
      ?>
         <section class="content-header">
      <h1>
        Califiaciones
        <small>Todo los calificacion</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Estudiantes</li>
      </ol>
       <a href="./?view=calificacion&opt=new" class="btn btn-primary">Nuevo Registros</a>
    </section>

    <!-- Main content -->

<section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">


          <?php if(count($notas)>0):?>
          <table class="table table-bordered table-hover" id="table" >
            <thead >
              <tr>
              <th scope="col">id_nota</th>
              <th scope="col">Descricpion</th>
              <th scope="col">Estudiante</th>
              <th scope="col">curso</th>
              <th scope="col">nota</th>
            </tr>
            </thead>
            <tbody>
           <?php foreach($notas as $nota):?>
            <tr>
               <td><?=$nota->id_nota;?></td>
              <td><?=$nota->descripcion;?></td>
               <td><?php 
                $estu=EstudiantesData::getById($nota->id_estudiante);
                echo $estu->nombre;
                ?></td>
                <td><?php 
                $curso=CursosData::getById($nota->id_curso);
                echo $curso->nombre;
                ?></td>
              <td><?=$nota->nota;?></td>
              <td>
        <a href="./?view=calificacion&opt=edit&id=<?=$nota->id_nota;?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Editar</a>
        <a href="./?action=calificacion&opt=del&id=<?=$nota->id_nota;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o fa-lg"></i> Eliminar</a>

              </td>
            </tr>
          <?php endforeach;?>
        </tbody>
          </table>
        <?php else:?>
          <div class="box-body">
          <p class="alert alert-warning">Aun no hay calificacion registrados!</p>
        </div>
        <?php endif;?>
        </div>
      </div>
    </div>
  </div>
    </section>

<?php elseif(isset($_GET["opt"])&& $_GET["opt"]=="new"):?>
   
    <section class="container">

  <h3>Agregar calificacion</h3>
  <br>
  <form method="POST" action="./?action=calificacion&opt=add">
    <?php
      $estudiante=EstudiantesData::getAll();
      $curso=CursosData::getAll();?>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Descripcion:</label>
      <input type="tex" name="descripcion" class="form-control" id="inputEmail4" placeholder="Ingrese el notas">
    </div>
  <div class="form-group col-md-4">
      <label for="exampleInputEmail1">Curso</label>
        <select name="id_curso" class="form-control">
      <option value="">--seleccione--</option>
      <?php foreach($curso as $cu):?>
      <option value="<?php echo($cu->id_curso); ?>"><?php echo $cu->nombre?></option>
      <?php endforeach;?>
    </select>
    </div>
     <div class="form-group col-md-4">
      <label for="exampleInputEmail1">Estudiante</label>
        <select name="id_estudiante" class="form-control">
      <option value="">--seleccione--</option>
      <?php foreach($estudiante as $es):?>
      <option value="<?php echo($es->id_estudiante); ?>"><?php echo $es->nombre?></option>
      <?php endforeach;?>
    </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">notas:</label>
      <input type="tex" name="nota" class="form-control" id="inputEmail4" placeholder="Ingrese el notas">

    </div>
  </div>
  <div class=" col-lg-10">
  <button type="submit" class="btn btn-success">Gurardar</button>
  <button type="button" onclick = "location='./?view=a_academico&opt=all'" class="btn btn-warning">Cancelar</button>
</div>
</form>
    </section>

<?php elseif(isset($_GET["opt"])&& $_GET["opt"]=="edit"):
$notas=CalificacionData::getById($_GET["id"]);
?>
   <section class="container">
<div class="row">
  <div class="col-md-12">
  <h1>editar Alumnos</h1>
  <br>
        <form method="POST" action="./?action=calificacion&opt=upd">
  <div class="form-group col-md-4">
    <label for="exampleInputEmail1">Estudiante:</label>
    <input type="text" disabled="" name="id_estudiante" required value="<?=$notas->id_estudiante;?>"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

  </div>
   <div class="form-group col-md-4">
    <label for="exampleInputEmail1">Curso:</label>
    <input type="text" disabled="" name="id_curso" required value="<?=$notas->id_curso;?>"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

  </div>
   <div class="form-group col-md-4">
    <label for="exampleInputEmail1">Descripcion:</label>
    <input type="text" name="descripcion" required value="<?=$notas->descripcion;?>"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

  </div>
   <div class="form-group col-md-4">
    <label for="exampleInputEmail1">Nota: <?php echo $notas->nota;?> </label>
    <input type="text" name="nota" required value="<?=$notas->nota;?>"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

  </div>
  <input type="hidden" name="id" value="<?=$notas->id_nota;?>">
   <div class=" col-lg-10">
  <button type="submit" class="btn btn-success">Actualizar</button>
  <button type="button" onclick = "location='./?view=a_academico&opt=all'" class="btn btn-warning">Cancelar</button>
</div>
</form>
    </section>
  <?php endif;?>