<?php 
class prueba
{

    public function __construct($a) {
        $this->a = $a;
    }
}

$obj1 = new prueba('hola');
$obj2 = new prueba('mundo');

$arrow = Array();

array_push($arrow, new ArrayObject($obj1));
array_push($arrow, new ArrayObject($obj2));

foreach ($arrow as $key => $value) {
    print("{$value["a"]} ");
}



