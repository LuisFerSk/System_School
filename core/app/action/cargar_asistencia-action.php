<?php
if (isset($_SESSION["id"])) :
    $kinds = KindData::getById($_SESSION["id"]);
    foreach ($kinds as $value) :
        if (isset($_GET['id_grupo']) && isset($_GET['fecha'])) :
            if ($value->id_kind == '1' || $value->id_kind == '2') :

                $kinds = KindData::getById($_SESSION["id"]);
                $grupo_estudiante = GrupoEstudianteData::getByGrupo($_GET["id_grupo"]);
                $grupo_horario = GrupoHorarioData::getByGrupo($_GET["id_grupo"]);
                $condicion = false;

                foreach ($grupo_horario as $value) {
                    $horario = HorarioData::getById($value->horario);
                    if ($horario->dia_semana == date("w", strtotime($_GET['fecha']))) :
                        $condicion = true;
                        break;
                    endif;
                }

                if (count($grupo_estudiante) > 0) :
                    if ($condicion) : ?>
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
                                $asistencia = AsistenciaData::getByATD($value->id, $_GET['fecha']);
                            ?>
                                <tr>
                                    <td style="width:250px;"><?= $estudiante->dni ?></td>
                                    <td style="width:250px;"><?= $estudiante->nombre ?></td>
                                    <td style="width:250px;"><?= $estudiante->apellidos ?></td>
                                    <td>
                                        <form id="form-<?= $estudiante->id ?>">
                                            <input type="hidden" name="grupo_estudiante" value="<?= $value->id ?>">
                                            <input type="hidden" name="fecha" value="<?= $_GET["fecha"] ?>">
                                            <select class="form-control input-sm" name="tipo" id="select-<?= $estudiante->id ?>">
                                                <?php foreach ($values as $k => $v) : ?>
                                                    <option value="<?= $k ?>" <?php if ($asistencia != null && $asistencia->tipo_asistencia == $k) :
                                                                                    echo "selected";
                                                                                endif; ?>> <?= $v ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </form>
                                        <script>
                                            $("#select-<?= $estudiante->id ?>").change(function() {
                                                $.post("./?action=agregar_asistencia", $("#form-<?= $estudiante->id ?>").serialize(), function(data) {});
                                            });
                                        </script>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
<?php
                    else :
                        echo Alert::Danger('La fecha no se encuentra en el horario del grupo');
                    endif;
                else :
                    echo Alert::Danger('No hay Grupos');
                endif;
            elseif ($value->id_kind == '0') :
                null;
            endif;
        endif;
    endforeach;
endif; ?>