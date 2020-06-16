<?php
include "../core/autoload.php";
include "../core/app/model/GradData.php";
include "../core/app/model/Est_graData.php";
include "../core/app/model/EstuData.php";
include "../core/app/model/Bloque_calData.php";
include "../core/app/model/CalificacionData.php";

require_once '../PhpWord/Autoloader.php';
use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\Settings;

Autoloader::register();

$word = new  PhpOffice\PhpWord\PhpWord();
$bloques = Bloque_calData::getAllByTeamId($_GET["id_grado"]);
$grado =  GradData::getById($_GET["id_grado"]);
$estudiantes = Est_graData::getAllByTeamId($_GET["id_grado"]);

$section1 = $word->AddSection();
$section1->addText("CALIFICACIONES - ".strtoupper($grado->nombre),array("size"=>22,"bold"=>true,"align"=>"right"));


$styleTable = array('borderSize' => 6, 'borderColor' => '888888', 'cellMargin' => 40);
$styleFirstRow = array('borderBottomColor' => '0000FF', 'bgColor' => 'AAAAAA');

$table1 = $section1->addTable("table1");
$table1->addRow();
$table1->addCell()->addText("Nombre Completo");
foreach ($bloques as $block) {
$table1->addCell()->addText($block->nom_cal);
}
foreach($estudiantes as $al){
$alumn = $al->getAlumn();
$table1->addRow();
$table1->addCell(5000)->addText($alumn->nombre." ".$alumn->apellido_paterno." ".$alumn->apellido_materno);

foreach ($bloques as $block) {
$val = CalificacionData::getByBA($block->id, $alumn->id_estudiante);
$v = "";
if($val!=null){ $v = $val->val; }
$table1->addCell()->addText($v);
}

}

$word->addTableStyle('table1', $styleTable,$styleFirstRow);
/// datos bancarios
$section1->addText("");
$section1->addText("");
$section1->addText("");
$section1->addText("Att: HolySchools");

$filename = "calificaciones-".time().".docx";
#$word->setReadDataOnly(true);
$word->save($filename,"Word2007");
//chmod($filename,0444);
header("Content-Disposition: attachment; filename='$filename'");
readfile($filename); // or echo file_get_contents($filename);
unlink($filename);  // remove temp file



?>