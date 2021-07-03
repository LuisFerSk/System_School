<?php
if (isset($_GET['id_grupo'])) :
    $grupo_estudiante = GrupoEstudianteData::getByGrupo($_GET["id_grupo"]);
    if (count($grupo_estudiante) > 0) :
?>
        <table class="table table-bordered table-hover">
            <thead>
                <th>Identificacion</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Asistencia</th>
            </thead>
            <?php foreach ($grupo_estudiante as $value) :
                $estudiante = UserData::getByDni($value->estudiante);
                $values = array("" => "Sin seleccion", "0" => "Asistencia", "1" => "Falta", "2" => "Retardo", "3" => "Justificacion");
                $tipo_asistencia = TipoAsistenciaData::getByGrupoEstudiante()
            ?>
                <tr>
                    <td style="width:250px;"><?= $estudiante->dni ?></td>
                    <td style="width:250px;"><?= $estudiante->nombre ?></td>
                    <td style="width:250px;"><?= $estudiante->apellidos ?></td>
                    <td>
                        <form id="form-<?= $estudiante->id ?>">
                            <input type="hidden" name="id_estudiante" value="<?= $estudiante->id ?>">
                            <input type="hidden" name="fecha" value="<?= $_GET["fecha"] ?>">
                            <input type="hidden" name="id_grado" value="<?= $_GET["id_grupo"] ?>">
                            <select class="form-control input-sm" name="tipo" id="select-<?= $estudiante->id ?>">
                                <?php foreach ($values as $k => $v) : ?>
                                    <option value="<?= $k ?>"> <?= $v ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </form>
                        <script>
                            $("#select-<?php echo $al->id_estudiante; ?>").change(function() {
                                $.post("./?action=agregarasistencia", $("#form-<?php echo $al->id_estudiante; ?>").serialize(), function(data) {});
                            });
                        </script>
                    </td>
                </tr>
    <?php
            endforeach;
        endif;
        echo "</table>";
    else :
        echo "<p class='alert alert-danger'>No hay Grupos</p>";
    endif;

    ?>
    <?php if ($asist != null && $asist->tipo == $k) :
        echo "selected";
    endif; ?>