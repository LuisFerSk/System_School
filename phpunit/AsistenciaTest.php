<?php
// require '../System_School/vendor/autoload.php';

use PHPUnit\Framework\TestCase;

use Model\AsistenciaData;

class AsistenciaTest extends TestCase
{
    /** @test **/
    public function test_GetAsistenciaAdd()
    {
        $op = new AsistenciaData();
        $this->res = is_array($op->getAll());
        $this->assertEquals(true, $this->res);
    }
}
