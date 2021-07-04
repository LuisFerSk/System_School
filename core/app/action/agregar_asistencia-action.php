<?php
if (!empty($_POST)) :
    $found = AsistenciaData::getByATD($_POST["grupo_estudiante"], $_POST["fecha"]);
    if ($found == null && $_POST["tipo"] != "") :
        $assis = new AsistenciaData();
        $assis->grupo_estudiante = $_POST["grupo_estudiante"];
        $assis->tipo_asistencia = $_POST["tipo"];
        $assis->fecha = $_POST["fecha"];
        $assis->add();

    elseif ($found = !null && $_POST["tipo"] != "") :
        $found = AsistenciaData::getByATD($_POST["grupo_estudiante"], $_POST["fecha"]);
        $found->tipo_asistencia = $_POST["tipo"];
        $found->update();

    elseif ($_POST["tipo"] == "") :
        $found = AsistenciaData::getByATD($_POST["grupo_estudiante"], $_POST["fecha"]);
        $found->del();

    endif;

elseif (!empty($_GET) && isset($_SESSION['id'])) :
    $grupo = GrupoData::getById($_GET["grupo"]);
    if ($_GET['id'] == $grupo->codigo_qr) :
        $estudiante = EstudianteData::getById($_SESSION['id']);
        $grupo_estudiante = GrupoEstudianteData::getByGrupoEstudiante($_GET["grupo"], $estudiante->dni);

        $assis = new AsistenciaData();
        $assis->grupo_estudiante = $grupo_estudiante->id;
        $assis->tipo_asistencia = 0;
        $assis->fecha = date("Y-m-d");
        $assis->add();

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $grupo->codigo_qr = substr(str_shuffle($permitted_chars), 0, 10);
        $grupo->update_qr();
    endif;

endif;
