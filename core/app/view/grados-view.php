  <?php if(isset($_GET["opt"])&& $_GET["opt"]=="all"):
      $grado=GradosData::getAll();
      ?>
         <section class="content-header">
      <h1>
        Grados
        <small>Todo los Grados</small>
      </h1>

       <a href="./?view=nuevogrado" class="btn btn-primary">Nuevo Registros</a>
    </section>

    <!-- Main content -->

<section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">


          <?php if(count($grado)>0):?>
          <table class="table table-bordered table-hover" id="table" >
            <thead >
              <tr>
              <th scope="col">id_grado</th>
              <th scope="col">Grados</th>
              <th scope="col">Nivel</th>
            </tr>
            </thead>
            <tbody>
           <?php foreach($grado as $gra):?>
            <tr>
               <td><?=$gra->id_grado;?></td>
              <td><?=$gra->nombre;?></td>
              <td><?=$gra->nivel;?></td>
              <td>
        <a href="./?view=grados&opt=edit&id=<?=$gra->id_grado;?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Editar</a>
        <a href="./?action=grados&opt=del&id=<?=$gra->id_grado;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o fa-lg"></i> Eliminar</a>

              </td>
            </tr>
          <?php endforeach;?>
        </tbody>
          </table>
        <?php else:?>
          <div class="box-body">
          <p class="alert alert-warning">Aun no hay grados registrados!</p>
        </div>
        <?php endif;?>
        </div>
      </div>
    </div>
  </div>
    </section>

<?php elseif(isset($_GET["opt"])&& $_GET["opt"]=="new"):?>

    <section class="container">

  <h3>Agregar Grados</h3>
  <br>
  <form method="POST" action="./?action=grados&opt=add">
    <?php
      $nivel=NivelesData::getAll();?>
  <div class="form-row">
  <div class="form-group col-md-12">
      <label for="inputEmail4">Grado:</label>
      <input type="tex" name="nombre" class="form-control" id="inputEmail4" placeholder="Ingrese el grado">
      <label for="exampleInputEmail1">Nivel</label>
        <select name="nivel" class="form-control">
      <option value="">--seleccione--</option>
      <?php foreach($nivel as $ni):?>
      <option value="<?php echo($ni->nombre); ?>"><?php echo $ni->nombre?></option>
      <?php endforeach;?>
    </select>
    </div>
  </div>
 <button type="submit" class="btn btn-primary">Guardar</button>
</form>
    </section>

<?php elseif(isset($_GET["opt"])&& $_GET["opt"]=="edit"):
$grado=GradosData::getById($_GET["id"]);
?>
   <section class="container">
<div class="row">
  <div class="col-md-12">
  <h1>Editar Grados</h1>
  <br>
        <form method="POST" action="./?action=grados&opt=upd">
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre:</label>
    <input type="text" name="nombre" required value="<?=$grado->nombre;?>"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

  </div>
  <input type="hidden" name="id" value="<?=$grado->id_grado;?>">
  <button type="submit" class="btn btn-success">Actualizar</button>
</form>
    </section>
  <?php endif;?>