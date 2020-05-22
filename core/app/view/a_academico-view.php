
      <?php if(isset($_GET["opt"])&& $_GET["opt"]=="all"):
       $academico=A_academicoData::getAll();
      ?>
         <section class="content-header">

      <h1>
        Periodos Academicos
        <small>A&ntildeos</small>
      </h1>
       <a href="./?view=a_academico&opt=new" class="btn btn-primary">Nuevo Registro</a>
    </section>

    <!-- Main content -->

<section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">


          <?php if(count($academico)>0):?>
          <table class="table table-bordered table-hover" id="table" >
            <thead >
              <tr>
              <th scope="col">Numero</th>
              <th scope="col">Periodo Escolar</th>
              <th scope="col">A&ntildeo</th>
              <th scope="col">Estado Del Ciclo</th>
              <th scope="col">Operaciones</th>
            </tr>
            </thead>
            <tbody>
           <?php foreach($academico as $acad):?>
            <tr>
               <td><?=$acad->id_a;?></td>
              <td><?=$acad->nombre;?></td>
              <td><?=$acad->anio;?></td>
              <td><?=$acad->estado;?></td>
              <td>
    <a href="./?view=a_academico&opt=edit&id=<?=$acad->id_a;?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Editar</a>
        <a href="./?action=a_academico&opt=del&id=<?=$acad->id_a;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o fa-lg"></i> Eliminar</a>
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
        <div class="row">
  <div class="col-md-12">
  <h3>Abrir Nuevo Ciclo Escolar</h3>
  <br>
  <form method="POST" action="./?action=a_academico&opt=add">
  <div class="form-row">
  <div class="form-group col-md-4">
      <label for="inputEmail4">Ciclo Eescolar:</label>
      <input type="tex" name="nombre" class="form-control" id="inputEmail4" placeholder="ciclo escolar">
    </div>
     <div class="form-group col-md-4">
      <label for="inputEmail4">A&ntildeo:</label>
      <input type="number" name="anio" class="form-control" id="inputEmail4">
    </div>
     <div class="form-group col-md-4">
      <label for="inputState">Estado:</label>
      <select id="inputState" name="estado" class="form-control">
        <option selected>Abierto</option>
        <option>Cerrado</option>
      </select>
  </div>
  </div>

  <div class=" col-lg-10">
  <button type="submit" class="btn btn-success">Agregar</button>
  <button type="button" onclick = "location='./?view=a_academico&opt=all'" class="btn btn-warning">Cancelar</button>
</div>
</form>
</div>
</div>
    </section>

<?php elseif(isset($_GET["opt"])&& $_GET["opt"]=="edit"):
$academico=A_academicoData::getById($_GET["id"]);
?>
   <section class="container">
<div class="row">
  <div class="col-md-12">
  <h1>editar Alumnos</h1>
  <br>
        <form method="POST" action="./?action=a_academico&opt=upd">
  <div class="form-group">
  <div class="form-group col-md-4">
      <label for="inputEmail4">Ciclo Eescolar:</label>
      <input type="tex" name="nombre" value="<?=$academico->nombre;?>" class="form-control" id="inputEmail4" placeholder="ciclo escolar">
    </div>
     <div class="form-group col-md-4">
     <label for="exampleInputEmail1">A&ntildeo:</label>
    <input type="text" name="anio" required value="<?=$academico->anio;?>"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
     <div class="form-group col-md-4">
      <label for="inputState">Estado:</label>
      <select id="inputState" name="estado" value="<?=$academico->estado;?>" class="form-control">
        <option >Abierto</option>
        <option>Cerrado</option>
      </select>
  </div>
  </div>
  <input type="hidden" name="id" value="<?=$academico->id_a;?>">
  <button type="submit" class="btn btn-success">Actualizar</button>
</form>
    </section>
  <?php endif;?>