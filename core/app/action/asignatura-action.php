<?php
if (isset($_GET["opt"]) && $_GET["opt"] == "add") {
  $asignatura = new AsignaturaData();
  $asignatura->codigo = $_POST["codigo"];
  $asignatura->nombre = $_POST["nombre"];
  $asignatura->creditos = $_POST["creditos"];
  $asignatura->horas_semanales = $_POST["horas_semanales"];
  $asignatura->estado = $_POST["estado"];
  $asignatura->add();
  header("location: ./?view=asignatura&opt=all");
} else if (isset($_GET["opt"]) && $_GET["opt"] == "upd") {
  $asignatura = new AsignaturaData();
  $asignatura->id_asig = $_POST["id"];
  $asignatura->codigo = $_POST["codigo"];
  $asignatura->nombre = $_POST["nombre"];
  $asignatura->creditos = $_POST["creditos"];
  $asignatura->horas_semanales = $_POST["horas_semanales"];
  $asignatura->estado = $_POST["estado"];
  $asignatura->update();
  header("location: ./?view=asignatura&opt=all");
} else if (isset($_GET["opt"]) && $_GET["opt"] == "del") {
  $asignatura = new AsignaturaData();
  $asignatura->id_asig = $_GET["id"];
  $asignatura->del();
  header("location: ./?view=asignatura&opt=all");
}
