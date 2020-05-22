      <?php if(isset($_GET["opt"])&& $_GET["opt"]=="all"):
      $nominas=NominaData::getAll();
      ?>
         <section class="content-header">
      <h1>
        Nominas
        <small>Todas las nominas</small>
      </h1>
       <a href="./?view=estudiantes&opt=all" class="btn btn-primary">Nuevo</a>
    </section>

    <!-- Main content -->

<section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">


          <?php if(count($nominas)>0):?>
          <table class="table table-bordered table-hover" id="table" >
            <thead >
              <tr>
              <th scope="col">Nomina</th>
              <th scope="col">Estudiante</th>
              <th scope="col">Grado</th>
              <th scope="col">Año Academico</th>
              <th scope="col">Fecha</th>
            </tr>
            </thead>
            <tbody>
           <?php foreach($nominas as $nomi):?>
            <tr>
               <td><?=$nomi->id_nomina;?></td>
              <td><?php
                $es=EstudiantesData::getById($nomi->id_estudiante);
                echo $es->nombre;
                ?></td>
                 <td><?php
                $gra=GradosData::getById($nomi->id_grado);
                echo $gra->nombre." Nivel: ".$gra->nivel;
                ?></td>
                 <td><?php
                $a_ac=A_academicoData::getById($nomi->id_a);
                echo $a_ac->anio;
                ?></td>
              <td><?=$nomi->fecha;?></td>
              <td>
        <a href="./?view=nomina&opt=edit&id=<?=$nomi->id_nomina;?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Editar</a>
        <a href="./?action=nomina&opt=del&id=<?=$nomi->id_nomina;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o fa-lg"></i> Eliminar</a>

              </td>
            </tr>
          <?php endforeach;?>
        </tbody>
          </table>
        <?php else:?>
          <div class="box-body">
          <p class="alert alert-warning">Aun no hay nomina registrados!</p>
        </div>
        <?php endif;?>
        </div>
      </div>
    </div>
  </div>
    </section>

<?php elseif(isset($_GET["opt"])&& $_GET["opt"]=="new"):?>

    <section class="container">

  <h3>Agregar nomina</h3>
  <br>
  <form method="POST" action="./?action=nomina&opt=add">
    <?php
      $estudiante=EstudiantesData::getAll();
      $grado=GradosData::getAll();
      $anio=A_academicoData::getAll();
      ?>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputEmail4">Nombres:</label>
      <?php $estudiante=EstudiantesData::getById($_GET["id"]);?>
       <select name="id_estudiante" class="form-control">
      <option value="<?php echo($estudiante->id_estudiante); ?>"><?php echo $estudiante->nombre." ".$estudiante->apellido_paterno." ".$estudiante->apellido_materno?></option>
    </select>
    </div>
    <div class="form-group col-md-4">
      <label for="exampleInputEmail1">Grado:</label>
        <select name="id_grado" class="form-control">
      <option value="">--seleccione--</option>
      <?php foreach($grado as $gra):?>
      <option value="<?php echo($gra->id_grado); ?>"><?php echo $gra->nombre." ".$gra->nivel?></option>
      <?php endforeach;?>
    </select>
    </div>
    <div class="form-group col-md-4">
      <label for="exampleInputEmail1">Año Academico</label>
        <select name="id_a" class="form-control">
      <option value="">--seleccione--</option>
      <?php foreach($anio as $an):?>
      <option value="<?php echo($an->id_a); ?>"><?php echo $an->anio?></option>
      <?php endforeach;?>
    </select>
    </div>
  </div>
 <button type="submit" class="btn btn-primary">Guardar</button>
</form>
    </section>

<?php elseif(isset($_GET["opt"])&& $_GET["opt"]=="edit"):
$nominas=NominaData::getById($_GET["id"]);
?>
   <section class="container">
<div class="row">
  <div class="col-md-12">
  <h1>editar Alumnos</h1>
  <br>
        <form method="POST" action="./?action=nomina&opt=upd">
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre:</label>
    <input type="text" name="nombre" required value="<?=$nominas->nombre;?>"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

  </div>
  <input type="hidden" name="id" value="<?=$nominas->id_nomina;?>">
  <button type="submit" class="btn btn-success">Actualizar</button>
</form>
    </section>
  <?php endif;?>