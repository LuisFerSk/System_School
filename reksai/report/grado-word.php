<?php
include "../core/autoload.php";
include "../core/app/model/GradData.php";
include "../core/app/model/Est_graData.php";
include "../core/app/model/EstuData.php";
require_once '../PhpWord/Autoloader.php';
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\Autoloader;

Autoloader::register();

$word = new  PhpOffice\PhpWord\PhpWord();

$grado =  GradData::getById($_GET["id_grado"]);
$alumns = Est_graData::getAllByTeamId($_GET["id_grado"]);

$section1 = $word->AddSection();
$section1->addText("ALUMNOS - ".strtoupper($grado->nombre),array("size"=>22,"bold"=>true,"align"=>"right"));


$styleTable = array('borderSize' => 6, 'borderColor' => '888888', 'cellMargin' => 40);
$styleFirstRow = array('borderBottomColor' => '0000FF', 'bgColor' => 'AAAAAA');

$table1 = $section1->addTable("table1");
$table1->addRow();
$table1->addCell()->addText("Nombre Completo");
foreach($alumns as $al){
$alumn = $al->getAlumn();
$table1->addRow();
$table1->addCell(15000)->addText($alumn->nombre." ".$alumn->apellido_paterno." ".$alumn->apellido_materno);
}

$word->addTableStyle('table1', $styleTable,$styleFirstRow);
/// datos bancarios
$section1->addText("");
$section1->addText("");
$section1->addText("");
$section1->addText("Att: HolySchools");

$filename = "grado-".time().".docx";
#$word->setReadDataOnly(true);
$word->save($filename,"Word2007");
//chmod($filename,0444);
header("Content-Disposition: attachment; filename='$filename'");
readfile($filename); // or echo file_get_contents($filename);
unlink($filename);  // remove temp file



?>