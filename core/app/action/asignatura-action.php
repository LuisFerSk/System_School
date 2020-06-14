<?php
if (isset($_GET["opt"]) && $_GET["opt"] == "add") {
  $asignatura = new AsignaturaData();
  $asignatura->codigo = $_POST["codigo"];
  $facultad->nombre = $_POST["nombre"];
  $facultad->estado = $_POST["estado"];
  $facultad->add();
  header("location: ./?view=facultad&opt=all");
} else if (isset($_GET["opt"]) && $_GET["opt"] == "upd") {
  $facultad = new AsignaturaData();
  $facultad->id_facultad = $_POST["id"];
  $facultad->nombre = $_POST["nombre"];
  $facultad->estado = $_POST["estado"];
  $facultad->update();
  header("location: ./?view=facultad&opt=all");
} else if (isset($_GET["opt"]) && $_GET["opt"] == "del") {
  $facultad = new AsignaturaData();
  $facultad->id = $_GET["id"];
  $facultad->del();
  header("location: ./?view=facultad&opt=all");
}
