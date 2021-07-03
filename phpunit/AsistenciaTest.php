<?php
require '../System_School/vendor/autoload.php';
use PHPUnit\Framework\TestCase;

class AsistenciaTest extends TestCase{
/** @test **/
    public function test_AsignaturaAdd()
    {
        $res=3;
        $this->assertEquals(2,$res);

    }
}
?>