

<?php
$user = Bloque_calData::getById($_GET["id"]);
$team  =$user->id_grado;
$user->del();
Core::redir("./?view=bloques&id_grado=".$team);
?>