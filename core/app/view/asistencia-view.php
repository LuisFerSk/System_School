<?php if (isset($_GET["id"]) && isset($_SESSION["id"])) :
  $grupo = GrupoData::getById($_GET["id"]);
  $periodo = PeriodoAcademicoData::getByNombre($grupo->periodo);
  $kinds = KindData::getById($_SESSION["id"]);
?>
  <section class="content-header">
    <a href="./?view=grupo_estudiante&id=<?= $_GET["id"] ?>" class="btn pull-right btn-sm btn-info"><i class='fa fa-arrow-left'></i> Regresar</a>
    <h1>Asistencia</h1>
  </section>
  <br>
  <section class="container">
    <form class="form-horizontal" id="loadlist" role="form">
      <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">Seleccionar Fecha:</label>
        <div class="col-lg-7">
          <input type="date" name="fecha" min="<?= $periodo->fecha_inicio ?>" max="<?= date("Y-m-d") > $periodo->fecha_fin ? $periodo->fecha_fin :  date("Y-m-d") ?>" value="<?= date("Y-m-d") > $periodo->fecha_fin ? $periodo->fecha_fin :  date("Y-m-d") ?>" required class="form-control">
        </div>
        <div class="col-lg-offset-3">
          <input type="hidden" name="id_grupo" value="<?= $_GET["id"] ?>">
          <button id="submit" type="submit" class="btn btn-primary">Buscar</button>
        </div>
      </div>
    </form>
    <div id="data">
      <p class="alert alert-warning">No hay datos, por favor selecciona una fecha.</p>
    </div>
  </section>
  <?php foreach ($kinds as $value) :
    if ($value->id_kind == '1' || $value->id_kind == '2') : ?>
      <script>
        $("#loadlist").submit(function(e) {
          e.preventDefault();
          var d = $("#loadlist").serialize();
          $.get("./?action=cargar_asistencia", d, function(data) {
            console.log(data);
            $("#data").html(data);

          });
        });
      </script>
<?php break;
    endif;
  endforeach;
endif; ?>