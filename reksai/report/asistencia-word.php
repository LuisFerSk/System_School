<?php
include "../core/autoload.php";
include "../core/app/model/GradData.php";
include "../core/app/model/Est_graData.php";
include "../core/app/model/EstuData.php";
include "../core/app/model/AssistanceData.php";

require_once '../PhpWord/Autoloader.php';
use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\Settings;

Autoloader::register();

$word = new  PhpOffice\PhpWord\PhpWord();

$grado =  GradData::getById($_GET["id_grado"]);
$alumns = Est_graData::getAllByTeamId($_GET["id_grado"]);
$range= ((strtotime($_GET["finish_at"])-strtotime($_GET["start_at"]))+(24*60*60)) /(24*60*60);

$section1 = $word->AddSection();
$section1->addText("LISTA DE ASISTENCIA - ".strtoupper($grado->nombre),array("size"=>20,"bold"=>true,"align"=>"right"));


$styleTable = array('borderSize' => 6, 'borderColor' => '888888', 'cellMargin' => 40);
$styleFirstRow = array('borderBottomColor' => '0000FF', 'bgColor' => 'AAAAAA');

$table1 = $section1->addTable("table1");
$table1->addRow();
$table1->addCell()->addText("Nombre Completo");
for($i=0;$i<$range;$i++){ 
$table1->addCell()->addText(date("d-M",strtotime($_GET["start_at"])+($i*(24*60*60))));
}

foreach($alumns as $al){
$alumn = $al->getAlumn();
$table1->addRow();
$table1->addCell(3000)->addText($alumn->nombre." ".$alumn->apellido_paterno." ".$alumn->apellido_materno);
for($i=0;$i<$range;$i++){ 
	$date_at= date("Y-m-d",strtotime($_GET["start_at"])+($i*(24*60*60)));
	$asist = AssistanceData::getByATD($alumn->id_estudiante,$_GET["id_grado"],$date_at);
$v = "";
if($asist!=null){
						if($asist->tipo==1){ $v="A"; }
						else if($asist->tipo==2){ $v="F"; }
						else if($asist->tipo==3){ $v="T"; }
						else if($asist->tipo==4){ $v= "J"; }
						
					}
$table1->addCell()->addText($v);
}

}

$word->addTableStyle('table1', $styleTable,$styleFirstRow);
/// datos bancarios
$section1->addText("Asistio = A "."Falta = F "."Tarde = T "."Justificado = J");
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