<?php
$user = GradData::getById($_GET["id"]);
$user->del();
print "<script>window.location='./?view=allgrados';</script>";

?>