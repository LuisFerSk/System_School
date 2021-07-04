<?php if (isset($_GET["id_grupo"])) :
  $grupo = GrupoData::getById($_GET["id_grupo"]);
  $kinds = KindData::getById($_SESSION["id"]);
  foreach ($kinds as $value) :
    if ($value->id_kind = '1' || $value->id_kind = '1') : ?>
      <section class="content-header">
        <h1>
          Codigo QR
        </h1>
      </section>
      <br>
      <section class="container">
        <div id="data">
          <form id="form">
            <input type="hidden" id="id_grupo" value="<?= $_GET["id_grupo"] ?>">
            <input type="hidden" id="codigo_qr" value="<?= $grupo->codigo_qr  ?>">
          </form>
        </div>
      </section>
      <script>
        function generar_qr() {
          var d = $("#form").serialize();
          $.post("./?action=generar_QR", d, function(data) {
            $("#data").html(data);
          });
        };
        generar_qr();
        setInterval(generar_qr, 3000);
      </script>
<?php endif;
  endforeach;
endif; ?>