<?php
if (!empty($_POST)) {
    $found = AsistenciaData::getByATD($_POST["grupo_estudiante"], $_POST["fecha"]);
    if ($found == null && $_POST["tipo"] != "") {
        $assis = new AsistenciaData();
        $assis->grupo_estudiante = $_POST["grupo_estudiante"];
        $assis->tipo_asistencia = $_POST["tipo"];
        $assis->fecha = $_POST["fecha"];
        $assis->add();
    } else if ($found = !null && $_POST["tipo"] != "") {
        $found = AsistenciaData::getByATD($_POST["grupo_estudiante"], $_POST["fecha"]);
        $found->tipo_asistencia = $_POST["tipo"];
        $found->update();
    } else if ($_POST["tipo"] == "") {
        $found = AsistenciaData::getByATD($_POST["grupo_estudiante"], $_POST["fecha"]);
        $found->del();
    }
}
